<?php
if(@$_REQUEST['userfile']) {
    header("Location: ./list.php",TRUE,302);
}
?>
<!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Обработка форм</title>
  </head>
  <body>
    <h1>Загрузить JSON-файл c тестом.</h1>
    <form enctype="multipart/form-data" action="./list.php" method="POST">
      Загрузить JSON-файл <input name="userfile" type="file">
      <br>
     <input type="submit" value="Отправить">
    </form>
    <hr>
    <a href="./list.php">Выбрать тест! </a>
  </body>
</html>
