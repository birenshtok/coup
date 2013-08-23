<!--
(C) Copyright 2013, by Intelligent Manufacturing Systems, Inc.

Getting here from signin.php
the page Validate that the user exist and open the preferences.php page.

14/02/13
change the read from the $GET array to the $REQUEST.

**Itai

17/02/13

according to the mysql constractor change no need to connect to the DB from here.

**itai

19/02/13

add the secure function check

**itai
-->

<?php
    include "mysql_connector.php";
    include "secure.php";
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Validate_user</title>
    </head>
    <body>
        <?php
            //validate the user
            
            $Data_Base = new mysql_connector();
            $user_name = secure($_REQUEST['user_name']);
            $password = secure($_REQUEST['password']);
            $result = $Data_Base->validate_user($user_name,$password);
            $check = $Data_Base->Get_Next_Row($result);
            if (!$check) {
                    //header("Location: welcom.php")
                    print($user_name);
            } else {
                $_SESSION['UserIdNum']=$check[ID];
                header("Location: Preferences\preferences.php");
            }
        ?>
    </body>
</html>