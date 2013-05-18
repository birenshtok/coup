<?php
    include "mysql_connector.php";
    include "insert coupon.php";
    $handle = fopen("http://www.groupon.co.il/all-deals/tel-aviv-iw", "r");
    $i = 0;
    while (!feof($handle)) {
        $text = fgets($handle);
        $pattern = '/"dealPermaLink":"(.*?)"/';
        preg_match_all($pattern, $text, $matches);
        foreach ($matches[1] as $Link) {
            insert_coup ("http://www.groupon.co.il$Link","df");
            print ("<BR>");
            break; // Just foe testing a single coupon.
        }
    }
?>
