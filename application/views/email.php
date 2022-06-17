<?php


include_once ("./socketlabs-php-main/InjectionApi/src/includes.php");
//or if using composer: include_once ('./vendor/autoload.php'); 

use Socketlabs\SocketLabsClient;
use Socketlabs\Message\BasicMessage;
use Socketlabs\Message\EmailAddress;

$serverId = 36540;
$injectionApiKey = "Sp85Ngd6DGo7x3XBj9b4";
$email="vctroseji@gmail.com";
$client = new SocketLabsClient($serverId, $injectionApiKey);
// $fullname="{$fname} {$sname} {$otname}";
$message = new BasicMessage(); 

$message->subject = "Blooms Academy, Abuja - Student Result Sheet";
$message->htmlBody = "<html>
<p><img src='#' width='30%'  height='30%'>&nbsp;&nbsp; &nbsp;<img src='https://emge.emgeresources.com/administrator/img/FMOH-Logo.png' width='20%'  height='20%'></p>
<p>
Dear Parent/Guardian,
<br/></br><br/>
Please see below your child/ward's examination result:
<br/><br/></br>

<h4>Your Patient ID is: $loc_id$pat_id</h4><br/>

Please walk in to any of the following hospital and use the unique ID above to benefit from quality chemotherapy drugs at accessible prices:
<br/></br>
<table border='1' style='border-collapse:collapse'>
<tr>
<td>S/N</td><td>Hospital</td>
</tr>
<tr>
<td>1. </td><td>National Hospital, Abuja</td>
</tr>
<tr>
<td>2. </td><td>Ahmadu Bello University Teaching Hospital, Zaria</td>
</tr>
<tr>
<td>3. </td><td>Aminu Kano Teaching Hospital, Kano</td>
</tr>
<tr>
<td>4. </td><td>Lagos University Teaching Hospital, Lagos</td>
</tr>
<tr>
<td>5. </td><td>Obafemi Awolowo University Teaching Hospital, Ile Ife</td>
</tr>
<tr>
<td>6. </td><td>University College Hospital, Ibadan</td>
</tr>
<tr>
<td>7. </td><td>University of Nigeria Teaching Hospital, Enugu</td>
</tr>

<tr>
<td>8. </td><td>University of Ilorin teaching Hospital, Ilorin</td>
</tr>

<tr>
<td>9. </td><td>University of Benin teaching Hospital, Benin</td>
</tr>

<tr>
<td>10. </td><td>National Hospital, Abuja</td>
</tr>

<tr>
<td>11. </td><td>University of Calabar teaching Hospital, Calabar</td>
</tr>

<tr>
<td>12. </td><td>University of Port Harcourt teaching Hospital, Port Harcourt</td>
</tr>
</h4>
</table>
<br/><br/>

If you have any concerns or complaints, please call: 08060708414

<br/><br/><br/><br/>

EMGE Resources Ltd.


</html>";
//$message->plainTextBody = "This is the Plain Text Body of my message.";

$message->from = new EmailAddress("vctroseji@gmail.com", "Blooms Academy Email Notification System");
$message->addToAddress("$email", "");
//$message->addToAddress("$roche", "Roche Rep");
 
$response = $client->send($message);

if($message){
    $status = 'ok';
}else{
    $status = 'err';
}

// Output status
echo $status; 

?>