<?php
require "../config.php";
?>

<html>
<body>

<h2>View registration</h2>
<?php
$query = "SELECT * FROM Registration";
$result = mysqli_query($conn, $query);

if(!$result){
    echo "Error: " . mysqli_error($conn);
    die();
}

if(mysqli_num_rows($result)==0){
    echo "No registration found";
} else{
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>registration ID</th>";
    echo "<th>session</th>";
    echo "<th>register_date</th>";
    echo "<th>attendance</th>";
    echo "<th>reason</th>";
    echo "<th>class_id</th>";
    echo "<th>pupil_id</th>";
    echo "<th>Actions</th>";
    echo "<th>Delete</th>";
    echo "</tr>";


    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>". $row["registration_id"]."</td>";
        echo "<td>". $row["session"]."</td>";
        echo "<td>". $row["register_date"]."</td>";
        echo "<td>". $row["attendance"]."</td>";
        echo "<td>". $row["reason"]."</td>";
        echo "<td>". $row["class_id"]."</td>";
        echo "<td>". $row["pupil_id"]."</td>";
        echo "<td><a href='edit.php?id=" .$row["registration_id"]. "'>Edit</a></td>";
        echo "<td><a href='delete.php?id=" .$row["registration_id"]. "'>Delete</a></td>";
        echo "</tr>";

    }
    echo "</table>";

}
?>