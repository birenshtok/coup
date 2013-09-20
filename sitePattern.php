<!--
   25/08/13 this is the class that will get the patterns, from each site pattern text.
   **shye 
--!>
    
<?php
    

class sitePattern{
        private $SiteName;
        private $Link;
        private $HasCities;
        private $pattern_City;
        private $pattern_Name;
        private $pattern_Category;
        private $CategoryName;
        private $pattern_Discount;
        private $pattern_Price;
        private $pattern_Place;
        private $pattern_Last_date_to_buy;
        private $CityReplace;
        private $pattern_ToReplace;
        private $pattern_ReplaceWith;
        private $InsideLink;
        private $pattern_RelativeInnerLink;
        private $pattern_TheInnerLink;
        private $pattern_IsCategoryPatternNedded;
        private $DateInMiliSec;
        private $pattern_CompareLink;
 
        function sitePattern ($path){
                $handle = fopen(trim($path), "r");

                $this->Read_Next_Site($handle);
        }
       
        private function Read_Next_Site($handle){

            
            $text = fgets($handle);
            $name_site = $text; 
   
            $text = fgets($handle);
            $pattern = '/Link:(.*)/';
            preg_match($pattern, $text, $matches);
            $Link = $matches[1];

            $text = fgets($handle);
            $pattern = '/HasCities:(.*)/';
            preg_match($pattern, $text, $matches);
            $HasCities =  $matches[1];

            $text = fgets($handle);
            $pattern = '/City:(.*)/';
            preg_match($pattern, $text, $matches);
            $City =  $matches[1];
    
            $text = fgets($handle);
            $pattern = '/CityReplace:(.*)/';
            preg_match($pattern, $text, $matches);
            $CityReplace =  $matches[1];
    
            $text = fgets($handle);
            $pattern = '/ToReplace:(.*)/';
            preg_match($pattern, $text, $matches);
            $ToReplace =  $matches[1];
   
            $text = fgets($handle);
            $pattern = '/ReplaceWith:(.*)/';
            preg_match($pattern, $text, $matches);
            $ReplaceWith =  $matches[1];
  
            $text = fgets($handle);
            $pattern = '/InsideLink:(.*)/';
            preg_match($pattern, $text, $matches);
            $InsideLink =  $matches[1];

            $text = fgets($handle);
            $pattern = '/RelativeInnerLink:(.*)/';
            preg_match($pattern, $text, $matches);
            $RelativeInnerLink =  $matches[1];
    
            $text = fgets($handle);
            $pattern = '/TheInnerLink:(.*)/';
            preg_match($pattern, $text, $matches);
            $TheInnerLink =  $matches[1];
    
            $text = fgets($handle);
            $pattern = '/IsCategoryPatternNedded:(.*)/';
            preg_match($pattern, $text, $matches);
            $IsCategoryPatternNedded =  $matches[1];
    
            $text = fgets($handle);
            $pattern = '/Category:(.*)/';
            preg_match($pattern, $text, $matches);
            $Category =  $matches[1];

            $text = fgets($handle);
            $pattern = '/CategoryName:(.*)/';
            preg_match($pattern, $text, $matches);
            $CategoryName =  $matches[1];

            $text = fgets($handle);
            $pattern = '/Name:(.*)/';
            preg_match($pattern, $text, $matches);
            $Name =  $matches[1];

            $text = fgets($handle);
            $pattern = '/Price:(.*)/';
            preg_match($pattern, $text, $matches);
            $Price =  $matches[1];
    
            $text = fgets($handle);
            $pattern = '/Discount:(.*)/';
            preg_match($pattern, $text, $matches);
            $Discount =  $matches[1];

            $text = fgets($handle);
            $pattern = '/Place:(.*)/';
            preg_match($pattern, $text, $matches);
            $Place =  $matches[1];

            $text = fgets($handle);
            $pattern = '/Date:(.*)/';
            preg_match($pattern, $text, $matches);
            $Date =  $matches[1];

            $text = fgets($handle);
            $pattern = '/DateInMiliSec:(.*)/';
            preg_match($pattern, $text, $matches);
            $DateInMiliSec =  $matches[1];

            $text = fgets($handle);
            $pattern = '/CompareLink:(.*)/';
            preg_match($pattern, $text, $matches);
            $CompareLink =  $matches[1];
                    
            $this->insret_patterns($name_site,$HasCities,$City,$Link,$Name,$Category,$CategoryName,$Discount,$Price,$Place,$Date,$CityReplace,$ToReplace,$ReplaceWith,$InsideLink,$RelativeInnerLink,$TheInnerLink,$IsCategoryPatternNedded,$DateInMiliSec,$CompareLink);
        }

        
        public function insret_patterns($Site_Name,$HasCities,$City,$link,$name,$category,$CategoryName,$discount,$price,$place,$last_date_to_buy,$CityReplace,$ToReplace,$ReplaceWith,$InsideLink,$RelativeInnerLink,$TheInnerLink,$IsCategoryPatternNedded,$DateInMiliSec,$CompareLink) {
            $this->SiteName = $Site_Name;
            $this->Link = $link;
            $this->pattern_Name = $name;
            $this->HasCities = $HasCities;
            $this->pattern_City = $City;
            $this->pattern_Category = $category;
            $this->CategoryName = $CategoryName;
            $this->pattern_Discount = $discount;
            $this->pattern_Price = $price;
            $this->pattern_Place = $place;
            $this->pattern_Last_date_to_buy = $last_date_to_buy;
            $this->CityReplace = $CityReplace;
            $this->pattern_ToReplace = $ToReplace;
            $this->pattern_ReplaceWith = $ReplaceWith;
            $this->InsideLink = $InsideLink;
            $this->pattern_RelativeInnerLink = $RelativeInnerLink;
            $this->pattern_TheInnerLink = $TheInnerLink;
            $this->pattern_IsCategoryPatternNedded = $IsCategoryPatternNedded;
            $this->DateInMiliSec = $DateInMiliSec;
            $this->pattern_CompareLink = $CompareLink;
        }

