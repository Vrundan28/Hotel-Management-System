<?php
session_start();

require_once "config.php";

if (isset($_SESSION['fullname'])) {
    $name = $_SESSION["fullname"];
    $phone_number = $_SESSION["phone_number"];

    $date_err = $booking_err = "";

    if (isset($_POST['submit1'])) {
        $checkindate = $_POST['check_in_date'];
        $checkoutdate = $_POST['check_out_date'];
        $_SESSION['checkindate'] = $checkindate;
        $_SESSION['checkoutdate'] = $checkoutdate;
        
        if ($checkindate > $checkoutdate) {
            header('Location:booking_x.php?id=1');
        }
    }
    if (isset($_POST['submit2'])) {
        $checkindate = $_SESSION['checkindate'];
        $checkoutdate = $_SESSION['checkoutdate'];
        $capacity = $_POST['capacity'];
        $numofroom = $_POST['num_rooms'];
        $_SESSION['capacity'] = $capacity;
        $_SESSION['numofroom'] = $numofroom;
        $username = $_SESSION['username'];
        $x = "Deluxe_room";
        $query = "SELECT * FROM booking WHERE type = '$x'";
        $query1 = $dbhandler->query($query);
        $r = $query1->fetchAll();
        $tmp_2 = $tmp_3 = 0;
        foreach ($r as $t) {
            if($t['capacity'] == 2 && (($checkindate <= $t['checkindate'] && $checkoutdate >= $t['checkindate']) || ($checkindate >= $t['checkindate'] && $checkindate <= $t['checkoutdate']) ) ){
                $tmp_2 += $t['numofrooms'];
            }
            else if($t['capacity'] == 3 && (($checkindate <= $t['checkindate'] && $checkoutdate >= $t['checkindate']) || ($checkindate >= $t['checkindate'] && $checkindate <= $t['checkoutdate'])) ){
                $tmp_3 += $t['numofrooms'];
            }
        }
        $query = "SELECT * FROM occupancy WHERE type = '$x'";
        $query1 = $dbhandler->query($query);
        $r = $query1->fetchAll();
        $tmp = 0;
        foreach ($r as $t){
            if($capacity == 2)
                $tmp = $t['available_2'];
            else
                $tmp = $t['available_3'];
        }
        if($capacity == 2){
            if ($tmp-$tmp_2 >= $numofroom) {
                $query = "INSERT INTO Customer(name,phone_number,username,type,numofrooms,capacity,check_in_date,check_out_date) VALUES('$name','$phone_number','$username','$x','$numofroom','$capacity','$checkindate','$checkoutdate')";
                $query1 = $dbhandler->query($query);

                $query = "INSERT INTO booking(name,type,numofrooms,capacity,checkindate,checkoutdate) VALUES('$name','$x','$numofroom','$capacity','$checkindate','$checkoutdate')";
                $query1 = $dbhandler->query($query);
                
                header('Location:recipt_x.php?id=1');
            } else {
                $booking_err = "<h5> Rooms Of your choice are full please Try some another category. </h5>";
            }
        }
        else{
            if ($tmp-$tmp_3 >= $numofroom) {
                $query = "INSERT INTO Customer(name,phone_number,username,type,numofrooms,capacity,check_in_date,check_out_date) VALUES('$name','$phone_number','$username','$x','$numofroom','$capacity','$checkindate','$checkoutdate')";
                $query1 = $dbhandler->query($query);

                $query = "INSERT INTO booking(name,type,numofrooms,capacity,checkindate,checkoutdate) VALUES('$name','$x','$numofroom','$capacity','$checkindate','$checkoutdate')";
                $query1 = $dbhandler->query($query);

                header('Location:recipt_x.php?id=1');
            } else {
                $booking_err = "<h5> Rooms Of your choice are full please Try some another category. </h5>";
            }
        }
    }
    
} else {
    header('Location:login.php?id=5');
    exit(0);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Booking</title>
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
    <div class="container" style="background-color: #FFFFFF; border-radius: 15px; margin-top: 40px;padding: 80px;" align="center">

        <div <?php echo (!empty($booking_err)); ?>>
            <span><?php echo $booking_err; ?></span>
        </div>
        <div style="width: 500px;">
            <!-- background-color: grey; border-radius:25px"> -->
            <form action="booking_x1.php" method="POST">
                <input type="radio" name="capacity" value="2" /> Capacity 2<br>
                <input type="radio" name="capacity" value="3" /> Capacity 3<br><br>
                <div class="col-md-4">
                    Number of rooms :-
                    <input type="number" class="form-control" name="num_rooms" /><br>
                    <p><br>
                </div>
                <input type="submit" class="btn btn-primary" name="submit2" value="Submit" />

            </form>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>