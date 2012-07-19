<?php

require_once 'config/config.php';

$query = "SELECT department_id
		  FROM employee 
		  WHERE last_checkup 
		  BETWEEN '20080101'
		  AND '20170101'
		  GROUP BY department_id";
$result = mysql_query($query);
while ($q = mysql_fetch_array($result))
{ 
	echo "$q[0]<br>";
	
	$query_employee = "SELECT surname
					   FROM employee
					   WHERE last_checkup 
					   BETWEEN '20080101'
					   AND '20170101'
					   AND department_id = $q[0]";
	$result_employee = mysql_query($query_employee) or die ("".mysql_error());
	while ($q_e = mysql_fetch_array($result_employee))
	{
		echo " - $q_e[0] <br>";
	}
	
}
