<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Example logout page';
include 'includes/html-head.php'; 
?> 
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/columns/columns-flex.css'); ?>">
    </head>
    <body ontouchstart="">
        <main class="rd-columns-flex-container">
            <div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4">
                <h1>Logout page</h1>
                <form class="rd-form">
                    <div class="text-center">
                        <span class="fa-stack fa-3x">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <div class="control-wrapper">
                            <label>
                                <input type="checkbox"> Log me out on all devices
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-wrapper">
                            <button class="rd-button primary" type="button">Logout</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>