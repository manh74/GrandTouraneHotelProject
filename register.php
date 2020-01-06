<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="CSS/style.css">
  <link href="css/font-awesome.css" rel="stylesheet"> 
  <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="bg">
  <form method="post">
  <div class="login-form">
    <!--  Title-->
    <div class="login-title">
     <h1>Grand Tourane Hotel</h1>
   </div>
   <div class="login w3_login">
    <h2 class="login-header w3_header">REGISTER</h2>
    <div class="w3l_grid">
      <div class="form-group">
        <label>Full name:</label>
        <input type="text" name="fullName"  class="form-control" id="fullName" placeholder="Enter name">
      </div>
      <div class="form-group">
        <label>Email address:</label>
        <input type="email" name="email"  class="form-control" id="email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label>Phone number:</label>
        <input type="text" name="phone"  class="form-control" id="email" placeholder="Enter phone number">
      </div>
      <div class="form-group">
        <label>Bỉthday:</label>
        <input type="date" name="date"  class="form-control" id="date" placeholder="Enter birthday">
      </div>
      <div class="form-group">
        <label>Password:</label>
        <input type="password" name="password" id="password"  class="form-control" placeholder="Enter Password">
      </div>
      <div class="form-group">
        <p class="text-center">By creating an account you agree to our <a href="#">Terms Of Use</a></p>
      </div>
      <div class="col-md-12 text-center ">
        <button type="submit" name="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Register</button>
      </div>
      <div class="form-group">
        <p class="text-center">You have account? <a href="login.php" id="login">Log in here</a></p>
      </div>
      <div class="second-section w3_section">
       <div class="bottom-header w3_bottom">
        <h3>OR</h3>
      </div>
      <div class="social-links w3_social">
       <ul>
         <!-- facebook -->
         <li> <a class="facebook" href="#" target="blank"><i class="fa fa-facebook"></i></a></li>

         <!-- twitter -->
         <li> <a class="twitter" href="#" target="blank"><i class="fa fa-twitter"></i></a></li>

         <!-- google plus -->
         <li> <a class="googleplus" href="#" target="blank"><i class="fa fa-google-plus"></i></a></li>
       </ul>
     </div>
   </div>

   <div class="bottom-text w3_bottom_text">
    <h4> <a href="forgotPassword.php">Forgot your password?</a></h4>
  </div>

</div>
</div>

</div>
</form>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "myhotel";

$db = new mysqli($servername, $username, $password, $database);
if (isset($_POST["submit"])) {
   $user_insert = "INSERT INTO Users (fullName,password,email,phone,birthday) VALUES ('".$_POST["fullName"]."','".$_POST["password"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["date"]."')";
   echo $user_insert;
    $db->query($user_insert);
 }
 else{
  echo "ABC";
 } ?>





<div class="footer-w3l">
  <p class="agile"> &copy;All Rights Reserved | Design by Nguyen Manh</p>
</div>
</body>
</html>