<?php

session_start();

define("ROOT_DIR",__DIR__.DIRECTORY_SEPARATOR);
define("BASE_PATH",'/');

define('ENCRYPTION_KEY','!@@#%_my_serect_key_for_encryption_@#$!&');

$config = require "config.php";

require "./vendor/helpers/helpers.php";

require "./vendor/TemplateEngine/TemplateEngine.php";

$template = new TemplateEngine($config['view']);

$dbname = $config['db']['dbname'];
$user   = $config['db']['user'];
$password = $config['db']['password'];
$port = $config['db']['port'];
$host = $config['db']['host'];
$charset = $config['db']['charset'];



$dsn ="mysql:host=$host; port=$port; dbname=$dbname; charset=$charset";
try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die($e->getMessage());
}

if(!check_login()){
    auto_login();
}

?>