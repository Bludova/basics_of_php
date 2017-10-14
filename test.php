<?php
  $nomTest = ($_GET);
  foreach($nomTest as $number => $k) {
  }
  $json = file_get_contents(__DIR__ ."/$k");
  $data = json_decode($json, true);
  $issues_1 = $data["question_1"];
  $issues_2 = $data["question_2"];
  $filelist = glob("*.json");

  array_unshift($filelist, "1");
  foreach($filelist as $i => $filename) {
  $name = basename($filename);
   ++$i;
  }

  if (array_key_exists($number, $filelist)) {
    //echo "Массив содержит элемент $number.";
  } else {
      http_response_code(404);
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

    <form enctype="multipart/form-data" action="" method="POST">
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
    if(isset($_POST['q1']) and (isset($_POST['q2'])))
     {
     if($_POST['q1'] ==  $issues_1["result"] and $_POST['q2'] ==  $issues_2["result"]) 
     {
    ?> 
    <span class="correctly"> Вы ответили верно! </span><br>
    <form action="certificate.php" method="GET">
      <fieldset name='<?="$namesy;"?>'>
       <label>
         <p><b>Ваше имя:</b></p>
        <input name="name" type="text">
      </label>
      <input type="submit" value="Получить сертификат">
    </form>
    <?php
    if( isset($_GET['name']) )
    {
      $errors = array();
      if($_GET['name'] == '')
      {
        $errors[] = 'Введите имя!';
      } 
        if( empty($errors) ) 
        {
          // Выводит имя 
          echo '<span style="color: green; font-weigh: bold; margin-bottom: 10px;
          display: block;">'. $_POST['name']. '</span>';

        }else
           {   
             //Вывести ошибку на экран
             echo '<span style="color: red; font-weigh: bold; margin-bottom: 10px;
             display: block;">' .$errors['0']. '</span>';
           } 
     }

     }else 
     {
    ?>
    <span class="error">Вы ответили неправельно! Попробуйте еще раз)</span>
      <?php
        }
      }
      ?>
    <hr>
    <a href="list.php">Выбрать тест! </a>
    <a href="admin.php">Загрузить тест! </a>
  </body>
</html>
