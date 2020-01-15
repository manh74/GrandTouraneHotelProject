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


	if(isset($_SESSION["id"])){
		$cart_select_sql = "SELECT * FROM cart WHERE userId = ".$_SESSION["id"]." AND type = 'food'";
		$cart_select = $db->query($cart_select_sql)->fetch_all(MYSQLI_ASSOC);

		$room_cart_select_sql = "SELECT * FROM cart WHERE userId = ".$_SESSION["id"]." AND type = 'room'";
		$room_cart_select = $db->query($room_cart_select_sql)->fetch_all(MYSQLI_ASSOC);

		$tour_cart_select_sql = "SELECT * FROM cart WHERE userId = ".$_SESSION["id"]." AND type = 'tour'";
		$tour_cart_select = $db->query($tour_cart_select_sql)->fetch_all(MYSQLI_ASSOC);
	}


	if(isset($_POST["id-room"])){
		$room_cart_sql  = "SELECT * FROM room WHERE id = ".$_POST["id-room"];
		$room_cart = $db->query($room_cart_sql)->fetch_all(MYSQLI_ASSOC);
		$room_cart1 = "INSERT INTO cart (userId,productId,productName,quantity ,price,type) VALUES('".$_SESSION["id"]."',".$_POST["id-room"].",'".$room_cart[0]['name']."',1,'".$room_cart[0]['price']."', 'room')";
		$db->query($room_cart1);
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