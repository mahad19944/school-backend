<?php
require "../config.php";
?>

<html>
<body>

<h2>View pupil</h2>
<?php
$query = "SELECT * FROM Pupil";
$result = mysqli_query($conn, $query);

if(!$result){
    echo "Error: " . mysqli_error($conn);
    die();
}

if(mysqli_num_rows($result)==0){
    echo "No pupil found";
} else{
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>pupil ID</th>";
    echo "<th>Name</th>";
    echo "<th>Age</th>";
    echo "<th>Address</th>";
    echo "<th>medical_info</th>";
    echo "<th>freeschoolmeals</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>". $row["pupil_id"]."</td>";
        echo "<td>". $row["name"]."</td>";
        echo "<td>". $row["age"]."</td>";
        echo "<td>". $row["address"]."</td>";
        echo "<td>". $row["medical_info"]."</td>";
        echo "<td>". $row["freeschoolmeals"]."</td>";
       
        if($row["freeshcoolmeals"]==1){
            echo "<td>Yes</td>";
        }
        echo "</tr>";

    }
    echo "</table>";

}
?>