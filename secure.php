<!--
(C) Copyright 2013, by Intelligent Manufacturing Systems, Inc.

the secure function check

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
notify that the creation of the DB connection must be befor the use of this function!!!!!!
////////////////////!!!!!!!!!!!!!/////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

19/02/13 - creation date.

**itai
-->

<?php
    function secure ($arg) {
        return mysql_real_escape_string($arg);
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
