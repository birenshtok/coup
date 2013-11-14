<!--
(C) Copyright 2013, by Intelligent Manufacturing Systems, Inc.
mysql class

13/02/13
add: public function insert_pref_cons line 62
     to insret the requset of the customer to the  consumer table (dosn't work)
/////////////////////////////////////////////////////////////////////////////
//////////////////// יש צורך להחליף את הסיסמה בשורה 42!!!!!//////////////
////////////////////$this->password = ".........";!!!!!!!!!!!!!/////////////
///////////////////////////////////////////////////////////////////////////

**shye

14/02/13

fix insret the requset of the customer to the  consumer table, this method now print the sql error if there was an error.

**shye1

17/02/13

make the constractor connect to the DB, insert_res and insert_vec were added.
some more functions for the compare were added.

**shye1
-->

<?php
    class mysql_connector{
        private $db_name;
        private $table_name;
        private $server;
        private $user_name;
        private $password;
        private $user_id;
        private $pref_r_id;
        private $pref_c_id;
        private $pref_v_id;
        
        function mysql_connector () {
            $this->db_name = test;
            $this->server = localhost;
            $this->user_name = root;
            $this->password = "55749";
            $this->user_id = 0;
            $link = $this->link();
            if (!$link) {
                die("Could not connect: " . mysql_error());
            }
            $db_selected = $this->db_select($link);
            if (!$db_selected) {
                die ("Can't use internet_database : " . mysql_error());
            }

            $this->user_id = $this->Get_Last_id('customers') + 1; //insert the next id into the id field
            $this->pref_id = $this->Get_Last_id('pref') + 1;
            $this->pref_c_id = $this->Get_Last_id('pref_c') + 1;
            $this->pref_v_id = $this->Get_Last_id('pref_v') + 1;
        }
        public function Set_table_name($name){
            $this->table_name = name;
        }
        public function get_db_name () {
            return $this->db_name;
        }
        public function get_server_name () {
            return $this->server;
        }
        public function get_table_name () {
            return $this->table_name;
        }
        public function get_user_name () {
            return $this->user_name;
        }
        public function get_password () {
            return $this->password;
        }
        public function get_user_id () {
            return $this->user_id;
        }



        //Link to mysql
        private function link() {
            return (mysql_connect ($this->server, $this->user_name, $this->password));
        }
        private function db_select($link) {
            return (mysql_select_db ("test", $link));
        }




        //insert to table
        public function insert_customer($mail, $password){
            (mysql_query("INSERT INTO customers(ID,Email,Password) VALUES($this->user_id,'$mail','$password')"));
            return $this->user_id;
        }
        public function insert_id_link($id,$links){
            (mysql_query("INSERT INTO id_link(ID,Link) VALUES('$id','$links')"));
            print mysql_error();
        }

        public function insert_pref_cons($user_id, $category, $name, $company, $date, $price, $discount){
            $result = (mysql_query("INSERT INTO pref_c(Customer_ID,Category,Name,Company,Date,Price,Discount,ID) 
                                    VALUES($user_id,'$category','$name','$company','$date','$price','$discount',$this->pref_c_id)"));
            print mysql_error();
            return $result;
        }


        public function insert_pref($user_id, $name, $Town, $MinPrice, $MaxPrice, $DateS, $DateE, $Discount, $Public, $category) {
            if($Town == "")
              $Town = 0;
            if($MinPrice == "")
              $MinPrice = 0;
            if($MaxPrice == "")
              $MaxPrice = 0;
            $Public == 1 ? $Public = 1 : $Public = 0 ;
              
         
            if($DateS=='00-00-00')
                $Date_Start = 0;
            else{
              $result1 = mysql_query("select ID from date where '$DateS' = Date");
		      $row = $this->Get_Next_Row($result1);
              $Date_Start = $row['ID'] ;
            }

            if($DateE=='00-00-00')
                $Date_End = 0;
            else{
		      $result2 = mysql_query("SELECT * from date WHERE '$DateE' = Date");
		      $row = $this->Get_Next_Row($result2);
              $Date_End = $row['ID'];
            }
              if($category == "")
                $category = 0;

            $today = time(); // today's date in sec.
            $today = date("Y-m-d",$today);
            $result2 = mysql_query("SELECT * from date WHERE '$today' = Date");
		    $row = $this->Get_Next_Row($result2);
            $today = $row['ID'];

            $result = (mysql_query("INSERT INTO pref(Customer_ID,Name,Town,Price_min,Price_max,Date_start,Date_end,Discount,ID,Category,Public,Date_of_request) 
                                    VALUES('$user_id', '$name', '$Town', '$MinPrice', '$MaxPrice','$Date_Start','$Date_End',$Discount,$this->pref_id,'$category','$Public','$today')"));
            print mysql_error();
            return $result;
        }



        public function insert_pref_vac($user_id, $Zone, $Country, $Town, $Class, $Name_hotel, $Name_flight, $Date_s, $Date_e, $price, $Discount, $category) {
            $result = (mysql_query("INSERT INTO pref_v(Customer_ID,Zone, Country, Town, Class, Name_hotel, Name_flight, Date_s, Date_e, price, Discount,ID) 
                                    VALUES($user_id, '$Zone', '$Country', '$Town', '$Class', '$Name_hotel', '$Name_flight', '$Date_s', '$Date_e', '$price', '$Discount',$this->pref_v_id)"));
            print mysql_error();
            return $result;
        }

        public function insert_mail_link($Link, $Customer_ID,$ID) {
            (mysql_query("INSERT INTO mail_link(Customer_ID, Link, ID) VALUES('$Customer_ID','$Link','$ID')"));
            
            print mysql_error();
        }

        
        /* insert coupons methodes.*/
        public function insert_coup_consumer($Category, $Name, $Company, $Date, $Price, $Discount, $Link) {
            $result = (mysql_query("INSERT INTO coup_consumer(Category, Name, Company, Date, Price, Discount, Link)
                                    VALUES('$Category','$Name','$Company', '$Date', '$Price', '$Discount', '$Link')"));
            print mysql_error();
            return $result;
        }

        
        public function insert_coupon_restaurants($Name, $Type, $Zone, $Town, $price, $Last_date_to_buy, $Discount, $Link) {
            $result = (mysql_query("INSERT INTO coup_res(Name,Type,Zone,Town,Price,Last_date_to_buy,Discount,Link,Deleted) 
                                    VALUES('$Name', '$Type', '$Zone', '$Town', '$price', '$Last_date_to_buy', '$Discount', '$Link',0)"));
            print mysql_error();
            return $result;
        }

        public function Get_pref_c(){
            $result = (mysql_query("SELECT * FROM pref_c ORDER BY ID"));
            print mysql_error();
            return $result;
        }

        public function Get_pref_vac(){
            $result = (mysql_query("SELECT * FROM pref_v ORDER BY ID"));
            print mysql_error();
            return $result;
        }

        public function Get_pref_res(){
            $result = (mysql_query("SELECT * FROM pref_r ORDER BY ID"));
            print mysql_error();
            return $result;
        }

        public function Get_pref_res_by_id($id){
            $result = (mysql_query("SELECT * FROM pref_r where ID like '$id'"));
            print mysql_error();
            return $result;
        }

        public function Get_coup_res($links){
            $result = (mysql_query("SELECT * FROM coup_res where Link like '$links'"));
            print mysql_error();
            return $result;
        }

        public function Get_links(){
            $result = (mysql_query("SELECT * FROM id_link ORDER BY ID"));
            print mysql_error();
            return $result;
        }

        public function Get_mail_link($Link, $ID){
            $result = (mysql_query("SELECT * FROM mail_link WHERE Link LIKE '$Link' && Customer_ID LIKE '$ID'"));
            print mysql_error();
            return $result;
        }

        public function Delete_Old_Coup_Res(){
            (mysql_query("Update coup_res Set Deleted = 1 Where Last_date_to_buy < now()"));
            print mysql_error();
        }

        /*check_requset_res*/
        public function check_requset_res($Name, $Type, $Zone, $Town, $price, $Discount){
            $result = (mysql_query("SELECT * FROM active_coup_res 
                                    WHERE Name $Name && Town $Town &&
                                                  price $price && Discount $Discount"));
            print mysql_error();
            return $result;
        }

        /*check_requset_vac*/
        public function check_requset_vac($Zone, $Country, $Town, $Rate, $Name_h, $Name_f, $Date_s, $Date_e, $Discount, $price){
             $result = (mysql_query("SELECT * FROM coup_vac 
                                    WHERE Zone $Zone && Country $Country && Town $Town &&
                                                  Rate $Rate && Name_h $Name_h && Name_f $Name_f "));
            print mysql_error();
            return $result;
        }
 
        /*check_requset_con*/
        public function check_requset_con($category, $name, $company, $date, $price, $discount){
            $result = (mysql_query("SELECT * FROM coup_consumer 
                                    WHERE category $category && name $name && company $company &&
                                                  date $date && price $price && discount $discount"));
            print mysql_error();
            return $result;
        }

        public function Get_mail($id){
            $result = (mysql_query("SELECT Email FROM customers WHERE ID = $id"));
            print mysql_error();
            return $result;
        }

        public function validate_user($mail, $password) {
            return (mysql_query("SELECT ID FROM customers WHERE Email = '$mail' && Password = '$password'"));
        } 

        public function is_not_user($mail) {
            $result = (mysql_query("SELECT ID FROM customers WHERE Email = '$mail'"));
            $row = mysql_fetch_assoc($result);
            if (!$row) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        private function Get_Last_id($table){
            $result = (mysql_query("select ID from $table ORDER BY ID DESC LIMIT 1"));
            $Last_ID = mysql_fetch_assoc ($result);
            return ($Last_ID[ID]);
        }

        public function Get_Next_Row($result) {
            return mysql_fetch_assoc ($result);
        }

        /* delete temp id_link table*/
        public function delete_id_link() {
            (mysql_query("DELETE FROM id_link"));
            print mysql_error();
        }
    }
?>

