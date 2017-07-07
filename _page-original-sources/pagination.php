<?php 
require 'includes/functions.php'; 


if (!function_exists('renderPagination')) {
    /**
     * Render pagination for demonstration page.
     * 
     * @param integer $pages Total pages
     * @param integer $current Current page
     * @param integer $begins The beginning page
     * @param string $additionalClass Additional class attribute, no need to prepend space.
     * @return string Return rendered pagination element.
     */
    function renderPagination($pages = 8, $current = 1, $begins = 1, $additionalClass = '')
    {
        $output = "\n";
        $output .= '<ul class="rd-pagination';
        if (!empty($additionalClass)) {
            $output .= ' ' . $additionalClass;
        }
        $output .= '">'."\n";
        for ($i = $begins; $i <= (($begins - 1) + $pages); $i++) {
            $output .= indent(1).'<li';
            if ($i == $current) {
                $output .= ' class="current"';
            }
            $output .= '>';
            if ($i == $current) {
                $output .= '<span>' . $i . '</span>';
            } else {
                $output .= '<a href="javascript: alert(\'go to page ' . $i . '\');">' . $i . '</a>';
            }
            $output .= '</li>'."\n";
        }// endfor;
        unset($i);
        $output .= '</ul>'."\n";

        return $output;
    }// renderPagination
}
?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Pagination';
include 'includes/html-head.php'; 
?> 
    </head>
    <body ontouchstart="">
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
<?php include 'includes/partials/page-sidebar.php'; ?> 
            <main>
                <?php
                echo renderBreadcrumb(['./' => 'Home', '#' => $title]);
                ?> 
                <div class="rd-page-content">
                    <h1>Pagination</h1>
                    <p>The pagination styles</p>
                    <hr>

                    <h2>Examples</h2>
                    <nav>
                        <?php echo renderPagination(); ?> 
                    </nav>
                    <h3 class="text-center">Center</h3>
                    <nav class="text-center">
                        <?php echo renderPagination(); ?> 
                    </nav>
                    <h3 class="text-right">Right</h3>
                    <nav class="text-right">
                        <?php echo renderPagination(); ?> 
                    </nav>
                    <h3>Much much many</h3>
                    <nav>
                        <?php echo renderPagination(5, 1002, 999); // use just 5 for small screen. ?> 
                    </nav>
                    <h3>Loose</h3>
                    <nav>
                        <?php echo renderPagination(5, 1, 1, 'space-loose'); // use just 5 for small screen. ?> 
                    </nav>
                    <hr>

                    <h2>Pager</h2>
                    <p>Display pagination as previous/next</p>
                    <nav>
                        <ul class="rd-pagination">
                            <li><a href="#" onclick="return false;">Previous</a></li>
                            <li><a href="#" onclick="return false;">Next</a></li>
                        </ul>
                    </nav>
                    <h3>Pager loose</h3>
                    <nav>
                        <ul class="rd-pagination space-loose">
                            <li><a href="#" onclick="return false;">Previous</a></li>
                            <li><a href="#" onclick="return false;">Next</a></li>
                        </ul>
                    </nav>
                    <h4 class="text-center">Center</h4>
                    <nav class="text-center">
                        <ul class="rd-pagination space-loose">
                            <li><a href="#" onclick="return false;">Previous</a></li>
                            <li><a href="#" onclick="return false;">Next</a></li>
                        </ul>
                    </nav>
                    <h4>Use button</h4>
                    <nav>
                        <ul class="rd-pagination space-loose">
                            <li><button type="button">Previous</button></li>
                            <li><button type="button">Next</button></li>
                        </ul>
                    </nav>
                    <h3>To the edge</h3>
                    <p>Horizontal align button to the left &amp; right of the page. Please note that this will be change the pagination element to <code>display: flex;</code>.</p>
                    <nav>
                        <ul class="rd-pagination space-edge">
                            <li><a href="#" onclick="return false;">Previous</a></li>
                            <li><a href="#" onclick="return false;">Next</a></li>
                        </ul>
                    </nav>
                    <hr>

                    <h2>Advanced</h2>
                    <p>Advanced pagination is the mixed between page numbers, pager (previous/next), input page, select page. You can choose what you want.</p>
                    <form method="get" style="margin-bottom: 0.625em;">
                        <nav>
                            <ul class="rd-pagination advanced">
                                <li><a href="#" onclick="return false;">&laquo;</a></li>
                                <li><input type="number" value="1"></li>
                                <li><a href="#" onclick="return false;">&raquo;</a></li>
                                <li class="break-space"></li>
                                <li>
                                    <select>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </li>
                            </ul>
                        </nav>
                    </form>
                    <form method="get" style="margin-bottom: 0.625em;">
                        <nav>
                            <ul class="rd-pagination advanced">
                                <li><a href="#" onclick="return false;">&laquo;</a></li>
                                <li><input type="number" value="1"></li>
                                <li><a href="#" onclick="return false;">&raquo;</a></li>
                            </ul>
                        </nav>
                    </form>
                    <form method="get" style="margin-bottom: 0.625em;">
                        <nav>
                            <ul class="rd-pagination advanced">
                                <li><a href="#" onclick="return false;">&laquo; Previous</a></li>
                                <li><a href="#" onclick="return false;">Next &raquo;</a></li>
                                <li class="break-space"></li>
                                <li>
                                    <select>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </li>
                            </ul>
                        </nav>
                    </form>
                    <form method="get" style="margin-bottom: 0.625em;">
                        <nav>
                            <ul class="rd-pagination advanced">
                                <li><a href="#" onclick="return false;">&laquo;</a></li>
                                <li class="current"><a href="#" onclick="return false;">1</a></li>
                                <li><a href="#" onclick="return false;">2</a></li>
                                <li><a href="#" onclick="return false;">3</a></li>
                                <li><a href="#" onclick="return false;">&raquo;</a></li>
                                <li class="break-space"></li>
                                <li><input type="number" value="1"></li>
                            </ul>
                        </nav>
                    </form>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>