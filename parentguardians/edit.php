<?php
require "../config.php";

if (!isset($_GET["id"])){
    echo "No parentguardian ID provided";
    die();
}
$parent_id = $_GET["id"];

$query = "SELECT * FROM ParentGuardian WHERE parent_id = $parent_id";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)==0){
    echo "No ParentGuardian found";
    die();
}
$ParentGuardian =  mysqli_fetch_array($result);
?>
<html>
<body>
<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?php echo $ParentGuardian['name']; ?>"><br><br>

    <label>Address:</label><br>
    <input type="text" name="address" value="<?php echo $ParentGuardian['address']; ?>"><br><br>

    <label>Phone number:</label><br>
    <input type="tel" name="phone_number" value="<?php echo $ParentGuardian['phone_number']; ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo $ParentGuardian['email']; ?>"><br><br>

    <input type="submit" name="submit" value="Update ParentGuardian">
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
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    // isset - checks whether a variable is set, which means that it has to be declared and is not NULL

    $query = "
    UPDATE ParentGuardian
        SET
            name = '$name',
            address = '$address',
            phone_number = '$phone_number',
            email = '$email'
         WHERE parent_id = $parent_id
    ";

    if (mysqli_query($conn, $query)) {
        echo "ParentGuardian updated successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

</body>
</html>