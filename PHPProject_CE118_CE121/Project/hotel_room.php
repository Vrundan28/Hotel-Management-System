<?php
session_start();
require_once "config.php";
$x = "x";
$query = "SELECT * FROM TYPEOFROOM";
$query1 = $dbhandler->query($query);
$r = $query1->fetchAll();
foreach ($r as $tmp) {
    if ($tmp['type'] === 'Deluxe_room') {
        $x_2 = $tmp['price_2'];
        $x_3 = $tmp['price_3'];
    } else if ($tmp['type'] === 'Premium_room') {
        $y_2 = $tmp['price_2'];
        $y_3 = $tmp['price_3'];
    } else {
        $z_2 = $tmp['price_2'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Rooms</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
            </svg>
            &nbsp;&nbsp;&nbsp;
            <a href="home.php" class="navbar-brand" style="font-family: Calibri Light; padding-top:8px"><b><i>Hotel</i></b></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown"></div>
            <?php
            if (isset($_SESSION['username'])) {
            ?>
                <a class="navbar-brand" href="profile.php">Welcome, <?php echo $_SESSION['username'] ?> &nbsp;|&nbsp; </a>
                <a class="navbar-brand" href="home.php?id=5">Logout</a>
            <?php
            } else {
            ?>
                <a class="navbar-brand" href="login.php">Login</a>
            <?php
            }
            ?>
        </div>
    </nav>
    <h1 align="center">Types Of Rooms</h1>
    <hr><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;height: 25rem; border-radius: 25px">
                    <img src="images/x.jpg" class="card-img-top" alt="..." style="border-radius: 25px;height: 500px">
                    <div class="card-body">
                        <h5 class="card-title">Deluxe Room</h5>
                        <p class="card-text">Price for 2 people :- <b>&#8377</b> <?php echo $x_2 ?></p>
                        <p class="card-text">Price for 3 people :- <b>&#8377</b> <?php echo $x_3 ?></p>
                        <a href="booking_x.php" class="btn btn-primary">Book</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem; height: 25rem;border-radius: 25px">
                    <img src="images/y.jpg" class="card-img-top" alt="..." style="border-radius: 25px; height: 500px">
                    <div class="card-body">
                        <h5 class="card-title">Premium Room</h5>
                        <p class="card-text">Price for 2 people :- <b>&#8377</b> <?php echo $y_2 ?></p>
                        <p class="card-text">Price for 3 people :- <b>&#8377</b> <?php echo $y_3 ?></p>
                        <a href="booking_y.php" class="btn btn-primary">Book</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem; height: 25rem;border-radius: 25px">
                    <img src="images/z.jpg" class="card-img-top" alt="..." style="border-radius: 25px;height: 500px">
                    <div class="card-body">
                        <h5 class="card-title">King Suite</h5>
                        <p class="card-text">Price for 2 people :- <b>&#8377</b> <?php echo $z_2 ?></p>
                        <p>Rooms for 3 not available</p>
                        <a href="booking_z.php" class="btn btn-primary">Book</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>