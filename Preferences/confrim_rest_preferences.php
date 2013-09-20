<?php
    include "..\secure.php";
    include "..\\valid_field_funcs.php";
    include "..\mysql_connector.php";
    session_start();
    $Data_Base = new mysql_connector();
    $_SESSION['Name']=secure($_REQUEST['Name']);
    $_SESSION['Type']=secure($_REQUEST['Type']);
    $_SESSION['Zone']=secure($_REQUEST['Zone']);
    $_SESSION['Town']=secure($_REQUEST['Town']);
    $_SESSION['Price']=secure($_REQUEST['Price']);
    $_SESSION['Day']=secure($_REQUEST['Day']);
    $_SESSION['Monthe']=secure($_REQUEST['Monthe']);
    $_SESSION['Year']=secure($_REQUEST['Year']);
    $_SESSION['Discount']=secure($_REQUEST['Discount']);
    $type = $_SESSION['type'];
    $user_id = $_SESSION['UserIdNum'];
    $category = secure($_REQUEST['pref']);
                $name = secure($_REQUEST['Name']);
                $Type = secure($_REQUEST['Type']);
                $Zone = secure($_REQUEST['Zone']);
                $Town = secure($_REQUEST['Town']);
                $Price = secure($_REQUEST['Price']);
                int_null ($Price);
                $Date_d = secure($_REQUEST['Day']);
                $Date_m = secure($_REQUEST['Monthe']);
                $Date_y = secure($_REQUEST['Year']);
                $Date = date_null ($Date_d,$Date_m,$Date_y);
                $Discount = secure($_REQUEST['Discount']);
                int_null ($Discount);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
            <form method='post' action="insert_prf.php">
            Youre preferences:<br />
            Name: <?php print  $name ?> Type: <?php print  $Type ?>  Zone: <?php print  $Zone ?> <br />
            Town: <?php print  $Town ?> Price: <?php print  $Price ?><br />
            Date: <?php print  $Date ?> Discount: <?php print  $Discount ?><br />
            <button type='submit'>OK</button> 
            </form>
            <form method='post' action="Restaurant_pref.php">
            <button type='submit'>EDIT</button> 
            </form>
    </body>
</html>