<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Button';
include 'includes/html-head.php'; 
?> 
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
                        <?php
                        $buttonNames = ['primary', 'info', 'danger', 'warning', 'success'];
                        foreach ($buttonNames as $buttonName) {
                            echo '<button class="rd-button ' . $buttonName . '">' . ucfirst($buttonName) . '</button>' . PHP_EOL;
                        }// endforeach;
                        unset($buttonName);
                        ?> 
                    </p>
                    <pre>&lt;button class=&quot;rd-button&quot;&gt;Default&lt;/button&gt;
&lt;button class=&quot;rd-button primary&quot;&gt;Primary&lt;/button&gt;
&lt;button class=&quot;rd-button info&quot;&gt;Info&lt;/button&gt;
&lt;button class=&quot;rd-button danger&quot;&gt;Danger&lt;/button&gt;
&lt;button class=&quot;rd-button warning&quot;&gt;Warning&lt;/button&gt;
&lt;button class=&quot;rd-button success&quot;&gt;Success&lt;/button&gt;</pre>
                    <p>Buttons that is link.</p>
                    <p>
                        <a class="rd-button" href="#" onclick="return false;">Default</a>
                        <?php
                        foreach ($buttonNames as $buttonName) {
                            echo '<a class="rd-button ' . $buttonName . '" href="#" onclick="return false;">' . ucfirst($buttonName) . '</a>' . PHP_EOL;
                        }// endforeach;
                        unset($buttonName);
                        ?> 
                    </p>
                    <pre>&lt;a class=&quot;rd-button&quot; href=&quot;#&quot;&gt;Default&lt;/a&gt;
&lt;a class=&quot;rd-button primary&quot; href=&quot;#&quot;&gt;Primary&lt;/a&gt;
&lt;a class=&quot;rd-button info&quot; href=&quot;#&quot;&gt;Info&lt;/a&gt;
&lt;a class=&quot;rd-button danger&quot; href=&quot;#&quot;&gt;Danger&lt;/a&gt;
&lt;a class=&quot;rd-button warning&quot; href=&quot;#&quot;&gt;Warning&lt;/a&gt;
&lt;a class=&quot;rd-button success&quot; href=&quot;#&quot;&gt;Success&lt;/a&gt;</pre>
                    <h3>Active state</h3>
                    <p>Add <code>active</code> class to act as active state.</p>
                    <p>
                        <button class="rd-button active">Default</button>
                        <?php
                        foreach ($buttonNames as $buttonName) {
                            echo '<button class="rd-button ' . $buttonName . ' active">' . ucfirst($buttonName) . '</button>' . PHP_EOL;
                        }// endforeach;
                        unset($buttonName);
                        ?> 
                    </p>
                    <h3>Disabled state</h3>
                    <p>Add <code>disabled</code> class to act as disabled state.</p>
                    <p>
                        <button class="rd-button disabled">Default</button>
                        <?php
                        foreach ($buttonNames as $buttonName) {
                            echo '<button class="rd-button ' . $buttonName . ' disabled">' . ucfirst($buttonName) . '</button>' . PHP_EOL;
                        }// endforeach;
                        unset($buttonName);
                        ?> 
                    </p>
                    <p>Disabled buttons that is link.</p>
                    <p>
                        <a class="rd-button disabled" href="#" onclick="return false;">Default</a>
                        <?php
                        foreach ($buttonNames as $buttonName) {
                            echo '<a class="rd-button ' . $buttonName . ' disabled" href="#" onclick="return false;">' . ucfirst($buttonName) . '</a>' . PHP_EOL;
                        }// endforeach;
                        unset($buttonName);
                        ?> 
                    </p>
                    <h3>Sizes</h3>
                    <p>Tiny size by add <code>tiny</code> class to button element.</p>
                    <p>
                        <button class="rd-button tiny">Default</button>
                        <?php
                        foreach ($buttonNames as $buttonName) {
                            echo '<button class="rd-button ' . $buttonName . ' tiny">' . ucfirst($buttonName) . '</button>' . PHP_EOL;
                        }// endforeach;
                        unset($buttonName);
                        ?> 
                    </p>
                    <p>Small size by add <code>small</code> class to button element.</p>
                    <p>
                        <button class="rd-button small">Default</button>
                        <?php
                        foreach ($buttonNames as $buttonName) {
                            echo '<button class="rd-button ' . $buttonName . ' small">' . ucfirst($buttonName) . '</button>' . PHP_EOL;
                        }// endforeach;
                        unset($buttonName);
                        ?> 
                    </p>
                    <p>Large size by add <code>large</code> class to button element.</p>
                    <p>
                        <button class="rd-button large">Default</button>
                        <?php
                        foreach ($buttonNames as $buttonName) {
                            echo '<button class="rd-button ' . $buttonName . ' large">' . ucfirst($buttonName) . '</button>' . PHP_EOL;
                        }// endforeach;
                        unset($buttonName, $buttonNames);
                        ?> 
                    </p>
                    <hr>

                    <h2>Button with dropdown</h2>
                    <p>The dropdown button uses <a href="https://popper.js.org/" target="popper-js">Popper.js</a> to position the dropdown items.</p>
                    <div class="rd-block-level-margin-bottom">
                        <div class="rd-button-group">
                            <button class="rd-button dropdown-toggler">Dropdown <i class="fa-solid fa-caret-down"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save A</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish A</a></li>
                                <li><a href="#" onclick="return false;">Cancel A</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button primary">Button</button>
                            <button class="rd-button primary dropdown-toggler"><i class="fa-solid fa-caret-down"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save B</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish B</a></li>
                                <li><a href="#" onclick="return false;">Cancel B</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <a class="rd-button" href="#go-somewhere">Link button</a>
                            <a class="rd-button dropdown-toggler" href="#"><i class="fa-solid fa-caret-down"></i></a>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save C</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish C</a></li>
                                <li><a href="#" onclick="return false;">Cancel C</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button info">Button with sub buttons</button>
                            <button class="rd-button info dropdown-toggler"><i class="fa-solid fa-caret-down"></i></button>
                            <ul class="rd-dropdown">
                                <li><button type="button">Button</button></li>
                                <li><input type="button" value="Input button"></li>
                                <li><input type="submit" value="Input submit"></li>
                                <li class="divider"></li>
                                <li><a href="#" onclick="return false;">Link</a></li>
                            </ul>
                        </div>
                    </div>
                    <pre>&lt;div class=&quot;rd-button-group&quot;&gt;
    &lt;button class=&quot;rd-button dropdown-toggler&quot;&gt;Dropdown &lt;i class=&quot;fa-solid fa-caret-down&quot;&gt;&lt;/i&gt;&lt;/button&gt;
    &lt;ul class=&quot;rd-dropdown&quot;&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Save A&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Save &amp;amp; Publish A&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Cancel A&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/div&gt;
