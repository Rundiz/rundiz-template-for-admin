<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Columns flex';
include 'includes/html-head.php'; 
?> 
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/columns/columns-flex.css'); ?>">
    </head>
    <body>
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
<?php include 'includes/partials/page-sidebar.php'; ?> 
            <main>
<?php echo renderBreadcrumb(['./' => 'Home', '#' => $title], 4); ?> 
                <div class="rd-page-content page-columns-flex">
                    <h1>Columns flex</h1>
                    <p>
                        Display columns inside the main page layout. Please note that this is not the elements and classes style to use for admin page layout.<br>
                        In order to use column flex, you have to add stylesheet link to <strong>assets/css/rdta/columns/columns-flex.css</strong>.
                    </p>
                    <hr>

                    <h2>Flexible columns</h2>
                    <p>The very basic container for put columns that works the same on all screen sizes. If no column size specified then it will be flexible columns (or auto columns).</p>
                    <div class="rd-columns-flex-container rd-content-level-margin-bottom">
                        <div class="column">column</div>
                        <div class="column">column</div>
                        <div class="column">column</div>
                    </div>
                    <div class="rd-columns-flex-container rd-content-level-margin-bottom code-sample-columnflex-sample1">
                        <div class="column">column</div>
                        <div class="column">column</div>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-columnflex-sample1" data-target-src-remove-first-space="20" data-remove-classes="rd-content-level-margin-bottom"></pre>
                    <p>If you feels like the left and right edge is too narrower than the page layout, fix with <code>.fix-columns-container-edge</code> class.</p>
                    <div class="rd-columns-flex-container fix-columns-container-edge rd-content-level-margin-bottom">
                        <div class="column example-transparent">
                            <div class="example-outline">
                                column
                            </div>
                        </div>
                        <div class="column example-transparent">
                            <div class="example-outline">
                                column
                            </div>
                        </div>
                    </div>
                    <p>Compared with the normal layout below this line.</p>
                    <div class="rd-columns-flex-container">
                        <div class="column example-transparent">
                            <div class="example-outline">
                                column
                            </div>
                        </div>
                        <div class="column example-transparent">
                            <div class="example-outline">
                                column
                            </div>
                        </div>
                    </div>

                    <h2>Fixed columns</h2>
                    <p>The fixed columns will have total 12 columns max. The class name <code>.col-xs-*</code> is mobile first, it works on all screen sizes.</p>
                    <div class="rd-columns-flex-container code-sample-columnflex-fixedcols">
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-columnflex-fixedcols" data-target-src-remove-first-space="20"></pre>
                    <p>And what gonna happen if you put more than 12 columns.</p>
                    <div class="rd-columns-flex-container rd-content-level-margin-bottom">
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                        <div class="column col-xs-1">col-xs-1</div>
                    </div>
                    <div class="rd-columns-flex-container rd-content-level-margin-bottom">
                        <div class="column col-xs-9">col-xs-9</div>
                        <div class="column col-xs-4">col-xs-4</div>
                        <div class="column col-xs-2">col-xs-2</div>
                    </div>
                    <p>The fixed size 1 columns with flexible column.</p>
                    <?php
                    echo "\n";
                    for ($i = 1; $i <= 12; $i++) {
                        echo indent(5).'<div class="rd-columns-flex-container">'."\n";
                        for ($icol = 1; $icol <= $i; $icol++) {
                            echo indent(6).'<div class="column col-xs-1">col-xs-1</div>'."\n";
                        }// endfor;
                        if ($i < 12) {
                            echo indent(6).'<div class="column">column</div>'."\n";
                        }
                        echo indent(5).'</div>'."\n";
                        if ($i == 11) {
                            break;
                        }
                    }// endfor;
                    unset($i);
                    ?> 
                    <div class="rd-content-level-margin-bottom"></div>
                    <p>The column in various sizes with flexible column.</p>
                    <?php
                    echo "\n";
                    for ($i = 2; $i <= 12; $i++) {
                        echo indent(5).'<div class="rd-columns-flex-container">'."\n";
                        echo indent(6).'<div class="column col-xs-' . $i . '">col-xs-' . $i . '</div>'."\n";
                        if ($i < 12) {
                            echo indent(6).'<div class="column">column</div>'."\n";
                        }
                        echo indent(5).'</div>'."\n";
                    }// endfor;
                    unset($i);
                    ?> 

                    <h3>Small screen or larger</h3>
                    <p>The example below works on small screen or larger. It uses <code>.col-sm-*</code> CSS class.</p>
                    <?php
                    echo "\n";
                    for ($i = 1; $i <= 12; $i++) {
                        echo indent(5).'<div class="rd-columns-flex-container">'."\n";
                        echo indent(6).'<div class="column col-sm-' . $i . '">col-sm-' . $i . '</div>'."\n";
                        if ($i < 12) {
                            echo indent(6).'<div class="column">column</div>'."\n";
                        }
                        echo indent(5).'</div>'."\n";
                    }// endfor;
                    unset($i);
                    ?> 

                    <h3>Medium screen or larger</h3>
                    <p>The example below works on medium screen or larger. It uses <code>.col-md-*</code> CSS class.</p>
                    <?php
                    echo "\n";
                    for ($i = 1; $i <= 12; $i++) {
                        echo indent(5).'<div class="rd-columns-flex-container">'."\n";
                        echo indent(6).'<div class="column col-md-' . $i . '">col-md-' . $i . '</div>'."\n";
                        if ($i < 12) {
                            echo indent(6).'<div class="column">column</div>'."\n";
                        }
                        echo indent(5).'</div>'."\n";
                    }// endfor;
                    unset($i);
                    ?> 

                    <h3>Large screen or larger</h3>
                    <p>The example below works on large screen or larger. It uses <code>.col-lg-*</code> CSS class.</p>
                    <?php
                    echo "\n";
                    for ($i = 1; $i <= 12; $i++) {
                        echo indent(5).'<div class="rd-columns-flex-container">'."\n";
                        echo indent(6).'<div class="column col-lg-' . $i . '">col-lg-' . $i . '</div>'."\n";
                        if ($i < 12) {
                            echo indent(6).'<div class="column">column</div>'."\n";
                        }
                        echo indent(5).'</div>'."\n";
                    }// endfor;
                    unset($i);
                    ?> 

                    <h3>Extra large screen or larger</h3>
                    <p>The example below works on extra large screen or larger. It uses <code>.col-xl-*</code> CSS class.</p>
                    <?php
                    echo "\n";
                    for ($i = 1; $i <= 12; $i++) {
                        echo indent(5).'<div class="rd-columns-flex-container">'."\n";
                        echo indent(6).'<div class="column col-xl-' . $i . '">col-xl-' . $i . '</div>'."\n";
                        if ($i < 12) {
                            echo indent(6).'<div class="column">column</div>'."\n";
                        }
                        echo indent(5).'</div>'."\n";
                    }// endfor;
                    unset($i);
                    ?> 

                    <h3>Mixed column sizes in different screen</h3>
                    <p>The example below will show you the mixed column sizes in different screen. Resize your web browser to see it in action.</p>
                    <div class="rd-columns-flex-container code-sample-columnflex-mixedcolumnsizes">
                        <div class="column col-xl-3 col-lg-6 col-md-3 col-sm-2 col-xs-4">col-xl-3 col-lg-6 col-md-3 col-sm-2 col-xs-4</div>
                        <div class="column col-xl-3 col-lg-6 col-md-6 col-sm-10 col-xs-8">col-xl-3 col-lg-6 col-md-6 col-sm-10 col-xs-8</div>
                        <div class="column col-xl-3 col-lg-9 col-md-3 col-sm-3 col-xs-4">col-xl-3 col-lg-9 col-md-3 col-sm-3 col-xs-4</div>
                        <div class="column col-xl-3 col-lg-3 col-md-12 col-sm-9 col-xs-8">col-xl-3 col-lg-3 col-md-12 col-sm-9 col-xs-8</div>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-columnflex-mixedcolumnsizes" data-target-src-remove-first-space="20"></pre>

                    <h2>Offset</h2>
                    <p>Move column to the right using offset.</p>
                    <?php
                    echo "\n";
                    for ($i = 1; $i <= 12; $i++) {
                        echo indent(5).'<div class="rd-columns-flex-container code-sample-columnflex-offsetsample' . $i . '">'."\n";
                        echo indent(6).'<div class="column col-xs-' . (12-$i) . ' offset-xs-' . $i . '">col-xs-' . (12-$i) . ' offset-xs-' . $i . '</div>'."\n";
                        echo indent(5).'</div>'."\n";
                        if ($i >= 11) {
                            break;
                        }
                    }// endfor;
                    unset($i);
                    ?> 
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-columnflex-offsetsample1" data-target-src-remove-first-space="20"></pre>

                    <h3>Small screen or larger</h3>
                    <?php
                    echo "\n";
                    for ($i = 1; $i <= 12; $i++) {
                        echo indent(5).'<div class="rd-columns-flex-container">'."\n";
                        echo indent(6).'<div class="column col-sm-' . (12-$i) . ' offset-sm-' . $i . '">col-sm-' . (12-$i) . ' offset-sm-' . $i . '</div>'."\n";
                        echo indent(5).'</div>'."\n";
                        if ($i >= 11) {
                            break;
                        }
                    }// endfor;
                    unset($i);
                    ?> 

                    <h3>Medium screen or larger</h3>
                    <?php
                    echo "\n";
                    for ($i = 1; $i <= 12; $i++) {
                        echo indent(5).'<div class="rd-columns-flex-container">'."\n";
                        echo indent(6).'<div class="column col-md-' . (12-$i) . ' offset-md-' . $i . '">col-md-' . (12-$i) . ' offset-md-' . $i . '</div>'."\n";
                        echo indent(5).'</div>'."\n";
                        if ($i >= 11) {
                            break;
                        }
                    }// endfor;
                    unset($i);
                    ?> 

                    <h3>Large screen or larger</h3>
                    <?php
                    echo "\n";
                    for ($i = 1; $i <= 12; $i++) {
                        echo indent(5).'<div class="rd-columns-flex-container">'."\n";
                        echo indent(6).'<div class="column col-lg-' . (12-$i) . ' offset-lg-' . $i . '">col-lg-' . (12-$i) . ' offset-lg-' . $i . '</div>'."\n";
                        echo indent(5).'</div>'."\n";
                        if ($i >= 11) {
                            break;
                        }
                    }// endfor;
                    unset($i);
                    ?> 

                    <h3>Extra large screen or larger</h3>
                    <?php
                    echo "\n";
                    for ($i = 1; $i <= 12; $i++) {
                        echo indent(5).'<div class="rd-columns-flex-container">'."\n";
                        echo indent(6).'<div class="column col-xl-' . (12-$i) . ' offset-xl-' . $i . '">col-xl-' . (12-$i) . ' offset-xl-' . $i . '</div>'."\n";
                        echo indent(5).'</div>'."\n";
                        if ($i >= 11) {
                            break;
                        }
                    }// endfor;
                    unset($i);
                    ?> 

                    <h2>Break columns</h2>
                    <p>The columns can be force break into new line using <code>.column-break</code> class.</p>
                    <div class="rd-columns-flex-container rd-content-level-margin-bottom code-sample-columnflex-breakcols">
                        <div class="column">column</div>
                        <div class="column">column</div>
                        <div class="column">column</div>
                        <div class="column-break"></div>
                        <div class="column">column</div>
                    </div>
                    <p>It also works on both flexible or fixed columns.</p>
                    <div class="rd-columns-flex-container rd-content-level-margin-bottom">
                        <div class="column col-xs-3">col-xs-3</div>
                        <div class="column col-xs-3">col-xs-3</div>
                        <div class="column col-xs-3">col-xs-3</div>
                        <div class="column-break"></div>
                        <div class="column col-xs-3">col-xs-3</div>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-columnflex-breakcols" data-target-src-remove-first-space="20" data-remove-classes="rd-content-level-margin-bottom"></pre>

                    <h2>Nesting</h2>
                    <p>The columns can be nested.</p>
                    <div class="rd-columns-flex-container code-sample-columnflex-nested">
                        <div class="column col-sm-9">
                            col-sm-9
                            <div class="rd-columns-flex-container">
                                <div class="column col-md-6">col-md-6</div>
                                <div class="column col-md-6">col-md-6</div>
                            </div>
                        </div>
                        <div class="column col-sm-3">col-sm-3</div>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-columnflex-nested" data-target-src-remove-first-space="20"></pre>
                    <p>You may feels that the left &amp; right edge of columns, even nested column was too narrower than page layout. This can be fixed by add <code>.fix-columns-container-edge</code> class to the container.</p>
                    <div class="rd-columns-flex-container fix-columns-container-edge code-sample-columnflex-fixedge">
                        <div class="column col-sm-9 example-transparent">
                            <div class="example-outline">col-sm-9</div>
                            <div class="rd-columns-flex-container">
                                <div class="column col-md-6 example-transparent"><div class="example-outline">col-md-6</div></div>
                                <div class="column col-md-6 example-transparent"><div class="example-outline">col-md-6</div></div>
                            </div>
                        </div>
                        <div class="column col-sm-3 example-transparent"><div class="example-outline">col-sm-3</div></div>
                    </div>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>