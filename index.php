<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration and Login</title>
  <!-- Add Bootstrap CSS link here -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Dosis&family=Lato&family=Space+Grotesk:wght@500&display=swap');

body, html {
  margin: 0;
  padding: 0;
  background: black;
  font-family: 'Space Grotesk', sans-serif;
  overflow: hidden; /* Prevent horizontal scrollbar */
}

/* Header styles */
.header {
  background-color: black;
  padding: 15px 0;
  text-align: center;
}

h1 {
  opacity: 0.7
  ;
  font-weight: 500;
  color: white;
  position: relative;
  margin: 0;
  padding: 10px;
  display: inline-block;
  border-bottom: 1px solid white;
  transition: color 0.3s, border-color 0.3s;
}

h1::before {
  content: '';
  position: absolute;
  top: 0;
  left: -8px;
  width: 2px;
  height: 100%;
  background-color: white;
  transform: skewX(-10deg);
}

h1::after {
  content: '';
  position: absolute;
  top: 0;
  right: -10px;
  width: 2px;
  height: 100%;
  background-color: white;
  transform: skewX(-10deg);
}

.highlight {
  color: black; 
  font-weight: bold; /* Highlighted text bold */
  display: inline-block;
  position: relative;
}

.highlight::after {
  content: '';
  position: absolute;
  bottom: -4px;
  left: 0;
  width: 100%;
  height: 3px;
  background-color: burlywood; 
  transform: scaleX(0); 
  transform-origin: left;
  transition: transform 0.3s ease-in-out;
}

.highlight:hover::after {
  transform: scaleX(1);

}


.highlight {
  color:burlywood; 
  font-weight: bold; 
  
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

.button-container {
  position: absolute;
  top: 45%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  width: 100%;
  max-width: 500px;
  z-index: 1;
}

.button-container .btn {
  margin-bottom: 0px;
  width: 100vw; /* Adjust the width using viewport units */
  max-width: 500px; /* Set a maximum width if needed */
  border: 2px solid burlywood;
  border-radius: 7px;
  padding: 10px 20px;
  font-size: 16px;
  opacity: 0.9;
  
}

.image {
  background: url('images/banner.png') no-repeat fixed center;
  background-size: cover;
  border: 1px solid white;
  width: 100%;
  height: 100px; /* Adjust the height as needed */
  margin: 10px 0;
}

 
 

@media (max-width: 450px)  {
  .image {
    background: url('images/banner.png') no-repeat fixed center;
    background-size: cover;
    border: 1px solid white;
    width: 100%;
    height: 90px; 
    margin: 10px 0;
  }
}

@media (max-width: 352px)  {
  .image {
    background: url('images/banner.png') no-repeat fixed center;
    background-size: cover;
    border: 1px solid white;
    width: 100%;
    height: 80px; 
    margin: 10px 0;
  }
}
@media (max-width: 320px)  {
  .image {
    background: url('images/banner.png') no-repeat fixed center;
    background-size: cover;
    border: 1px solid white;
    width: 100%;
    height: 70px; 
    margin: 10px 0;
  }
}


 @media (max-width: 864px) and (min-width: 634px) {
 
  h1 {
    text-align: center;
    font-size: 30px;
     font-weight: 100; 
  }

}

@media (max-width: 632px) and (min-width:530px){
  h1 {
    text-align:center;
    font-size: 28px;
    font-weight: 50; 

  }
}

@media (max-width: 529px) and (min-width:436px){
  h1 {
    text-align:center;
    font-size: 20px;
    font-weight: 50; 

  }
}
@media (max-width: 536px) and (min-width:200px){
  h1 {
    font-size: 25px;
    text-align:center;
    font-weight: 50; 

  }
}


@media (max-width: 1000px) and (min-width: 864px) {

  h1 {
    text-align: center;
    font-size: 35px;
     font-weight: 150; 
  }

  
}
  @media (max-width: 618px) and (min-width: 520px)
  {
    h1 {
    text-align: center;
    font-size: 23px;
    font-weight: 150;
  } 
}

/* Existing styles... */

/* Media Queries for Responsive Design */
@media (max-width: 768px) {
 

  .button-container {
    top: 40%; 
    padding: 0 20px; 
  }

  .button-container .btn {
    width: 100%; 
    max-width: 600px; 
  }

  .footer {
    padding: 5px;
  }
}


@media (max-width: 400px) {
  .button-container .btn {
    font-size: 14px; 
  }
}

.footer {
  background-color: black;
  color: #fff;
  padding: 10px;
  text-align: center;
  position: absolute;
  bottom: 0;
  width: 100%;
  font-family: 'Lato', sans-serif;
}

.main-content {
  display: flexbox;
  justify-content: center;
  align-items: center;
  background-size: contain;
  width: 100vw;
  height: 100vh;
  position: relative;
}

.content-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.2);
}

.btn{
  position: relative;
 color:white;
 transition: background-color 0.3s, color 0.3s;

}

.btn:hover{
  opacity:0.7;
  background-color:white;
  color:black;
  border: none;
  border-bottom:2px solid black;
  border-right: 2px solid black;
  border-radius: 6px;

}
</style>
</head>
<body>
<div class="header">
    <h1>Pleased to have your visit at <span class="highlight">TechVibes🤍</span></h1>
  </div>
 
  <div class="bg-img">
    <div class="main-content">
      <div class="content-overlay"></div>
      <div class="button-container">
        <a href="register.php" class="btn btn-lg btn-block">Click Here to Register 
        </a>
        <div class="image "></div>
        <a href="login.php" class="btn btn-lg btn-block ">Click Here to Login</a>
      </div>
    </div>
  </div>
  <div class="footer">
    <p>&copy; 2023 Techvibes. All rights reserved.</p>
  </div>

  <!-- Add Bootstrap JS scripts here -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

</body>

</html>