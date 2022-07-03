<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'jale');

$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$con) {
}
if (@mysqli_connect_error()) {
    die("Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_errno());
}
?>