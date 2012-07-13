<?php
require_once 'config/config.php';

echo "<a href='index.php'>Главная</a> | ";
echo "<a href='employee.php'>Сотрудники</a><br><br><br>";
?>

<form method="GET" action="report.php">

	Выберите начальную дату<br>
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

Выберите конечную дату<br>
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


	<br><br>


<input type="submit">
</form>
