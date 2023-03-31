<?php

require "./bootstrap.php";

$view = 'admin/admin.php';


if(check_role() == "admin") {
    echo $template->renderLayout($view);
    } else {
        header("Location: index.php");
    }
?>

