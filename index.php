<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8_unicode_ci">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="fav.png">
	<link rel="apple-touch-icon" href="fav.png"/>
    <title>Habit tracking</title>
</head>

<body>
    <a href="add-habit.php">Add habit</a>
    <ul>

        <?php
        /*
        $servername = "localhost";
        $username = "11454_1";
        $password = "gigapass460";
        $dbname = "janjezek_com_1";
        */

        $servername = "localhost";
        $username = "root";
        $password = "Bcn.lover9";
        $dbname = "habit-tracker";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM habits";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["habit_name"]. "</li>";
        }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>

        </ul>
    </body>
</html>