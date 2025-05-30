<?php 
require 'includes/functions.php'; 

// dummy data created by https://www.mockaroo.com/
$dummyData = file_get_contents(__DIR__ . '/includes/dummy-data.json');
?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'DataTables JS by datatables.net';
include 'includes/html-head.php'; 
?> 
        <link class="datatables-js" rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
        <link class="datatables-js" rel="stylesheet" href="//cdn.datatables.net/responsive/3.0.4/css/responsive.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/components/rdta-datatables-js.css'); ?>">
    </head>
    <body>
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
<?php include 'includes/partials/page-sidebar.php'; ?> 
            <main>
<?php echo renderBreadcrumb(['./' => 'Home', '#' => $title], 4); ?> 
                <div class="rd-page-content page-datatable">
                    <h1><?php echo $title; ?></h1>
                    <p class="rdta-version-info">(Since v.2.3.0)</p>
                    <p>Custom style for <a href="https://datatables.net/" target="datatables">DataTables JS</a> version 1, 2.</p>
                    <p>
                        In order to make DataTables JS design works, add this file after DataTables's CSS.
                        <strong>assets/css/rdta/components/rdta-datatables.css</strong>,
                    </p>
                    <hr>

                    <h2>Examples</h2>
                    <p>This is the most basic example (<a href="https://datatables.net/examples/basic_init/zero_configuration.html" target="_blank">zero configuration</a>) for DataTables. It use only class <code>display</code> on <code>&lt;table&gt;</code> element.</p>
                    <p>The <code>&lt;div&gt;</code> that contain class <code>rd-datatable-wrapper</code> and wrapped the table is just to prevent table too wide on small screen. You may remove it in your real project.</p>
                    <div class="rd-datatable-wrapper">
                        <table id="rdta-datatables-sample1" class="display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                echo "\n";
                                if (isset($dummyData)) {
                                    $dummyDataArray = json_decode($dummyData);
                                    if (is_array($dummyDataArray)) {
                                        $i = 1;
                                        foreach ($dummyDataArray as $row) {
                                            echo indent(8).'<tr>'."\n";
                                            echo indent(9).'<td>'.$row->id.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->name.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->address.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->email.'</td>'."\n";
                                            echo indent(8).'</tr>'."\n";
                                            $i++;
                                            if ($i > 100) {
                                                break;
                                            }
                                        }// endforeach;
                                        unset($i, $row);
                                    }
                                    unset($dummyDataArray);
                                }
                                ?> 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!--.rd-datatable-wrapper-->
                    <h5>Source</h5>
                    <pre><code class="language-html"><?php 
$sampleHTML = <<<EOT
<div class="rd-datatable-wrapper">
    <table id="my-data-table" class="display">
        ...
    </table>
