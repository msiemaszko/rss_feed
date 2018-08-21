php simple fetch RSS
================


Basic Usage
-------

``` php
use MarekSiemaszko\classes\RSS;

// for parsing file/URL
$fileLocation = "http://feeds.nationalgeographic.com/ng/News/News_Main";
$rss = new RSS("file", $fileLocation);
print_r( $rss -> getItems() );

// for parsing plain text
$xml = '<?xml version="1.0" encoding="UTF-8"?>
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

$rss = new RSS("plain", $xml);
print_r( $rss -> getItems() )
```


using the CLI
-------
```
php src/console.php METHOD URL PATH
```
Parametrs:
* METHOD
  * csv:simple - write data to specified file
  * csv:extended - append data to exists file
* URL - RSS address
* PATH - CSV filename

Full example:
``` bash
php src/console.php csv:simple http://feeds.nationalgeographic.com/ng/News/News_Main eksport_prosty.csv
```


Testing
-------

``` bash
phpunit
```