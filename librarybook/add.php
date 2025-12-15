<?php
require "../config.php";
?>

<html>
<body>

<h2>Add libarybook</h2>


<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>release date:</label><br>
    <input type="date" name="release_date"><br><br>

    <label>return date:</label><br>
    <input type="date" name="return_date"><br><br>

    <label>Pupil id:</label><br>
    <input type="number" name="pupil_id"><br><br>

    <input type="submit" name="submit" value="Add Libary Book">
</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    if (empty($_POST["name"])) {
        echo "Name cannot be empty<br>";
        die();
    }

    if (empty($_POST["release_date"])) {
        echo "release date cannot be empty<br>";
        die();
    }
   


    $name = $_POST["name"];
    $release_date = $_POST["release_date"];
    $return_date = $_POST["return_date"];
    $pupil_id = $_POST["pupil_id"];

    $query = "
        INSERT INTO LibraryBook
        (name, release_date, return_date, pupil_id)
        VALUES
        ('$name', '$release_date', '$return_date', $pupil_id)
    ";

    if (mysqli_query($conn, $query)) {
        echo "libary book added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>