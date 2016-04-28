<?php
	header('Content-disposition: attachment; filename=dump.txt');
	header('Context-type: text/csv');
	class AppDB extends SQLite3 {
		function __construct() {
			$this->open('005.db');
		}
	}
	$db = new AppDB();
	if(!$db) { echo("Failed to open DB"); return; }
	$query = "SELECT * FROM apps";
	$results = $db->query($query);
	$output = fopen('php://output','w');
	while($row = $results->fetchArray(SQLITE3_ASSOC)) {
		fputcsv($output, $row);
		echo("\n");
	}
?>
