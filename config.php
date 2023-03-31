<?php

return[
    'db' => [
        'host'      => 'localhost',
        'user'      => 'root',
        'password'  => '',
        'dbname'    => 'estore',
        'port'      => '3306',
        'charset'   => 'utf8mb4'
    ],
    'view'  => [
        'path'      => 'views',
        'layout'    => [
            'path'  => 'layouts',
            'main'   => 'default.php'
        ],
    ],
];

?>