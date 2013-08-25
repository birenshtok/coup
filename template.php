<!--
   25/08/13 this is the class that will get the patterns, from the templete text.
            if you want to get the first site then call the constrctor with 0,
            second site 1, sered site 2...
   **shye 1 
--!>
    
<?php
    

class template{
        private $SiteName;
        private $pattern_Link;
        private $pattern_City;
        private $pattern_Name;
        private $pattern_Category;
        private $pattern_Discount;
        private $pattern_Price;
        private $pattern_Place;
        private $pattern_Last_date_to_buy;
        private $pattern_CityReplace;
        private $pattern_ToReplace;
        private $pattern_ReplaceWith;
        private $pattern_InsideLink;
        private $pattern_RelativeInnerLink;
        private $pattern_TheInnerLink;
        private $pattern_IsCategoryPatternNedded;
        private $pattern_DateInMiliSec;
 
        function template ($num){
            print 2;
                $handle = fopen("C:\\Users\\user\\Documents\\GitHub\\coup\\template.txt", "r");

                while ($num>0)
                {
                    $check = 1;
                    while ($check == 1)
                    {
                        $text = fgets($handle);
                        $pattern = '/EndOfSite/';
                        preg_match_all($pattern, $text, $matches);
                        print_r ($matches);
                        if ($matches[0][0] == "EndOfSite")
                            $check = 0;
                        print $num;
                    }
                    $num = $num-1;
                } 
                $this->Read_Next_Site($handle);
        }
       
        private function Read_Next_Site($handle){

            
            $text = fgets($handle);
            $name_site = $text; 
   
            $text = fgets($handle);
            $pattern = '/Link:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $Link = $matches[1];

            $text = fgets($handle);
            $pattern = '/City:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $City =  $matches[1];
    
            $text = fgets($handle);
            $pattern = '/CityReplace:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $CityReplace =  $matches[1];
    
            $text = fgets($handle);
            $pattern = '/ToReplace:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $ToReplace =  $matches[1];
   
            $text = fgets($handle);
            $pattern = '/ReplaceWith:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $ReplaceWith =  $matches[1];
  
            $text = fgets($handle);
            $pattern = '/InsideLink:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $InsideLink =  $matches[1];

            $text = fgets($handle);
            $pattern = '/RelativeInnerLink:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $RelativeInnerLink =  $matches[1];
    
            $text = fgets($handle);
            $pattern = '/TheInnerLink:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $TheInnerLink =  $matches[1];
    
            $text = fgets($handle);
            $pattern = '/IsCategoryPatternNedded:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $IsCategoryPatternNedded =  $matches[1];
    
            $text = fgets($handle);
            $pattern = '/Category:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $Category =  $matches[1];

            $text = fgets($handle);
            $pattern = '/Name:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $Name =  $matches[1];

            $text = fgets($handle);
            $pattern = '/Price:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $Price =  $matches[1];
    
            $text = fgets($handle);
            $pattern = '/Discount:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $Discount =  $matches[1];

            $text = fgets($handle);
            $pattern = '/Place:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $Place =  $matches[1];

            $text = fgets($handle);
            $pattern = '/Date:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $Date =  $matches[1];

            $text = fgets($handle);
            $pattern = '/DateInMiliSec:(.*)/';
            preg_match_all($pattern, $text, $matches);
            $DateInMiliSec =  $matches[1];
                    
            $this->insret_patterns($name_site,$Link,$Name,$Category,$Discount,$Price,$Place,$Date,$CityReplace,$ToReplace,$ReplaceWith,$InsideLink,$RelativeInnerLink,$TheInnerLink,$IsCategoryPatternNedded,$DateInMiliSec);
        }

        
        public function insret_patterns($Site_Name,$link,$name,$category,$discount,$price,$place,$last_date_to_buy,$CityReplace,$ToReplace,$ReplaceWith,$InsideLink,$RelativeInnerLink,$TheInnerLink,$IsCategoryPatternNedded,$DateInMiliSec) {
            $this->SiteName = $Site_Name;
            $this->pattern_Link = $link;
            $this->pattern_Name = $name;
            $this->pattern_Category = $category;
            $this->pattern_Discount = $discount;
            $this->pattern_Price = $price;
            $this->pattern_Place = $place;
            $this->pattern_Last_date_to_buy = $last_date_to_buy;
            $this->pattern_CityReplace = $CityReplace;
            $this->pattern_ToReplace = $ToReplace;
            $this->pattern_ReplaceWith = $ReplaceWith;
            $this->pattern_InsideLink = $InsideLink;
            $this->pattern_RelativeInnerLink = $RelativeInnerLink;
            $this->pattern_TheInnerLink = $TheInnerLink;
            $this->pattern_IsCategoryPatternNedded = $IsCategoryPatternNedded;
            $this->pattern_DateInMiliSec = $DateInMiliSec;
        }

        public function set_pattern_link ($link) {
            $this->pattern_Link = $link;
        }
        public function set_pattern_name ($name) {
            $this->pattern_Name = $name;
        }
        public function set_pattern_Category ($Category) {
            $this->pattern_Category = $Category;
        }
        public function set_pattern_discount ($discount) {
            $this->pattern_Discount = $discount;
        }
        public function set_pattern_price ($price) {
           $this->pattern_Price = $price;
        }
        public function set_pattern_place ($place) {
            $this->pattern_Place = $place;
        }
        public function set_pattern_Last_date_to_buy ($Last_date_to_buy) {
            $this->pattern_Last_date_to_buy = $Last_date_to_buy;
        }




        public function get_pattern_Link () {
            return $this->pattern_Link;
        }
        public function get_pattern_name () {
            return $this->pattern_Name;
        }
        public function get_pattern_Category () {
            return $this->pattern_Category;
        }
        public function get_pattern_discount () {
            return $this->pattern_Discount;
        }
        public function get_pattern_price () {
            return $this->pattern_Price;
        }
        public function get_pattern_place () {
            return $this->pattern_Place;
        }
        public function get_pattern_Last_date_to_buy () {
            return $this->pattern_Last_date_to_buy;
        }
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
