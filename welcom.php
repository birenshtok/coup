<?php
    session_start();
    include "mysql_connector.php";
    include "secure.php";
    $data_base = new mysql_connector();
    print $data_base->Get_Last_id("coup");
    print "&nbsp";
    print "coupons now in the site";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Welcom</title>
    </head>
    <body>
        <p>
            to sign in please press here
            <a href= signin.php>Sign in</a>
        </p>
        <p>
            for registration please press here
            <a href= Register.php>Register</a>
        </p>
    </body>
</html>
