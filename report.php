<?php
require_once 'config/config.php';

echo "<a href='index.php'>�������</a> | ";
echo "<a href='employee.php'>����������</a> | ";
echo "<a href=\"expiraton.php\">������</a><br><br><br>";
$start_date = $_GET['y'].$_GET['m'].$_GET['d'];
$expiration_date = $_GET['yn'].$_GET['mn'].$_GET['dn'];

echo <<<HEREDOC
<div align="right">
<pre>
 � � � � � � � � �
 
 �������� ��� "���"
 �.�. �������
 ___________20___�.

 __________________
</pre>
</div>
HEREDOC;

echo <<<HEREDOC
<table border="1" align="center">
	<tr>
		<td>�</td>
		<td>���</td>
		<td>�����</td>
		
		<td>���������(���������)</td>
		<td>������� �������</td>
		<td>������������ ����������</td>
		<td>����</td>
		<td>������������ �����. ������������</td>
		<td>�������. ����.</td>
		<td>�������� ��� ����������� ���-��</td>
		<td>��������� ��� ����������� ���-��</td>
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
	
	
	$query = "SELECT name,surname,secondname,department.title,job.title, employee_id
	FROM employee,department,job
	WHERE employee_id = '$checkup_linkkey'
	AND employee.department_id = department.department_id
	AND employee.job_id = job.job_id
	GROUP BY surname";
	$result_employee = mysql_query($query);
	while ($r = mysql_fetch_array($result_employee))
	{
echo <<<HEREDOC
	<tr>
		<td>$r[5]</td>
		<td>$r[0] $r[1] $r[2]</td>
		<td>&nbsp</td>
		
		<td>$r[4]</td>
		<td>&nbsp</td>
		<td>$q[2]</td>
		<td>&nbsp</td>
		<td>&nbsp</td>
		<td>&nbsp</td>
		<td>$q[3]</td>
		<td>$q[4]</td>
	</tr>	
HEREDOC;

	}
	

}


echo "</table>";