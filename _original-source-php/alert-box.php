<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Alert box';
include 'includes/html-head.php'; 
?> 
    </head>
    <body ontouchstart="">
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
                    <div class="rd-alertbox">
                        Default alert box. Example <a href="#" onclick="return false">link</a> inside alert box.
                    </div>
                    <pre>&lt;div class=&quot;rd-alertbox&quot;&gt;
    Default alert box. Please follow &lt;a href=&quot;#&quot; onclick=&quot;return false&quot;&gt;this link&lt;/a&gt;.
&lt;/div&gt;</pre>
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
                    <div class="rd-alertbox is-dismissable">
                        <button class="close" type="button" aria-label="Close" onclick="return RundizTemplateAdmin.closeAlertbox(this);"><span aria-hidden="true">&times;</span></button>
                        Default alert box. Example <a href="#" onclick="return false">link</a> inside alert box.
                    </div>
                    <pre>&lt;div class=&quot;rd-alertbox is-dismissable&quot;&gt;
    &lt;button class=&quot;close&quot; type=&quot;button&quot; aria-label=&quot;Close&quot; onclick=&quot;return RundizTemplateAdmin.closeAlertbox(this);&quot;&gt;&lt;span aria-hidden=&quot;true&quot;&gt;&amp;times;&lt;/span&gt;&lt;/button&gt;
    Default alert box. Example &lt;a href=&quot;#&quot; onclick=&quot;return false&quot;&gt;link&lt;/a&gt; inside alert box.
&lt;/div&gt;</pre>
                    <?php
                    foreach ($alertNames as $alertName) {
                        echo '<div class="rd-alertbox alert-' . $alertName . ' is-dismissable">' . PHP_EOL .
                            '<button class="close" type="button" aria-label="Close" onclick="return RundizTemplateAdmin.closeAlertbox(this);"><span aria-hidden="true">&times;</span></button>' . PHP_EOL .
                            ucfirst($alertName) . ' alert box by add <code>.alert-' . $alertName . '</code> class into alert box element. Example <a href="#" onclick="return false">link</a> inside alert box.' . PHP_EOL .
                            '</div>';
                    }// endforeach;
                    unset($alertName, $alertNames);
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
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>