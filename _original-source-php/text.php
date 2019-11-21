<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Text';
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
                    <h1>Text</h1>
                    <p>Text utilities.</p>
                    <hr>

                    <h2>Examples</h2>
                    <h3>Text alignment</h3>
                    <p>To align text to left, center, right use <code>.text-left</code>, <code>.text-center</code>, <code>.text-right</code> classes.</p>
                    <p class="text-left">Align left</p>
                    <p class="text-center">Align center</p>
                    <p class="text-right">Align right</p>
                    <p>To align justify, use <code>.text-justify</code> class.</p>
                    <p class="text-justify">Nam a nisl fringilla tellus varius luctus. Aliquam tristique, velit tempor ullamcorper ultricies, lacus urna lacinia massa, vel sagittis nisi tellus vel enim. Praesent vestibulum pharetra cursus. Duis sit amet nunc quis lorem ultricies rutrum. Donec consectetur commodo ligula, at condimentum dui auctor vel. Praesent pulvinar odio ipsum, ac interdum elit rutrum a. Vestibulum iaculis posuere quam, in consequat ex laoreet quis. Nulla et iaculis lectus, sed maximus felis. Curabitur faucibus ornare pharetra. Quisque dictum augue quis auctor varius. Nam euismod, enim vel vehicula faucibus, massa felis gravida odio, a accumsan nisi risus non tortor. In vel congue sem, vel facilisis orci. Nunc non dui eget urna luctus sollicitudin. Nunc tincidunt elit non quam ullamcorper pulvinar. Phasellus pharetra tellus quis mattis dictum.</p>

                    <h3>Text colors</h3>
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
                    <pre>&lt;p class=&quot;text-color-danger&quot;&gt;.text-color-danger&lt;/p&gt;
&lt;p class=&quot;text-color-info&quot;&gt;.text-color-info&lt;/p&gt;
&lt;p class=&quot;text-color-primary&quot;&gt;.text-color-primary&lt;/p&gt;
&lt;p class=&quot;text-color-success&quot;&gt;.text-color-success&lt;/p&gt;
&lt;p class=&quot;text-color-warning&quot;&gt;.text-color-warning&lt;/p&gt;
&lt;p class=&quot;text-color-white&quot;&gt;.text-color-white&lt;/p&gt;</pre>
                    <p>It can also use with link.</p>
                    <div class="rd-block-level-margin-bottom">
                        <?php
                        foreach ($colorClassNames as $colorClassName) {
                            echo '<a class="text-color-' . $colorClassName . '"';
                            if ($colorClassName === 'white') {
                                echo ' style="background-color: #000;"';
                            }
                            echo ' href="#" onclick="return false;">.text-color-' . $colorClassName . '</a><br>' . PHP_EOL;
                        }// endforeach;
                        unset($colorClassName, $colorClassNames);
                        ?> 
                    </div>
                    <pre>&lt;a class=&quot;text-color-danger&quot; href=&quot;#&quot;&gt;.text-color-danger&lt;/a&gt;
&lt;a class=&quot;text-color-disabled&quot; href=&quot;#&quot;&gt;.text-color-disabled&lt;/a&gt;
&lt;a class=&quot;text-color-info&quot; href=&quot;#&quot;&gt;.text-color-info&lt;/a&gt;
&lt;a class=&quot;text-color-primary&quot; href=&quot;#&quot;&gt;.text-color-primary&lt;/a&gt;
&lt;a class=&quot;text-color-success&quot; href=&quot;#&quot;&gt;.text-color-success&lt;/a&gt;
&lt;a class=&quot;text-color-warning&quot; href=&quot;#&quot;&gt;.text-color-warning&lt;/a&gt;
&lt;a class=&quot;text-color-white&quot; style=&quot;background-color: #000;&quot; href=&quot;#&quot;&gt;.text-color-white&lt;/a&gt;</pre>

                    <h3>Text flow</h3>
                    <p>Default text flow without any class.</p>
                    <div class="rd-block-level-margin-bottom">
                        <div class="rdta-demopage-debugbox" style="width: 10em;">
                            This text should be wrapped by normal.
                        </div>
                    </div>
                    <p>Force wrap text with <code>.text-flow-wrap</code> class.</p>
                    <div class="rd-block-level-margin-bottom">
                        <div class="rdta-demopage-debugbox text-flow-wrap" style="width: 10em;">
                            This text should be wrapped by force.
                        </div>
                    </div>
                    <pre>&lt;div class=&quot;text-flow-wrap&quot; style=&quot;width: 10em;&quot;&gt;This text should be wrapped by force.&lt;/div&gt;</pre>
                    <p>No wrap text with <code>.text-flow-nowrap</code> class.</p>
                    <div class="rd-block-level-margin-bottom">
                        <div class="rdta-demopage-debugbox text-flow-nowrap" style="width: 10em;">
                            This text should not be wrapped.
                        </div>
                    </div>
                    <pre>&lt;div class=&quot;text-flow-nowrap&quot; style=&quot;width: 10em;&quot;&gt;This text should not be wrapped.&lt;/div&gt;</pre>
                    <p>Break the long text with <code>.text-flow-breakword</code> class</p>
                    <div class="rd-block-level-margin-bottom">
                        <div class="rdta-demopage-debugbox text-flow-breakword" style="width: 10em;">
                            <?php echo str_repeat('m', 100); ?> 
                        </div>
                    </div>
                    <pre>&lt;div class=&quot;text-flow-breakword&quot; style=&quot;width: 10em;&quot;&gt;mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm &lt;/div&gt;</pre>

                    <h3>Text transform</h3>
                    <p>Transform text into lower, upper case, capitalize</p>
                    <p class="text-transform-lowercase">LOWER CASE TEXT</p>
                    <p class="text-transform-uppercase">upper case text</p>
                    <p class="text-transform-capitalize">capitalize text</p>
                    <pre>&lt;p class=&quot;text-transform-lowercase&quot;&gt;LOWER CASE TEXT&lt;/p&gt;
&lt;p class=&quot;text-transform-uppercase&quot;&gt;upper case text&lt;/p&gt;
&lt;p class=&quot;text-transform-capitalize&quot;&gt;capitalize text&lt;/p&gt;</pre>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>