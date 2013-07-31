<?php
session_start();

if(isset($_SESSION['uname'])){
?>
<body>
<form method = post action = allocate.php>
<table>
<tr><td>Account name</td>
	<td><input type = text name = accountname></td></tr>
<tr><td><input type = submit value = Create></td></tr>
</table>
</body>
</html>
<?php
}
else{
	header('location:login.html');
}
?>