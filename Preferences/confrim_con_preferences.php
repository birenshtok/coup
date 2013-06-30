<!--
(C) Copyright 2013, by Intelligent Manufacturing Systems, Inc.

07-03-13
Getting here from consumer_pref.php
the page where the customer comfrim his request.

**shye

30-06-13
add SESSION for all the catcory's

**shye
-->
<?php
    include "..\secure.php";
    include "..\\valid_field_funcs.php";
    include "..\mysql_connector.php";
    session_start();
    $Data_Base = new mysql_connector();
    $_SESSION['pref']=secure($_REQUEST['pref']);
    $_SESSION['Product']=secure($_REQUEST['Product']);
    $_SESSION['Company']=secure($_REQUEST['Company']);
    $_SESSION['Price']=secure($_REQUEST['Price']);
    $_SESSION['Day']=secure($_REQUEST['Day']);
    $_SESSION['Monthe']=secure($_REQUEST['Monthe']);
    $_SESSION['Year']=secure($_REQUEST['Year']);
    $_SESSION['Discount']=secure($_REQUEST['Discount']);
    $type = $_SESSION['type'];
    $user_id = $_SESSION['UserIdNum'];
    $category = secure($_REQUEST['pref']);
                $name = secure($_REQUEST['Product']);
                $company = secure($_REQUEST['Company']);
                $Date_d = secure($_REQUEST['Day']);
                $Date_m = secure($_REQUEST['Monthe']);
                $Date_y = secure($_REQUEST['Year']);
                $Date = date_null ($Date_d,$Date_m,$Date_y);
                $Price = secure($_REQUEST['Price']);
                int_null ($Price);
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
            Category: <?php print  $category ?>    Name: <?php print  $name ?> Company: <?php print  $company ?><br />
            Date: <?php print  $Date ?>  Discount: <?php print  $Discount ?><br />
            <button type='submit'>OK</button> 
            </form>
            <form method='post' action="consumer_pref.php">
            <button type='submit'>EDIT</button> 
            </form>
    </body>
</html>
