<?php
    ob_start();
    require "ValidateMail.php";
    require "mysql_connector.php";
    require "secure.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>validate_change</title>
    </head>
    <body>
        <?php
    //insert the new user into the database.
    $Data_Base = new mysql_connector();
    $user_email = secure($_REQUEST['user_email']);
    $password = secure($_REQUEST['password']);
    $password_repeat = secure($_REQUEST['password_repeat']);
    $user_id = $_SESSION['UserIdNum'];
    if ($user_email == NULL || $password == NULL) {
        print "no!!!!!";
    } elseif (!is_valid_email($user_email)) {
        print "not a valid mail";
    } elseif ($password != $password_repeat) {
        print "please make sure that the password equals the password_repeat.";
    } else {
            $User_ID = $Data_Base->change_user($user_email,$password,$user_id);
            header("Location: menu.php");
        }
    
        ?>
    </body>
</html>
