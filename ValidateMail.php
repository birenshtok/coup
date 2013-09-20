<!--
(C) Copyright 2013, by Intelligent Manufacturing Systems, Inc.

the validation of the mail function (just check the chars for now..)

19/02/13 - creation date.

**shye1
-->

<?php 

function is_valid_email($mail)
{
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) return false;
    $host = explode("@",$mail); $mxarr = array();
    if (!getmxrr($host[1],$mxarr)) return false;
    return true;
}
 ?>