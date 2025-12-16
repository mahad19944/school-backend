<?php
require "../config.php";

if(!isset($_GET["id"])){
    echo "no teachingAssistant id provided";
    die();
}

$teaching_assistant_id = $_GET["id"];

$query = "DELETE FROM TeachingAssistant WHERE teaching_assistant_id  = $teaching_assistant_id";

if (mysqli_query($conn, $query)) {
        echo "Teaching Assistant deleted sucessfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>