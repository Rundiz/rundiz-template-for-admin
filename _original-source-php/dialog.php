<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Dialog';
include 'includes/html-head.php'; 
?> 
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/components/rdta-dialog.css'); ?>">
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
                    <h1>Dialog</h1>
                    <p>
                        In order to make dialog works, add these files.
                        <strong>assets/css/rdta/components/rdta-dialog.css</strong>,
                        <strong>assets/js/rdta/components/rdta-dialog.js</strong>
                    </p>
                    <hr>

                    <h2>Examples</h2>
                    <div class="rd-dialog rd-block-level-margin-bottom" aria-labelledby="example-dialog-label" style="margin-left: auto; margin-right: auto;">
                        <div class="rd-dialog-header">
                            <h4 id="example-dialog-label" class="rd-dialog-title">Dialog header</h4>
                            <button class="rd-dialog-close" type="button" aria-label="Close">
                                <i class="fas fa-times" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="rd-dialog-body">
                            <p>The basic dialog.</p>
                        </div>
                        <div class="rd-dialog-footer">
                            <button class="rd-button primary" type="button">Save</button>
                            <button class="rd-button" type="button">Cancel</button>
                        </div>
                    </div>
                    <pre>&lt;button type=&quot;button&quot; data-toggle=&quot;dialog&quot; data-target=&quot;#dialog01&quot;&gt;Open dialog&lt;/button&gt;
&lt;div id=&quot;dialog01&quot; class=&quot;rd-dialog rd-block-level-margin-bottom&quot; aria-labelledby=&quot;example-dialog-label&quot;&gt;
    &lt;div class=&quot;rd-dialog-header&quot;&gt;
        &lt;h4 id=&quot;example-dialog-label&quot; class=&quot;rd-dialog-title&quot;&gt;Dialog header&lt;/h4&gt;
        &lt;button class=&quot;rd-dialog-close&quot; type=&quot;button&quot; aria-label=&quot;Close&quot;&gt;
            &lt;i class=&quot;fas fa-times&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;
        &lt;/button&gt;
    &lt;/div&gt;
    &lt;div class=&quot;rd-dialog-body&quot;&gt;
        &lt;p&gt;The basic dialog.&lt;/p&gt;
    &lt;/div&gt;
    &lt;div class=&quot;rd-dialog-footer&quot;&gt;
        &lt;button class=&quot;rd-button primary&quot; type=&quot;button&quot;&gt;Save&lt;/button&gt;
        &lt;button class=&quot;rd-button&quot; type=&quot;button&quot;&gt;Cancel&lt;/button&gt;
    &lt;/div&gt;
