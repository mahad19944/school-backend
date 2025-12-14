<?php 
require "../config.php";
?>

<html>
<body>

<h2>View Teaching Assistant</h2>

<?php
$query = "SELECT * FROM TeachingAssistant";
$result = mysqli_query($conn,$query);

if(!$result){
    echo "Error: ". mysqli_error($conn);
    die();
}
if(mysqli_num_rows($result)==0){
    echo "No teaching assistants found";
} else {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Teaching Assistant ID</th>";
    echo "<th>Name</th>";
    echo "<th>Age</th>";
    echo "<th>Address</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Email</th>";
    echo "<th>Salary</th>";
    echo "<th>Background Check</th>";
    echo "</tr>";

    while($row = mysqli_fetch_array($result)){
         echo "<tr>";
        echo "<td>". $row["teaching_assistant_id"]."</td>";
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
        echo "</tr>";

    }
    echo "</table>";
}
?>

</body>
</html>