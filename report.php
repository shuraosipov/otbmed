<?php
require_once 'config/config.php';

echo "<a href='index.php'>�������</a> | ";
echo "<a href='employee.php'>����������</a> | ";
echo "<a href=\"expiraton.php\">������</a><br><br><br>";
$start_date = $_GET['y'].$_GET['m'].$_GET['d'];
$expiration_date = $_GET['yn'].$_GET['mn'].$_GET['dn'];

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
		<td align="center" >������� �������</td>
		<td align="center">������������ ����������</td>
		<td align="center">����</td>
		<td align="center">������������ �����. ������������</td>
		<td align="center">�������. ����.</td>
		<td align="center">�������� ��� ����������� ���-��</td>
		<td align="center">��������� ��� ����������� ���-��</td>
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
		<td align="center">11</td>
		<td align="center">12</td>
	</tr>



		
HEREDOC;



$q_checkup_expirate = "Select * 
						FROM checkup 
						WHERE next 
						BETWEEN '$start_date' AND '$expiration_date'";
$result = mysql_query($q_checkup_expirate);
while ($q = mysql_fetch_array($result))
{
	$checkup_linkkey = $q[1];
	
	
	$query = "SELECT name,surname,secondname,department.title,job.title, employee_id, bad_condition.title
	FROM employee,department,job,bad_condition
	WHERE employee_id = '$checkup_linkkey'
	AND employee.department_id = department.department_id
	AND employee.job_id = job.job_id
	AND bad_condition.bad_condition_linkkey = '$checkup_linkkey'
	GROUP BY surname";
	$result_employee = mysql_query($query);
	while ($r = mysql_fetch_array($result_employee))
	{
echo <<<HEREDOC
	<tr>
		<td align="center">$r[5]</td>
		<td align="center">$r[0] $r[1] $r[2]</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">$r[4]</td>
		<td align="center">$r[6]</td>
		<td align="center">$q[2]</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">$q[3]</td>
		<td align="center">$q[4]</td>
	</tr>	
	<tr>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
		<td align="center">&nbsp</td>
	</tr>
HEREDOC;
	}
	

}


echo "</table>";
echo <<<HEREDOC
<br><br>
<center>
_______________/______________<br>
    �������         �.�.�. <br>
    
    

_______________/______________<br>
	�������         �.�.�.<br>
	
</center>
<br><br>
HEREDOC;

