<?php

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
        exit(); // Stop the script from executing any further
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>
    <link rel="icon" type="image/x-icon" href="images/di_icon.png"> 	<!-- logo icon -->
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<h2>Register</h2>

<div class="container">
<form method="post">

    <input type="text" name="nama_pelanggan" placeholder="Username">
    <input type="email" name="email_pelanggan" placeholder="Email">
    <input type="text" name="password_pelanggan" placeholder="Password">
    <input type="text" name="no_hp_pelanggan" placeholder="No Handphone">
    <input type="submit" name="register" value="Register"> 
    <!-- pastikan name register diatas sama dengan isset post, sama2 "register" -->
</form>
</div>
</body>
</html>
