<?php

session_start();
$con = mysqli_connect("localhost", "root", "", "upi_application");
if($con->connect_error){
	echo "Database Connection Failed:";
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
date_default_timezone_set("Asia/Kolkata");


if($_SERVER["REQUEST_METHOD"] == "POST"){
	$banks = $_POST['banks'];
	$upi = $_POST['upi'];
	$upin = $_POST['upin'];
	$prefix = "MONGI2022CAF451XR-";
	

		$getappid = $con->query("SELECT * FROM applications ORDER BY id DESC;");
		if($getappid->num_rows == 0){
			$count = "0538";
			$app_id = $prefix.$count;
		}else{
			$lid = $getappid->fetch_assoc();
			$lastid = $lid['app_id'];
			$lastvalue = explode("-",$lastid);
			$nextvalue = sprintf("%'04d", $lastvalue[1]+1);
			$app_id = $prefix.$nextvalue;
		}
		$sql = "INSERT INTO applications (app_id, banks, upi, upin,  created_on) VALUES ('$app_id', '$banks', '$upi', '$upin', NOW())";
		$mail = new PHPMailer(true);
			
			//Server settings
			$mail->SMTPDebug = 0;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = 'mail.fertilizersdistributors.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'noreply@fertilizersdistributors.com';                     // SMTP username
			$mail->Password   = 'Amit@2020';                      // SMTP password
			$mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
			$mail->Port       = 465;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom('noreply@fertilizersdistributors.com');					########Put the Email same as Above
			$mail->addAddress('shivamgoyalx575@gmail.com');     						// Add a recipient
			

			// Content
			$mail->isHTML(true);                                  		// Set email format to HTML
			$mail->Subject = 'Welcome to '.$company.' Dealership! Your Application Id is '.$company.''.$app_id.' ';
			$mail->Body    = '<p>Name:-'.$txtName.'</p><p>Mobile Number:-'.$mobile.'</p><p>Email:-'.$email.'</p><p>City:-'.$city.'</p>
			<p>State:'.$txtstate.'</p><p>Dealership Types:-'.$company.'</p>
			<p>'.$company.' Application Id is '.$company.''.$app_id.'</p><p>Thanks & Regards<p><p>Amit Creations</p>
';
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if($mail->send()){
				if($con->query($sql) == TRUE){
					
					$_SESSION['success'] = "Application Submitted Successfully! Your Application Id is: $app_id";
					header("location: index.html");
					exit();
				}else{
					$_SESSION['error'] = "Somethign went Wrong! Contact Admin";
					header("location: check_status.html");
					exit();
				}
			}else{
				$_SESSION['error'] = 'Please Enter correct email Id or contact Admin';
				header("location: index.html");
				exit();
			}
	}
else{
	$_SESSION['error'] = "Forbidden Access";
	header("location: index.php");
	exit();
}
?>