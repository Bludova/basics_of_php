<!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Список загруженных тестов</title>
  </head>
  <body>
<h1>Список загруженных тестов</h1>


      <form enctype="multipart/form-data" action="./test.php" method="get">
          <legend>Список загруженных тестов</legend>
            <?php 

$number = 0;
$filelist = glob("*.json");
 
foreach($filelist as $i => $filename) {
   $number++;
    $name = basename($v);
    // echo $name,"  ", "number ", $i, "</br>"; 


//              $number = 0;
// $filelist = glob("*.json");
//     foreach ($filelist as $filename){
//     $number++;
      
//             $number = 0;
// $filelist = glob("*.json");
//     foreach ($filelist as $filename){
//    	$filename == $number++ ;
?>


          <label><input type="radio" name='<?="$number"?>' value='<?="$filename"?>'>

          <?php echo  "№$number-"." ". $filename. "  $test " ;
}
?>
        </label>
        <input type="submit" value="Пройти тест!">
      </form>


<?php
$files_test = $_FILES['userfile'] ['name'];
?> 

<?php
if(isset($_FILES['userfile'] ['name']) && !empty($_FILES['userfile'] ['name']))
{
  if($_FILES['userfile'] ['error'] == UPLOAD_ERR_OK &&
    move_uploaded_file($_FILES['userfile'] ['tmp_name'], $_FILES['userfile'] ['name']))
  {
    echo "Файл с текстом загружен! <br>";
  }else 
  {
    echo " Ошибка: Файл с текстом не загружен! <br>";

  }
}

?>

<hr>
<a href="./admin.php">Загрузить тест!</a>
  </body>
</html>
