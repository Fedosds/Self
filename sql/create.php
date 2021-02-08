<?php
require_once '../blocks/connect.php';

$name = $_POST['name'];
$autor = $_POST['izdat'];
$date = $_POST['date'];
$str = $_POST['str'];
$link = $_POST['link'];
$imglink = $_POST['linkimg'];


$autor = "SELECT idautor FROM autor WHERE autorname = '$autor'";
$autor = mysqli_query($conn, $autor);
$autor = mysqli_fetch_assoc($autor);
$autor = $autor['idautor'];

$sql = "INSERT INTO book (idbook, namebook, description, objem, text, img, idauthor) VALUES (NULL, '$name', '$date', '$str', '$link', '$imglink', '$autor')";
mysqli_query($conn, $sql);

mysqli_close($conn);

header('Location: edithion.php');
?>
