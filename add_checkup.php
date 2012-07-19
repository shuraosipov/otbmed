<?php
require_once 'config/config.php';
error_reporting(1);
$employee_id = $_GET['employee_id'];
$bad_condition = $_GET['bad_condition'];

echo "<a href='index.php'>Главная</a> | ";
echo "<a href='employee.php'>Сотрудники</a><br><br><br>";


if ($bad_condition == '')
{
	echo "Выберите вредные условия!<br><br>";
	
}
else 
{
	$query = "INSERT INTO bad_condition_for_employee (bcfe_linkkey, bc_id)
			  VALUES ('$employee_id','$bad_condition')";
	$result = mysql_query($query) or die ("".mysql_error());
	
	
	echo "Запись добавлена!<br><br><br>";
}	




?>



<form method="GET" action="add_checkup.php">
	
	Вредные условия:<br>
<?php echo "<select name=\"bad_condition\">";
	$query = "SELECT bad_condition_id, title FROM bad_condition GROUP by title";
	$result = mysql_query($query);
	while ($q = mysql_fetch_array($result))
	{
		echo "<option value=\"$q[0]\">$q[1]</option>";
	}
	  echo "</select><br><br>";
?>


	

<?php
	 echo "<input type=\"hidden\" name=\"employee_id\" value=\"$employee_id\""; 
?>
	<br><br><br>
	<input type="submit">
<?php 
	echo "<a href=\"view_employee.php?employee_id=$employee_id\">Назад</a>";
?>
</form>