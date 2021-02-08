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
<style>
tr,td,th {
background: transparent;
border-color: transparent;
color: black;
vertical-align: top;
text-align: left;
}
</style>

<?php
require_once 'blocks/connect.php';
?>
<?php
$id = $_GET['id'];
$quer = "SELECT book.idbook, namebook, objem, img, description, text, autor.autorname FROM book INNER JOIN autor ON book.idauthor = autor.idautor WHERE book.idbook = '$id'";
$book = mysqli_query($conn, $quer);
$book = mysqli_fetch_assoc($book);
?>
  <div class="container mt-5">

      <table>
          <tr>
            <th rowspan=100%><img src="img/<?=$_GET[id]?>.jpg" class="img-fluid" style="max-width: 500px;"></th>
            <th valign="top" align="left">
              <p>Название:<br>
              Автор:<br>
              Количество страниц:<br>

             </th>
             <th>
              <?=$book[namebook]?><br>
              <?=$book[autorname]?><br>
              <?=$book[objem]?><br>
             </th>
          </tr>
          <tr>
            <td colspan="2"><b>Описание:</b><br><?=$book[description]?></td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="d-flex flex-row-reverse">
                <form action="book.php?id=<?=$book[idbook]?>&name=<?=$book[namebook]?>" method="post">
                  <input type="hidden" name="id" value="<?=$book[idbook]?>">
                  <input type="hidden" name="namebook" value="<?=$book[namebook]?>">
                  <button class="btn btn-warning btn-lg" type="submit">Читать</button>
                </form>
              </div>
            </td>
          </tr>
      </table>
  </div>



  <?php require "blocks/footer.php" ?>
</body>
</html>
