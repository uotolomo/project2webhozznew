<?php
session_start();
include "koneksi.php";

if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['pasword'];

    $sqlCommand = "SELECT * FROM user_login";

    $query = mysqli_query($con, $sqlCommand);

    while ($row = mysqli_fetch_array($query)) {
        
        $admin     = $row['username'];
        $adminpass = $row['pasword'];
        
        if (($username != $admin) || ($password != $adminpass)) {
            $error_msg ='=> Your login information is incorrect';
        }else {
            $_SESSION['admin'] = $username;
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
            exit();
        } //While
    } // IF
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <form action="login_form.php" method="post">
    <div class="login-page">
        <div class="form">
            <div class="login-form">
        <input type="text"     name="username" class="form-control" placeholder="Username">
        <input type="password" name="pasword" class="form-control" placeholder="Password">
        <button type="submit"  name="submit">Login</button>
        <p class="pesan">Belum Register?<a href="#"> Silahkan Register Terlebih dahulu </a></p>
        </div>
    </div>
</div>
</form>
</body>
</html>