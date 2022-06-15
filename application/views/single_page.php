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
$id=$_GET['id'];
$sql = "SELECT * FROM savsoft_users WHERE uid='".$uid."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

echo "<div class='container'>";

echo "<table class='table table-bordered'>";
  echo "<tr>";
  echo "<td width='300px'>Student name: </td><td>" . $row["first_name"]. " &nbsp;" . $row["last_name"]. " " . $row["lastname"]. "</td>";
echo "</table>";

}
} else {
  echo "0 results";
}
$conn->close();

?>
</div>
