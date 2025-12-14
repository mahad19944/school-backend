<?php
require "../config.php";
?>

<html>
<body>

<h2>Add Teacher</h2>


<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>Age:</label><br>
    <input type="number" name="age"><br><br>

    <label>Address:</label><br>
    <input type="text" name="address"><br><br>

    <label>Phone number:</label><br>
    <input type="tel" name="phone_number"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Salary:</label><br>
    <input type="number" name="salary"><br><br>

    <label>
        <input type="checkbox" name="background_check">
        Background Check
    </label><br><br>

    <input type="submit" name="submit" value="Add Teacher">
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
        INSERT INTO Teacher
        (name, age, address, phone_number, email, salary, background_check)
        VALUES
        ('$name', $age, '$address', '$phone_number', '$email', $salary,$background_check)
    ";

    if (mysqli_query($conn, $query)) {
        echo "Teacher added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>