<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Библиотека им Федора</title>
</head>
<body>
  <?php require "blocks/header.php" ?>

<?php require_once 'blocks/connect.php' ?>

  <div class="container">
  <?php

  $nam = $_COOKIE['user'];
  $q = "SELECT idchitatel FROM chitatel INNER JOIN auth ON idauth = idquest WHERE auth.name = '$nam'";
  $i = mysqli_query($conn, $q);
  $i = mysqli_fetch_assoc($i);
  $idchit = $i[idchitatel];
  $id = $_POST['id'];
  $date = date("Y-m-d");
  $query = "SELECT * FROM givebook WHERE idbook = '$id' AND idchitatel = '$idchit'";
    $result = mysqli_query($conn, $query);
    $answer = mysqli_num_rows($result);

    if($answer == 0) {
      $sql = "INSERT INTO givebook (idgive, idbook, idchitatel, dategive) VALUES (NULL, '$id', '$idchit', '$date')";
      mysqli_query($conn, $sql);
    }


  $name = $_POST['namebook'];
// print_r($name);
  $filename="textbook/$name.fb2";

  $file=file_get_contents($filename);
  //Выводим блок со стилем + сам текст

  echo '<div class="textblock">'.$file.'</div>';
  ?>
</div>
  <?php require "blocks/footer.php" ?>

</body>
</html>
