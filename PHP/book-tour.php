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
	<script src="../JS/js.js" type="text/javascript"></script>
</head>
<body>
	<?php
	include "connect.php";
	?>

	<div class="container"><nav class="navbar navbar-fixed-top navbar navbar-expand-lg navbar-dark bg-dark " style="position: fixed; z-index: 999; width: 1110px; ">
		<div class="collapse navbar-collapse" id="navbar">
			<a class="navbar-brand" href="#"><img src="../img/logo2.png"></a>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">HOME</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="room-rate.php">ROOM & RATE</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="food.php">FOOD</a>
				</li>
				<li class="nav-item">
					<a class="nav-link  active" href="book-tour.php">TOUR DESK</a>
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
				<li class="nav-item" style="display: flex">
					<a class="nav-link" href="food.php"><i class="ion-person"></i></a>
					<a class="nav-link" href="food.php"><i class="ion-ios-cart"></i></a>
					<a class="nav-link" href="food.php"><i class="ion-log-out"></i></a>
				</li>
			</ul>
		</div>
	</nav>
	<br>


	<div style="width: 100%; height: 20px; border-bottom: 2px solid red; text-align: center; margin-top: 100px">
		<span style="font-size: 40px; background-color: white; padding: 0 10px;">
			TOUR DESK 
		</span>
	</div>
</div>
<br><br>
<div class="container">
	<div class="row">
		<?php for ($i=0; $i < count($forgives); $i++) { ?>
		<div class="col-lg-4 col-md-4 col-12">
				<div>	
				</div>
				<div>
					<h3><?php echo $forgives[$i][1] ?></h3>
					<div><?php echo $forgives[$i][2] ?></div>
				</div>
		</div>
	<?php } ?>
	</div>
</div>
</div>

<hr>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div style="text-align: center; margin-bottom: 20px;">
				<h2 style="text-transform: uppercase;">
					<p style="color: black">
					<span style="color: #ff5722">LAST MINUTE TOURS</span> GOOD PRICES
				</p>
				</h2>
				<p style="color: #888;">Let's take a look at some of the most popular domestic tourist attractions with the Grand Tour!</p>
			</div>

			<div class="row">
				<?php for ($i=0; $i < count($tours); $i++) { ?>
				<div class="col-12 col-sm-6 col-md-4 col-lg-3">
					<div style="    position: relative;
					background-color: #fff;
					transition: all 300ms;
					border-radius: 3px;
					overflow: hidden;
					margin-bottom: 20px;
					box-shadow: 0 1px 2px 0 rgba(0,0,0,0.1);">
					<div>
						<a title="<?php  echo $tours[$i][1] ?>">
							<img style="vertical-align: middle; height: 300px" src="<?php  echo $tours[$i][2] ?>" alt="<?php  echo $tours[$i][1] ?>">
						</a>
					</div>
					<div>
						<h3><p><?php  echo $tours[$i][1] ?></p></h3>
						<div style="display: flex;
						justify-content: space-between;
						align-items: center;">
						<a class="nav-link" href="#"><i class="ion-android-bus"></i></a>
						<a class="nav-link" href="#"><i class="ion-plane"></i></a>
					</div>

				</div>
				<div>
					<ul>
						<li>
							<a class="nav-link" href="#"><i class="ion-calender"></i></a>Start: <span style="color: #ff5722; font-weight: 500;"><?php  echo $tours[$i][3] ?></span>
						</li>
						<li>
							<a class="nav-link" href="#"><i class="ion-clockr"></i></a>Time: <span style="color: #ff5722; font-weight: 500;"><?php  echo $tours[$i][4] ?></span>
						</li>
					</ul>
				</div>
				<div style="display: flex; justify-content: space-between; align-items: center;">
					<div> <p style="color: #ff5722; font-weight: 500; ">
					<?php  echo number_format($tours[$i][5]) ?> </p>
				</div>
				<div>
					<button type="button" class="btn btn-primary">BOOK TOUR</button>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</div>




</div>
</div>
</div>


<div class="container" style="padding-bottom: 15px;">
	<div class="row" style="justify-content: space-around; flex-wrap: wrap;">
		<div class="col-lg-6 col-md-6 col-sm-6 col-12">
			<a href="" title="Son Doong" target="_blank">
				<img src="https://tinquangbinh.com/wp-content/uploads/2018/10/son-doong-se-dat-ky-luc-moi.png" style="width: 550px; height: 310px;cursor: pointer;">
			</a>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-12">
			<a href="" title="Da Nang" target="_blank">
				<img src="https://dulichthaiduong.com/wp-content/uploads/2018/11/636454664ef6aea8f7e7.jpg" style="width: 550px; height: 310px;cursor: pointer;">
			</a>
		</div>
	</div>
</div>

	<div class="container">
		<hr>
		<div class="row">
			<div class="col-lg-12">
					<div style="text-align: center; margin-bottom: 20px;">
						<h2 style="text-transform: uppercase;"><p style="color: black" title=""><span style="color: #ff5722">favorite destination</span></p></h2>
						<p style="color: #888;">Domestic and foreign travel destinations</p>
					</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-6">
				<div style="position: relative; overflow: hidden;">
					<a title="Vịnh Hạ Long">
						<div>
							<img src="//bizweb.dktcdn.net/100/372/532/themes/744930/assets/evo_tour_destination_image_1.jpg?1576827284843">
						</div>
						<div style="background-image: url(//bizweb.dktcdn.net/100/372/532/themes/744930/assets/evo-tour-destinate.png?1576558299488);position: absolute; bottom: 0;  padding: 50px 10px 10px 10px; width: 100%;  color: #fff;  z-index: 999;">
							<div class="destination-name">Vịnh Hạ Long</div>
							<div class="destination-like">Đã có <span>1,600 +</span> lượt khách</div>
						</div>
					</a>
				</div>
			</div>
			--
		</div>
	</div>

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
</body>
</html>