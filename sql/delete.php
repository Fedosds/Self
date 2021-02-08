<?php
require_once '../blocks/connect.php';

$id=$_GET['id'];
$query = "DELETE FROM book WHERE book.idbook = '$id'";
mysqli_query($conn, $query);
header('Location: edithion.php');
?>
