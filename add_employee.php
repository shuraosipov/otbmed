<?php
require_once 'config/config.php';
echo "<a href='index.php'>Главная</a> | ";
echo "<a href='employee.php'>Сотрудники</a><br><br><br>";
error_reporting(0);

$name = $_GET['name'];
$secondname = $_GET['secondname'];
$surname = $_GET['surname'];
$department_id = $_GET['department_id'];
$job_id = $_GET['job_id'];


if ($_GET['name'] == '' || $_GET['secondname'] == '' || $_GET['surname'] = '' || $_GET['job_id'] = '' || 
	$_GET['department_id'] = '')
{
	echo "Заполните все поля!<br><br><br>";	
}
else

{
	$query = "INSERT INTO employee (name,surname,secondname,department_id,job_id)
			  VALUES ('$name','$surname','$secondname','$department_id', '$job_id')";
	$result = mysql_query($query) or die ("".mysql_error());
	echo "Запись добавлена!<br><br><br>";
}


?>
<form method="GET" action="add_employee.php">
	Фамилия<br>
	<input type="text" name="name"><br><br>
	
	Имя<br>
	<input type="text" name="surname"><br><br>
	
	Отчество<br>
	<input type="text" name="secondname"><br><br>
	
	Структурное подразделение<br>
			<?php
			echo "<select name=\"department_id\">";
				$query  = "SELECT * FROM department";
				$result = mysql_query($query);
				while ($q = mysql_fetch_array($result))
				{
					echo "<option value=$q[0]>$q[1]</option>";
				}
			echo "</select>"; 
			?><br><br>
		   	
		   
	
	Должность / Профессия <br>
	<?php
			echo "<select name=\"job_id\">";
				$query  = "SELECT * FROM job";
				$result = mysql_query($query);
				while ($q = mysql_fetch_array($result))
				{
					echo "<option value=$q[0]>$q[1]</option>";
				}
			echo "</select>"; 
			?><br><br>
	<br>
	<input type="submit">
	
	
</form>
