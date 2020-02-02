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
						<a class="nav-link " name="profile" href="profile.php"><i class="ion-person"></i></a>
						<a class="nav-link nav-item active" name="cart" href="cart.php"><i class="ion-ios-cart"></i></a>
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
	<?php include 'login-modal.php'; ?>
	<br><br><br><br><br>
	<div class="container">
		<?php if(isset($_SESSION['admin'])){
			?>
			Hello <b style="color: blue"><?php echo $_SESSION['full-name'] ?></b> - Admin
			<?php if (count($cart_admin_select)>0) {?>
				<div class="promo-title">
					<a class="promo-title-a" href="">LIST OF CUSTOMER WAITING</a>
					<form method="post" action=""> 					
						<table border="1px" align="center"> 						
							<tr> 
								<th>Customer name</th>
								<th>Product names</th> 
								<th>Type</th>
								<th>Quantity</th> 
								<th>Price</th>
								<th>Date start</th> 
								<th>Action</th> 
							</tr>
							<?php 
							$_SESSION['total-price-admin'] = 0;
							for ($i=0; $i < count($cart_admin_select); $i++) { ?> 
								<tr> 
									<td><?php echo  $cart_admin_select[$i]['fullName'] ?></td>
									<td><?php echo  $cart_admin_select[$i]['productName'] ?></td>
									<td><?php echo  $cart_admin_select[$i]['type'] ?></td> 
									<td><input type="text" size="5" value="<?php echo  $_SESSION['quantity-admin'] = $cart_admin_select[$i]['quantity'] ?>"></td> 
									<td name="price" value="<?php echo  $cart_admin_select[$i]['price'] ?>"><?php echo  $_SESSION['price-admin'] = $cart_admin_select[$i]['price'] ?></td> 
									<td><?php echo  $cart_admin_select[$i]['time'] ?></td>
									<td>
										<button type="submit" name="remove-cart-admin" value="<?php echo $cart_admin_select[$i]['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
										<button type="submit" name="update"><i class="fa fa-refresh" aria-hidden="true"></i></button>
									</td> 
								</tr>
								<?php 
								$_SESSION['total-price-admin']  +=  $_SESSION['price-admin']*$_SESSION['quantity-admin'];
							} ?>
							<tr> 
								<td colspan="7"><b>Total Price: <?php echo  number_format($_SESSION['total-price-admin'])."VND" ?><b></td> 
								</tr> 
							</table> 
							<br />
						</form> 
						<br /> 
					</div>
				<?php } ?>
				<?php if (count($view_all_tour)>0) {?>
					<div class="promo-title">
						<a class="promo-title-a" href="">LIST OF CUSTOMER ORDERED ROOM </a>
						<form method="post" action=""> 			
							<table border="1px" align="center"> 					
								<tr> 
									<th>Name</th> 
									<th>Check in</th> 
									<th>Check out</th> 
									<th>Type</th> 
									<th>Adult</th>
									<th>Children</th>
									<th>Action</th>
								</tr>
								<?php 
								for ($i=0; $i < count($view_all_tour); $i++) { ?> 
									<tr> 
										<td><?php echo  $view_all_tour[$i]['fullName'] ?></td> 
										<td><?php echo  $view_all_tour[$i]['checkIn'] ?></td> 
										<td><?php echo  $view_all_tour[$i]['checkOut'] ?></td>
										<td><?php echo  $view_all_tour[$i]['type'] ?></td> 
										<td><?php echo  $view_all_tour[$i]['adults'] ?></td> 
										<td><?php echo  $view_all_tour[$i]['children'] ?></td>  
										<td>
											<button type="submit" name="remove-booking" value="<?php echo $view_all_tour[$i]['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button> 
										</td> 
									</tr>
									<?php 
								} ?>
							</table> 
							<br/>	
						</form> 
						<br/> 
					</div>
				<?php }} else if (!isset($_SESSION["login"])) { ?>
					<div class="border-warning">
						<p style="font-family: Comic Sans MS"><b style="color: red">You are not logged in! Please login before viewing your cart!</b></p>
					</div>
				<?php } else { ?>
					<h1>View cart</h1> 
					<a href="index.php">Go back to products page</a>
					<div class="container">
						<?php if (count($cart_select)>0) {?>
							<div class="promo-title">
								<a class="promo-title-a" href="">FOOD</a>
								<form method="post" action=""> 					
									<table border="1px" align="center"> 							
										<tr> 
											<th>Name</th> 
											<th>Quantity</th> 
											<th>Price</th>
											<th>Date order</th>
											<th>Action</th> 
										</tr>
										<?php 
										$_SESSION['total'] = 0;
										for ($i=0; $i < count($cart_select); $i++) { ?> 
											<tr> 
												<td><?php echo  $cart_select[$i]['productName'] ?></td> 
												<td><input type="text" size="5" value="<?php echo  $_SESSION['quantity'] = $cart_select[$i]['quantity'] ?>"></td> 
												<td name="price" value="<?php echo  $cart_select[$i]['price'] ?>"><?php echo  $_SESSION['price'] = $cart_select[$i]['price'] ?></td> 
												<td><?php echo  $cart_select[$i]['time'] ?></td>
												<td>
													<button type="submit" name="remove-cart" value="<?php echo $cart_select[$i]['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
													<button type="submit" name="update"><i class="fa fa-refresh" aria-hidden="true"></i></button>
												</td> 
											</tr>
											<?php 
											$_SESSION['total']  +=  $_SESSION['price']*$_SESSION['quantity'];
										} ?>
										<tr> 
											<td colspan="5">Total Price: <b><?php echo  number_format($_SESSION['total'])."VND" ?></b></td> 
										</tr> 						
									</table> 
									<br />
									<p style="font-family: Comic Sans MS"><b style="color: red">*</b>Please wait for us to 10-15 minutes to prepare the dish!</p>						
								</form> 
								<br /> 
							</div>
						<?php } ?>
					</div>
					<br>
					<?php if (count($room_cart_select)>0) {?>
						<div class="promo-title">
							<a class="promo-title-a" href="">ROOM</a>
							<form method="post" action=""> 					
								<table border="1px" align="center"> 						
									<tr> 
										<th>Name</th> 
										<th>Quantity</th> 
										<th>Price</th>
										<th>Day start</th>
										<th>Action</th> 
									</tr>
									<?php 
									$_SESSION['total-price-room'] = 0;
									for ($i=0; $i < count($room_cart_select); $i++) { ?> 
										<tr> 
											<td><?php echo  $room_cart_select[$i]['productName'] ?></td> 
											<td><input type="text" size="5" value="<?php echo  $_SESSION['room-quantity'] = $room_cart_select[$i]['quantity'] ?>"></td> 
											<td name="price" value="<?php echo  $room_cart_select[$i]['price'] ?>"><?php echo  $_SESSION['room-price'] = $room_cart_select[$i]['price'] ?></td> 
											<td><?php echo  $room_cart_select[$i]['time'] ?></td>
											<td>
												<button type="submit" name="remove-cart" value="<?php echo $room_cart_select[$i]['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
												<button type="submit" name="update"><i class="fa fa-refresh" aria-hidden="true"></i></button>
											</td> 
										</tr>
										<?php 
										$_SESSION['total-price-room']  +=  $_SESSION['room-price']*$_SESSION['room-quantity'];
									} ?>
									<tr> 
										<td colspan="5">Total Price: <b><?php echo  number_format($_SESSION['total-price-room'])."VND" ?></b></td> 
									</tr> 						
								</table> 
								<br />	
								<p style="font-family: Comic Sans MS"><b style="color: red">*</b>Please arrive at the hotel on time!</p>				
							</form> 
							<br /> 
						</div>
					<?php } ?>
					<br>
					<?php if (count($tour_cart_select)>0) {?>
						<div class="promo-title">
							<a class="promo-title-a" href="">TOUR</a>
							<form method="post" action=""> 
								<table border="1px" align="center"> 
									<tr> 
										<th>Name</th> 
										<th>Quantity</th> 
										<th>Price</th> 
										<th>Action</th> 
									</tr>
									<?php 
									$_SESSION['total-price-tour'] = 0;
									for ($i=0; $i < count($tour_cart_select); $i++) { ?> 
										<tr> 
											<td><?php echo  $tour_cart_select[$i]['productName'] ?></td> 
											<td><input type="text" size="5" value="<?php echo  $_SESSION['tour_quantity'] = $tour_cart_select[$i]['quantity'] ?>"></td> 
											<td name="price" value="<?php echo  $tour_cart_select[$i]['price'] ?>"><?php echo  $_SESSION['tour_price'] = $tour_cart_select[$i]['price'] ?></td> 
											<td>
												<button type="submit" name="remove-tour-cart" value="<?php echo $tour_cart_select[$i]['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
												<button type="submit" name="update"><i class="fa fa-refresh" aria-hidden="true"></i></button>
											</td> 
										</tr>
										<?php 
										$_SESSION['total-price-tour']  +=  $_SESSION['tour_price']*$_SESSION['tour_quantity'];
									} ?>
									<tr> 
										<td colspan="4">Total Price: <b><?php echo  number_format($_SESSION['total-price-tour'])."VND" ?></b></td> 
									</tr> 
								</table> 
								<br />
								<p style="font-family: Comic Sans MS"><b style="color: red">*</b>We will rely on the information you have provided to contact you as soon as possible!</p>
							</form> 
							<br /> 
						</div>
					<?php }  if (count($booking)>0) {?>
						<div class="promo-title">
							<a class="promo-title-a" href="">ORDERED ROOM </a>
							<form method="post" action=""> 
								<table border="1px" align="center"> 
									<tr> 
										<th>Name</th> 
										<th>Check in</th> 
										<th>Check out</th> 
										<th>Type</th> 
										<th>Adult</th>
										<th>Children</th>
										<th>Action</th>
									</tr>
									<?php 
									for ($i=0; $i < count($booking); $i++) { ?> 
										<tr> 
											<td><?php echo  $booking[$i]['fullName'] ?></td> 
											<td><?php echo  $booking[$i]['checkIn'] ?></td> 
											<td><?php echo  $booking[$i]['checkOut'] ?></td>
											<td><?php echo  $booking[$i]['type'] ?></td> 
											<td><?php echo  $booking[$i]['adults'] ?></td> 
											<td><?php echo  $booking[$i]['children'] ?></td>  
											<td>
												<button type="submit" name="remove-booking" value="<?php echo $booking[$i]['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
											</td> 
										</tr>
										<?php 
									} ?>
								</table> 
								<br/>
								<p style="font-family: Comic Sans MS"><b style="color: red">*</b>Please arrive at the hotel on time!</p>	
							</form> 
							<br/> 
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</div>
	<br>
	<?php include 'footer.php'; ?>
</div>
</body>
</html>