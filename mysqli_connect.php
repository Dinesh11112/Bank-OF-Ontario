<?php
define('DB_USER','akash');
define('DB_PASSWORD','Qwerty@417');
define('DB_HOST','localhost');
define('DB_NAME','mydb');


$dbc=@mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
OR
die('could not connect to MYSQL:'.mysqli_connect_error());
mysqli_set_charset($dbc,'utf8');
?>