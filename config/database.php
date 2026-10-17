<?php

return [

    'default' => env('DB_CONNECTION', 'mysql'),

    'connections' => [

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'soporte_db'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        // CONEXIÓN A LA BASE DE DATOS REMOTA (INTEGRANTE 3)
        'mysql_remota' => [
            'driver' => 'mysql',
            'host' => env('DB_REMOTE_HOST', '127.0.0.1'),
            'port' => env('DB_REMOTE_PORT', '3306'),
            'database' => env('DB_REMOTE_DATABASE', ''),
            'username' => env('DB_REMOTE_USERNAME', ''),
            'password' => env('DB_REMOTE_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

    ],

];