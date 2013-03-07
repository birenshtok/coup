<!--
(C) Copyright 2013, by Intelligent Manufacturing Systems, Inc.

07-03-13
Getting here from Vacation_pref.php
the page where the customer comfrim his request.

**shye
-->

<?php
    include "..\secure.php";
    include "..\\valid_field_funcs.php";
    include "..\mysql_connector.php";
    session_start();
    $Data_Base = new mysql_connector();
    $type = $_SESSION['type'];
    $user_id = $_SESSION['UserIdNum'];
    $category = secure($_REQUEST['pref']);
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
            Zone: <?php print  $Zone ?> Country: <?php print  $Country ?>  Town: <?php print  $Town ?> <br />
            Class: <?php print  $Class ?> Name_hotel: <?php print  $Name_hotel ?><br />
            Name_flight: <?php print  $Name_flight ?> Date_s: <?php print  $Date_s ?>  Date_e: <?php print  $Date_e ?> <br />
            Price: <?php print  $Price ?> Discount: <?php print  $Discount ?><br />
            <button type='submit'>OK</button> 
            </form>
            <form method='post' action="Vacation_pref.php">
            <button type='submit'>EDIT</button> 
            </form>
    </body>
</html>