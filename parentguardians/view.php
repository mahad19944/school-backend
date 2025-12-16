<?php
require "../config.php";
?>

<html>
<body>

<h2>View parent/guardian</h2>
<?php
$query = "SELECT * FROM ParentGuardian";
$result = mysqli_query($conn, $query);

if(!$result){
    echo "Error: " . mysqli_error($conn);
    die();
}

if(mysqli_num_rows($result)==0){
    echo "No parent/guardian found";
} else{
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>parent ID</th>";
    echo "<th>Name</th>";
    echo "<th>address</th>";
    echo "<th>email</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Actions</th>";
    echo "<th>Delete</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>". $row["parent_id"]."</td>";
        echo "<td>". $row["name"]."</td>";
        echo "<td>". $row["address"]."</td>";
        echo "<td>". $row["email"]."</td>";
        echo "<td>". $row["phone_number"]."</td>";
        echo "<td><a href='edit.php?id=" .$row["parent_id"]. "'>Edit</a></td>";
        echo "<td><a href='delete.php?id=" .$row["parent_id"]. "'>Delete</a></td>";
        echo "</tr>";

    }
    echo "</table>";

}
?>
</body>
</html>
