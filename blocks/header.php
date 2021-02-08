<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style.css">
<header class="container">
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom shadow-sm" style="background: #f7f7f7">
  <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/">вБиблиотеке</a></h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="/">Главная</a>
    <a class="p-2 text-dark" href="../sql/search.php">Поиск</a>
  </nav>
  <?php
    if($_COOKIE['user'] == ''):
  ?>
  <a class="btn btn-outline-primary"  data-toggle="modal" data-target="#myModal">Войти</a>
<?php else: ?>
  <a href="../authorization/login.php"  class="btn btn-outline-primary" type="button" ><?=$_COOKIE['user']?></a>
<?php endif; ?>
</div>
</header>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header text-center">
        <h2 class="text-right ">Форма входа</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="container mt-4">
            <form action="../authorization/auth.php" method="post" >
              <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
              <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
              <button class="btn btn-primary" type="submit">Войти</button>
              <a href="../authorization/reg.php"  class="btn btn-success" type="button" >Зарегистрироваться</a>
            </form>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
