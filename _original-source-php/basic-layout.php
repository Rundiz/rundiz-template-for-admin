<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Basic layout';
include 'includes/html-head.php'; 
?> 
    </head>
    <body ontouchstart="">
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
            <div class="rd-sidebar-back"></div>
            <section class="rd-sidebar">
                <div class="rd-sidebar-inner">
                    <ul class="rd-sidebar-item-list sm sm-vertical sm-rdta">
                        <li><a href="#" onclick="return false;"><i class="fa fa-circle fa-fw"></i> <span class="rd-sidebar-menu-text">Menu item</span></a></li>
                        <li><a href="#" onclick="return false;"><i class="fa fa-circle fa-fw"></i> <span class="rd-sidebar-menu-text">Menu item</span></a></li>
                    </ul>
                    <ul class="rd-sidebar-item-list rd-sidebar-expand-collapse-controls">
                        <li>
                            <a data-target=".rd-page-wrapper" title="Expane/collapse menu"><i class="fa fa-chevron-left fa-fw" data-toggle-icon="fa-chevron-left fa-chevron-right"></i> <span class="screen-reader-only" aria-hidden="true">Expane/collapse menu</span></a>
                            <hr>
                        </li>
                    </ul>
                </div><!--.rd-sidebar-inner-->
            </section><!--.rd-sidebar-->
            <main>
                <?php
                echo renderBreadcrumb(['./' => 'Home', '#' => $title]);
                ?> 
                <div class="rd-page-content">
                    <h1>Basic layout</h1>
                    <p>
                        Your content will be here inside <code>.rd-page-content</code> class.<br>
                        To begins design your page content, copy this page source code, remove these two paragraphs (&lt;p&gt;) and let's start.
                    </p>
                    <p><em>For development only.</em> Let's see how <a href="basic-layout-cssgrid.php">CSS grid</a> works in Microsoft Edge.</p>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>