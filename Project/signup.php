<?php
require_once "config.php";

$name = $email = $address = $phone_number = $username = $passsword = $confirm_password = "";
$name_err = $email_err = $address_err = $phone_number_err = $username_err = $password_err = $confirm_password_err = "";

if (isset($_POST['submit'])) {

    $tmp_name = trim($_POST["name"]);
    if (!filter_var($tmp_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $tmp_name;
    }

    $tmp_number = trim($_POST["phone_number"]);
    if (!ctype_digit($tmp_number)) {
        $phone_number_err = "Please enter valid phone number.";
    } else if (strlen($tmp_number) != 10) {
        $phone_number_err = "Phone number must be of length 10.";
    } else {
        $phone_number = $tmp_number;
    }

    $tmp_password = trim($_POST["password"]);
    $tmp_confirm_password = trim($_POST["confirm_password"]);

    if (empty($tmp_password)) {
        $password_err = "Please enter the password.";
    } else {
        $password = $tmp_password;
    }

    if (empty($tmp_confirm_password)) {
        $confirm_password_err = "Please enter the password again.";
    } else if ($tmp_password !==  $tmp_confirm_password) {
        $confirm_password_err = "Passwords doesn't match.";
    } else {
        $confirm_password = $tmp_confirm_password;
    }

    $address = trim($_POST["address"]);
    $email = trim($_POST["email"]);


    $tmp_username = trim($_POST['username']);
    try {
        $query = "SELECT * FROM User WHERE Username = '$tmp_username'";
        $query1 = $dbhandler->query($query);
        $r = $query1->fetchAll();
        if (!empty($r)) {
            $username_err = "Username already taken.";
        } else {
            $username = $tmp_username;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }


    if (!empty($name) && !empty($email) && !empty($address) && !empty($username) && !empty($password) && !empty($phone_number)) {
        try {
            $query = "INSERT INTO User(Name,Email,Address,Phone_number,Username,Password) VALUES('$name','$email','$address','$phone_number','$username','$password')";
            $query1 = $dbhandler->query($query);
            header('Location:login.php?id=2');
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
    <title>Sign Up</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light " >
        <div class="container-fluid">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
        </svg>  
        &nbsp;&nbsp;&nbsp;
          <a class="navbar-brand" href="home.php">Hotel</a>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">  
          </div>
          
          <a class="navbar-brand" href="login.php">Login</a>
        </div>
      </nav>


    <div align="center" style="margin: 45px;">
        <h1 style="font-family: Calibri Light;"><b><i>Sign up</i></b></h1>
        <div style="width: 240px;">
            <form action="signup.php" method="POST">
                <div <?php echo (!empty($name_err)); ?>>
                    <span><?php echo $name_err; ?></span>
                </div>
                <input type="text" class="form-control" name="name" placeholder="Enter name" required /><br>

                <input type="email" class="form-control" name="email" placeholder="email" required /><br>

                <input type="text" class="form-control" name="address" placeholder="Enter Address" required /><br>
                <div <?php echo (!empty($phone_number_err)); ?>>
                    <span><?php echo $phone_number_err; ?></span>
                </div>
                <input type="text" class="form-control" name="phone_number" placeholder="Phone number" required /><br>
                <div <?php echo (!empty($username_err)); ?>>
                    <span><?php echo $username_err; ?></span>
                </div>
                <input type="text" class="form-control" name="username" placeholder="username" required /><br>
                <div <?php echo (!empty($password_err)); ?>>
                    <span><?php echo $password_err; ?></span>
                </div>
                <input type="password" class="form-control" name="password" placeholder="password" required /><br>
                <div <?php echo (!empty($confirm_password_err)); ?>>
                    <span><?php echo $confirm_password_err; ?></span>
                </div>
                <input type="password" class="form-control" name="confirm_password" placeholder="confirm password" required /><br>

                <button type="submit" name="submit" class="btn btn-primary">Sign Up!!</button>

            </form>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>