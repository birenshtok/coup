<?php
    include "..\secure.php";
    include "..\valid_field_funcs.php";
    include "..\mysql_connector.php";
    session_start();
    $type = $_SESSION['type'];
    $user_id = $_SESSION['UserIdNum'];
    $Date_d = secure($_REQUEST['Day']);
    $Date_m = secure($_REQUEST['Monthe']);
    $Date_y = secure($_REQUEST['Year']);
    $Date = date_null ($Date_d,$Date_m,$Date_y);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
            <form method='post' action='..\insert_prf.php'>
            youre Preferences:<br />
            category: <?php print  $category ?>    name: <?php print  $name ?> company: <?php print  $company ?><br />
            Date: <?php print  $Date ?>  Discount: <?php print  $Discount ?><br />
            <input type="button" name="button1" value="button">  
            </form>
    </body>
</html>
