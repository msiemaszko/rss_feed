<?php namespace MarekSiemaszko\classes;

    /**
     * Klasa parsująca RSS 
     */
    class RSS {
        
        private $_xml_plain, $_xml_handle;

        /**
         * Konstruktor: otwiera wskazany plik/url i parsuje jego zawartość
         *
         * @param [type] $url
         */
        public function __construct($url) {
            // get rss file content
            $this->_xml_plain = file_get_contents($url);

            // parse xml content
            $this->_xml_handle = new \SimpleXMLElement($this->_xml_plain);

        }

        /**
         * pobiera pozycje (items) w RSS
         *
         * @return array tablica zawierajaca wszystkie pozycje.
         */
        public function getItems() {
            $items = $this -> _xml_handle -> channel -> item;
            $itemsArray = array();
            foreach( $items as $item ) {        
                array_push($itemsArray, [
                    "title"         => (string) $item -> title,
                    "description"   => (string) $item -> description,
                    "link"          => (string) $item -> link,
                    "pubDate"       => (string) $item -> pubDate,
                    "creator"       => (string) $item -> children("dc", TRUE)
                ] );
            }
            return $itemsArray;
        }
    }
?>