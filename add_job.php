<?php
require_once 'config/config.php';
error_reporting(1);

echo "<a href='index.php'>Главная</a> | ";
echo "<a href='employee.php'>Сотрудники</a><br><br><br>";

$title = $_GET['title'];


 
if ($_GET['title'] == '')
{
	echo "Заполните поле!<br><br>";
}
else
{
		
	$query = "INSERT INTO job (title) VALUES ('$title')";
	$result = mysql_query($query) or die ("Ошибка при добавлении записи : ".mysql_error());
	echo "Запись успешно добавлена!<br><br>";
}



?>





Введите название профессии или должности:<br>
<form method="get" action="add_job.php">
<input type="text" name="title">
<input type="submit">
</form>


