<?php 
    use MarekSiemaszko\classes\RSS;
    use MarekSiemaszko\classes\csvWriter;
    require_once(__DIR__."/classes/rss.php");
    require_once(__DIR__."/classes/csvWriter.php");
    
    if ($argc != 4 ) exit("ERROR: nieprawidłowa ilość parametrów");
    $function = $argv[1];
    $fileLocation = $argv[2];
    $fileDestination = $argv[3];
    if ( (@$fileMode = ["csv:simple" => "w", "csv:extended" => "a"][$function]) != true ) exit("ERROR: nieprawidłowe polecenie CSV. (param 3)");

    // parsing RSS xmls
    try{ 
        $rss = new RSS("file", $fileLocation);
    } catch ( Exception $e ){
        exit( "ERROR: " . $e->getMessage());

    }
    $rssArray = $rss -> getItems();
    
    // writing CSV
    csvWriter::writeArray($rssArray, $fileDestination, $fileMode);
    exit("SUCCESS!");
?>