<?php
require_once 'config/config.php';
error_reporting(E_ALL);
echo "<a href='index.php'>�������</a> | ";
echo "<a href='employee.php'>����������</a> | ";
echo "<a href=\"expiraton.php\">������</a><br><br><br>";


echo <<<HEREDOC

<table width="100%" border="0">

<tr>
	<td width="25%" align="center">�����������</td>
	<td width="50%"></td>
	<td width="25%" align="center">���������</td>
</tr>

<tr>
	<td>���������� ���������������� �� ��</td>
	<td></td>
	<td>�������� _________________________</td>
</tr>

<tr>
	<td>_____________������� ____________���</td>
	<td></td>
	<td>_____________������� ____________���</td>
</tr>

<tr>
	<td>"_______" ___________________20______�.</td>
	<td></td>
	<td>"_______" ___________________20______�.</td>
</tr>


</table>
<br><BR>



<center>
<b>��������</b>
<br>
<B> ���������� � �������� ��������� ����� �� ____________ ��� ����������� ���������� �� 20____ ���.</B>
<br>
<B>__________________________________, � ������������ � �������� � ________ �� _______________</B>
</center>
          
<br><BR>


HEREDOC;

echo <<<HEREDOC
<table border="1" align="center">
	
	<tr>
		<td align="center">�</td>
		<td align="center" >�.�.�.</td>
		<td align="center" >�����</td>
		<td align="center" >��� ��������</td>
		<td align="center">���������<br>(���������)</td>
		<td align="center" >������� ���������������� �������</td>
		
		<td align="center">����</td>
		<td align="center">������������ �����. ������������</td>
		<td align="center">�������. ����.</td>
		<td align="center">�������� ��� ����������� ���-��</td>
		
	</tr>
	<tr>
		<td align="center">1</td>
		<td align="center">2</td>
		<td align="center">3</td>
		<td align="center">4</td>
		<td align="center">5</td>
		<td align="center">6</td>
		
		<td align="center">7</td>
		<td align="center">8</td>
		<td align="center">9</td>
		<td align="center">10</td>
		
	</tr>
	


		
HEREDOC;

$start_date = $_GET['y'].$_GET['m'].$_GET['d'];
$expiration_date = $_GET['yn'].$_GET['mn'].$_GET['dn'];

$counter = '1';




$q_checkup_expirate =  "  SELECT title, employee.department_id
						  FROM department,employee 
						  WHERE department.department_id = employee.department_id
						  AND last_checkup
						  BETWEEN '$start_date'
						  AND '$expiration_date'
						  GROUP BY title
						  ORDER BY employee.department_id";

$result = mysql_query($q_checkup_expirate) or die ("������ � 1 �������".mysql_error());
while ($q = mysql_fetch_array($result))
{
$department_id = $q[1];

echo "<tr><td colspan='100%'><b>$q[0]</b></td></tr>";

$q_e_data = "SELECT employee_id, surname, name, secondname, job.title, last_checkup
			 FROM employee, job
			 WHERE department_id = '$department_id'
			 AND last_checkup
			 BETWEEN '$start_date'
			 AND '$expiration_date'
			 AND job.job_id = employee.job_id";
$r_e_data = mysql_query($q_e_data) or die ("������ � 2 �������".mysql_error());
while ($q_e = mysql_fetch_array($r_e_data))
{
	
	

echo "<tr>
		<td>$counter</td>
		<td>$q_e[2] $q_e[1] $q_e[3]</td>
		<td>&nbsp</td>
		<td>&nbsp</td>
		<td>$q_e[4]</td>";
echo 	"<td>";
$counter++;

$q_bcfe = "SELECT bad_condition.title
		 FROM bad_condition, bad_condition_for_employee
		 WHERE bad_condition.bad_condition_id = bad_condition_for_employee.bc_id
		 AND bad_condition_for_employee.bcfe_linkkey = '$q_e[0]'";
$r_bcfe = mysql_query($q_bcfe) or die ("������ � 3 �������". mysql_error());
while ($q_bc = mysql_fetch_array($r_bcfe))
{
	echo "<ul>";
		echo "<li>$q_bc[0]</li>";
	echo "</ul>";
}

echo   "</td>
		<td>&nbsp</td>
		<td>&nbsp</td>
		<td>&nbsp</td>
		<td>$q_e[5]</td>
	  </tr>";
}

}





echo "</table>";


$query_count = "SELECT employee_id, count(*) 
				FROM employee
				WHERE last_checkup
				BETWEEN '$start_date'
				AND '$expiration_date'";
$result_count = mysql_query($query_count) or die ("������ � 4 �������".mysql_error());
$q_c = mysql_fetch_array($result_count);





echo <<<HEREDOC
<br><br>
<center>
�������� ������� - $q_c[1] ������� <br><br>
<br><br>

_______________/______________<br>
    �������         �.�.�. <br>
    
    

_______________/______________<br>
	�������         �.�.�.<br>
	
</center>
<br><br>
HEREDOC;

