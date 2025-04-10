<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Sticky menu (long content)';
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
                    <h1>Sticky menu (long content)</h1>
                    <p>
                        Demonstrate how the sticky menu works on long content page.<br>
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