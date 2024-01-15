<?php
session_start();

require_once 'Pelanggan.php';

$pelanggan = new Pelanggan($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])){   
    $email_pelanggan = $_POST['email_pelanggan'] ?? '';
    $password_pelanggan = $_POST['password_pelanggan'] ?? '';

    if (!empty($email_pelanggan) && !empty($password_pelanggan)) {
        // Check if the user exists
        $authenticated_user = $pelanggan->authenticate($email_pelanggan, $password_pelanggan);
        if ($authenticated_user) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email_pelanggan'] = $authenticated_user['email_pelanggan'];
            setcookie('email_pelanggan', $authenticated_user['email_pelanggan'], time() + 3600);
            header("Location: pesanan.php");
            exit();
        } else {
            // Login failed
            $error = "Your email_pelanggan/password_pelanggan combination was incorrect";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>        
    <link rel="icon" type="image/x-icon" href="images/di_icon.png"> 	<!-- logo icon -->
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<h2>Login</h2><br>


<div class="container">
    <form method="post">
        Email: <input type="email" name="email_pelanggan">
        <br>
        Password: <input type="password" name="password_pelanggan">
        <br>
        <input type="submit" name="login" value="Login">
    </form>

    <p><b>Don't have an account? </b></p>
	<p><a href="register.php"><button>Register here</button></a></p><br>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</div>


</body>
</html>
