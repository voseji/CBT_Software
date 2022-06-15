<?php
$servername = "localhost";
$username = "voseji";
$password = "2wsxzaQ1!s";
$dbname = "cbt_software";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$uid="1";
$id=$_GET['rid'];
$uuuid=$_GET['uuuid'];

$sql = "SELECT savsoft_users.first_name, savsoft_users.last_name  FROM savsoft_result 
JOIN savsoft_users ON savsoft_users.uid=savsoft_result.uid
WHERE rid='".$uuuid."'";

// $sql = "SELECT uid FROM savsoft_result 

// WHERE rid='".$id."'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

echo "<div class='container'>";
echo "<h4>Student Result</h4>";
echo "<table class='table table-bordered'>";
  echo "<tr>";
  echo "<td width='300px'>Student name: </td><td>" . $row["first_name"]. " &nbsp;" . $row["last_name"]. " </td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td width='300px'>Class: </td><td>" . $row["first_name"]. " &nbsp;" . $row["last_name"]. " </td>";
echo "</table>";

}
} else {
  echo "0 results";
}
// echo "HI:" . $uuuid;
$conn->close();

?>
</div>
