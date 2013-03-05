<!--
(C) Copyright 2013, by Intelligent Manufacturing Systems, Inc.

Getting here from Validate_User.php
the page where the customer decides what type of coupon he need(RESTAURANTS, VACATIONS or SHOPPING)

13-02-13
**shye

14/02/13
delete test printing of id.
change the method to post
make a link when the user choice a radio button.

**itai

17/02/13

added the links for the vacation and restaurant pages.

**itai

-->


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