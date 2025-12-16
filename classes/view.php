<?php
require "../config.php";
?>

<html>
<body>

<h2>View Class</h2>
<?php
$query = "SELECT * FROM Class";
$result = mysqli_query($conn, $query);

if(!$result){
    echo "Error: " . mysqli_error($conn);
    die();
}

if(mysqli_num_rows($result)==0){
    echo "No class fo";
} else{
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>class ID</th>";
    echo "<th>Name</th>";
    echo "<th>capacity</th>";
    echo "<th>teacher_id</th>";
    echo "<th>teaching_assistant_id</th>";
    echo "<th>Actions</th>";
    echo "<th>Delete</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>". $row["class_id"]."</td>";
        echo "<td>". $row["name"]."</td>";
        echo "<td>". $row["capacity"]."</td>";
        echo "<td>". $row["teacher_id"]."</td>";
        echo "<td>". $row["teaching_assistant_id"]."</td>";
        echo "<td><a href='edit.php?id=" .$row["class_id"]. "'>Edit</a></td>";
        echo "<td><a href='delete.php?id=" .$row["class_id"]. "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
</body>
</html>