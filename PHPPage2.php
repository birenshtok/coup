<?php
    $handle = fopen("https://www.groupon.co.il", "r");
    //$text = file_get_contents("https://www.groupon.co.il");
    //$br_text = str_replace("\n", "<BR>", $text);
    //echo $br_text;
    while (!feof($handle)) {
        $text = fgets($handle);
        echo $text, "<BR>";

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
