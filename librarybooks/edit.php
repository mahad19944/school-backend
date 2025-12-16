<?php
require "../config.php";

if (!isset($_GET["id"])){
    echo "no libraryBook ID provided";
    die();
}
$library_book_id = $_GET["id"];

$query = "SELECT * FROM LibraryBook WHERE library_book_id = $library_book_id";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)==0){
    echo "no LibraryBook found";
    die();
}
$LibraryBook =  mysqli_fetch_array($result);
?>
<html>
<body>
<form method="POST">
    <label>name:</label><br>
    <input type="text" name="name" value="<?php echo $LibraryBook['name']; ?>"><br><br>

    <label>release_date:</label><br>
    <input type="date" name="release_date" value="<?php echo $LibraryBook['release_date']; ?>"><br><br>

    <label>return_id:</label><br>
    <input type="date" name="return_date" value="<?php echo $LibraryBook['return_date']; ?>"><br><br>

    <label>pupil_id:</label><br>
    <input type="number" name="pupil_id" value="<?php echo $LibraryBook['pupil_id']; ?>"><br><br>



    <input type="submit" name="submit" value="Update libraryBook">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    if (empty($_POST["release_date"])) {
        echo "release_date cannot be empty<br>";
        die();
    }

    if (empty($_POST["return_date"])) {
        echo "return_date cannot be empty<br>";
        die();
    }


    if (!is_numeric($_POST["pupil_id"])) {
        echo "pupil_id must be a number<br>";
        die();
    }

    $name = $_POST["name"];
    $release_date = $_POST["release_date"];
    $return_date = $_POST["return_date"];
    $pupil_id = $_POST["pupil_id"];
    // isset - checks whether a variable is set, which means that it has to be declared and is not NULL

    $query = "
        UPDATE LibraryBook
        SET
            name = '$name',
            release_date= '$release_date',
            return_date = '$return_date',
            pupil_id = $pupil_id
         WHERE library_book_id = $library_book_id
    ";

    if (mysqli_query($conn, $query)) {
        echo "LibraryBook successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>