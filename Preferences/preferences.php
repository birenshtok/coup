<?php
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Preferences</title>
    </head>
    <body>
           RESTAURANTS: <input type="radio" name="pref" value="res" onclick="document.location.href='Restaurant_pref.php'">  
           VACATIONS: <input type="radio" name="pref" value="vec" onclick="document.location.href='Vacation_pref.php'"> 
           SHOPPING: <input type="radio" name="pref" value="con" onclick="document.location.href='consumer_pref.php'">
    </body>
</html>