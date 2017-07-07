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
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/sanitize.css'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/smartmenus/sm-core-css.css'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/smartmenus/sm-rdta/sm-rdta.css'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/typo-and-form/typo-and-form.css'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rundiz-template-admin.css'); ?>">