<?php 

session_start();

session_destroy();

unset($_COOKIE['coockie_usuario']);
setcookie('cookie_usuario', $nombre_usuario, time() - 3600, '/');

header("Location: login.php");
exit();

?>