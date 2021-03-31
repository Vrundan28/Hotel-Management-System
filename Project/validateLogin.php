<?php

session_start();
    require_once "config.php";
    $username = $password = "";
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if(isset($_POST['submit'])){
        $query = "SELECT * FROM User WHERE Username = '$username' && Password = '$password'";
        $query1 = $dbhandler->query($query);
        $r = $query1->fetchAll();
        if($r == NULL)
            header('Location:login.php?id=1');   
        foreach ($r as $tmp){
            if(!empty($r)){
                $_SESSION['fullname'] = $tmp['Name'];
                $_SESSION['phone_number'] = $tmp['Phone_number'];
                $_SESSION['username'] = $username; 
                $_SESSION['address'] = $tmp['Address'];
                $_SESSION['email'] = $tmp['Email'];
                header('Location:home.php?id=0');
            }
            else    
                header('Location:login.php?id=1');
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>ValidateLogin</title>
</head>
<body>
    
</body>
</html>