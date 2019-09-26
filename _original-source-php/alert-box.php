<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Alert box';
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
                    <h1>Alert box</h1>
                    <p>The alert box with notification message.</p>
                    <hr>

                    <h2>Examples</h2>
                    <div class="rd-alertbox">
                        Default alert box. Please follow <a href="#" onclick="return false">this link</a>.
                    </div>
                    <div class="rd-alertbox alert-info">
                        Info alert box. Please follow <a href="#" onclick="return false">this link</a>.
                    </div>
                    <div class="rd-alertbox alert-danger">
                        Danger alert box. Please follow <a href="#" onclick="return false">this link</a>.
                    </div>
                    <div class="rd-alertbox alert-warning">
                        Warning alert box. Please follow <a href="#" onclick="return false">this link</a>.
                    </div>
                    <div class="rd-alertbox alert-success">
                        Success alert box. Please follow <a href="#" onclick="return false">this link</a>.
                    </div>

                    <h3>Dismissable</h3>
                    <div class="rd-alertbox is-dismissable">
                        <button class="close" type="button" aria-label="Close" onclick="return RundizTemplateAdmin.closeAlertbox(this);"><span aria-hidden="true">&times;</span></button>
                        Default alert box. Please follow <a href="#" onclick="return false">this link</a>.
                    </div>
                    <div class="rd-alertbox alert-info is-dismissable">
                        <button class="close" type="button" aria-label="Close" onclick="return RundizTemplateAdmin.closeAlertbox(this);"><span aria-hidden="true">&times;</span></button>
                        Info alert box. Please follow <a href="#" onclick="return false">this link</a>.
                    </div>
                    <div class="rd-alertbox alert-danger is-dismissable">
                        <button class="close" type="button" aria-label="Close" onclick="return RundizTemplateAdmin.closeAlertbox(this);"><span aria-hidden="true">&times;</span></button>
                        Danger alert box. Please follow <a href="#" onclick="return false">this link</a>.
                    </div>
                    <div class="rd-alertbox alert-warning is-dismissable">
                        <button class="close" type="button" aria-label="Close" onclick="return RundizTemplateAdmin.closeAlertbox(this);"><span aria-hidden="true">&times;</span></button>
                        Warning alert box. Please follow <a href="#" onclick="return false">this link</a>.
                    </div>
                    <div class="rd-alertbox alert-success is-dismissable">
                        <button class="close" type="button" aria-label="Close" onclick="return RundizTemplateAdmin.closeAlertbox(this);"><span aria-hidden="true">&times;</span></button>
                        Success alert box. Please follow <a href="#" onclick="return false">this link</a>.
                    </div>
                    <h4>Using <code>jQuery(this)</code></h4>
                    <div class="rd-alertbox is-dismissable">
                        <button class="close" type="button" aria-label="Close" onclick="return RundizTemplateAdmin.closeAlertbox(jQuery(this));"><span aria-hidden="true">&times;</span></button>
                        Default alert box. Please follow <a href="#" onclick="return false">this link</a>.
                    </div>

                    <h3>Alert with more content</h3>
                    <div class="rd-alertbox alert-warning">
                        <h4>Warning!</h4>
                        <p>This is the warning text.</p>
                    </div>
                    <div class="rd-alertbox alert-danger">
                        <ul class="rd-alert-list">
                            <li>Username field is required.</li>
                            <li>Email field is invalid.</li>
                        </ul>
                    </div>
                    <div class="rd-alertbox alert-info">
                        <p>Please follow instruction.</p>
                        <ol class="rd-alert-list">
                            <li>Press <kbd>F5</kbd></li>
                            <li>Read this message</li>
                        </ol>
                    </div>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>