        public function set_Site_Name ($Site_Name) {
            $this->Site_Name = $Site_Name;
        }
        public function set_Link ($link) {
            $this->Link = $link;
        }
        public function set_pattern_name ($name) {
            $this->pattern_Name = $name;
        }
        public function set_HasCities ($HasCities) {
            $this->HasCities = $HasCities;
        }
        public function set_pattern_City ($City) {
            $this->pattern_City = $City;
        }
        public function set_pattern_Category ($Category) {
            $this->pattern_Category = $Category;
        }
        public function set_CategoryName ($CategoryName) {
            $this->CategoryName = $CategoryName;
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
        public function set_CityReplace ($CityReplace) {
            $this->CityReplace = $CityReplace;
        }
        public function set_pattern_ToReplace ($ToReplace) {
            $this->pattern_ToReplace = $ToReplace;
        }
        public function set_pattern_ReplaceWith ($ReplaceWith) {
            $this->pattern_ReplaceWith = $ReplaceWith;
        }
        public function set_InsideLink ($InsideLink) {
            $this->InsideLink = $InsideLink;
        }
        public function set_pattern_RelativeInnerLink ($RelativeInnerLink) {
            $this->pattern_RelativeInnerLink = $RelativeInnerLink;
        }
        public function set_pattern_TheInnerLink ($TheInnerLink) {
            $this->pattern_TheInnerLink = $TheInnerLink;
        }
        public function set_pattern_IsCategoryPatternNedded ($IsCategoryPatternNedded) {
            $this->pattern_IsCategoryPatternNedded = $IsCategoryPatternNedded;
        }
        public function set_DateInMiliSec ($DateInMiliSec) {
            $this->DateInMiliSec = $DateInMiliSec;
        }
        public function set_pattern_CompareLink ($CompareLink) {
            $this->pattern_CompareLink = $CompareLink;
        }




        public function get_Site_Name () {
            return (trim($this->Site_Name));
        }
        public function get_Link () {
            return (trim($this->Link));
        }
        public function get_pattern_name () {
            return (trim($this->pattern_Name));
        }
        public function get_pattern_Category () {
            return (trim($this->pattern_Category));
        }
        public function get_CategoryName () {
            return (trim($this->CategoryName));
        }
        public function get_HasCities () {
            return (trim($this->HasCities));
        }
        public function get_pattern_City () {
            return (trim($this->pattern_City));
        }
        public function get_pattern_discount () {
            return (trim($this->pattern_Discount));
        }
        public function get_pattern_price () {
            return (trim($this->pattern_Price));
        }
        public function get_pattern_place () {
            return (trim($this->pattern_Place));
        }
        public function get_pattern_Last_date_to_buy () {
            return (trim($this->pattern_Last_date_to_buy));
        }
        public function get_CityReplace () {
            return (trim($this->CityReplace));
        }
        public function get_pattern_ToReplace () {
            return (trim($this->pattern_ToReplace));
        }
        public function get_pattern_ReplaceWith () {
            return (trim($this->pattern_ReplaceWith));
        }
        public function get_InsideLink () {
            return (trim($this->InsideLink));
        }
        public function get_pattern_RelativeInnerLink () {
            return (trim($this->pattern_RelativeInnerLink));
        }
        public function get_pattern_TheInnerLink () {
            return (trim($this->pattern_TheInnerLink));
        }
        public function get_pattern_IsCategoryPatternNedded () {
            return (trim($this->pattern_IsCategoryPatternNedded));
        }
        public function get_DateInMiliSec () {
            return (trim($this->DateInMiliSec));
        }
        public function get_pattern_CompareLink () {
            return (trim($this->pattern_CompareLink));
        }
}

?>