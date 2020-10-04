<?php
require_once 'vendor/autoload.php';
require_once 'config.php';

// here will be database connection
define("DB_HOST","localhost");
define("DB_NAME", "pdo");
define('DB_USERNAME', 'Rezwan');
define("DB_PASSWORD", "Rez1rez1");



use App\Database;
Database::connection(DB_HOST,DB_NAME,DB_USERNAME,DB_PASSWORD);