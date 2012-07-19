<?php
require_once 'config/config.php';
error_reporting(1);
$employee_id = $_GET['employee_id'];
$date = $_GET['y'].$_GET['m'].$_GET['d'];


echo "<a href='index.php'>Главная</a> | ";
echo "<a href='employee.php'>Сотрудники</a><br><br><br>";


if ($date == '')
{
	echo "Установите дату!<br><br>";
}
else 
{

	$query = "UPDATE employee
			SET last_checkup = '$date'
			WHERE employee_id = '$employee_id'";
	$result = mysql_query($query) or die ("".mysql_error());
	
	
	echo "Запись добавлена!<br><br><br>";
}


?>
<form method="GET" action="add_date_checkup.php">
Последний год прохождения медосмотра:<br><br>
	День:	
<?php echo "<select name=\"d\">";
	$query = "Select day_id from days";
	$result = mysql_query($query);
	while ($q = mysql_fetch_array($result))
	{
		echo "<option $q[0]>$q[0]</option>";
	}
	  echo "</select>";
?>
	Месяц:	
<?php echo "<select name=\"m\">";
	$query = "Select month_id from months";
	$result = mysql_query($query);
	while ($q = mysql_fetch_array($result))
	{
		echo "<option $q[0]>$q[0]</option>";
	}
	  echo "</select>";
?>
	Год:
<?php echo "<select name=\"y\">";
	$query = "Select year_id from years";
	$result = mysql_query($query);
	while ($q = mysql_fetch_array($result))
	{
		echo "<option $q[0]>$q[0]</option>";
	}
	  echo "</select>";
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