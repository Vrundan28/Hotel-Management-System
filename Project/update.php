<?php
session_start();
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

    $username = trim($_POST["username"]);
    $address = trim($_POST["address"]);
    $email = trim($_POST["email"]);
    echo $email;
    if (!empty($name) && !empty($email) && !empty($address) && !empty($username) && !empty($phone_number)) {
        try {
            $_SESSION['fullname'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['address'] = $address;
            $_SESSION['phone_number'] = $phone_number;
            $_SESSION['username'] = $username;
            $query = "UPDATE User SET Name = '$name', Email = '$email', Address = '$address', Phone_number = '$phone_number' WHERE Username = '$username'";
            $query1 = $dbhandler->query($query);
            header('Location:home.php?id=3');
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
    <title>Update Profile</title>
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


    <div align="center" style="margin: 45px;">
        <h1 style="font-family: Calibri Light;"><b><i>Update Details</i></b></h1>
        <div style="width: 240px;">
            <form action="update.php" method="POST">
                <div <?php echo (!empty($name_err)); ?>>
                    <span><?php echo $name_err; ?></span>
                </div>
                <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['fullname']; ?>" required /><br>

                <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" required /><br>

                <input type="text" class="form-control" name="address" value="<?php echo $_SESSION['address']; ?>" required /><br>
                <div <?php echo (!empty($phone_number_err)); ?>>
                    <span><?php echo $phone_number_err; ?></span>
                </div>
                <input type="text" class="form-control" name="phone_number" value="<?php echo $_SESSION['phone_number']; ?>" required /><br>
    
                <input type="text" class="form-control" hidden name="username" value="<?php echo $_SESSION['username']; ?>" required /><br>

                <button type="submit" name="submit" class="btn btn-primary">Update!!</button>

            </form>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>