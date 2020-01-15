<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "myhotel";

$db = new mysqli($servername, $username, $password, $database);

include '../model/Room.php';
$room_select_sql = "SELECT * FROM room";
$room_select = $db->query($room_select_sql)->fetch_all(MYSQLI_ASSOC);

$rooms = array();
for($i = 0; $i < count($room_select); $i++) {
	$room = $room_select[$i];
	array_push($rooms, new Room($room['id'],  $room['image'], $room['name'], $room['price'], $room['max'], $room['rate']));
}

if (isset($_POST['upload'])) {
	$sql = "INSERT INTO room (image,name, price, max) VALUES ('".$_POST['image']."', '".$_POST['new-name']."','".$_POST['new-price']."','".$_POST['max']."')";
	$db->query($sql);
	header("refresh:0");
}

if (isset($_POST['upload-food'])) {
	$sql_add_food = "INSERT INTO food (image,name, price, info) VALUES ('".$_POST['image-food']."', '".$_POST['new-name-food']."','".$_POST['new-price-food']."','".$_POST['new-info']."')";
	$db->query($sql_add_food);
	header("refresh:0");
}

if (isset($_POST['upload-tour'])) {
	$sql_add_tour = "INSERT INTO tour (image,name,start, time, price) VALUES ('".$_POST['imagee']."', '".$_POST['namee']."','".$_POST['startt']."','".$_POST['timee']."', '".$_POST['pricee']."')";
	$db->query($sql_add_tour);
	header("refresh:0");
}

if (isset($_POST['upload-photo'])) {
	$sql_add_gallery = "INSERT INTO gallery (image,title, timeUpdate) VALUES ('".$_POST['up-gallery']."', '".$_POST['up-title']."','".date("Y-m-d")."')";
	$db->query($sql_add_gallery);
	header("refresh:0");
}

if (isset($_POST['book-room'])) {
	$book_room_sql = "INSERT INTO booking (checkIn,checkOut,type,adults,children,userId) VALUES('".$_POST["check-in"]."','".$_POST["check-out"]."','".$_POST["type"]."','".$_POST["adults"]."','".$_POST["child"]."','".$_SESSION["id"]."')";
	$db->query($book_room_sql);
} 

include '../model/User.php';
$user_select_sql  = "SELECT * FROM User";
$user_select = $db->query($user_select_sql )->fetch_all(MYSQLI_ASSOC);
$users = array();
for($i = 0; $i < count($user_select); $i++) {
	$user = $user_select[$i];
	array_push($users, new User($user['id'],  $user['fullName'], $user['password'], $user['email'], $user['phone'], $user['birthday'], $user['roll']));
}

if(isset($_POST["room-delete"])){
	$room_remove = "DELETE from room where id = ".$_POST["room-delete"];
	$db->query($room_remove);
	header("refresh:0");
}

$about = "SELECT * FROM about";
$about_select = $db->query($about)->fetch_all(MYSQLI_ASSOC);

include '../model/Food.php';
$food_select_sql = "SELECT * FROM food";
$food_select = $db->query($food_select_sql)->fetch_all(MYSQLI_ASSOC);
$foods = array();
for($i = 0; $i < count($food_select); $i++) {
	$food = $food_select[$i];
	array_push($foods, new Food($food['id'],  $food['name'],  $food['image'], $food['price'], $food['info']));
}

$cmt_select_sql = "SELECT * FROM comment";
$cmt_select = $db->query($cmt_select_sql)->fetch_all(MYSQLI_ASSOC);

$forgives_select_sql = "SELECT * FROM forgive";
$forgives = $db->query($forgives_select_sql)->fetch_all(MYSQLI_ASSOC);

$booking_select_sql = "SELECT user.fullName, booking.checkIn, booking.checkOut,booking.type,booking.adults,booking.children 
FROM booking, user WHERE user.id = booking.userId";
$booking = $db->query($booking_select_sql)->fetch_all(MYSQLI_ASSOC);

include '../model/Tour.php';
$tours_select_sql = "SELECT * FROM tour";
$tour_select = $db->query($tours_select_sql)->fetch_all(MYSQLI_ASSOC);
$tours = array();
for($i = 0; $i < count($tour_select); $i++) {
	$tour = $tour_select[$i];
	array_push($tours, new Tour($tour['id'],  $tour['name'],  $tour['image'], $tour['start'], $tour['time'],$tour['price']));
}


