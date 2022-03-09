<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Example logout page';
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
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/columns/columns-flex.css'); ?>">
    </head>
    <body>
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
        

    </body>
</html>