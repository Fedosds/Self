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

<?php
  $id = $_GET['id'];
  $quer = "SELECT idbook, namebook, autor.autorname, description, objem, text, img FROM book INNER JOIN autor ON book.idauthor = autor.idautor WHERE idbook = '$id'";
  $book = mysqli_query($conn, $quer);
  $book = mysqli_fetch_assoc($book);
 ?>
<div class="container mt-5">
  <table>
      <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Автор</th>
        <th>Описание</th>
        <th>Объем</th>
        <th>Ссылка на текст</th>
        <th>Ссылка на изорбражение</th>
        <th colspan="2">Операция</th>
      </tr>
      <tr>
        <form action="updt.php" method="post">
        <td><div class="form-row"><input style="width: 25px" name="id" value="<?=$book[idbook]?>"></div></td>
        <td><textarea style="height: 100%" name="name"><?=$book[namebook]?></textarea></td>
        <td><input style="width: 90%" name="autor" value="<?=$book[autorname]?>"></td>
        <td><textarea style="width: 80%" name="date"><?=$book[description]?></textarea></td>
        <td><input valign="top" style="width: 90%" name="str" value="<?=$book[objem]?>"></td>
        <td><input style="width: 90%" name="link" value="<?=$book[text]?>"></td>
        <td><input style="width: 90%" name="linkimg" value="<?=$book[img]?>"></td>
        <td colspan="2"><button style="margin: 0px auto" class="btn btn-warning" type="submit">Изменить</button></td>
      </tr>
  </table>

</div>


<?php require "../blocks/footer.php" ?>


</body>
</html>
