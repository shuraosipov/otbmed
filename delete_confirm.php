<?php
require_once 'config/config.php';

$employee_id = $_GET['employee_id'];
echo "�� �������, ��� ������ ������� ��� ������ � ����������?";


echo <<<HEREDOC

<form method="GET" action="delete_employee.php">
	<input type="hidden" name="employee_id" value='$employee_id'>
	<input type="submit" name="delete_button" value="�������">

</form>


HEREDOC;


echo "<a href=\"view_employee.php?employee_id=$employee_id\">�����</a>";