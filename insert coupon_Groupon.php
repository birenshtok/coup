<?php
    
    
    require_once "mysql_connector.php";
    
    function insert_coup($url,$category){
        $data_base = new mysql_connector();
        print("Link: $url");
        $handle = fopen($url, "r");
        while (!feof($handle)){
            $text = fgets($handle);
            $discount_pattern = '/"savings2_values">([\\d]*)/';
            $price_pattern = '/"noWrap">([\\d,]*)/'; //the pattern to find the price take in calc that the price may be more than 3 digits.
            $place_pattern = '/cityName">(.*?)</';
            $name_pattern = '/<meta name="keywords" content="(.*?)"/';
            $Last_date_to_buy_pattern = '/jcurrentTimeLeft" value="([\\d]*)"/';
            $Use_pattern = '/([\\d]+[.][\\d]+[.][\\d]+)/';
            if (!$price_flag) {
                if(preg_match($price_pattern, $text, $matches)) {
                    $price = $matches[1];
                    print ("<BR> Price: $price");
                    $price_flag = 1;
                }
            }
            if (!$discount_flag) {
                if(preg_match($discount_pattern, $text, $matches)) {
                    $discount = $matches[1];
                    print ("<BR> Discount: $discount");
                    $discount_flag = 1;
                }
            }
            if (!$place_flag) {
                if(preg_match($place_pattern, $text, $matches)) {
                    $place = $matches[1];
                    print ("<BR> Place: $place");
                    $place_flag = 1;
                }
            }
            if (!$name_flag) {
                if(preg_match($name_pattern, $text, $matches)) {
                    $name = $matches[1];
                    print ("<BR> Name: $name");
                    $name_flag = 1;
                }
            }
            if (!$use_flag) {
                if(preg_match($Use_pattern, $text, $matches)) {
                    $use = $matches[1];
                    print ("<BR> Use: $use");
                    $use_flag = 1;
                }
            }

            if (!$Last_date_to_buy_flag) {
                if(preg_match($Last_date_to_buy_pattern, $text, $matches)) {
                    $Last_date_to_buy = $matches[1];
                    
                    $today = time(); // today's date in sec.
                    
                    $last_chance = $today + ($Last_date_to_buy / 1000); // last time to buy the coupon in sec from 1970.
                    
                    $Last_date_to_buy = date("Y-m-d H:i:s",$last_chance);
                    
                    print ("<BR> Last time to buy: ");
                    print(date("Y-m-d H:i:s",$last_chance));
                    
                    $Last_date_to_buy_flag = 1;
                }
            }

            if ($price_flag && $discount_flag && $place_flag && $name_flag && $buy_time_flag && $use_flag) // for efficiency
                break;
        }
        print ("<BR> Category: $category");
        fclose($handle);

        /*$compare_link_pattern = '/(.*?)-[cC][\\d]/';
        if(preg_match($compare_link_pattern, $url, $matches)) {
                    $link = $matches[1];
                    print ("<BR> link: $link");
        }

        $result = (mysql_query("SELECT coup_res.Link FROM coup_res 
                                WHERE Link LIKE '$link%'"));
        print mysql_error();
        $row = $data_base->Get_Next_Row($result);  
        
        if(!$row) {
            $Type = "NULL";
            $Zone = "NULL";
            //insert the coupon to the DB.
            $data_base->insert_coupon_restaurants($name, $Type, $Zone, $place, $price, $Last_date_to_buy, $discount, $url);
        }*/
    }    
?>
