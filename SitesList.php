<?php  
    require_once "sitePattern.php";
    class SitesList {
        //object members
        private $lastModified = array();
        private $sites = array();
        private $path;


        //constructor
        function SitesList ($path) {
            
            $this->path = $path; 
            $handle = fopen($path,"r"); // open the file that hold all the path of sites files
            while (!feof($handle)) {
                $site_file_name = trim(fgets($handle)); // get the site txt file name
                if (!array_key_exists($site_file_name, $this->lastModified)){/* if the site dosn't exsit*/
                    $site =  new sitePattern ($site_file_name);
                    $this->sites[] = $site;
                    $this->$site_file_name = filemtime($site_file_name); // use of the _setLastModified function
                }
                else if ($this->lastModified[$site_file_name] < filemtime($site_file_name) ){/* the object isn't update*/
                    $this->sites[array_search($site,$this->sites)] = new sitePattern ($site_file_name);
                    $this->lastModified[$site_file_name] = filemtime($site_file_name); // use of the _setLastModified function
                }         
            }
        }

        function UpdateSitesList () {
            $handle = fopen($this->path,"r");
            while (!feof($handle)) {
                $site_file_name = trim(fgets($handle)); // get the site txt file name
                if (!array_key_exists($site_file_name, $this->lastModified)) {/* if the site dosn't exsit*/
                    $site =  new sitePattern ($site_file_name);
                    $this->sites[] = $site;
                    $this->$site_file_name = filemtime($site_file_name); // use of the _setLastModified function
                }
                else if ($this->lastModified[$site_file_name] < filemtime($site_file_name) ){/* the object isn't update*/
                    $this->sites[array_search($site,$this->sites)] = new sitePattern ($site_file_name);
                    $this->lastModified[$site_file_name] = filemtime($site_file_name); // use of the _setLastModified function
                } // There is no need to update
            }
        }
        public function __setLastModified($site, $date) {
            $this->lastModified[$site] = $date;
        }
        public function getSites() {
            return $this->sites;
        }
        public function getPath() {
            return $this->path;
        }

    } 

?>
