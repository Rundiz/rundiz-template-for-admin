            <div class="rd-sidebar-back"></div>
            <section class="rd-sidebar">
                <div class="rd-sidebar-inner">
                    <ul class="rd-sidebar-item-list sm sm-vertical sm-rdta">
                        <li><a href="#" onclick="return false;"><i class="sidebar-icon fas fa-tachometer-alt fa-fw"></i> <span class="rd-sidebar-menu-text">Admin home</span></a>
                            <ul>
                                <li><a href="./">Admin dashboard</a></li>
                                <li><a href="javascript:alert('link clicked');">Update</a></li>
                            </ul>
                        </li>
                        <li><a href="#" onclick="return false;"><i class="sidebar-icon fas fa-home fa-fw"></i> <span class="rd-sidebar-menu-text">Front home</span></a></li>
                        <li><a href="#" onclick="return false;"><i class="sidebar-icon fas fa-cog fa-fw"></i> <span class="rd-sidebar-menu-text">Settings</span></a></li>
                        <li><a href="#" onclick="return false;"><i class="sidebar-icon fas fa-cubes fa-fw"></i> <span class="rd-sidebar-menu-text">Sub menus</span></a>
                            <ul>
                                <li><a href="javascript:alert('link clicked');">1</a>
                                    <ul>
                                        <li><a href="javascript:alert('link clicked');">1.1</a>
                                            <ul>
                                                <li><a href="javascript:alert('link clicked');">1.1.1</a>
                                                    <ul>
                                                        <li><a href="javascript:alert('link clicked');">1.1.1.1</a></li>
                                                        <li><a href="#" onclick="return false;">1.1.1.2</a></li>
                                                        <li><a href="#" onclick="return false;">1.1.1.3</a></li>
                                                        <li><a href="#" onclick="return false;">1.1.1.4</a></li>
                                                        <li><a href="#" onclick="return false;">1.1.1.5</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#" onclick="return false;">1.1.2</a></li>
                                                <li><a href="#" onclick="return false;">1.1.3</a></li>
                                                <li><a href="#" onclick="return false;">1.1.4</a></li>
                                                <li><a href="#" onclick="return false;">1.1.5</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#" onclick="return false;">1.2</a></li>
                                        <li><a href="#" onclick="return false;">1.3</a></li>
                                        <li><a href="#" onclick="return false;">1.4</a></li>
                                        <li><a href="#" onclick="return false;">1.5</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" onclick="return false;">2</a>
                                    <ul>
                                        <li><a href="#" onclick="return false;">2.1</a></li>
                                        <li><a href="#" onclick="return false;">2.2</a>
                                            <ul>
                                                <li><a href="#" onclick="return false;">2.2.1</a></li>
                                                <li><a href="#" onclick="return false;">2.2.2</a>
                                                    <ul>
                                                        <li><a href="#" onclick="return false;">2.2.2.1</a></li>
                                                        <li><a href="#" onclick="return false;">2.2.2.2</a>
                                                            <ul>
                                                                <li><a href="#" onclick="return false;">2.2.2.2.1</a></li>
                                                                <li><a href="#" onclick="return false;">2.2.2.2.2</a></li>
                                                                <li><a href="#" onclick="return false;">2.2.2.2.3</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#" onclick="return false;">2.2.2.3</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#" onclick="return false;">2.2.3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#" onclick="return false;">2.3</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" onclick="return false;">3</a>
                                    <ul>
                                    <!-- it is recommended that you should not have more than 15 items per sub menu, or you have to modify options in `rdtaSidebarSmartMenus()` function -->
