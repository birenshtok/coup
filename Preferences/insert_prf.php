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
-->
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
                $Data_Base->insert_pref_cons($user_id, $category, $name, $company, $Date, $Price, $Discount);
            } elseif ($type == 'Res') { 
                $name = secure($_REQUEST['Name']);
                $Type = secure($_REQUEST['Type']);
                $Zone = secure($_REQUEST['Zone']);
                $Town = secure($_REQUEST['Town']);
                $Price = secure($_REQUEST['price']);
                int_null ($Price);
                $Date_d = secure($_REQUEST['Day']);
                $Date_m = secure($_REQUEST['Monthe']);
                $Date_y = secure($_REQUEST['Year']);
                $Date = date_null ($Date_d,$Date_m,$Date_y);
                $Discount = secure($_REQUEST['discount']);
                int_null ($Discount);
                $Data_Base->insert_pref_res($user_id, $name, $Type, $Zone, $Town, $Price, $Date, $Discount);
            } else {
                $Zone = secure($_REQUEST['Zone']);
                $Country = secure($_REQUEST['Country']);
                $Town = secure($_REQUEST['Town']);
                $Class = secure($_REQUEST['Class']);
                int_null ($Class);
                $Name_hotel = secure($_REQUEST['Name_hotel']);
                $Name_flight = secure($_REQUEST['Name_flight']);
                $Date_sd = secure($_REQUEST['Day']);
                $Date_sm = secure($_REQUEST['Monthe']);
                $Date_sy = secure($_REQUEST['Year']);
                $Date_s = date_null ($Date_sd,$Date_sm,$Date_sy);
                $Date_ld = secure($_REQUEST['LDay']);
                $Date_lm = secure($_REQUEST['LMonthe']);
                $Date_ly = secure($_REQUEST['LYear']);
                $Date_e = date_null ($Date_ld, $Date_lm, $Date_ly);
                $Price = secure($_REQUEST['price']);
                int_null ($Price);
                $Discount = secure($_REQUEST['discount']);
                int_null ($Discount);
                $Data_Base->insert_pref_vac($user_id, $Zone, $Country, $Town, $Class, $Name_hotel, $Name_flight, $Date_s, $Date_e, $Price, $Discount);
            }
        ?>        
    </body>
</html>
