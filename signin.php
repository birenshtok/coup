<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SignIn Page</title>
        <script type="text/javascript">
            function valid_param() {
                var un = document.getElementById("un").value;
                var ps = document.getElementById("ps").value;
                if (un && ps) {
                    location = "Validate_User.php?user_name=" + un +  "&" + "password=" + ps;
                } else if (!un) {
                    var newHTML = "<font color=#FF0000> <B> The User Name is empty! Please type again </B> </font>";
                    document.getElementById('try again').innerHTML = newHTML;
                    document.getElementById("un").focus();
                } else if (!ps) {
                    var newHTML = "<font color=#FF0000> <B> The Password is empty! Please type again </B> </font>";
                    document.getElementById('try again').innerHTML = newHTML;
                    document.getElementById("ps").focus();
                }
            }
        </script>
        <div id="try again"></div>
    </head>
    <body id="body">
            <label>name: </label>
            <input id="un" type='text' name='user_name' autofocus="true"/>
            <label>password: </label>
            <input id="ps" type ='password' name ='password'/>
            <input type="button" onclick="valid_param()" value="Get in!"/>
    </body>
</html>

