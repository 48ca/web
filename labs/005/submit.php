<?php
	class AppDB extends SQLite3 {
		function __construct() {
			$this->open('005.db');
		}
	}
	$db = new AppDB();
	if(!$db) { echo("Failed to open DB"); return; }
	function gvar($ar) {
		if (isset($_POST[$ar]) && $_POST[$ar] !== '') 
			return "'".$_POST[$ar]."'";
		else return 'NULL';
	}
	$uname = gvar('username');
	$mail = gvar('email');
	$st = gvar('state');
	$cty = gvar('city');
	$zp = gvar('zip');
	$comment = gvar('comments');
	$query = "INSERT INTO apps (username,email,city,state,zip,comments) VALUES (".$uname.",".$mail.",".$cty.",".$st.",".$zp.",".$comment.");";
	$results = $db->query($query);
	if($results) {
		header("Location: display.php");
		echo("0");
		http_response_code(200);
		die();
	} else {
		echo("1");
		http_response_code(400);
		die();
	}
?>
