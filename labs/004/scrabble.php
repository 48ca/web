<?php
    function find($r,$len) {
        // $words = file_get_contents("/usr/share/dict/words");
        $words = file_get_contents("dict.txt");
        if(!$words) return "";
        echo($r);
        preg_match_all("/\b(".$r.")\b/", $words, $keys);
        $ret = "";
        $fwords = $keys[0];
        if($len > 0) {
            foreach($fwords as $w) {
                if(strlen($w) == $len) {
                    echo($w."<br>");
                }
            }
        } else {
            foreach($fwords as $w) {
                echo($w."<br>");
            }
        }
    }
    foreach($argv as $arg) {
        $e=explode("=",$arg);
        if(count($e) == 2)
            $_GET[$e[0]] = $e[1];
        else
            $_GET[$e[0]] = 0;
    }
    if(!isset($_GET["f"]) || !isset($_GET["l"]) || !isset($_GET["len"])) return;
    $l = strtolower($_GET["l"]);
    $len = 0+$_GET["len"];
    switch($_GET["f"]) {
        case "start":
            find($l.'.*',$len);
            break;
        case "end":
            find('.*'.$l,$len);
            break;
        case "contain":
            $regex = "";
            $used = [];
            foreach(str_split($l) as $let) {
                if(array_key_exists($let, $used)) $used[$let]++;
                else $used[$let] = 1;
            }
            foreach($used as $let => $num) {
                $app = ("\w*".$let)*2; // Double string // broken
                $regex.="(?=".$app.")";
            }
            $regex.="\w{".strlen($l).",}";
            find($regex,$len);
            break;
    }
    
?>
