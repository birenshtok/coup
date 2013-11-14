<?php
    include "..\secure.php";
    include "..\\valid_field_funcs.php";
    include "..\mysql_connector.php";
    session_start();
    $Data_Base = new mysql_connector();

     $_SESSION['Zone'] = secure($_REQUEST['Zone']);
     $_SESSION['Country'] = secure($_REQUEST['Country']);
     $_SESSION['Town'] = secure($_REQUEST['Town']);
     $_SESSION['Class'] = secure($_REQUEST['Class']);
     $_SESSION['Name_hotel'] = secure($_REQUEST['Name_hotel']);
     $_SESSION['Name_flight'] = secure($_REQUEST['Name_flight']);
     $_SESSION['Day'] = secure($_REQUEST['Day']);
     $_SESSION['Monthe'] = secure($_REQUEST['Monthe']);
     $_SESSION['Year'] = secure($_REQUEST['Year']);
     $_SESSION['LDay'] = secure($_REQUEST['LDay']);
     $_SESSION['LMonthe'] = secure($_REQUEST['LMonthe']);
     $_SESSION['LYear'] = secure($_REQUEST['LYear']);
     $_SESSION['Price'] = secure($_REQUEST['Price']);
     $_SESSION['Discount'] = secure($_REQUEST['Discount']);

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