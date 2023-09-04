<?php
require('connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($email, $v_code)
{
    //Load Composer's autoloader
    require ("mailer/PHPMailer.php");
    require ("mailer/SMTP.php");
    require ("mailer/Exception.php");

    //Create an instance; passing `true` enables exceptions
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
        $mail->Subject = 'Email verification from Techvibes';
        $mail->Body    = "Thanks for Registration!<br>
        <b>Greetings from Mamta Nagar </b>
        <hr>
        Please! Click the link given below to verify the email address :
        <br>
        <i><u>
        <a href='http://localhost/linkedin/verify.php?email=$email&v_code=$v_code'> Verify </a>
        </i></u> ";
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Registration failed. Please try again later.";

        return false;
    }


}

if(isset($_POST['register']))
{
    # data selected successfully
 $user_exist_query="SELECT * FROM `registered_users` WHERE `user_name`='$_POST[username]' OR `email`='$_POST[email]'";
 $result=mysqli_query($con, $user_exist_query);

}

if($result)
{
    # it will be executed when username or email already exist.....old user
    if(mysqli_num_rows($result)>0)
    {
     $result_fetch=mysqli_fetch_assoc($result);

     if($result_fetch['user_name']==$_POST['username'])
     {
        # error for username already exist
        echo"<script>
        alert('$result_fetch[user_name] - Username already taken');
        window.location.href='index.php';
        </script>"; 
     }
     else
     {
        # error for email already registered
        echo"<script>
        alert('$result_fetch[email] - Email already Registered');
        window.location.href='index.php';
        </script>"; 
     }

    }
    else
    {
        # if no-one has taken email and username.....new user
      $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
      $v_code=bin2hex(random_bytes(16));
      $query="INSERT INTO `registered_users`(`user_name`, `full_name`, `email`, `password`, `ver_code`,`is_verified`) VALUES ('$_POST[username]','$_POST[fullname]','$_POST[email]','$password','$v_code','0')";
      if(mysqli_query($con,$query) && sendMail($_POST['email'],$v_code))
      {
       # if data is inserted successfully
        echo"<script>
        alert('Congrats, Registration successfully! Verify Link has been sent to your email');
        window.location.href='index.php';
        </script>";
      }
      else
      {
        # if data is not inserted
        echo"<script>
        alert('Server Down,Try Again');
        window.location.href='index.php';
        </script>";
      }
    }

}
else{
    # error in data selection
    echo"<script>
    alert('cannot run query');
    window.location.href='index.php';
    </script>";
    }
?>