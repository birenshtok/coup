<?php
    require "mysql_connector.php";
    require "secure.php";
    session_start();    
    //validate the user
            
    $Data_Base = new mysql_connector();
    $user_name = secure($_REQUEST['user_name']);
    $password = secure($_REQUEST['password']);
    $result = $Data_Base->validate_user($user_name, $password);
    $check = $Data_Base->Get_Next_Row($result);
    if (!$check) {
        //header("Location: welcom.php")
        print("not a user");
    } else {
        $_SESSION['UserIdNum']=$check[ID];
        header("Location: menu.php" /*Preferences\preferences.php*/);
    }
?>