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
			return "'".SQLite3::escapeString($_POST[$ar])."'";
		else return 'NULL';
	}
	$uname = gvar('username');
	$mail = gvar('email');
	$st = gvar('state');
	$cty = gvar('city');
	$zp = gvar('zip');
	$comment = gvar('comments');
	$dt = gvar('date');
	$query = "INSERT INTO apps (username,email,city,state,zip,comments,date) VALUES (".$uname.",".$mail.",".$cty.",".$st.",".$zp.",".$comment.",".$dt.");";
	$results = $db->query($query);
	if($results) {
		header("Location: display.php");
		echo("<status>Success</status>");
		http_response_code(302);
		die();
	} else {
		echo("<status>".$db->lastErrorMsg()."</status>");
		http_response_code(400);
		die();
	}
?>
