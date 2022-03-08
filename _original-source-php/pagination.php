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
    <body>
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
                    <div class="rd-block-level-margin-bottom">
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
                    </div>
                    <pre>&lt;nav&gt;
    &lt;ul class=&quot;rd-pagination&quot;&gt;
        &lt;li class=&quot;current&quot;&gt;&lt;span&gt;1&lt;/span&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#2&quot;&gt;2&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#3&quot;&gt;3&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;
&lt;nav class=&quot;text-center&quot;&gt;
    &lt;ul class=&quot;rd-pagination&quot;&gt;
        &lt;li class=&quot;current&quot;&gt;&lt;span&gt;1&lt;/span&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#2&quot;&gt;2&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#3&quot;&gt;3&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;
&lt;nav class=&quot;text-right&quot;&gt;
    &lt;ul class=&quot;rd-pagination&quot;&gt;
        &lt;li class=&quot;current&quot;&gt;&lt;span&gt;1&lt;/span&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#2&quot;&gt;2&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#3&quot;&gt;3&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;</pre>
                    <h3>Much much many</h3>
                    <nav>
                        <?php echo renderPagination(5, 1002, 999); // use just 5 for small screen. ?> 
                    </nav>
                    <h3>Loose</h3>
                    <nav class="rd-block-level-margin-bottom">
                        <?php echo renderPagination(5, 1, 1, 'space-loose'); // use just 5 for small screen. ?> 
                    </nav>
                    <pre>&lt;nav&gt;
    &lt;ul class=&quot;rd-pagination space-loose&quot;&gt;
        &lt;li class=&quot;current&quot;&gt;&lt;span&gt;1&lt;/span&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#2&quot;&gt;2&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#3&quot;&gt;3&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;</pre>
                    <hr>

                    <h2>Pager</h2>
                    <p>Display pagination as previous/next</p>
                    <nav class="rd-block-level-margin-bottom">
                        <ul class="rd-pagination">
                            <li><a href="#" onclick="return false;">Previous</a></li>
                            <li><a href="#" onclick="return false;">Next</a></li>
                        </ul>
                    </nav>
                    <pre>&lt;nav&gt;
    &lt;ul class=&quot;rd-pagination&quot;&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot; onclick=&quot;return false;&quot;&gt;Previous&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot; onclick=&quot;return false;&quot;&gt;Next&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;</pre>
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
                    <nav class="rd-block-level-margin-bottom">
                        <ul class="rd-pagination space-edge">
                            <li><a href="#" onclick="return false;">Previous</a></li>
                            <li><a href="#" onclick="return false;">Next</a></li>
                        </ul>
                    </nav>
                    <pre>&lt;nav&gt;
    &lt;ul class=&quot;rd-pagination space-edge&quot;&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Previous&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Next&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;</pre>
                    <hr>

                    <h2>Advanced</h2>
                    <p>Advanced pagination is the mixed between page numbers, pager (previous/next), input page, select page. To do this, add <code>advanced</code> class to the pagination element.</p>
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
                    <pre>&lt;nav&gt;
    &lt;ul class=&quot;rd-pagination advanced&quot;&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&amp;laquo;&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;
            &lt;input type=&quot;number&quot; value=&quot;1&quot;&gt;
        &lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;&amp;raquo;&lt;/a&gt;&lt;/li&gt;
        &lt;li class=&quot;break-space&quot;&gt;&lt;/li&gt;
        &lt;li&gt;
            &lt;select&gt;
                &lt;option&gt;1&lt;/option&gt;
                &lt;option&gt;2&lt;/option&gt;
                &lt;option&gt;3&lt;/option&gt;
            &lt;/select&gt;
        &lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;</pre>
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