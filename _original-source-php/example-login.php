<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Example login page';
include 'includes/html-head.php'; 
?> 
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/columns/columns-flex.css'); ?>">
    </head>
    <body>
        <main class="rd-columns-flex-container">
            <div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4">
                <h1>Login page</h1>
                <form class="rd-form">
                    <div class="form-group">
                        <label class="control-label" for="user_login">Username or Email</label>
                        <div class="control-wrapper">
                            <input id="user_login" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="user_password">Password</label>
                        <div class="control-wrapper">
                            <input id="user_password" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-wrapper">
                            <label>
                                <input type="checkbox"> Remember my login
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-wrapper">
                            <button class="rd-button primary" type="button">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>