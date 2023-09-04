# Techvibes
Techvibes is a kind of responsive website which act as my personal showcase of achievements. 

instructions _
1. add your own images folder and edit second.html according to your file name 
2. put your own email credential in regsiterconnect.php(line no 28,29) as well as in forgotpassword.php(line no 20,21)
3. in upload.php , add username name that you want to make admin at line 7
4 just create following in phpmyadmin
one database ---> testing 
3 tables -------------------
 1--> registered_users with columns (`full_name`, `user_name`, `email`, `password`, `ver_code`, `is_verified`, `resettoken`, `resettokenexpire`)
 2 -->  CREATE TABLE `posts` (
  `id` int NOT NULL,
  `src` varchar(150) NOT NULL,
  `title` varchar(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
)
3 -->CREATE TABLE  `ratings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
)
                            

                            