<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Social Hotel</title>
	<link REL="SHORTCUT ICON" HREF="../../img/logo.jpg">
	<link rel="stylesheet" type="text/css" href="../../CSS/style.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script
	src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
	integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
	crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="../../JS/js.js" type="text/javascript"></script>
</head>
<body>
	<?php
	session_start();
	include "connect.php";
	?>
	<div class="container"><nav class="navbar navbar-fixed-top navbar navbar-expand-lg navbar-dark bg-dark " style="position: fixed; z-index: 999; width: 1110px; ">
		<div class="collapse navbar-collapse" id="navbar">
			<a class="navbar-brand" href="#"><img src="../../img/logo2.png"></a>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">HOME</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="room-rate.php">ROOM & RATE</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="food.php">FOOD</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="book-tour.php">TOUR DESK</a>
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
							<form class="form-inline" method="post" action="result.php">
								<div class="form-group">
									<div class="input-group">
										<input type="text" name="search-input" class="form-control" placeholder="Search something..">
										<button class="btn btn-secondary" name="search-button" type="submit">
											<i class="ion-ios-search-strong"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</li>
				<li class="nav-item" style="display: flex">
					<?php if(isset($_SESSION["log-in"])){ ?>
						<a class="nav-link" name="profile" href="profile.php"><i class="ion-person"></i></a>
						<a class="nav-link" name="cart" href="cart.php"><i class="ion-ios-cart"></i></a>
						<form method="post">
							<button style="background: none;border: none;" type="submit" name="log-out"><a class="nav-link"  id="log-out" ><i class="ion-log-out"></i></a></button>
						<?php } else{?>
							<button style="background: none;border: none;" type="submit" id="log-in" data-toggle="modal" data-target="#login"><a class="nav-link"><i class="ion-log-in"></i></a></button>
						<?php } ?>
					</form>
					<?php 
					if (isset($_POST['log-out'])) {
						session_destroy();
						header("refresh:0");
					} 
					?>
				</li>
			</ul>
		</div>
	</nav>
</div>

<div class="container" style="margin-top: 120px";>
	<form method="post" style="display: flex; justify-content: space-between;">
		<div class="top">
			<p><i class="ion-ios-location-outline"></i> 252 Vo Nguyen Giap, Phuoc My, Son Tra, Da Nang &nbsp;</p>
			<div><i class="ion-android-call"></i> (+84) 236 377 88 88  &nbsp;</div>
			<p><i class="ion-android-mail"></i> reservations@grandtouranehotel.com  &nbsp;</p>
		</div>
		<div style="display: flex; margin-right: 30px">
			<?php if(!isset($_SESSION["full-name"])){ ?>
				<button type="button" class="btn btn-primary" id="log-in" data-toggle="modal" data-target="#login">LOGIN</button>
			<?php } 
			else{ ?>
				<p style="border: 1px solid red" id="user"><a href="profile.php"><i class="fa fa-user"></i><?php echo $_SESSION["full-name"] ?></a></p>	 		
			<?php } 
			if(isset($_POST["log-in"])){
				for($i = 0; $i < count($users); $i++){
					if($_POST["email"]==$users[$i]->email||$_POST["email"]==$users[$i]->phone&&$_POST["password"]==$users[$i]->password){
						$_SESSION["full-name"] = $users[$i]->fullName;
						$_SESSION["id"] = $users[$i]->id;
						$_SESSION["log-in"] = true;
						if($users[$i]->roll=="admin"){
							$_SESSION["admin"] = true;
						}
						else {
							if(isset($_SESSION["admin"])){
								session_unset($_SESSION["admin"]);
							}
						}
						header("refresh:0");
						break;
					}
				}
			}
			?>
		</div>
	</form>
	<?php include 'login-modal.php'; ?>
</div>

