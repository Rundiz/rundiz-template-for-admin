<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rundiz template for admin</title>
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/sanitize/sanitize.css?v=8.0.0'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/sanitize/typography.css?v=8.0.0'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/sanitize/forms.css?v=8.0.0'); ?>">

        <link rel="stylesheet" href="<?php echo assetUrl('assets/font-awesome/css/all.min.css?v=5.8.2'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/smartmenus/sm-core-css.css'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/smartmenus/sm-rdta/sm-rdta.css'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/typo-and-form/typo-and-form.css'); ?>">

        <style type="text/css">
            .rd-template-admin,
            body {
                height: 100%;
            }
            .rd-template-admin body {
                padding-top: 3.125rem;
            }
            .rd-template-admin body > header {
                background-color: #222;
                color: #aaa;
                display: flex;
                height: 3.125rem;
                left: 0;
                position: fixed;
                right: 0;
                top: 0;
                z-index: 10000;
            }
            .rd-site-brand {
                align-items: center;
                display: flex;
                font-size: 1.188em;
                height: 3.125rem;
                margin-left: 0.625rem;
            }


            /* css grid layout */
            .rd-page-wrapper {
                display: -ms-grid;
                display: grid;
                -ms-grid-columns: 160px auto;
                -ms-grid-rows: auto 1.656rem;
                grid-template-columns: 160px auto;
                grid-template-rows: auto 1.656rem;
                height: auto;
                min-height: 100%;
                position: relative;
            }
            .rd-page-wrapper .rd-sidebar {
                -ms-grid-column: 1;
                -ms-grid-row: 1;
                grid-column-end: 2;
                grid-column-start: 1;
                grid-row-end: 3;
                grid-row-start: 1;
            }
            .rd-page-wrapper > main {
                -ms-grid-column: 2;
                -ms-grid-row: 1;
                grid-column-start: 2;
                grid-row-end: 2;
                grid-row-start: 1;
                min-width: 0;/* fix table push this element over screen width ( https://stackoverflow.com/questions/43311943/prevent-grid-items-from-stretching-in-css-grid-layout ) */
            }

            .rd-page-wrapper > footer {
                display: flex;
                -ms-grid-column: 2;
                -ms-grid-row: 2;
                grid-column-start: 2;
                grid-row-end: 3;
                grid-row-start: 2;
            }
            .rd-page-wrapper > footer .rd-page-footer-left,
            .rd-page-wrapper > footer .rd-page-footer-right {
                flex-grow: 1;
            }
            .rd-page-wrapper > footer .rd-page-footer-right {
                text-align: right;
            }


            .rd-sidebar-back {
                background-color: #222;
                bottom: 0;
                display: block;
                position: absolute;
                top: 0;
                width: 160px;
                z-index: -1;
            }
            .rd-sidebar-inner {
                z-index: 2;
            }


            .wrap-table {
                display: block;
                overflow-x: auto;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="rd-site-brand">Admin Dashboard</div><!--.rd-site-brand-->
        </header>
        <div class="rd-page-wrapper">
<?php include 'includes/partials/page-sidebar.php'; ?> 
            <main>
                <div class="rd-page-content">
                    <h1>Basic layout using CSS grid</h1>
                    <p>
                        Demonstrate how the page layout will be.<br>
                        This page should render correctly in all browsers including new version of Microsoft Edge.
                    </p>
                    <p>Test table cause overflow. (3 duplicate email columns is for test very wide table that will be over screen width shoud be wrapped inside <code>.wrap-table</code> class.</p>
                    <div class="wrap-table">
                        <table class="rd-datatable">
                            <thead>
                                <tr>
                                    <th class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(jQuery(this));"></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Email</th>
                                    <th>Email</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="column-checkbox"><input type="checkbox" name="id[]" value="1"></td>
                                    <td>1</td>
                                    <td>Gwendolyn Uphill</td>
                                    <td>282 Springview Street</td>
                                    <td>guphill0@upenn.edu</td>
                                    <td>guphill0@upenn.edu</td>
                                    <td>guphill0@upenn.edu</td>
                                    <td>guphill0@upenn.edu</td>
                                    <td>
                                        <button class="rd-button small"><i class="fas fa-pencil-alt"></i> Edit</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column-checkbox"><input type="checkbox" name="id[]" value="2"></td>
                                    <td>2</td>
                                    <td>Reinhold Keneleyside</td>
                                    <td>820 Old Gate Parkway</td>
                                    <td>rkeneleyside1@de.vu</td>
                                    <td>rkeneleyside1@de.vu</td>
                                    <td>rkeneleyside1@de.vu</td>
                                    <td>rkeneleyside1@de.vu</td>
                                    <td>
                                        <button class="rd-button small"><i class="fas fa-pencil-alt"></i> Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->


<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>