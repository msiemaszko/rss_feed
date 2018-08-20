<?php 
    use MarekSiemaszko\classes\RSS;
    use MarekSiemaszko\classes\csvWritter;
    require_once(__DIR__."/classes/rss.php");
    require_once(__DIR__."/classes/csvWritter.php");
    

    $function = $argv[1];
    $fileLocation = $argv[2];
    $fileDestination = $argv[3];
    $fileMode = ["csv:simple" => "w", "csv:extended" => "a"][$function];

    $rss = new RSS($fileLocation);
    $rssArray = $rss -> getItems();
    csvWritter::writeArray($rssArray, $fileDestination, $fileMode);
?>