<?php require 'includes/functions.php'; ?>
<!DOCTYPE html>
<html>
    <head>
<?php
$title = 'Typography';
include 'includes/html-head.php'; 
?> 
    </head>
    <body ontouchstart="">
        <div style="margin: 0 auto; max-width: 1200px; overflow-x: hidden; padding-left: 0.313em; padding-right: 0.313em;">
            <h1>Typography & kitchen sink</h1>
            <hr>
<?php include 'includes/partials/typography.php'; ?> 

<?php include 'includes/partials/multimedia.php'; ?> 

<?php include 'includes/partials/form.php'; ?> 
            <hr>

            <footer>
                <p>
                    By <a href="http://rundiz.com">rundiz.com</a>
                    <!--
                    Do you like it? Does this helpful to you? If yes, please donate to help me buy some foods. :)
                    Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9HQE4GVV4KTZE
                    Thank you in advance.
                    -->
                    | <a href="credits.php">Credits.</a>
                </p>
            </footer>
        </div>


<?php include 'includes/js-end-body.php'; ?> 
    </body>
</html>