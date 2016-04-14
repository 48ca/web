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
            $username = $_POST['username'];
            echo($username);
            $query = "INSERT INTO apps (username) VALUES (".$username.");";
            $results = $db->query($query);
            echo(var_dump($results));
        ?>
    </body>
</html>
