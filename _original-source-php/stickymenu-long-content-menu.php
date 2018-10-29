<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Sticky menu (long content &amp; menu)';
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
                        <?php 
                        for ($i = 1; $i <= 50; $i++) {
                            echo indent(6).'<li><a href="#" onclick="return false;"><i class="sidebar-icon fas fa-circle fa-fw"></i> <span class="rd-sidebar-menu-text">Test ' . $i . '</span></a></li>'."\n";
                        }
                        ?> 
                    </ul>
                    <ul class="rd-sidebar-item-list rd-sidebar-expand-collapse-controls">
                        <li>
                            <a data-target=".rd-page-wrapper" title="Expane/collapse menu"><i class="sidebar-icon faicon fas fa-chevron-left fa-fw" data-toggle-icon="fa-chevron-left fa-chevron-right"></i> <span class="screen-reader-only" aria-hidden="true">Expane/collapse menu</span></a>
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
                    <h1>Sticky menu (long menu)</h1>
                    <p>
                        Demonstrate how the sticky menu works on long menu.<br>
                        The sticky menu uses <a href="https://github.com/abouolia/sticky-sidebar" target="stickysidebar">Sticky Sidebar</a>.
                    </p>

                    <p>Below is included part.</p>
                    <hr>

<?php include 'includes/partials/typography.php'; ?> 

                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>