&lt;div class=&quot;rd-button-group&quot;&gt;
    &lt;button class=&quot;rd-button primary&quot;&gt;Button&lt;/button&gt;
    &lt;button class=&quot;rd-button primary dropdown-toggler&quot;&gt;&lt;i class=&quot;fa-solid fa-caret-down&quot;&gt;&lt;/i&gt;&lt;/button&gt;
    &lt;ul class=&quot;rd-dropdown&quot;&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Save B&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Save &amp;amp; Publish B&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Cancel B&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/div&gt;
&lt;div class=&quot;rd-button-group&quot;&gt;
   &lt;a class=&quot;rd-button&quot; href=&quot;#go-somewhere&quot;&gt;Link button&lt;/a&gt;
   &lt;a class=&quot;rd-button dropdown-toggler&quot; href=&quot;#&quot;&gt;&lt;i class=&quot;fa-solid fa-caret-down&quot;&gt;&lt;/i&gt;&lt;/a&gt;
   &lt;ul class=&quot;rd-dropdown&quot;&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot; onclick=&quot;return false;&quot;&gt;Save C&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot; onclick=&quot;return false;&quot;&gt;Save &amp;amp; Publish C&lt;/a&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot; onclick=&quot;return false;&quot;&gt;Cancel C&lt;/a&gt;&lt;/li&gt;
   &lt;/ul&gt;
&lt;/div&gt;
&lt;div class=&quot;rd-button-group&quot;&gt;
   &lt;button class=&quot;rd-button info&quot;&gt;Button with sub buttons&lt;/button&gt;
   &lt;button class=&quot;rd-button info dropdown-toggler&quot;&gt;&lt;i class=&quot;fa-solid fa-caret-down&quot;&gt;&lt;/i&gt;&lt;/button&gt;
   &lt;ul class=&quot;rd-dropdown&quot;&gt;
      &lt;li&gt;&lt;button type=&quot;button&quot;&gt;Button&lt;/button&gt;&lt;/li&gt;
      &lt;li&gt;&lt;input type=&quot;button&quot; value=&quot;Input button&quot;&gt;&lt;/li&gt;
      &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;Input submit&quot;&gt;&lt;/li&gt;
      &lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;
      &lt;li&gt;&lt;a href=&quot;#&quot; onclick=&quot;return false;&quot;&gt;Link&lt;/a&gt;&lt;/li&gt;
   &lt;/ul&gt;
