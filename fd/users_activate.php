<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include 'includes/session.php';

if(isset($_POST['id_cust'])){
$id_cust = $_POST['id_cust'];

$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM users where id_cust = $id_cust");
$stmt->execute();
foreach($stmt as $row){
$firstname  = $row['firstname'];
$email  = $row['email'];
}


if(isset($_POST['activate'])){
try{
$stmt = $conn->prepare("UPDATE users SET status=:status and password =:password WHERE id_cust=:id_cust");
$stmt->execute(['status'=>1, 'password'=>'$2y$10$ZDNPt60nqMB0qey0PI8jGevEhGmWUqELBNLJ5GoUeRBfQUaOVSy/G', 'id_cust'=>$id_cust]);
$message = "
<h2>CONGRATULATIONS!</h2>
<p>Hey ".$firstname."! Your account is now activated. We look forward to seeing you soon.</p>
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
$mail->Subject = "STELLA'S ANIMAL CLINIC";
$mail->Body    = $message;

$mail->send();

unset($_SESSION['email']);

$_SESSION['success'] = 'Account Activated!';
header('location: users.php');
} 
catch (Exception $e) {
$_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
var_dump( $_SESSION['error']);
}	
}
catch(PDOException $e){
$_SESSION['error'] = $e->getMessage();
}
$pdo->close();
}
}
else{
$_SESSION['error'] = 'Fill up form first';
}

header('location: users.php');

?>