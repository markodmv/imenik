<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Login page</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Courier New, Courier, monospace;
	color: #FFFFFF;
}
body {
	background-color: #003300;
	background-image: url();
	background-repeat: no-repeat;
}
a:link {
	color: #CC0000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #CC0000;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
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
	width:327px;
	height:40px;
	z-index:3;
	left: 56px;
	top: 59px;
}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 36px;
}
#Layer4 {
	position:absolute;
	width:196px;
	height:62px;
	z-index:4;
	left: 787px;
	top: 113px;
}
.style3 {color: #FFFFFF}
.style4 {
	color: #000000;
	font-weight: bold;
}
#Layer5 {
	position:absolute;
	width:580px;
	height:61px;
	z-index:5;
	left: 38px;
	top: 515px;
}
.style6 {color: #FFFFFF; font-weight: bold; }
a {
	font-weight: bold;
}
.style7 {
	color:#FFF;
	font-weight: bold;
	font-size:22px;
	}
#apDiv1 {
	position:absolute;
	width:232px;
	height:86px;
	z-index:6;
	left: 725px;
	top: 327px;
}
-->
</style></head>
<body style="margin-left: 50%;">

<div id="Layer5" style=" position: relative; left: -340px; top: 500px;"><span class="style6">Ukoliko niste registrirani, možete se registrirati</span> <a href="registracija.php"><strong>ovdje.</strong></a></div>
<?
include "spoj.php";

if(isset($_COOKIE['ID_my_site']))


{ 
$username = $_COOKIE['ID_my_site']; 
$pass = $_COOKIE['Key_my_site'];
$check = mysql_query("SELECT * FROM korisnik WHERE korisnicko_ime = '$username'")or die(mysql_error());
while($info = mysql_fetch_array( $check )) 
{
if ($pass != $info['lozinka']) 
{
}
else
{
header("Location: korisnik.php");

}
}
}


if (isset($_POST['submit'])) { 


if(!$_POST['username'] | !$_POST['pass']) {
die('Nisu popunjena zatražena polja.<a href="login.php"> <br>Pokušajte ponovo. </a>');
}


if (!get_magic_quotes_gpc()) {
$_POST['email'] = addslashes($_POST['email']);
}
$check = mysql_query("SELECT * FROM korisnik WHERE korisnicko_ime = '".$_POST['username']."'")or die(mysql_error());


$check2 = mysql_num_rows($check);
if ($check2 == 0) {
die('Ne postoji takav korisnik.<a href="login.php"> <br>Pokušajte ponovo. </a>');
}
while($info = mysql_fetch_array( $check )) 
{
$_POST['pass'] = stripslashes($_POST['pass']);
$info['lozinka'] = stripslashes($info['lozinka']);
$_POST['pass'] = md5($_POST['pass']);


if ($_POST['pass'] != $info['lozinka']) {
die('Lozinka nije valjana, pokušajte
<a href="login.php"> ponovo. </a>
');
}
else 
{ 


$_POST['username'] = stripslashes($_POST['username']); 
$hour = time() + 3600; 
setcookie(ID_my_site, $_POST['username'], $hour); 
setcookie(Key_my_site, $_POST['pass'], $hour); 


header("Location: korisnik.php"); 
} 
} 
} 
else 
{ 


include "spoj.php";
?> 
<div id="Layer2" style=" position: relative; left: -264px; top: 120px;">
<div id="Layer1">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<br> 
<table width="385" height="192" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF"> 
<tr><td height="57"><h1 class="style4">Prijavi se</h1></td>
</tr> 
<tr><td height="37"><span class="style4">Korisničko ime:</span></td>
<td> 
<input name="username" type="text" maxlength="50"></td>
</tr> 
<tr><td height="37"><span class="style4">Lozinka:</span></td>
<td> 
<input name="pass" type="password" maxlength="50"></td>
</tr> 
<tr><td height="42" colspan="2" align="center"> 
    <div align="center">
      <input type="submit" name="submit" value="Prijavi se"> 
    </div></td>
</tr>
</table> 
</form> 
  </div>
</div>
<?php 
} 

?>
<div class="style2" id="Layer3" style=" position: relative; left: -350px; top: -270px;">ŠKOLSKI IMENIK<br>
<span class="style7">za razrednu nastavu</span></div>
<div id="Layer4" style=" position: relative; left: 250px; top: -260px;">
<h2><span class="style1 style3"> Šk. god.
  </span><span class="style1 style3">
  <?
include "spoj.php";
$dat = date("Y") - 1;
$dat1= date("Y") + 1;
$granica= date("m");
if ($granica < 8) { echo $dat ."/". date("Y");}
else { echo date("Y") ."/". $dat1;}
?> 
  </span></h2>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><strong><a href="ministarstvo_login.php">Ministarstvo</a></strong></p>
<p><strong><a href="roditelji_login.php">Roditelji</a></strong></p>
</div>
<p><br>
  <br>
  <br>
  <br>
  <br>
  <br>
</p>
</body>
</html>
<?php
ob_flush();
?>
