<?php
require "../config.php";
?>

<html>
<body>

<h2>Add Parent/Guardian</h2>

<!-- CREATE TABLE ParentGuardian(
    parent_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    address VARCHAR(30),
    email VARCHAR(30),
    phone_number VARCHAR(30) 
); -->

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>Address:</label><br>
    <input type="text" name="address"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Phone number:</label><br>
    <input type="tel" name="phone_number"><br><br>

    <input type="submit" name="submit" value="Add Parent/Guardian">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    if (empty($_POST["name"])) {
        echo "Name cannot be empty<br>";
        die();
    }

    if (empty($_POST["address"])) {
        echo "Address cannot be empty<br>";
        die();
    }
    


    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];

    $query = "
        INSERT INTO ParentGuardian
        (name, address, email, phone_number)
        VALUES
        ('$name', '$address', '$email', '$phone_number')
    ";

    if (mysqli_query($conn, $query)) {
        echo "Parent/Guardian added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>