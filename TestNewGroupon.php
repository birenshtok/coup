<?php
    $handle = fopen("http://cities.groupon.co.il/jerusalem-iw/", "r");
    //Goes over all the cities in Groupon.
    while (!feof($handle)) {
        $text = fgets($handle);
        $pattern_Link = '/"window.location.href = \'(.*?)\'/';
        preg_match_all($pattern_Link, $text, $matches_Link);
        foreach ($matches_Link[1] as $Link) {
            $Link = "http://groupon-localhub.buckets.static.groupon-reservation.fr/buckets/il$Link";
            $end = '.json';
            $string = file_get_contents($Link.$end, "r");
            $json = json_decode($string,'True');
            print($Link);
            foreach ($json as $coupon) {
                if (in_array("34",$coupon['categories'])) {
                print_r ($coupon['merchant']);
                print ('</br>'); 
                }
            }
            break;
        }
    }
?>