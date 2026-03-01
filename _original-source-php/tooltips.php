<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Tooltips';
include 'includes/html-head.php'; 
?> 
    </head>
    <body>
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
<?php include 'includes/partials/page-sidebar.php'; ?> 
            <main>
<?php echo renderBreadcrumb(['./' => 'Home', '#' => $title], 4); ?> 
                <div class="rd-page-content">
                    <h1>Tooltips</h1>
                    <p>
                        Tooltips use <a href="https://floating-ui.com" target="floating-ui">Floating UI</a> since v2.4.10.
                        In order to make tooltips works, add a file.
                        <strong>assets/js/rdta/components/rdta-tooltips.js</strong>
                    </p>
                    <p>Then enable its functional.</p>
                    <pre><code class="language-js">document.addEventListener('DOMContentLoaded', function() {
    let rdtaTooltips = RDTATooltips.init('[data-toggle="tooltip"]');
});</code></pre>
                    <p>And you can get all instances with <code>rdtaTooltips.getInstances()</code> method. Open browser console to see demonstration.</p>
                    <hr>

                    <h2>Examples</h2>
                    <p>
                        Lorem ipsum dolor <a class="code-sample-tooltips-sample1" title="A tooltip text" data-toggle="tooltip">sit amet</a>, consectetur adipiscing elit. Curabitur in <a title="Another tooltip" data-toggle="tooltip">sagittis</a> neque. 
                        Nunc id ex sed tortor dapibus mollis. Phasellus mollis maximus pretium. 
                        Praesent hendrerit ultricies tellus a vehicula. 
                        Interdum et malesuada fames ac ante ipsum primis in faucibus. 
                        Duis nisi elit, aliquam sit amet gravida eget, tempus nec ante. 
                        Sed dictum lobortis libero ac placerat.
                    </p>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-tooltips-sample1" data-target-src-remove-first-space="20"></pre>
                    <h3>Placement</h3>
                    <div class="code-sample-tooltips-placements">
                        <button type="button" title="Tooltip on top" data-toggle="tooltip" data-placement="top">Tooltip on top</button>
                        <button type="button" title="Tooltip on right" data-toggle="tooltip" data-placement="right">Tooltip on right</button>
                        <button type="button" title="Tooltip on bottom" data-toggle="tooltip" data-placement="bottom">Tooltip on bottom</button>
                        <button type="button" title="Tooltip on left" data-toggle="tooltip" data-placement="left">Tooltip on left</button>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-tooltips-placements" data-target-src-remove-first-space="24" data-inner-html="true"></pre>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
        <script src="assets/js/rdta/components/rdta-tooltips.js"></script>
        <script>
            let rdtaTooltips = RDTATooltips.init('[data-toggle="tooltip"]');
            console.log('all tooltips instances', rdtaTooltips.getInstances());
        </script>
    </body>
</html>