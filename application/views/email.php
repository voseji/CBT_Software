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
$uuuid=$_GET['uuuid'];

include_once ("./socketlabs-php-main/InjectionApi/src/includes.php");
//or if using composer: include_once ('./vendor/autoload.php'); 

use Socketlabs\SocketLabsClient;
use Socketlabs\Message\BasicMessage;
use Socketlabs\Message\EmailAddress;

$serverId = 36540;
$injectionApiKey = "Sp85Ngd6DGo7x3XBj9b4";
// $email="vctroseji@gmail.com";
$client = new SocketLabsClient($serverId, $injectionApiKey);
// $fullname="{$fname} {$sname} {$otname}";
$message = new BasicMessage(); 

$uuuid=$_GET['uuuid'];

$sql = "SELECT savsoft_users.email, savsoft_users.first_name, savsoft_users.last_name, savsoft_group.group_name, savsoft_quiz.quiz_name, savsoft_result.percentage_obtained FROM savsoft_result 
JOIN savsoft_users ON savsoft_users.uid=savsoft_result.uid
JOIN savsoft_group ON savsoft_users.gid=savsoft_group.gid
JOIN savsoft_quiz ON savsoft_result.quid=savsoft_quiz.quid
WHERE rid='".$uuuid."'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $lastname=$row['last_name'];
    $firstname=$row['first_name'];
    $class=$row["group_name"];
    $subject=$row["quiz_name"];
    $email=$row["email"];

// if($this->session->userdata('logged_in')){
$sql4 = "SELECT SUM(savsoft_answers.score_u) as tt, COUNT(savsoft_answers.score_u) as cc FROM savsoft_answers
WHERE savsoft_answers.rid=$uuuid
";

$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$resid=$row4["tt"];
$cc=$row4["cc"];
// $lastname=$row4['last_name'];

}

} else {
  echo "0 results";
}
  

$i=1;
$sql2 = "SELECT savsoft_answers.uid, savsoft_answers.qid, savsoft_qbank.question FROM savsoft_answers
JOIN savsoft_qbank ON savsoft_qbank.qid=savsoft_answers.qid
WHERE rid='".$uuuid."'

";
if ($res = mysqli_query($conn, $sql2)) {
	if (mysqli_num_rows($res) > 0) {

        while ($row2 = mysqli_fetch_array($res)) {
            $qq=$row2['qid'];
            $tr=$row2['uid'];
            $question=$row2['question'];

$sql3 = "SELECT savsoft_answers.qid, savsoft_answers.score_u, savsoft_options.q_option FROM savsoft_answers 
JOIN savsoft_options ON savsoft_options.oid=savsoft_answers.q_option 
WHERE savsoft_answers.qid=$qq AND savsoft_answers.uid=$tr
";

$result3=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_assoc($result3);
$q_option=$row3["q_option"];
$score=$row3["score_u"];

}

// mysqli_free_res($res);
}
else {
echo "No matching records are found.";
}
}
else {
echo "ERROR: Could not able to execute $sql2. "
                        .mysqli_error($conn);
}


$message->subject = "Blooms Academy, Abuja - Student Result Sheet";
$message->htmlBody = 
"<html>
<h4>Student Result</h4>
<table class='table table-bordered' border='1' style='border-collapse:collapse'>
<tr>
<td width='300px'>Student ID: </td><td colspan='3'>" . $uuuid.  " </td>
</tr>
<tr>
<td width='300px'>Student name: </td><td colspan='3'>" . $lastname. " &nbsp;" . $firstname. " </td>
</tr>
<tr>
<td width='300px'>Class: </td><td colspan='3'>" . $class.  " </td>
</tr>
<tr>
<td width='300px'>Exam/Subject: </td><td colspan='3'>" . $subject.  " </td>
</tr>
<tr>
<td width='300px'>Total Score: </td><td colspan='3'><b>" . $resid. " ". " out of ". "$cc" . "</b></td>
</tr>

</table>
Kindly visit <a href='https://bloomsacademy.org'>School portal to see detailed report of this assessment</a>
<br/><br/>

    




</html>
";
//$message->plainTextBody = "This is the Plain Text Body of my message.";

$message->from = new EmailAddress("vctroseji@gmail.com", "Blooms Academy Email Notification System");
$message->addToAddress("$email", "");
//$message->addToAddress("$roche", "Roche Rep");
 
$response = $client->send($message);

if($message){
    $status = 'Email sent! ';
}else{
    $status = 'err';
}

// Output status
echo $status; 

?>