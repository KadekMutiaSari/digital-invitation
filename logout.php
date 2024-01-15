<?php
session_start();
session_destroy();
setcookie('username', '', time() - 3600); // Delete the cookie by setting its expiration date in the past
header("Location: login.php");
exit();
