<?php


if (!defined('ROOTDIR')) {
    define('ROOTDIR', dirname(__DIR__));
}


/**
 * Render asset URL with version querystring append. By default it will be use file modify time as version qurey string.
 * 
 * @param string $assetUrl The relative path of asset URL refer from this app's root.
 * @param array $options Accepted options:<br>
 *                                      'npm' For detect package version and write out instead of using file modify time.
 * @return string Return asset URL and check if file exists then the version querystring will be append, otherwise return the same value as `$assetUrl`.
 */
function assetUrl($assetUrl, array $options = [])
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

        if (isset($queryArray['mt'])) {
            $additionalQueryName = 'mt' . time();
        } else {
            $additionalQueryName = 'mt';
        }

        $assetFullPath = realpath(ROOTDIR . '/' . $url);
        $additionalQueryValue = filemtime($assetFullPath);
        $queryArray[$additionalQueryName] = $additionalQueryValue;
        unset($additionalQueryName, $additionalQueryValue, $assetFullPath);
    }

    $query = http_build_query($queryArray, '', '&amp;');
    unset($queryArray);
    
    return $url . '?' . $query;
}// assetUrl


/**
 * Generate indent by 4 spaces per 1 indent.
 * 
 * @param integer $number Number of total indent.
 * @param boolean $return Set to false will be echo out, true will be return.
 * @return string If set to true then it will be return spaces indent, otherwise will be return null.
 */
function indent($number = 1, $return = true)
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
 * @return string Return generated breadcrumb HTML
 */
function renderBreadcrumb(array $breadcrumb)
{
    $output = '';

    if (!empty($breadcrumb)) {
        $output .= '<nav>'."\n";
        $output .= indent().'<ul class="rd-breadcrumb">'."\n";
        $arrayKeys = array_keys($breadcrumb);
        $lastArrayKey = array_pop($arrayKeys);
        foreach ($breadcrumb as $path => $name) {
            $output .= indent(2);
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
        $output .= indent().'</ul>'."\n";
        $output .= '</nav>'."\n";
    }

    return $output;
}// renderBreadcrumb