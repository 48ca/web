<?php
	$q = urlencode($_GET['q']);
	$api = 'https://api.wolframalpha.com/v2/query?appid=QXW9HY-8K7E462TYR&input='.$q;
	$x = simplexml_load_string(file_get_contents($api));
	echo(json_encode($x));
?>
