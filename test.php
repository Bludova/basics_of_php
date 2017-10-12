<?php
  if (empty($_GET)) {
  http_response_code(404);
echo 'Cтраница не найдена!';
exit();
}
?>
<!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Список загруженных тестов</title>
    <style>
   .error {
    color: red;
    font-size: 120%;
   } 
   .correctly {
    color: #00A72A; 
    font-size: 120%; 
   } 
  </style>
  </head>
  <body>
  <h1>Пройдите тест</h1>
    <p>Введите имя</p>
    <form enctype="multipart/form-data" action="" method="POST">
      <label>
        <input name="userfile" type="text">
      </label>
      <button type="submit">Проверить</button>
    </form>
    <br>
    <hr>
   
<?php
      $nomTest = ($_GET);
        foreach($nomTest as $i => $k) {
      }


      $filelist = glob("*.json");
      $json = file_get_contents(__DIR__ ."/$k");
      $data = json_decode($json, true);
      $issues_1 = $data["question_1"];
      $issues_2 = $data["question_2"];


?>
      <form action=" " method="post">
        <fieldset name="q1">
          <legend><?= $issues_1["label"]; ?></legend>
          <label><input type="radio" name="q1" value='<?= $issues_1["option_1"];?>' ><?= $issues_1["option_1"]; ?></label>
          <label><input type="radio" name="q1" value='<?= $issues_1["option_2"];?>' ><?= $issues_1["option_2"]; ?></label>
          <label><input type="radio" name="q1" value='<?= $issues_1["option_3"];?>' ><?= $issues_1["option_3"]; ?></label>
          <label><input type="radio" name="q1" value='<?= $issues_1["option_4"];?>' ><?= $issues_1["option_4"]; ?></label>
        </fieldset>
        <fieldset name="q2">
          <legend><?= $issues_2["label"]; ?></legend>
          <label><input type="radio" name="q2" value='<?= $issues_2["option_1"];?>' ><?= $issues_2["option_1"]; ?></label>
          <label><input type="radio" name="q2" value='<?= $issues_2["option_2"];?>' ><?= $issues_2["option_2"]; ?></label>
          <label><input type="radio" name="q2" value='<?= $issues_2["option_3"];?>' ><?= $issues_2["option_3"]; ?></label>
          <label><input type="radio" name="q2" value='<?= $issues_2["option_4"];?>' ><?= $issues_2["option_4"]; ?></label>
        </fieldset>
        <input type="submit" value="Отправить">
      </form>
<?php

if(isset($_POST['q1']) && !empty($_POST['q1']))
{
 if($_POST['q1'] ==  $issues_1["result"]) 
  {
    echo "На вопрос: " .$issues_1["label"]."  ";
 ?> <span class="correctly"> Вы ответили верно! </span><?php echo "<br>";
  }else 
  {
   echo "На вопрос: " .$issues_1["label"]."  ";
    ?> <span class="error">Вы ответили неправельно!</span> Правельный ответ:"
   <?php echo $issues_1["result"]. " <br>" ;
  }
}

if(isset($_POST['q2']) && !empty($_POST['q2']))
{
 if($_POST['q2'] ==  $issues_2["result"]) 
  {
    echo "На вопрос: " .$issues_2["label"]."  ";
   ?><span class="correctly">Вы ответили верно!</span><?php echo "<br>";
  }else 
  {
   echo "На вопрос: " .$issues_2["label"]."  ";
   ?>"<span class="error">Вы ответили неправельно!</span> Правельный ответ:" <?php echo$issues_2["result"]. "<br>" ;
  }
}
?>
<hr>
 <a href="list.php">Выбрать тест! </a>
 <a href="admin.php">Загрузить тест! </a>
  </body>
</html>
