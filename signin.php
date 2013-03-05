<!--
(C) Copyright 1990, 1991 by Intelligent Manufacturing Systems, Inc.

Getting here from index.php
the page for sign in. after the user finished, move hi, to the validat_user.php page.

14/02/13
change the method to post.

**Itai
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SignIn Page</title>
    </head>
    <body>
        <form method='post' action='Validate_User.php'>
            <label>name: </label>
            <input type='text' name='user_name' />
            <label>password: </label>
            <input type = 'password' name = 'password' />
            <button type='submit'>Get in!</button>
        </form>
    </body>
</html>

