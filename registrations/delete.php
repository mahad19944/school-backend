<?php
require "../config.php";

if(!isset($_GET["id"])){
    echo "no registration id provided";
    die();
}

$registration_id  = $_GET["id"];

$query = "DELETE FROM Registration WHERE registration_id  = $registration_id ";

if (mysqli_query($conn, $query)) {
        echo "Registration deleted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>