&lt;/div&gt;</pre>
                    <h3>Sizes</h3>
                    <p>Add <code>tiny</code>, <code>small</code>, <code>large</code> class to the button element that contain <code>rd-button</code> class to change its size.</p>
                    <div class="rd-block-level-margin-bottom">
                        <div class="rd-button-group">
                            <button class="rd-button danger tiny dropdown-toggler">Tiny <i class="fa-solid fa-caret-down"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                                <li><a href="#" onclick="return false;">Cancel</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button info small">Small</button>
                            <button class="rd-button info small dropdown-toggler"><i class="fa-solid fa-caret-down"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save 2</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish 2</a></li>
                                <li><a href="#" onclick="return false;">Cancel 2</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button warning dropdown-toggler">Normal <i class="fa-solid fa-caret-down"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save 3</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish 3</a></li>
                                <li><a href="#" onclick="return false;">Cancel 3</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button success large">Large</button>
                            <button class="rd-button success large dropdown-toggler"><i class="fa-solid fa-caret-down"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save 4</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish 4</a></li>
                                <li><a href="#" onclick="return false;">Cancel 4</a></li>
                            </ul>
                        </div>
                    </div>
                    <pre>&lt;div class=&quot;rd-button-group&quot;&gt;
    &lt;button class=&quot;rd-button danger tiny dropdown-toggler&quot;&gt;Tiny &lt;i class=&quot;fa-solid fa-caret-down&quot;&gt;&lt;/i&gt;&lt;/button&gt;
    &lt;ul class=&quot;rd-dropdown&quot;&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Save&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Save &amp;amp; Publish&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Cancel&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/div&gt;
&lt;div class=&quot;rd-button-group&quot;&gt;
    &lt;button class=&quot;rd-button info small&quot;&gt;Small&lt;/button&gt;
    &lt;button class=&quot;rd-button info small dropdown-toggler&quot;&gt;&lt;i class=&quot;fa-solid fa-caret-down&quot;&gt;&lt;/i&gt;&lt;/button&gt;
    &lt;ul class=&quot;rd-dropdown&quot;&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Save 2&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Save &amp;amp; Publish 2&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Cancel 2&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/div&gt;
