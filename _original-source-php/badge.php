<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Badge';
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
                    <h1>Badge</h1>
                    <p>The notification badge.</p>
                    <hr>

                    <h2>Examples</h2>
                    <p>
                        This is normal text size.
                        <span class="rd-notification-badge">Normal</span>
                        <span class="rd-notification-badge badge-primary">Primary</span>
                        <span class="rd-notification-badge badge-info">Info</span>
                        <span class="rd-notification-badge badge-danger">Danger</span>
                        <span class="rd-notification-badge badge-warning">Warning</span>
                        <span class="rd-notification-badge badge-success">Success</span>
                    </p>

                    <h3>Badge within heading text</h3>
                    <h1>Heading 1 <span class="rd-notification-badge">Normal</span></h1>
                    <h2>Heading 2 <span class="rd-notification-badge">Normal</span></h2>
                    <h3>Heading 3 <span class="rd-notification-badge">Normal</span></h3>
                    <h4>Heading 4 <span class="rd-notification-badge">Normal</span></h4>
                    <h5>Heading 5 <span class="rd-notification-badge">Normal</span></h5>
                    <h6>Heading 6 <span class="rd-notification-badge">Normal</span></h6>

                    <h3>Tiny badge</h3>
                    <p>
                        <span class="rd-notification-badge tiny">Normal</span>
                        <span class="rd-notification-badge badge-primary tiny">Primary</span>
                        <span class="rd-notification-badge badge-info tiny">Info</span>
                        <span class="rd-notification-badge badge-danger tiny">Danger</span>
                        <span class="rd-notification-badge badge-warning tiny">Warning</span>
                        <span class="rd-notification-badge badge-success tiny">Success</span>
                    </p>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>