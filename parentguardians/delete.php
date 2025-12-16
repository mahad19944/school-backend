<?php
require "../config.php";

if(!isset($_GET["id"])){
    echo "no parent id provided";
    die();
}

$parent_id = $_GET["id"];

$query = "DELETE FROM ParentGuardian WHERE parent_id = $parent_id";

if (mysqli_query($conn, $query)) {
        echo "Parent/Guardian deleted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>