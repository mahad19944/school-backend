<?php
require "../config.php";

if(!isset($_GET["id"])){
    echo "no teacher id provided";
    die();
}

$teacher_id = $_GET["id"];

$query = "DELETE FROM Teacher WHERE teacher_id = $teacher_id";

if (mysqli_query($conn, $query)) {
        echo "Teacher deleted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>