</div>
EOT;
                    echo trim(htmlspecialchars($sampleHTML, ENT_QUOTES));
                    unset($sampleHTML);
                    ?></code></pre>
                    <h3>DataTables's styles</h3>
                    <div class="select-datatables-styles rd-content-level-margin-bottom">
                        <label>
                            Select style:
                            <select id="datatables-styles">
                                <option value="display" selected="selected">Base style (class name display)</option>
                                <option value="">No style</option>
                                <option value="cell-border">Cell borders (cell-border)</option>
                                <option value="display compact">Compact (display compact)</option>
                                <option value="hover">Hover (hover)</option>
                                <option value="order-column">Order-column (order-column)</option>
                                <option value="row-border">Row borders (row-border)</option>
                                <option value="stripe">Stripe (stripe)</option>
                            </select>
                        </label>
                    </div>
                    <div id="rdta-datatables-sample-dt-styles-placeholder"></div>
                    <?php
                    $rowColors = [
                        0 => ['name' => 'Default', 'class' => ''],
                        1 => ['name' => 'Primary', 'class' => 'primary'],
                        2 => ['name' => 'Info', 'class' => 'info'],
                        3 => ['name' => 'Danger', 'class' => 'danger'],
                        4 => ['name' => 'Warning', 'class' => 'warning'],
                        5 => ['name' => 'Success', 'class' => 'success'],
                    ];
                    ?> 
                    <h3>Row colors</h3>
                    <p>Add showing class to <code>&lt;tr&gt;</code>.</p>
                    <table id="rdta-datatables-sample-rowcolors" class="display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Class</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo "\n";
                            if (isset($dummyData)) {
                                $dummyDataArray = json_decode($dummyData);
                                if (is_array($dummyDataArray)) {
                                    $i = 0;
                                    foreach ($dummyDataArray as $row) {
                                        echo indent(8).'<tr';
                                        if (isset($rowColors[$i]['class']) && $rowColors[$i]['class'] != null && is_scalar($rowColors[$i]['class'])) {
                                            echo ' class="table-row-'.$rowColors[$i]['class'].'"';
                                        }
                                        echo '>'."\n";
                                        echo indent(9).'<td>'.(isset($rowColors[$i]['name']) && is_scalar($rowColors[$i]['name']) ? $rowColors[$i]['name'] : '').'</td>'."\n";
                                        echo indent(9).'<td>'.(isset($rowColors[$i]['class']) && is_scalar($rowColors[$i]['class']) && $rowColors[$i]['class'] != null ? '<code>table-row-'.$rowColors[$i]['class'] . '</code>' : '').'</td>'."\n";
                                        echo indent(9).'<td>'.$row->name.'</td>'."\n";
                                        echo indent(8).'</tr>'."\n";
                                        $i++;
                                        if ($i >= count($rowColors)) {
                                            break;
                                        }
                                    }// endforeach;
                                    unset($i, $row);
                                }
                                unset($dummyDataArray);
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Type</th>
                                <th>Class</th>
                                <th>Name</th>
                            </tr>
                        </tfoot>
                    </table>
                    <h3>Cell colors</h3>
                    <p>Add showing class to table cell (<code>&lt;td&gt;</code>, or <code>&lt;th&gt;</code>).</p>
                    <div class="rd-datatable-wrapper">
                        <table id="rdta-datatables-sample-cellcolors" class="cell-border">
                            <thead>
                                <tr>
                                    <?php
                                    echo "\n";
                                    if (isset($rowColors) && is_array($rowColors)) {
                                        foreach ($rowColors as $colorItem) {
                                            echo indent(9).'<th>'.(isset($colorItem['name']) && is_scalar($colorItem['name']) ? $colorItem['name'] : '').'</th>'."\n";
                                        }// endforeach;
                                        unset($colorItem);
                                    }
                                    ?> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    echo "\n";
                                    if (isset($rowColors) && is_array($rowColors)) {
                                        foreach ($rowColors as $colorItem) {
                                            echo indent(9).'<td';
                                            if (isset($colorItem['class']) && is_scalar($colorItem['class']) && $colorItem['class'] != null) {
                                                echo ' class="table-cell-'.$colorItem['class'].'"';
                                            }
                                            echo '>';
                                            echo (isset($colorItem['name']) ? $colorItem['name'] : '');
                                            if (isset($colorItem['class']) && is_scalar($colorItem['class']) && $colorItem['class'] != null) {
                                                echo '<br><code>table-cell-'.$colorItem['class'] . '</code>';
                                            }
                                            echo '</td>'."\n";
                                        }// endforeach;
                                        unset($colorItem);
                                    }
                                    ?> 
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <?php
                                    echo "\n";
                                    if (isset($rowColors) && is_array($rowColors)) {
                                        foreach ($rowColors as $colorItem) {
                                            echo indent(9).'<th>'.(isset($colorItem['name']) && is_scalar($colorItem['name']) ? $colorItem['name'] : '').'</th>'."\n";
                                        }// endforeach;
                                        unset($colorItem);
                                    }
                                    ?> 
                                </tr>
                            </tfoot>
                        </table>
                    </div><!--.rd-datatable-wrapper-->
                    <?php unset($rowColors); ?> 
                    <h3>Individual column search, select</h3>
                    <p>The individual column searching require more code on JS which you can see examples from 
                        <a href="https://datatables.net/examples/api/multi_filter.html" target="_blank">here for text input</a>,
                        or <a href="https://datatables.net/examples/api/multi_filter_select.html" target="_blank">here for select input</a>.
                    </p>
                    <div id="rdta-datatables-sample-individual-searchselect-placeholder"></div>
                    <h3>Responsive</h3>
                    <p>Resize your browser to be small to see responsive table work.</p>
                    <div id="rdta-datatables-sample-responsive-placeholder"></div>
                    <h4>Responsive full actions</h4>
                    <p>Responsive DataTables with actions row, check box, and responsive button (expand/collapse) on custom column. The email column will be always hide to show the feature.</p>
                    <table id="rdta-datatables-sample-responsive2" class="hover row-border">
                        <thead>
                            <tr>
                                <td><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></td>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo "\n";
                            if (isset($dummyData)) {
                                $dummyDataArray = json_decode($dummyData);
                                if (is_array($dummyDataArray)) {
                                    $i = 1;
                                    foreach ($dummyDataArray as $row) {
                                        echo indent(8).'<tr>'."\n";
                                        echo indent(9).'<td><input type="checkbox" name="id[]" value="'.$row->id.'"></td>'."\n";
                                        echo indent(9).'<td>'.$row->id.'</td>'."\n";
                                        echo indent(9).'<td>' . "\n"
                                            . indent(10) . $row->name . "\n"
                                            . indent(10) . '<div class="row-actions">' . "\n"
                                            . indent(11) . '<span class="action"><a href="#">Edit</a></span>' . "\n"
                                            . indent(11) . '<span class="action"><a href="#">Delete</a></span>' . "\n"
                                            . indent(10) . '</div><!--.row-actions-->' . "\n"
                                            . indent(9) . '</td>'."\n";
                                        echo indent(9).'<td>'.$row->address.'</td>'."\n";
                                        echo indent(9).'<td>'.$row->email.'</td>'."\n";
                                        echo indent(9).'<td></td>'."\n";
                                        echo indent(8).'</tr>'."\n";
                                        $i++;
                                        if ($i > 20) {
                                            break;
                                        }
                                    }// endforeach;
                                    unset($i, $row);
                                }
                                unset($dummyDataArray);
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></td>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                    <h5>Source</h5>
                    <p>Source for HTML.</p>
                    <pre class="preview-source" data-target-src="#rdta-datatables-sample-responsive2" data-target-src-remove-first-space="20"></pre>
                    <p>Source for <a href="https://datatables.net/manual/options" target="_blank">DataTables options</a>.</p>
                    <pre><code class="language-js"><?php 
$sampleJS = <<<EOT
{
    'columnDefs': [
        {
            'orderable': false,
            'searchable': false,
            'targets': [0, -1]
        },
        {
            'className': 'column-checkbox',
            'targets': 0,
        },
        {
            'className': 'none',
            'targets': 4,
        },
        {
            'className': 'dtr-control',
            'orderable': false,
            'targets': -1,
        },
    ],
    'order': [[1, 'desc']],
    'processing': true,
    'responsive': {
        details: {
            type: 'column',
            target: -1,
        },
    }
}
EOT;
                    echo trim(htmlspecialchars($sampleJS, ENT_QUOTES));
                    unset($sampleJS);
                    ?></code></pre>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->


<?php include 'includes/js-end-body.php'; ?> 
        <script class="datatables-js" src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
        <script class="datatables-js" src="//cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.min.js"></script>
        <script src="assets/js-preview/datatables-js.js"></script>
    </body>
</html>