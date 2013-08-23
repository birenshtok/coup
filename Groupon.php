<?php
    include "mysql_connector.php";
    include "insert coupon_Groupon.php";
    $handle = fopen("http://www.groupon.co.il/all-deals/tel-aviv-iw", "r");
    
    //Goes over all the cities in Groupon.
    while (!feof($handle)) {
        $text = fgets($handle);
        $pattern_Link = '/onclick="window.location.href = \'(.*?)\'/';
        preg_match_all($pattern_Link, $text, $matches_Link);        
        
        //separate each city into a different link.
        foreach ($matches_Link[1] as $Link) {
            $Link = preg_replace('/deals/','all-deals',$Link); // make it a valid link by changing the right word.
            $handle_Zone = fopen($Link, "r"); // Open the link.
            $i = 0;
            $j = 0;

            //Do the regular open_url.php mechanism.
            while (!feof($handle_Zone)) {
                $text = fgets($handle_Zone);
                $pattern_Link = '/"dealPermaLink":"(.*?)"/';
                preg_match_all($pattern_Link, $text, $matches_Link);
                $pattern_Category = '/"category":"(.*?)"/';
                preg_match_all($pattern_Category, $text, $matches_Category);
                foreach ($matches_Link[1] as $Link) {
                    $category = $matches_Category[1][$i];
                    ++$i;

                    /* do only if this is a restaurant coupon */
                    if ($category == "RESTAURANT1") {
                        $j++;
                        print("$j. ");
                        insert_coup ("http://www.groupon.co.il$Link",$category);
                
                        print ("<BR><BR>"); // a line between coupons
                
                        /*break; // Just for testing a single coupon.*/
                    }
                }
            }
            fclose($handle_Zone);
        }
    }
    fclose($handle);
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
