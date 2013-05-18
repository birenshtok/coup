<?php
    include "mysql_connector.php";
    include "insert coupon.php";
    $handle = fopen("http://www.groupon.co.il/all-deals/tel-aviv-iw", "r");
    $i = 0;
    while (!feof($handle)) {
        $text = fgets($handle);
        $pattern_Link = '/"dealPermaLink":"(.*?)"/';
        preg_match_all($pattern_Link, $text, $matches_Link);
        $pattern_Category = '/itemsLocalDeals = \[{"category":"(.*?)"/';
        preg_match_all($pattern_Category, $text, $matches_Category);
        foreach ($matches_Link[1] as $Link) {
            $category = $matches_Category[1][$i];
            insert_coup ("http://www.groupon.co.il$Link",$category);
            print ("<BR>");
            ++$i;
            break; // Just foe testing a single coupon.
        }
    }
?>