&lt;/div&gt;</pre>
                    <h3>Live demo</h3>
                    <p>Open only dialog.</p>
                    <div class="rd-block-level-margin-bottom">
                        <button type="button" data-toggle="dialog" data-target="#dialog01">Open dialog</button>
                        <div id="dialog01" class="rd-dialog hide">
                            <div class="rd-dialog-header">
                                <h4 class="rd-dialog-title">Dialog header</h4>
                                <button class="rd-dialog-close" type="button" aria-label="Close" data-dismiss="dialog">
                                    <i class="fas fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="rd-dialog-body">
                                <p>This dialog contain no backdrop.</p>
                            </div>
                            <div class="rd-dialog-footer">
                                <button class="rd-button primary" type="button">Save</button>
                                <button class="rd-button" type="button" data-dismiss="dialog">Close</button>
                            </div>
                        </div>
                    </div>
                    <h3>Dialog with modal</h3>
                    <p>To open dialog with modal (backdrop), wrap the dialog with element that contain class <code>rd-dialog-modal</code>.</p>
                    <div class="rd-block-level-margin-bottom">
                        <button type="button" data-toggle="dialog" data-target="#dialog02">Open modal dialog</button>
                        <div id="dialog02" class="rd-dialog-modal">
                            <div class="rd-dialog">
                                <div class="rd-dialog-header">
                                    <h4 class="rd-dialog-title">Dialog with modal</h4>
                                    <button class="rd-dialog-close" type="button" aria-label="Close" data-dismiss="dialog">
                                        <i class="fas fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="rd-dialog-body">
                                    <p>The modal dialog with backdrop.</p>
                                </div>
                                <div class="rd-dialog-footer">
                                    <button class="rd-button primary" type="button">Save</button>
                                    <button class="rd-button" type="button" data-dismiss="dialog">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Long paragraph</h3>
                    <div class="rd-block-level-margin-bottom">
                        <button type="button" data-toggle="dialog" data-target="#dialog03">Open modal dialog</button>
                        <div id="dialog03" class="rd-dialog-modal">
                            <div class="rd-dialog">
                                <div class="rd-dialog-header">
                                    <h4 class="rd-dialog-title">Long paragraph</h4>
                                    <button class="rd-dialog-close" type="button" aria-label="Close" data-dismiss="dialog">
                                        <i class="fas fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="rd-dialog-body">
                                    <p>
                                        Feugiat dictum proin tellus integer ridiculus tempor scelerisque nascetur auctor. Taciti ad ultrices mattis habitant parturient aenean phasellus proin dignissim est? Mauris curae; erat nisl pulvinar inceptos egestas sociosqu convallis. Platea; condimentum molestie ut curabitur porta imperdiet. Viverra venenatis tristique nullam. Taciti nascetur torquent aptent vehicula curae; fames phasellus habitasse nostra eleifend potenti. Tellus cum in tempus, accumsan at. Tincidunt lectus, fringilla nam. Mattis pretium ornare, porttitor consequat pharetra interdum ac non malesuada. Netus, vulputate porta velit id vestibulum dictumst netus.
                                    </p>
                                    <p>
                                        Porttitor maecenas pulvinar vel cursus urna conubia elit. Imperdiet nunc mattis vestibulum senectus at. Mattis, morbi quam gravida mauris fames morbi curabitur eleifend. Imperdiet dui nostra auctor rutrum tincidunt tortor dis porttitor hendrerit adipiscing, duis vivamus. Felis urna ac arcu risus cubilia amet ante venenatis etiam. Molestie malesuada eros primis ligula parturient malesuada blandit. Consectetur nisl commodo ante habitasse urna magnis nec nulla.
                                    </p>
                                    <p>
                                        Dignissim ad sed vitae aptent viverra lobortis? Facilisis convallis dui faucibus iaculis imperdiet vulputate volutpat habitasse purus, natoque penatibus taciti. Cras ac dis ultricies volutpat in dictumst eros, elit dictum tellus sit felis. Praesent mus vitae ac cum eu ultrices? Aliquet hendrerit habitasse curabitur faucibus imperdiet imperdiet enim. At sit netus nascetur laoreet quam eleifend. Proin consequat eleifend duis est.
                                    </p>
                                    <p>
                                        Augue ullamcorper libero leo. Ante purus donec aenean elit dapibus. Semper gravida lobortis morbi libero cursus commodo viverra accumsan inceptos sodales? Tristique at donec eros cum dictumst mollis primis blandit curabitur duis purus. Nisi tincidunt justo curae;. Justo aenean maecenas ligula lacinia etiam non placerat dis. Nunc tempus cubilia aptent dignissim porttitor mollis porttitor netus tempor sociosqu nascetur molestie. Duis torquent enim mauris at blandit mauris aliquet curae; sociosqu vehicula cubilia.
                                    </p>
                                    <p>
                                        In duis conubia mattis mattis elementum suspendisse metus. Ullamcorper tincidunt enim ligula semper dolor! Gravida natoque quis mus velit urna metus tincidunt aliquam potenti risus sodales! Non id sollicitudin quis turpis habitasse. Sociosqu ac vitae congue varius per augue venenatis tempor. Porttitor quisque risus nostra. Hac duis quis litora dis nisi pretium. Aliquet montes.
                                    </p>
                                </div>
                                <div class="rd-dialog-footer">
                                    <button class="rd-button primary" type="button">Save</button>
                                    <button class="rd-button" type="button" data-dismiss="dialog">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Disable close on click outside the dialog</h3>
                    <p>Add <code>data-click-outside-not-close=&quot;true&quot;</code> HTML attribute into the modal element to disable close on click outside.</p>
                    <div class="rd-block-level-margin-bottom">
                        <button type="button" data-toggle="dialog" data-target="#dialog04">Open modal dialog</button>
                        <div id="dialog04" class="rd-dialog-modal" data-click-outside-not-close="true">
                            <div class="rd-dialog">
                                <div class="rd-dialog-header">
                                    <h4 class="rd-dialog-title">Disable close on click outside the dialog</h4>
                                    <button class="rd-dialog-close" type="button" aria-label="Close" data-dismiss="dialog">
                                        <i class="fas fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="rd-dialog-body">
                                    <p>The modal dialog with backdrop.</p>
                                </div>
                                <div class="rd-dialog-footer">
                                    <button class="rd-button primary" type="button">Save</button>
                                    <button class="rd-button" type="button" data-dismiss="dialog">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Disable close on press escape key</h3>
                    <p>Add <code>data-esc-key-not-close=&quot;true&quot;</code> HTML attribute into the dialog element to disable close on press <kbd>esc</kbd> key.</p>
                    <div class="rd-block-level-margin-bottom">
                        <button type="button" data-toggle="dialog" data-target="#dialog05">Open modal dialog</button>
                        <div id="dialog05" class="rd-dialog-modal">
                            <div class="rd-dialog" data-esc-key-not-close="true">
                                <div class="rd-dialog-header">
                                    <h4 class="rd-dialog-title">Disable close on click outside the dialog</h4>
                                    <button class="rd-dialog-close" type="button" aria-label="Close" data-dismiss="dialog">
                                        <i class="fas fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="rd-dialog-body">
                                    <p>The modal dialog with backdrop.</p>
                                </div>
                                <div class="rd-dialog-footer">
                                    <button class="rd-button primary" type="button">Save</button>
                                    <button class="rd-button" type="button" data-dismiss="dialog">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Sizes</h3>
                    <p>Dialog with different sizes by adding <code>rd-dialog-size-xxx</code> into dialog element.</p>
                    <div class="rd-block-level-margin-bottom">
                        <button type="button" data-toggle="dialog" data-target="#dialog06">Open large dialog</button>
                        <div id="dialog06" class="rd-dialog-modal">
                            <div class="rd-dialog rd-dialog-size-large">
                                <div class="rd-dialog-header">
                                    <h4 class="rd-dialog-title">Large dialog</h4>
                                    <button class="rd-dialog-close" type="button" aria-label="Close" data-dismiss="dialog">
                                        <i class="fas fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="rd-dialog-body">
                                    <p>&hellip;</p>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-toggle="dialog" data-target="#dialog07">Open full window dialog</button>
                        <div id="dialog07" class="rd-dialog-modal">
                            <div class="rd-dialog rd-dialog-size-fullwindow">
                                <div class="rd-dialog-header">
                                    <h4 class="rd-dialog-title">Full window dialog</h4>
                                    <button class="rd-dialog-close" type="button" aria-label="Close" data-dismiss="dialog">
                                        <i class="fas fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="rd-dialog-body">
                                    <p>&hellip;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
        <script src="assets/js/rdta/components/rdta-dialog.js"></script>
    </body>
</html>