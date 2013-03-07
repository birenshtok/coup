<!--
(C) Copyright 1990, 1991 by Intelligent Manufacturing Systems, Inc.

Getting here from index.php
the page for registration. after the user finished, move him, to the validat_reg.php page.

14/02/13
change the method to post.

**Itai
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Registeration Page</title>
    </head>
    <body>
        <form method='post' action='Validet_reg.php'>
            <label>name: </label>
            <input type='text' name='user_name' />
            <label>password: </label>
            <input type = 'password' name = 'password' />
            <label>password_repeat: </label>
            <input type = 'password' name = 'password_repeat' />
            <button type='submit'>Register!</button>
        </form>
    </body>
</html>
