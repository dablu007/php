<?php
$var1 =$_POST['mylist'];
$var2 =$_POST['acc_amt'];
$var3 =$_POST['desc'];
mysql_connect("localhost","root","");
mysql_select_db("application");
$query ="select * fromamount";
$result =mysql_query($query);
$row=mysql_fetch_array($result);
$var4 =$row[2];
$var5 =$var4+$var2;
$query ="insert into allocateamount values('','$var1',$var5,'$var3')";
$result =mysql_query($query);
if ($result)
	echo ("inserted sucessfully");
else
	echo ("not inserted sucessfully");
?>