<?php
    /*כמובן שצריך להגדיר את המקור שבו יושבת המחלקה   */
    require_once "template.php";
    /*  מקבל את המחרוזת שמתארת את האובייקט ששמרנו $s*/
    $s=implode("",@file("Example.txt"));
    /* יוצר את האובייקט מחדש מהמחרוזת */
    $site=unserialize($s);

    $name = $site->get_pattern_Link();

    print_r ($name);

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
