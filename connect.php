<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "myhotel";

$db = new mysqli($servername, $username, $password, $database);

$room_select_sql = "SELECT * FROM rooms";
$room_select = $db->query($room_select_sql)->fetch_all();

$user = "SELECT * FROM Users";
$user_select = $db->query($user)->fetch_all();

if(isset($_POST["room-delete"])){
$room_remove = "DELETE from rooms where id = ".$_POST["room-delete"];
$db->query($room_remove);
header("refresh:0");
}
$about = "SELECT * FROM about";
$about_select = $db->query($about)->fetch_all();

?>