<?php
require "../config.php";

if (!isset($_GET["id"])){
    echo "No teaching Assistant ID provided";
    die();
}
$teaching_assistant_id = $_GET["id"];

$query = "SELECT * FROM TeachingAssistant WHERE teaching_assistant_id = $teaching_assistant_id";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)==0){
    echo "No teaching assistant found";
    die();
}
$teachingAssistant =  mysqli_fetch_array($result);
?>
<html>
<body>
<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?php echo $teachingAssistant['name']; ?>"><br><br>

    <label>Age:</label><br>
    <input type="number" name="age" value="<?php echo $teachingAssistant['age']; ?>"><br><br>

    <label>Address:</label><br>
    <input type="text" name="address" value="<?php echo $teachingAssistant['address']; ?>"><br><br>

    <label>Phone number:</label><br>
    <input type="tel" name="phone_number" value="<?php echo $teachingAssistant['phone_number']; ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo $teachingAssistant['email']; ?>"><br><br>

    <label>Salary:</label><br>
    <input type="number" name="salary" value="<?php echo $teachingAssistant['salary']; ?>"><br><br>

    <label>
        <input type="checkbox" name="background_check" <?php if ($teachingAssistant['background_check']==1) echo "checked" ?>>
        Background Check
    </label><br><br>

    <input type="submit" name="submit" value="Update Teaching assistant">
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

    if (!is_numeric($_POST["salary"])) {
        echo "Salary must be a number<br>";
        die();
    }

    $name = $_POST["name"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $salary = $_POST["salary"];
    $background_check = isset($_POST["background_check"]) ? 1 : 0;
    // isset - checks whether a variable is set, which means that it has to be declared and is not NULL

    $query = "
        UPDATE TeachingAssistant
        SET
            name = '$name',
            age = $age,
            address = '$address',
            phone_number = '$phone_number',
            email = '$email',
            salary = '$salary',
            background_check = '$background_check'
        WHERE teaching_assistant_id = $teaching_assistant_id
    ";

    if (mysqli_query($conn, $query)) {
        echo "Teaching Assistant updated successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>