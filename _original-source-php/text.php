<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Text';
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
                    <h1>Text</h1>
                    <p>Text utilities.</p>
                    <hr>

                    <h2>Examples</h2>
                    <h3>Text alignment</h3>
                    <p>To align text to left, center, right use <code>.text-left</code>, <code>.text-center</code>, <code>.text-right</code> classes.</p>
                    <div class="code-sample-text-alignments">
                        <p class="text-left">Align left</p>
                        <p class="text-center">Align center</p>
                        <p class="text-right">Align right</p>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-text-alignments" data-target-src-remove-first-space="24" data-inner-html="true"></pre>
                    <p>To align justify, use <code>.text-justify</code> class.</p>
                    <p class="text-justify">Nam a nisl fringilla tellus varius luctus. Aliquam tristique, velit tempor ullamcorper ultricies, lacus urna lacinia massa, vel sagittis nisi tellus vel enim. Praesent vestibulum pharetra cursus. Duis sit amet nunc quis lorem ultricies rutrum. Donec consectetur commodo ligula, at condimentum dui auctor vel. Praesent pulvinar odio ipsum, ac interdum elit rutrum a. Vestibulum iaculis posuere quam, in consequat ex laoreet quis. Nulla et iaculis lectus, sed maximus felis. Curabitur faucibus ornare pharetra. Quisque dictum augue quis auctor varius. Nam euismod, enim vel vehicula faucibus, massa felis gravida odio, a accumsan nisi risus non tortor. In vel congue sem, vel facilisis orci. Nunc non dui eget urna luctus sollicitudin. Nunc tincidunt elit non quam ullamcorper pulvinar. Phasellus pharetra tellus quis mattis dictum.</p>

                    <h3>Text colors</h3>
                    <div class="code-sample-text-colors">
                        <?php
                        $colorClassNames = ['danger', 'disabled', 'info', 'primary', 'success', 'warning', 'white'];
                        foreach ($colorClassNames as $colorClassName) {
                            echo '<p class="text-color-' . $colorClassName . '"';
                            if ($colorClassName === 'white') {
                                echo ' style="background-color: #000;"';
                            }
                            echo '>.text-color-' . $colorClassName . '</p>' . PHP_EOL;
                        }// endforeach;
                        unset($colorClassName);
                        ?> 
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-text-colors" data-target-src-remove-first-space="24" data-inner-html="true"></pre>
                    <p>It can also use with link.</p>
                    <div class="code-sample-text-colorslink">
                        <?php
                        foreach ($colorClassNames as $colorClassName) {
                            echo '<a class="text-color-' . $colorClassName . '"';
                            if ($colorClassName === 'white') {
                                echo ' style="background-color: #000;"';
                            }
                            echo ' href="#">.text-color-' . $colorClassName . '</a><br>' . PHP_EOL;
                        }// endforeach;
                        unset($colorClassName, $colorClassNames);
                        ?> 
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-text-colorslink" data-target-src-remove-first-space="24" data-inner-html="true"></pre>

                    <h3>Text flow</h3>
                    <p>Default text flow without any class.</p>
                    <div class="rdta-demopage-debugbox" style="width: 10em;">
                        This text should be wrapped by normal.
                    </div>
                    <p>Force normal wrap text with <code>.text-flow-wrap</code> class.</p>
                    <div class="rdta-demopage-debugbox text-flow-wrap code-sample-text-flowwrap" style="width: 10em;">
                        This text should be wrapped by normal.
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-text-flowwrap" data-target-src-remove-first-space="20" data-inner-html="false" data-remove-classes="rdta-demopage-debugbox"></pre>
                    <p>No wrap text with <code>.text-flow-nowrap</code> class.</p>
                    <div class="rdta-demopage-debugbox text-flow-nowrap code-sample-text-flownowrap" style="width: 10em;">
                        This text should not be wrapped.
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-text-flownowrap" data-target-src-remove-first-space="20" data-inner-html="false" data-remove-classes="rdta-demopage-debugbox"></pre>
                    <p>Break the long text with <code>.text-flow-breakword</code> class</p>
                    <div class="rdta-demopage-debugbox text-flow-breakword code-sample-text-flowbreakword" style="width: 10em;">
                        <?php echo str_repeat('m', 100); ?> 
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-text-flowbreakword" data-target-src-remove-first-space="20" data-inner-html="false" data-remove-classes="rdta-demopage-debugbox"></pre>

                    <h3>Text transform</h3>
                    <p>Transform text into lower, upper case, capitalize</p>
                    <div class="code-sample-text-transform">
                        <p class="text-transform-lowercase">LOWER CASE TEXT</p>
                        <p class="text-transform-uppercase">upper case text</p>
                        <p class="text-transform-capitalize">capitaize text</p>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-text-transform" data-target-src-remove-first-space="24" data-inner-html="true"></pre>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>