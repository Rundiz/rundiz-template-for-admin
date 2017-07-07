<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php include 'includes/html-head.php'; ?> 
    </head>
    <body ontouchstart="">
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
<?php include 'includes/partials/page-sidebar.php'; ?> 
            <main>
                <?php
                echo renderBreadcrumb(['./' => 'Home']);
                ?> 
                <div class="rd-page-content">
                    <h1>Rundiz template for admin</h1>
                    <p>is the HTML template and CSS, JS set for admin page layout. It also come with essential components that mostly administrator application have to use.</p>
                    <p><abbr title="Rundiz template for admin">RDTA</abbr> support modern browsers such as Firefox, Google Chrome, Microsoft Edge, Opera, Safari, Vivaldi in all OS.</p>
                    <p>Almost all element (&gt; 90%) was reset the design to display the same way cross browsers and yes we do <a href="http://www.outlinenone.com/" target="outlinenone_com">support accessibility</a>.</p>
                    <hr>
                    <p>Check for the last update or fork me on <a href="https://github.com/Rundiz/rundiz-template-for-admin" target="rdta_on_github">Github</a></p>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>