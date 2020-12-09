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
    <body ontouchstart="">
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
<?php include 'includes/partials/page-sidebar.php'; ?> 
            <main>
                <?php
                echo renderBreadcrumb(['./' => 'Home', '#' => $title]);
                ?> 
                <div class="rd-page-content">
                    <h1>Tabs</h1>
                    <p>
                        In order to make tabs works, add these files.
                        <strong>assets/css/rdta/components/rdta-tabs.css</strong>,
                        <strong>assets/js/rdta/components/rdta-tabs.js</strong>
                    </p>
                    <hr>

                    <h2 id="tabs-example">Examples</h2>
                    <div class="tabs">
                        <ul>
                            <li><a href="#tabs-1">Nunc tincidunt</a></li>
                            <li><a href="#tabs-2">Proin dolor</a></li>
                            <li><a href="#tabs-3">Aenean lacinia</a></li>
                        </ul>
                        <div id="tabs-1">
                            <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                        </div>
                        <div id="tabs-2">
                            <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                        </div>
                        <div id="tabs-3">
                            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                        </div>
                    </div>
                    <p><abbr title="Rundiz template for admin">RDTA</abbr> can use basic element and few CSS class by default. Here is an example.</p>
                    <pre>&lt;div class=&quot;tabs&quot;&gt;
    &lt;ul&gt;
        &lt;li&gt;&lt;a href=&quot;#tabs-1&quot;&gt;Tab 1&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#tabs-2&quot;&gt;Tab 2&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#tabs-3&quot;&gt;Tab 3&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
    &lt;div id=&quot;tabs-1&quot;&gt;
        &lt;p&gt;Tab 1 content.&lt;/p&gt;
    &lt;/div&gt;
    &lt;div id=&quot;tabs-2&quot;&gt;
        &lt;p&gt;Tab 2 content.&lt;/p&gt;
    &lt;/div&gt;
    &lt;div id=&quot;tabs-3&quot;&gt;
        &lt;p&gt;Tab 3 content.&lt;/p&gt;
    &lt;/div&gt;
&lt;/div&gt;</pre>
                    <p>To make tabs work, it must be manually activate once document loaded.</p>
                    <pre>document.addEventListener('DOMContentLoaded', function() {
    RDTATabs.init('.tabs');
});</pre>
                    <h4>Using <code>&lt;ol&gt;</code></h4>
                    <div class="tabs">
                        <ol>
                            <li><a href="#tabs-1">Nunc tincidunt</a></li>
                            <li><a href="#tabs-2">Proin dolor</a></li>
                            <li><a href="#tabs-3">Aenean lacinia</a></li>
                        </ol>
                        <div id="tabs-1">
                            <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                        </div>
                        <div id="tabs-2">
                            <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                        </div>
                        <div id="tabs-3">
                            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                        </div>
                    </div>
                    <h3>With pre-defined CSS classes.</h3>
                    <p><abbr title="Rundiz template for admin">RDTA</abbr> can also use pre-defined CSS classes.</p>
                    <pre>&lt;div class=&quot;tabs rd-tabs&quot;&gt;
    &lt;ul class=&quot;rd-tabs-nav&quot;&gt;
        &lt;li class=&quot;active&quot;&gt;&lt;a href=&quot;#tabs-1_1&quot;&gt;Tab 1&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#tabs-1_2&quot;&gt;Tab 2&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#tabs-1_3&quot;&gt;Tab 3&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
    &lt;div id=&quot;tabs-1_1&quot; class=&quot;rd-tabs-content active&quot;&gt;
        &lt;p&gt;Tab 1 content.&lt;/p&gt;
    &lt;/div&gt;
    &lt;div id=&quot;tabs-1_2&quot; class=&quot;rd-tabs-content&quot;&gt;
        &lt;p&gt;Tab 2 content.&lt;/p&gt;
    &lt;/div&gt;
    &lt;div id=&quot;tabs-1_3&quot; class=&quot;rd-tabs-content&quot;&gt;
        &lt;p&gt;Tab 3 content.&lt;/p&gt;
    &lt;/div&gt;
