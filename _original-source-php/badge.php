<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Badge';
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
                    <h1>Badge</h1>
                    <p>The notification badge.</p>
                    <hr>

                    <h2>Examples</h2>
                    <p class="code-sample-badgesamples1">
                        This is normal text size.
                        <span class="rd-notification-badge">Normal</span>
                        <?php
                        $badgeNames = ['primary', 'info', 'danger', 'warning', 'success'];
                        foreach ($badgeNames as $badgeName) {
                            echo '<span class="rd-notification-badge badge-' . $badgeName . '">' . ucfirst($badgeName) . '</span>' . PHP_EOL;
                        }// endforeach;
                        unset($badgeName);
                        ?> 
                    </p>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-badgesamples1" data-target-src-remove-first-space="24" data-inner-html="true"></pre>

                    <h3>Badge within heading text</h3>
                    <div class="badge-with-heading-samples">
                        <h1>Heading 1 <span class="rd-notification-badge">Normal</span></h1>
                        <h2>Heading 2 <span class="rd-notification-badge">Normal</span></h2>
                        <h3>Heading 3 <span class="rd-notification-badge">Normal</span></h3>
                        <h4>Heading 4 <span class="rd-notification-badge">Normal</span></h4>
                        <h5>Heading 5 <span class="rd-notification-badge">Normal</span></h5>
                        <h6>Heading 6 <span class="rd-notification-badge">Normal</span></h6>
                    </div>

                    <h3>Tiny badge</h3>
                    <p>Add <code>tiny</code> class into badge element to display tiny bade.</p>
                    <p class="code-sample-badgetiny">
                        <span class="rd-notification-badge tiny">Normal</span>
                        <?php
                        foreach ($badgeNames as $badgeName) {
                            echo '<span class="rd-notification-badge badge-' . $badgeName . ' tiny">' . ucfirst($badgeName) . '</span>' . PHP_EOL;
                        }// endforeach;
                        unset($badgeName, $badgeNames);
                        ?> 
                    </p>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".code-sample-badgetiny" data-target-src-remove-first-space="24" data-inner-html="true"></pre>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>