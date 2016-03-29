<?php
    if(isset($_REQUEST["num1"]) && isset($_REQUEST["num2"])) {
        $first = $_REQUEST["num1"];
        $second = $_REQUEST["num2"];
        echo($first * $second);
    }
?>