<div class="container">
	<div class="hero" style="background-color: white">
		<div class="container">
			<div>
				<div>
					<form method="post" class="row" style="border: 1px solid red;">
						<br><br>
						<div class="col-xss-12 col-xs-12 col-sm-5">
							<div class="row gap-20">
								<div class="col-xss-12 col-xs-6 col-sm-6">
									<div> 
										<label class="lb">Check-in</label>
										<i class="fa fa-calendar"></i>
										<input class="form-control" type="date" placeholder ="Check-in" name="check-in">
										
									</div>
								</div>

								<div class="col-xss-12 col-xs-6 col-sm-6">
									<div> 
										<label class="lb">Check-out</label>
										<i class="fa fa-calendar"></i>
										<input class="form-control" type="date" placeholder ="Check-out" name="check-out">	
									</div>
								</div>
							</div>
						</div>

						<div class="col-xss-12 col-xs-12 col-sm-7">
							<div class="row">
								<div class="col-xss-12 col-xs-4 col-sm-4">
									<div>
										<label class="lb">Type</label>
										<i class="fa fa-home"></i>
										<select name="type" class="form-control">
											<option>Vip</option>
											<option>Normal</option>
										</select>
									</div>

								</div>

								<div class="col-xss-12 col-xs-4 col-sm-4">
									<div>
										<label class="lb">Adults</label>
										<i class="fa fa-group"></i>
										<select name="adults" class="form-control">
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div>
								</div>

								<div class="col-xss-12 col-xs-4 col-sm-4">
									<div>
										<label>Childen</label>
										<i class="fa fa-child"></i>
										<div class="input-group">
											<select name="child" class="form-control">
												<option>2</option>
												<option>3</option>
												<option>4</option>
											</select>
											&emsp;
											<button class="btn btn-primary" <?php if(isset($_SESSION["log-in"])){ ?> type="submit" name="book-room" <?php } else { ?> data-toggle="modal" data-target="#login" <?php } ?> style="color: white"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button> 
										</div> 
									</div>
								</div>
								<br>
							</div>
							<br>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<form method="post">
	<div class="container">
		<div class="promo-title">
			<a class="promo-title-a" href="room-rate.php">ROOM</a>
			<br>
			<?php include 'add-room-modal.php'; ?>

			<div class="row">
				<?php for($i = 0; $i < count($rooms); $i++){
					?>
					<div class="col-12 col-sm-6 col-md-4 col-lg-3" style="border: 1px solid #e8e2d3">
						<div>
							<img width="240px" height="200" src="<?php echo $rooms[$i]->image ?>"alt="<?php echo $rooms[$i]->name ?>"></a>
						</div>
						<div class="text">
							<h2><button style="border: none; background-color: white" type="submit" name="info-room" value="<?php echo $rooms[$i]->id ?>"><?php echo $rooms[$i]->name ?></button></h2>
							<ul>
								<li><i class="fa fa-child" aria-hidden="true"></i> <?php echo $rooms[$i]->max ?></li>
								<li><i class="fa fa-money" aria-hidden="true"></i><b style="color: red"> <?php echo number_format($rooms[$i]->price)."VND" ?></b></li>
								<li><i class="ion-ios-pulse-strong"></i><?php for($j = 0; $j < $rooms[$i]->rate; $j++){ ?><i class="fa fa-star" style="color: yellow" aria-hidden="true"></i><?php } ?> </li>
							</ul>
							<form method="post">
								<?php 
								if(isset($_SESSION["log-in"])){
									?>
									<input type="datetime-local" class="form-control" name="date-start">
									<br>
									<button type="submit" class="btn btn-primary" name="id-room" value="<?php echo $rooms[$i]->id ?>" style="color: white"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button> 
								<?php } ?>
								<button class="btn btn-primary" type="submit" name="info-room" value="<?php echo $rooms[$i]->id ?>"><i class="fa fa-info" aria-hidden="true"></i></button>
								<?php if(isset($_SESSION["admin"])){?>
									<button type="submit" name="edit-room" value="<?php echo $rooms[$i]->id ?>" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i></button>
									<button class="btn btn-danger" name="room-delete" value=<?php echo $rooms[$i]->id ?>><i class="fa fa-trash" aria-hidden="true"></i></a></button>
								<?php } ?>
							</form>
						</div>
					</div>
					<br><br>
				<?php } 

				?>
			</div>
		</div>
	</div>
</div>
</form>
<?php include 'edit-room-form.php'; ?>
<br>
<br>
<form method="post">
	<div class="container">
		<div class="promo-title">
			<a class="promo-title-a" href="food.php">FOOD</a>
			<br>
			<?php if(isset($_SESSION["admin"])){?>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btAddFood">ADD NEW FOOD</button>
				<br>
			<?php } 
			include 'add-food-modal.php';?>
			
			<div class="row">
				<?php for ($i=0; $i < count($foods); $i++) { ?>	
					<div class="col-md-4">
						<div class="card mb-2">
							<img height="300px" src="<?php  echo $foods[$i]->image ?>"
							alt="<?php  echo $foods[$i]->name ?>">
							<div class="card-body">
								<h5><b class="card-title"><i class="ion-spoon"></i><?php  echo $foods[$i]->name ?></b></h5>
								<p class="card-text"><i class="fa fa-money" aria-hidden="true"></i><b style="color: red"><?php  echo number_format($foods[$i]->price)."VND" ?></b></p>
								<?php if(isset($_SESSION["log-in"])){ ?>
									<br>
									<button class="btn btn-primary" type="submit" name="cart" value=<?php  echo $foods[$i]->id ?> style="color: white"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
								<?php } ?>
								<?php if(isset($_SESSION["admin"])){?>
									<button type="submit" name="edit-food" value="<?php echo $foods[$i]->id ?>" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i></button>
									<button class="btn btn-danger" name="food-delete" value=<?php echo $foods[$i]->id ?>><i class="fa fa-trash" aria-hidden="true"></i></a></button>
								<?php } ?>
							</div>
						</div>
					</div>								
				<?php } 
				?>
			</div>
		</div>
		<p style="font-family: Comic Sans MS"><b style="color: red">*</b>Please wait for us to 10-15 minutes to prepare the dish!</p>
	</div>
