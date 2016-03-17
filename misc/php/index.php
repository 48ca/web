<html>
<head>
</head>
<body>
<?php
	if(isset($_REQUEST["name"])) {
		$name = $_REQUEST["name"];
		echo("You entered: ".$name);
	}
	$a = 1+1;
	echo($a);
?>
</body>
</html>
