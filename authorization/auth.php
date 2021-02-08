<?php

  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

  if(mb_strlen($login) < 5 || mb_strlen($login) > 50) {
    echo "Недопустимый логин";
    exit();
  } else if(mb_strlen($pass) < 2 || mb_strlen($pass) > 10) {
    echo "Недопустимая длина пароля (необходим пароль от 2 до 10 символов)";
    exit();
  }

require_once '../blocks/connect.php';
$pass = sha1($pass."asdfw23er5tcvb2");


$query = "SELECT * FROM auth WHERE login = '$login' AND password = '$pass'";
  $result = mysqli_query($conn, $query);
  $answer = mysqli_num_rows($result);
  $user = mysqli_fetch_assoc($result);
  if($answer == 0) {
    echo "Пользователь не найден";
    header("refresh: 2; url=../index.php");
    exit();
  }


  setcookie('user', $user['name'], time() + 3600, "/");

  mysqli_free_result($result);
  mysqli_close($conn);



header('Location: /');
?>
