<?php
require "../config.php";
?>

<html>
<body>

<h2>Registration</h2>


<form method="POST">
    <label>session:</label><br>
    <input type="text" name="session"><br><br>

    <label>register date:</label><br>
    <input type="date" name="register_date"><br><br>

    <label>attendance:</label><br>
    <input type="text" name="attendance"><br><br>

    <label>reason:</label><br>
    <input type="text" name="reason"><br><br>

    <label>Class:</label><br>
    <input type="number" name="class_id"><br><br>

    <label>Pupil:</label><br>
    <input type="number" name="pupil_id"><br><br>

    <input type="submit" name="submit" value="registration">
</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    if (empty($_POST["session"])) {
        echo "Session cannot be empty<br>";
        die();
    }

    if (empty($_POST["register_date"])) {
        echo "Register date cannot be empty<br>";
        die();
    }
    if (empty($_POST["class_id"]) && !is_numeric($_POST["class_id"])){
        echo "Class ID must have a value which is a number<br>";
        die();
    }
    if (empty($_POST["pupil_id"]) && !is_numeric($_POST["pupil_id"])){
        echo "Pupil ID must have a value which is a number<br>";
        die();
    }

    $session = $_POST["session"];
    $register_date = $_POST["register_date"];
    $attendance = $_POST["attendance"];
    $reason= $_POST["reason"];
    $class_id = $_POST["class_id"];
    $pupil_id = $_POST["pupil_id"];

    $query = "
        INSERT INTO Registration
        (session, register_date, attendance, reason, class_id, pupil_id)
        VALUES
        ('$session', '$register_date', '$attendance', '$reason', $class_id, $pupil_id)
    ";

    if (mysqli_query($conn, $query)) {
        echo "Registration added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>