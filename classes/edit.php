<?php
require "../config.php";

if (!isset($_GET["id"])){
    echo "No class ID provided";
    die();
}
$class_id = $_GET["id"];

$query = "SELECT * FROM Class WHERE class_id = $class_id";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)==0){
    echo "No class found";
    die();
}
$class =  mysqli_fetch_array($result);
?>
<html>
<body>
<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?php echo $class['name']; ?>"><br><br>

    <label>capacity:</label><br>
    <input type="number" name="capacity" value="<?php echo $class['capacity']; ?>"><br><br>

    <label>teacher_id:</label><br>
    <input type="number" name="teacher_id" value="<?php echo $class['teacher_id']; ?>"><br><br>

    <label>teachingAssistant_id:</label><br>
    <input type="number" name="teaching_assistant_id" value="<?php echo $class['teaching_assistant_id']; ?>"><br><br>

     <input type="submit" name="submit" value="Update class">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    if (empty($_POST["name"])) {
        echo "Name cannot be empty<br>";
        die();
    }

    if (!is_numeric($_POST["capacity"])) {
        echo "capacity must be a number<br>";
        die();
    }

    if (empty($_POST["teacher_id"])) {
        echo "Teacher_id cannot be empty<br>";
        die();
    }

    if (!is_numeric($_POST["teaching_assistant_id"])) {
        echo "teachingAssistant_id must be a number<br>";
        die();
    }
     if (!is_numeric($_POST["teacher_id"])) {
        echo "teacher_id must be a number<br>";
        die();
    }    
       
    $name = $_POST["name"];
    $capacity = $_POST["capacity"];
    $teacher_id = $_POST["teacher_id"];
    $teaching_assistant_id= $_POST["teaching_assistant_id"];
   
    // isset - checks whether a variable is set, which means that it has to be declared and is not NULL

    $query = "
        UPDATE Class
        SET
            name = '$name',
            capacity = $capacity,
            teacher_id = $teacher_id,
            teaching_assistant_id = $teaching_assistant_id
        WHERE class_id = $class_id
    ";

    if (mysqli_query($conn, $query)) {
        echo "class updated successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>