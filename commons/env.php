<?php

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL', 'http://localhost/duanmau/mvc-oop-basic/');

define('DB_HOST', 'localhost');

define('DB_PORT', 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'duanmau_123');  // Tên database

define('PATH_ROOT', __DIR__ . '/../');

define('PATH_VIEW',         PATH_ROOT . 'views/');
define('PATH_VIEW_MAIN',    PATH_ROOT . 'views/main.php');
