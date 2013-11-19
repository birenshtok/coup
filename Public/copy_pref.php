<?php
    include "..\secure.php";
    include "..\\valid_field_funcs.php";
    include "..\mysql_connector.php";
    session_start();
    $Data_Base = new mysql_connector();
    $ID=secure($_REQUEST['num']);
    print $ID;
     $_SESSION['Name']=secure($_REQUEST['Name']);
    $user_id = $_SESSION['UserIdNum'];
    $pref = $Data_Base->Get_pref_by_id($ID);
    $row = $Data_Base->Get_Next_Row($pref);
    $name = $row[Name];
    $Town = $row[Town];
    $MinPrice = $row[Price_min];
    $MaxPrice = $row[Price_max];
    $DateS = $row[Date_start];
    $DateE = $row[Date_end];
    $Discount = $row[Discount];
    $Public = 0;
    $category = $row[Category];
    $Data_Base->insert_Copy_pref($user_id, $name, $Town, $MinPrice, $MaxPrice, $DateS, $DateE, $Discount, $Public, $category);
    //header("Location: ..\\menu.php");
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
    </body>
</html>
