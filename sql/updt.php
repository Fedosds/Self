<?php
require_once '../blocks/connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$autor = $_POST['autor'];
$date = $_POST['date'];
$str = $_POST['str'];
$link = $_POST['link'];
$imglink = $_POST['linkimg'];

$autor = "SELECT idautor FROM autor WHERE autorname = '$autor'";
$autor = mysqli_query($conn, $autor);
$autor = mysqli_fetch_assoc($autor);

$autor = $autor['idautor'];


$sql = "UPDATE book SET namebook = '$name', idauthor = '$autor', description = '$date', objem = '$str', text = '$link', img = '$imglink' WHERE idbook = '$id'";
mysqli_query($conn, $sql);

mysqli_close($conn);

header('Location: edithion.php');

?>
