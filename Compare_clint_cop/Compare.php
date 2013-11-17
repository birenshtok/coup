<?php
session_start();
    include "..\mysql_connector.php";
    include "..\\valid_field_funcs.php";
    include "..\PHPMailer_v5.1\my_phpmailer.php";
   
    $data_base = new mysql_connector();
  
  
    
    /* constract the mail object */
    $mail = new my_phpmailer;

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
        $result = $data_base->Get_coup_res($Links_arr[0]);
            $row = $data_base->Get_Next_Row($result);
            $result_mail_id = $data_base->Get_mail_link($Links_arr[0], $user_id);
            $temp_row = $data_base->Get_Next_Row($result_mail_id);
            $result_pref = $data_base->Get_pref_res_by_id($temp_row['ID']);
            $pref_row = $data_base->Get_Next_Row($result_pref);
            /*if (!$pref_row['Name'])
                $links = $links.'<br/>'."place: ".$row['Name'].'<br/>'."town: ".$row['Town'].'<br/>'."Price: ".$row['Price'].'<br>'."Link: ".$Links_arr[0].'<br>';
            else*/
                $links = "the link that maches this requset".'<br/>';
                if ($pref_row['Name']!=NULL) $links = $links."place: ".$pref_row['Name'].'<br/>';
                if ($pref_row['Zone']!=NULL) $links = $links."Zone: ".$pref_row['Zone'].'<br/>';
                if ($pref_row['Town']!=NULL) $links = $links."town: ".$pref_row['Town'].'<br/>';
                if ($pref_row['Price']!=NULL) $links = $links."Price: ".$pref_row['Price'].'<br>';
                if ($pref_row['Date']!=NULL) $links = $links."Date: ".$pref_row['Date'].'<br>';
                if ($pref_row['Discount']!=NULL) $links = $links."Discount: ".$pref_row['Discount'].'<br>';
                $links = $links."Link: ".$Links_arr[0].'<br>';
        for ($i=0; $i<count($Links_arr)-1; $i++){
            $links =$links.'<br>'."Link: ".$Links_arr[0].'<br>';
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
        $mail->AddAddress("$user_mail", "$user_mail");
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
