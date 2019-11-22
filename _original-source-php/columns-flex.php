<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Columns flex';
include 'includes/html-head.php'; 
?> 
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/columns/columns-flex.css'); ?>">
        <style type="text/css">
            .column {
                background-color: #dee9f2;
                border: 1px solid #52A0E5;
                overflow: hidden;
            }
            .column.example-transparent {
                background-color: transparent;
                border: none;
            }
            .example-outline {
                background-color: transparent;
                border: 1px solid #dee9f2;
                margin-bottom: 1.250rem;
            }
        </style>
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
                    <h1>Columns flex</h1>
                    <p>
                        Display columns inside the main page layout. Please note that this is not the elements and classes style to use for admin page layout.<br>
                        In order to use column flex, you have to add stylesheet link to <strong>assets/css/rdta/columns/columns-flex.css</strong>.
                    </p>
                    <hr>

                    <h2>Flexible columns</h2>
                    <p>The very basic container for put columns that works the same on all screen sizes. If no column size specified then it will be flexible columns (or auto columns).</p>
                    <div class="rd-columns-flex-container rd-block-level-margin-bottom">
                        <div class="column">column</div>
                        <div class="column">column</div>
                        <div class="column">column</div>
                    </div>
                    <div class="rd-columns-flex-container rd-block-level-margin-bottom">
                        <div class="column">column</div>
                        <div class="column">column</div>
                    </div>
                    <pre>&lt;div class=&quot;rd-columns-flex-container&quot;&gt;
    &lt;div class=&quot;column&quot;&gt;column&lt;/div&gt;
    &lt;div class=&quot;column&quot;&gt;column&lt;/div&gt;
&lt;/div&gt;</pre>
                    <p>If you feels like the left and right edge is too narrower than the page layout, fix with <code>.fix-columns-container-edge</code> class.</p>
                    <div class="rd-columns-flex-container fix-columns-container-edge rd-block-level-margin-bottom">
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
                    <div class="rd-columns-flex-container rd-block-level-margin-bottom">
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
                    <pre>&lt;div class=&quot;rd-columns-flex-container&quot;&gt;
    &lt;div class=&quot;column col-xs-1&quot;&gt;col-xs-1&lt;/div&gt;
    &lt;div class=&quot;column col-xs-1&quot;&gt;col-xs-1&lt;/div&gt;
    &lt;div class=&quot;column col-xs-1&quot;&gt;col-xs-1&lt;/div&gt;
    &lt;div class=&quot;column col-xs-1&quot;&gt;col-xs-1&lt;/div&gt;
    &lt;div class=&quot;column col-xs-1&quot;&gt;col-xs-1&lt;/div&gt;
    &lt;div class=&quot;column col-xs-1&quot;&gt;col-xs-1&lt;/div&gt;
    &lt;div class=&quot;column col-xs-1&quot;&gt;col-xs-1&lt;/div&gt;
    &lt;div class=&quot;column col-xs-1&quot;&gt;col-xs-1&lt;/div&gt;
    &lt;div class=&quot;column col-xs-1&quot;&gt;col-xs-1&lt;/div&gt;
    &lt;div class=&quot;column col-xs-1&quot;&gt;col-xs-1&lt;/div&gt;
    &lt;div class=&quot;column col-xs-1&quot;&gt;col-xs-1&lt;/div&gt;
    &lt;div class=&quot;column col-xs-1&quot;&gt;col-xs-1&lt;/div&gt;
&lt;/div&gt;</pre>
                    <p>And what gonna happen if you put more than 12 columns.</p>
                    <div class="rd-columns-flex-container rd-block-level-margin-bottom">
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
                    <div class="rd-columns-flex-container rd-block-level-margin-bottom">
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
                    <div class="rd-block-level-margin-bottom"></div>
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
                    <div class="rd-block-level-margin-bottom"></div>

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
                    <div class="rd-columns-flex-container rd-block-level-margin-bottom">
                        <div class="column col-xl-3 col-lg-6 col-md-3 col-sm-2 col-xs-4">col-xl-3 col-lg-6 col-md-3 col-sm-2 col-xs-4</div>
                        <div class="column col-xl-3 col-lg-6 col-md-6 col-sm-10 col-xs-8">col-xl-3 col-lg-6 col-md-6 col-sm-10 col-xs-8</div>
                        <div class="column col-xl-3 col-lg-9 col-md-3 col-sm-3 col-xs-4">col-xl-3 col-lg-9 col-md-3 col-sm-3 col-xs-4</div>
                        <div class="column col-xl-3 col-lg-3 col-md-12 col-sm-9 col-xs-8">col-xl-3 col-lg-3 col-md-12 col-sm-9 col-xs-8</div>
                    </div>
                    <pre>&lt;div class=&quot;rd-columns-flex-container&quot;&gt;
    &lt;div class=&quot;column col-xl-3 col-lg-6 col-md-3 col-sm-2 col-xs-4&quot;&gt;col-xl-3 col-lg-6 col-md-3 col-sm-2 col-xs-4&lt;/div&gt;
    &lt;div class=&quot;column col-xl-3 col-lg-6 col-md-6 col-sm-10 col-xs-8&quot;&gt;col-xl-3 col-lg-6 col-md-6 col-sm-10 col-xs-8&lt;/div&gt;
    &lt;div class=&quot;column col-xl-3 col-lg-9 col-md-3 col-sm-3 col-xs-4&quot;&gt;col-xl-3 col-lg-9 col-md-3 col-sm-3 col-xs-4&lt;/div&gt;
    &lt;div class=&quot;column col-xl-3 col-lg-3 col-md-12 col-sm-9 col-xs-8&quot;&gt;col-xl-3 col-lg-3 col-md-12 col-sm-9 col-xs-8&lt;/div&gt;
