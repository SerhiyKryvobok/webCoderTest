<?php

class webDB extends mysqli {
    public function __construct($host = 'localhost', $user = 'root', $pass = '', $db = 'webcodertest') {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        parent::__construct($host, $user, $pass, $db);
    }

    public static function setup($db) {
        $db->query("CREATE TABLE IF NOT EXISTS users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            adress VARCHAR(50),
            tel VARCHAR(50),
            notes VARCHAR(100),
            dep INT(6)
        )");
        $db->query("CREATE TABLE IF NOT EXISTS depts (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL UNIQUE
        )");
    }
}

$mysqli = new webDB();
console_log("DB connection established, host info : " . $mysqli->host_info);
$mysqli::setup($mysqli);
$mysqli->close();

?>