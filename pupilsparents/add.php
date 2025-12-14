<?php
require "../config.php";
?>

<html>
<body>

<h2>Add PupilParent</h2>

<form method="POST">
    <label>Pupil:</label><br>
    <input type="number" name="pupil_id"><br><br>

    <label>Parent:</label><br>
    <input type="number" name="parent_id"><br><br>

    <input type="submit" name="submit" value="Add PupilParent">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    
    if (empty($_POST["pupil_id"]) && !is_numeric($_POST["pupil_id"])){
        echo "Pupil ID must have a value which is a number<br>";
        die();
    }
    if (empty($_POST["parent_id"]) && !is_numeric($_POST["parent_id"])){
        echo "Parent ID must have a value which is a number<br>";
        die();
    }

    $pupil_id = $_POST["pupil_id"];
    $parent_id = $_POST["parent_id"];


    $query = "
        INSERT INTO PupilParent
        (pupil_id, parent_id)
        VALUES
        ($pupil_id, $parent_id)
    ";

    if (mysqli_query($conn, $query)) {
        echo "Pupil Parent added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>