<?php
require "../config.php";

if(!isset($_GET["id"])){
    echo "no Pupil id provided";
    die();
}

$pupil_id = $_GET["id"];

$query = "DELETE FROM Pupil WHERE pupil_id = $pupil_id";

if (mysqli_query($conn, $query)) {
        echo "Pupil deleted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>