<?php
for ($i = 1; $i <= 50; $i++) {
    echo indent(10).'<li><a href="#" onclick="return false;">3.'.$i.'</a></li>'."\n";
}
?>
                                    </ul>
                                </li>
                                <li><a href="#" onclick="return false;">4</a></li>
                                <li><a href="#" onclick="return false;">5</a></li>
                                <li><a href="#" onclick="return false;">6</a></li>
                                <li><a href="#" onclick="return false;">7</a></li>
                                <li><a href="#" onclick="return false;">8</a></li>
                                <li class="divider"><a href="#" onclick="alert('Nothing works here!'); return false;">Nothing here will be display.</a></li>
                                <li><a href="#" onclick="return false;">The above is <code>li.divider</code></a></li>
                                <li><a href="#" onclick="return false;">9</a>
                                    <ul>
                                        <li><a href="#" onclick="return false;">1</a></li>
                                        <li><a href="#" onclick="return false;">2</a></li>
                                        <li><a href="#" onclick="return false;">3</a></li>
                                        <li class="divider"><a href="#" onclick="alert('Nothing works here!'); return false;">Nothing here will be display.</a></li>
                                        <li><a href="#" onclick="return false;">Divider in sub menus</a></li>
                                        <li><a href="#" onclick="return false;">4</a></li>
                                        <li><a href="#" onclick="return false;">5</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" onclick="return false;">10</a></li>
                            </ul>
                        </li>
                        <li><a href="#" onclick="return false;"><i class="sidebar-icon fas fa-greater-than-equal fa-fw"></i> <span class="rd-sidebar-menu-text">Longggggggggg menu item text that is very long</span></a>
                            <ul>
                                <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 1</a>
                                    <ul>
                                        <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 1.1</a></li>
                                        <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 1.2</a></li>
                                        <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 1.3</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 2</a>
                                    <ul>
                                        <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 2.1</a>
                                            <ul>
                                                <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 2.1.1</a></li>
                                                <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 2.1.2</a></li>
                                                <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 2.1.3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 2.2</a></li>
                                        <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 2.3</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 3</a></li>
                                <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 4</a></li>
                                <li><a href="#" onclick="return false;">longggggggggggggggggggggggggggggggggggggggggggg submenu item 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#" onclick="return false;"><i class="sidebar-icon fas fa-server fa-fw"></i> <span class="rd-sidebar-menu-text">Components</span></a>
                            <ul>
                                <li><a href="typography.php">Typography</a></li>
                                <li><a href="basic-layout.php">Basic layout</a></li>
                                <li><a href="#" onclick="return false;">Sticky menu</a>
                                    <ul>
                                        <li><a href="stickymenu-long-content.php">Sticky menu (long content)</a></li>
                                        <li><a href="stickymenu-long-menu.php">Sticky menu (long menu)</a></li>
                                        <li><a href="stickymenu-long-content-menu.php">Sticky menu (long content &amp; menu)</a></li>
                                    </ul>
                                </li>
                                <li class="divider"></li>
                                <li><a href="accordion.php">Accordion</a></li>
                                <li><a href="alert-box.php">Alert box</a></li>
                                <li><a href="badge.php">Badge</a></li>
                                <li><a href="button.php">Button</a></li>
                                <li><a href="columns-flex.php">Columns flex</a></li>
                                <li><a href="datatable.php">Data table</a></li>
                                <li><a href="dialog.php">Dialog</a></li>
                                <li><a href="form.php">Form</a></li>
                                <li><a href="helpers.php">Helpers</a></li>
                                <li><a href="pagination.php">Pagination</a></li>
                                <li><a href="tabs.php">Tabs</a></li>
                                <li><a href="tooltips.php">Tooltips</a></li>
                            </ul>
                        </li>
                        <li><a href="#" onclick="return false;"><i class="sidebar-icon fas fa-laptop-code"></i> <span class="rd-sidebar-menu-text">Examples</span></a>
                            <ul>
                                <li><a href="example-login.php">Login page</a></li>
                                <li><a href="example-logout.php">Logout page</a></li>
                            </ul>
                        </li>
                        <li><a href="#" onclick="return false;"><i class="sidebar-icon fas fa-code fa-fw"></i> <span class="rd-sidebar-menu-text">Tools &amp; guide</span></a>
                            <ul>
                                <li><a href="credits.php">Credits</a></li>
                                <li><a href="https://css-tricks.com/snippets/css/complete-guide-grid/" target="tools_cssgrid">CSS grid</a></li>
                                <li><a href="https://css-tricks.com/snippets/css/a-guide-to-flexbox/" target="tools_cssflex">CSS flex box</a></li>
                                <li><a href="https://www.w3.org/wiki/HTML_structural_elements" target="tools_html5structural">HTML 5 structural elements</a></li>
                                <li><a href="http://pxtoem.com/" target="pxtoemconverter">Pixel / <code>em</code> converter</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="rd-sidebar-item-list rd-sidebar-expand-collapse-controls">
                        <li>
                            <a data-target=".rd-page-wrapper" title="Expane/collapse menu"><i class="sidebar-icon faicon fas fa-chevron-left fa-fw" data-toggle-icon="fa-chevron-left fa-chevron-right"></i> <span class="screen-reader-only" aria-hidden="true">Expane/collapse menu</span></a>
                            <hr>
                        </li>
                    </ul>
                </div><!--.rd-sidebar-inner-->
            </section><!--.rd-sidebar-->