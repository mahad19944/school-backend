<?php
require "../config.php";

if(!isset($_GET["id"])){
    echo "no library book id provided";
    die();
}

$library_book_id = $_GET["id"];

$query = "DELETE FROM LibraryBook WHERE library_book_id = $library_book_id";

if (mysqli_query($conn, $query)) {
        echo "Library book deleted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>