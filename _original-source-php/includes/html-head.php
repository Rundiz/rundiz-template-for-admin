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
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/sanitize/sanitize.css?v=11.0.0'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/sanitize/typography.css?v=11.0.0'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/sanitize/forms.css?v=11.0.0'); ?>">

        <link rel="stylesheet" href="<?php echo assetUrl('assets/font-awesome/css/all.min.css?v=5.10.2'); ?>">

        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/smartmenus/sm-core-css.css?v=1.1.0'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/smartmenus/sm-rdta/sm-rdta.css'); ?>">

        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/typo-and-form/typo-and-form.css'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/rundiz-template-admin.css'); ?>">

        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta-demo-pages.css'); ?>">