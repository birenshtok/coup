<?php
    function insert_coup($url,$category){
        print($url);
         $handle = fopen("$url", "r");
         //$write_handle = fopen("C:\Itai\\coupon-test.txt", "w");
        while (!feof($handle)){
         $text = fgets($handle);
         $pattern = '/"noWrap"(.*?)₪<\/span/';
         if(preg_match($pattern, $text, $matches)){
            $price = $matches[1];
            print ($price);
            break;
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
