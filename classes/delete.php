<?php
require "../config.php";

if(!isset($_GET["id"])){
    echo "no class id provided";
    die();
}

$class_id = $_GET["id"];

$query = "DELETE FROM Class WHERE class_id = $class_id";

if (mysqli_query($conn, $query)) {
        echo "Class deleted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>