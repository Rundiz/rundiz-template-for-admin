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

        <link rel="stylesheet" href="<?php echo assetUrl('assets/font-awesome/css/all.min.css', ['npm' => '@fortawesome/fontawesome-free']); ?>">

        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/smartmenus/sm-core-css.css', ['npm' => 'smartmenus']); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/smartmenus/sm-rdta/sm-rdta.css'); ?>">

        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/typo-and-form/typo-and-form.css'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/rundiz-template-admin.css'); ?>">

        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta-demo-pages.css'); ?>">

        <link class="exclude-preview" rel="stylesheet" href="<?php echo assetUrl('assets/css-preview/prism.css'); ?>">
        <link class="exclude-preview" rel="stylesheet" href="<?php echo assetUrl('assets/css-preview/view-source.css'); ?>">
        