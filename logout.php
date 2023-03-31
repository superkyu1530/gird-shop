<?php 

require "./bootstrap.php";

unset($_SESSION['user']);

setcookie('credentials', null, time() - 3600);

header("Location: index.php");

?>