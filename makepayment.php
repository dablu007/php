<?php
session_start();

if(isset($_SESSION['uname'])){
?>
<?php
mysql_connect("localhost","root","");
mysql_select_db("application");
$query ="select * from allocateamount";
$result =mysql_query($query);
?>
<form method =post action=makepayment.php>
<table border =1 align=bottom >
<tr><td>A/C Name</td>
	<td><select name=mylist1>
<?php
while ($row=mysql_fetch_array($result)){
?>
	<option value=<?php echo($row[1]);?>><?php echo($row[1]);?></option>
<?php
}
?>



</td>
</tr></select>
<tr><td align=center><input type=submit value=FindBalance name=findbalance></td></tr>
</table>
</form>




<?php
if (isset($_POST['findbalance'])){
	$var3 =$_POST['mylist1'];
	mysql_connect("localhost","root","");
	mysql_select_db("application");
	$query ="select * from allocateamount where acc_name='".$var3."'";
	$result =mysql_query($query);
	$row =mysql_fetch_array($result);
?>

<form method =post action=makepayment.php>
<table border = 1 align=bottom>
<tr><td>Avilable Balance</td>
	<td><input type = text name=bal value =<?php echo($row[2]);?> ></td></tr>
<tr><td>Amount to Pay</td>
	<td><input type = text value ="" name=amountpay></td></tr>
<tr><td>Payers Name</td>
	<td><input type="hidden" name="hid" value=<?php echo($_POST['mylist1']); ?>>
	<input type = text value="" name=payersname></td></tr>
<tr><td>Description</td>
	<td><textarea rows=5 cols=4 name=desc1></textarea></td></tr>
<tr><td><input type=submit value=MakePayment name=makepayment></td></tr>
</table>
</form>
<?php	
}
?>
<?php
	if(isset($_POST['makepayment'])){
		$var1 =$_POST['bal'];
		$var2 =$_POST['amountpay'];
		$var3 =$_POST['payersname'];
		$var4 =$_POST['desc1'];
		$var5 =$_POST['hid'];
		$query="insert into payment values('',$var1,$var2,'$var3','$var4','$var5')";
		$result =mysql_query($query);
		if ($result)
			echo ("inserted");
		else
			echo ("not inserted");
}
?>
<?php
}
else{
	header('location:login.html');
}
?>
	