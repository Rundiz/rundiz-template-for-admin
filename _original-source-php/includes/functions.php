<?php


ini_set('log_errors', true);
ini_set('error_log', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'php_error.log');


if (!defined('ROOTDIR')) {
    define('ROOTDIR', dirname(__DIR__, 2));
}


if (!defined('RDTA_DEBUG')) {
    if (php_sapi_name() === 'cli') {
        define('RDTA_DEBUG', false);
    } else {
        define('RDTA_DEBUG', true);
    }
}


/**
 * Render asset URL with version querystring append. By default it will be use file modify time as version qurey string.
 * 
 * @param string $assetUrl The relative path of asset URL refer from this app's root.
 * @param array $options Accepted options:<br>
 *                                      'npm' For detect package version and write out instead of using file modify time.
 * @return string Return asset URL and check if file exists then the version querystring will be append, otherwise return the same value as `$assetUrl`.
 */
function assetUrl(string $assetUrl, array $options = []): string
{
    if (stripos($assetUrl, '://') !== false || stripos($assetUrl, '//') === 0) {
        // if asset url is full url then no need to get file mtime.
        return $assetUrl;
    }

    $urlParsed = parse_url($assetUrl);
    $url = (isset($urlParsed['path']) ? $urlParsed['path'] : '');
    $query = (isset($urlParsed['query']) ? $urlParsed['query'] : '');
    unset($urlParsed);

    if (array_key_exists('npm', $options)) {
        // if npm option was set.
        $fileContents = file_get_contents(ROOTDIR . DIRECTORY_SEPARATOR . 'package.json');
        $fileContents = json_decode($fileContents);
        if (
            is_object($fileContents) && 
            property_exists($fileContents, 'dependencies') &&
            property_exists($fileContents->dependencies, $options['npm'])
        ) {
            // if detected package name in the package.json file.
            $versionNumber = $fileContents->dependencies->{$options['npm']};
            if (is_scalar($versionNumber)) {
                // if version number is correctly string or number.
                $versionNumber = str_replace(['^', '~', '>', '<', '='], '', $versionNumber);
                $queryArray['npm-v'] = $versionNumber;
            }
            unset($versionNumber);
        }
        unset($fileContents);
    }

    if (!isset($queryArray)) {
        // if query array of assets never generated before (not set).
        parse_str($query, $queryArray);
        unset($query);

        if (isset($queryArray['v'])) {
            $additionalQueryName = 'v' . time();
        } else {
            $additionalQueryName = 'v';
        }

        $assetFullPath = realpath(ROOTDIR . '/' . $url);
        if (is_string($assetFullPath) && filesize($assetFullPath) <= 1048576) {
            // if file size is smaller than or equal to 1 MB.
            $additionalQueryValue = md5_file($assetFullPath);
        }
        if (
            (
                !isset($additionalQueryValue) || 
                false === $additionalQueryValue
            ) && 
            is_string($assetFullPath)
        ) {
            $additionalQueryValue = filemtime($assetFullPath);
        }
        if (!isset($additionalQueryValue) || false === $additionalQueryValue) {
            $additionalQueryValue = time();
        }
        $queryArray[$additionalQueryName] = $additionalQueryValue;
        unset($additionalQueryName, $additionalQueryValue, $assetFullPath);
    }

    $query = http_build_query($queryArray, '', '&amp;');
    unset($queryArray);
    
    return $url . '?' . $query;
}// assetUrl


/**
 * Get this repository version that appears in package.json file.
 * 
 * @return string Return version number or 'n.n.n' if not found any.
 * @throws \Exception Throw the exception if JSON error.
 */
function getVersion(): string
{
    $packageJsonFile = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'package.json';
    if (!is_file($packageJsonFile)) {
        return 'n.n.n';
    }

    $packageJson = json_decode(file_get_contents($packageJsonFile));
    if (json_last_error() !== JSON_ERROR_NONE) {
        unset($packageJson, $packageJsonFile);
        throw new \Exception(json_last_error_msg());
    }

    if (isset($packageJson->version) && is_string($packageJson->version)) {
        return $packageJson->version;
    }
    return 'n.n.n';
}// getVersion


/**
 * Generate indent by 4 spaces per 1 indent.
 * 
 * @param int $number Number of total indent.
 * @param bool $return Set to false will be echo out, true will be return.
 * @return null|string If set `$return` to `true` then it will be return spaces indent, otherwise will be return `null`.
 */
function indent(int $number = 1, bool $return = true)
{
    $output = str_repeat('    ', $number);

    if ($return === false) {
        echo $output;
        unset($output);
        return ;
    } elseif ($return === true) {
        return $output;
    }

    return ;
}// indent


/**
 * Render breadcrumb HTML.
 * 
 * @param array $breadcrumb The breadcrumb data. Example: array('/path/to/page1' => 'page1', '/path/to/page2' => 'page2');
 * @param int $indent The indent number.
 * @return string Return generated breadcrumb HTML
 */
function renderBreadcrumb(array $breadcrumb, int $indent = 1): string
{
    $output = '';

    if (!empty($breadcrumb)) {
        $output .= indent($indent) . '<nav>'."\n";
        $output .= indent(2 + ($indent - 1)) . '<ul class="rd-breadcrumb">'."\n";
        $arrayKeys = array_keys($breadcrumb);
        $lastArrayKey = array_pop($arrayKeys);
        foreach ($breadcrumb as $path => $name) {
            $output .= indent((3 + ($indent - 1)));
            $output .= '<li';
            if ($path == $lastArrayKey) {
                $output .= ' class="current"';
            }
            $output .= '>';
            $output .= '<a href="'.$path.'"';
            if ($path == $lastArrayKey) {
                $output .= ' onclick="return false;"';
            }
            $output .= '>'.$name.'</a>';
            $output .= '</li>';
            $output .= "\n";
        }// endforeach;
        unset($arrayKeys, $lastArrayKey, $name, $path);
        $output .= indent(2 + ($indent - 1)) . '</ul>'."\n";
        $output .= indent($indent) . '</nav>'."\n";
    }

    return $output;
}// renderBreadcrumb