<?php 
require 'includes/functions.php'; 

// dummy data created by https://www.mockaroo.com/
$dummyData = file_get_contents(__DIR__ . '/includes/dummy-data.json');
?>
<!DOCTYPE html>
<html class="rd-template-admin">
    <head>
<?php
$title = 'Data table';
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
                <div class="rd-page-content page-datatable">
                    <h1>Data table</h1>
                    <p>Display the data in the table.</p>
                    <hr>

                    <h2>Examples</h2>
                    <p>You need to add base class <code>rd-datatable</code> to any <code>&lt;table&gt;</code>. 
                        Wrap the table with class <code>rd-datatable-wrapper</code> can prevent table too wide on small screen. 
                        Therefore, users can view all data by scrolling left and right.
                    </p>
                    <p>The class <code>column-checkbox</code> is for make column width best fit for the checkbox.</p>
                    <div class="rd-datatable-wrapper rd-datatable-wrapper-sample1">
                        <table class="rd-datatable">
                            <thead>
                                <tr>
                                    <th class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
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
                                            echo indent(9).'<td class="column-checkbox"><input type="checkbox" name="id[]" value="'.$row->id.'"></td>'."\n";
                                            echo indent(9).'<td>'.$row->id.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->name.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->address.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->email.'</td>'."\n";
                                            echo indent(9).'<td>'."\n";
                                            echo indent(10).'<div class="rd-button-group">'."\n";
                                            echo indent(11).'<button class="rd-button small"><i class="fa-solid fa-pencil"></i> Edit</button>'."\n";
                                            echo indent(11).'<button class="rd-button small dropdown-toggler" data-placement="bottom right"><i class="fa-solid fa-caret-down"></i></button>'."\n";
                                            echo indent(11).'<ul class="rd-dropdown">'."\n";
                                            echo indent(12).'<li><a href="#"><i class="fa-solid fa-key fa-fw"></i> Permissions</a></li>'."\n";
                                            echo indent(12).'<li><a href="#"><i class="fa-solid fa-xmark fa-fw"></i> Delete</a></li>'."\n";
                                            echo indent(11).'</ul>'."\n";
                                            echo indent(10).'</div>'."\n";
                                            echo indent(9).'</td>'."\n";
                                            echo indent(8).'</tr>'."\n";
                                            $i++;
                                            if ($i > 3) {
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
                                    <th class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!--.rd-datatable-wrapper-->
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".rd-datatable-wrapper-sample1" data-target-src-remove-first-space="20"></pre>
                    <h3>H Border</h3>
                    <p>This data table only use horizontal border by add <code>h-border</code> to table class.</p>
                    <div class="rd-datatable-wrapper rd-datatable-wrapper-sample-hborder">
                        <table class="rd-datatable h-border">
                            <thead>
                                <tr>
                                    <th class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
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
                                            echo indent(9).'<td class="column-checkbox"><input type="checkbox" name="id[]" value="'.$row->id.'"></td>'."\n";
                                            echo indent(9).'<td>'.$row->id.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->name.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->address.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->email.'</td>'."\n";
                                            echo indent(9).'<td>'."\n";
                                            echo indent(10).'<div class="rd-button-group">'."\n";
                                            echo indent(11).'<button class="rd-button small"><i class="fa-solid fa-pencil"></i> Edit</button>'."\n";
                                            echo indent(11).'<button class="rd-button small dropdown-toggler" data-placement="bottom right"><i class="fa-solid fa-caret-down"></i></button>'."\n";
                                            echo indent(11).'<ul class="rd-dropdown">'."\n";
                                            echo indent(12).'<li><a href="#"><i class="fa-solid fa-key fa-fw"></i> Permissions</a></li>'."\n";
                                            echo indent(12).'<li><a href="#"><i class="fa-solid fa-xmark fa-fw"></i> Delete</a></li>'."\n";
                                            echo indent(11).'</ul>'."\n";
                                            echo indent(10).'</div>'."\n";
                                            echo indent(9).'</td>'."\n";
                                            echo indent(8).'</tr>'."\n";
                                            $i++;
                                            if ($i > 3) {
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
                                    <th class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!--.rd-datatable-wrapper-->
                    <h5>Source</h5>
                    <pre class="preview-source"><code class="language-html"><?php 
                    echo htmlspecialchars('<table class="rd-datatable h-border">
    ...
</table>', ENT_QUOTES);
                    ?></code></pre>
                    <h3>Sortable columns</h3>
                    <p>Example for sortable columns. Add the class <code>sortable-icon</code> to any sortable icon in the link to make it appears on hover.</p>
                    <div class="rd-datatable-wrapper">
                        <table class="rd-datatable h-border">
                            <thead>
                                <tr>
                                    <th class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></th>
                                    <th><a href="?sort=id" onclick="return false;">ID <i class="order-asc sortable-icon"></i></a></th>
                                    <th class="sorted"><a href="?sort=name" onclick="return false;">Name <i class="order-asc sortable-icon"></i></a></th>
                                    <th><a href="?sort=address" onclick="return false;">Address <i class="order-asc sortable-icon"></i></a></th>
                                    <th><a href="?sort=email" onclick="return false;">Email <i class="order-asc sortable-icon"></i></a></th>
                                    <th>Actions</th>
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
                                            echo indent(9).'<td class="column-checkbox"><input type="checkbox" name="id[]" value="'.$row->id.'"></td>'."\n";
                                            echo indent(9).'<td>'.$row->id.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->name.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->address.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->email.'</td>'."\n";
                                            echo indent(9).'<td>'."\n";
                                            echo indent(10).'<div class="rd-button-group">'."\n";
                                            echo indent(11).'<button class="rd-button small"><i class="fa-solid fa-pencil"></i> Edit</button>'."\n";
                                            echo indent(11).'<button class="rd-button small dropdown-toggler" data-placement="bottom right"><i class="fa-solid fa-caret-down"></i></button>'."\n";
                                            echo indent(11).'<ul class="rd-dropdown">'."\n";
                                            echo indent(12).'<li><a href="#"><i class="fa-solid fa-key fa-fw"></i> Permissions</a></li>'."\n";
                                            echo indent(12).'<li><a href="#"><i class="fa-solid fa-xmark fa-fw"></i> Delete</a></li>'."\n";
                                            echo indent(11).'</ul>'."\n";
                                            echo indent(10).'</div>'."\n";
                                            echo indent(9).'</td>'."\n";
                                            echo indent(8).'</tr>'."\n";
                                            $i++;
                                            if ($i > 3) {
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
                                    <th class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></th>
                                    <th><a href="?sort=id" onclick="return false;">ID <i class="order-asc sortable-icon"></i></a></th>
                                    <th class="sorted"><a href="?sort=name" onclick="return false;">Name <i class="order-asc sortable-icon"></i></a></th>
                                    <th><a href="?sort=address" onclick="return false;">Address <i class="order-asc sortable-icon"></i></a></th>
                                    <th><a href="?sort=email" onclick="return false;">Email <i class="order-asc sortable-icon"></i></a></th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!--.rd-datatable-wrapper-->
                    <h5>Source</h5>
                    <pre class="preview-source"><code class="language-html"><?php 
$sampleHTML = '<table class="rd-datatable">
    <thead>
        <tr>
            <th class="sorted"><a href="?sort=id">ID <i class="order-asc sortable-icon"></i></a></th>
            <th><a href="?sort=name">Name <i class="order-asc sortable-icon"></i></a></th>
        </tr>
    </thead>
    ...
</table>';
echo trim(htmlspecialchars($sampleHTML, ENT_QUOTES));
unset($sampleHTML);
                    ?></code></pre>
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
                    <div class="rd-datatable-wrapper rd-datatable-wrapper-sample-rowcolors">
                        <table class="rd-datatable h-border">
                            <thead>
                                <tr>
                                    <th class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></th>
                                    <th>Type</th>
                                    <th>Class</th>
                                    <th>Name</th>
                                    <th>Actions</th>
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
                                            echo indent(9).'<td class="column-checkbox"><input type="checkbox" name="id[]" value="'.$row->id.'"></td>'."\n";
                                            echo indent(9).'<td>'.(isset($rowColors[$i]['name']) && is_scalar($rowColors[$i]['name']) ? $rowColors[$i]['name'] : '').'</td>'."\n";
                                            echo indent(9).'<td>'.(isset($rowColors[$i]['class']) && is_scalar($rowColors[$i]['class']) && $rowColors[$i]['class'] != null ? '<code>table-row-'.$rowColors[$i]['class'] . '</code>' : '').'</td>'."\n";
                                            echo indent(9).'<td>'.$row->name.'</td>'."\n";
                                            echo indent(9).'<td>'."\n";
                                            echo indent(10).'<div class="rd-button-group">'."\n";
                                            echo indent(11).'<button class="rd-button small"><i class="fa-solid fa-pencil"></i> Edit</button>'."\n";
                                            echo indent(11).'<button class="rd-button small dropdown-toggler" data-placement="bottom right"><i class="fa-solid fa-caret-down"></i></button>'."\n";
                                            echo indent(11).'<ul class="rd-dropdown">'."\n";
                                            echo indent(12).'<li><a href="#"><i class="fa-solid fa-key fa-fw"></i> Permissions</a></li>'."\n";
                                            echo indent(12).'<li><a href="#"><i class="fa-solid fa-xmark fa-fw"></i> Delete</a></li>'."\n";
                                            echo indent(11).'</ul>'."\n";
                                            echo indent(10).'</div>'."\n";
                                            echo indent(9).'</td>'."\n";
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
                                    <th class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></th>
                                    <th>Type</th>
                                    <th>Class</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!--.rd-datatable-wrapper-->
                    <h5>Source</h5>
                    <pre class="preview-source"><code class="language-html"><?php
foreach ($rowColors as $index => $rowColor) {
    if (0 === intval($index)) {
        continue;
    }
    $sampleHTML = '<tr class="table-row-' . $rowColor['class'] . '">...</tr>';
    echo trim(htmlspecialchars($sampleHTML, ENT_QUOTES)) . PHP_EOL;
    unset($sampleHTML);
}// endforeach;
unset($index, $rowcolor);
                    ?></code></pre>
                    <h3>Cell colors</h3>
                    <p>Add showing class to table cell (<code>&lt;td&gt;</code>, or <code>&lt;th&gt;</code>).</p>
                    <div class="rd-datatable-wrapper rd-datatable-wrapper-sample-cellcolors">
                        <table class="rd-datatable">
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
                                <tr class="table-row-info">
                                    <td colspan="<?php if (isset($rowColors) && is_array($rowColors)) {echo count($rowColors)-1;} else {echo 1;} ?>">Info row color</td>
                                    <td class="table-cell-success">Success</td>
                                </tr>
                                <tr>
                                    <td colspan="<?php if (isset($rowColors) && is_array($rowColors)) {echo count($rowColors);} else {echo 1;} ?>">This row contain no cell or row color.</td>
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
                    <h5>Source</h5>
                    <pre class="preview-source"><code class="language-html"><?php
foreach ($rowColors as $index => $rowColor) {
    if (0 === intval($index)) {
        continue;
    }
    $sampleHTML = '<td class="table-cell-' . $rowColor['class'] . '">...</td>';
    echo trim(htmlspecialchars($sampleHTML, ENT_QUOTES)) . PHP_EOL;
    unset($sampleHTML);
}// endforeach;
unset($index, $rowcolor);
unset($rowColors);
                    ?></code></pre>
                    <h3>Data table with filters row</h3>
                    <p>Add <code>filter-row</code> class to <code>&lt;tr&gt;</code> of the row that contain filters input.</p>
                    <div class="rd-datatable-wrapper rd-datatable-wrapper-sample-withfiltersrow">
                        <table class="rd-datatable">
                            <thead>
                                <tr>
                                    <th class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></th>
                                    <th class="sorted"><a href="?sort=id" onclick="return false;">ID <i class="order-desc sortable-icon"></i></a></th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                                <tr class="filter-row">
                                    <td></td>
                                    <td></td>
                                    <td><input class="input-small" type="search" placeholder="Search for name"></td>
                                    <td>
                                        <select class="input-small">
                                            <option>Filter address</option>
                                            <option>City 1</option>
                                            <option>City 2</option>
                                        </select>
                                    </td>
                                    <td><input class="input-small" type="search" placeholder="Search for email"></td>
                                    <td><button class="rd-button info small">Filter</button></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                echo "\n";
                                if (isset($dummyData)) {
                                    $dummyDataArray = json_decode($dummyData);
                                    if (is_array($dummyDataArray)) {
                                        arsort($dummyDataArray, SORT_DESC);
                                        $i = 1;
                                        foreach ($dummyDataArray as $row) {
                                            echo indent(8).'<tr>'."\n";
                                            echo indent(9).'<td class="column-checkbox"><input type="checkbox" name="id[]" value="'.$row->id.'"></td>'."\n";
                                            echo indent(9).'<td>'.$row->id.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->name.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->address.'</td>'."\n";
                                            echo indent(9).'<td>'.$row->email.'</td>'."\n";
                                            echo indent(9).'<td>'."\n";
                                            echo indent(10).'<div class="rd-button-group">'."\n";
                                            echo indent(11).'<button class="rd-button small"><i class="fa-solid fa-pencil"></i> Edit</button>'."\n";
                                            echo indent(11).'<button class="rd-button small dropdown-toggler" data-placement="bottom right"><i class="fa-solid fa-caret-down"></i></button>'."\n";
                                            echo indent(11).'<ul class="rd-dropdown">'."\n";
                                            echo indent(12).'<li><a href="#"><i class="fa-solid fa-key fa-fw"></i> Permissions</a></li>'."\n";
                                            echo indent(12).'<li><a href="#"><i class="fa-solid fa-xmark fa-fw"></i> Delete</a></li>'."\n";
                                            echo indent(11).'</ul>'."\n";
                                            echo indent(10).'</div>'."\n";
                                            echo indent(9).'</td>'."\n";
                                            echo indent(8).'</tr>'."\n";
                                            $i++;
                                            if ($i > 3) {
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
                                    <th class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></th>
                                    <th class="sorted"><a href="?sort=id" onclick="return false;">ID <i class="order-desc sortable-icon"></i></a></th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!--.rd-datatable-wrapper-->
                    <h5>Source</h5>
                    <pre class="preview-source"><code class="language-html"><?php 
                    echo htmlspecialchars('<tr class="filter-row">...</tr>', ENT_QUOTES);
                    ?></code></pre>
                    <h3>Responsive</h3>
                    <p>This style of responsive is collapsible/expandable table for small screen size. 
                        To make it work, add the classes <code>responsive</code> and <code>rd-datatable</code> to the <code>&lt;table&gt;</code>.<br>
                        With this kind of responsive, you may not need to wrap the <code>&lt;table&gt;</code> with the class <code>.rd-datatable-wrapper</code>.
                    </p>
                    <p>The class <code>column-primary</code> is for make that column always displayed on all screen sizes. This primary column should have only one per table. 
                        The classes <code>row-actions</code>, and <code>action</code> are for display each table row actions and will be displayed on mouse hover.<br>
                        The class <code>toggle-row</code> that added to the button is to make that button work as expand/collapse on small screen.
                    </p>
                    <div class="rd-datatable-wrapper">
                        <table class="rd-datatable responsive rd-datatable-sample-responsive1">
                            <thead>
                                <tr>
                                    <td class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></td>
                                    <th class="column-primary"><a href="?sort=name" onclick="return false;">Name <i class="order-asc sortable-icon"></i></a></th>
                                    <th><a href="?sort=address" onclick="return false;">Address <i class="order-asc sortable-icon"></i></a></th>
                                    <th><a href="?sort=email" onclick="return false;">Email <i class="order-asc sortable-icon"></i></a></th>
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
                                            echo indent(7).'<tr>'."\n";
                                            echo indent(8).'<td class="column-checkbox"><input type="checkbox" name="id[]" value="'.$row->id.'"></td>'."\n";
                                            echo indent(8).'<td class="column-primary" data-colname="Name">'."\n";
                                            echo indent(9).$row->name."\n";
                                            echo indent(9).'<div class="row-actions">'."\n";
                                            echo indent(10).'<span class="action"><a href="#">Edit</a></span>'."\n";
                                            echo indent(10).'<span class="action"><a href="#">Permissions</a></span>'."\n";
                                            echo indent(10).'<span class="action"><a href="#">Delete</a></span>'."\n";
                                            echo indent(9).'</div><!--.row-actions-->'."\n";
                                            echo indent(9).'<button class="toggle-row" type="button"><i class="faicon fa-solid fa-caret-down fa-fw" data-toggle-icon="fa-caret-down fa-caret-up"></i><span class="screen-reader-only">Show more details</span></button>'."\n";
                                            echo indent(8).'</td>'."\n";
                                            echo indent(8).'<td data-colname="Address">'.$row->address.'</td>'."\n";
                                            echo indent(8).'<td data-colname="Email">'.$row->email.'</td>'."\n";
                                            echo indent(7).'</tr>'."\n";
                                            $i++;
                                            if ($i > 3) {
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
                                    <td class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></td>
                                    <th class="column-primary"><a href="?sort=name" onclick="return false;">Name <i class="order-asc sortable-icon"></i></a></th>
                                    <th><a href="?sort=address" onclick="return false;">Address <i class="order-asc sortable-icon"></i></a></th>
                                    <th><a href="?sort=email" onclick="return false;">Email <i class="order-asc sortable-icon"></i></a></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <h5>Source</h5>
                    <pre class="preview-source" data-target-src=".rd-datatable-sample-responsive1" data-target-src-remove-first-space="24"></pre>
                    <p>And if there is no data in the responsive table.</p>
                    <table class="rd-datatable responsive">
                        <thead>
                            <tr>
                                <td class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></td>
                                <th class="column-primary">Name</th>
                                <th>Address</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4">No data.</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="column-checkbox"><input type="checkbox" onclick="RundizTemplateAdmin.dataTableCheckboxToggler(this);"></td>
                                <th class="column-primary">Name</th>
                                <th>Address</th>
                                <th>Email</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>