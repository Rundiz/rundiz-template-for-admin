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
    <body ontouchstart="">
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
<?php include 'includes/partials/page-sidebar.php'; ?> 
            <main>
                <?php
                echo renderBreadcrumb(['./' => 'Home', '#' => $title]);
                ?> 
                <div class="rd-page-content">
                    <h1>Accordion</h1>
                    <p>
                        In order to make accordion works, add these files.
                        <strong>assets/css/rdta/components/rdta-accordion.css</strong>,
                        <strong>assets/js/rdta/components/rdta-accordion.js</strong>
                    </p>
                    <hr>

                    <h2>Examples</h2>
                    <div class="rd-accordion" style="margin-bottom: .625em;">
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
                    <pre>&lt;div class=&quot;rd-accordion&quot;&gt;
    &lt;div class=&quot;rd-accordion-group&quot;&gt;
        &lt;h3 id=&quot;accordion-heading1&quot; class=&quot;rd-accordion-header active&quot;&gt;&lt;a data-toggle=&quot;accordion&quot; data-target=&quot;#accordion1&quot; aria-controls=&quot;accordion1&quot; aria-expanded=&quot;true&quot;&gt;Section 1&lt;/a&gt;&lt;/h3&gt;
        &lt;div id=&quot;accordion1&quot; class=&quot;rd-accordion-body collapse expanded&quot; aria-labelledby=&quot;accordion-heading1&quot;&gt;
            &lt;p&gt;Content of section 1.&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;rd-accordion-group&quot;&gt;
        &lt;h3 id=&quot;accordion-heading2&quot; class=&quot;rd-accordion-header&quot;&gt;&lt;a data-toggle=&quot;accordion&quot; data-target=&quot;#accordion2&quot; aria-controls=&quot;accordion2&quot; aria-expanded=&quot;false&quot;&gt;Section 2&lt;/a&gt;&lt;/h3&gt;
        &lt;div id=&quot;accordion2&quot; class=&quot;rd-accordion-body collapse&quot; aria-labelledby=&quot;accordion-heading2&quot;&gt;
            &lt;p&gt;Content of section 2.&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;rd-accordion-group&quot;&gt;
        &lt;h3 id=&quot;accordion-heading3&quot; class=&quot;rd-accordion-header&quot;&gt;&lt;a data-toggle=&quot;accordion&quot; data-target=&quot;#accordion3&quot; aria-controls=&quot;accordion3&quot; aria-expanded=&quot;false&quot;&gt;Section 3&lt;/a&gt;&lt;/h3&gt;
        &lt;div id=&quot;accordion3&quot; class=&quot;rd-accordion-body collapse&quot; aria-labelledby=&quot;accordion-heading3&quot;&gt;
            &lt;p&gt;Content of section 3.&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</pre>
                    <p>The accordion maybe in <code>ul</code> element.</p>
                    <ul class="rd-accordion">
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
                    <h3>Show only one</h3>
                    <p>The accordion can be show only one body while other will be collapsed. Add <code>data-accordion-one=&quot;true&quot;</code> to the element that contain <code>rd-accordion</code> class to enable this feature.</p>
                    <div class="rd-accordion" data-accordion-one="true">
                        <div class="rd-accordion-group">
                            <h3 id="ex3-accordion-heading1" class="rd-accordion-header"><a data-toggle="accordion" data-target="#ex3-accordion1" aria-controls="ex3-accordion1">Section 1</a></h3>
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