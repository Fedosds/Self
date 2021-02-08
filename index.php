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
  <?php
require_once 'blocks/connect.php';
?>
    <div class="container mt-5">
      <h3 class="mb-5">Лучшие книги</h3>
      <div class="d-flex flex-wrap">
      <?php
        for($i = 0; $i < 6; $i++):
      ?>
      <?php
      $id = $i+1;
      $quer = "SELECT idbook, img, description FROM book WHERE idbook = '$id'";
      $book = mysqli_query($conn, $quer);
      $book = mysqli_fetch_assoc($book);
        ?>
          <div class="card mb-5 shadow-sm">
            <div class="card-header">
                <img src="img/<?=$book[img]?>" alt="" style="height: 500px" class="img-thumbnail">
                <div class="card-body">
                  <p class="card-text" style="max-height: 100px; overflow: auto; text-overflow: ellipsis"><?=$book[description]?></p>
                  <div class="d-flex justify-content-between align-items-stretch">
                    <div class="btn-group">
                      <a href="info.php?id=<?=($i+1)?>" type="button" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                      <?php
                        if($_COOKIE['user'] == 'Fedor'):
                      ?>
                      <a href="sql/edit.php?id=<?=($i+1)?>" type="button" class="btn btn-sm btn-outline-secondary">Редактировать</a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      <?php endfor; ?>
      </div>
    </div>

  <?php require "blocks/footer.php" ?>

</body>
</html>
