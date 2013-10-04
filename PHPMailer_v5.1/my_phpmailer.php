<!--
(C) Copyright 2013, by Intelligent Manufacturing Systems, Inc.

This is the my_phpmailer class that extends the phpmailer class, thanks to this class there is no need to fill the gmail settings every-time.

20/02/13 (the night between the 19 to the 20) - creation date

**shye1
-->

<?php
    require 'class.phpmailer.php';

class my_phpmailer extends phpmailer {
    // Set default variables for all new objects
    var $From     = "Admin@coup4me.com";
    var $FromName = "Coup4Me";
    var $Host     = "Mail.coup4me.com";
    var $Mailer   = "smtp";                         // Alternative to IsSMTP()
    var $WordWrap = 75;
    var $Username   = "Admin@coup4me.com";
    var $Password   = "biren";
    var $SMTPAuth   = true; // ×”×ª×—×‘×¨×•×ª ×œ×©×¨×ª ×”×ž×™×™×œ×™× ×“×•×¨×©×ª ×”×–×“×”×•×ª
    var $SMTPSecure = "TLS"; // ×ž×ª×—×‘×¨×™× ×‘×”×ª×—×‘×¨×•×ª ×ž××•×‘×˜×—×ª
    var $Port  = 25; // ×¤×•×¨×˜ ×”×©×¨×ª ×©×œ ×’×•×’×œ
    var $CharSet = 'UTF-8';

    // Replace the default error_handler
    function error_handler($msg) {
        print("My Site Error");
        print("Description:");
        printf("%s", $msg);
        exit;
    }
}
?>
