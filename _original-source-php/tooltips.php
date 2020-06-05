<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Tooltips';
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
                    <h1>Tooltips</h1>
                    <p>
                        Tooltips use <a href="https://atomiks.github.io/tippyjs/" target="tippy.js">tippy.js</a> powered by popper.js.<br>
                        In order to make tooltips works, add these files.
                        <strong>assets/js/tippy.js/dist/tippy-bundle.umd.min.js</strong>,
                        <strong>assets/js/rdta/components/rdta-tooltips.js</strong>
                    </p>
                    <p>Then enable its functional.</p>
                    <pre>document.addEventListener('DOMContentLoaded', function() {
    let rdtaTooltips = RDTATooltips.init('[data-toggle="tooltip"]');
});</pre>
                    <p>And you can get latest tippy instance or all instances with <code>rdtaTooltips.getInstance()</code> or <code>rdtaTooltips.getInstances()</code> method. Open browser console to see demonstration.</p>
                    <hr>

                    <h2>Examples</h2>
                    <p>
                        Lorem ipsum dolor <a title="A tooltip text" data-toggle="tooltip">sit amet</a>, consectetur adipiscing elit. Curabitur in <a title="Another tooltip" data-toggle="tooltip">sagittis</a> neque. 
                        Nunc id ex sed tortor dapibus mollis. Phasellus mollis maximus pretium. 
                        Praesent hendrerit ultricies tellus a vehicula. 
                        Interdum et malesuada fames ac ante ipsum primis in faucibus. 
                        Duis nisi elit, aliquam sit amet gravida eget, tempus nec ante. 
                        Sed dictum lobortis libero ac placerat.
                    </p>
                    <pre>&lt;a title=&quot;A tooltip text&quot; data-toggle=&quot;tooltip&quot;&gt;Text&lt;/a&gt;</pre>
                    <h3>Placement</h3>
                    <button type="button" title="Tooltip on top" data-toggle="tooltip" data-placement="top">Tooltip on top</button>
                    <button type="button" title="Tooltip on right" data-toggle="tooltip" data-placement="right">Tooltip on right</button>
                    <button type="button" title="Tooltip on bottom" data-toggle="tooltip" data-placement="bottom">Tooltip on bottom</button>
                    <button type="button" title="Tooltip on left" data-toggle="tooltip" data-placement="left">Tooltip on left</button>

                    <hr>
                    <p>For more options, please read more at <a href="https://atomiks.github.io/tippyjs/creating-tooltips/" target="tippy.js-doc">tippy.js documentation</a>.</p>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
        <script src="assets/js/tippy.js/dist/tippy-bundle.umd.min.js"></script>
        <script src="assets/js/rdta/components/rdta-tooltips.js"></script>
        <script>
            let rdtaTooltips = RDTATooltips.init('[data-toggle="tooltip"]');
            console.log('latest tippy instance', rdtaTooltips.getInstance());
            console.log('all tippy instances', rdtaTooltips.getInstances());
        </script>
    </body>
</html>