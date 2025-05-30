<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Page options';
include 'includes/html-head.php'; 
?> 
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/components/rdta-page-options.css'); ?>">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/components/rdta-tabs.css'); ?>">
    </head>
    <body>
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
<?php include 'includes/partials/page-sidebar.php'; ?> 
            <main>
<?php echo renderBreadcrumb(['./' => 'Home', '#' => $title], 4); ?> 
                <div class="rd-page-options-container code-sample-page-options-container">
                    <div class="rd-page-options-buttons-row">
                        <button class="rd-button small rd-page-options-button" type="button" aria-controls="rd-page-options-wrap" aria-expanded="false">
                            <i class="fa-solid fa-sliders"></i> Page Options
                        </button>
                        <button class="rd-button small rd-page-options-button" type="button" aria-controls="rd-page-options-help-wrap" aria-expanded="false">
                            <i class="fa-solid fa-question"></i> Help
                        </button>
                    </div><!--.rd-page-options-buttons-row-->
                    <div class="rd-page-options-contents-row">
                        <div id="rd-page-options-wrap" aria-label="Page Options">
                            <p>Sample with class <code>rd-form</code> and horizontal form.</p>
                            <form class="rd-form horizontal">
                                <div class="form-group">
                                    <label class="control-label" for="input-type-text2">Input text</label>
                                    <div class="control-wrapper">
                                        <input id="input-type-text2" type="text">
                                        <div class="form-description">The help message about this form input.</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Checkboxes</label>
                                    <div class="control-wrapper">
                                        <label><input type="checkbox"> Checkbox 1</label><br>
                                        <label><input type="checkbox"> Checkbox 2</label><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Checkboxes inline</label>
                                    <div class="control-wrapper">
                                        <label><input type="checkbox"> Option 1</label>
                                        <label><input type="checkbox"> Option 2</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"></label>
                                    <div class="control-wrapper">
                                        <button class="rd-button primary" type="button">Save</button>
                                    </div>
                                </div>
                            </form>
                            <form>
                                Just checkboxes in the form without class <code>rd-form</code><br>
                                <label><input type="checkbox"> Option 1</label>
                                <label><input type="checkbox"> Option 2</label>
                            </form>
                        </div>
                        <div id="rd-page-options-help-wrap" aria-label="Help">
                            <div class="tabs tabs-vertical rd-tabs-no-padding">
                                <ul>
                                    <li><a href="#" data-targettab="#tabs-v1">Overview</a></li>
                                    <li><a href="#" data-targettab="#tabs-v2">Navigation</a></li>
                                </ul>
                                <div id="tabs-v1">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque venenatis dolor volutpat, cursus purus eget, tincidunt risus.</p>
                                </div>
                                <div id="tabs-v2">
                                    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis.</p>
                                </div>
                            </div>
                        </div>
                    </div><!--.rd-page-options-contents-row-->
                </div><!--.rd-page-options-container-->

                <div class="rd-page-content">
                    <h1><?php echo $title; ?></h1>
                    <p class="rdta-version-info">(Since v.2.4.1)</p>
                    <p>In order to make page options works, add these files. 
                        <strong>assets/css/rdta/components/rdta-page-options.css</strong>, 
                        <strong>assets/js/rdta/components/rdta-page-options.js</strong>
                    </p>
                    <p>Start by use the HTML elements as shown below.</p>
                    <h5>Source</h5>
                    <pre><code class="language-html"><?php 
$sampleHTML = <<<EOT
<div class="rd-page-options-container">
    <div class="rd-page-options-buttons-row">
        <button class="rd-button small rd-page-options-button" type="button" aria-controls="rd-page-options-wrap" aria-expanded="false">
            <i class="fa-solid fa-sliders"></i> Page Options
        </button>
        <button class="rd-button small rd-page-options-button" type="button" aria-controls="rd-page-options-help-wrap" aria-expanded="false">
            <i class="fa-solid fa-question"></i> Help
        </button>
    </div><!--.rd-page-options-buttons-row-->
    <div class="rd-page-options-contents-row">
        <div id="rd-page-options-wrap" aria-label="Page Options">
            ...
        </div>
        <div id="rd-page-options-help-wrap" aria-label="Help">
            ...
        </div>
    </div><!--.rd-page-options-contents-row-->
</div>
EOT;
                    echo trim(htmlspecialchars($sampleHTML, ENT_QUOTES));
                    unset($sampleHTML);
                    ?></code></pre>
                    <p>Copy the HTML above and paste them before the element that contain class <code>.rd-page-content</code>.</p>
                    <h5>Source</h5>
                    <pre><code class="language-html"><?php 
$sampleHTML = <<<EOT
<div class="rd-page-options-container">
    ...
</div>
<div class="rd-page-content">
    <!-- Yout admin page start here. -->
</div>
EOT;
                    echo trim(htmlspecialchars($sampleHTML, ENT_QUOTES));
                    unset($sampleHTML);
                    ?></code></pre>
                    <p>Then enable its functional.</p>
                    <h5>Source</h5>
                    <pre><code class="language-js">document.addEventListener('DOMContentLoaded', function() {
    RDTAPageOptions.init();
});</code></pre>
                    <h3>Events</h3>
                    <p>RDTA page options have few events for hooking.</p>
                    <table class="rd-datatable">
                        <thead>
                            <tr>
                                <th>Event type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>rdta.pageoptions.opened</td>
                                <td>This event is fired when page option was completely opened. This means after other page option was closed except currently active.</td>
                            </tr>
                            <tr>
                                <td>rdta.pageoptions.closed</td>
                                <td>This event is fired when page option was closed.</td>
                            </tr>
                            <tr>
                                <td>rdta.pageoptions.closed.other</td>
                                <td>This event is fired when other page options was closed except the active one.</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>The sample events will be show below this line. Open browser console to see more details.</p>
                    <div class="rd-page-options-events rdta-demopage-debugbox"></div>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
        <script src="assets/js/rdta/components/rdta-page-options.js"></script>
        <script src="assets/js/rdta/components/rdta-tabs.js"></script>
        <script>
            function rdtaDebugPageOptionsEvents() {
                document.body.addEventListener('rdta.pageoptions.opened', (event) => {
                    document.querySelector('.rd-page-options-events').insertAdjacentHTML('beforeend', 'Page options opened<br>');
                    console.log('rdta.pageoptions.opened', event.detail);
                });
                document.body.addEventListener('rdta.pageoptions.closed', (event) => {
                    document.querySelector('.rd-page-options-events').insertAdjacentHTML('beforeend', 'Page options closed<br>');
                    console.log('rdta.pageoptions.closed', event.detail);
                });
                document.body.addEventListener('rdta.pageoptions.closed.other', (event) => {
                    document.querySelector('.rd-page-options-events').insertAdjacentHTML('beforeend', 'Other page options closed<br>');
                    console.log('rdta.pageoptions.closed.other', event.detail);
                });
            }// rdtaDebugPageOptionsEvents


            document.addEventListener('DOMContentLoaded', function() {
                RDTAPageOptions.init();
                rdtaDebugPageOptionsEvents();

                RDTATabs.init('.tabs');
            });
        </script>
    </body>
</html>