

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
         
         $row = $data_base->Get_Next_Row($result);
         $i = 0;   
            //check if there were any matches.
         $is_mach = $row[Link];
 
         while ($is_mach)
         {
             echo ("NAME: ".$row[Name]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 

             $temp = $data_base->Get_City($row[City]);
             $city = $data_base->Get_Next_Row($temp);
             echo ("CITY: ".$city[City]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 

             $temp = $data_base->Get_Category($row[Category]);
             $category = $data_base->Get_Next_Row($temp);
             echo ("CATEGORY: ".$category[Category]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 
             echo ("PRICE: "."₪".$row[Price]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 

             $temp = $data_base->Get_Date($row[Last_day_to_buy]);
             $date = $data_base->Get_Next_Row($temp);
             echo ("LAST DAY TO BUY: ".$date[Date]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 

             $temp = $data_base->Get_Date($row[Last_day_to_use]);
             $date = $data_base->Get_Next_Row($temp);
             echo ("LAST DAY TO USE: ".$date[Date]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp");
                 
             echo ("DISCOUNT: ".$row[Discount]."%"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 

            echo ("Link: ".$row[Link]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp");

            echo ("site: ".$row[site]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp");

            echo ('<br>');
            $row = $data_base->Get_Next_Row($result);
            $is_mach = $row['Link'];
            $i++;
         }
         echo ("num of coup: ".$i."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp");
         echo ('<br>');
?>
        <a href= ..\\menu.php><input type="button" value="Menu"/></a>
        <a href= insert_prf.php><input type="button" value="OK"/></a>
        <a href= pref.php><input type="button" value="EDIT"/></a>
    </body>
</html>
