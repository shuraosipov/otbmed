<?php
require_once 'config/config.php';
error_reporting(0);
$employee_id = $_GET['employee_id'];
$title = $_GET['title'];
$date = $_GET['y'].$_GET['m'].$_GET['d'];
$next = $_GET['yn'].$_GET['mn'].$_GET['dn'];
$bad_condition = $_GET['bad_condition'];

echo "<a href='index.php'>Главная</a> | ";
echo "<a href='employee.php'>Сотрудники</a><br><br><br>";




if ($_GET['title'] == '')
{
	echo "Заполните поле!<br><br><br>";
}
else
{
	$query = "INSERT INTO checkup (checkup_linkkey, title,date,next)
			  VALUES ('$employee_id','$title', '$date','$next')";
	$result = mysql_query($query) or die ("".mysql_error());
	
	$query = "INSERT INTO bad_condition (bad_condition_linkkey, title)
			  VALUES ('$employee_id','$bad_condition')";
	$result = mysql_query($query) or die ("".mysql_error());
	
	
	
	echo "Запись добавлена!<br><br><br>";	
}



?>






<form method="GET" action="add_checkup.php">
	Наименование медосмотра:<br>
	
	<input type="text" name="title"><br>
	<br>
	
	Вредные условия:<br>
<?php echo "<select name=\"bad_condition\">";
	$query = "SELECT * FROM bad_condition GROUP by title";
	$result = mysql_query($query);
	while ($q = mysql_fetch_array($result))
	{
		echo "<option $q[0]>$q[2]</option>";
	}
	  echo "</select><br><br>";
?>


	
	Дата текущего прохождения:<br>
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


	<br><br>
	Дата следующего прохождения:<br>
	День:	
<?php echo "<select name=\"dn\">";
	$query = "Select day_id from days";
	$result = mysql_query($query);
	while ($q = mysql_fetch_array($result))
	{
		echo "<option $q[0]>$q[0]</option>";
	}
	  echo "</select>";
?>
	Месяц:	
<?php echo "<select name=\"mn\">";
	$query = "Select month_id from months";
	$result = mysql_query($query);
	while ($q = mysql_fetch_array($result))
	{
		echo "<option $q[0]>$q[0]</option>";
	}
	  echo "</select>";
?>
	Год:
<?php echo "<select name=\"yn\">";
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