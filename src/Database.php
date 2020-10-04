<?php

namespace App;

class Database {

    private static $host;
    private static $dbname;
    private static $user;
    private static $pass;
    protected $pdo;

    public static function connection($host, $dbname, $username, $password) {
        self::$host = $host;
        self::$dbname = $dbname;
        self::$user = $username;
        self::$pass = $password;
    }

    public function __construct() {
        try {
            $link = new \PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8", self::$user, self::$pass);
            $link->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo = $link;
        } catch (PDOException $ex) {
            die("Connection Failed! : ".$ex->getMessage());
        }
    }
  
}
