<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require('connection.php');
session_start();

if(isset($_POST['login']))
{
 $query="SELECT * FROM `registered_users` WHERE `email`='$_POST[email_username]' OR `user_name`= '$_POST[email_username]' ";
 $result=mysqli_query($con,$query);
 
 if($result)
 {
  if(mysqli_num_rows($result)==1)
  {
   $result_fetch=mysqli_fetch_assoc($result);
   if($result_fetch['is_verified']==1)
     {
      # if password matched
      if(password_verify($_POST['password'],$result_fetch['password']))
      {
      $_SESSION['username']=$result_fetch['user_name'];
      echo"<script>
     alert('Login successfully do likes and dislikes !');
     window.location.href='first.php';
     </script>";
      }
      else
      {
    # if password does not matched
    echo"<script>
    alert('Incorrect Password');
    window.location.href='index.php';
    </script>";
      }
    }
  else
  {
    echo"<script>
    alert('Email Not Verified! Sorry');
    window.location.href='index.php';
    </script>";

  }
  }
  else
  {
    echo"<script>
    alert('Email or Username Not Registered');
    window.location.href='index.php';
    </script>";
  }
 }
 else
 {
    echo"<script>
    alert('Query cannot run');
    window.location.href='index.php';
    </script>";
 }
 
 
}
?>