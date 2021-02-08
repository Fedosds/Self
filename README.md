<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Библиотека им Федора</title>
</head>
<body>

<?php require "blocks/header.php" ?>
<?php require_once 'blocks/connect.php'; ?>

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
      </tr>

      <?php
        $query = "SELECT idbook, namebook, autor.autorname, description, objem, text, img FROM book INNER JOIN autor ON book.idauthor = autor.idautor";
        $products = mysqli_query($conn, $query);
        $products = mysqli_fetch_all($products);
        foreach ($products as $products) {
            ?>

          <tr>
            <td><?= $products[0]?></td>
            <td><?= $products[1]?></td>
            <td><?= $products[2]?></td>
            <td><div style="max-height: 70px; overflow: auto; text-overflow: ellipsis;"><?= $products[3]?></td></div>
            <td><?= $products[4]?></td>
            <td><?= $products[5]?></td>
            <td><?= $products[6]?></td>
          </tr>

          <?php
        }
      ?>
  </table>
</form>

</div>

<?php require "blocks/footer.php" ?>

</body>
</html>
