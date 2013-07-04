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

**itai

17/02/13

make the constractor connect to the DB, insert_res and insert_vec were added.
some more functions for the compare were added.

**itai
-->

<?php
    class mysql_connector{
        private $db_name;
        private $table_name;
        private $server;
        private $user_name;
        private $password;
        private $id;
        
        function mysql_connector () {
            $this->db_name = test;
            $this->server = localhost;
            $this->user_name = root;
            $this->password = "55749";
            $this->id = 0;
            $link = $this->link();
            if (!$link) {
                die("Could not connect: " . mysql_error());
            }
            $db_selected = $this->db_select($link);
            if (!$db_selected) {
                die ("Can't use internet_database : " . mysql_error());
            }
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
            return $this->id;
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
            $this->id = $this->Get_Last_id() + 1; //insert the next id into the id field
            (mysql_query("INSERT INTO customers(ID,Email,Password) VALUES($this->id,'$mail','$password')"));
            return $this->id;
        }
        public function insert_id_link($id,$links){
            (mysql_query("INSERT INTO id_link(ID,Link) VALUES('$id','$links')"));
            print mysql_error();
        }

        public function insert_pref_cons($user_id, $category, $name, $company, $date, $price, $discount){
            $result = (mysql_query("INSERT INTO pref_c(ID,Category,Name,Company,Date,Price,Discount) 
                                    VALUES($user_id,'$category','$name','$company','$date','$price','$discount')"));
            print mysql_error();
            return $result;
        }
        public function insert_pref_res($user_id, $name, $Type, $Zone, $Town, $price, $Date, $Discount) {
            $result = (mysql_query("INSERT INTO pref_r(ID,Name,Type,Zone,Town,Price,Date,Discount) 
                                    VALUES($user_id, '$name', '$Type', '$Zone', '$Town', '$price', '$Date', '$Discount')"));
            print mysql_error();
            return $result;
        }
        public function insert_pref_vac($user_id, $Zone, $Country, $Town, $Class, $Name_hotel, $Name_flight, $Date_s, $Date_e, $price, $Discount) {
            $result = (mysql_query("INSERT INTO pref_v(ID,Zone, Country, Town, Class, Name_hotel, Name_flight, Date_s, Date_e, price, Discount) 
                                    VALUES($user_id, '$Zone', '$Country', '$Town', '$Class', '$Name_hotel', '$Name_flight', '$Date_s', '$Date_e', '$price', '$Discount')"));
            print mysql_error();
            return $result;
        }

        public function insert_mail_link($Link, $ID) {
            (mysql_query("INSERT INTO mail_link(ID, Link) VALUES('$ID','$Link')"));
            
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

        public function Get_links(){
            $result = (mysql_query("SELECT * FROM id_link ORDER BY ID"));
            print mysql_error();
            return $result;
        }

        public function Get_mail_link($Link, $ID){
            $result = (mysql_query("SELECT * FROM mail_link WHERE Link LIKE '$Link' && ID LIKE '$ID'"));
            print mysql_error();
            return $result;
        }

        /*check_requset_res*/
        public function check_requset_res($Name, $Type, $Zone, $Town, $price, $Discount){
            $result = (mysql_query("SELECT active_coup_res.Link FROM active_coup_res 
                                    WHERE Name $Name && Town $Town &&
                                                  price $price && Discount $Discount"));
            print mysql_error();
            return $result;
        }

        /*check_requset_vac*/
        public function check_requset_vac($Zone, $Country, $Town, $Rate, $Name_h, $Name_f, $Date_s, $Date_e, $Discount, $price){
             $result = (mysql_query("SELECT coup_vac.Link FROM coup_vac 
                                    WHERE Zone $Zone && Country $Country && Town $Town &&
                                                  Rate $Rate && Name_h $Name_h && Name_f $Name_f "));
            print mysql_error();
            return $result;
        }
 
        /*check_requset_con*/
        public function check_requset_con($category, $name, $company, $date, $price, $discount){
            $result = (mysql_query("SELECT coup_consumer.Link FROM coup_consumer 
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

        private function Get_Last_id(){
            $result = (mysql_query('select ID from customers ORDER BY ID DESC LIMIT 1'));
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

