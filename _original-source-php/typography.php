<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html>
    <head>
<?php
$title = 'Typography';
include 'includes/html-head.php'; 
?> 
        <style>
            main {
                margin: 0 auto; 
                max-width: 1200px; 
                padding-left: 0.313em; 
                padding-right: 0.313em;
                position: relative;
            }

            .float-menu-inpage-nav {
                display: none;
            }
            @media (min-width: 1800px) {
                .float-menu-inpage-nav {
                    display: block;
                    position: absolute;
                    right: -290px;
                    top: 10px;
                    width: 280px;
                }
                .float-menu-fixed {
                    border: 1px solid black;
                    max-height: 90vh;
                    overflow-y: auto;
                    padding: 5px;
                    position: fixed;
                    width: 280px;
                }
            }

            .wrap-contents-in-main {
                overflow: hidden;
            }
        </style>
    </head>
    <body>
        <main>
            <aside class="float-menu-inpage-nav">
                <div class="float-menu-fixed">
                    Navigation
                    <nav>
                        <ul>
                            <li><a href="#typography-head1to6">Heading</a></li>
                            <li><a href="#typography-paragraph">Paragraph</a>
                                <ul>
                                    <li><a href="#typography-inlineelements">In-line elements</a></li>
                                </ul>
                            </li>
                            <li><a href="#typography-links">Links</a></li>
                            <li><a href="#typography-address">Address</a></li>
                            <li><a href="#typography-blockquote">Blockquote</a></li>
                            <li><a href="#typography-code">Code</a></li>
                            <li><a href="#typography-lists">Lists</a>
                                <ul>
                                    <li><a href="#typography-lists-ul">Unordered list</a></li>
                                    <li><a href="#typography-lists-ol">Ordered list</a></li>
                                    <li><a href="#typography-lists-menu">Menu</a></li>
                                    <li><a href="#typography-lists-mixed">Mixed</a></li>
                                    <li><a href="#typography-lists-dl">Definition list</a></li>
                                    <li><a href="#typography-detailssummary">Details &amp; Summary</a></li>
                                </ul>
                            </li>
                            <li><a href="#typography-table">Table</a>
                                <ul>
                                    <li><a href="#typography-table-caption">Table with caption</a></li>
                                    <li><a href="#typography-table-colgroup">Table with colgroup</a></li>
                                </ul>
                            </li>
                            <li><a href="#multimedia-dialog">Dialog</a></li>
                            <li><a href="#multimedia-iframe">Iframe</a></li>
                            <li><a href="#multimedia-audiovideo">Audio &amp; video</a>
                                <ul>
                                    <li><a href="#multimedia-audiovideoaudio">Audio</a></li>
                                    <li><a href="#multimedia-audiovideovideo">Video</a></li>
                                    <li><a href="#multimedia-audiovideoembed">Embed</a></li>
                                    <li><a href="#multimedia-audiovideoobject">Object</a></li>
                                </ul>
                            </li>
                            <li><a href="#multimedia-image">Image</a>
                                <ul>
                                    <li><a href="#multimedia-image-fluidresponsive">Fluid or responsive image</a></li>
                                    <li><a href="#multimedia-image-figcaption">Image with figcaption</a></li>
                                    <li><a href="#multimedia-image-picture">Picture element</a></li>
                                </ul>
                            </li>
                            <li><a href="#form-progress">Progress</a></li>
                            <li><a href="#form-meter">Meter</a></li>
                            <li><a href="#form-elements">Form elements</a>
                                <ul>
                                    <li><a href="#form-datalist">Datalist</a></li>
                                    <li><a href="#form-output">Output</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <header>
                <h1>Typography & kitchen sink</h1>
            </header>
            <hr>
            <article class="wrap-contents-in-main">
<?php include 'includes/partials/typography.php'; ?> 
            </article>

            <section class="wrap-contents-in-main">
<?php include 'includes/partials/multimedia.php'; ?> 
            </section>

            <section class="wrap-contents-in-main">
<?php include 'includes/partials/form.php'; ?> 
            </section>
            <hr>


            <footer>
                <p>
                    By <a href="http://rundiz.com">rundiz.com</a>
                    | <a href="credits.php">Credits.</a>
                </p>
            </footer>
        </main>


<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>