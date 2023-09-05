<?php

include_once('conn.php');

session_start();

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$query = "DELETE FROM tbl_mahasiswa WHERE id=$id";
$result = mysqli_query($mysqli, $query);

$_SESSION['message'] = "Data berhasil dihapus.";

header("Location: index.php");
