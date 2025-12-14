<?php
require "../config.php";
?>

<html>
<body>

<h2>Add Pupil</h2>

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>Age:</label><br>
    <input type="number" name="age"><br><br>

    <label>Address:</label><br>
    <input type="text" name="address"><br><br>

    <label>Medical Info:</label><br>
    <textarea name="medical_info"></textarea><br><br>

    <label>
        <input type="checkbox" name="free_school_meals">
        Free School Meals
    </label><br><br>

    <label>Class ID:</label><br>
    <input type="number" name="class_id"><br><br>

    <input type="submit" name="submit" value="Add Pupil">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    if (empty($_POST["name"])) {
        echo "Name cannot be empty<br>";
        die();
    }

    if (!is_numeric($_POST["age"])) {
        echo "Age must be a number<br>";
        die();
    }

    if (empty($_POST["address"])) {
        echo "Address cannot be empty<br>";
        die();
    }

    if (!is_numeric($_POST["class_id"])) {
        echo "Class ID must be a number<br>";
        die();
    }

    $name = $_POST["name"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $medical_info = $_POST["medical_info"];
    $free_school_meals = isset($_POST["free_school_meals"]) ? 1 : 0;
    $class_id = $_POST["class_id"];

    $query = "
        INSERT INTO Pupil
        (name, age, address, medical_info, free_school_meals, class_id)
        VALUES
        ('$name', $age, '$address', '$medical_info', $free_school_meals, $class_id)
    ";

    if (mysqli_query($conn, $query)) {
        echo "Pupil added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>