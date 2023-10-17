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

    <a href="index.php">Habit tracker</a>
    <?php
    if (isset($_POST["habit_name"])) {
    $servername = "localhost";
    $username = "root";
    $password = "Bcn.lover9";
    $dbname = "habit-tracker";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $habit_name = $_POST["habit_name"];
    $description = $_POST["description"];
    $user_id = "1";

    $sql = "INSERT INTO habits (user_id, habit_name, description) VALUES ('$user_id', '$habit_name', '$description')";
    if ($conn->query($sql) === TRUE) {
        echo "New habit created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    }
    
    ?>

<h3>Add a New Habit:</h3>
<form action="add-habit.php" method="post">
    <label for="habit_name">Habit Name:</label>
    <input type="text" name="habit_name" required><br><br>
    
    <label for="description">Description:</label>
    <textarea name="description" rows="4" cols="50"></textarea><br><br>

    <input type="submit" value="Add Habit">
</form>