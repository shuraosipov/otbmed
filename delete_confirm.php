<?php
require_once 'config/config.php';

$employee_id = $_GET['employee_id'];
echo "Вы уверены, что хотите удалить все данные о сотруднике?";


echo <<<HEREDOC

<form method="GET" action="delete_employee.php">
	<input type="hidden" name="employee_id" value='$employee_id'>
	<input type="submit" name="delete_button" value="Удалить">

</form>


HEREDOC;


echo "<a href=\"view_employee.php?employee_id=$employee_id\">Назад</a>";