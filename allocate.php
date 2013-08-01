<?php
$var1=$_POST['accountname'];
mysql_connect("localhost","root","");
mysql_select_db("application");
$query="insert into account values('','$var1')";
$result=mysql_query($query);
echo ($query);
if ($result)
	echo ("inserted successfully");
else
	echo ("Not inserted");
?>
