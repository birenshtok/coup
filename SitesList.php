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
            $handle = fopen($path,"r");
            while (!feof($handle)) {
                $text = fgets($handle);
                if (!array_key_exists($text, $this->lastModified)){/* if the site dosn't exsit*/
                    $site =  new sitePattern ($text);
                    $this->sites[] = $site;
                    $this->$text = filemtime($text);
                }
                else if ($this->lastModified[$text] < filemtime($text) ){/* the object isn't update*/
                    $this->sites[array_search($site,$this->sites)] = new sitePattern ($text);
                    $this->lastModified[$text] = filemtime($text);
                }         
            }
        }
        public function __setLastModified($site, $date) {
            $this->lastModified[$site] = $date;
        }
        public function getSites() {
            return $this->sites;
        }

    } 

?>
