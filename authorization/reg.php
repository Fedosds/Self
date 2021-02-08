<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/sty.css">
  <title>Библиотека им Федора</title>
</head>
<body>
  <?php require "../blocks/header.php" ?>


    <div class="container mt-5">
  <div class="modal-header text-center">
    <h2 class="text-right ">Регистрация</h2>
  </div>
  <div class="modal-body">
    <div class="container mt-4">
        <form action="check.php" method="post" >
          <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
          <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя"><br>
          <input type="text" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
          <button class="btn btn-success" type="submit">Зарегистрироваться</button>
        </form>
      </div>
  </div>
</div>




  <?php require "../blocks/footer.php" ?>

</body>
</html>
