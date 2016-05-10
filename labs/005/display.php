<!DOCTYPE html>
<html lang="en">
    <?php
        class AppDB extends SQLite3 {
            function __construct() {
                $this->open('005.db');
            }
        }
        $db = new AppDB();
        if(!$db) { echo("Failed to open DB"); return; }
    ?>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			p {
				margin: 0;
			}
			p.date {
				white-space: nowrap;
			}
			p.comments {
				max-width:500px;
				text-overflow: ellipsis;
				white-space: nowrap;
				overflow: hidden;
			}
		</style>
    </head>
    <body>
		<h2 style="width:100%;text-align:center">Responses</h2>
		<h4 style="width:100%;text-align:center"><a href="../003/">Form</a></h4>
		<div style="overflow-x:scroll;margin-left:10px;margin-right:10px">
			<table class="table table-striped" style="width:100%">
				<tr>
					<th>Username</th>
					<th>Email</th>
					<th>ID</th>
					<th>State</th>
					<th>City</th>
					<th>ZIP</th>
					<th>Comments</th>
					<th>Date</th>
				</tr>
			<?php
				function nl( $s,$r ) {
					echo("<td class=".$s."><p class=".$s.">".htmlspecialchars($r[$s])."</p></td>");
				}
				$query = "SELECT * FROM apps";
				$results = $db->query($query);
				while($row = $results->fetchArray(SQLITE3_ASSOC)) {
					echo("<tr>");
					nl('username',$row);
					nl('email',$row);
					nl('id',$row);
					nl('city',$row);
					nl('state',$row);
					nl('zip',$row);
					nl('comments',$row);
					nl('date',$row);
					echo("</tr>");
				}
			?>
			</table>
		</div>
		<div class="col-md-12 text-center" style="margin-top:40px">
			<a class="btn btn-primary" href="dbdump.php">Export as CSV</a>
		</div>
    </body>
</html>
