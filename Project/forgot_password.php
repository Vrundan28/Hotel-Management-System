<?php
require_once "config.php";
$username_err = "";
if (isset($_POST['submit'])) {
    
    $tmp_username = trim($_POST['username']);
    try {
        $query = "SELECT * FROM User WHERE Username = '$tmp_username'";
        $query1 = $dbhandler->query($query);
        $r = $query1->fetchAll();
        if (empty($r)) {
            $username_err = "Username doesnot exist";
        } else {
            $username = $tmp_username;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if (empty($username_err)) {
        try {
            $query = "UPDATE User SET Password='$password' WHERE Username = '$username'";
            $query1 = $dbhandler->query($query);
            header('Location:login.php?id=6');
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Change Password</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
            </svg>
            &nbsp;&nbsp;&nbsp;
            <a class="navbar-brand" href="home.php"> Hotel</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            </div>
        </div>
    </nav>

    <div align="center" style="margin: 100px;">
        <div <?php echo (!empty($username_err)); ?>>
            <span><?php echo $username_err; ?></span>
        </div>
        <h1 style="font-family: Calibri Light;"><b><i>Update Password</i></b></h1><br>
        <form action="forgot_password.php" method="POST">
            <div style="width: 250px;">

                <input type="text" class="form-control" name="username" placeholder="Username" required><br>

                <input type="password" class="form-control" name="password" placeholder="New Password" required><br>

            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update!!!"><br>

        </form>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>