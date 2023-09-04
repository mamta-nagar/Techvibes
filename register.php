<?php require('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register-page</title>
  
<style>
  @import url('https://fonts.googleapis.com/css2?family=Dosis&family=Lato&family=Space+Grotesk:wght@500&display=swap');
  body, html {
    height: 100%;
    margin: 0;
    padding: 0;
    font-family:'Space Grotesk', sans-serif;
  }

  .bg-img {
    /* The image used */
    background-image: url("images/bg2.jpg");
    min-height: 100%;
    min-width: 80%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /* Center the form horizontally and vertically */
.container {
    color: #6c757d;
    max-width:350px;
    min-height:60%;
    min-width: 40%;
    padding: 5px 20px 20px;
    background-color: white;
    font-size:14px;
  }
  
  h2{
    text-align: center;
    color: #6c757d ;
    padding:10px 0px;
    margin:10px 0px;
  }

  /* Full-width input fields */
  input[type=text], input[type=password] {
    width: 100%;
    padding: 8px 0px;
    margin: 5px 0 10px 0;
    border: none;
    background: #f1f1f1;
  }

  input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }
  input{
      font-family:'Space Grotesk', sans-serif;
    }

  /* Set a style for the submit button */
  .btn {
    margin-top: 15px;
    font-family:'Space Grotesk', sans-serif;
    font-size: 14px;
    background-color: #6c757d;
    color: white;
    padding: 10px 10px ;
    border-bottom: 2px solid black;
    border-right: 2px solid black;
    cursor: pointer;
    width: 100%;
    opacity: 0.6;
  }
  
  .btn:hover {
    opacity: 0.8;
  }
</style>
</head>
<body>

<div class="bg-img">
  <form name="myForm" method="POST" action="registerconnect.php" onsubmit="return validateForm()" class="container">
    <h2>REGISTER</h2>
    <label for="fullname"><b>Your Full Name</b></label>
    <input type="text" name="fullname" placeholder=" Fullname" required><br>
    <label for="username"><b> Enter User Name</b></label>
    <input type="text" name="username" placeholder="Username"  required><br>
    <label for="email"><b>Enter Email</b></label>
    <input type="text" name="email" placeholder="Email" autocomplete="username" required><br>
    <label for="password"><b> Enter Password</b></label>
    <input type="password" name="password" placeholder="Password" autocomplete="current-password" required>
    <button type="submit" class="btn" name="register">Submit to Register</button>
  </form>
</div>

<script>
function validateForm() 
{
  var email = document.forms["myForm"]["email"].value;
  var password = document.forms["myForm"]["password"].value;

  if (password.length < 6) {
    alert("Password is too short!!");
    return false;
  }

  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!email.match(emailPattern)) {
    alert("Email is not valid, please try again!!");
    return false;
  }
  return true;
}
</script>


</body>
</html>
