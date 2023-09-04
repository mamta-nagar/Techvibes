<?php
require('connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$adminUsername = 'yourrrrrrrrrrrrrr usernameeeeeeeeeeeeeeeee';
if (!isset($_SESSION['username']) || $_SESSION['username'] !== $adminUsername) {
    echo "<script>alert('You are not authorized to upload images.');
    window.location.href='first.php';</script>";
    exit();
}

else{
    if (isset($_POST['upload'])) {
        $id=$_POST['id'];
        $title = $_POST['title'];
        $info = $_POST['info'];
    
        // Handle image upload
        $target_dir = "images/"; // Specify the directory for images
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        // Move the uploaded image to the images folder
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $src = $target_file; // Set the source (src) for the image
    
            // Insert image details into the database
            $query = "INSERT INTO `posts` (`id`, `src`, `title`, `info`) VALUES ('$id', '$src', '$title', '$info')";

            mysqli_query($con, $query);
            echo "<script>
            alert('Successfully Uploaded');
            window.location.href='first.php';
                </script>";
            exit();
        } else {
            echo "Error uploading the image.";
        }
    }
    
}
?>