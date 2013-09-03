<!--
(C) Copyright 2013, by Intelligent Manufacturing Systems, Inc.

This is the page that compares between the tables and send the mails,
in addition this page make sure that the user won't get the same link again,
and this page also update the mail_link table.

17/02/13 - creation date.

**itai

20/02/13 (the night between the 19 to the 20)

according to the new my_phpmailer class, there is no need to declear the mail settings each time, only the mail massege atributes.

**itai

28/02/13

1.empty $links_arr after $data_base->insert_id_link.
2.in line 212: while ($row['ID']) insted of while ($row = $data_base->Get_Next_Row($result)) because it skip an id each time.
!!!stil need to find out why you get more mail's with link's you didn't want !!!!

**shye

03/03/13

1.fixed the problome with the mail. In line 234 ($mail->AddAddress("$user_mail", "shye.itai");) the class (mail) add a new address and when in line 241 (mail->send())
    it will send an mail to all address. for now at line 233 the object $mail will be constracted agian.
2.
-->

<?php
    include "..\mysql_connector.php";
    include "..\\valid_field_funcs.php";
    include "..\PHPMailer_v5.1\my_phpmailer.php";

    session_start();
    $data_base = new mysql_connector();
  
  
    
    /* constract the mail object */
    $mail = new my_phpmailer;

    /*consumer check  */
    /*$pref_con = $data_base->Get_pref_c();
    $row = $data_base->Get_Next_Row($pref_con);
    $Links_arr = array();
    while ($row != NULL){
        if ($user_id){
            if  ($Links_arr){
                $Links_arr[] = " ";
                $links = implode("<br/>",$Links_arr);
                $data_base->insert_id_link($user_id,$links);
                $Links_arr = array();
            }
        }
        $user_id = $row['Customer_ID'];
        while ($user_id == $row['Customer_ID']) {

            $category = $row['Category'];
            char_comparable($category);
            $name = $row['Name'];
            char_comparable($name);
            $company = $row['Company'];
            char_comparable($company); 
            $date = $row['Date'];
            date_comparable($date);
            $price = $row['Price'];
            price_comparable($price);
            $discount = $row['Discount'];
            discount_comparable($discount);
            $result = $data_base->check_requset_con($category, $name, $company, $date, $price, $discount);
            $is_mach = $data_base->Get_Next_Row($result)['Link'];

            while ($is_mach){
                $result_mail = $data_base->Get_mail_link($is_mach,$user_id);
                $already_mailed = $data_base->Get_Next_Row($result_mail);
                if (!$already_mailed) {
                    $Links_arr[] = $is_mach;
                    $data_base->insert_mail_link($is_mach, $user_id);
                    $is_mach = $data_base->Get_Next_Row($result)['Link'];
                } else {
                    $is_mach = $data_base->Get_Next_Row($result)['Link'];
                }
            }
            $row = $data_base->Get_Next_Row($pref_con);
        }
    }
    if ($Links_arr) {
        $Links_arr[] = " ";
        $links = implode("<br/>",$Links_arr);
        $data_base->insert_id_link($user_id,$links);
    }



    /*vacation check  */
    /*$pref_vac = $data_base->Get_pref_vac();
    $row = $data_base->Get_Next_Row($pref_vac);
    $Links_arr = array();
    while ($row != NULL){
        if (!$user_id){
            if ($Links_arr) { 
                $links = implode("<br/>",$Links_arr);
                $data_base->insert_id_link($user_id,$links);
                $Links_arr = array();
            }
        }
        $user_id = $row['Customer_ID'];
        while ($user_id == $row['Customer_ID']) {
            
            $Zone = $row['Zone'];
            char_comparable($Zone);
            $Country = $row['Country'];
            char_comparable($Country);
            $Town = $row['Town'];
            char_comparable($Town); 
            $Rate = $row['Rate'];
            discount_comparable($Rate);
            $Name_h = $row['Name_hotel'];
            name_h_comparable($Name_h); 
            $Name_f = $row['Name_flight'];
            name_f_comparable($Name_f); 
            $Date_s = $row['Date_s'];
            date_comparable($Date_s);
            $Date_e = $row['Date_e'];
            date_e_comparable($Date_e);
            $price = $row['Price'];
            price_comparable($price);
            $Discount = $row['Discount'];
            discount_comparable($Discount);

            $result = $data_base->check_requset_vac($Zone, $Country, $Town, $Rate, $Name_h, $Name_f, $Date_s, $Date_e, $Discount, $price);
            $is_mach = $data_base->Get_Next_Row($result)['Link'];
            while ($is_mach){
                $result_mail = $data_base->Get_mail_link($is_mach,$user_id);
                $already_mailed = $data_base->Get_Next_Row($result_mail);
                if (!$already_mailed) {
                    $Links_arr[] = $is_mach;
                    $data_base->insert_mail_link($is_mach, $user_id);
                    $is_mach = $data_base->Get_Next_Row($result)['Link'];
                } else {
                    $is_mach = $data_base->Get_Next_Row($result)['Link'];
                }
            }
            $row = $data_base->Get_Next_Row($pref_vac);
        }
    }
    if ($Links_arr) {
        $Links_arr[] = " "; 
        $links = implode("<br/>",$Links_arr);
        $data_base->insert_id_link($user_id,$links);
        $Links_arr = array();
    }

    /*restaurant check  */
    $pref_res = $data_base->Get_pref_res();
    $row = $data_base->Get_Next_Row($pref_res);
    $Links_arr = array();
    while ($row != NULL){
        if (!$user_id){
            if ($Links_arr) { 
                $links = implode("<br/><br/>Link:<br/>",$Links_arr);
                $data_base->insert_id_link($user_id,$links);
                $Links_arr = array();
            }
        }
        $user_id = $row['Customer_ID']; // get the user id.
        $pref_id = $row['ID']; // get the pref id.
        while ($user_id == $row['Customer_ID']) { // get over all requests from one user.
            
            // make the variables ready for the compare.
            $Name = $row['Name'];
            char_comparable($Name);
            $Type = $row['Type'];
            char_comparable($Type);
            $Town = $row['Town'];
            char_comparable($Town); 
            $Zone = $row['Zone'];
            char_comparable($Zone);
            $price = $row['Price'];
            price_comparable($price);
            $Discount = $row['Discount'];
            discount_comparable($Discount);

            //compare.
            $result = $data_base->check_requset_res($Name, $Type, $Zone, $Town, $price, $Discount);
            
            //check if there were any matches.
            $is_mach = $data_base->Get_Next_Row($result)['Link'];
            
            while ($is_mach){
                
                //check if this coupon already mailed to the user. 
                $result_mail = $data_base->Get_mail_link($is_mach,$user_id);
                $already_mailed = $data_base->Get_Next_Row($result_mail);
                
                //if not.
                if (!$already_mailed) {
                    $Links_arr[] = $is_mach;
                    $data_base->insert_mail_link($is_mach, $user_id,$pref_id);
                }
                $is_mach = $data_base->Get_Next_Row($result)['Link'];        
            }
            $row = $data_base->Get_Next_Row($pref_res);
        }
    }
    if ($Links_arr) {
        $Links_arr[] = " "; 
        for ($i=0; $i<count($Links_arr)-1; $i++){
            $result = $data_base->Get_coup_res($Links_arr[$i]);
            $row = $data_base->Get_Next_Row($result);
            $result_mail_id = $data_base->Get_mail_link($Links_arr[$i], $user_id);
            $temp_row = $data_base->Get_Next_Row($result_mail_id);
            $result_pref = $data_base->Get_pref_res_by_id($temp_row['ID']);
            $pref_row = $data_base->Get_Next_Row($result_pref);
            if (!$pref_row['Name'])
                $links = $links.'<br/>'."place: ".$row['Name'].'<br/>'."town: ".$row['Town'].'<br/>'."Price: ".$row['Price'].'<br>'."Link: ".$Links_arr[$i].'<br>';
            else
                $links = $links.'<br/>'."place: ".$pref_row['Name'].'<br/>'."town: ".$row['Town'].'<br/>'."Price: ".$row['Price'].'<br>'."Link: ".$Links_arr[$i].'<br>';
        }
        $data_base->insert_id_link($user_id,$links);
        $Links_arr = array();
    }
    $Links_arr = array();
    $result = $data_base->Get_links();
    $row = $data_base->Get_Next_Row($result);
    while ($row['ID']) {
        print($row['ID']);
        $Links_arr = array();
        $user_id = $row['ID'];
        print($user_id);
        $res = $data_base->Get_mail($user_id);
        $user_mail = $data_base->Get_Next_Row($res)['Email'];
        while ($user_id == $row['ID']){
           $Links_arr[] = $row['Link'];
           $row = $data_base->Get_Next_Row($result);
        }
        // the mail massege settings.
        $mail = new my_phpmailer;
        $mail->AddAddress("$user_mail", "shye.itai");
        $mail->Subject = "Your Links";
        $mail->Body    = implode("<br/>",$Links_arr); // Add a line between the sections of links.
        $mail->IsHTML (true);
        /*$mail->AddAttachment("c:/temp/11-10-00.zip", "new_name.zip");*/  // optional name

        if(!$mail->Send()) {
            echo "There was an error sending the message";
            exit;
        }

        echo "Message was sent successfully";
    }
    $data_base->delete_id_link();
    $data_base->Delete_Old_Coup_Res();
?>
