<?php
require "../config.php";

if (!isset($_GET["id"])){
    echo "no registration ID provided";
    die();
}
$registration_id = $_GET["id"];

$query = "SELECT * FROM Registration WHERE registration_id = $registration_id";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)==0){
    echo "no registration found";
    die();
}
$registration =  mysqli_fetch_array($result);
?>
<html>
<body>
<form method="POST">
    <label>session:</label><br>
    <input type="text" name="session" value="<?php echo $registration['session']; ?>"><br><br>

    <label>registration_date:</label><br>
    <input type="date" name="register_date" value="<?php echo $registration['register_date']; ?>"><br><br>

    <label>attendance:</label><br>
    <input type="text" name="attendance" value="<?php echo $registration['attendance']; ?>"><br><br>

    <label>reason:</label><br>
    <input type="text" name="reason" value="<?php echo $registration['reason']; ?>"><br><br>
   
    <label>class_id:</label><br>
    <input type="number" name="class_id" value="<?php echo $registration['class_id']; ?>"><br><br>

    <label>pupil_id:</label><br>
    <input type="number" name="pupil_id" value="<?php echo $registration['pupil_id']; ?>"><br><br>



    <input type="submit" name="submit" value="Update registration">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    if (empty($_POST["register_date"])) {
        echo "register date cannot be empty<br>";
        die();
    }

    // if (!is_text($_POST["reason"])) {
    //     echo "reason must be text<br>";
    //     die();
    // }

    if (empty($_POST["class_id"])) {
        echo "class_id cannot be empty<br>";
        die();
    }

    if (!is_numeric($_POST["pupil_id"])) {
        echo "pupil_id must be a number<br>";
        die();
    }

    $session = $_POST["session"];
    $register_date = $_POST["register_date"];
    $attendance = $_POST["attendance"];
    $reason = $_POST["reason"];
    $class_id = $_POST["class_id"];
    $pupil_id = $_POST["pupil_id"];
    // isset - checks whether a variable is set, which means that it has to be declared and is not NULL

    $query = "
        UPDATE Registration
        SET
            session = '$session',
            register_date= '$register_date',
            attendance = '$attendance',
            reason = '$reason',
            class_id = $class_id,
            pupil_id = $pupil_id
         WHERE registration_id = $registration_id
    ";

    if (mysqli_query($conn, $query)) {
        echo "registration successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>