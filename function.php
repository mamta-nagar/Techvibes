<?php 
require 'connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$post_id =$_POST["post_id"];
$user_name=$_POST["user_name"];
$status = $_POST["status"];

$ratings =mysqli_query($con, "SELECT * FROM ratings WHERE `post_id`= $post_id AND `user_name` =  '$user_name'");
if(mysqli_num_rows($ratings)>0)
{
    $rating = mysqli_fetch_assoc($ratings);
    if($rating['status']==$status){
        mysqli_query($con, "DELETE FROM ratings WHERE `post_id`= $post_id AND `user_name`= '$user_name'");
        echo "delete". $status;
    }
    else{
        mysqli_query($con, "UPDATE ratings SET `status`='$status' WHERE `post_id`=$post_id AND user_name='$user_name' ");
        echo "changeto". $status;
    }

}
else
{
    mysqli_query($con, "INSERT INTO ratings VALUES ('', '$post_id', '$user_name', '$status') ");
    echo "new". $status;
}
?>