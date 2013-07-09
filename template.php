<?php
class template{
        private $pattern_link;
        private $pattern_name;
        private $pattern_Category;
        private $pattern_discount;
        private $pattern_price;
        private $pattern_place;
        private $pattern_Last_date_to_buy;
          
        function template ($link,$name,$Category,$discount,$price,$place,$Last_date_to_buy) {
            $pattern_link = $link;
            $pattern_name = $name;
            $pattern_Category = $Category;
            $pattern_discount = $discount;
            $pattern_price = $price;
            $pattern_place = $place;
            $pattern_Last_date_to_buy = $Last_date_to_buy;
        }

        public function get_pattern_link () {
            return $this->pattern_link;
        }
        public function get_pattern_name () {
            return $this->pattern_name;
        }
        public function get_pattern_Category () {
            return $this->pattern_Category;
        }
        public function get_pattern_discount () {
            return $this->pattern_discount;
        }
        public function get_pattern_price () {
            return $this->pattern_price;
        }
        public function get_pattern_place () {
            return $this->pattern_place;
        }
        public function get_pattern_Last_date_to_buy () {
            return $this->pattern_Last_date_to_buy;
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
