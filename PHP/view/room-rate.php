<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Room & Rate</title>
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
    <?php session_start();
    include "connect.php";
    ?>
    <div class="container"><nav class="navbar navbar-fixed-top navbar navbar-expand-lg navbar-dark bg-dark " style="position: fixed; z-index: 999; width: 1110px; ">
        <div class="collapse navbar-collapse" id="navbar">
            <a class="navbar-brand" href="index.php"><img src="../../img/logo2.png"></a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
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
                <li class="nav-item active" style="display: flex">
                    <?php if(isset($_SESSION["log-in"])){ ?>
                        <a class="nav-link" name="profile" href="profile.php"><i class="ion-person"></i></a>
                        <a class="nav-link" name="cart" href="cart.php"><i class="ion-ios-cart"></i></a>
                        <form method="post" action="room-rate.php">
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
    <div style="width: 100%; height: 20px; border-bottom: 2px solid red; text-align: center; margin-top: 170px">
      <span style="font-size: 40px; background-color: #F3F5F6; padding: 0 10px;">
        ROOM & RATE 
    </span>
</div>
</div>

<form method="post">
    <div class="container" style="border: 1px solid #E5C9EF">
        <br><br><hr>
        <?php 
        include 'add-room-modal.php';
        for($i = 0; $i < count($rooms); $i++){
            if($i %2 ==0){?>
                <div class="row" style="border: 1px solid #E5C9EF">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-8">
                        <div>
                            <a href="room-detail.html"><img src="<?php echo $rooms[$i]->image ?> " alt="#" width="600px" height="300px"></a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="text-uppercase align-items-center">
                            <h3><b><?php echo $rooms[$i]->name ?></b></h3>
                            <h5><i class="fa fa-money" aria-hidden="true"></i><b style="color: red"><?php echo number_format($rooms[$i]->price) ?>/day</b></h5>
                            <p><i class="fa fa-child" aria-hidden="true"></i> <?php echo $rooms[$i]->max ?></p>
                            <i class="ion-ios-pulse-strong"></i><?php for($j = 0; $j < $rooms[$i]->rate; $j++){  ?>
                                <i class="fa fa-star" style="color: yellow" aria-hidden="true"></i>
                            <?php }?>
                            <br>
                            <button class="btn btn-primary" type="submit" name="info-room" value="<?php echo $rooms[$i]->id ?>"><i class="fa fa-info" aria-hidden="true"></i></button>
                            <?php if(isset($_SESSION["log-in"])){ ?>
                                <button type="submit" class="btn btn-primary" name="id-room" value="<?php echo $rooms[$i]->id ?>" style="color: white"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button> 
                            <?php } if(isset($_SESSION["admin"])){?>
                                <button type="submit" name="edit-room" value="<?php echo $rooms[$i]->id ?>" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                <button class="btn btn-danger" type="submit" name="room-delete" value=<?php echo $rooms[$i]->id ?>><i class="fa fa-trash" aria-hidden="true"></i></a></button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <br>
            <?php } else{ ?>
             <div class="row" style="border: 1px solid #E5C9EF">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-5">
                    <div class="text-uppercase align-items-center">
                            <h3><b><?php echo $rooms[$i]->name ?></b></h3>
                            <h5><i class="fa fa-money" aria-hidden="true"></i><b style="color: red"><?php echo number_format($rooms[$i]->price) ?>/day</b></h5>
                            <p><i class="fa fa-child" aria-hidden="true"></i> <?php echo $rooms[$i]->max ?></p>
                            <i class="ion-ios-pulse-strong"></i><?php for($j = 0; $j < $rooms[$i]->rate; $j++){  ?>
                                <i class="fa fa-star" style="color: yellow" aria-hidden="true"></i>
                            <?php }?>
                            <br>
                            <button class="btn btn-primary" type="submit" name="info-room" value="<?php echo $rooms[$i]->id ?>"><i class="fa fa-info" aria-hidden="true"></i></button>
                            <?php if(isset($_SESSION["log-in"])){ ?>
                                <button type="submit" class="btn btn-primary" name="id-room" value="<?php echo $rooms[$i]->id ?>" style="color: white"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button> 
                            <?php } if(isset($_SESSION["admin"])){?>
                                <button type="submit" name="edit-room" value="<?php echo $rooms[$i]->id ?>" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                <button class="btn btn-danger" type="submit" name="room-delete" value=<?php echo $rooms[$i]->id ?>><i class="fa fa-trash" aria-hidden="true"></i></a></button>
                            <?php } ?>
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-7">
                    <div>
                        <a href="room-detail.html"><img src="<?php echo $rooms[$i]->image ?>" alt="#" width="600px" height="300px"></a>
                    </div>
                </div>
            </div>
            <br>
        <?php } }?>
    </div>
</form>
<?php include 'edit-room-form.php'; ?>
<br>
<div class="container">
    <?php include 'footer.php'; ?>
</div>

</body>
</html>