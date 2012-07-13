<?php
// variable definition
$server = 'localhost';
$user = 'root';
$password = '12345';
$database_name = 'otbmed';

//connect to mysql
mysql_connect($server,$user,$password) or die ("Невозможно подключиться к mysql </br>".mysql_error());

//connect to database
mysql_select_db($database_name) or die ("Невозможно подключиться к базе данных </br>".mysql_error());

//set encoding from mysql
mysql_query('SET NAMES cp1251');
