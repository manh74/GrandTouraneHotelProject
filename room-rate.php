<!DOCTYPE html>
<html lang="en">
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


<div class="container" style="margin-top: 300px">
<?php 
include "connect.php";
for($i = 0; $i < count($room_select); $i++){
    if($i %2 ==0){?>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div>
                                <a href="room-detail.html"><img src="<?php echo $room_select[$i][1] ?>" alt="#" width="600px" height="300px"></a>
                            </div>
                        </div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="text">
                                <h2><?php echo $room_select[$i][2]."/".$room_select[$i][4] ?></h2>
                                <h5><?php echo $room_select[$i][3] ?> per day</h5>
                                <p> ABC </p>
                                <a href="room-detail.html" class="btn btn-room">VIEW DETAILS</a>
                                <button class="btn btn-room" style="background-color: #c0a753">BOOK NOW </button>
                            </div>
                        </div>
                    </div>
                    <br>
<?php } else{ ?>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="text">
                                <h2><?php echo $room_select[$i][2]."/".$room_select[$i][4] ?></h2>
                                <h5> <?php echo $room_select[$i][3] ?> per day</h5>
                                <p>ABC
                                </p>
                                <a href="room-detail.html" class="view-dateails btn btn-room">VIEW DETAILS</a>
                                <button class="btn btn-room" style="background-color: #c0a753">BOOK NOW </button>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div>
                                <a href="room-detail.html"><img src="<?php echo $room_select[$i][1] ?>" alt="#" width="600px" height="300px"></a>
                            </div>
                        </div>
                    </div>
                    <br>
<?php } }?>
</div>
    
</body>
</html>