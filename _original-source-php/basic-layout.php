<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Basic layout (getting started)';
include 'includes/html-head.php'; 
?> 
    </head>
    <body>
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
            <div class="rd-sidebar-back"></div>
            <section class="rd-sidebar">
                <div class="rd-sidebar-inner">
                    <ul class="rd-sidebar-item-list sm sm-vertical sm-rdta">
                        <li><a href="#" onclick="return false;"><i class="sidebar-icon fa-solid fa-circle fa-fw"></i> <span class="rd-sidebar-menu-text">Menu item</span></a></li>
                        <li><a href="#" onclick="return false;"><i class="sidebar-icon fa-solid fa-circle fa-fw"></i> <span class="rd-sidebar-menu-text">Menu item</span></a>
                            <ul>
                                <li><a href="#" onclick="return false;">Sub menu item</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="rd-sidebar-item-list rd-sidebar-expand-collapse-controls">
                        <li>
                            <a data-target=".rd-page-wrapper" title="Expane/collapse menu"><i class="sidebar-icon faicon fa-solid fa-chevron-left fa-fw" data-toggle-icon="fa-chevron-left fa-chevron-right"></i> <span class="screen-reader-only" aria-hidden="true">Expane/collapse menu</span></a>
                            <hr>
                        </li>
                    </ul>
                </div><!--.rd-sidebar-inner-->
            </section><!--.rd-sidebar-->
            <main>
<?php echo renderBreadcrumb(['./' => 'Home', '#' => $title], 4); ?> 
                <div class="rd-page-content">
                    <h1><?php echo $title; ?></h1>
                    <p>
                        Your content will be here inside <code>.rd-page-content</code> class.<br>
                        To begins design your page content, copy this page source code, remove these two paragraphs (&lt;p&gt;) and let's start.
                    </p>
                    <p>The <abbr title="Rundiz template for admin">RDTA</abbr> use CSS grid by default since version 1.0.<br>
                        To go back to use CSS flexbox as layout please modify the file <strong>assets/scss/rundiz-template-admin.scss</strong> and change the code from <code>@import 'layout/_layout-displaygrid';</code> to <code>@import 'layout/_layout';</code>
                        and then compile the scss using this command <kbd>sass --update assets/scss:assets/css</kbd>.
                    </p>
                    <pre class="preview-source"></pre>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>