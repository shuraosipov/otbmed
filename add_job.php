<?php
require_once 'config/config.php';
error_reporting(1);

echo "<a href='index.php'>�������</a> | ";
echo "<a href='employee.php'>����������</a><br><br><br>";

$title = $_GET['title'];


 
if ($_GET['title'] == '')
{
	echo "��������� ����!<br><br>";
}
else
{
		
	$query = "INSERT INTO job (title) VALUES ('$title')";
	$result = mysql_query($query) or die ("������ ��� ���������� ������ : ".mysql_error());
	echo "������ ������� ���������!<br><br>";
}



?>





������� �������� ��������� ��� ���������:<br>
<form method="get" action="add_job.php">
<input type="text" name="title">
<input type="submit">
</form>


