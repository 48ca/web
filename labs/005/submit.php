<html>
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
    </head>
    <body>
        <hr>
        <?php
			echo(var_dump($_POST));
			function gvar($ar) {
				if (isset($_POST[$ar]) && $_POST[$ar] !== '') 
					return "'".$_POST[$ar]."'";
				else return 'NULL';
			}
			// $uname = isset($_POST['username']) ? $_POST['username'] : '';
            // $uname = $_POST['username'];
			$uname = gvar('username');
			// $mail = isset($_POST['username']) ? $_POST['username'] : '';
			// $mail = $_POST['email'];
			$mail = gvar('email');
			// $st = $_POST['state'];
			$st = gvar('state');
			$cty = gvar('city');
			// $zp = $_POST['zip'];
			$zp = gvar('zip');
			// $comment = $_POST['comments'];
			$comment = gvar('comments');
            $query = "INSERT INTO apps (username,email,city,state,zip,comments) VALUES (".$uname.",".$mail.",".$cty.",".$st.",".$zp.",".$comment.");";
			echo($query);
            $results = $db->query($query);
            echo(var_dump($results));
        ?>
    </body>
</html>
