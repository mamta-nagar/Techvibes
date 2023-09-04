<?php
require("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $reset_token){
    require('mailer/PHPMailer.php');
    require('mailer/Exception.php');
    require('mailer/SMTP.php');

    
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mamtanagar626826@gmail.com';                     //SMTP username
        $mail->Password   = 'crnjijrbqjabcsjo';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
       
        //Recipients
        $mail->setFrom('mamtanagar626826@gmail.com', 'Techvibes');
        $mail->addAddress($email);     //Add a recipient
        
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset Link From TechVibes';
        $mail->Body    = "We got a request from you to reset your password!<br>
        <b>Greetings from Mamta Nagar </b>
        <hr>
        Please! Click the link given below to recover your password : 
        <br>
        <i><u>
        <a href='http://localhost/linkedin/updatepassword.php?email=$email&reset_token=$reset_token'> Reset </a>
        </i></u> ";
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Registration failed. Please try again later.";

        return false;
    }


}


if (isset($_POST['send-reset-link'])) 
{
    $query = "SELECT * FROM `registered_users` WHERE `email`='$_POST[email]'";
    $result = mysqli_query($con, $query);
    if ($result) 
    {
        if (mysqli_num_rows($result) == 1) 
        {
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/kolkata');
            $date = date("Y-m-d");
     
            $query1 = "UPDATE `registered_users` SET `resettoken` ='$reset_token', `resettokenexpire`='$date' WHERE email='$_POST[email]'";
           // echo"$reset_token";
           // echo"$date";
            if (mysqli_query($con, $query1) && sendMail($_POST['email'], $reset_token)) {
             echo "<script>
            alert('Password Reset Link Sent to mail');
            window.location.href='index.php';
                </script>";
            } else {
                echo "<script>
        alert('Server Down, Try Again later!');
        window.location.href='index.php';
            </script>";
            }
        } else {
            echo "<script>
        alert('Email not Found!');
        window.location.href='index.php';
            </script>";
        }
    } else {
        echo "<script>
    alert('cannot run query');
    window.location.href='index.php';
        </script>";
    }
}
?>