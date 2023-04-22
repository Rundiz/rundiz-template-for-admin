<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Alert box';
include 'includes/html-head.php'; 
?> 
    </head>
    <body>
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
                    <div class="rd-alertbox rd-alertbox-sample-1">
                        Default alert box. Example <a href="#" onclick="return false">link</a> inside alert box.
                    </div>
                    <h3>Source</h3>
                    <pre class="preview-source" data-target-src=".rd-alertbox-sample-1" data-target-src-remove-first-space="20"></pre>
                    <?php
                    $alertNames = ['info', 'danger', 'warning', 'success'];
                    foreach ($alertNames as $alertName) {
                        echo '<div class="rd-alertbox alert-' . $alertName . '">' . PHP_EOL .
                            ucfirst($alertName) . ' alert box by add <code>.alert-' . $alertName . '</code> class into alert box element. Example <a href="#" onclick="return false">link</a> inside alert box.' . PHP_EOL .
                            '</div>';
                    }// endforeach;
                    unset($alertName);
                    ?> 

                    <h3>Dismissable</h3>
                    <div class="rd-alertbox is-dismissable rd-alertbox-sample-dismissable">
                        <button class="close" type="button" aria-label="Close" onclick="return RundizTemplateAdmin.closeAlertbox(this);"><span aria-hidden="true">&times;</span></button>
                        Default alert box. Example <a href="#" onclick="return false">link</a> inside alert box.
                    </div>
                    <h4>Source</h4>
                    <pre class="preview-source" data-target-src=".rd-alertbox-sample-dismissable" data-target-src-remove-first-space="20"></pre>
                    <?php
                    foreach ($alertNames as $alertName) {
                        echo '<div class="rd-alertbox alert-' . $alertName . ' is-dismissable">' . PHP_EOL .
                            '<button class="close" type="button" aria-label="Close" onclick="return RundizTemplateAdmin.closeAlertbox(this);"><span aria-hidden="true">&times;</span></button>' . PHP_EOL .
                            ucfirst($alertName) . ' alert box by add <code>.alert-' . $alertName . '</code> class into alert box element. Example <a href="#" onclick="return false">link</a> inside alert box.' . PHP_EOL .
                            '</div>';
                    }// endforeach;
                    unset($alertName);
                    ?> 

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

                    <h3>Placement</h3>
                    <div class="rdta-demopage-debugbox rd-block-level-margin-bottom">
                        <p>The alert box in default position (no fixed).</p>
                        <div class="rd-alertbox alert-info">
                            Info alert box.
                        </div>
                    </div>
                    <div class="rdta-demopage-debugbox">
                        <p>The alert box that will always stay at the top.</p>
                        <div class="rd-alertbox alert-info fixed-top rd-alertbox-sample-fixedtop">
                            Info alert box.
                        </div>
                    </div>
                    <h4>Source</h4>
                    <pre class="preview-source" data-target-src=".rd-alertbox-sample-fixedtop" data-target-src-remove-first-space="24"></pre>
                    <div class="rdta-demopage-debugbox">
                        <p>The alert box that will always stay at the bottom.</p>
                        <div class="rd-alertbox alert-info fixed-bottom code-sample-fixedbottom">
                            Info alert box.
                        </div>
                    </div>
                    <h4>Source</h4>
                    <pre class="preview-source" data-target-src=".code-sample-fixedbottom" data-target-src-remove-first-space="24"></pre>
                    <p>To see it in action, please click on the link below.</p>
                    <p>Show alert box fixed top for: 
                    <?php
                    foreach ($alertNames as $alertName) {
                        echo '<a href="#" onclick="return rdtaDemoShowAlertboxFixed(\'' . $alertName . '\', \'top\');">' . $alertName . '</a> ';
                    }// endforeach;
                    unset($alertName);
                    ?>
                    </p>
                    <p>Show alert box fixed bottom for: 
                    <?php
                    foreach ($alertNames as $alertName) {
                        echo '<a href="#" onclick="return rdtaDemoShowAlertboxFixed(\'' . $alertName . '\');">' . $alertName . '</a> ';
                    }// endforeach;
                    unset($alertName);
                    ?>
                    </p>
                    <div class="rdta-demopage-debugbox">
                        <p>The alert box that will always stay at the bottom (float).</p>
                        <div class="rd-alertbox alert-info float-bottom code-sample-floatbottom">
                            Info alert box.
                        </div>
                    </div>
                    <h4>Source</h4>
                    <pre class="preview-source" data-target-src=".code-sample-floatbottom" data-target-src-remove-first-space="24"></pre>
                    <p>To see it in action, please click on the link below.</p>
                    <p>Show alert box float top for: 
                    <?php
                    foreach ($alertNames as $alertName) {
                        echo '<a href="#" onclick="return rdtaDemoShowAlertboxFloat(\'' . $alertName . '\', \'top\');">' . $alertName . '</a> ';
                    }// endforeach;
                    unset($alertName);
                    ?>
                    </p>
                    <p>Show alert box float bottom for: 
                    <?php
                    foreach ($alertNames as $alertName) {
                        echo '<a href="#" onclick="return rdtaDemoShowAlertboxFloat(\'' . $alertName . '\');">' . $alertName . '</a> ';
                    }// endforeach;
                    unset($alertName);
                    ?>
                    </p>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
        <script>
            var timeout1, timeout2, timeout3, timeout4;

            function rdtaDemoShowAlertboxFixed(alertName, fixedPosition) {
                if (fixedPosition !== 'top') {
                    fixedPosition = 'bottom';
                }

                let alertboxHtml = '<div class="rd-alertbox alert-' + alertName + ' fixed-' + fixedPosition + ' is-dismissable alertbox-fixed-position-demo rd-animation fade">' +
                    '<button class="close" type="button" aria-label="Close" onclick="return RundizTemplateAdmin.closeAlertbox(this);"><span aria-hidden="true">&times;</span></button>' +
                    'This is alert box ' + alertName + '. This alert box will be disappear after few seconds with custom JS function.' +
                    '</div>';

                // remove previous alert box demo.
                if (document.querySelector('.alertbox-fixed-position-demo')) {
                    document.querySelector('.alertbox-fixed-position-demo').remove();
                }

                document.body.insertAdjacentHTML('beforeEnd', alertboxHtml);
                clearTimeout(timeout1);
                clearTimeout(timeout2);

                // make alert box demo disappear after few seconds.
                timeout1 = setTimeout(function() {
                    if (document.querySelector('.alertbox-fixed-position-demo')) {
                        document.querySelector('.alertbox-fixed-position-demo').classList.add('fade-out');
                    }
                }, 5000);
                // also remove alert box demo after disappeared.
                timeout2 = setTimeout(function() {
                    if (document.querySelector('.alertbox-fixed-position-demo')) {
                        document.querySelector('.alertbox-fixed-position-demo').remove();
                    }
                }, 5400);

                return false;
            }// rdtaDemoShowAlertboxFixed


            function rdtaDemoShowAlertboxFloat(alertName, floatPosition) {
                if (floatPosition !== 'top') {
                    floatPosition = 'bottom';
                }

                let alertboxHtml = '<div class="rd-alertbox alert-' + alertName + ' float-' + floatPosition + ' is-dismissable alertbox-float-position-demo rd-animation fade">' +
                    '<button class="close" type="button" aria-label="Close" onclick="return RundizTemplateAdmin.closeAlertbox(this);"><span aria-hidden="true">&times;</span></button>' +
                    'This is alert box ' + alertName + '. This alert box will be disappear after few seconds with custom JS function.' +
                    '</div>';

                // remove previous alert box demo.
                if (document.querySelector('.alertbox-float-position-demo')) {
                    document.querySelector('.alertbox-float-position-demo').remove();
                }

                document.body.insertAdjacentHTML('beforeEnd', alertboxHtml);
                clearTimeout(timeout3);
                clearTimeout(timeout4);

                // make alert box demo disappear after few seconds.
                timeout3 = setTimeout(function() {
                    if (document.querySelector('.alertbox-float-position-demo')) {
                        document.querySelector('.alertbox-float-position-demo').classList.add('fade-out');
                    }
                }, 5000);
                // also remove alert box demo after disappeared.
                timeout4 = setTimeout(function() {
                    if (document.querySelector('.alertbox-float-position-demo')) {
                        document.querySelector('.alertbox-float-position-demo').remove();
                    }
                }, 5400);

                return false;
            }// rdtaDemoShowAlertboxFloat
        </script>
    </body>
</html>