include '../model/Gallery.php';
$galleries_select_sql = "SELECT * FROM gallery";
$galleries_select = $db->query($galleries_select_sql)->fetch_all(MYSQLI_ASSOC);
$galleries = array();
for($i = 0; $i < count($galleries_select); $i++) {
	$gallery = $galleries_select[$i];
	array_push($galleries, new Gallery($gallery['id'],  $gallery['title'],  $gallery['image'], $gallery['timeUpdate']));
}

if(isset($_POST["search-button"])){
	if(isset($_POST["search-input"])){
		if(is_string($_POST["search-input"])){
			$search_room_sql = "SELECT * FROM room WHERE name LIKE '%".$_POST["search-input"]."%'";
			$searching_room = $db->query($search_room_sql)->fetch_all(MYSQLI_ASSOC);
		}
		if(is_double($_POST["search-input"])){
			$search_room_by_price_sql = "SELECT * FROM room WHERE price > ".$_POST["search-input"];
			$searching_room_by_price = $db->query($search_room_by_price_sql)->fetch_all(MYSQLI_ASSOC);
		}
	}}



	$search_food_sql = "SELECT * FROM food WHERE name LIKE '%a%'";
	$searching_food = $db->query($search_food_sql)->fetch_all(MYSQLI_ASSOC);

	if(isset($_SESSION["log-in"])){
		$profile_sql  = "SELECT * FROM User WHERE id = ".$_SESSION["id"];
		$profile = $db->query($profile_sql)->fetch_all(MYSQLI_ASSOC);
	}


	if (isset($_SESSION['about-edit'])) {
		$about_select_by_id = "SELECT * FROM about WHERE id = ".$_SESSION['about-edit'];
		$about_edit_by_id = $db->query($about_select_by_id)->fetch_all(MYSQLI_ASSOC);

	}

	if(isset($_POST["edit-room"])){
		$_SESSION['edit-room'] = $_POST['edit-room'];
		$rooms_select_by_id = "SELECT * FROM room WHERE id = ".$_SESSION['edit-room'];
		$room_edit_by_id = $db->query($rooms_select_by_id)->fetch_all(MYSQLI_ASSOC);
	}


	if(isset($_POST['room-update-submit'])){
		$room_edit_sql = "UPDATE room
		SET image = '".$_POST["links-room"]."', name= '".$_POST["names-room"]."', max= '".$_POST["maxs"]."', price= '".$_POST["prices"]."'
		WHERE id = ".$_SESSION['edit-room'] ;
		$db->query($room_edit_sql);
		header("refresh:0");
	}

	if(isset($_POST["edit-food"])){
		$_SESSION['edit-food'] = $_POST['edit-food'];
		$foods_select_by_id = "SELECT * FROM food WHERE id = ".$_SESSION['edit-food'];
		$food_edit_by_id = $db->query($foods_select_by_id)->fetch_all(MYSQLI_ASSOC);
	}


	if(isset($_POST['food-update-submit'])){
		$food_edit_sql = "UPDATE food
		SET image = '".$_POST["links-food"]."', name= '".$_POST["names-food"]."', price= '".$_POST["prices-food"]."'
		WHERE id = ".$_SESSION['edit-food'] ;
		$db->query($food_edit_sql);
		header("refresh:0");
	}
	if(isset($_POST["edit-tour"])){
		$_SESSION['edit-tour'] = $_POST['edit-tour'];
		$tours_select_by_id = "SELECT * FROM tour WHERE id = ".$_SESSION['edit-tour'];
		$tour_edit_by_id = $db->query($tours_select_by_id)->fetch_all(MYSQLI_ASSOC);
	}

	if(isset($_POST['tour-update-submit'])){
		$tour_edit_sql = "UPDATE tour
		SET image = '".$_POST["links-tour"]."', name= '".$_POST["names-tour"]."', price= '".$_POST["prices-tour"]."', time = '".$_POST["times"]."', start = '".$_POST["starts"]."'
		WHERE id = ".$_SESSION['edit-tour'] ;
		$db->query($tour_edit_sql);
		header("refresh:0");
	}

	if(isset($_POST["edit-food"])){
		$_SESSION['edit-food'] = $_POST['edit-food'];
		$foods_select_by_id = "SELECT * FROM food WHERE id = ".$_SESSION['edit-food'];
		$food_edit_by_id = $db->query($foods_select_by_id)->fetch_all(MYSQLI_ASSOC);
	}


	if(isset($_POST['about-update-submit'])){
		$about_edit_sql = "UPDATE about
		SET title = '".$_POST["title-update"]."', content= '".$_POST["content-update"]."'
		WHERE id = ".$_SESSION['about-edit'] ;
		$db->query($about_edit_sql);
		header("refresh:0");
	}

	if(isset($_POST['about-delete'])){
		$about_delete_sql = "DELETE from about where id = ".$_POST["about-delete"];
		$db->query($about_delete_sql);
		header("refresh:0");
	}

	if(isset($_POST['food-delete'])){
		$food_delete_sql = "DELETE from food where id = ".$_POST["food-delete"];
		$db->query($food_delete_sql);
		header("refresh:0");
	}

	if(isset($_POST['tour-delete'])){
		$tour_delete_sql = "DELETE from tour where id = ".$_POST["tour-delete"];
		$db->query($tour_delete_sql);
		header("refresh:0");
	}


	if(isset($_SESSION["id"])){
		$cart_select_sql = "SELECT * FROM cart WHERE userId = ".$_SESSION["id"]." AND type = 'food'";
		$cart_select = $db->query($cart_select_sql)->fetch_all(MYSQLI_ASSOC);

		$room_cart_select_sql = "SELECT * FROM cart WHERE userId = ".$_SESSION["id"]." AND type = 'room'";
		$room_cart_select = $db->query($room_cart_select_sql)->fetch_all(MYSQLI_ASSOC);

		$tour_cart_select_sql = "SELECT * FROM cart WHERE userId = ".$_SESSION["id"]." AND type = 'tour'";
		$tour_cart_select = $db->query($tour_cart_select_sql)->fetch_all(MYSQLI_ASSOC);
	}

	if (isset($_POST["info-room"])) {
		$_SESSION["id-room-detail"] = $_POST["info-room"];
		header("location:room-detail.php");
	}

	if(isset($_SESSION["id-room-detail"])){
		$room_detail_sql  = "SELECT * FROM room WHERE id = ".$_SESSION["id-room-detail"];
		$room_detail = $db->query($room_detail_sql)->fetch_all(MYSQLI_ASSOC);
	}


	if(isset($_POST["id-room"])){
		$room_cart_sql  = "SELECT * FROM room WHERE id = ".$_POST["id-room"];
		$room_cart = $db->query($room_cart_sql)->fetch_all(MYSQLI_ASSOC);
		$room_cart1 = "INSERT INTO cart (userId,productId,productName,quantity ,price,type) VALUES('".$_SESSION["id"]."',".$_POST["id-room"].",'".$room_cart[0]['name']."',1,'".$room_cart[0]['price']."', 'room')";
		$db->query($room_cart1);
	}


	if(isset($_POST["send-feedback"])){
		$sql_feedback_insert = "INSERT INTO comment (name,email,content) VALUES('".$_POST["names"]."','".$_POST["emails"]."','".$_POST["msg"]."')";
		echo $sql_feedback_insert;
		$db->query($sql_feedback_insert);
		header("refresh:0");
	}

	if(isset($_POST["remove-cart"])){
		$cart_remove = "DELETE from cart where id = ".$_POST["remove-cart"];
		$db->query($cart_remove);
		header("refresh:0");
	}

	if(isset($_POST["tour-cart-id"])){
		$select_tour_cart_sql  = "SELECT * FROM tour WHERE id = ".$_POST["tour-cart-id"];
		$cart_tour = $db->query($select_tour_cart_sql)->fetch_all(MYSQLI_ASSOC);
		$sql_cart_insert = "INSERT INTO cart (userId,productId,productName,quantity ,price,type) VALUES('".$_SESSION["id"]."',".$_POST["tour-cart-id"].",'".$cart_tour[0]['name']."',1,'".$cart_tour[0]['price']."', 'tour')";
		$db->query($sql_cart_insert);
	}


	if(isset($_POST["cart"])){
		$select_cart_sql  = "SELECT * FROM food WHERE id = ".$_POST["cart"];
		$cartt = $db->query($select_cart_sql)->fetch_all(MYSQLI_ASSOC);
		$sql_cart = "INSERT INTO cart (userId,productId,productName,quantity ,price,type) VALUES('".$_SESSION["id"]."',".$_POST["cart"].",'".$cartt[0]['name']."',1,'".$cartt[0]['price']."', 'food')";
		$db->query($sql_cart);
	}

	?>