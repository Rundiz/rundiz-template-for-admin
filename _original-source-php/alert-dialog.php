<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Alert dialog';
include 'includes/html-head.php'; 
?> 
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/components/rdta-dialog.css'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/components/rdta-alertdialog.css'); ?>">
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
                    <h1>Alert dialog</h1>
                    <p>The alert dialog with styles.</p>
                    <p>
                        In order to make dialog works, add these files.
                        <strong>assets/css/rdta/components/rdta-alertdialog.css</strong>,
                        <strong>assets/js/rdta/components/rdta-alertdialog.js</strong>
                    </p>
                    <hr>

                    <h2>Examples</h2>
                    <p>Normal JS alert box. <a href="#" onclick="alert('Hello, this is normal JS alert.');">Show normal JS alert.</a></p>
                    <pre><code class="language-js"><?php echo htmlspecialchars("alert('Hello, this is normal JS alert.');", ENT_QUOTES); ?></code></pre>
                    <?php
                    $alertTypes = ['info', 'danger', 'warning', 'success'];
                    foreach ($alertTypes as $alertType) {
                    ?> 
                    <p><?php echo ucfirst($alertType); ?> alert dialog. <a href="#" onclick="return rdtaAlertBoxShowAlert('<?php echo $alertType; ?>');">Show me.</a></p>
                    <pre><code class="language-js"><?php echo htmlspecialchars(
"RDTAAlertDialog.alert({
    'type': '$alertType',
    'html': '<p>Hello, this is RDTA alert dialog. You can use <strong>HTML</strong> here.</p>',
});"
                    , ENT_QUOTES); ?></code></pre>
                    <?php 
                    }// endforeach;
                    unset($alertType, $alertTypes);
                    ?> 
                    <p>Text alert dialog. <a href="#" onclick="RDTAAlertDialog.alert({'type': 'info', 'text': 'Alert that contain <strong>text</strong> only.'});">Show me.</a></p>
                    <p>If both <code>text</code> &amp <code>html</code> were set, it will be use <code>text</code> by default.</p>
                    <pre><code class="language-js"><?php echo htmlspecialchars("RDTAAlertDialog.alert({'type': 'info', 'text': 'Alert that contain <strong>text</strong> only.'});", ENT_QUOTES); ?></code></pre>

                    <h3>Alert dialog on modal dialog</h3>
                    <button type="button" data-toggle="dialog" data-target="#dialog02">Open modal dialog</button>
                    <div id="dialog02" class="rd-dialog-modal" tabindex="-1">
                        <div class="rd-dialog rd-dialog-size-large">
                            <div class="rd-dialog-header">
                                <h4 class="rd-dialog-title">Dialog with modal</h4>
                                <button class="rd-dialog-close" type="button" aria-label="Close" data-dismiss="dialog">
                                    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="rd-dialog-body">
                                <p>The modal dialog with backdrop.</p>
                                <p>Show me <a href="#" onclick="return rdtaAlertBoxShowAlert('danger');">alert dialog</a>.</p>
                            </div>
                            <div class="rd-dialog-footer">
                                <button class="rd-button primary" type="button">Save</button>
                                <button class="rd-button" type="button" data-dismiss="dialog">Close</button>
                            </div>
                        </div>
                    </div>
                    <h3>Events</h3>
                    <p>RDTA alert dialog have few events for hooking.</p>
                    <table class="rd-datatable">
                        <thead>
                            <tr>
                                <th>Event type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>rdta.alertdialog.opened</td>
                                <td>This event is fired when alert dialog was opened.</td>
                            </tr>
                            <tr>
                                <td>rdta.alertdialog.closed</td>
                                <td>This event is fired when alert dialog was closed.</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>Click on <a href="#" onclick="RDTAAlertDialog.alert({'type': 'info', 'text': 'See events log on the page.'});">this link</a> to open alert dialog and see its events.</p>
                    <div class="rd-alertdialog-events rdta-demopage-debugbox"></div>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
        <script src="assets/js/rdta/components/rdta-dialog.js"></script>
        <script src="assets/js/rdta/components/rdta-alertdialog.js"></script>
        <script>
            function rdtaAlertBoxShowAlert(alertType = 'info') {
                RDTAAlertDialog.alert({
                    'type': alertType,
                    'html': '<p>Hello, this is RDTA alert dialog. You can use <strong>HTML</strong> here.</p>',
                });

                return false;
            }// rdtaAlertBoxShowAlert


            function rdtaDebugAlertDialogEvents() {
                document.body.addEventListener('rdta.alertdialog.opened', function() {
                    document.querySelector('.rd-alertdialog-events').insertAdjacentHTML('beforeend', 'Alert dialog opened<br>');
                }, false);
                document.body.addEventListener('rdta.alertdialog.closed', function() {
                    document.querySelector('.rd-alertdialog-events').insertAdjacentHTML('beforeend', 'Alert dialog closed<br>');
                }, false);
            }// rdtaDebugAlertDialogEvents


            document.addEventListener('DOMContentLoaded', function() {
                RDTADialog.init();
                rdtaDebugAlertDialogEvents();
            });
        </script>
    </body>
</html>