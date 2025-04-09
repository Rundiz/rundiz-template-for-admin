<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Accordion';
include 'includes/html-head.php'; 
?> 
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/components/rdta-accordion.css'); ?>">
    </head>
    <body>
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
<?php include 'includes/partials/page-sidebar.php'; ?> 
            <main>
                <?php
                echo renderBreadcrumb(['./' => 'Home', '#' => $title]);
                ?> 
                <div class="rd-page-content page-accordion">
                    <h1>Accordion</h1>
                    <p>
                        In order to make accordion works, add these files.
                        <strong>assets/css/rdta/components/rdta-accordion.css</strong>,
                        <strong>assets/js/rdta/components/rdta-accordion.js</strong>
                    </p>
                    <p>Then enable its functional.</p>
                    <pre><code class="language-js">document.addEventListener('DOMContentLoaded', function() {
    RDTAAccordion.init('.rd-accordion');
});</code></pre>
                    <hr>

                    <h2>Examples</h2>
                    <div class="rd-accordion code-sample-accordion-sample1">
                        <div class="rd-accordion-group">
                            <h3 id="accordion-heading1" class="rd-accordion-header active"><a data-toggle="accordion" data-target="#accordion1" aria-controls="accordion1" aria-expanded="true">Section 1</a></h3>
                            <div id="accordion1" class="rd-accordion-body collapse expanded" aria-labelledby="accordion-heading1">
                                <p>Cras in lacus posuere, pulvinar lorem a, commodo ex. Ut a vestibulum urna. Sed hendrerit et nulla eget sollicitudin. Donec vitae ultrices lorem. Ut vitae molestie ex, et finibus eros. Cras euismod libero leo, ut cursus nisi viverra eget. Integer ac lacinia felis. Sed pretium eros ac dui feugiat, et egestas purus facilisis. Pellentesque eu quam mauris. Integer hendrerit nulla at est sollicitudin, a placerat arcu pharetra.</p>
                            </div>
                        </div>
                        <div class="rd-accordion-group">
                            <h3 id="accordion-heading2" class="rd-accordion-header"><a data-toggle="accordion" data-target="#accordion2" aria-controls="accordion2" aria-expanded="false">Section 2</a></h3>
                            <div id="accordion2" class="rd-accordion-body collapse" aria-labelledby="accordion-heading2">
                                <p>Sed sit amet lacus ac tellus sollicitudin sollicitudin quis non sapien. Donec augue arcu, accumsan sit amet massa nec, pellentesque egestas mauris. Nulla quis vestibulum erat, feugiat euismod massa. Morbi bibendum magna quis lorem cursus porttitor. Phasellus condimentum justo non sodales dapibus. Cras eros elit, sollicitudin at porta sed, ultrices id nibh. In elementum libero placerat, bibendum nunc ac, malesuada lectus.</p>
                            </div>
                        </div>
                        <div class="rd-accordion-group">
                            <h3 id="accordion-heading3" class="rd-accordion-header"><a data-toggle="accordion" data-target="#accordion3" aria-controls="accordion3" aria-expanded="false">Section 3</a></h3>
                            <div id="accordion3" class="rd-accordion-body collapse" aria-labelledby="accordion-heading3">
                                <p>Suspendisse efficitur, metus sed consectetur elementum, nulla turpis rutrum diam, ut mattis dolor dui a felis. Nullam at massa non lorem ornare dapibus sit amet ut enim. Donec id lacus dapibus, tempus tellus aliquam, rutrum ligula. Pellentesque pellentesque dui nec metus pharetra, in condimentum orci euismod. Nulla vehicula purus ut ex consectetur dignissim.</p>
                            </div>
                        </div>
                    </div><!--.rd-accordion-->
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-accordion-sample1" data-target-src-remove-first-space="20"></pre>
                    <p>The accordion maybe in <code>ul</code> element.</p>
                    <ul class="rd-accordion code-sample-accordion-ul">
                        <li class="rd-accordion-group">
                            <h3 id="ex2-accordion-heading1" class="rd-accordion-header active"><a data-toggle="accordion" data-target="#ex2-accordion1" aria-controls="ex2-accordion1" aria-expanded="true">Section 1</a></h3>
                            <div id="ex2-accordion1" class="rd-accordion-body collapse expanded" aria-labelledby="ex2-accordion-heading1">
                                <p>Cras in lacus posuere, pulvinar lorem a, commodo ex. Ut a vestibulum urna. Sed hendrerit et nulla eget sollicitudin. Donec vitae ultrices lorem. Ut vitae molestie ex, et finibus eros. Cras euismod libero leo, ut cursus nisi viverra eget. Integer ac lacinia felis. Sed pretium eros ac dui feugiat, et egestas purus facilisis. Pellentesque eu quam mauris. Integer hendrerit nulla at est sollicitudin, a placerat arcu pharetra.</p>
                            </div>
                        </li>
                        <li class="rd-accordion-group">
                            <h3 id="ex2-accordion-heading2" class="rd-accordion-header"><a data-toggle="accordion" data-target="#ex2-accordion2" aria-controls="ex2-accordion2" aria-expanded="false">Section 2</a></h3>
                            <div id="ex2-accordion2" class="rd-accordion-body collapse" aria-labelledby="ex2-accordion-heading2">
                                <p>Sed sit amet lacus ac tellus sollicitudin sollicitudin quis non sapien. Donec augue arcu, accumsan sit amet massa nec, pellentesque egestas mauris. Nulla quis vestibulum erat, feugiat euismod massa. Morbi bibendum magna quis lorem cursus porttitor. Phasellus condimentum justo non sodales dapibus. Cras eros elit, sollicitudin at porta sed, ultrices id nibh. In elementum libero placerat, bibendum nunc ac, malesuada lectus.</p>
                            </div>
                        </li>
                        <li class="rd-accordion-group">
                            <h3 id="ex2-accordion-heading3" class="rd-accordion-header"><a data-toggle="accordion" data-target="#ex2-accordion3" aria-controls="ex2-accordion3" aria-expanded="false">Section 3</a></h3>
                            <div id="ex2-accordion3" class="rd-accordion-body collapse" aria-labelledby="ex2-accordion-heading3">
                                <p>Suspendisse efficitur, metus sed consectetur elementum, nulla turpis rutrum diam, ut mattis dolor dui a felis. Nullam at massa non lorem ornare dapibus sit amet ut enim. Donec id lacus dapibus, tempus tellus aliquam, rutrum ligula. Pellentesque pellentesque dui nec metus pharetra, in condimentum orci euismod. Nulla vehicula purus ut ex consectetur dignissim.</p>
                            </div>
                        </li>
                    </ul><!--.rd-accordion-->
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-accordion-ul" data-target-src-remove-first-space="20"></pre>
                    <h3>Show only one</h3>
                    <p>The accordion can be show only one body while other will be collapsed. Add <code>data-accordion-one=&quot;true&quot;</code> to the element that contain <code>rd-accordion</code> class to enable this feature.</p>
                    <div class="rd-accordion code-sample-accordion-onlyone" data-accordion-one="true">
                        <div class="rd-accordion-group">
                            <h3 id="ex3-accordion-heading1" class="rd-accordion-header active"><a data-toggle="accordion" data-target="#ex3-accordion1" aria-controls="ex3-accordion1">Section 1</a></h3>
                            <div id="ex3-accordion1" class="rd-accordion-body collapse expanded" aria-labelledby="ex3-accordion-heading1">
                                <p>Cras in lacus posuere, pulvinar lorem a, commodo ex. Ut a vestibulum urna. Sed hendrerit et nulla eget sollicitudin. Donec vitae ultrices lorem. Ut vitae molestie ex, et finibus eros. Cras euismod libero leo, ut cursus nisi viverra eget. Integer ac lacinia felis. Sed pretium eros ac dui feugiat, et egestas purus facilisis. Pellentesque eu quam mauris. Integer hendrerit nulla at est sollicitudin, a placerat arcu pharetra.</p>
                            </div>
                        </div>
                        <div class="rd-accordion-group">
                            <h3 id="ex3-accordion-heading2" class="rd-accordion-header"><a data-toggle="accordion" data-target="#ex3-accordion2" aria-controls="ex3-accordion2">Section 2</a></h3>
                            <div id="ex3-accordion2" class="rd-accordion-body collapse" aria-labelledby="ex3-accordion-heading2">
                                <p>Sed sit amet lacus ac tellus sollicitudin sollicitudin quis non sapien. Donec augue arcu, accumsan sit amet massa nec, pellentesque egestas mauris. Nulla quis vestibulum erat, feugiat euismod massa. Morbi bibendum magna quis lorem cursus porttitor. Phasellus condimentum justo non sodales dapibus. Cras eros elit, sollicitudin at porta sed, ultrices id nibh. In elementum libero placerat, bibendum nunc ac, malesuada lectus.</p>
                            </div>
                        </div>
                        <div class="rd-accordion-group">
                            <h3 id="ex3-accordion-heading3" class="rd-accordion-header"><a data-toggle="accordion" data-target="#ex3-accordion3" aria-controls="ex3-accordion3">Section 3</a></h3>
                            <div id="ex3-accordion3" class="rd-accordion-body collapse" aria-labelledby="ex3-accordion-heading3">
                                <p>Suspendisse efficitur, metus sed consectetur elementum, nulla turpis rutrum diam, ut mattis dolor dui a felis. Nullam at massa non lorem ornare dapibus sit amet ut enim. Donec id lacus dapibus, tempus tellus aliquam, rutrum ligula. Pellentesque pellentesque dui nec metus pharetra, in condimentum orci euismod. Nulla vehicula purus ut ex consectetur dignissim.</p>
                            </div>
                        </div>
                    </div><!--.rd-accordion-->
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-accordion-onlyone" data-target-src-remove-first-space="20"></pre>
                    <h3>Use <code>&lt;details&gt; &amp; &lt;summary&gt;</code></h3>
                    <p>The accordion may use <code>&lt;details&gt; &amp; &lt;summary&gt;</code> tags which the main function is handle by web browser that supported it. The attribute <code>data-accordion-one=&quot;true&quot;</code> also supported.</p>
                    <div class="rd-accordion code-sample-accordion-use-details" data-accordion-one="true">
                        <details class="rd-accordion-group" open>
                            <summary class="rd-accordion-header">Section 1</summary>
                            <div class="rd-accordion-body">
                                <p>Cras in lacus posuere, pulvinar lorem a, commodo ex. Ut a vestibulum urna. Sed hendrerit et nulla eget sollicitudin. Donec vitae ultrices lorem. Ut vitae molestie ex, et finibus eros. Cras euismod libero leo, ut cursus nisi viverra eget. Integer ac lacinia felis. Sed pretium eros ac dui feugiat, et egestas purus facilisis. Pellentesque eu quam mauris. Integer hendrerit nulla at est sollicitudin, a placerat arcu pharetra.</p>
                            </div>
                        </details>
                        <details class="rd-accordion-group">
                            <summary class="rd-accordion-header">Section 2</summary>
                            <div class="rd-accordion-body">
                                <p>Sed sit amet lacus ac tellus sollicitudin sollicitudin quis non sapien. Donec augue arcu, accumsan sit amet massa nec, pellentesque egestas mauris. Nulla quis vestibulum erat, feugiat euismod massa. Morbi bibendum magna quis lorem cursus porttitor. Phasellus condimentum justo non sodales dapibus. Cras eros elit, sollicitudin at porta sed, ultrices id nibh. In elementum libero placerat, bibendum nunc ac, malesuada lectus.</p>
                            </div>
                        </details>
                        <details class="rd-accordion-group">
                            <summary class="rd-accordion-header">Section 3</summary>
                            <div class="rd-accordion-body">
                                <p>Suspendisse efficitur, metus sed consectetur elementum, nulla turpis rutrum diam, ut mattis dolor dui a felis. Nullam at massa non lorem ornare dapibus sit amet ut enim. Donec id lacus dapibus, tempus tellus aliquam, rutrum ligula. Pellentesque pellentesque dui nec metus pharetra, in condimentum orci euismod. Nulla vehicula purus ut ex consectetur dignissim.</p>
                            </div>
                        </details>
                    </div><!--.rd-accordion-->
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-accordion-use-details" data-target-src-remove-first-space="20"></pre>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
        <script src="assets/js/rdta/components/rdta-accordion.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                RDTAAccordion.init('.rd-accordion');
            });
        </script>
    </body>
</html>