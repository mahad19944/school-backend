<?php
require "../config.php";
?>

<html>
<body>

<h2>View pupil</h2>
<?php
$query = "SELECT * FROM PupilParent";
$result = mysqli_query($conn, $query);

if(!$result){
    echo "Error: " . mysqli_error($conn);
    die();
}

if(mysqli_num_rows($result)==0){
    echo "No parent and pupil found";
} else{
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Pupil ID</th>";
    echo "<th>Parent ID</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>". $row["pupil_id"]."</td>";
        echo "<td>". $row["parent_id"]."</td>";
        echo "</tr>";

    }
    echo "</table>";

}
?>