<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>About Us</title>
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
			<a class="navbar-brand" href="index.php"><img src="../../img/logo2.png"></a>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">HOME</a>
				</li>

				<li class="nav-item active">
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
				<li class="nav-item" style="display: flex;">
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
<?php include 'login-modal.php'; ?>
<br><br><br><br><br>

<div class="container">
	<form method="post">
		<div class="header d-flex justify-content-between">
			<div>
				<h1><b><?php echo $room_detail[0]["name"]; ?></b></h1>
			</div>
			<div>
				<button type="submit" name="room-before-detail" class="btn btn-success"><i class="ion-arrow-left-b"></i></button>
				<button type="submit" name="room-next-detail" class="btn btn-warning"><i class="ion-arrow-right-b"></i></button>
			</div>
			<hr>
		</div>
	</form>

	<div class="row" style="display: flex; justify-content: space-around;">

		<div class="col-6">
			<div class="list-group">
				<button type="button" class="list-group-item list-group-item-action"><i class="fa fa-home"></i><?php echo "Name: <b>".$room_detail[0]["name"]."</b>"; ?></button>
				<button type="button" class="list-group-item list-group-item-action"><i class="fa fa-dollar"></i><?php echo "Price: <b>".number_format($room_detail[0]["price"])."VND</b>"; ?></button>
				<button type="button" class="list-group-item list-group-item-action"><i class="fa fa-user"></i><?php echo "Max: <b>".$room_detail[0]["max"]."</b>"; ?></button>
				<button type="button" class="list-group-item list-group-item-action"><i class="ion-ios-pulse-strong"></i><?php echo "Rate: "; for($j = 0; $j < $room_detail[0]["rate"]; $j++){ ?><i class="fa fa-star" style="color: yellow" aria-hidden="true"></i><?php } ?></button>
				<i class="fa fa-star-half"></i>
			</div>
			<br>
			<?php if(isset($_SESSION["log-in"])){ ?>
				<button type="submit" class="btn btn-primary" name="id-room" value="<?php echo $room_detail[0]["id"] ?>" style="color: white"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button> 
			<?php } ?>
		</div>
		<div class="col-6">
			<img width="500px" src="<?php echo $room_detail[0]["image"]; ?>">
		</div>

	</div>
</div>
<br>
<div class="container">
	<?php include 'footer.php';
	?>
</div>
</body>
</html>