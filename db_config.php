<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$db_config = [

];

$mysqli = new mysqli('localhost', 'root', '', 'webcodertest');

console_log("DB connection established, host info : " . $mysqli->host_info);
?>