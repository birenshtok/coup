<?php
    function insert_coup($url,$category){
        print($url);
        $handle = fopen("$url", "r");
        //$write_handle = fopen("C:\Itai\\coupon-test.txt", "w");
        while (!feof($handle)){
            $text = fgets($handle);
            $discount_pattern = '/"savings2_values">([\\d]*)/';
            $price_pattern = '/"noWrap">([\\d,]*)/'; //the pattern to find the price take in calc that the price may be more than 3 digits.
            if((preg_match($price_pattern, $text, $matches)) && (!$price_flag)){
                $price = $matches[1];
                print ("<BR> Price: ");
                print ($price);
                $price_flag = 1;
            }
            if((preg_match($discount_pattern, $text, $matches)) && (!$discount_flag)){
                $discount_pattern = $matches[1];
                print ("<BR> discount: ");
                print ($discount_pattern);
                $discount_flag = 1;
            }
        }
    }
     
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
