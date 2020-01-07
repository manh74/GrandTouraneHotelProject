<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>Social Hotel</title>
		<link REL="SHORTCUT ICON" HREF="img/logo.jpg">
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script
		src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
		crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php
		include "connect.php";
		?>
		
<div class="container"><nav class="navbar navbar-fixed-top navbar navbar-expand-lg navbar-dark bg-dark " style="position: fixed; z-index: 999; width: 1100px; ">
	<div class="collapse navbar-collapse" id="navbar">
	<a class="navbar-brand" href="#"><img src="img/logo2.png"></a>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">HOME
					<span class="sr-only">(current)</span>
				</a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" href="room-rate.php">ROOM & RATE</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="food.php">FOOD</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="tour-desk.php">TOUR DESK</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="gallery.php">GALLERY</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="info.php">ABOUT US</a>
			</li>
			<li class="nav-item">
				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-5">
					<div class="textbox">
						<form class="form-inline">
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search something..">
									<button class="btn btn-secondary" type="button">
									<i class="ion-ios-search-strong"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</li>
		</ul>
	</div>
</nav>
</div>


<div class="container">
			<form action="index.php" method="post">
				<div class="top">
					<p><i class="ion-ios-location-outline"></i> 252 Võ Nguyên Giáp, Phước Mỹ, Sơn Trà, Đà Nẵng</p>
					<div><i class="ion-android-call"></i> (+84) 236 377 88 88</div>
					<p><i class="ion-android-mail"></i> reservations@grandtouranehotel.com</p>
					
					<div style="display: flex; margin-right: 30px">
						<?php if(!isset($_SESSION["full-name"])){ ?>
						<button type="button" class="btn btn-primary" id="lg-bt" data-toggle="modal" data-target="#login">LOGIN</button>
						<?php } ?>
						<?php if(isset($_SESSION["full-name"])){ ?>
						<h1>Hello <?php echo $_SESSION["full-name"] ?></h1>
						<button type="button" class="btn btn-warning" name="log-out" onclick="logOut()">LOGOUT</button>
						<?php } ?>
						<?php
						if(isset($_POST["log-in"])){
						for($i = 0; $i < count($user_select); $i++){
							if($_POST["email"]==$user_select[$i][3]||$_POST["email"]==$user_select[$i][4]&&$_POST["password"]==$user_select[$i][2]){
							$_SESSION["full-name"] = $user_select[$i][1];
							$_SESSION["log-in"] = true;
							break;
						}
						else
							unset($_SESSION["full-name"]);
						}
							}
						?>
						<script type="text/javascript">
							function logOut(){
							alert("Dang xuat");
						}
						</script>
						
					</div>
				</div>
			</form>
			<div class="modal fade" id="login" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">LOGIN</h5>
							<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span>
						</div>
						<div class="modal-body">
							<div class="login">
								<div class="w3l_grid">
									<form action="index.php" method="post" id="login">
										<div class="form-group">
											<label>Email address/Phone number:</label>
											<input type="text" name="email"  class="form-control" id="email" placeholder="Enter email">
										</div>
										<div class="form-group">
											<label>Password:</label>
											<input type="password" name="password" id="password"  class="form-control" placeholder="Enter Password">
										</div>
										<div class="form-group">
											<p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
										</div>
										<div class="col-md-12 text-center ">
											<button type="submit" name="log-in" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
										</div>
									</form>
									<div class="col-md-12 text-center ">
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
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>




<div class="container" style="margin-top: 100px">

<div class="promo-title">
	<a class="promo-title-a" href="">ROOM</a>

