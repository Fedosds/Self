
<?php

  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

  if(mb_strlen($login) < 5 || mb_strlen($login) > 50) {
    echo "Недопустимый логин";
    exit();
  } else if(mb_strlen($name) < 3 || mb_strlen($name) > 50) {
    echo "Недопустимая длина имени";
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
  if($answer != 0) {
    echo "Пользователь с такими данными уже существует";
    exit;
  }
  mysqli_free_result($result);




$sql = "INSERT INTO auth (name, login, password) VALUES ('$name', '$login', '$pass')";
if (mysqli_query($conn, $sql)) {
      echo "Информация занесена в базу данных";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);



header("refresh: 2; url=../index.php");
?>
