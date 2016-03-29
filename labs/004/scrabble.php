<?php
    function find($r) {
        preg_match_all($r, file_get_contents("/usr/share/dict/words"), $keys, PREG_PATTERN_ORDER);
        $ret = "";
        foreach($keys as $w) {
            $ret.=$w."<br>";
        }
        return $ret;
        // Investigate print_r to print array;
    }
    foreach($argv as $arg) {
        $e=explode("=",$arg);
        if(count($e) == 2)
            $_GET[$e[0]] = $e[1];
        else
            $_GET[$e[0]] = 0;
    }
    if(!isset($_GET["f"]) || !isset($_GET["l"])) return;
    $l = $_GET["l"];
    switch($_GET["f"]) {
        case "start": echo(find('/^'.$l.'.*$/'));
        case "end": echo(find('/^.*'.$l.'$/'));
        case "contain": echo(find('/^'.$l.'$/'));
    }
    
?>
