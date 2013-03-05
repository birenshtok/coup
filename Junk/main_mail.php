<?php
    session_start();
    $links = $_SESSION['links'];
    print_r ($links);
 
require_once 'class.phpmailer.php'; // מיקום קובץ המחלקה
 
$mail = new PHPMailer (); // יצירת אובייקט המחלקה (קריאה למחלקה)
 
// הגדרות כלליות 
$mail->SMTPAuth   = true; // התחברות לשרת המיילים דורשת הזדהות
 $mail->SMTPSecure = "ssl"; // מתחברים בהתחברות מאובטחת
 $mail->Host = "smtp.gmail.com"; // כתובת השרת של גוגל
 $mail->Port  = 465; // פורט השרת של גוגל
 $mail->Mailer= "smtp"; // מגדירים למחלקה לשלוח אימייל דרך השרת החיצוני ולא באמצעות פונקציות mail
 $mail->SMTPDebug = true; // בפעם הראשונה נריץ את השליחה עם הודעות על מה הולך שם
 // אחרי שנראה שהכל עובד - יש למחוק את השורה למעלה
 

// שם משתמש וסיסמה לחשבון
 // CHANGE THIS !!!!!!!!!!!!!!!!!!!!!!!!!!
 $mail->Username   = "shye.itai.biren@gmail.com";
 $mail->Password   = "shye.itai";
 

// מוען
 $mail->FromName = "shye"; // שם - השם שלך
 $mail->AddReplyTo ("shye.itai.biren@gmail.com", "Mega admin"); // אם המקבל ילחץ "השב" התשובה שלו תשלח ל
 
// תוכן ההודעה
 $mail->Subject = "Mail subject"; // כותרת המכתב
 $mail->Body = "$links[0]  $links[1]"; // תוכן המכתב
 $mail->IsHTML (true); // שולחים היפרטקסט ולא טקסט רגיל
 $mail->CharSet = 'UTF-8'; // קידוד המכתב
 
// מען
 $mail->AddAddress ("shye.itai.biren@gmail.com", "shye.itai"); //כתובת אימייל אליה יישלח האימייל ושם הנמען
 $mail->Send (); //
$_SESSION['mail'] = $mail;