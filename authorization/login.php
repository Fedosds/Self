<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <title>Библиотека им Федора</title>
</head>
<body>

  <?php require "../blocks/header.php" ?>

  <?php
require_once '../blocks/connect.php';
  ?>


<div class="container mt-5" >

    <?php
    $name = $_COOKIE['user'];
    $q = "SELECT idchitatel FROM chitatel INNER JOIN auth ON idauth = idquest WHERE auth.name = '$name'";
    $id = mysqli_query($conn, $q);
    $id = mysqli_fetch_assoc($id);
    $id = $id[idchitatel];
    if ($id == NULL) {
      $qu = "SELECT idquest FROM auth WHERE name = '$name'";
      $qu = mysqli_query($conn, $qu);
      $qu = mysqli_fetch_assoc($qu);
      $qu = $qu[idquest];
?>
<p><strong>Необходима регистрация читательского билета</strong></p>
<table>
    <tr>
      <th>Укажите ФИО</th>
    </tr>
    <form action="chitatel.php" method="post">
  <tr>
    <td><input style="width: 100%" name="fio"></td>
  </tr>
  <input type="hidden" name="idauth" value="<?=$qu?>">
  <tr>
    <td>
    <div class="d-flex justify-content-center">
    <button class="btn btn-warning btn-block" type="submit">Добавить</button><br><br></div>
    </td>
  </tr>
</table>
</form>
<?php
    } else {
?>

<?php

    $query = "SELECT dategive, book.namebook FROM givebook INNER JOIN book ON givebook.idbook = book.idbook WHERE idchitatel = '$id'";
    $chten = mysqli_query($conn, $query);
    $chten = mysqli_fetch_all($chten);

    if ($chten != NULL) {
      ?>
      <table>
        <p><strong>Читал ранее:</strong></p>
          <tr>
            <th>Название</th>
            <th>Дата чтения</th>
          </tr>
  <?php


    foreach ($chten as $chten) {
    ?>

      <tr>
        <td><?= $chten[1]?></td>
        <td><?= $chten[0]?></td>
      </tr>

      <?php
    }
  }
  ?>
  </table>

<?php
}
?>
  <br>
  <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group" role="group" aria-label="First group">

        <?php
          if($_COOKIE['user'] == 'Fedor'):
        ?>
        <a href="../sql/edithion.php" class="btn btn-primary" type="button">Просмотр и Редактирование БД</a>

      <?php else: ?>
        <a href="../bd.php" class="btn btn-primary" type="button">Просмотр БД</a>
        <?php endif; ?>
    </div>
    <div class="button-group">
      <div class="button-group-prepend">
        <a class="btn btn-outline-primary"  data-toggle="modal" data-target="#myExit">Выход</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myExit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <h4 class="text-center ">Вы уверены что хотите выйти?</h4>
        <div class="container mt-4">
              <a href="exit.php" class="btn btn-primary btn-lg btn-block" type="button">Да</a>
              <button class="btn btn-secondary btn-lg btn-block" type="button" data-dismiss="modal">Нет</button>
          </div>
      </div>
    </div>
  </div>
</div>
</div>

  <?php require "../blocks/footer.php" ?>

</body>
</html>
