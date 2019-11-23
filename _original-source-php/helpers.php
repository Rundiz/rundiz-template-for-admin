<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Helpers';
include 'includes/html-head.php'; 
?> 
        <style type="text/css">
            .helper-responsive-visibility-box {
                background-color: #52A0E5;
                color: white;
                padding: 0.188rem 0.313rem;
                width: 100%;
            }
        </style>
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
                    <h1>Helpers</h1>
                    <p>CSS helper classes.</p>
                    <hr>

                    <h2>Examples</h2>
                    <h3>Margin bottom for block level</h3>
                    <p>To keep the same bottom space of block level element or layout, use <code>.rd-block-level-margin-bottom</code> class.</p>
                    <div class="helper-responsive-visibility-box">block without margin bottom</div>
                    <div class="helper-responsive-visibility-box rd-block-level-margin-bottom">block with margin bottom</div>
                    <div class="helper-responsive-visibility-box rd-block-level-margin-bottom">block with margin bottom</div>
                    <p>So, you can put this class into any element you want the same bottom space as block level element.</p>
                    <h3>Margin bottom for content level</h3>
                    <p>To keep same bottom space of content level element or paragraph, use <code>.rd-content-level-margin-bottom</code> class.</p>
                    <div class="rd-content-level-margin-bottom">The above line is paragraph, it is already has margin bottom but this line is <code>div</code>. This element add margin bottom as content level.</div>

                    <h3>Clear float</h3>
                    <p>Use <code>.clearfix</code> class to clear any float CSS.</p>
                    <div>
                        <div style="border: 1px dotted #ccc; float: left; width: 50px;">
                            Float item
                        </div>
                        <div style="border: 1px dotted #ccc; float: left; width: 50px;">
                            Float item
                        </div>
                        <div class="clearfix"></div>
                        After float but cleared the float.
                    </div>

                    <h3>Screen reader only</h3>
                    <p>Use <code>.screen-reader-only</code> class to show for screen reader only.</p>
                    <p>This is normal text. This is &quot;<span class="screen-reader-only">for screen reader only</span>&quot; which does not appears on screen.</p>

                    <h3>Fade in/out</h3>
                    <p>Begins with element that contain <code>.rd-animation</code>, <code>.fade</code> classes.<br>
                        To fade out add the <code>.fade-out</code> class, to fade in just remove the <code>.fade-out</code> class.
                    </p>
                    <div id="demo-box-fadeout" class="rd-animation fade" style="border: 1px dashed #ccc; padding: 0.625rem;">Fade content box</div>
                    <button type="button" onclick="rdtaDemoFadeOut();" style="margin-bottom: 0.625rem;">Fade out</button>
                    <div id="demo-box-fadein" class="rd-animation fade fade-out" style="border: 1px dashed #ccc; padding: 0.625rem;">Fade content box</div>
                    <button type="button" onclick="rdtaDemoFadeIn();" style="margin-bottom: 0.625rem;">Fade in</button>

                    <h3>Responsive visibility</h3>
                    <p>This text -&gt;<span class="hidden">was hidden</span>&lt;- hidden in all screen sizes using <code>.hidden</code> class.</p>
                    <p>The text below will be hidden and visible in different screen size. Try to resize the browser to see it in action.</p>
                    <div class="rd-datatable-wrapper">
                        <table class="rd-datatable">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Extra small <small class="rd-helpers-screen-size-xs-max">&lt;=</small></th>
                                    <th>Small <small class="rd-helpers-screen-size-sm-min"></small> - <small class="rd-helpers-screen-size-sm-max"></small></th>
                                    <th>Medium <small class="rd-helpers-screen-size-md-min"></small> - <small class="rd-helpers-screen-size-md-max"></small></th>
                                    <th>Large <small class="rd-helpers-screen-size-lg-min"></small> - <small class="rd-helpers-screen-size-lg-max"></small></th>
                                    <th>Extra large <small class="rd-helpers-screen-size-xl-min">&gt;=</small></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Class</th>
                                    <th>Extra small <small class="rd-helpers-screen-size-xs-max">&lt;=</small></th>
                                    <th>Small <small class="rd-helpers-screen-size-sm-min"></small> - <small class="rd-helpers-screen-size-sm-max"></small></th>
                                    <th>Medium <small class="rd-helpers-screen-size-md-min"></small> - <small class="rd-helpers-screen-size-md-max"></small></th>
                                    <th>Large <small class="rd-helpers-screen-size-lg-min"></small> - <small class="rd-helpers-screen-size-lg-max"></small></th>
                                    <th>Extra large <small class="rd-helpers-screen-size-xl-min">&gt;=</small></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td colspan="6">Hidden</td>
                                </tr>
                                <tr>
                                    <td><code>.hidden-only-&hellip;</code></td>
                                    <td><div class="helper-responsive-visibility-box hidden-only-xs">xs</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-only-sm">sm</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-only-md">md</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-only-lg">lg</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-only-xl">xl</div></td>
                                </tr>
                                <tr>
                                    <td><code>.hidden-under-&hellip;</code></td>
                                    <td><div class="helper-responsive-visibility-box hidden-under-xs">xs</div> (always visible)</td>
                                    <td><div class="helper-responsive-visibility-box hidden-under-sm">sm</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-under-md">md</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-under-lg">lg</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-under-xl">xl</div></td>
                                </tr>
                                <tr>
                                    <td><code>.hidden-under-equal-&hellip;</code></td>
                                    <td><div class="helper-responsive-visibility-box hidden-under-equal-xs">xs</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-under-equal-sm">sm</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-under-equal-md">md</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-under-equal-lg">lg</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-under-equal-xl">xl</div> (always hidden)</td>
                                </tr>
                                <tr>
                                    <td><code>.hidden-over-&hellip;</code></td>
                                    <td><div class="helper-responsive-visibility-box hidden-over-xs">xs</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-over-sm">sm</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-over-md">md</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-over-lg">lg</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-over-xl">xl</div> (always hidden)</td>
                                </tr>
                                <tr>
                                    <td><code>.hidden-over-equal-&hellip;</code></td>
                                    <td><div class="helper-responsive-visibility-box hidden-over-equal-xs">xs</div> (always hidden)</td>
                                    <td><div class="helper-responsive-visibility-box hidden-over-equal-sm">sm</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-over-equal-md">md</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-over-equal-lg">lg</div></td>
                                    <td><div class="helper-responsive-visibility-box hidden-over-equal-xl">xl</div></td>
                                </tr>
                                <tr>
                                    <td colspan="6">Visible</td>
                                </tr>
                                <tr>
                                    <td><code>.visible-only-&hellip;</code></td>
                                    <td><div class="helper-responsive-visibility-box visible-only-xs">xs</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-only-sm">sm</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-only-md">md</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-only-lg">lg</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-only-xl">xl</div></td>
                                </tr>
                                <tr>
                                    <td><code>.visible-under-&hellip;</code></td>
                                    <td><div class="helper-responsive-visibility-box visible-under-xs">xs</div> (always hidden)</td>
                                    <td><div class="helper-responsive-visibility-box visible-under-sm">sm</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-under-md">md</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-under-lg">lg</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-under-xl">xl</div></td>
                                </tr>
                                <tr>
                                    <td><code>.visible-under-equal-&hellip;</code></td>
                                    <td><div class="helper-responsive-visibility-box visible-under-equal-xs">xs</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-under-equal-sm">sm</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-under-equal-md">md</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-under-equal-lg">lg</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-under-equal-xl">xl</div> (always visible)</td>
                                </tr>
                                <tr>
                                    <td><code>.visible-over-&hellip;</code></td>
                                    <td><div class="helper-responsive-visibility-box visible-over-xs">xs</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-over-sm">sm</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-over-md">md</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-over-lg">lg</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-over-xl">xl</div> (always hidden)</td>
                                </tr>
                                <tr>
                                    <td><code>.visible-over-equal-&hellip;</code></td>
                                    <td><div class="helper-responsive-visibility-box visible-over-equal-xs">xs</div> (always visible)</td>
                                    <td><div class="helper-responsive-visibility-box visible-over-equal-sm">sm</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-over-equal-md">md</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-over-equal-lg">lg</div></td>
                                    <td><div class="helper-responsive-visibility-box visible-over-equal-xl">xl</div></td>
                                </tr>
                            </tbody>
                        </table>
                        <p>
                            I'm 
                            <span class="visible-only-xs">extra small</span>
                            <span class="visible-only-sm">small</span>
                            <span class="visible-only-md">medium</span>
                            <span class="visible-only-lg">large</span>
                            <span class="visible-only-xl">extra large</span>
                            screen size.
                        </p>
                    </div>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
        <script>
            function rdtaDemoFadeIn() {
                document.getElementById('demo-box-fadein').classList.remove('fade-out');
                setTimeout(function() {
                    document.getElementById('demo-box-fadein').classList.add('fade-out');
                }, 1000);
            }// rdtaDemoFadeIn


            function rdtaDemoFadeOut() {
                document.getElementById('demo-box-fadeout').classList.add('fade-out');
                setTimeout(function() {
                    document.getElementById('demo-box-fadeout').classList.remove('fade-out');
                }, 1000);
            }// rdtaDemoFadeOut
        </script>
    </body>
</html>