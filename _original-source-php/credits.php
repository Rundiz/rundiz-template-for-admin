<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Credits';
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
                    <h1>Credits</h1>
                    <p><abbr title="Rundiz template for admin">RDTA</abbr> depend on many packages, thank you for these packages.</p>
                    <ul>
                        <li><a href="https://jquery.com" target="jquery">jQuery</a></li>
                        <li><a href="https://github.com/csstools/sanitize.css" target="sanitize.css">Sanitize.css</a></li>
                        <li><a href="https://www.smartmenus.org" target="smartmenus">SmartMenus</a></li>
                        <li><a href="https://fontawesome.com" target="fontawesome">Font Awesome</a></li>
                        <li><a href="https://popper.js.org" target="popper.js">Popper.js</a></li>
                        <li><a href="https://atomiks.github.io/tippyjs" target="tippy.js">tippy.js</a></li>
                        <li><a href="https://github.com/abouolia/sticky-sidebar" target="sticky-sidebar">Sticky Sidebar</a></li>
                        <li><a href="https://github.com/marcj/css-element-queries/blob/master/src/ResizeSensor.js" target="resizesensor">Resize Sensor</a></li>
                    </ul>
                    <h3>Build tools.</h3>
                    <ul>
                        <li><a href="https://www.php.net" target="php">PHP</a></li>
                        <li><a href="https://sass-lang.com" target="sass">Sass</a></li>
                        <li><a href="https://nodejs.org" target="node.js">Node.js</a></li>
                    </ul>
                    <h3>Reference</h3>
                    <ul>
                        <li><a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element" target="mdnhtmlelement">MDN HTML elements</a></li>
                        <li><a href="https://www.learningcontainer.com/mp4-sample-video-files-download/" target="samplevideo">Sample video file</a></li>
                        <li><a href="https://samplelib.com/sample-mp3.html" target="sampleaudio">Sample audio file</a></li>
                    </ul>
                    <h3>Etc.</h3>
                    <ul>
                        <li><a href="https://www.lipsum.com/" target="lipsum">Lorem Ipsum generator</a></li>
                        <li><a href="https://lorem.in.th/" target="thai-lipsum">Thai Lorem Ipsum generator</a></li>
                        <li><a href="https://generator.lorem-ipsum.info" target="other-languages-lipsum">Lorem Ipsum generator in other languages</a></li>
                        <li><a href="https://www.mockaroo.com/" target="mockaroo">Data generator</a></li>
                    </ul>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>