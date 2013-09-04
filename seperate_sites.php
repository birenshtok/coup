<?php   
 require_once "mysql_connector.php";
 require_once "insert_coupon.php";
 require_once "SitesList.php";
 require_once "sitePattern.php";
    
 $sitesHolder = new SitesList("SitesPaths.txt");
 $sitesArray = $sitesHolder->getSites();
 foreach($sitesArray as $site) {   
    //save the site object.
    $s = serialize($site);
    if (file_exists("site_object.txt"))
        unlink("site_object.txt");
    $fp=fopen("site_object.txt","w");
    fputs($fp,$s);
    fclose($fp);

    print($site->get_Link());
    
    $handle = fopen($site->get_Link(), "r"); // open the first page of the site.
    
    if($site->get_HasCities()) {
        //Goes over all the cities in the site.
        while (!feof($handle)) {
            $text = fgets($handle);
            print ((trim($site->get_pattern_City(), "\r\n")));
            preg_match_all(trim($site->get_pattern_City(), "\r\n"), $text, $matches_Link);         
            print_r($matches_Link[1]);
            //separate each city into a different link.
            foreach ($matches_Link[1] as $Link) {
                            
                if($site->get_CityReplace()) {  // the city need replace.
                    $Link = preg_replace($site->get_pattern_ToReplace(),$site->get_pattern_ReplaceWith(),$Link); // make it a valid link by changing the right word.
                    $handle_Zone = fopen($Link, "r"); // Open the link.
                    $i = 0;
                    $j = 0;

                    //Do the regular open_url.php mechanism.
                    while (!feof($handle_Zone)) {
                        $text = fgets($handle_Zone);
                        preg_match_all($site->get_pattern_RelativeInnerLink(), $text, $matches_Link); // get the relative link.

                        if($site->get_pattern_IsCategoryPatternNedded()) { // check if needed to get the category.
                            preg_match_all($site->get_pattern_Category(), $text, $matches_Category); // get the category.
                            $category = $matches_Category[1][$i]; // insert the category into $category.
                        } else {
                            $category = "Restaurant"; // insert the default category.
                        }
                        foreach ($matches_Link[1] as $Link) { // get over all the links.
                            ++$i;

                            /* do only if this is a restaurant coupon */
                            if ($category == $site->get_CategoryName()) {
                                $j++;
                                print("$j. ");
                                insert_coup ($site->get_pattern_TheInnerLink() + $Link,$category); // send the right link to the insert coup func.
                
                                print ("<BR><BR>"); // a line between coupons
                
                                /*break; // Just for testing a single coupon.*/
                            }
                        }
                    }
                    fclose($handle_Zone);
                } else { // the city doesn't need a replacement.
                    $handle_Zone = fopen($Link, "r"); // Open the link.
                    $i = 0;
                    $j = 0;

                    //Goes over all the restaurant coupons in the site.
                    while (!feof($handle_Zone)) {
                        $text = fgets($handle_Zone);
                        preg_match_all($site->get_pattern_RelativeInnerLink(), $text, $matches_Link); // get the relative link.
                        if($site->get_pattern_IsCategoryPatternNedded()) { // check if needed to get the category.
                            preg_match_all($site->get_pattern_Category(), $text, $matches_Category); // get the category.
                            $category = $matches_Category[1][$i]; // insert the category into $category.
                        } else {
                            $category = "Restaurant"; // insert the default category.
                        }
                        foreach ($matches_Link[1] as $Link) { // get over all the links.
                            ++$i;

                            /* do only if this is a restaurant coupon */
                            if ($category == $site->get_CategoryName()) {
                                $j++;
                                print("$j. ");
                                insert_coup ($site->get_pattern_TheInnerLink() + $Link,$category); // send the right link to the insert coup func.
                
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
            preg_match_all($site->get_pattern_RelativeInnerLink(), $text, $matches_Link); // get the relative link.
            
            if($site->get_pattern_IsCategoryPatternNedded()) { // check if needed to get the category.
                preg_match_all($site->get_pattern_Category(), $text, $matches_Category); // get the category.
                $category = $matches_Category[1][$i]; // insert the category into $category.
            } else {
                $category = "Restaurant"; // insert the default category.
            }    
        
            //separate each coupon into a different link.
            foreach ($matches_Link[1] as $Link) {
                ++$i;

                /* do only if this is a restaurant coupon */
                if ($category == $site->get_CategoryName()) {
                    $j++;
                    print("$j. ");
                    $handle_Zone = fopen($Link, "r"); // Open the link.
                    insert_coup ($site->get_pattern_TheInnerLink() + $Link,$category);
                
                    print ("<BR><BR>"); // a line between coupons
                }
                
                        
            }
            /*break; // Just for testing a single coupon.*/
        }
            //fclose($handle_Zone);
    }
    fclose($handle);
 }
?>