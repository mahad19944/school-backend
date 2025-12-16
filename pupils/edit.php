<?php
require "../config.php";

if (!isset($_GET["id"])){
    echo "No Pupil ID provided";
    die();
}
$pupil_id = $_GET["id"];

$query = "SELECT * FROM Pupil WHERE pupil_id = $pupil_id";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)==0){
    echo "No pupil found";
    die();
}
$pupil =  mysqli_fetch_array($result);
?>
<html>
<body>
<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?php echo $pupil['name']; ?>"><br><br>

    <label>Age:</label><br>
    <input type="number" name="age" value="<?php echo $pupil['age']; ?>"><br><br>

    <label>Address:</label><br>
    <input type="text" name="address" value="<?php echo $pupil['address']; ?>"><br><br>

    <label>medical_info:</label><br>
    <input type="text" name="medical_info" value="<?php echo $pupil['medical_info']; ?>"><br><br>

    <label>class_id:</label><br>
    <input type="number" name="class_id" value="<?php echo $pupil['class_id']; ?>"><br><br>

    <label>
    <input type="checkbox" name="free_school_meals" <?php if ($pupil['free_school_meals']==1) echo "checked" ?>>
     freeschoolmeals
    </label><br><br>


    <input type="submit" name="submit" value="Update pupil">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    if (empty($_POST["name"])) {
        echo "Name cannot be empty<br>";
        die();
    }

    if (!is_numeric($_POST["age"])) {
        echo "Age must be a number<br>";
        die();
    }

    if (empty($_POST["address"])) {
        echo "Address cannot be empty<br>";
        die();
    }

    $name = $_POST["name"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $medical_info = $_POST["medical_info"];
    $free_school_meals = isset($_POST["free_school_meals"]) ? 1 : 0;
    $class_id= $_POST["class_id"];
    // isset - checks whether a variable is set, which means that it has to be declared and is not NULL

    $query = "
        UPDATE Pupil
        SET
            name = '$name',
            age = $age,
            address = '$address',
            medical_info = '$medical_info',
            free_school_meals = $free_school_meals,
            class_id = $class_id
        WHERE pupil_id = $pupil_id
    ";

    if (mysqli_query($conn, $query)) {
        echo "pupil updated successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>