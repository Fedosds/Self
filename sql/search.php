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
<?php require_once '../blocks/connect.php'?>

<div class="container mt-5">
<strong>Введите интересующие слова в тексте</strong><br>
<br>
  <form method="post">
    <input type="text" name="search" class="search"><input type="submit" name="desc" id="search" value="поиск">
  </form>
<hr>
<?php


if(isset($_POST['desc'])){
  $search = explode(" ", $_POST['search']);
  $count = count($search);
  $array = array();
  $i = 0;
  foreach ($search as $key) {
    $i++;
    if($i < $count) $array[] = "CONCAT (namebook, description) LIKE '%".$key."%' OR "; else $array[] = "CONCAT (namebook, description) LIKE '%".$key."%'";
  }
  $sql = "SELECT * FROM book WHERE ".implode("", $array);
  $query = mysqli_query($conn, $sql);
  // var_dump(mysqli_fetch_assoc($query));
  while($row = mysqli_fetch_assoc($query)) echo "<h1><a href='../info.php?id=".$row[idbook]."'>".$row['namebook']."</a></h1><p>".$row['description']."</p><br>";

}
mysqli_close($conn);
?>

</div>

<?php require "../blocks/footer.php" ?>

</body>
</html>
