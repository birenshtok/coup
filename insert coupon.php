<?php
    function insert_coup($url,$category){
        print("Link: $url");
        $handle = fopen($url, "r");
        while (!feof($handle)){
            $text = fgets($handle);
            $discount_pattern = '/"savings2_values">([\\d]*)/';
            $price_pattern = '/"noWrap">([\\d,]*)/'; //the pattern to find the price take in calc that the price may be more than 3 digits.
            $place_pattern = '/placename" content="(.*?)"/';
            $name_pattern = '/<meta name="keywords" content="(.*?)"/';
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

            if ($price_flag && $discount_flag && $place_flag && $name_flag) // for efficiency
                break;
        }
        print ("<BR> Category: $category");
        fclose($handle);
    }    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> Finding the attributes</title>
    </head>
    <body>
        
    </body>
</html>
