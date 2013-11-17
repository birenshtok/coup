

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
        $data_base = new mysql_connector();
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

         $result = $data_base->check_requset($name, $Town, $MinPrice, $MaxPrice, $DateS, $DateE, $Discount, $Public, $category);
         
         $i = 0;   
            //check if there were any matches.
         $is_mach = $data_base->Get_Next_Row($result)['Link'];
         while ($is_mach)
         {
             print ok;
            $is_mach = $data_base->Get_Next_Row($result)['Link'];
            $i++;
         }
         print $i;
?>
    </body>
</html>
