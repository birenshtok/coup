<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php 
            $_SESSION['type']='Res';
        ?>
        <form method="post" action="confrim_preferences.php">  
           Name : <input type="text" name="Name" value=<?php $_COOKIE['Name'] == 'myValue' ? print ("") : print $_COOKIE['Name']  ?> >
       <!--Type: <input type="text" name="Type">
           Zone: <input type="text" name="Zone">--> 
           City: <select name="Town">
                <option value=""></option>
                <option value="1">תל אביב</option>
                <option value="2">רמת גן</option>
                <option value="3">פתח תקווה</option>
                <option value="4">בקעת אונו</option>
                <option value="5">הרצליה</option>
                <option value="6">כפר סבא</option>
                <option value="7">נתניה</option>
                <option value="8">זכרון יעקב</option>
                <option value="9">ירושלים</option>
                <option value="10">מודיעין</option>
                <option value="11">באר שבע</option>
                <option value="12">אשדוד</option>
                <option value="13">לכיש</option>
                <option value="14">אילת</option>
                <option value="15">ראשון לציון</option>
                <option value="16">חולון</option>
                <option value="17">רחובות</option>
                <option value="18">רמלה</option>
                <option value="19">יבנה</option>
                <option value="20">חיפה</option>
                <option value="21">עפולה</option>
                <option value="22">כרמיאל</option>
                <option value="23">רמת הגולן</option>
                <option value="24">ים המלח</option>
                <option value="25">כל הארץ	</option>
                </select>
           Minimum Price: <input type="text" name="MinPrice" value=<?php $_COOKIE['MinPrice'] == 'myValue' ? print ("") : print $_COOKIE['MinPrice']  ?> >
           Maximum Price: <input type="text" name="MaxPrice" value=<?php $_COOKIE['MaxPrice'] == 'myValue' ? print ("") : print $_COOKIE['MaxPrice']  ?>>  
           Date Start: <select name="Day_S">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28<option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            </select>
            <select name="Monthe_S">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                </select>
            <select name="Year_S">
                <option value=""></option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                </select>
            Date End: <select name="Day_E">
            <option value=""></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28<option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            </select>
            <select name="Monthe_E">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                </select>
            <select name="Year_E">
                <option value=""></option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                </select>
           Discount: <input type="text" name="Discount" value=<?php $_COOKIE['Discount'] == 'myValue' ? print ("") : print $_COOKIE['Discount']  ?>>
           Category: <select name="Category">
                        <option value=""></option>
                        <option value="1">restaurant</option>
                        <option value="2">Vacation</option>
                        <option value="3">consumer</option>
                    </select>
            Public: <input type="checkbox" name="Public" value="1" checked></\br>  
            <a href= ..\\menu.php><input type="button" value="Menu"/></a>
           <button type='submit'>go!</button>
        </form>   
    </body>
</html>

