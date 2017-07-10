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
    <body ontouchstart="">
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
                    <div class="rd-datatable-wrapper">
                        <table class="rd-datatable">
                            <thead>
                                <tr>
                                    <th class="column-checkbox"><input type="checkbox" onclick="rdtaDataTableCheckboxToggle(jQuery(this));"></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="column-checkbox"><input type="checkbox" onclick="rdtaDataTableCheckboxToggle(jQuery(this));"></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
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
                                            echo indent(8).'<td>'.$row->id.'</td>'."\n";
                                            echo indent(8).'<td>'.$row->name.'</td>'."\n";
                                            echo indent(8).'<td>'.$row->address.'</td>'."\n";
                                            echo indent(8).'<td>'.$row->email.'</td>'."\n";
                                            echo indent(8).'<td>'."\n";
                                            echo indent(9).'<div class="rd-button-group">'."\n";
                                            echo indent(10).'<button class="rd-button small"><i class="fa fa-pencil"></i> Edit</button>'."\n";
                                            echo indent(10).'<button class="rd-button small dropdown-toggler"><i class="fa fa-caret-down"></i></button>'."\n";
                                            echo indent(10).'<ul class="rd-dropdown">'."\n";
                                            echo indent(11).'<li><a href="#" onclick="return false;"><i class="fa fa-key fa-fw"></i> Permissions</a></li>'."\n";
                                            echo indent(11).'<li><a href="#" onclick="return false;"><i class="fa fa-times fa-fw"></i> Delete</a></li>'."\n";
                                            echo indent(10).'</ul>'."\n";
                                            echo indent(9).'</div>'."\n";
                                            echo indent(8).'</td>'."\n";
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
                        </table>
                    </div><!--.rd-datatable-wrapper-->
                    <h3>H Border</h3>
                    <p>This data table only use horizontal border</p>
                    <div class="rd-datatable-wrapper">
                        <table class="rd-datatable h-border">
                            <thead>
                                <tr>
                                    <th class="column-checkbox"><input type="checkbox" onclick="rdtaDataTableCheckboxToggle(jQuery(this));"></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="column-checkbox"><input type="checkbox" onclick="rdtaDataTableCheckboxToggle(jQuery(this));"></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
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
                                            echo indent(8).'<td>'.$row->id.'</td>'."\n";
                                            echo indent(8).'<td>'.$row->name.'</td>'."\n";
                                            echo indent(8).'<td>'.$row->address.'</td>'."\n";
                                            echo indent(8).'<td>'.$row->email.'</td>'."\n";
                                            echo indent(8).'<td>'."\n";
                                            echo indent(9).'<div class="rd-button-group">'."\n";
                                            echo indent(10).'<button class="rd-button small"><i class="fa fa-pencil"></i> Edit</button>'."\n";
                                            echo indent(10).'<button class="rd-button small dropdown-toggler"><i class="fa fa-caret-down"></i></button>'."\n";
                                            echo indent(10).'<ul class="rd-dropdown">'."\n";
                                            echo indent(11).'<li><a href="#" onclick="return false;"><i class="fa fa-key fa-fw"></i> Permissions</a></li>'."\n";
                                            echo indent(11).'<li><a href="#" onclick="return false;"><i class="fa fa-times fa-fw"></i> Delete</a></li>'."\n";
                                            echo indent(10).'</ul>'."\n";
                                            echo indent(9).'</div>'."\n";
                                            echo indent(8).'</td>'."\n";
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
                        </table>
                    </div><!--.rd-datatable-wrapper-->
                    <h3>Data table with filters row</h3>
                    <div class="rd-datatable-wrapper">
                        <table class="rd-datatable">
                            <thead>
                                <tr>
                                    <th class="column-checkbox"><input type="checkbox" onclick="rdtaDataTableCheckboxToggle(jQuery(this));"></th>
                                    <th>ID</th>
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
                            <tfoot>
                                <tr>
                                    <th class="column-checkbox"><input type="checkbox" onclick="rdtaDataTableCheckboxToggle(jQuery(this));"></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
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
                                            echo indent(8).'<td>'.$row->id.'</td>'."\n";
                                            echo indent(8).'<td>'.$row->name.'</td>'."\n";
                                            echo indent(8).'<td>'.$row->address.'</td>'."\n";
                                            echo indent(8).'<td>'.$row->email.'</td>'."\n";
                                            echo indent(8).'<td>'."\n";
                                            echo indent(9).'<div class="rd-button-group">'."\n";
                                            echo indent(10).'<button class="rd-button small"><i class="fa fa-pencil"></i> Edit</button>'."\n";
                                            echo indent(10).'<button class="rd-button small dropdown-toggler"><i class="fa fa-caret-down"></i></button>'."\n";
                                            echo indent(10).'<ul class="rd-dropdown">'."\n";
                                            echo indent(11).'<li><a href="#" onclick="return false;"><i class="fa fa-key fa-fw"></i> Permissions</a></li>'."\n";
                                            echo indent(11).'<li><a href="#" onclick="return false;"><i class="fa fa-times fa-fw"></i> Delete</a></li>'."\n";
                                            echo indent(10).'</ul>'."\n";
                                            echo indent(9).'</div>'."\n";
                                            echo indent(8).'</td>'."\n";
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
                        </table>
                    </div><!--.rd-datatable-wrapper-->
                    <h3>Responsive</h3>
                    <p>This style of responsive is collapsible/expandable table for small screen size.</p>
                    <table class="rd-datatable responsive">
                        <thead>
                            <tr>
                                <td class="column-checkbox"><input type="checkbox" onclick="rdtaDataTableCheckboxToggle(jQuery(this));"></td>
                                <th class="column-primary">Name</th>
                                <th>Address</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td class="column-checkbox"><input type="checkbox" onclick="rdtaDataTableCheckboxToggle(jQuery(this));"></td>
                                <th class="column-primary">Name</th>
                                <th>Address</th>
                                <th>Email</th>
                            </tr>
                        </tfoot>
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
                                        echo indent(9).'<button class="toggle-row" type="button"><i class="fa fa-caret-down fa-fw" data-toggle-icon="fa-caret-down fa-caret-up"></i><span class="screen-reader-only">Show more details</span></button>'."\n";
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
                    </table>
                    <p>And if there is no data.</p>
                    <table class="rd-datatable responsive">
                        <thead>
                            <tr>
                                <td class="column-checkbox"><input type="checkbox" onclick="rdtaDataTableCheckboxToggle(jQuery(this));"></td>
                                <th class="column-primary">Name</th>
                                <th>Address</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td class="column-checkbox"><input type="checkbox" onclick="rdtaDataTableCheckboxToggle(jQuery(this));"></td>
                                <th class="column-primary">Name</th>
                                <th>Address</th>
                                <th>Email</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td colspan="4">No data.</td>
                            </tr>
                        </tbody>
                    </table>
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>