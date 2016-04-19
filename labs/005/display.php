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
            $query = "SELECT * FROM apps";
            $results = $db->query($query);
            while($row = $results->fetchArray()) {
                echo("Username: <span class='username'>".$row['username']."</span><br>");
                echo("Email: <span class='email'>".$row['email']."</span><br>");
                echo("City: <span class='city'>".$row['city']."</span><br>");
                echo("State: <span class='state'>".$row['state']."</span><br>");
                echo("ZIP Code: <span class='zip'>".$row['zip']."</span><br>");
                echo("Comments: <span class='comments'>".$row['comments']."</span><hr>");
            }
        ?>
    </body>
</html>
