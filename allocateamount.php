<?php
session_start();

if(isset($_SESSION['uname'])){
?>
<?php
mysql_connect("localhost","root","");
mysql_select_db("application");
$query="select *  from account";
$result = mysql_query($query);
?>
<form method =post action=allocateamt.php>
<table>
<tr><td>A/C Name</td>
	<td><select name =mylist>
<?php
while ($row=mysql_fetch_array($result)){
?>
	<option value=<?php echo($row[1]);?>><?php echo($row[1]);?></option>
<?php
}
?>
</td>
</tr></select>
<tr><td>Allocate Amount </td>
	<td><input type=text name =acc_amt ></td></tr>
<tr><td>Description</td>
	<td><textarea rows=5 cols=4 name =desc></textarea></td></tr>
<tr><td><input type =submit value=Submit></td>
	<td><input type = submit value=Reset></td></tr>
</table>
<?php
}
else{
	header('location:login.html');
}
?>
