<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="../CSS/style.css">
  <link href="../CSS/font-awesome.css" rel="stylesheet"> 
  <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div class="login-form">
    <!--  Title-->
    <div class="login-title">
     <h1>Grand Tourane Hotel</h1>
   </div>
   <div class="login w3_login">
    <h2 class="login-header w3_header">LOG IN</h2>
    <div class="w3l_grid">
      <form action="" method="post" id="login">
              <div class="form-group">
                <label>Email address/Phone number:</label>
                <input type="email" name="email"  class="form-control" id="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" id="password"  class="form-control" placeholder="Enter Password">
              </div>
              <div class="form-group">
                <p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
              </div>
              <div class="col-md-12 text-center ">
                <button type="submit" name="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
              </div>
            </form>
      <div class="col-md-12 text-center ">
        <button type="submit" name="submit" class=" btn btn-block mybtn bt">
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

   <div class="bottom-text">
    <p>No account yet?<a href="register.php">Signup</a></p>
    <h4> <a href="forgotPassword.php">Forgot your password?</a></h4>
  </div>

</div>
</div>

</div>
</body>
</html>