<div class="product-detail">
	<div style="display: flex; justify-content: space-between;">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btAdd">ADD NEW ROOM</button>
		<div class="modal fade" id="btAdd" tabindex="-1" role="dialog" aria-labelledby="addNewRoom" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addNewRoom">ADD NEW ROOM</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="new-name">Upload img:</label>
							<form  method="post" enctype="multipart/form-data">
								<input type="file" name="fileToUpload" id="fileToUpload">
								<input type="submit" value="Upload Image" name="submit">
							</form>
						</div>
						<div class="form-group">
							<label for="new-name">Name:</label>
							<input type="text" class="form-control" placeholder="Enter name" id="new-name">
						</div>
						<div class="form-group">
							<label for="new-name">Max:</label>
							<select>
								<option value="volvo">1</option>
								<option value="saab">2</option>
								<option value="mercedes">3</option>
								<option value="audi">4</option>
							</select>
						</div>
						<div class="form-group">
							<label for="new-name">Price:</label>
							<input type="text" class="form-control" placeholder="Enter price" id="new-price">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" onclick="addNewRoom()" name="new-room">Add</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="product-detail_content">
		<div class="row">
			<?php for($i = 0; $i < count($room_select); $i++){
			?>
			<div class="col-sm-6 col-md-3 col-lg-3">
				<div class="product-detail_item" style="border: 1px solid red; margin-top: 10px">
					<div class="img">
						<a href="room-detail.html"><img src="<?php echo $room_select[$i][1] ?>"alt="#"></a>
					</div>
					<div class="text">
						<h2><a href="room-detail.html"><?php echo $room_select[$i][2] ?></a></h2>
						<ul>
							<li><i class="fa fa-child" aria-hidden="true"></i> <?php echo $room_select[$i][4] ?></li>
							<li><i class="fa fa-money" aria-hidden="true"></i> <?php echo $room_select[$i][3] ?></li>
							<li><i class="fa fa-star-o" style="color: yellow" aria-hidden="true"></i> <?php echo $room_select[$i][5] ?></li>
						</ul>
						<form method="post">
							<button class="btn btn-primary">DETAIL</button>
							<?php if($_SESSION["log-in"] = true){?>
							<button class="btn btn-info">EDIT</button>
						<button class="btn btn-danger" name="room-delete" value=<?php echo $room_select[$i][0] ?>>DELETE</a></button>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
</div>
</div>
<br>
<br>
<div class="container">
<div class="row">
<div style="display: flex; justify-content: space-between; width: 2000px">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no-padding-left">
		<div class="text">
			<h2 class="heading"><?php  echo $about_select[0][1] ?></h2>
			<div class="desc">
				<?php  echo $about_select[0][2] ?>
			</div>
			<a href="room-detail.html" class="btn btn-room">VIEW DETAILS</a>
			
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  no-padding-right col-lg-push-6 col-md-push-6 ">
		<div class="img">
			<img src="https://dinco.com.vn/wp-content/uploads/2019/03/28.jpg" width="550px" height="400px">
		</div>
	</div>
</div>
<div style="display: flex">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no-padding-left">
		<div class="img">
			<img src="https://pix10.agoda.net/hotelImages/1158339/-1/889f782f885aada574dc862fd83c3c5f.jpg?s=1024x768" alt="#" class="img-responsive" width="550px" height="400px">
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  no-padding-right col-lg-push-6 col-md-push-6 ">
		<div class="text">
			<h2 class="heading"><?php  echo $about_select[1][1] ?></h2>
			<div class="desc">
				<?php  echo $about_select[1][2] ?>
			</div>
			<a href="room-detail.html" class="btn btn-room">VIEW DETAILS</a>
		</div>
	</div>
</div>
<br>
</div>
</div>
</div>
</div>
<div style="text-align: center;">
<iframe width="1100px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7668.363145003428!2d108.2432655256638!3d16.056064865898332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314217789c990369%3A0x138c794439bb7874!2sGrand%20Tourane%20Hotel!5e0!3m2!1svi!2s!4v1577967763229!5m2!1svi!2s" width="2000" height="450" frameborder="0" allowfullscreen></iframe>
</div>
<footer class="footer-sky">
<div class="footer-top">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
	<div class="icon-email">
		<a href="#" title="Email"><img src="http://landing.engotheme.com/html/skyline/demo/images/Home-1/footer-top-icon-l.png" alt="Email" class="img-responsive"></a>
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-7 col-lg-5">
	<div class="textbox">
		<form class="form-inline">
			<div class="form-group">
				<div class="input-group">
					<input type="email" class="form-control" placeholder="Your email address">
					<button class="btn btn-secondary" type="button">
					<i class="ion-android-send"></i>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 text-right">
	<div class="footer-icon-l">
		<a href="#" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		<a href="#" title="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
		<a href="#" title="Tripadvisor"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
		<a href="#" title="Isnstagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
	</div>
</div>
</div>
</div>
</div>
</footer>
<section class="copyright">
<div class="container">
<div class="row">
<div class="col-md-12 ">
<div class="text-center text-white">
	&copy; 2019 - Design by Nguyen Manh. All Rights Reserved.
</div>
</div>
</div>
</div>
</section>
</form>
</body>
</html>