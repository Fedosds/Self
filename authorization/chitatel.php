<?php
require_once '../blocks/connect.php';

$name = $_POST['fio'];
$idauth = $_POST['idauth'];



$sql = "INSERT INTO chitatel (idchitatel, fio, idauth) VALUES (NULL, '$name', '$idauth')";
mysqli_query($conn, $sql);

mysqli_close($conn);
echo "Регистрация прошла успешно";

header("refresh: 2; url=login.php");

?>
