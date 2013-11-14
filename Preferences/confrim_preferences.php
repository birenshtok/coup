<?php
    include "..\secure.php";
    include "..\\valid_field_funcs.php";
    include "..\mysql_connector.php";
    session_start();
    $Data_Base = new mysql_connector();
    $_SESSION['Name']=secure($_REQUEST['Name']);
   /* $_SESSION['Type']=secure($_REQUEST['Type']);
    $_SESSION['Zone']=secure($_REQUEST['Zone']);*/
    $_SESSION['Town']=secure($_REQUEST['Town']);
    $_SESSION['MinPrice']=secure($_REQUEST['MinPrice']);
    $_SESSION['MaxPrice']=secure($_REQUEST['MaxPrice']);
    $_SESSION['Day_S']=secure($_REQUEST['Day_S']);
    $_SESSION['Monthe_S']=secure($_REQUEST['Monthe_S']);
    $_SESSION['Year_S']=secure($_REQUEST['Year_S']);
    $_SESSION['Day_E']=secure($_REQUEST['Day_E']);
    $_SESSION['Monthe_E']=secure($_REQUEST['Monthe_E']);
    $_SESSION['Year_E']=secure($_REQUEST['Year_E']);
    $_SESSION['Discount']=secure($_REQUEST['Discount']);
    $_SESSION['Category']=secure($_REQUEST['Category']);
    $_SESSION['Public']=secure($_REQUEST['Public']);
    $type = $_SESSION['type'];
    $user_id = $_SESSION['UserIdNum'];
    $category = secure($_REQUEST['pref']);
                $name = secure($_REQUEST['Name']);
               /* $Type = secure($_REQUEST['Type']);
                $Zone = secure($_REQUEST['Zone']);*/
                $Town = getcity(secure($_REQUEST['Town']));
                $category = getcategory(secure($_REQUEST['Category']));
                $MinPrice = secure($_REQUEST['MinPrice']);
                $MaxPrice = secure($_REQUEST['MaxPrice']);
                int_null ($Price);
                $Date_Sd = secure($_REQUEST['Day_S']);
                $Date_Sm = secure($_REQUEST['Monthe_S']);
                $Date_Sy = secure($_REQUEST['Year_S']);
                $DateS = date_null ($Date_Sd,$Date_Sm,$Date_Sy);
                $Date_Ed = secure($_REQUEST['Day_E']);
                $Date_Em = secure($_REQUEST['Monthe_E']);
                $Date_Ey = secure($_REQUEST['Year_E']);
                $DateE = date_null ($Date_Ed,$Date_Em,$Date_Ey);
                $Discount = secure($_REQUEST['Discount']);
                $Public = secure($_REQUEST['Public']);
                int_null ($Discount);
                setcookie('Name', $name);
                //setcookie('Town', 'myValue');
                //setcookie('Category', 'myValue');
                setcookie('MinPrice', $MinPrice);
                setcookie('MaxPrice', $MaxPrice);
                setcookie('Day_S', 'myValue');
                setcookie('Monthe_S', 'myValue');
                setcookie('Year_S', 'myValue');
                setcookie('Day_E', 'myValue');
                setcookie('Monthe_E', 'myValue');
                setcookie('Year_E', 'myValue');
                setcookie('Discount', $Discount);
                setcookie('Public', 'myValue');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
            <form method='post' action="insert_prf.php">
            <h2>Youre preferences:</h2>
            <h4>Name: <?php print  $name ?></h4>  
            <h4>Town: <?php print  $Town ?></h4>  
            <h4>Category: <?php print  $category ?></h4>
            <h4>Minimum Price: <?php print  $MinPrice ?></h4> 
            <h4>Maximum Price: <?php print  $MaxPrice ?></h4>
            <h4>Start Date: <?php print  $DateS ?></h4>
            <h4>End Date: <?php print  $DateE ?></h4>
            <h4>Discount: <?php print  $Discount ?></h4> 
            <h4>Public: <?php $Public == 1 ? print 'yes' : print 'no'; ?></h4>
            <button type='submit'>OK</button> 
            </form>
            <form method='post' action="Restaurant_pref.php">
            <button type='submit'>EDIT</button> 
            </form>
    </body>
</html>

<?php
    function getcity($city) {
        switch($city) {
        case 1:
            return 'תל אביב';
            break;
        case 2:
            return 'רמת גן';
            break;
        case 3:
            return 'פתח תקווה';
            break;
        case 4:
            return 'בקעת אונו';
            break;
        case 5:
            return 'הרצליה';
            break;
        case 6:
            return 'כפר סבא';
            break;
        case 7:
            return 'נתניה';
            break;
        case 8:
            return 'זכרון יעקב';
            break;
        case 9:
            return 'ירושלים';
            break;
        case 10:
            return 'מודיעין';
            break;
        case 11:
            return 'באר שבע';
            break;
        case 12:
            return 'אשדוד';
            break;
        case 13:
            return 'לכיש';
            break;
        case 14:
            return 'אילת';
            break;
        case 15:
            return 'ראשון לציון';
            break;
        case 16:
            return 'חולון';
            break;
        case 17:
            return 'רחובות';
            break;
        case 18:
            return 'רמלה';
            break;
        case 19:
            return 'יבנה';
            break;
        case 20:
            return 'חיפה';
            break;
        case 21:
            return 'עפולה';
            break;
        case 22:
            return 'כרמיאל';
            break;
        case 23:
            return 'רמת הגולן';
            break;
        case 24:
            return 'ים המלח';
            break;
        case 25:
            return 'כל הארץ';
            break;
        }
    }
    function getcategory($category){
         switch($category) {
        case 1:
            return 'restaurant';
            break;
        case 2:
            return 'Vacation';
            break;
        case 3:
            return 'consumer';
            break;
         }
    }
?>