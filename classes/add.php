<?php
require "../config.php";
?>

<html>
<body>

<!-- CREATE TABLE Class(
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    capacity INT,
    teacher_id INT,
    teaching_assistant_id INT,
    FOREIGN KEY (teacher_id) REFERENCES Teacher(teacher_id),
    FOREIGN KEY (teaching_assistant_id) REFERENCES TeachingAssistant(teaching_assistant_id)
); -->
<h2>Add Class</h2>

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>Capacity:</label><br>
    <input type="number" name="capacity"><br><br>

    <label>Teacher:</label><br>
    <input type="number" name="teacher_id"><br><br>

    <label>Teaching Assistant:</label><br>
    <input type="number" name="teaching_assistant_id"><br><br>

    <input type="submit" name="submit" value="Add Class">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    if (empty($_POST["name"])) {
        echo "Name cannot be empty<br>";
        die();
    }

    if (!is_numeric($_POST["capacity"])) {
        echo "Capacity must be a number<br>";
        die();
    }
    
    if (empty($_POST["teacher_id"]) && !is_numeric($_POST["teacher_id"])){
        echo "Teacher ID must have a value which is a number<br>";
        die();
    }
    if (empty($_POST["teaching_assistant_id"]) && !is_numeric($_POST["teaching_assistant_id"])){
        echo "Teaching Assistant ID must have a value which is a number<br>";
        die();
    }

    $name = $_POST["name"];
    $capacity = $_POST["capacity"];
    $teacher_id = $_POST["teacher_id"];
    $teaching_assistant_id = $_POST["teaching_assistant_id"];


    $query = "
        INSERT INTO Class
        (name, capacity, teacher_id, teaching_assistant_id)
        VALUES
        ('$name', $capacity, $teacher_id, $teaching_assistant_id)
    ";

    if (mysqli_query($conn, $query)) {
        echo "Class added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>