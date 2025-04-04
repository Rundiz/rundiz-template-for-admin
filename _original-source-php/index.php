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
<?php include 'includes/html-head.php'; ?> 
        <link rel="stylesheet" href="<?php echo assetUrl('assets/css/rdta/columns/columns-flex.css'); ?>">
        <style>
            .example-card {
                border: 1px solid #ddd;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                margin-bottom: 1.250rem;
                padding: 0.625em;
            }

            .example-card.summary {
                background-color: #eee;
                color: #222;
            }

            .example-card.no-margin-bottom {
                margin-bottom: 0;
            }
        </style>
    </head>
    <body>
<?php include 'includes/partials/page-header.php'; ?> 
        <div class="rd-page-wrapper">
<?php include 'includes/partials/page-sidebar.php'; ?> 
            <main>
                <?php
                echo renderBreadcrumb(['./' => 'Home']);
                ?> 
                <div class="rd-page-content">
                    <div class="rd-columns-flex-container fix-columns-container-edge">
                        <div class="column">
                            <div class="example-card">
                                <h1>Rundiz template for admin</h1>
                                <p>is the HTML template and CSS, JS set for admin page layout. It also come with essential components that mostly administrator application have to use.</p>
                                <p><abbr title="Rundiz template for admin">RDTA</abbr> support modern browsers such as Firefox, Google Chrome, Microsoft Edge, Opera, Vivaldi.</p>
                                <p>Almost all element was reset the design to display the same way cross browsers and yes it does <a href="https://www.outlinenone.com/" target="outlinenone_com">support accessibility</a>.</p>
                                <hr>
                                <p>Check for the last update or fork me on <a href="https://github.com/Rundiz/rundiz-template-for-admin" target="rdta_on_github">GitHub</a></p>
                            </div>
                        </div><!--.column-->

                        <div class="column-break"></div>

                        <div class="column col-lg-3 col-sm-6">
                            <div class="example-card summary">
                                <h3>Users</h3>
                                <p>Total <small class="rd-notification-badge tiny">14</small></p>
                            </div>
                        </div><!--.column-->
                        <div class="column col-lg-3 col-sm-6">
                            <div class="example-card summary">
                                <h3>Comments</h3>
                                <p>New <small class="rd-notification-badge tiny badge-info">2</small></p>
                            </div>
                        </div><!--.column-->
                        <div class="column col-lg-3 col-sm-6">
                            <div class="example-card summary">
                                <h3>Posts</h3>
                                <p>Pending <small class="rd-notification-badge tiny badge-warning">3</small></p>
                            </div>
                        </div><!--.column-->
                        <div class="column col-lg-3 col-sm-6">
                            <div class="example-card summary">
                                <h3>Contact</h3>
                                <p>New <small class="rd-notification-badge tiny badge-info">1</small></p>
                            </div>
                        </div><!--.column-->

                        <div class="column-break"></div>

                        <div class="column">
                            <div class="example-card no-margin-bottom">
                                <h3>Customers</h3>
                                <table class="rd-datatable responsive">
                                    <thead>
                                        <tr>
                                            <th class="column-primary">Name</th>
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
                                                    echo indent(10).'<tr>'."\n";
                                                    echo indent(11).'<td class="column-primary" data-colname="Name">'."\n";
                                                    echo indent(12).$row->name."\n";
                                                    echo indent(12).'<button class="toggle-row" type="button"><i class="faicon fa-solid fa-caret-down fa-fw" data-toggle-icon="fa-caret-down fa-caret-up"></i><span class="screen-reader-only">Show more details</span></button>'."\n";
                                                    echo indent(11).'</td>'."\n";
                                                    echo indent(11).'<td data-colname="Address">'.$row->address.'</td>'."\n";
                                                    echo indent(11).'<td data-colname="Email">'.$row->email.'</td>'."\n";
                                                    echo indent(10).'</tr>'."\n";
                                                    $i++;
                                                    if ($i > 10) {
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
                                            <th class="column-primary">Name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div><!--.column-->
                    </div><!--.rd-columns-flex-container-->
                </div><!--.rd-page-content-->
            </main>
<?php include 'includes/partials/page-footer.php'; ?> 
        </div><!--.rd-page-wrapper-->
        

<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>