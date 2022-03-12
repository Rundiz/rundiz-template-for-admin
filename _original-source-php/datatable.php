<?php 
require 'includes/functions.php'; 

$dummyData = '[{"id":1,"name":"Gwendolyn Uphill","address":"282 Springview Street","email":"guphill0@upenn.edu"},
{"id":2,"name":"Reinhold Keneleyside","address":"820 Old Gate Parkway","email":"rkeneleyside1@de.vu"},
{"id":3,"name":"Leroy Orrah","address":"8 Charing Cross Avenue","email":"lorrah2@wikia.com"},
{"id":4,"name":"Rutherford Tarney","address":"10 Valley Edge Park","email":"rtarney3@cocolog-nifty.com"},
{"id":5,"name":"Perl Lancetter","address":"98697 Bultman Park","email":"plancetter4@fc2.com"},
{"id":6,"name":"Georgie Ballister","address":"91 Namekagon Road","email":"gballister5@mozilla.com"},
{"id":7,"name":"Gay Bill","address":"825 Reindahl Trail","email":"gbill6@chron.com"},
{"id":8,"name":"Leonid Berryann","address":"693 Roxbury Road","email":"lberryann7@cbc.ca"},
{"id":9,"name":"Robby Scotson","address":"74600 Loeprich Way","email":"rscotson8@skype.com"},
{"id":10,"name":"Valerie Tappor","address":"5 Welch Junction","email":"vtappor9@mac.com"},
{"id":11,"name":"Lyle Calverley","address":"6 Fieldstone Plaza","email":"lcalverleya@chron.com"},
{"id":12,"name":"Daniele Bradfield","address":"82 Michigan Plaza","email":"dbradfieldb@drupal.org"},
{"id":13,"name":"Bria Bodycote","address":"3612 Darwin Park","email":"bbodycotec@walmart.com"},
{"id":14,"name":"Dimitri Dowson","address":"90 8th Hill","email":"ddowsond@ustream.tv"},
{"id":15,"name":"Janine Chavrin","address":"40807 Roxbury Point","email":"jchavrine@hostgator.com"},
{"id":16,"name":"Wake Caret","address":"180 Shopko Parkway","email":"wcaretf@soundcloud.com"},
{"id":17,"name":"Kaylyn Roubeix","address":"77 Dovetail Road","email":"kroubeixg@ning.com"},
{"id":18,"name":"Goraud Griggs","address":"32679 Doe Crossing Circle","email":"ggriggsh@stanford.edu"},
{"id":19,"name":"Crysta MacNockater","address":"7 Oakridge Way","email":"cmacnockateri@illinois.edu"},
{"id":20,"name":"Magnum Bernardo","address":"140 Parkside Alley","email":"mbernardoj@google.es"}]';
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
                <div class="rd-page-content">
                    <h1>Data table</h1>
                    <p>Display the data in the table.</p>
                    <hr>

                    <h2>Examples</h2>
                    <div class="rd-datatable-wrapper rd-block-level-margin-bottom">
                        <form method="post" action="form.php">
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
                                                echo indent(12).'<li><a href="#" onclick="return false;"><i class="fa-solid fa-key fa-fw"></i> Permissions</a></li>'."\n";
                                                echo indent(12).'<li><a href="#" onclick="return false;"><i class="fa-solid fa-xmark fa-fw"></i> Delete</a></li>'."\n";
                                                echo indent(11).'</ul>'."\n";
                                                echo indent(10).'</div>'."\n";
                                                echo indent(9).'</td>'."\n";
                                                echo indent(8).'</tr>'."\n";
                                                $i++;
                                                if ($i > 5) {
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
                            <button type="submit">Submit</button>
                        </form>
                    </div><!--.rd-datatable-wrapper-->
                    <pre>&lt;div class=&quot;rd-datatable-wrapper&quot;&gt;
    &lt;table class=&quot;rd-datatable&quot;&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th class=&quot;column-checkbox&quot;&gt;
                    &lt;input type=&quot;checkbox&quot; onclick=&quot;RundizTemplateAdmin.dataTableCheckboxToggler(this);&quot;&gt;
                &lt;/th&gt;
                &lt;th&gt;Name&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            &lt;tr&gt;
                &lt;td class=&quot;column-checkbox&quot;&gt;
                    &lt;input type=&quot;checkbox&quot; name=&quot;id[]&quot; value=&quot;1&quot;&gt;
                &lt;/td&gt;
                &lt;td&gt;Demo Demo&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
        &lt;tfoot&gt;
            &lt;tr&gt;
                &lt;th class=&quot;column-checkbox&quot;&gt;
                    &lt;input type=&quot;checkbox&quot; onclick=&quot;RundizTemplateAdmin.dataTableCheckboxToggler(this);&quot;&gt;
                &lt;/th&gt;
                &lt;th&gt;Name&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/tfoot&gt;
    &lt;/table&gt;
&lt;/div&gt;</pre>
                    <h3>H Border</h3>
                    <p>This data table only use horizontal border by add <code>h-border</code> to table class.</p>
                    <div class="rd-datatable-wrapper">
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
                                            echo indent(12).'<li><a href="#" onclick="return false;"><i class="fa-solid fa-key fa-fw"></i> Permissions</a></li>'."\n";
                                            echo indent(12).'<li><a href="#" onclick="return false;"><i class="fa-solid fa-xmark fa-fw"></i> Delete</a></li>'."\n";
                                            echo indent(11).'</ul>'."\n";
                                            echo indent(10).'</div>'."\n";
                                            echo indent(9).'</td>'."\n";
                                            echo indent(8).'</tr>'."\n";
                                            $i++;
                                            if ($i > 5) {
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
                    <h3>Sortable columns</h3>
                    <p>Example for sortable columns</p>
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
                                            echo indent(12).'<li><a href="#" onclick="return false;"><i class="fa-solid fa-key fa-fw"></i> Permissions</a></li>'."\n";
                                            echo indent(12).'<li><a href="#" onclick="return false;"><i class="fa-solid fa-xmark fa-fw"></i> Delete</a></li>'."\n";
                                            echo indent(11).'</ul>'."\n";
                                            echo indent(10).'</div>'."\n";
                                            echo indent(9).'</td>'."\n";
                                            echo indent(8).'</tr>'."\n";
                                            $i++;
                                            if ($i > 5) {
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
                    <div class="rd-datatable-wrapper">
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
                                            echo indent(12).'<li><a href="#" onclick="return false;"><i class="fa-solid fa-key fa-fw"></i> Permissions</a></li>'."\n";
                                            echo indent(12).'<li><a href="#" onclick="return false;"><i class="fa-solid fa-xmark fa-fw"></i> Delete</a></li>'."\n";
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
                    <h4>Cell colors</h4>
                    <p>Add showing class to table cell (<code>&lt;td&gt;</code>).</p>
                    <div class="rd-datatable-wrapper">
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
                    <?php unset($rowColors); ?> 
                    <h3>Data table with filters row</h3>
                    <p>Add <code>filter-row</code> class to <code>&lt;tr&gt;</code> of the row that contain filters input.</p>
                    <div class="rd-datatable-wrapper rd-block-level-margin-bottom">
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
                                            echo indent(12).'<li><a href="#" onclick="return false;"><i class="fa-solid fa-key fa-fw"></i> Permissions</a></li>'."\n";
                                            echo indent(12).'<li><a href="#" onclick="return false;"><i class="fa-solid fa-xmark fa-fw"></i> Delete</a></li>'."\n";
                                            echo indent(11).'</ul>'."\n";
                                            echo indent(10).'</div>'."\n";
                                            echo indent(9).'</td>'."\n";
                                            echo indent(8).'</tr>'."\n";
                                            $i++;
                                            if ($i > 5) {
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
                    <pre>&lt;div class=&quot;rd-datatable-wrapper&quot;&gt;
    &lt;table class=&quot;rd-datatable&quot;&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th class=&quot;column-checkbox&quot;&gt;&lt;input type=&quot;checkbox&quot; onclick=&quot;RundizTemplateAdmin.dataTableCheckboxToggler(this);&quot;&gt;&lt;/th&gt;
                &lt;th class=&quot;sorted&quot;&gt;&lt;a href=&quot;?sort=id&quot; onclick=&quot;return false;&quot;&gt;ID &lt;i class=&quot;order-desc sortable-icon&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/th&gt;
                &lt;th&gt;Name&lt;/th&gt;
                &lt;th&gt;Address&lt;/th&gt;
                &lt;th&gt;Email&lt;/th&gt;
                &lt;th&gt;Actions&lt;/th&gt;
            &lt;/tr&gt;
            &lt;tr class=&quot;filter-row&quot;&gt;
                &lt;td&gt;&lt;/td&gt;
                &lt;td&gt;&lt;/td&gt;
                &lt;td&gt;&lt;input class=&quot;input-small&quot; type=&quot;search&quot; placeholder=&quot;Search for name&quot;&gt;&lt;/td&gt;
                &lt;td&gt;
                    &lt;select class=&quot;input-small&quot;&gt;
                        &lt;option&gt;Filter address&lt;/option&gt;
                        &lt;option&gt;City 1&lt;/option&gt;
                        &lt;option&gt;City 2&lt;/option&gt;
                    &lt;/select&gt;
                &lt;/td&gt;
                &lt;td&gt;&lt;input class=&quot;input-small&quot; type=&quot;search&quot; placeholder=&quot;Search for email&quot;&gt;&lt;/td&gt;
                &lt;td&gt;&lt;button class=&quot;rd-button info small&quot;&gt;Filter&lt;/button&gt;&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            &lt;tr&gt;
                &lt;td class=&quot;column-checkbox&quot;&gt;&lt;input type=&quot;checkbox&quot; name=&quot;id[]&quot; value=&quot;20&quot;&gt;&lt;/td&gt;
                &lt;td&gt;20&lt;/td&gt;
                &lt;td&gt;Magnum Bernardo&lt;/td&gt;
                &lt;td&gt;140 Parkside Alley&lt;/td&gt;
                &lt;td&gt;mbernardoj@google.es&lt;/td&gt;
                &lt;td&gt;
                    &lt;div class=&quot;rd-button-group&quot;&gt;
                        &lt;button class=&quot;rd-button small&quot;&gt;&lt;i class=&quot;fa-solid fa-pencil&quot;&gt;&lt;/i&gt; Edit&lt;/button&gt;
                        &lt;button class=&quot;rd-button small dropdown-toggler&quot; data-placement=&quot;bottom right&quot;&gt;&lt;i class=&quot;fa-solid fa-caret-down&quot;&gt;&lt;/i&gt;&lt;/button&gt;
                        &lt;ul class=&quot;rd-dropdown&quot;&gt;
                            &lt;li&gt;&lt;a href=&quot;#&quot; onclick=&quot;return false;&quot;&gt;&lt;i class=&quot;fa-solid fa-key fa-fw&quot;&gt;&lt;/i&gt; Permissions&lt;/a&gt;&lt;/li&gt;
                            &lt;li&gt;&lt;a href=&quot;#&quot; onclick=&quot;return false;&quot;&gt;&lt;i class=&quot;fa-solid fa-xmark fa-fw&quot;&gt;&lt;/i&gt; Delete&lt;/a&gt;&lt;/li&gt;
                        &lt;/ul&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
        &lt;tfoot&gt;
            &lt;tr&gt;
                &lt;th class=&quot;column-checkbox&quot;&gt;&lt;input type=&quot;checkbox&quot; onclick=&quot;RundizTemplateAdmin.dataTableCheckboxToggler(this);&quot;&gt;&lt;/th&gt;
                &lt;th class=&quot;sorted&quot;&gt;&lt;a href=&quot;?sort=id&quot; onclick=&quot;return false;&quot;&gt;ID &lt;i class=&quot;order-desc sortable-icon&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/th&gt;
                &lt;th&gt;Name&lt;/th&gt;
                &lt;th&gt;Address&lt;/th&gt;
                &lt;th&gt;Email&lt;/th&gt;
                &lt;th&gt;Actions&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/tfoot&gt;
    &lt;/table&gt;
&lt;/div&gt;</pre>
                    <h3>Responsive</h3>
                    <p>This style of responsive is collapsible/expandable table for small screen size.</p>
                    <div class="rd-block-level-margin-bottom">
                        <table class="rd-datatable responsive">
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
                                            echo indent(10).'<span class="action"><a href="#" onclick="return false;">Edit</a></span>'."\n";
                                            echo indent(10).'<span class="action"><a href="#" onclick="return false;">Permissions</a></span>'."\n";
                                            echo indent(10).'<span class="action"><a href="#" onclick="return false;">Delete</a></span>'."\n";
                                            echo indent(9).'</div><!--.row-actions-->'."\n";
                                            echo indent(9).'<button class="toggle-row" type="button"><i class="faicon fa-solid fa-caret-down fa-fw" data-toggle-icon="fa-caret-down fa-caret-up"></i><span class="screen-reader-only">Show more details</span></button>'."\n";
                                            echo indent(8).'</td>'."\n";
                                            echo indent(8).'<td data-colname="Address">'.$row->address.'</td>'."\n";
                                            echo indent(8).'<td data-colname="Email">'.$row->email.'</td>'."\n";
                                            echo indent(7).'</tr>'."\n";
                                            $i++;
                                            if ($i > 5) {
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
                    <pre>&lt;table class=&quot;rd-datatable responsive&quot;&gt;
    &lt;thead&gt;
        &lt;tr&gt;
            &lt;td class=&quot;column-checkbox&quot;&gt;
                &lt;input type=&quot;checkbox&quot; onclick=&quot;RundizTemplateAdmin.dataTableCheckboxToggler(this);&quot;&gt;
            &lt;/td&gt;
            &lt;th class=&quot;column-primary&quot;&gt;&lt;a href=&quot;?sort=name&quot; onclick=&quot;return false;&quot;&gt;Name &lt;i class=&quot;order-asc sortable-icon&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/th&gt;
            &lt;th&gt;&lt;a href=&quot;?sort=address&quot; onclick=&quot;return false;&quot;&gt;Address &lt;i class=&quot;order-asc sortable-icon&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/th&gt;
            &lt;th&gt;&lt;a href=&quot;?sort=email&quot; onclick=&quot;return false;&quot;&gt;Email &lt;i class=&quot;order-asc sortable-icon&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;td class=&quot;column-checkbox&quot;&gt;
                &lt;input type=&quot;checkbox&quot; name=&quot;id[]&quot; value=&quot;1&quot;&gt;
            &lt;/td&gt;
            &lt;td class=&quot;column-primary&quot; data-colname=&quot;Name&quot;&gt;
                Demo Demo
                &lt;div class=&quot;row-actions&quot;&gt;
                    &lt;span class=&quot;action&quot;&gt;&lt;a href=&quot;#&quot; onclick=&quot;return false;&quot;&gt;Edit&lt;/a&gt;&lt;/span&gt;
                    &lt;span class=&quot;action&quot;&gt;&lt;a href=&quot;#&quot; onclick=&quot;return false;&quot;&gt;Permissions&lt;/a&gt;&lt;/span&gt;
                    &lt;span class=&quot;action&quot;&gt;&lt;a href=&quot;#&quot; onclick=&quot;return false;&quot;&gt;Delete&lt;/a&gt;&lt;/span&gt;
                &lt;/div&gt;
                &lt;!--.row-actions--&gt;
                &lt;button class=&quot;toggle-row&quot; type=&quot;button&quot;&gt;&lt;i class=&quot;faicon fa-solid fa-caret-down fa-fw&quot; data-toggle-icon=&quot;fa-caret-down fa-caret-up&quot;&gt;&lt;/i&gt;&lt;span class=&quot;screen-reader-only&quot;&gt;Show more details&lt;/span&gt;&lt;/button&gt;
            &lt;/td&gt;
            &lt;td data-colname=&quot;Address&quot;&gt;123 Address Street&lt;/td&gt;
            &lt;td data-colname=&quot;Email&quot;&gt;demo@localhost.localhost&lt;/td&gt;
        &lt;/tr&gt;
    &lt;/tbody&gt;
    &lt;tfoot&gt;
        &lt;tr&gt;
            &lt;td class=&quot;column-checkbox&quot;&gt;
                &lt;input type=&quot;checkbox&quot; onclick=&quot;RundizTemplateAdmin.dataTableCheckboxToggler(this);&quot;&gt;
            &lt;/td&gt;
            &lt;th class=&quot;column-primary&quot;&gt;&lt;a href=&quot;?sort=name&quot; onclick=&quot;return false;&quot;&gt;Name &lt;i class=&quot;order-asc sortable-icon&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/th&gt;
            &lt;th&gt;&lt;a href=&quot;?sort=address&quot; onclick=&quot;return false;&quot;&gt;Address &lt;i class=&quot;order-asc sortable-icon&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/th&gt;
            &lt;th&gt;&lt;a href=&quot;?sort=email&quot; onclick=&quot;return false;&quot;&gt;Email &lt;i class=&quot;order-asc sortable-icon&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/tfoot&gt;
&lt;/table&gt;</pre>
                    <p>And if there is no data.</p>
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