&lt;div class=&quot;rd-button-group&quot;&gt;
    &lt;button class=&quot;rd-button success large&quot;&gt;Large&lt;/button&gt;
    &lt;button class=&quot;rd-button success large dropdown-toggler&quot;&gt;&lt;i class=&quot;fa-solid fa-caret-down&quot;&gt;&lt;/i&gt;&lt;/button&gt;
    &lt;ul class=&quot;rd-dropdown&quot;&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Save 4&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Save &amp;amp; Publish 4&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Cancel 4&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/div&gt;</pre>
                    <h3>Placements</h3>
                    <p>Add <code>data-placement</code> attribute into button that contain <code>class=&quot;dropdown-toggler&quot;</code>. Accept values please see <a href="https://popper.js.org/popper-documentation.html#Popper.placements" target="popper-js-doc">this document</a>.</p>
                    <div class="rd-block-level-margin-bottom">
                        <div class="rd-button-group">
                            <button class="rd-button dropdown-toggler" data-placement="top left"><i class="fa-solid fa-caret-up"></i> Top left</button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                                <li><a href="#" onclick="return false;">Cancel</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button dropdown-toggler" data-placement="top">Top center <i class="fa-solid fa-caret-up"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                                <li><a href="#" onclick="return false;">Cancel</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button dropdown-toggler" data-placement="top right">Top right <i class="fa-solid fa-caret-up"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                                <li><a href="#" onclick="return false;">Cancel</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button dropdown-toggler" data-placement="left top"><i class="fa-solid fa-caret-left"></i> Left top</button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                                <li><a href="#" onclick="return false;">Cancel</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button dropdown-toggler" data-placement="left"><i class="fa-solid fa-caret-left"></i> Left middle</button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                                <li><a href="#" onclick="return false;">Cancel</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button dropdown-toggler" data-placement="left bottom"><i class="fa-solid fa-caret-left"></i> Left bottom</button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                                <li><a href="#" onclick="return false;">Cancel</a></li>
                            </ul>
                        </div>
                        <div class="rd-block-level-margin-bottom"></div>
                        <div class="rd-button-group">
                            <button class="rd-button dropdown-toggler" data-placement="bottom left"><i class="fa-solid fa-caret-down"></i> Bottom left</button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                                <li><a href="#" onclick="return false;">Cancel</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button dropdown-toggler" data-placement="bottom">Bottom center <i class="fa-solid fa-caret-down"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                                <li><a href="#" onclick="return false;">Cancel</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button dropdown-toggler" data-placement="bottom right">Bottom right <i class="fa-solid fa-caret-down"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                                <li><a href="#" onclick="return false;">Cancel</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button dropdown-toggler" data-placement="right top">Right top <i class="fa-solid fa-caret-right"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                                <li><a href="#" onclick="return false;">Cancel</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button dropdown-toggler" data-placement="right">Right middle <i class="fa-solid fa-caret-right"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                                <li><a href="#" onclick="return false;">Cancel</a></li>
                            </ul>
                        </div>
                        <div class="rd-button-group">
                            <button class="rd-button dropdown-toggler" data-placement="right bottom">Right bottom <i class="fa-solid fa-caret-right"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish</a></li>
                                <li><a href="#" onclick="return false;">Cancel</a></li>
                            </ul>
                        </div>
                        <div class="rd-block-level-margin-bottom"></div>
                        <div class="rd-button-group">
                            <button class="rd-button">Button</button>
                            <button class="rd-button dropdown-toggler" data-placement="right top"><i class="fa-solid fa-caret-right"></i></button>
                            <ul class="rd-dropdown">
                                <li><a href="#" onclick="return false;">Save B</a></li>
                                <li><a href="#" onclick="return false;">Save &amp; Publish B</a></li>
                                <li><a href="#" onclick="return false;">Cancel B</a></li>
                            </ul>
                        </div>
                    </div>
                    <pre>&lt;div class=&quot;rd-button-group&quot;&gt;
    &lt;button class=&quot;rd-button dropdown-toggler&quot; data-placement=&quot;top left&quot;&gt;&lt;i class=&quot;fa-solid fa-caret-up&quot;&gt;&lt;/i&gt; Top left&lt;/button&gt;
    &lt;ul class=&quot;rd-dropdown&quot;&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Save&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Save &amp;amp; Publish&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Cancel&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/div&gt;</pre>
                    <h3>Dynamically activate button with dropdown</h3>
                    <div id="demo-button-dropdown-placeholder" style="border: 1px dashed #ccc; padding: 0.625rem;"></div>
                    <button id="demo-dynamically-add-button" type="button">Click here to add a button</button>
                    <hr>

                    <h2>Button group</h2>
                    <div class="rd-block-level-margin-bottom">
                        <div class="rd-button-group">
                            <button class="rd-button">Rewind</button>
                            <button class="rd-button">Play</button>
                            <button class="rd-button">Stop</button>
                            <button class="rd-button">Forward</button>
                        </div>
                    </div>
                    <pre>&lt;div class=&quot;rd-button-group&quot;&gt;
    &lt;button class=&quot;rd-button&quot;&gt;Rewind&lt;/button&gt;
    &lt;button class=&quot;rd-button&quot;&gt;Play&lt;/button&gt;
    &lt;button class=&quot;rd-button&quot;&gt;Stop&lt;/button&gt;
    &lt;button class=&quot;rd-button&quot;&gt;Forward&lt;/button&gt;
&lt;/div&gt;</pre>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
        <script>
            document.getElementById('demo-dynamically-add-button').addEventListener('click', function(event) {
                let buttonDropdown = '<div class="rd-button-group">\
                    <button class="rd-button dropdown-toggler">Dropdown <i class="fa-solid fa-caret-down"></i></button>\
                    <ul class="rd-dropdown">\
                        <li><a href="#" onclick="return false;">Save A</a></li>\
                        <li><a href="#" onclick="return false;">Save &amp; Publish A</a></li>\
                        <li><a href="#" onclick="return false;">Cancel A</a></li>\
                    </ul>\
                </div>';
                document.getElementById('demo-button-dropdown-placeholder').innerHTML = buttonDropdown;
            });
        </script>
    </body>
</html>