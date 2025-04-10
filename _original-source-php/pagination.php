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
        $output .= indent(1) . '<ul class="rd-pagination';
        if (!empty($additionalClass)) {
            $output .= ' ' . $additionalClass;
        }
        $output .= '">'."\n";
        for ($i = $begins; $i <= (($begins - 1) + $pages); $i++) {
            $output .= indent(2) . '<li';
            if ($i == $current) {
                $output .= ' class="current"';
            }
            $output .= '>';
            if ($i == $current) {
                $output .= '<span>' . $i . '</span>';
            } else {
                $output .= '<a href="#">' . $i . '</a>';
            }
            $output .= '</li>'."\n";
        }// endfor;
        unset($i);
        $output .= indent(1) . '</ul>'."\n";

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
<?php echo renderBreadcrumb(['./' => 'Home', '#' => $title], 4); ?> 
                <div class="rd-page-content">
                    <h1>Pagination</h1>
                    <p>The pagination styles</p>
                    <hr>

                    <h2>Examples</h2>
                    <nav class="code-sample-pagination-sample1" aria-label="Pagination">
                        <?php echo renderPagination(); ?> 
                    </nav>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-pagination-sample1" data-target-src-remove-first-space="20"></pre>
                    <h3>Alignment</h3>
                    <p>You can change the alignment by use <a href="./text.html">Text alignment utility</a> on the <code>&lt;nav&gt;</code> element.</p>
                    <p>Align center</p>
                    <nav class="text-center code-sample-pagination-alignment-center" aria-label="Pagination center alignment">
                        <?php echo renderPagination(); ?> 
                    </nav>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-pagination-alignment-center" data-target-src-remove-first-space="20"></pre>
                    <p>Align right</p>
                    <nav class="text-right code-sample-pagination-alignment-right" aria-label="Pagination right alignment">
                        <?php echo renderPagination(); ?> 
                    </nav>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-pagination-alignment-right" data-target-src-remove-first-space="20"></pre>
                    
                    <h3>Much much many pages</h3>
                    <nav class="rd-block-level-margin-bottom" aria-label="Pagination">
                        <?php echo renderPagination(5, 1002, 999); // use just 5 for small screen. ?> 
                    </nav>
                    <h3>Loose</h3>
                    <p>Add class <code>space-loose</code> to pagination element which contain class <code>rd-pagination</code>.</p>
                    <nav class="rd-block-level-margin-bottom code-sample-pagination-loose" aria-label="Pagination">
                        <?php echo renderPagination(5, 1, 1, 'space-loose'); // use just 5 for small screen. ?> 
                    </nav>
                    <h5>Source</h5>
                    <pre><code class="language-html"><?php
                    echo trim(htmlspecialchars('<ul class="rd-pagination space-loose">...</ul>', ENT_QUOTES));
                    ?></code></pre>
                    <hr>

                    <h2>Pager</h2>
                    <p>Display pagination as previous/next</p>
                    <nav class="rd-block-level-margin-bottom code-sample-pagination-pager" aria-label="Pagination">
                        <ul class="rd-pagination">
                            <li><a href="#">Previous</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </nav>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-pagination-pager" data-target-src-remove-first-space="20" data-remove-classes="rd-block-level-margin-bottom"></pre>
                    <h3>Pager loose</h3>
                    <nav class="rd-block-level-margin-bottom" aria-label="Pagination loose">
                        <ul class="rd-pagination space-loose">
                            <li><a href="#">Previous</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </nav>
                    <h5>Source</h5>
                    <pre><code class="language-html"><?php
                    echo trim(htmlspecialchars('<ul class="rd-pagination space-loose">...</ul>', ENT_QUOTES));
                    ?></code></pre>
                    <h3>Pager loose use button</h3>
                    <nav class="rd-block-level-margin-bottom code-sample-pagination-loose-button" aria-label="Pagination use buttons">
                        <ul class="rd-pagination space-loose">
                            <li><button type="button">Previous</button></li>
                            <li><button type="button">Next</button></li>
                        </ul>
                    </nav>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-pagination-loose-button" data-target-src-remove-first-space="20" data-remove-classes="rd-block-level-margin-bottom"></pre>
                    <h3>Pager to the edge</h3>
                    <p>Horizontal align button to the left &amp; right of the page. Add the class <code>space-edge</code> to pagination element which contain class <code>rd-pagination</code>. 
                        Please note that this will be change the pagination element to <code>display: flex;</code>.
                    </p>
                    <nav class="rd-block-level-margin-bottom code-sample-pagination-pager-edge" aria-label="Pagination to the edge">
                        <ul class="rd-pagination space-edge">
                            <li><a href="#">Previous</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </nav>
                    <h5>Source</h5>
                    <pre><code class="language-html"><?php 
                    echo trim(htmlspecialchars('<ul class="rd-pagination space-edge">...</ul>', ENT_QUOTES));
                    ?></code></pre>
                    <hr>

                    <h2>Advanced</h2>
                    <p>Advanced pagination is the mixed between page numbers, pager (previous/next), input page, select page. 
                        To do this, add class <code>advanced</code> to pagination element which contain class <code>rd-pagination</code>.
                    </p>
                    <nav class="rd-block-level-margin-bottom code-sample-pagination-pager-advanced" aria-label="Pagination advanced">
                        <ul class="rd-pagination advanced">
                            <li><a href="#">&laquo;</a></li>
                            <li><input type="number" value="1"></li>
                            <li><a href="#">&raquo;</a></li>
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
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-pagination-pager-advanced" data-target-src-remove-first-space="20"></pre>
                    <h3>Other advanced mixed</h3>
                    <nav class="rd-content-level-margin-bottom" aria-label="Pagination advanced">
                        <ul class="rd-pagination advanced">
                            <li><a href="#">&laquo;</a></li>
                            <li><input type="number" value="1"></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </nav>
                    <nav class="rd-content-level-margin-bottom" aria-label="Pagination advanced">
                        <ul class="rd-pagination advanced">
                            <li><a href="#">&laquo; Previous</a></li>
                            <li><a href="#">Next &raquo;</a></li>
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
                    <nav class="rd-content-level-margin-bottom" aria-label="Pagination advanced">
                        <ul class="rd-pagination advanced">
                            <li><a href="#">&laquo;</a></li>
                            <li class="current"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                            <li class="break-space"></li>
                            <li><input type="number" value="1"></li>
                        </ul>
                    </nav>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>