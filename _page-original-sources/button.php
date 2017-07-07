<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Button';
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
                    <h1>Button</h1>
                    <p>The button styles</p>
                    <hr>

                    <h2>Examples</h2>
                    <p>These are original button without any class.</p>
                    <p>
                        <input type="button" value="Input normal button">
                        <input type="submit" value="Input submit button">
                        <input type="reset" value="Input reset button">
                        <input type="button" disabled="" value="Input button disabled">
                    </p>
                    <p>
                        <button type="button">Normal button</button>
                        <button type="submit">Submit button</button>
                        <button type="reset">Reset button</button>
                        <button type="button" disabled="">Disabled button</button>
                    </p>
                    <p>Buttons with class.</p>
                    <p>
                        <button class="rd-button">Default</button>
                        <button class="rd-button primary">Primary</button>
                        <button class="rd-button info">Info</button>
                        <button class="rd-button danger">Danger</button>
                        <button class="rd-button warning">Warning</button>
                        <button class="rd-button success">Success</button>
                    </p>
                    <p>Buttons that is link.</p>
                    <p>
                        <a class="rd-button" href="#" onclick="return false;">Default</a>
                        <a class="rd-button primary" href="#" onclick="return false;">Primary</a>
                        <a class="rd-button info" href="#" onclick="return false;">Info</a>
                        <a class="rd-button danger" href="#" onclick="return false;">Danger</a>
                        <a class="rd-button warning" href="#" onclick="return false;">Warning</a>
                        <a class="rd-button success" href="#" onclick="return false;">Success</a>
                    </p>
                    <h3>Active state</h3>
                    <p>
                        <button class="rd-button active">Default</button>
                        <button class="rd-button primary active">Primary</button>
                        <button class="rd-button info active">Info</button>
                        <button class="rd-button danger active">Danger</button>
                        <button class="rd-button warning active">Warning</button>
                        <button class="rd-button success active">Success</button>
                    </p>
                    <h3>Disabled state</h3>
                    <p>
                        <button class="rd-button disabled">Default</button>
                        <button class="rd-button primary disabled">Primary</button>
                        <button class="rd-button info disabled">Info</button>
                        <button class="rd-button danger disabled">Danger</button>
                        <button class="rd-button warning disabled">Warning</button>
                        <button class="rd-button success disabled">Success</button>
                    </p>
                    <p>Disabled buttons that is link.</p>
                    <p>
                        <a class="rd-button disabled" href="#" onclick="return false;">Default</a>
                        <a class="rd-button primary disabled" href="#" onclick="return false;">Primary</a>
                        <a class="rd-button info disabled" href="#" onclick="return false;">Info</a>
                        <a class="rd-button danger disabled" href="#" onclick="return false;">Danger</a>
                        <a class="rd-button warning disabled" href="#" onclick="return false;">Warning</a>
                        <a class="rd-button success disabled" href="#" onclick="return false;">Success</a>
                    </p>
                    <h3>Sizes</h3>
                    <p>Tiny</p>
                    <p>
                        <button class="rd-button tiny">Default</button>
                        <button class="rd-button primary tiny">Primary</button>
                        <button class="rd-button info tiny">Info</button>
                        <button class="rd-button danger tiny">Danger</button>
                        <button class="rd-button warning tiny">Warning</button>
                        <button class="rd-button success tiny">Success</button>
                    </p>
                    <p>Small</p>
                    <p>
                        <button class="rd-button small">Default</button>
                        <button class="rd-button primary small">Primary</button>
                        <button class="rd-button info small">Info</button>
                        <button class="rd-button danger small">Danger</button>
                        <button class="rd-button warning small">Warning</button>
                        <button class="rd-button success small">Success</button>
                    </p>
                    <p>Large</p>
                    <p>
                        <button class="rd-button large">Default</button>
                        <button class="rd-button primary large">Primary</button>
                        <button class="rd-button info large">Info</button>
                        <button class="rd-button danger large">Danger</button>
                        <button class="rd-button warning large">Warning</button>
                        <button class="rd-button success large">Success</button>
                    </p>
                    <hr>

                    <h2>Button with dropdown</h2>
                    <p>The dropdown button uses <a href="http://github.hubspot.com/drop/docs/welcome/" target="dropjs">Drop.js</a></p>
                    <div class="rd-button-group">
                        <button class="rd-button dropdown-toggler">Dropdown <i class="fa fa-caret-down"></i></button>
                        <ul class="rd-dropdown">
                            <li><a href="#" onclick="return false;">Save A</a></li>
                            <li><a href="#" onclick="return false;">Save &amp; Publish A</a></li>
                            <li><a href="#" onclick="return false;">Cancel A</a></li>
                        </ul>
                    </div>
                    <div class="rd-button-group">
                        <button class="rd-button primary">Button</button>
                        <button class="rd-button primary dropdown-toggler"><i class="fa fa-caret-down"></i></button>
                        <ul class="rd-dropdown">
                            <li><a href="#" onclick="return false;">Save B</a></li>
                            <li><a href="#" onclick="return false;">Save &amp; Publish B</a></li>
                            <li><a href="#" onclick="return false;">Cancel B</a></li>
                        </ul>
                    </div>
                    <h3>Sizes</h3>
                    <div class="rd-button-group">
                        <button class="rd-button danger tiny dropdown-toggler">Tiny <i class="fa fa-caret-down"></i></button>
                        <ul class="rd-dropdown">
                            <li><a href="#" onclick="return false;">Save</a></li>
                            <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                            <li><a href="#" onclick="return false;">Cancel</a></li>
                        </ul>
                    </div>
                    <div class="rd-button-group">
                        <button class="rd-button info small">Small</button>
                        <button class="rd-button info small dropdown-toggler"><i class="fa fa-caret-down"></i></button>
                        <ul class="rd-dropdown">
                            <li><a href="#" onclick="return false;">Save 2</a></li>
                            <li><a href="#" onclick="return false;">Save &amp; Publish 2</a></li>
                            <li><a href="#" onclick="return false;">Cancel 2</a></li>
                        </ul>
                    </div>
                    <div class="rd-button-group">
                        <button class="rd-button warning dropdown-toggler">Normal <i class="fa fa-caret-down"></i></button>
                        <ul class="rd-dropdown">
                            <li><a href="#" onclick="return false;">Save 3</a></li>
                            <li><a href="#" onclick="return false;">Save &amp; Publish 3</a></li>
                            <li><a href="#" onclick="return false;">Cancel 3</a></li>
                        </ul>
                    </div>
                    <div class="rd-button-group">
                        <button class="rd-button success large">Large</button>
                        <button class="rd-button success large dropdown-toggler"><i class="fa fa-caret-down"></i></button>
                        <ul class="rd-dropdown">
                            <li><a href="#" onclick="return false;">Save 4</a></li>
                            <li><a href="#" onclick="return false;">Save &amp; Publish 4</a></li>
                            <li><a href="#" onclick="return false;">Cancel 4</a></li>
                        </ul>
                    </div>
                    <hr>

                    <h2>Button group</h2>
                    <div class="rd-button-group">
                        <button class="rd-button">Rewind</button>
                        <button class="rd-button">Play</button>
                        <button class="rd-button">Stop</button>
                        <button class="rd-button">Forward</button>
                    </div>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>