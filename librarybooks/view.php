<?php
require "../config.php";
?>

<html>
<body>

<h2>View libary book</h2>
<?php

$query = "SELECT * FROM LibraryBook";
$result = mysqli_query($conn, $query);

if(!$result){
    echo "Error: " . mysqli_error($conn);
    die();
}

if(mysqli_num_rows($result)==0){
    echo "No library book found";
} else {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Library Book ID</th>";
    echo "<th>Name</th>";
    echo "<th>release_date</th>";
    echo "<th>return_date</th>";
    echo "<th>Pupil_id</th>";
    echo "<th>Actions</th>";
    echo "<th>Delete</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>". $row["library_book_id"]."</td>";
        echo "<td>". $row["name"]."</td>";
        echo "<td>". $row["release_date"]."</td>";
        echo "<td>". $row["return_date"]."</td>";
        echo "<td>". $row["pupil_id"]."</td>";
        echo "<td><a href='edit.php?id=" .$row["library_book_id"]. "'>Edit</a></td>";
        echo "<td><a href='delete.php?id=" .$row["library_book_id"]. "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
</body>
</html>