<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Ministarstvo login</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Courier New, Courier, monospace;
	color: #000000;
}
body {
	background-color: #003300;
}
a:link {
	color: #FF0000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FF0000;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
	color: #FF0000;
}
#Layer1 {
	position:absolute;
	width:414px;
	height:226px;
	z-index:1;
	left: 7px;
	top: 5px;
	background-color: #003300;
}

#Layer2 {
	position:absolute;
	width:428px;
	height:239px;
	z-index:2;
	left: 299px;
	top: 216px;
	background-color: #FFFFFF;
}
#Layer3 {
	position:absolute;
	width:367px;
	height:108px;
	z-index:3;
	left: 225px;
	top: 77px;
}
.style1 {
	font-size: 36px;
	font-weight: bold;
	color: #FFFFFF;
}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style></head>

<body style="margin-left: 50%;">
<?
include "spoj.php";

if(isset($_COOKIE['ID_my_site']))


{ 
$username = $_COOKIE['ID_my_site']; 
$pass = $_COOKIE['Key_my_site'];
$check = mysql_query("SELECT * FROM mzos WHERE korisnicko_ime = '$username'")or die(mysql_error());
while($info = mysql_fetch_array( $check )) 
{
if ($pass != $info['lozinka']) 
{
}
else
{
header("Location: popis_skola.php");

}
}
}


if (isset($_POST['submit'])) { 


if(!$_POST['username'] | !$_POST['pass']) {
die('Nisu popunjena zatražena polja.<a href="ministarstvo_login.php"> <br>Pokušajte ponovo. </a>');
}


if (!get_magic_quotes_gpc()) {
$_POST['email'] = addslashes($_POST['email']);
}
$check = mysql_query("SELECT * FROM mzos WHERE korisnicko_ime = '".$_POST['username']."'")or die(mysql_error());


$check2 = mysql_num_rows($check);
if ($check2 == 0) {
die('Ne postoji takav korisnik.<a href="ministarstvo_login.php"> <br>Pokušajte ponovo. </a>');
}
while($info = mysql_fetch_array( $check )) 
{
$_POST['pass'] = stripslashes($_POST['pass']);
$info['lozinka'] = stripslashes($info['lozinka']);
$_POST['pass'] = md5($_POST['pass']);


if ($_POST['pass'] != $info['lozinka']) {
die('Lozinka nije valjana, pokušajte
<a href="ministarstvo_login.php"> ponovo. </a>
');
}
else 
{ 


$_POST['username'] = stripslashes($_POST['username']); 
$hour = time() + 3600; 
setcookie(ID_my_site, $_POST['username'], $hour); 
setcookie(Key_my_site, $_POST['pass'], $hour); 


header("Location: popis_skola.php"); 
} 
} 
} 
else 
{ 
?> 
<div id="Layer2" style=" position: relative; left: -214px; top: 200px;">
  <div id="Layer1">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <br />
      <table width="385" height="192" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
        <tr>
          <td height="57"><h1 class="style4">Prijava</h1></td>
        </tr>
        <tr>
          <td height="37"><span class="style4">Korisničko ime:</span></td>
          <td><input name="username" type="text" maxlength="50" /></td>
        </tr>
        <tr>
          <td height="37"><span class="style4">Lozinka:</span></td>
          <td><input name="pass" type="password" maxlength="50" /></td>
        </tr>
        <tr>
          <td height="42" colspan="2" align="center"><div align="center">
            <input type="submit" name="submit" value="Prijava" />
          </div></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?
}
?>
<div id="Layer3" style="position:relative; left: -158; top: -200;">
  <p class="style1">ŠKOLSKI IMENIK </p>
  <p align="left" class="style2">za razrednu nastavu  </p>
</div>
</body>
</html>
<?php
ob_flush();
?>