&lt;/div&gt;</pre>
                    <h3>Manual set active tab.</h3>
                    <div id="my-custom-tabs1" class="rd-tabs">
                        <ul class="rd-tabs-nav">
                            <li><a href="#tabs-1_1">Nunc tincidunt</a></li>
                            <li><a href="#tabs-1_2">Manual active tab</a></li>
                            <li><a href="#tabs-1_3">Aenean lacinia</a></li>
                        </ul>
                        <div id="tabs-1_1" class="rd-tabs-content">
                            <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                        </div>
                        <div id="tabs-1_2" class="rd-tabs-content">
                            <p>This tab is set as active via JS option <code>activeTabs: 1</code>. The tab number start from 0.</p>
                            <pre>RDTATabs.init('.my-custom-tabs1', {activeTabs: 1});</pre>
                        </div>
                        <div id="tabs-1_3" class="rd-tabs-content">
                            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                        </div>
                    </div>
                    <h3>Remember last tab</h3>
                    <p>To use remember last tab, it is not recommend to use wide selector such as CSS class but recommended to use id only.<br>
                        Use <code>rememberLastTab</code> option and set it to <code>true</code> to remember last active tab.</p>
                    <div id="rdta-tabs-rememberlasttab" class="rd-tabs">
                        <ul class="rd-tabs-nav">
                            <li><a href="#tabs-1_1">Nunc tincidunt</a></li>
                            <li><a href="#tabs-1_2">Proin dolor</a></li>
                            <li><a href="#tabs-1_3">Aenean lacinia</a></li>
                        </ul>
                        <div id="tabs-1_1" class="rd-tabs-content">
                            <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                        </div>
                        <div id="tabs-1_2" class="rd-tabs-content">
                            <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                        </div>
                        <div id="tabs-1_3" class="rd-tabs-content">
                            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                        </div>
                    </div>
                    <pre>RDTATabs.init('#rdta-tabs-rememberlasttab', {rememberLastTab: true});</pre>
                    <h3>Ajax</h3>
                    <div class="tabs">
                        <ul>
                            <li><a href="#tabs-a1">Preloaded</a></li>
                            <li><a href="xhr-page.html" data-targettab="#tabs-a2">Ajax</a></li>
                        </ul>
                        <div id="tabs-a1">
                            <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                        </div>
                        <div id="tabs-a2"></div>
                    </div>
                    <pre>&lt;div class=&quot;tabs&quot;&gt;
    &lt;ul&gt;
        &lt;li&gt;&lt;a href=&quot;#tabs-a1&quot;&gt;Preloaded&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;xhr-page.html&quot; data-targettab=&quot;#tabs-a2&quot;&gt;Ajax&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
    &lt;div id=&quot;tabs-a1&quot;&gt;
        &lt;p&gt;Normal content.&lt;/p&gt;
    &lt;/div&gt;
    &lt;div id=&quot;tabs-a2&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</pre>
                    <h3>Vertical</h3>
                    <p>Add <code>tabs-vertical</code> class to the tabs element to display it in vertical (medium screen or larger).</p>
                    <div class="tabs tabs-vertical">
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
                    <pre>&lt;div class=&quot;tabs tabs-vertical&quot;&gt;
    &lt;ul&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot; data-targettab=&quot;#tabs-v1&quot;&gt;Tab 1&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot; data-targettab=&quot;#tabs-v2&quot;&gt;Tab 2&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot; data-targettab=&quot;#tabs-v3&quot;&gt;Tab 3&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
    &lt;div id=&quot;tabs-v1&quot;&gt;
        &lt;p&gt;Tab 1 content.&lt;/p&gt;
    &lt;/div&gt;
    &lt;div id=&quot;tabs-v2&quot;&gt;
        &lt;p&gt;Tab 2 content.&lt;/p&gt;
    &lt;/div&gt;
    &lt;div id=&quot;tabs-v3&quot;&gt;
        &lt;p&gt;Tab 3 content.&lt;/p&gt;
    &lt;/div&gt;
&lt;/div&gt;</pre>
                    <p>Please note that you can use <code>data-targettab</code> HTML attribute to specify target tab instead of link to <code>#target-tab-number</code>.</p>
                    <h3>Tabs inside tabs</h3>
                    <div id="titOuterTabs" class="rd-tabs">
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
                    <pre>&lt;div id=&quot;titOuterTabs&quot; class=&quot;rd-tabs&quot;&gt;
    &lt;ul class=&quot;rd-tabs-nav&quot;&gt;
        &lt;li&gt;&lt;a href=&quot;#tit-tab1&quot;&gt;Tab 1&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#tit-tab2&quot;&gt;Tab 2&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
    &lt;div id=&quot;tit-tab1&quot; class=&quot;rd-tabs-content&quot;&gt;
        &lt;p&gt;The content in tab 1.&lt;/p&gt;
    &lt;/div&gt;
    &lt;div id=&quot;tit-tab2&quot; class=&quot;rd-tabs-content&quot;&gt;
        &lt;p&gt;The content in tab 2.&lt;/p&gt;
        &lt;div id=&quot;titInnerTabs&quot; class=&quot;tabs-vertical rd-tabs&quot;&gt;
            &lt;ul class=&quot;rd-tabs-nav&quot;&gt;
                &lt;li&gt;&lt;a href=&quot;#tit-tab2-1&quot;&gt;Inner tab 1&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href=&quot;#tit-tab2-2&quot;&gt;Inner tab 2&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href=&quot;xhr-page.html&quot; data-targettab=&quot;#tit-tab2-3&quot;&gt;Ajax&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
            &lt;div id=&quot;tit-tab2-1&quot; class=&quot;rd-tabs-content&quot;&gt;
                &lt;p&gt;The inner tab 2-1.&lt;/p&gt;
            &lt;/div&gt;
            &lt;div id=&quot;tit-tab2-2&quot; class=&quot;rd-tabs-content&quot;&gt;
                &lt;p&gt;The inner tab 2-2.&lt;/p&gt;
            &lt;/div&gt;
            &lt;div id=&quot;tit-tab2-3&quot; class=&quot;rd-tabs-content&quot;&gt;&lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</pre>
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
                    <div class="rd-block-level-margin-bottom rd-tabs-events rdta-demopage-debugbox"></div>
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
                RDTATabs.init('#my-custom-tabs1', {activeTabs: 1});
                RDTATabs.init('#rdta-tabs-rememberlasttab', {rememberLastTab: true});

                RDTATabs.init('#titOuterTabs');
                RDTATabs.init('#titInnerTabs');
                rdtaDebugTabsEvents();
            });
        </script>
    </body>
</html>