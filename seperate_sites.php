<?php   
    include "mysql_connector.php";
    include "insert coupon.php";
    
    $site = new template();

    $handle = fopen($site::get_site_name(), "r"); // open the first page of the site.
    
    if($site::has_cities()) {
        //Goes over all the cities in the site.
        while (!feof($handle)) {
            $text = fgets($handle);
            preg_match_all($site::get_city(), $text, $matches_Link);         
        
            if($site::CityReplace()) { // the city need replace.
            
                //separate each city into a different link.
                foreach ($matches_Link[1] as $Link) {
                    $Link = preg_replace($site::get_ToReplace(),$site::get_ReplaceWith(),$Link); // make it a valid link by changing the right word.
                    $handle_Zone = fopen($Link, "r"); // Open the link.
                    $i = 0;
                    $j = 0;

                    //Do the regular open_url.php mechanism.
                    while (!feof($handle_Zone)) {
                        $text = fgets($handle_Zone);
                        preg_match_all($site::get_RelativeInnerLink(), $text, $matches_Link); // get the relative link.

                        if($site::IsCategoryPatternNedded()) { // check if needed to get the category.
                            preg_match_all($site::get_category_Pattern(), $text, $matches_Category); // get the category.
                            $category = $matches_Category[1][$i]; // insert the category into $category.
                        } else {
                            $category = "Restaurant"; // insert the default category.
                        }
                        foreach ($matches_Link[1] as $Link) { // get over all the links.
                            ++$i;

                            /* do only if this is a restaurant coupon */
                            if ($category == $site::get_category()) {
                                $j++;
                                print("$j. ");
                                insert_coup ($site::get_TheInnerLink$Link()$Link,$category); // send the right link to the insert coup func.
                
                                print ("<BR><BR>"); // a line between coupons
                
                                /*break; // Just for testing a single coupon.*/
                            }
                        }
                    }
                    fclose($handle_Zone);
                }
            } else { // the city doesn't need a replacement.
                foreach ($matches_Link[1] as $Link) {
                    $handle_Zone = fopen($Link, "r"); // Open the link.
                    $i = 0;
                    $j = 0;

                    //Goes over all the restaurant coupons in the site.
                    while (!feof($handle_Zone)) {
                        $text = fgets($handle_Zone);
                        preg_match_all($site::get_RelativeInnerLink(), $text, $matches_Link); // get the relative link.
                        if($site::IsCategoryPatternNedded()) { // check if needed to get the category.
                            preg_match_all($site::get_category_Pattern(), $text, $matches_Category); // get the category.
                            $category = $matches_Category[1][$i]; // insert the category into $category.
                        } else {
                            $category = "Restaurant"; // insert the default category.
                        }
                        foreach ($matches_Link[1] as $Link) { // get over all the links.
                            ++$i;

                            /* do only if this is a restaurant coupon */
                            if ($category == $site::get_category()) {
                                $j++;
                                print("$j. ");
                                insert_coup ($site::get_TheInnerLink()$Link()$Link,$category); // send the right link to the insert coup func.
                
                                print ("<BR><BR>"); // a line between coupons
                
                                /*break; // Just for testing a single coupon.*/
                            }
                        }
                    }
                    fclose($handle_Zone);
                }
            }
        }
    } else { //there is no link for each city.
        
        //Goes over all the restaurant coupons in the site.
        while (!feof($handle)) {
            $text = fgets($handle);
            preg_match_all($site::get_RelativeInnerLink(), $text, $matches_Link); // get the relative link.
            
            if($site::IsCategoryPatternNedded()) { // check if needed to get the category.
                preg_match_all($site::get_category_Pattern(), $text, $matches_Category); // get the category.
                $category = $matches_Category[1][$i]; // insert the category into $category.
            } else {
                $category = "Restaurant"; // insert the default category.
            }    
        
            //separate each coupon into a different link.
            foreach ($matches_Link[1] as $Link) {
                $handle_Zone = fopen($Link, "r"); // Open the link.
                insert_coup ($site::get_TheInnerLink()$Link()$Link,$category);
                
                print ("<BR><BR>"); // a line between coupons
                
                        
            }
            /*break; // Just for testing a single coupon.*/
        }
            fclose($handle_Zone);
    }
    fclose($handle);
?>