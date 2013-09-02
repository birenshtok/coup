<?php
    /*כמובן שצריך להגדיר את המקור שבו יושבת המחלקה   */
    require "template.php";
    /* לאחר מכן נבנה את האובייקט */
    $site = new template(0);
    /* על מנת להמיר את הנתונים באובייקט למחרוזת ,serialize לאחר שיש אובייקט נקרא לפונקציה  */
    $s=serialize($site);
    /* נפתח קובץ מסויים לכתיבה  */ 
    $fp=fopen("Example.txt","w+");
    /* נכתוב לתוך הקובץ את המחרוזת שמחזיקה את הנתונים */
    fputs($fp,$s);
    /* ונסגור את הקובץ */
    fclose($fp);
    /*   Example2.php המשך ב*/
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
