<?php
$servername = "sql211.infinityfree.com";
$username = "if0_42442444";
$password = "WOGvASc6dveNzd7";
$dbname = "if0_42442444_myfrist";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data
if(isset($_GET['name']) && isset($_GET['age'])){

    $name = $_GET['name'];
    $age = $_GET['age'];

    $sql = "INSERT INTO user (name, age) VALUES ('$name','$age')";

    $conn->query($sql);
}

// Display data
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

echo "<table border='1'>";
echo "<tr>
<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>Status</th>
<th>Action</th>
</tr>";

while($row = $result->fetch_assoc()){

    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['age']."</td>";
    echo "<td>".$row['status']."</td>";
    echo "<td><a href='toggle.php?id=".$row['id']."'>Toggle</a></td>";
    echo "</tr>";
}

echo "</table>";

$conn->close();
?>