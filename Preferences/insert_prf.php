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
            if ($type == 'Con') {
                $category = secure($_SESSION['pref']);
                $name = secure($_SESSION['Product']);
                $company = secure($_SESSION['Company']);
                $Date_d = secure($_SESSION['Day']);
                $Date_m = secure($_SESSION['Monthe']);
                $Date_y = secure($_SESSION['Year']);
                $Date = date_null ($Date_d,$Date_m,$Date_y);
                $Price = secure($_SESSION['Price']);
                int_null ($Price);
                $Discount = secure($_SESSION['Discount']);
                int_null ($Discount);
                $Data_Base->insert_pref_cons($user_id, $category, $name, $company, $Date, $Price, $Discount);
            } elseif ($type == 'Res') { 
                $name = secure($_SESSION['Name']);
                $Type = secure($_SESSION['Type']);
                $Zone = secure($_SESSION['Zone']);
                $Town = secure($_SESSION['Town']);
                $Price = secure($_SESSION['Price']);
                int_null ($Price);
                $Date_d = secure($_SESSION['Day']);
                $Date_m = secure($_SESSION['Monthe']);
                $Date_y = secure($_SESSION['Year']);
                $Date = date_null ($Date_d,$Date_m,$Date_y);
                $Discount = secure($_SESSION['Discount']);
                int_null ($Discount);
                $Data_Base->insert_pref_res($user_id, $name, $Type, $Zone, $Town, $Price, $Date, $Discount);
            } else {
                $Zone = secure($_SESSION['Zone']);
                $Country = secure($_SESSION['Country']);
                $Town = secure($_SESSION['Town']);
                $Class = secure($_SESSION['Class']);
                int_null ($Class);
                $Name_hotel = secure($_SESSION['Name_hotel']);
                $Name_flight = secure($_SESSION['Name_flight']);
                $Date_sd = secure($_SESSION['Day']);
                $Date_sm = secure($_SESSION['Monthe']);
                $Date_sy = secure($_SESSION['Year']);
                $Date_s = date_null ($Date_sd,$Date_sm,$Date_sy);
                $Date_ld = secure($_SESSION['LDay']);
                $Date_lm = secure($_SESSION['LMonthe']);
                $Date_ly = secure($_SESSION['LYear']);
                $Date_e = date_null ($Date_ld, $Date_lm, $Date_ly);
                $Price = secure($_SESSION['price']);
                int_null ($Price);
                $Discount = secure($_SESSION['discount']);
                int_null ($Discount);
                $Data_Base->insert_pref_vac($user_id, $Zone, $Country, $Town, $Class, $Name_hotel, $Name_flight, $Date_s, $Date_e, $Price, $Discount);
            }
        ?>        
    </body>
</html>
