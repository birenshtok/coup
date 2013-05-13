<?php
    include "mysql_connector.php";
    include "insert coupon.php";
    $handle = fopen("http://www.groupon.co.il/all-deals/tel-aviv-iw", "r");
    $i = 0;
    while (!feof($handle)) {
        $text = fgets($handle);
        $pattern = '/"dealPermaLink":"(.*?)"/';
        preg_match_all($pattern, $text, $matches);
        for ($i = 0; $i < sizeof($matches[0]); $i+=sizeof($matches[0])) {
            $name = $matches[1][$i];
            insert_coup ("http://www.groupon.co.il$name","df");
            print ("<BR>");
        }
    }
?>
