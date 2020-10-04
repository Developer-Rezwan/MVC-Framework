<?php
require_once 'vendor/autoload.php';
require_once 'config.php';


$conn = new App\Database();
$conn->connection('DB_HOST', 'DB_NAME', DB_PASSWORD);

