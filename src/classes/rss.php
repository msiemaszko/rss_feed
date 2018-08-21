<?php namespace MarekSiemaszko\classes;

    /**
     * the RSS parsing class
     */
    class RSS {
        
        private $_xml_content, $_xml_handle;

        /**
         * parses the content of the specified xml file or xml content passed directly
         * 
         * @param string $type "file" / "plain"
         * @param string $url file location / plain xml content
         */
        public function __construct($type, $url) {

            // get rss file content
            if ($type == "file") {
                if ( ($this->_xml_content = @file_get_contents($url)) === false ) {
                    throw new \Exception("cannot get file contents!");
                    return false;
                }
            }
            else if ($type == "plain")
            $this->_xml_content = $url;

            // parse xml content
            $this->_xml_handle = new \SimpleXMLElement($this->_xml_content);
            return true;
        }

        /**
         * method gets all elements from RSS
         *
         * @param int $itemNo (optional) will return only a specified row
         * @return array array contains all items
         */
        public function getItems($itemNo = null) {
            $items = $this -> _xml_handle -> channel -> item;
            $itemsArray = array();
            foreach( $items as $item ) {        
                array_push($itemsArray, [
                    "title"         => (string) $item -> title,
                    "description"   => (string) $item -> description,
                    "link"          => (string) $item -> link,
                    "pubDate"       => $this -> dateDate( $item -> pubDate ),
                    "creator"       => (string) $item -> children("dc", TRUE)
                ] );
            }
            return ($itemNo !== null ) ? $itemsArray[$itemNo] : $itemsArray;
        }

        /**
         * metoda transformująca date na porządany format
         *
         * @param string $date data wejściowa
         * @return string data w formacie Y-m-d H:i:s
         */
        private function dateDate($date) {
            return date("Y-m-d H:i:s", strtotime($date));
        }
    }
?>