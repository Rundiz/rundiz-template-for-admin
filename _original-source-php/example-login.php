<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Example login page';
?> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php
        $titleAppend = 'Rundiz template for admin';
        if (isset($title)) {
            echo $title . ' | ' . $titleAppend;
        } else {
            echo $titleAppend;
        }
        unset($titleAppend);
        ?></title>
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/sanitize/sanitize.css', ['npm' => 'sanitize.css']); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/sanitize/typography.css', ['npm' => 'sanitize.css']); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/sanitize/forms.css', ['npm' => 'sanitize.css']); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/typo-and-form/typo-and-form.css'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/rundiz-template-admin.css'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/columns/columns-flex.css'); ?>">
    </head>
    <body>
        <main class="rd-columns-flex-container">
            <div class="col-xs-8 offset-xs-2 col-sm-4 offset-sm-4 col-md-4 offset-md-4">
                <h1 class="text-center">Login page</h1>
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
        

    </body>
</html>