<?php
session_start();
require_once "config.php";

if (isset($_SESSION['fullname'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM Customer WHERE username = '$username'";
    $query1 = $dbhandler->query($query);
    $r = $query1->fetchAll();
} else {
    header('Location:login.php?id=5');
    exit(0);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Bookings</title>
</head>

<body style="background-color: #2cabee;">
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
            </svg>
            &nbsp;&nbsp;&nbsp;
            <a href="home.php" class="navbar-brand" style="font-family: Calibri Light; padding-top:8px"><b><i>Hotel</i></b></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown"></div>

            <a class="navbar-brand" href="profile.php">Welcome, <?php echo $_SESSION['username'] ?> &nbsp;|&nbsp; </a>
            <a class="navbar-brand" href="home.php?id=5">Logout</a>
        </div>
    </nav>
    

    <div class="row">
    <?php
    foreach ($r as $t) {
    ?>
        <div class="card" style="width: 18rem; margin: 30px 50px;">
            <div class="card-body">
                <h5 class="card-title"> <?php echo "Type :- ".$t['type']; ?></h5>
                <p class="card-text"> <?php echo "Capacity ".$t['capacity']; ?></p>
                <p class="card-text"> <?php echo "Check in date :- ".$t['check_in_date']; ?></p>
                <p class="card-text"> <?php echo "Check out date :- ".$t['check_out_date'] ?></p>
                <p class="card-text"> <?php echo "Number of rooms booked :- ".$t['numofrooms'] ?></p>
            </div>
        </div>
    <?php
    }
    ?>
</div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>