</form>
<?php include 'edit-food-form.php'; ?>
<br>
<br>
<div class="container" style="justify-content: center">
	<hr>
	<div class="row">
		<?php if (isset($about_select[0])) {?>
			<div style="display: flex; justify-content: space-between; width: 2000px">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 no-padding-left">
					<div class="text">
						<h2 class="text-uppercase heading"><?php  echo $about_select[0]['title'] ?></h2>
						<div class="desc">
							<?php  echo $about_select[0]['content'] ?>
						</div>
						<?php if(isset($_SESSION["admin"])){?>
							<button class="btn btn-info"  name="about-edit" value="<?php echo $about_select[0]["id"]?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
						<?php } ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  no-padding-right col-lg-push-6 col-md-push-6 ">
					<div class="img">
						<img src="https://dinco.com.vn/wp-content/uploads/2019/03/28.jpg" width="550px" height="400px">
					</div>
				</div>
			</div>
		<?php } if (isset($about_select[1])) { ?>
			<div style="display: flex">
				<div class="col-xss-12 col-xs-6 col-sm-6">
					<div class="img">
						<img src="https://pix10.agoda.net/hotelImages/1158339/-1/889f782f885aada574dc862fd83c3c5f.jpg?s=1024x768" width="550px">
					</div>
				</div>
				<div class="col-xss-12 col-xs-6 col-sm-6">
					<div class="text">
						<h2 class="text-uppercase heading"><?php  echo $about_select[1]['title'] ?></h2>
						<div class="desc">
							<?php  echo $about_select[1]['content'] ?>
						</div>
						<?php if(isset($_SESSION["admin"])){?>
							<button class="btn btn-info"  name="about-edit" value="<?php echo $about_select[1]["id"]?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php include 'edit-about-form.php'; ?>
		<br><br>
	</div>
	<div class="container">
		<hr>
		<section class="dark-grey-text">
			<div class="row pr-lg-5">
				<div class="col-md-7 mb-4">
					<div class="view">
						<img src="https://media-cdn.tripadvisor.com/media/photo-s/0f/38/57/73/grand-tourane-hotel.jpg" class="img-fluid" alt="smaple image">
					</div>
				</div>
				<div class="col-md-5 d-flex align-items-center">
					<div>
						<h3 class="font-weight-bold mb-4"><i class="ion-person"></i><?php echo " ".$cmt_select[count($cmt_select)-1]['name'] ?></h3>
						<p><i class="ion-chatbox-working"></i><?php echo " ".$cmt_select[count($cmt_select)-1]['content'] ?></p>
						<a href="info.php"><button type="button" class="btn btn-info">REVIEW OUR HOTEL</button></a>

					</div>
				</div>
			</div>

		</section>
		<hr>
	</div>
</div>
</div>
</div>
<div style="text-align: center;">
	<iframe width="1100px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7668.363145003428!2d108.2432655256638!3d16.056064865898332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314217789c990369%3A0x138c794439bb7874!2sGrand%20Tourane%20Hotel!5e0!3m2!1svi!2s!4v1577967763229!5m2!1svi!2s" width="2000" height="450" frameborder="0" allowfullscreen></iframe>
</div>
<div class="container">
	<footer class="footer-sky">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
						<div class="icon-email">
							<a href="info.php" title="Email"><img src="http://landing.engotheme.com/html/skyline/demo/images/Home-1/footer-top-icon-l.png" alt="Email" class="img-responsive"></a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-7 col-lg-5">
						<div class="textbox">
							<form class="form-inline">
								<div class="form-group">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Please write your inquiries">
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
	<?php include 'footer.php'; ?>
</form>
</div>
</body>
</html>