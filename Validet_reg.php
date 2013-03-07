<!--
(C) Copyright 2013, by Intelligent Manufacturing Systems, Inc.

Getting here from Register.php
the page Validate that the user doesn't exist still need to open the right page.

14/02/13
change the read from the $GET array to the $REQUEST.
fix the Validate.

**Itai

17/02/13

according to the mysql constractor change no need to connect to the DB from here.

**itai

19/02/13

add the secure function check and the validation of the mail (just check the chars for now..)

**itai
-->

<?php
    include "ValidateMail.php";
    include "mysql_connector.php";
    include "secure.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>validate_reg</title>
    </head>
    <body>
        <?php
    //insert the new user into the database.
    $Data_Base = new mysql_connector();
    $user_name = secure($_REQUEST['user_name']);
    $password = secure($_REQUEST['password']);
    $password_repeat = secure($_REQUEST['password_repeat']);
    if ($user_name == NULL || $password == NULL) {
        print "no!!!!!";
    } elseif (!is_valid_email($user_name)) {
        print "not a valid mail";
    } elseif ($password != $password_repeat) {
        print "please make sure that the password equals the password_repeat.";
    } else {
        if ($Data_Base->is_not_user($user_name)) {
            $Data_Base->insert_customer($user_name,$password);
            header("Location: Preferences\preferences.php");
        } else {
            print "already user";
            header("Location: welcom.php");
        }
    }
        ?>
    </body>
</html>
