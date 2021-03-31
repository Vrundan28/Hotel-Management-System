<?php
session_start();
require_once "config.php";
$query = "SELECT * FROM GALLERY";
$query1 = $dbhandler->query($query);
$r = $query1->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        h4 {
            text-align: center;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
        }
    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Gallery</title>
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

    <?php
        foreach($r as $t){
    ?>
    <h4><?php echo $t['name'] ?></h4>
    <hr>
    <img src="<?php echo $t['url'] ?>" alt="..." /><br><br>
    <?php
        }
    ?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>