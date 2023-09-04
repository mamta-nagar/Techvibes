<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Dosis&family=Lato&family=Space+Grotesk:wght@500&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
        font-family: 'Space Grotesk', sans-serif;
    }

    body {
        background-image: url("images/bg2.jpg");
        background-size: cover;

    }


    form {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f0f0f0;
        width: 350px;
        border-radius: px;
        padding: 20px 25px 30px 25px;
    }

    form h3 {
        margin-bottom: 20px;
        color: #6c757d;
    }

    form input {
        width: 100%;
        margin-bottom: 20px;
        background-color: transparent;
        border: none;
        border-bottom: 2px solid;
        display: flex;
        border-radius: 0;
        padding: 5px 0;
        font-weight: 550;
        font-size: 14px;
        outline: none;
    }

    form button {
        opacity: 0.6;
        font-weight: 550;
        font-style: 20px;
        color: white;
        background-color: #6c757d;
        padding: 6px 20px;
        border: none;
        outline: none;
        border-right: 2px solid black;
        border-bottom: 2px solid black;
    }
</style>

<body>
    <?php
    require('connection.php');
    if (isset($_GET['email']) && isset($_GET['reset_token'])) {
        date_default_timezone_set('Asia/kolkata');
        $date = date("Y-m-d");
        $query = "SELECT * FROM `registered_users` WHERE `email`= '$_GET[email]' AND `resettoken` ='$_GET[reset_token]' AND `resettokenexpire`='$date'";
        $result = mysqli_query($con, $query);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                echo "
        <body>
         <form name='myForm1' method='POST' onsubmit='return validateForm()'>
         <h3>Create New Password</h3>
         <input type='password' placeholder='New Password' name='Password'>
         <button type ='submit' name='updatepassword'>UPDATE</button>
         <input type= 'hidden' name='email' value='$_GET[email]'>
         </form> </body>";
            } else {
                echo "<script>
            alert('Invalid or Expired Date!');
            window.location.href='index.php';
                </script>";
            }
        } else {
            echo "<script>
        alert('Server Down, Try Again later!');
        window.location.href='index.php';
            </script>";
        }
    }

    ?>



    <?php
    if (isset($_POST['updatepassword'])) {
        $pass = password_hash($_POST['Password'], PASSWORD_BCRYPT);
        $update = "UPDATE `registered_users` SET `password`='$pass', `resettoken`=NULL, `resettokenexpire`=NULL WHERE email='$_POST[email]'";
        if (mysqli_query($con, $update)) {
            echo "<script>
            alert(' Your Password Updated Successfully !');
            window.location.href='index.php';
                </script>";
        } else {
            echo "<script>
            alert('Server Down, Try Again later!');
            window.location.href='index.php';
                </script>";
        }
    }
    ?>
    <script>
        function validateForm()
        var password = document.forms["myForm1"]["password"].value;

        if (password.length < 6) {
            alert("Password is too short!!");
            return false;
        } else {
            return true;
        }
    </script>
</body>

</html>