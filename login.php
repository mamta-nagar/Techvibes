<?php require('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login-page</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Dosis&family=Lato&family=Space+Grotesk:wght@500&display=swap');

    body,
    html {
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: 'Space Grotesk', sans-serif;
    }

    .bg-img {
      background-image: url("images/bg2.jpg");
      min-height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    
    .container {
      color: #6c757d;
      max-width: 300px;
      padding: 16px;
      background-color: white;
      font-size: 14px;
      font-family: 'Space Grotesk', sans-serif;
    }

    h1{
    text-align: center;
    color: #6c757d ;
    padding:10px 0px;
    margin:10px 0px;
    }  

    input[type=text],
    input[type=password] {
      
      width: 100%;
      padding: 8px 0px;
      margin: 5px 0 10px 0;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
      font-family: 'Space Grotesk', sans-serif;
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit button */
    .btn {
    border:2px solid burlywood;
    font-family:'Space Grotesk', sans-serif;
    font-size: 15px;
    background-color: #6c757d;
    color: white;
    padding: 6px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.5;
    border-bottom: 2px solid black;
    border-right: 2px solid black;
  }


  
  .btn:hover {
      opacity: 0.8;
   }

    .forgot-btn {
      padding: 20px 0px 10px;
      text-align: right;
      
    }

    .forgot-btn button {
      color: #6c757d;
      border: none;
      background-color: transparent;
      outline: none;
      font-size: 16px;
      font-weight: 550;
      cursor: pointer;
      margin-top: 10px;
      
    }

    
    .popup-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: regb(0, 0, 0, 0.2);
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      display: none;

    }

    div.popup-container div.popup {
      background-color: #f0f0f0;
      width: 350px;
      border-radius: 0px;
      padding: 20px 25px 30px 25px;
    }

    .popup-container .popup h2 {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 30px;
      color: #6c757d;
  
    }

    input{
      font-family:'Space Grotesk', sans-serif;
    }

    .popup-container .popup .forgot-btn button {
      border: none;
      background-color: transparent;
      outline: none;
      font-size: 18px;
      font-weight: 550;
      cursor: pointer;
      margin-top: 20px;
      margin-bottom: 8px;
    }

    
    .popup-container .popup h2 button {
      border: none;
      background-color: transparent;
      outline: none;
      font-size: 18px;
      font-weight: 550;
      color: #797775;
    }

    .popup-container .popup input {
      width: 100%;
      margin-bottom: 20px;
      background-color: transparent;
      border: none;
      border-bottom: 2px solid ;
      display: flex;
      border-radius: 0;
      padding: 5px 0;
      font-weight: 550;
      font-size: 14px;
      outline: none;
      

    }

    .popup-container .forgot button .reset-btn{
      opacity: 0.4;
      font-weight:550;
      font-style: 20px;
      color:white;
      background-color: #6c757d;
      padding: 6px 20px;
      border: none;
      outline: none;
      margin-top: 5px;
      
     
    }

    .popup-container .forgot h2{
      color:#6c757d;
      font-size: 20px;

    }

    .popup-container .forgot input{
      border-bottom-color: #6c757d;
    }
    
    .popup-container .forgot .reset-btn{
      background-color: #6c757d;
      color: #ddd;
      padding:10px 15px;
      opacity: 0.7;
      border-right: 2px solid black;
      border-bottom: 2px solid black;
     font-weight: 300;

    } 
  </style>
</head>

<body>

<div class="bg-img">
  <form name="myForm" method="POST" action="loginconnect.php" onsubmit="return validateForm()" class="container" id="loginn">
    <h1>LOGIN</h1>
    <label for="email_username"><b>Enter Email or Username</b></label>
    <input type="text" id="email_username" name="email_username" placeholder="Email or Username" autocomplete="username" required><br>
    <label for="password"><b>Enter Password</b></label>
    <input type="password" id="password" name="password" placeholder="Password" autocomplete="current-password" required>
    <button type="submit" class="btn" name="login">Submit to Login</button>
    <div class="forgot-btn">
      <button type="button" onclick="forgotPopup()">Forgot Password?</button>
    </div>
  </form>
</div>

 
  <div class="popup-container" id="forgot-popup">
    <div class="forgot popup">
      <form method="POST" action="forgotpassword.php">
        <h2>
          <span>RESET PASSWORD</span>
        </h2>
        <input type="text" placeholder="E-mail" name="email">
        <button type="submit" class="reset-btn" name="send-reset-link">SEND LINK</button>
      </form>
    </div>
  </div>
  
 <script>
  function forgotPopup(){
    document.getElementById('loginn').style.display="none";
    document.getElementById('forgot-popup').style.display="flex";

  }
 </script>
</body>

</html>