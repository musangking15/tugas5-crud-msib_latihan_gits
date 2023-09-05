<?php

$db_host = 'localhost';
$db_name = 'test';
$db_username = 'root';
$db_pass = '';

$mysqli = mysqli_connect($db_host, $db_username, $db_pass, $db_name);

if (!$mysqli) {
    echo 'koneksi gagal';
}
