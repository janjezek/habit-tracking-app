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
    <h1><a href="index.php">Habit tracker</a></h1>
    <p>
        <a href="add-habit.php">Add habit</a>
    </p>
    <p>
        Habits for <strong><?php 
        $date = date("Y-m-d");
        echo $date;?></strong>
    </p>
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

        /* Complete habit */

        if (isset($_GET["complete"])) {
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql3 = "INSERT INTO entries (habit_id, user_id, entry_date) VALUES ('" . $_GET["complete"]. "', '1', '$date')";
            if ($conn->query($sql3) === TRUE) {
                echo "Habit completed<br>";
            } else {
                echo "Error: " . $sql3 . "<br>" . $conn->error;
            }
        }

        /* List habit */

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT habits.habit_id, habits.habit_name, habits.description FROM habits WHERE habits.habit_id NOT IN (SELECT habit_id FROM entries WHERE entry_date = '$date')";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["habit_name"]. " &nbsp;<a href=\"index.php?complete=" . $row["habit_id"]. "\">✅</a></li>";
        }
        } else {
            echo "All habits completed 🎉";
        }
        ?>
        </ul>
        <p>
            Completed habits
        </p>
        <ul>
            <?php
            $sql2 = "SELECT habits.habit_id, habits.habit_name, habits.description FROM habits INNER JOIN entries ON habits.habit_id = entries.habit_id WHERE entries.entry_date = '$date'";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
                echo "<li>" . $row2["habit_name"]. "</li>";
            }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </ul>
    </body>
</html>