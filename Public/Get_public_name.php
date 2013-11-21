<?php
    include "..\secure.php";
    include "..\\valid_field_funcs.php";
    include "..\mysql_connector.php";
    session_start();
           
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
           $data_base = new mysql_connector();
           $user_name=secure($_REQUEST['name']);
            $public_res = $data_base-> Get_public_coup_bu_name($user_name);
            $row = $data_base->Get_Next_Row($public_res);
            while ($row){
                print ('<br>'); 
                echo ("USER: ".$row[Customer_name]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 

                echo ("NAME: ".$row[Name]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 

                $temp = $data_base->Get_City($row[Town]);
                $city = $data_base->Get_Next_Row($temp);
                echo ("CITY: ".$city[City]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 

                $temp = $data_base->Get_Category($row[Category]);
                $category = $data_base->Get_Next_Row($temp);
                echo ("CATEGORY: ".$category[Category]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 
                echo ("MINIMUM PRICE: "."₪".$row[Price_min]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 
                echo ("MAXIMUM PRICE: "."₪".$row[Price_max]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp");

                $temp = $data_base->Get_Date($row[Date_start]);
                $date = $data_base->Get_Next_Row($temp);
                echo ("START DATE: ".$date[Date]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 

                $temp = $data_base->Get_Date($row[Date_end]);
                $date = $data_base->Get_Next_Row($temp);
                echo ("END DATE: ".$date[Date]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp");
                 
                echo ("DISCOUNT: ".$row[Discount]."%"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 


                echo ("NUM: ".$row[ID]."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"); 

                echo ('<br>'); 
                $row = $data_base->Get_Next_Row($public_res);
                
            }
        ?>
        <a href= ..\\menu.php><input type="button" value="Menu"/></a>
        <a href= Get_public.php><input type="button" value="public"/></a>
        <form method="post" action="copy_pref.php">  
         Num: <input type="text" name="num">
        <button type='submit'>COPY</button>
        </form>   

    </body>
</html>
