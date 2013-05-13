<?php
    include "mysql_connector.php";
    $handle = fopen("http://www.groupon.co.il/all-deals/tel-aviv-iw", "r");
    $write_handle = fopen("C:\Itai\\coupon-test.txt", "w");
    $i = 0;
    while (!feof($handle)) {
        $text = fgets($handle);
        $pattern = '/"dealPermaLink":"(.*?)"/';
         // href='\/GroupDeal\/gdp.aspx?pi=4QEcvyyy&c=0'>/";

        //$info = '/ .*/';
        preg_match_all($pattern, $text, $matches);
        for ($i = 0; $i < sizeof($matches[0]); $i++) {
            print($matches[1][$i]);
            print ("<BR>");
        }
    }
    /*print_r($categories);
    print_r($informations);
    fclose($handle);
    $Data_Base = new mysql_connector();
    if ($categories[0] == "consumer") {
        $Data_Base->insert_coup_consumer($informations[1], $informations[2], $informations[3], $informations[4], $informations[5], $informations[5], $informations[7]);
    }

    $text = fgets($handle);
    fwrite($write_handle, $text);
    fwrite($write_handle, "\r\n");
    }*/
?>
