<?php
    function insert_coup($url,$category){
        print($url);
        $handle = fopen("$url", "r");
        while (!feof($handle)){
            $text = fgets($handle);
            $discount_pattern = '/"savings2_values">([\\d]*)/';
            $price_pattern = '/"noWrap">([\\d,]*)/'; //the pattern to find the price take in calc that the price may be more than 3 digits.
            $place_pattern = '/placename" content="(.*?)"/';
            if (!$price_flag) {
                if(preg_match($price_pattern, $text, $matches)) {
                    $price = $matches[1];
                    print ("<BR> Place: $price");
                    $price_flag = 1;
                }
            }
            if (!$discount_flag) {
                if(preg_match($discount_pattern, $text, $matches)) {
                    $discount = $matches[1];
                    print ("<BR> Place: $discount");
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
        }
        print ("<BR> Category: $category");
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
