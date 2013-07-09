<?php
    include "mysql_connector.php";
    include "insert_coupon_buy2.php";
    $handle = fopen("http://www.buy2.co.il/c/%D7%90%D7%95%D7%9B%D7%9C-%D7%9E%D7%A1%D7%A2%D7%93%D7%95%D7%AA-%D7%91%D7%AA%D7%99-%D7%A7%D7%A4%D7%94/%D7%9E%D7%A1%D7%A2%D7%93%D7%95%D7%AA", "r");
    
    //Goes over all the cities in groupon.
    while (!feof($handle)) {
        $text = fgets($handle);
        $pattern_Link = '/location.href=\'(.*?)\'/';
        preg_match_all($pattern_Link, $text, $matches_Link);     
        
        //separate each city into a different link.
        foreach ($matches_Link[1] as $Link) {
            $handle_Zone = fopen($Link, "r"); // Open the link.
            insert_coup_buy2 ($Link,"Restaurant");
                
            print ("<BR><BR>"); // a line between coupons
                
                        
            }
            /*break; // Just for testing a single coupon.*/
        }
            /*($handle_Zone);
        }
    }
    fclose($handle);*/
?>