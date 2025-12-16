<?php 
require "../config.php";
?>

<html>
<body>

<h2>View Teacher</h2>
<?php
$query = "SELECT * FROM Teacher";
$result = mysqli_query($conn, $query);

if(!$result){
    echo "Error: " . mysqli_error($conn);
    die();
}

if(mysqli_num_rows($result)==0){
    echo "no teacher found";
    // '<script>alert("No teacher found")</script>';
} else{
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Teacher ID</th>";
    echo "<th>Name</th>";
    echo "<th>Age</th>";
    echo "<th>Address</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Email</th>";
    echo "<th>Salary</th>";
    echo "<th>Background Check</th>";
    echo "<th>Actions</th>";
    echo "<th>Delete</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>". $row["teacher_id"]."</td>";
        echo "<td>". $row["name"]."</td>";
        echo "<td>". $row["age"]."</td>";
        echo "<td>". $row["address"]."</td>";
        echo "<td>". $row["phone_number"]."</td>";
        echo "<td>". $row["email"]."</td>";
        echo "<td>". $row["salary"]."</td>";
        if($row["background_check"]==1){
            echo "<td>Yes</td>";
        } else{
            echo "<td>No</td>";
        }
        echo "<td><a href='edit.php?id=" .$row["teacher_id"]. "'>Edit</a></td>";
        echo "<td><a href='delete.php?id=" .$row["teacher_id"]. "'>Delete</a></td>";
        echo "</tr>";

    }
    echo "</table>";

}
?>

</body>
</html>