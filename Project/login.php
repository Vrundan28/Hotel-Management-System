<?php
$msg = "";
if (isset($_GET['id']) && $_GET['id'] == 5) {
    $msg = "Plaese Login To access all Facilities.";
} else if (isset($_GET['id']) && $_GET['id'] == 1) {
    $msg =  "Please enter valid username and password. ";
}else if (isset($_GET['id']) && $_GET['id'] == 6) {
    $msg =  "Password Updated Succesfully. ";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Login</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
            </svg>
            &nbsp;&nbsp;&nbsp;
            <a class="navbar-brand" href="home.php">Hotel</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            </div>
        </div>
    </nav>

    <div align="center" style="margin: 100px;">
        <div <?php echo (!empty($msg)); ?>>
            <span><?php echo $msg; ?></span>
        </div>
        <h1 style="font-family: Calibri Light;"><b><i>Log in</i></b></h1>
        <form action="validateLogin.php" method="POST">
            <div style="width: 250px;">
                <input type="text" class="form-control" name="username" placeholder="Username" required><br>

                <input type="password" class="form-control" name="password" placeholder="Password" required><br>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">LOG IN</button><br>
            <h5><a href="forgot_password.php">Forgot Password</a><br></h5>
            <h5>New User ? <a href="signup.php">Click Here</a></h5>
        </form>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>