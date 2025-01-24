<?php
session_start();
session_unset();
session_destroy();
setcookie('user_id', '', time() - 3600, '/');
setcookie('role', '', time() - 3600, '/');
setcookie('name', '', time() - 3600, '/');
header("Location: ../view/login_form.php");
exit;
?>
shovan/controller/logout.php