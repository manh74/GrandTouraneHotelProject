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
				<li class="nav-item active">
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
</div>

<div class="container" id="show">
	<div class="row border border-success">
		<?php for ($i=0; $i < count($about_select); $i++) { ?>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div>
					<h2 style="text-transform: uppercase;">
						<p>
							<form method="post">
								<span class="col-md-6" style="color: #ff5722"><i class="ion-heart" style="color: red"></i><?php echo $about_select[$i]["title"] ?></span>
								<?php if(isset($_SESSION["admin"])){?>
									<button class="btn btn-info"  name="about-edit" value="<?php echo $about_select[$i]["id"]?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
									<button class="btn btn-danger" name="about-delete" value=<?php echo $about_select[$i]["id"] ?>><i class="fa fa-trash" aria-hidden="true"></i></a></button>
								<?php } ?>
							</form>
						</p>
					</h2>
				</div>
				<div>
					<?php echo $about_select[$i]["content"] ?>
				</div>
			</div>
			<br>
		<?php } ?>
	</div>
<br>
<?php include 'edit-about-form.php'; ?>
<br>

<div class="container border border-danger">
	<div class="row" style="justify-content: center">
		<?php if(isset($_SESSION["log-in"])){ ?>
		<div class="col-sm-6 col-sm-offset-3">
			<h3>Give us a feedback</h3>
			<form method="post">
				<div class="row">
					<div class="form-group col-sm-6">
						<label style="size: 15px">Name:</label>
						<input class="form-control" rows="5" name="names" value="<?php echo $profile[0]['fullName']; ?>">
					</div>
					<div class="form-group col-sm-6">
						<label tyle="size: 15px">Email:</label>
						<p name="emails" value=""><?php echo $profile[0]['email']; ?></p>
					</div>
				</div>
				<div class="form-group">
					<label tyle="size: 15px">Message:</label>
					<textarea id="message" class="form-control" rows="5" placeholder="Enter your message" name="msg" required></textarea>
				</div>
				<button type="submit" name="send-feedback" class="btn btn-success btn-lg pull-right ">Send</button>
			</form>
		</div>
	<?php } else{?>
		<button style="background: none;border: 1px solid gray; text-transform: uppercase;" type="submit" id="log-in" data-toggle="modal" data-target="#login"><a class="nav-link">Login to evaluate</a></button>
	<?php } ?>
	</div>
</div>
<br>
<div class="container">
	<?php include 'footer.php';
	?>
</div>
</div>
</body>
</html>