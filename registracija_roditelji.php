<?php
ob_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Registracija korisnika</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Courier New, Courier, monospace;
	color: #000000;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
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
	color: #009900;
}
a:active {
	text-decoration: none;
}
#Layer1 {
	position:absolute;
	width:1000px;
	height:150px;
	z-index:1;
	background-image: url(../sk/gore.png);
	left: 100px;
}
#Layer2 {
	position:absolute;
	width:1000px;
	height:30px;
	z-index:2;
	top: 150px;
	background-image: url(../sk/tanka.png);
	left: 100px;
}
#Layer3 {
	position:absolute;
	width:300px;
	height:1000px;
	z-index:3;
	top: 180px;
	background-color: #003366;
	background-image: url(../sk/lijeva.png);
	left: 100px;
}
#Layer4 {
	position:absolute;
	width:700px;
	height:1000px;
	z-index:4;
	left: 400px;
	top: 180px;
	background-color: #EBEBEB;
	background-image: url(../sk/desna.png);
}
#Layer8 {
	position:absolute;
	width:610px;
	height:41px;
	z-index:6;
	left: 380px;
	top: 12px;
}
.style2 {
	font-size: 36px;
	color: #003399;
	font-weight: bold;
}
.style6 {
	color: #CC0000;
	font-weight: bold;
}
.style9 {
	font-size: 11px;
	color: #000000;
}
#Layer5 {
	position:absolute;
	width:500px;
	height:400px;
	z-index:1;
	left: 50px;
	top: 30px;
}
#Layer7 {
	position:absolute;
	width:216px;
	height:40px;
	z-index:5;
	left: 765px;
	top: 119px;
}
-->
</style></head>

<body>
<div id="Layer1">
  <p>&nbsp;</p>
  <p><ul class="style2">&Scaron;kolski imenik</ul>    
  </p>
  </p>
  <div id="Layer7">
<div align="right" class="style6"><?
echo date("d").".".date("m").".".date("Y");
?>
  </div>
</div>
  <div class="style9 " id="Layer8">Diplomski rad: <a href="mailto:marko.vasek@gmail.com">Marko Va&scaron;ek</a>,
mentor: Goran Martinović, ELEKTROTEHNIČKI FAKULTET OSIJEK</div>
</div>
<div id="Layer2">
  <table width="1000" height="30" border="0">
    <tr>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </table>
</div>
<div id="Layer3" class="style6">
<br />
<ul><ul><li><a href="../sk/login.php">Povratak</a></li></ul></ul>
<hr align="center" width="180" />
</div>
<div id="Layer4">
  <div id="Layer5">
  <? 

include "spoj.php";
if (isset($_POST['submit'])) { 





		if (!get_magic_quotes_gpc()) 
		{
		$_POST['korisnicko_ime'] = addslashes($_POST['korisnicko_ime']);
		}
$usercheck = $_POST['korisnicko_ime'];
$check = mysql_query("SELECT korisnicko_ime FROM roditelji WHERE korisnicko_ime = '$usercheck'") 
or die(mysql_error());
$check2 = mysql_num_rows($check);


	if ($check2 != 0) 
	{
	die('Korisnicko ime '.$_POST['Korisnicko_ime'].' vec postoji.<br><br> <div class="style6"><a href="registracija_roditelji.php">Ponovi unos.</a></div>');
	}


		if ($_POST['lozinka'] != $_POST['pass2']) 
		{
		die('Neispravna lozinka.<br><br> <div class="style6"><a href="registracija_roditelji.php">Ponovi unos.</a></div>');
		}
		
$_POST['lozinka'] = md5($_POST['lozinka']);

			if (!get_magic_quotes_gpc()) 
			{
			$_POST['lozinka'] = addslashes($_POST['lozinka']);
			$_POST['korisnicko_ime'] = addslashes($_POST['korisnicko_ime']);
			}


$insert = "INSERT INTO roditelji (ime, prezime, OIB, korisnicko_ime, lozinka)
VALUES ('".$_POST['ime']."','".$_POST['prezime']."','".$_POST['OIB']."','".$_POST['korisnicko_ime']."', '".$_POST['lozinka']."')";
$add_member = mysql_query($insert);
?>
<br>Uspješno ste registrirani!
<br>
<p>Možete se prijaviti <a href="../skolski_imenik/roditelji_login.php">ovdje</a>.</p>

<?php 
}
else 
{ 
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<table border="0" align="center">
<tr>
<td>Podaci o korisniku<hr /></td>
<td></td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr><td>Ime :</td>
<td>
<input type="text" name="ime" maxlength="60"></td></tr>
<tr><td>Prezime :</td>
<td><input type="text" name="prezime" maxlength="60"></td></tr>
<tr>
<td>OIB :</td>
<td><input type="text" name="OIB" maxlength="60"></td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
<td>Korisnički račun<hr /></td>
<td></td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr><td>Korisnicko ime :</td>
<td>
<input type="text" name="korisnicko_ime" maxlength="60"></td></tr>
<tr><td>Oib vašeg djeteta :</td>
<td>
<input type="password" name="lozinka" maxlength="10"></td></tr>
<tr><td>Ponovnovite oib vašeg djeteta :</td>
<td>
<input type="password" name="pass2" maxlength="10"></td></tr>
<tr><td class="style1">&nbsp;</td>
</tr>
<tr><th colspan=2><input type="submit" name="submit" value="Registriraj se"></th></tr> </table>

</form>
  </div>
  <?php
}
?>
</div>
</body>
</html>
<?php
ob_flush();
?>