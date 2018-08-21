<?php use MarekSiemaszko\classes\RSS;
    require_once("src/classes/rss.php");
 
    class RSSTest extends PHPUnit_Framework_TestCase {

        private $_testXml, $_xml, $_firstItem;
        public function setUP() {
            $this -> _testXml = '<?xml version="1.0" encoding="UTF-8"?>
            <rss xmlns:dc="http://someadress">
                <channel>
                        <item>
                            <title>some title</title>
                            <link>any link</link>
                            <description>text description</description>
                            <pubDate>Thu, 09 Aug 2018 17:40:00 GMT</pubDate>
                            <dc:creator>a nice guy</dc:creator>
                        </item>
                </channel>
            </rss>';
            $this -> _xml = new RSS("plain", $this -> _testXml);
            $this -> _firstItem = $this -> _xml -> getItems(0);
        }

        public function testParseRSSasSimpleXMLcompareArraySize() {
            $expected = 5;
            $actual = count($this -> _firstItem);
            $this -> assertEquals($expected, $actual);
        }

        public function testParseRSSasSimpleXMLcompareDataArray() {
            $expected = [
                    "title"       => "some title",
                    "description" => "text description",
                    "link"        => "any link",
                    "creator"     => "a nice guy"
                ];
            $actual =[
                "title"           => $this -> _firstItem["title"],
                "description"     => $this -> _firstItem["description"],
                "link"            => $this -> _firstItem["link"],
                "creator"         => $this -> _firstItem["creator"]
            ];
            $this -> assertEquals($expected, $actual);
        }

        public function testParseRSSasSimpleXMLcomparePubDate() {
            $expected = "2018-08-09 19:40:00";
            $actual = $this -> _firstItem["pubDate"];
            $this -> assertEquals($expected, $actual);
        }

        public function testParseRSSasSimpleXMLwhenFileDoesntExists() {
            try {
                $rss = new RSS("file", "missing file.ext");
                $this->fail();
            } catch (Exception $e) {
                // OK
            }
        }  

        // public function testParseRSSasSimpleXMLwhenContentIsEmpty() {
        //     echo "testParseRSSasSimpleXMLwhenContentIsEmpty";
        //     try {
        //         $rss = new RSS("plain", "some stupid contet");
        //         $this->fail("");
        //     } catch (Exception $e) {
        //         // echo OK
        //     }
        // }   

        public function tearsDown(){
            // sprzatanie
        }
    }
?>