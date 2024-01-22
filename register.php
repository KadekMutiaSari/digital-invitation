<?php

session_start();
require_once 'Pelanggan.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) 
{
    $reg_user = new Pelanggan($pdo);
    $nama_pelanggan = $_POST["nama_pelanggan"] ?? '';
    $email_pelanggan = $_POST["email_pelanggan"] ?? '';
    $password_pelanggan = $_POST["password_pelanggan"] ?? '';
    $no_hp_pelanggan = $_POST["no_hp_pelanggan"] ?? '';
    
    if (!empty($nama_pelanggan) && !empty($email_pelanggan) && !empty($password_pelanggan) && !empty($no_hp_pelanggan)) 
    {
        $reg_user->registerPelanggan($nama_pelanggan, $email_pelanggan, $password_pelanggan, $no_hp_pelanggan);
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>
    <link rel="icon" type="image/x-icon" href="images/di_icon.png">
    <link rel="stylesheet" type="text/css" href="input.css">
</head>
<body>

<h2>Register</h2>

<div class="container">
<form method="post">
    Username: <input type="text" name="nama_pelanggan">
    Email: <input type="email" name="email_pelanggan">
    Password: <input type="text" name="password_pelanggan">
    No Hp: <input type="text" name="no_hp_pelanggan">
    <input type="submit" name="register" value="Register"> 
    <!-- pastikan name register diatas sama dengan isset post, sama2 "register" -->   
</form>
</div>
</body>
</html>
