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
// $uid="1";
$id=$_GET['rid'];
$uuuid=$_GET['uuuid'];

$sql = "SELECT savsoft_users.first_name, savsoft_users.last_name, savsoft_group.group_name, savsoft_quiz.quiz_name, savsoft_result.percentage_obtained FROM savsoft_result 
JOIN savsoft_users ON savsoft_users.uid=savsoft_result.uid
JOIN savsoft_group ON savsoft_users.gid=savsoft_group.gid
JOIN savsoft_quiz ON savsoft_result.quid=savsoft_quiz.quid
WHERE rid='".$uuuid."'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  
    if($this->session->userdata('logged_in')){
      $sql4 = "SELECT SUM(savsoft_answers.score_u) as tt, COUNT(savsoft_answers.score_u) as cc FROM savsoft_answers 
WHERE savsoft_answers.rid=$uuuid
";

$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$resid=$row4["tt"];
$cc=$row4["cc"];

echo "<div class='container'><a style='text-align:right' href='#'>Print</a> OR  <a href='#'>Email</a>";
echo "<h4>Student Result</h4>";
echo "<table class='table table-bordered'>";
  echo "<tr>";
  echo "<td width='300px'>Student name: </td><td>" . $row["first_name"]. " &nbsp;" . $row["last_name"]. " </td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td width='300px'>Class: </td><td>" . $row["group_name"].  " </td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td width='300px'>Exam/Subject: </td><td>" . $row["quiz_name"].  " </td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td width='300px'>Total Score: </td><td><b>" . $resid. " ". " out of ". "$cc" . "</b></td>";
  echo "</tr>";

echo "</table>";

}
}
} else {
  echo "0 results";
}
  
// echo "HI:" . $uuuid;
$conn->close();

?>
<?php
$link = mysqli_connect("localhost", "voseji", "2wsxzaQ1!s", "cbt_software");

if ($link === false) {
	die("ERROR: Could not connect. "
				.mysqli_connect_error());
}
$i=1;
$sql2 = "SELECT savsoft_answers.uid, savsoft_answers.qid, savsoft_qbank.question FROM savsoft_answers
JOIN savsoft_qbank ON savsoft_qbank.qid=savsoft_answers.qid
WHERE rid='".$uuuid."'

";
if ($res = mysqli_query($link, $sql2)) {
	if (mysqli_num_rows($res) > 0) {

  

		echo "<table class='table table-bordered'>";
		echo "<tr>";
		echo "<th>#</th>";
    echo "<th>Question Asked:</th>";
    echo "<th>Answer Given:</th>";
    echo "<th>Score:</th>";
		echo "</tr>";
		while ($row = mysqli_fetch_array($res)) {
      $qq=$row['qid'];
      $tr=$row['uid'];

$sql3 = "SELECT savsoft_answers.qid, savsoft_answers.score_u, savsoft_options.q_option FROM savsoft_answers 
JOIN savsoft_options ON savsoft_options.oid=savsoft_answers.q_option 
WHERE savsoft_answers.qid=$qq AND savsoft_answers.uid=$tr
";

$result3=mysqli_query($link,$sql3);
$row3=mysqli_fetch_assoc($result3);
$q_option=$row3["q_option"];
$score=$row3["score_u"];


			echo "<tr>";
			echo "<td>".$i++."</td>";
      echo "<td>".$row['question']."</td>";
      echo "<td>".$q_option."</td>";
      echo "<td>".$score."</td>";
			echo "</tr>";
		}
		echo "</table>";
		// mysqli_free_res($res);
	}
	else {
		echo "No matching records are found.";
	}
}
else {
	echo "ERROR: Could not able to execute $sql. "
								.mysqli_error($link);
}
mysqli_close($link);
?>

</div>
