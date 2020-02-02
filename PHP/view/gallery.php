<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Gallery</title>
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
				<li class="nav-item active">
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
<?php include 'login-modal.php'; ?>
<br><br><br><br><br>
<div class="container">
	<center>
		<span style="padding: 0 20px;
		font-family: 'FontTitle';
		font-size: 32px;
		font-weight: 700;
		position: relative;
		color: #303f39;
		text-transform: uppercase;">ALL PHOTO</span>
		<?php if(isset($_SESSION["admin"])){?>
			<br>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload">Upload</button>
			<hr>
		<?php } ?>
	</center>
	<div class="product-detail">
	<div style="display: flex; justify-content: space-between;">
		<div class="modal fade" id="upload" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addNewFood">UPLOAD A PHOTO</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST">
							<div class="form-group">
								<label>Link image:</label>
								<input type="text" class="form-control" placeholder="Enter link image" name="up-gallery">
							</div>
							<div class="form-group">
								<label for="new-name">Title:</label>
								<input type="text" class="form-control" placeholder="Enter title" name="up-title">
							</div>
						</div>
						<div class="modal-footer" style="display: flex; justify-content: space-between;">
							<div>
								<a href="https://imgbb.com/"><button type="button" class="btn btn-danger">Get link for image</button></a>
							</div>
							<div>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" name="upload-photo">Add</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>

	<div class="row" style="background: none">
		<div class="col-xs-12">
			<div class="row"> 
				<?php for ($i=0; $i < count($galleries); $i++) { ?>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 5px;">
						<div style="position: relative; overflow: hidden;">
							<a title="<?php echo $galleries[$i]->title ?>">
								<div>
									<img style="height: 300px; width: 400px; position: relative;" src="<?php echo $galleries[$i]->image ?>">
								</div>
								<div style="background-image: url(//bizweb.dktcdn.net/100/372/532/themes/744930/assets/evo-tour-destinate.png?1576558299488);position: absolute; bottom: 0;  padding: 50px 10px 0px 10px; width: 100%;  color: #fff;  z-index: 999;">
									<div><b><?php echo $galleries[$i]->title ?></b></div>
									<div>Time upload:<span> <?php echo $galleries[$i]->timeUpdate ?></span></div>
									<?php if(isset($_SESSION["admin"])){?>
										<form method="post">
											<button type="submit" name="gallery-delete" value="<?php echo  $galleries[$i]->id ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></button>
										</form>
									<?php } ?>
								</div>
							</a>
						</div>
					</div>
				<?php } ?>               
			</div>
		</div>
	</div>
</div>
<br>
<div class="container">
	<?php include 'footer.php'; ?>
</div>


</body>
</html>