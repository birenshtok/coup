<!--
(C) Copyright 2013, by Intelligent Manufacturing Systems, Inc.

Getting here from consumer_pref.php or  Vacation_pref.php or Restaurant_pref.php
this page insert the user's preferences to the DB.

14/02/13

**itai

17/02/13

according to the mysql constractor change no need to connect to the DB from here.
change the way we deal with dates, we get the day,monthe and year. then we use the date_null func to create the right date.
in addition we use the new func int_null to deal with null int fields.

**itai

19/02/13

add the secure function check

**itai

30-06-13
add SESSION for all the catcory's
**shye
-->


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            include "..\secure.php";
            include "..\\valid_field_funcs.php";
            include "..\mysql_connector.php";
            session_start();
            $type = $_SESSION['type'];
            $user_id = $_SESSION['UserIdNum'];
            $Data_Base = new mysql_connector();
            $name = secure($_SESSION['Name']);
            $Town = secure($_SESSION['Town']);

            $MinPrice = secure($_SESSION['MinPrice']);
            $MaxPrice = secure($_SESSION['MaxPrice']);
            int_null ($MinPrice);
            int_null ($MaxPrice);

            $Date_d = secure($_SESSION['Day_S']);
            $Date_m = secure($_SESSION['Monthe_S']);
            $Date_y = secure($_SESSION['Year_S']);
            $DateS = date_null ($Date_d,$Date_m,$Date_y);

            $Date_d = secure($_SESSION['Day_E']);
            $Date_m = secure($_SESSION['Monthe_E']);
            $Date_y = secure($_SESSION['Year_E']);
            $DateE = date_null ($Date_d,$Date_m,$Date_y);

            $Discount = secure($_SESSION['Discount']);
            $Public = secure($_SESSION['Public']);
            $category = secure($_SESSION['Category']);
            int_null ($Discount);
            int_null ($Public);
            $Data_Base->insert_pref($user_id, $name, $Town, $MinPrice, $MaxPrice, $DateS, $DateE, $Discount, $Public, $category);
            header("Location: ..\\menu.php");
        ?>        

    </body>
</html>
