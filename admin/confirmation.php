<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include 'includes/session.php';

if(isset($_POST['reservation_id'])){
$reservation_id = $_POST['reservation_id'];

$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM reservation where reservation_id = '$reservation_id'");
$stmt->execute(['reservation_id' => $reservation_id]);
foreach($stmt as $row){
$user_pets_id  = $row['user_pets_id'];
$id_services = $row['id_services'];
$thedate = $row['thedate'];
$time_reservation = $row['time_reservation'];
	$stmt = $conn->prepare("SELECT * FROM services where id_services = '$id_services'");
	$stmt->execute();
	foreach($stmt as $row2){
				}
				if($service_id == "0"){
					$name = ' Veterinary Health Care';
				}
				else{
					$name = $row2['name'];
				}
		$stmt = $conn->prepare("SELECT * FROM user_pets where user_pets_id = '$user_pets_id'");
		$stmt->execute();
		foreach($stmt as $trow){
		$id_cust  = $trow['id_cust'];
		$id_pet  = $trow['id_pet'];
		}
			$stmt = $conn->prepare("SELECT * FROM users where id_cust = '$id_cust'");
			$stmt->execute();
			foreach($stmt as $trows){
			$firstname  = $trows['firstname'];
			$email  = $trows['email'];
			}	
				$stmt = $conn->prepare("SELECT * FROM pets where id_pet = '$id_pet'");
				$stmt->execute();
				foreach($stmt as $trowss){
				$pet_name  = $trowss['pet_name'];
				}	
}
}


if(isset($_POST['edit'])){
$st = $_POST['status'];
if($st=="Confirm")
{
try{
$stmt = $conn->prepare("UPDATE reservation SET status='$st' where reservation_id = $reservation_id");
$stmt->execute(['status'=>$st]);
$message = "
<h2>SEE YOU SOON!</h2>
<p>Hey ".$firstname."! Your reservation request for your pet ".$pet_name." has been confirmed. We look forward to seeing you soon.</p>
<p><b>RESERVATION DETAILS</b></p>
<p>SERVICE NAME: ".$name."</p>
<p>DATE: ".date('M. d, Y', strtotime($thedate))."</p>
<p>TIME: ".$time_reservation."</p>
<p>Best wishes,</p>
<p><b>STELLA'S ANIMAL CLINIC</b></p>
";
require 'vendor/autoload.php';
$mail = new PHPMailer(true);                       
try {
//Server settings
$mail->isSMTP();                                     
$mail->Host = 'smtp.gmail.com';                      
$mail->SMTPAuth = true;                               
$mail->Username = 'stellasanimalclinic.ask@gmail.com';     
$mail->Password = 'andreacapistrano123';                    
$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);                         
$mail->SMTPSecure = 'ssl';                           
$mail->Port = 465;                                   

$mail->setFrom('stellasanimalclinic.ask@gmail.com');

//Recipients
$mail->addAddress($email);              
$mail->addReplyTo('stellasanimalclinic.ask@gmail.com');

//Content
$mail->isHTML(true);                                  
$mail->Subject = "STELLA'S ANIMAL CLINIC (ONLINE RESERVATION)";
$mail->Body    = $message;

$mail->send();

unset($_SESSION['email']);

$_SESSION['success'] = 'Confirmation Successful!';
header('location: reservations.php');
} 
catch (Exception $e) {
$_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
var_dump( $_SESSION['error']);
}	
}
catch(PDOException $e){
$_SESSION['error'] = $e->getMessage();
}
}
$pdo->close();

$st1 = $_POST['status'];
if($st1=="Decline")
{
try{
$stmt = $conn->prepare("UPDATE reservation SET status='$st1' where reservation_id = $reservation_id");
$stmt->execute(['status'=>$st]);
$message = "
<h2>WE'RE SORRY!</h2>
<p>Hey ".$firstname."! Your reservation request for your pet ".$pet_name." has been declined. We look forward for your next appointment request.</p>
<p><b>RESERVATION DETAILS</b></p>
<p>SERVICE NAME: ".$name."</p>
<p>DATE: ".date('M. d, Y', strtotime($thedate))."</p>
<p>TIME: ".$time_reservation."</p>
<p>Best wishes,</p>
<p><b>STELLA'S ANIMAL CLINIC</b></p>
";
require 'vendor/autoload.php';
$mail = new PHPMailer(true);                       
try {
//Server settings
$mail->isSMTP();                                     
$mail->Host = 'smtp.gmail.com';                      
$mail->SMTPAuth = true;                               
$mail->Username = 'stellasanimalclinic.ask@gmail.com';     
$mail->Password = 'andreacapistrano123';                    
$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);                         
$mail->SMTPSecure = 'ssl';                           
$mail->Port = 465;                                   

$mail->setFrom('stellasanimalclinic.ask@gmail.com');

//Recipients
$mail->addAddress($email);              
$mail->addReplyTo('stellasanimalclinic.ask@gmail.com');

//Content
$mail->isHTML(true);                                  
$mail->Subject = "STELLA'S ANIMAL CLINIC (ONLINE RESERVATION)";
$mail->Body    = $message;

$mail->send();

unset($_SESSION['email']);

$_SESSION['success'] = 'Confirmation Successful!';
header('location: reservations.php');
} 
catch (Exception $e) {
$_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
var_dump( $_SESSION['error']);
}	
}
catch(PDOException $e){
$_SESSION['error'] = $e->getMessage();
}
}
$pdo->close();

$st2 = $_POST['status'];
if($st2=="Reschedule")
{
try{
$stmt = $conn->prepare("UPDATE reservation SET status='$st1' where reservation_id = $reservation_id");
$stmt->execute(['status'=>$st]);
$message = "
<h2>RESCHEDULE APPOINTMENT!</h2>
<p>".$firstname."! Your reservation request for your pet ".$pet_name." has been cancelled/postponed. Please update your reservation info if you want to continue the service. We sincerely apologize for the inconvenience.</p>
<p><b>RESERVATION DETAILS</b></p>
<p>SERVICE NAME: ".$name."</p>
<p>DATE: ".date('M. d, Y', strtotime($thedate))."</p>
<p>TIME: ".$time_reservation."</p>
<p>Best wishes,</p>
<p><b>STELLA'S ANIMAL CLINIC</b></p>
";
require 'vendor/autoload.php';
$mail = new PHPMailer(true);                       
try {
//Server settings
$mail->isSMTP();                                     
$mail->Host = 'smtp.gmail.com';                      
$mail->SMTPAuth = true;                               
$mail->Username = 'stellasanimalclinic.ask@gmail.com';     
$mail->Password = 'andreacapistrano123';                    
$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);                         
$mail->SMTPSecure = 'ssl';                           
$mail->Port = 465;                                   

$mail->setFrom('stellasanimalclinic.ask@gmail.com');

//Recipients
$mail->addAddress($email);              
$mail->addReplyTo('stellasanimalclinic.ask@gmail.com');

//Content
$mail->isHTML(true);                                  
$mail->Subject = "STELLA'S ANIMAL CLINIC (ONLINE RESERVATION)";
$mail->Body    = $message;

$mail->send();

unset($_SESSION['email']);

$_SESSION['success'] = 'Confirmation Successful!';
header('location: reservations.php');
} 
catch (Exception $e) {
$_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
var_dump( $_SESSION['error']);
}	
}
catch(PDOException $e){
$_SESSION['error'] = $e->getMessage();
}
}
$pdo->close();
}
else{
$_SESSION['error'] = 'Fill up form first';
}

header('location: reservations.php');

?>