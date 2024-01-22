<?php
session_start();

require_once 'Admin.php';

$admin = new Admin($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])){   
    $email_admin = $_POST['email_admin'] ?? '';
    $password_admin = $_POST['password_admin'] ?? '';

    if (!empty($email_admin) && !empty($password_admin)) {
        // Check if the user exists
        $authenticated_user = $admin->authenticate($email_admin, $password_admin);
        if ($authenticated_user) {
            $_SESSION['loggedin_admin'] = true;
            $_SESSION['email_admin'] = $authenticated_user['email_admin'];
            setcookie('email_admin', $authenticated_user['email_admin'], time() + 3600);
            header("Location: index.php");
            exit();
        } else {
            // Login failed
            $error = "Your email/password combination was incorrect";
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
    <link rel="stylesheet" type="text/css" href="../input.css">
</head>
<body>
<h2>Login Admin</h2><br>


<div class="container">
    <form method="post">
        Email: <input type="email" name="email_admin">
        <br>
        Password: <input type="password" name="password_admin">
        <br>
        <input type="submit" name="login" value="Login">
    </form>
</div>

</body>
</html>
