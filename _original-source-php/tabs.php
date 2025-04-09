<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Tabs';
include 'includes/html-head.php'; 
?> 
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/components/rdta-tabs.css'); ?>">
    </head>
    <body>
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
<?php include 'includes/partials/page-sidebar.php'; ?> 
            <main>
                <?php
                echo renderBreadcrumb(['./' => 'Home', '#' => $title]);
                ?> 
                <div class="rd-page-content page-tabs">
                    <h1>Tabs</h1>
                    <p>
                        In order to make tabs works, add these files.
                        <strong>assets/css/rdta/components/rdta-tabs.css</strong>,
                        <strong>assets/js/rdta/components/rdta-tabs.js</strong>
                    </p>
                    <hr>

                    <h2 id="tabs-example">Examples</h2>
                    <p>Basic tabs HTML element.</p>
                    <div class="tabs code-sample-tabs-sample1">
                        <ul>
                            <li><a href="#tabs-1"><abbr title="Rundiz template for admin">RDTA</abbr> tabs</a></li>
                            <li><a href="#tabs-2">Proin dolor</a></li>
                            <li><a href="#tabs-3">Aenean lacinia</a></li>
                        </ul>
                        <div id="tabs-1">
                            <p><abbr title="Rundiz template for admin">RDTA</abbr> can use basic element and few CSS class by default. Here is an example.</p>
                        </div>
                        <div id="tabs-2">
                            <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                        </div>
                        <div id="tabs-3">
                            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                        </div>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-tabs-sample1" data-target-src-remove-first-space="20"></pre>
                    <p>To make tabs work, it must be manually activate once document loaded.</p>
                    <pre><code class="language-js">document.addEventListener('DOMContentLoaded', function() {
    RDTATabs.init('.tabs');
});</code></pre>
                    <h3>Using <code>&lt;ol&gt;</code></h3>
                    <div class="tabs">
                        <ol>
                            <li><a href="#tabs2-1">Nunc tincidunt</a></li>
                            <li><a href="#tabs2-2">Proin dolor</a></li>
                            <li><a href="#tabs2-3">Aenean lacinia</a></li>
                        </ol>
                        <div id="tabs2-1">
                            <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                        </div>
                        <div id="tabs2-2">
                            <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                        </div>
                        <div id="tabs2-3">
                            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                        </div>
                    </div>
                    <h3>With pre-defined CSS classes.</h3>
                    <p><abbr title="Rundiz template for admin">RDTA</abbr> can also use pre-defined CSS classes.</p>
                    <div class="tabs rd-tabs code-sample-tabs-predefinedclasses">
                        <ul class="rd-tabs-nav">
                            <li class="active"><a href="#tabs-1_1">Tab 1</a></li>
                            <li><a href="#tabs-1_2">Tab 2</a></li>
                            <li><a href="#tabs-1_3">Tab 3</a></li>
                        </ul>
                        <div id="tabs-1_1" class="rd-tabs-content active">
                            <p>Tab 1 content.</p>
                        </div>
                        <div id="tabs-1_2" class="rd-tabs-content">
                            <p>Tab 2 content.</p>
                        </div>
                        <div id="tabs-1_3" class="rd-tabs-content">
                            <p>Tab 3 content.</p>
                        </div>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-tabs-predefinedclasses" data-target-src-remove-first-space="20"></pre>
                    <h3>Many tabs.</h3>
                    <p>Resize your browser to see how responsive tabs navbar work.</p>
                    <div class="tabs rd-content-level-margin-bottom">
                        <ul>
                            <?php for ($i = 1; $i <= 60; $i++) { ?> 
                            <li class="text-flow-nowrap"><a href="#tabs-manytabs-<?php echo $i; ?>">Tab <?php echo $i; ?></a></li>
                            <?php }// endfor; ?> 
                        </ul>
                        <div id="tabs-manytabs-1" class="rd-tabs-content">
                            Many tabs content.
                        </div>
                    </div>
                    <div class="tabs">
                        <ul>
                            <?php for ($i = 1; $i <= 60; $i++) { ?> 
                            <li class="text-flow-nowrap"><a href="#tabs-manytabs2-<?php echo $i; ?>">Many Tabs2 Tab <?php echo $i; ?></a></li>
                            <?php }// endfor; ?> 
                        </ul>
                        <div id="tabs-manytabs2-1" class="rd-tabs-content">
                            Many tabs (2) content. For checking tabs horizontal scroll individually. (This tabs block scroll will not affect the tabs block above.)
                        </div>
                    </div>
                    <h3>Manual set active tab.</h3>
                    <div id="my-custom-tabs1" class="rd-tabs">
                        <ul class="rd-tabs-nav">
                            <li><a href="#tabs-manual1_1">Nunc tincidunt</a></li>
                            <li><a href="#tabs-manual1_2">Manual active tab</a></li>
                            <li><a href="#tabs-manual1_3">Aenean lacinia</a></li>
                        </ul>
                        <div id="tabs-manual1_1" class="rd-tabs-content">
                            <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                        </div>
                        <div id="tabs-manual1_2" class="rd-tabs-content">
                            <p>This tab is set as active via JS option <code>activeTabs: 1</code>. The tab number start from 0.</p>
                        </div>
                        <div id="tabs-manual1_3" class="rd-tabs-content">
                            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                        </div>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source"><code class="language-js">RDTATabs.init('.my-custom-tabs1', {activeTabs: 1});</code></pre>
                    <h3>Remember last tab</h3>
                    <p>To use remember last tab, it is not recommend to use wide selector such as CSS class but recommended to use id only.<br>
                        Use <code>rememberLastTab</code> option and set it to <code>true</code> to remember last active tab.</p>
                    <div id="rdta-tabs-rememberlasttab" class="rd-tabs">
                        <ul class="rd-tabs-nav">
                            <li><a href="#tabs-rem1_1">Nunc tincidunt</a></li>
                            <li><a href="#tabs-rem1_2">Proin dolor</a></li>
                            <li><a href="#tabs-rem1_3">Aenean lacinia</a></li>
                        </ul>
                        <div id="tabs-rem1_1" class="rd-tabs-content">
                            <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                        </div>
                        <div id="tabs-rem1_2" class="rd-tabs-content">
                            <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                        </div>
                        <div id="tabs-rem1_3" class="rd-tabs-content">
                            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                        </div>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source"><code class="language-js">RDTATabs.init('#rdta-tabs-rememberlasttab', {rememberLastTab: true});</code></pre>
                    <h3>Ajax</h3>
                    <div class="tabs code-sample-tabs-ajax">
                        <ul>
                            <li><a href="#tabs-a1">Preloaded</a></li>
                            <li><a href="xhr-page.html" data-targettab="#tabs-a2">Ajax</a></li>
                        </ul>
                        <div id="tabs-a1">
                            <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                        </div>
                        <div id="tabs-a2"></div>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-tabs-ajax" data-target-src-remove-first-space="20"></pre>
                    <h3>Vertical</h3>
                    <p>Add <code>tabs-vertical</code> class to the tabs element to display it in vertical (medium screen or larger).</p>
                    <div class="tabs tabs-vertical code-sample-tabs-vertical">
                        <ul>
                            <li><a href="#" data-targettab="#tabs-v1">Nunc tincidunt</a></li>
                            <li><a href="#" data-targettab="#tabs-v2">Proin dolor</a></li>
                            <li><a href="#" data-targettab="#tabs-v3">Aenean lacinia</a></li>
                        </ul>
                        <div id="tabs-v1">
                            <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                        </div>
                        <div id="tabs-v2">
                            <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                        </div>
                        <div id="tabs-v3">
                            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                        </div>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-tabs-vertical" data-target-src-remove-first-space="20"></pre>
                    <p>Please note that you can use <code>data-targettab</code> HTML attribute to specify target tab instead of link to <code>#target-tab-id</code>.</p>
                    <h3>Tabs inside tabs</h3>
                    <div id="titOuterTabs" class="rd-tabs code-sample-tabs-insidetabs">
                        <ul class="rd-tabs-nav">
                            <li><a href="#tit-tab1">Tab 1</a></li>
                            <li><a href="#tit-tab2">Tab 2</a></li>
                        </ul>
                        <div id="tit-tab1" class="rd-tabs-content">
                            <p>The content in tab 1.</p>
                        </div>
                        <div id="tit-tab2" class="rd-tabs-content">
                            <p>The content in tab 2.</p>
                            <div id="titInnerTabs" class="tabs-vertical rd-tabs">
                                <ul class="rd-tabs-nav">
                                    <li><a href="#tit-tab2-1">Inner tab 1</a></li>
                                    <li><a href="#tit-tab2-2">Inner tab 2</a></li>
                                    <li><a href="xhr-page.html" data-targettab="#tit-tab2-3">Ajax</a></li>
                                </ul>
                                <div id="tit-tab2-1" class="rd-tabs-content">
                                    <p>The inner tab 2-1.</p>
                                </div>
                                <div id="tit-tab2-2" class="rd-tabs-content">
                                    <p>The inner tab 2-2.</p>
                                </div>
                                <div id="tit-tab2-3" class="rd-tabs-content"></div>
                            </div>
                        </div>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-tabs-insidetabs" data-target-src-remove-first-space="20"></pre>
                    <p>Activate tabs using specific id.</p>
                    <pre><code class="language-js">RDTATabs.init('#titOuterTabs');</code></pre>
                    <h3>Events</h3>
                    <p>RDTA tabs have few events for hooking.</p>
                    <table class="rd-datatable">
                        <thead>
                            <tr>
                                <th>Event type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>rdta.tabs.activeTab</td>
                                <td>This event is fired when tab was set to active or changed tab.</td>
                            </tr>
                            <tr>
                                <td>rdta.tabs.ajaxFailed</td>
                                <td>This event is fired when XHR failed.</td>
                            </tr>
                            <tr>
                                <td>rdta.tabs.ajaxContentLoaded</td>
                                <td>This event is fired when ajax tab content was loaded.</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>Use the <a href="#tabs-example">first example</a> and open console to see detail.</p>
                    <div class="rd-tabs-events rdta-demopage-debugbox"></div>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
        <script src="assets/js/rdta/components/rdta-tabs.js"></script>
        <script>
            function rdtaDebugTabsEvents() {
                document.querySelector('.tabs').addEventListener('rdta.tabs.activeTab', function(e) {
                    document.querySelector('.rd-tabs-events').insertAdjacentHTML('beforeend', 'Tabs active<br>');
                    console.log(e.detail);
                });
                document.querySelector('.tabs').addEventListener('rdta.tabs.ajaxContentLoaded', function(e) {
                    document.querySelector('.rd-tabs-events').insertAdjacentHTML('beforeend', 'Ajax tab content loaded<br>');
                    console.log(e.detail);
                });
                document.querySelector('.tabs').addEventListener('rdta.tabs.ajaxFailed', function() {
                    document.querySelector('.rd-tabs-events').insertAdjacentHTML('beforeend', 'XHR failed<br>');
                });
            }// rdtaDebugTabsEvents

            document.addEventListener('DOMContentLoaded', function() {
                RDTATabs.init('.tabs');
                rdtaDebugTabsEvents();
                
                RDTATabs.init('#my-custom-tabs1', {activeTabs: 1});
                RDTATabs.init('#rdta-tabs-rememberlasttab', {rememberLastTab: true});

                RDTATabs.init('#titOuterTabs');
                RDTATabs.init('#titInnerTabs');
            });
        </script>
    </body>
</html>