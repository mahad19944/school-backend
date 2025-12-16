<?php
require "../config.php";

if (!isset($_GET["id"])){
    echo "No PupilParent ID provided";
    die();
}
$pupil_id = $_GET["id"];


$query = "SELECT * FROM  PupilParent WHERE  PupilParent_id = $PupilParent_id;
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)==0){
    echo " no pupilparent found";
    die();
}
$PUPILPARENT =  mysqli_fetch_array($result);
?>
<html>
<body>
<form method="POST">
    <label>Name:</label><br>
    <input type="number" name="class_id" value="<?php echo $PUPILPARENT['class_id']; ?>"><br><br>

    <label>Address:</label><br>
    <input type="number" name="parent_id" value="<?php echo $PUPILPARENT['parent_id']; ?>"><br><br>
   
    <input type="submit" name="submit" value="Update PupilParent">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    if (!is_numeric($_POST["class_id"])) {
        echo "class_id must be a number<br>";
        die();
    }

    if (!is_numeric($_POST["pupil_id"])) {
        echo "pupil_id must be a number<br>";
        die();
    }

    $pupil_id = $_POST["pupil_id"];
    $parent_id = $_POST[|parent_id"];
   
    // isset - checks whether a variable is set, which means that it has to be declared and is not NULL

    $query = "
    UPDATE PupilParent
        SET
            pupil_id = $pupil_id,
            parent_id = $parent_id
         WHERE PupilParent = $PupilParent
    ";

    if (mysqli_query($conn, $query)) {
        echo "PupilParent updated successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>