<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Certificates Gallery</title>
    <link rel="stylesheet" href="first.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>

<body>
    <header>
        <h1>My Own TechVibes</h1>
        <p class="subtitle">Exploring My Certificates Briefcase, Organized in Chronological Order </p>
        <div class="forgot-btn">
            <button type="button" onclick="forgotPopup()"> Are You Admin ? </button>
            <button type="button" onclick="nextpage()"> School Corner ? </button>
            <button type="button" onclick="logout()"> Log out ?</button>


        </div>
    </header>


    <main>
        <div class="popup-container" id="popup">
            <div class="upload-form">

                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <button class="close-button" onclick="closePopup()">Close</button>
                    <div class="input-container">
                        <input type="file" name="image" id="image" required>
                    </div>
                    <div class="input-container">
                        <label for="id">Id</label>
                        <input type="text" name="id" id="id" placeholder="Id" required>
                    </div>
                    <div class="input-container">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" placeholder="Title" required>
                    </div>
                    <div class="input-container">
                        <label for="info">Info</label>
                        <input type="text" name="info" id="info" placeholder="Info" required>
                    </div>
                    <input type="hidden" name="src" id="src" value="">
                    <button type="submit" name="upload">Upload</button>
                </form>
            </div>
        </div>
        <script>
            function forgotPopup() {
                document.getElementById('popup').style.display = "flex";
                document.getElementById('popup').classList.add('active');

            }

            function closePopup() {
                document.getElementById('popup').style.display = "none";
                document.getElementById('popup').classList.remove('active');
            }

            document.getElementById("image").addEventListener("change", function() {
                // Get the chosen file name
                var fileName = this.value.split("\\").pop();

                // Set the file name as the value of the hidden input field "src"
                document.getElementById("src").value = "images/" + fileName;
            });

            function logout() {
                window.location.href = "logout.php";
            }

            function nextpage() {
                window.location.href = "second.html";
            }
        </script>

        <div class="container">
            <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 'On');
            require('connection.php');


            session_start();
            if (isset($_SESSION['username'])) {
                // Access the session variable
                $user_name = $_SESSION['username'];
                $posts = mysqli_query($con, "SELECT * FROM posts ORDER BY `id` DESC");
                foreach ($posts as $post) :
                    $post_id = $post["id"];

                    $likesCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS likes FROM ratings WHERE `post_id` = $post_id AND `status`='like'"))['likes'];
                    $dislikesCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS dislikes FROM ratings WHERE `post_id` =$post_id AND `status`='dislike'"))['dislikes'];

                    $status = mysqli_query($con, "SELECT status FROM ratings WHERE `post_id` = $post_id AND `user_name`='$user_name'");
                    if (mysqli_num_rows($status) > 0) {
                        $status = mysqli_fetch_assoc($status)['status'];
                    } 
                    


            ?>


                    <div class="post">
                        <img src="<?php echo $post['src'] ?>" alt="<?php echo $post['title'] ?>">

                        <div class="card-description">
                            <p><?php echo $post['info'] ?> by <b><?php echo $post['title'] ?></b></p>

                            <div class="like-dislike-buttons">

                                <button class="like <?php if ($status == 'like') echo "selected"; ?>" data-post-id=<?php echo $post_id; ?>>
                                    <i class="fas fa-heart"></i>
                                    <span class="likes_count<?php echo $post_id; ?>" data-count=<?php echo $likesCount; ?>>
                                        <?php echo $likesCount; ?></span>
                                </button>
                                <button class="dislike <?php if ($status == 'dislike') echo "selected"; ?>" data-post-id=<?php echo $post_id; ?>>
                                    <i class="fas fa-heart-broken"></i>
                                    <span class="dislikes_count<?php echo $post_id; ?>" data-count=<?php echo $dislikesCount; ?>>
                                        <?php echo $dislikesCount; ?></span>
                                </button>

                            </div>
                        </div>

                    </div>

            <?php
                endforeach;
            } else {
                echo " No valid user, Register?login First ";
            }

            ?>
        </div>
    </main>


    <footer>
        <p>&copy; 2023 Techvibes. All rights reserved.</p>
    </footer>
    <script src="first.js"> </script>
    <script type="text/javascript">
        $(document).on('click', '.like, .dislike', function() {

            var data = {
                post_id: $(this).data('post-id'),
                user_name: <?php echo json_encode($user_name); ?>,
                status: $(this).hasClass('like') ? 'like' : 'dislike',
            };
            $.ajax({
                url: 'function.php',
                type: 'post',
                data: data,
                cache: false,
                success: function(response) {
                    var post_id = data['post_id'];
                    var likes = $('.likes_count' + post_id); //Likes_count element
                    var likesCount = likes.data('count');
                    var dislikes = $('.dislikes_count' + post_id); // Dislikes_count element
                    var dislikesCount = dislikes.data('count');
                    var likeButton = $(".like[data-post-id=" + post_id + "]");
                    var dislikeButton = $(".dislike[data-post-id=" + post_id + "]");


                    if (response == 'newlike') {
                        likes.html(likesCount + 1);
                        likeButton.addClass('selected');

                    } else if (response == 'newdislike') {
                        dislikes.html(dislikesCount + 1);
                        dislikeButton.addClass('selected');

                    } else if (response == 'changetolike') {
                        likes.html(parseInt($('.likes_count' + post_id).text()) + 1);
                        dislikes.html(parseInt($('.dislikes_count' + post_id).text()) - 1);
                        likeButton.addClass('selected');
                        dislikeButton.removeClass('selected');

                    } else if (response == 'changetodislike') {
                        likes.html(parseInt($('.likes_count' + post_id).text()) - 1);
                        dislikes.html(parseInt($('.dislikes_count' + post_id).text()) + 1);
                        likeButton.removeClass('selected');
                        dislikeButton.addClass('selected');

                    } else if (response == 'deletelike') {
                        likes.html(parseInt($('.likes_count' + post_id).text()) - 1);
                        likeButton.removeClass('selected');

                    } else if (response == 'deletedislike') {
                        dislikes.html(parseInt($('.dislikes_count' + post_id).text()) - 1);
                        dislikeButton.removeClass('selected');
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("AJAX Error:", textStatus, errorThrown);
                }
            });
        });
    </script>

</body>

</html>