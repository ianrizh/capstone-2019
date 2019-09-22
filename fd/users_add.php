<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM customer WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Email Address already taken';
		}
		else{
			try{
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$activate_code=substr(str_shuffle($set), 0, 12);
				
				$password = password_hash($password, PASSWORD_DEFAULT);
				
				$stmt = $conn->prepare("INSERT INTO customer (email, password, activate_code) VALUES (:email, :password, :activate_code)");
				$stmt->execute(['email'=>$email, 'password'=>$password, 'activate_code'=>$activate_code]);
				$userid = $conn->lastInsertId();
				
				$message = "
						<h2>PLEASE VERIFY YOUR EMAIL ADDRESS</h2>
						<p>Thanks for choosing Stella's Animal Clinic for your pet needs.</p>
						<p>You're only one step from being able to login on our website! Simply click on the link below to confirm your account.</p>
						<p>Your default password is <b>password</b></p>
						<a href='http://localhost/xampp/back%20up%20mo%20muna%20to%20tanga%20ka/CAPSTONE_FIFTH_YEAR/activate1.php?activate_code=".$activate_code."&user=".$userid."'>Activate Account</a>
						<p>Best wishes,</p>
						<p><b>STELLA'S ANIMAL CLINIC</b></p>
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
				        $mail->Subject = "STELLA'S ANIMAL CLINIC (VERIFY YOUR EMAIL ADDRESS)";
				        $mail->Body    = $message;

				        $mail->send();

				        unset($_SESSION['email']);

						$_SESSION['success'] = 'Customer added successfully';
				        header('location: users.php');

				    } 
				    catch (Exception $e) {
				        $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
				        header('location: ussers.php');
				    }

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Email Address is needed.';
	}

	header('location: users.php');

?>