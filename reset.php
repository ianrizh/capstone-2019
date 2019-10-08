<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	if(isset($_POST['reset'])){
		$email = $_POST['email'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			//generate code
			$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code=substr(str_shuffle($set), 0, 15);
			try{
				$stmt = $conn->prepare("UPDATE users SET reset_code=:code WHERE id_cust=:id_cust");
				$stmt->execute(['code'=>$code, 'id_cust'=>$row['id_cust']]);
				
				$message = "
					<h2>RESET YOUR PASSWORD</h2>
					<p>Your Account:</p>
					<p>Email: ".$email."</p>
					<p>Please click the link below to reset your password.</p>
					<a href='http://localhost/xampp/CAPSTONE_FIFTH_YEAR/password_reset.php?code=".$code."&user=".$row['id_cust']."'>Reset Password</a>
				";

				//Load phpmailer
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
			        $mail->Subject = "STELLA'S ANIMAL CLINIC (RESET PASSWORD)";
			        $mail->Body    = $message;

			        $mail->send();

			        $_SESSION['success'] = 'Reset password link sent. Check your email now!';
			     
			    } 
			    catch (Exception $e) {
			        $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
			    }
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}
		else{
			$_SESSION['error'] = 'Email Address not found';
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Input email address associated with account';
	}

	header('location: password_forgot.php');

?>