&lt;/div&gt;</pre>

                    <h2>Offset</h2>
                    <p>Move column to the right using offset.</p>
                    <div class="rd-block-level-margin-bottom">
                        <?php
                        echo "\n";
                        for ($i = 1; $i <= 12; $i++) {
                            echo indent(5).'<div class="rd-columns-flex-container">'."\n";
                            echo indent(6).'<div class="column col-xs-' . (12-$i) . ' offset-xs-' . $i . '">col-xs-' . (12-$i) . ' offset-xs-' . $i . '</div>'."\n";
                            echo indent(5).'</div>'."\n";
                            if ($i >= 11) {
                                break;
                            }
                        }// endfor;
                        unset($i);
                        ?> 
                    </div>
                    <pre>&lt;div class=&quot;rd-columns-flex-container&quot;&gt;
    &lt;div class=&quot;column col-xs-11 offset-xs-1&quot;&gt;col-xs-11 offset-xs-1&lt;/div&gt;
&lt;/div&gt;</pre>

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

                    <div class="rd-block-level-margin-bottom"></div>

                    <h2>Break columns</h2>
                    <p>The columns can be force break into new line using <code>.column-break</code> class.</p>
                    <div class="rd-columns-flex-container rd-block-level-margin-bottom">
                        <div class="column">column</div>
                        <div class="column">column</div>
                        <div class="column">column</div>
                        <div class="column-break"></div>
                        <div class="column">column</div>
                    </div>
                    <p>It also works on both flexible or fixed columns.</p>
                    <div class="rd-columns-flex-container rd-block-level-margin-bottom">
                        <div class="column col-xs-3">col-xs-3</div>
                        <div class="column col-xs-3">col-xs-3</div>
                        <div class="column col-xs-3">col-xs-3</div>
                        <div class="column-break"></div>
                        <div class="column col-xs-3">col-xs-3</div>
                    </div>
                    <pre>&lt;div class=&quot;rd-columns-flex-container&quot;&gt;
    &lt;div class=&quot;column col-xs-3&quot;&gt;col-xs-3&lt;/div&gt;
    &lt;div class=&quot;column col-xs-3&quot;&gt;col-xs-3&lt;/div&gt;
    &lt;div class=&quot;column col-xs-3&quot;&gt;col-xs-3&lt;/div&gt;
    &lt;div class=&quot;column-break&quot;&gt;&lt;/div&gt;
    &lt;div class=&quot;column col-xs-3&quot;&gt;col-xs-3&lt;/div&gt;
&lt;/div&gt;</pre>

                    <h2>Nesting</h2>
                    <p>The columns can be nested.</p>
                    <div class="rd-columns-flex-container rd-block-level-margin-bottom">
                        <div class="column col-sm-9">
                            col-sm-9
                            <div class="rd-columns-flex-container">
                                <div class="column col-md-6">col-md-6</div>
                                <div class="column col-md-6">col-md-6</div>
                            </div>
                        </div>
                        <div class="column col-sm-3">col-sm-3</div>
                    </div>
                    <pre>&lt;div class=&quot;rd-columns-flex-container&quot;&gt;
    &lt;div class=&quot;column col-sm-9&quot;&gt;
        col-sm-9
        &lt;div class=&quot;rd-columns-flex-container&quot;&gt;
            &lt;div class=&quot;column col-md-6&quot;&gt;col-md-6&lt;/div&gt;
            &lt;div class=&quot;column col-md-6&quot;&gt;col-md-6&lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;column col-sm-3&quot;&gt;col-sm-3&lt;/div&gt;
&lt;/div&gt;</pre>
                    <p>You may feels that the left &amp; right edge of columns, even nested column was too narrower than page layout. This can be fixed by add <code>.fix-columns-container-edge</code> class to the container.</p>
                    <div class="rd-columns-flex-container fix-columns-container-edge rd-block-level-margin-bottom">
                        <div class="column col-sm-9 example-transparent">
                            <div class="example-outline">col-sm-9</div>
                            <div class="rd-columns-flex-container fix-columns-container-edge">
                                <div class="column col-md-6 example-transparent">
                                    <div class="example-outline">col-md-6</div>
                                    <div class="rd-columns-flex-container fix-columns-container-edge">
                                        <div class="column col-xl-4 example-transparent">
                                            <div class="example-outline">col-xl-4</div>
                                        </div>
                                        <div class="column col-xl-4 example-transparent">
                                            <div class="example-outline">col-xl-4</div>
                                        </div>
                                        <div class="column col-xl-4 example-transparent">
                                            <div class="example-outline">col-xl-4</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column col-md-6 example-transparent">
                                    <div class="example-outline">col-md-6</div>
                                    <div class="rd-columns-flex-container fix-columns-container-edge">
                                        <div class="column col-lg-6 example-transparent">
                                            <div class="example-outline">col-lg-6</div>
                                        </div>
                                        <div class="column col-lg-6 example-transparent">
                                            <div class="example-outline">col-lg-6</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column col-sm-3 example-transparent">
                            <div class="example-outline">col-sm-3</div>
                        </div>
                    </div>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>