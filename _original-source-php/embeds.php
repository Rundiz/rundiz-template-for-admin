<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Embeds';
include 'includes/html-head.php'; 
?> 
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/components/rdta-embeds.css'); ?>">
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
                    <h1>Embeds</h1>
                    <p>Responsive video, embeded elements, or iframe.</p>
                    <p>
                        In order to make responsive embeds works, add this file.
                        <strong>assets/css/rdta/components/rdta-embeds.css</strong>
                    </p>
                    <hr>

                    <h2>Examples</h2>
                    <div class="rd-embed-responsive rd-embed-responsive16by9 code-sample-embed-sample1">
                        <iframe class="rd-embed-responsive-item" src="https://www.youtube.com/embed/KX3OnQeETdI"></iframe>
                    </div>
                    <h3>Source</h3>
                    <pre class="preview-source" data-target-src=".code-sample-embed-sample1" data-target-src-remove-first-space="20"></pre>

                    <h3>Aspect ratios</h3>
<?php
$ratios = [
    [21, 9],
    [16, 9],
    [8, 5],
    [4, 3],
    [3, 2],
    [1, 1],
];
?>
                    <pre><code class="language-html"><?php
foreach ($ratios as $eachRatio) {                    
?>
&lt;!-- <?php echo $eachRatio[0]; ?>:<?php echo $eachRatio[1]; ?> --&gt;
&lt;div class=&quot;rd-embed-responsive rd-embed-responsive<?php echo $eachRatio[0]; ?>by<?php echo $eachRatio[1]; ?>&quot;&gt;
    &lt;iframe class=&quot;rd-embed-responsive-item&quot; src=&quot;...&quot;&gt;&lt;/iframe&gt;
&lt;/div&gt;

<?php 
}// endforeach;
unset($eachRatio, $ratios);
?></code></pre>
                    <h3>Video element</h3>
                    <div class="rd-embed-responsive rd-embed-responsive16by9 code-sample-embed-videoelement">
                        <video class="rd-embed-responsive-item" controls height="1080" width="1920"></video>
                    </div>
                    <h3>Source</h3>
                    <pre class="preview-source" data-target-src=".code-sample-embed-videoelement" data-target-src-remove-first-space="20"></pre>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>