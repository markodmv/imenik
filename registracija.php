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
	background-image: url(gore.png);
	left: 100px;
}
#Layer2 {
	position:absolute;
	width:1000px;
	height:30px;
	z-index:2;
	top: 150px;
	background-image: url(tanka.png);
	left: 100px;
}
#Layer3 {
	position:absolute;
	width:300px;
	height:497px;
	z-index:3;
	top: 0px;
	left: 100px;
}
#Layer4 {
	position:absolute;
	width:700px;
	height:497px;
	z-index:4;
	left: 400px;
	top: -497px;
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

<body style="margin-left: 50%;">
<div id="Layer1" style=" position: relative; left: -500px; top: 0px;">
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
<div id="Layer2" style="position:relative; left: -500px; top: 0px;">
  <table width="1000" height="30" border="0">
    <tr>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </table>
</div>
<div id="Layer3" class="style6" style="position:relative; left: -500px;">
<table width="300" height="506" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="28" background="lijeva_gore.png">&nbsp;</td>
  </tr>
  <tr>
    <td height="446" valign="top" background="lijeva_srednja.png">
<ul><ul><li><a href="login.php">Povratak</a></li></ul></ul>
<hr align="center" width="180" />
 <br />
 <br />
 <br />	 
 </td>
  </tr>
  <tr>
    <td height="28" background="lijeva_dolje.png">&nbsp;</td>
  </tr>
</table>
</div>
<div id="Layer4" style="position:relative; left: -200px;">
  <table width="700" height="506" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="28" height="28" background="gore_lijevo.png">&nbsp;</td>
    <td width="644" background="gore_mala.png">&nbsp;</td>
    <td width="28" background="gore_desno.png">&nbsp;</td>
  </tr>
  <tr>
    <td height="446" align="right" background="lijevo_mala.png">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF">
	<? 

include "spoj.php";
if (isset($_POST['submit'])) { 


	if (!$_POST['ime_korisnika'] | !$_POST['prezime_korisnika'] | !$_POST['oib'] | !$_POST['ulica_i_broj_korisnika'] | !$_POST['postanski_broj_korisnika'] | !$_POST['mjesto_korisnika'] | !$_POST['naziv_skole'] | !$_POST['ulica_i_broj_skole'] | !$_POST['postanski_broj_skole'] | !$_POST['mjesto_skole'] | !$_POST['korisnicko_ime'] | !$_POST['lozinka'] | !$_POST['pass2']) 
	{
	die('Nisu popunjena sva polja!<br><br>
	<div class="style6"><a href="registracija.php">Ponovi unos.</a></div>');
	
	}


		if (!get_magic_quotes_gpc()) 
		{
		$_POST['korisnicko_ime'] = addslashes($_POST['korisnicko_ime']);
		}
$usercheck = $_POST['korisnicko_ime'];
$check = mysql_query("SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = '$usercheck'") 
or die(mysql_error());
$check2 = mysql_num_rows($check);


	if ($check2 != 0) 
	{
	die('Korisnicko ime '.$_POST['Korisnicko_ime'].' vec postoji.<br><br> <div class="style6"><a href="registracija.php">Ponovi unos.</a></div>');
	}


		if ($_POST['lozinka'] != $_POST['pass2']) 
		{
		die('Neispravna lozinka.<br><br> <div class="style6"><a href="registracija.php">Ponovi unos.</a></div>');
		}
		
$_POST['lozinka'] = md5($_POST['lozinka']);

			if (!get_magic_quotes_gpc()) 
			{
			$_POST['lozinka'] = addslashes($_POST['lozinka']);
			$_POST['korisnicko_ime'] = addslashes($_POST['korisnicko_ime']);
			}


$insert = "INSERT INTO korisnik (ime_korisnika, prezime_korisnika, oib, ulica_i_broj_korisnika, postanski_broj_korisnika, mjesto_korisnika, naziv_skole, ulica_i_broj_skole, postanski_broj_skole, mjesto_skole, korisnicko_ime, lozinka)
VALUES ('".$_POST['ime_korisnika']."', '".$_POST['prezime_korisnika']."', '".$_POST['oib']."', '".$_POST['ulica_i_broj_korisnika']."', '".$_POST['postanski_broj_korisnika']."', '".$_POST['mjesto_korisnika']."', '".$_POST['naziv_skole']."', '".$_POST['ulica_i_broj_skole']."', '".$_POST['postanski_broj_skole']."', '".$_POST['mjesto_skole']."', '".$_POST['korisnicko_ime']."', '".$_POST['lozinka']."')";
$add_member = mysql_query($insert);
?>
<br>Uspješno ste registrirani!
<br>
<p>Možete se prijaviti <a href="login.php">ovdje</a>.</p>

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
<input type="text" name="ime_korisnika" maxlength="60"></td></tr>
<tr><td>Prezime :</td>
<td><input type="text" name="prezime_korisnika" maxlength="60"></td></tr>
<tr>
<td>OIB :</td>
<td><input type="text" name="oib" maxlength="60"></td>
</tr>
<tr>
<td>Ulica i broj :</td>
<td><input type="text" name="ulica_i_broj_korisnika" maxlength="80" /></td>
</tr>
<tr>
<td>Poštanski broj :</td>
<td><input type="text" name="postanski_broj_korisnika" maxlength="60" /></td>
</tr>
<tr>
<td>Mjesto :</td>
<td><input type="text" name="mjesto_korisnika" maxlength="60" /></td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
<td>Podaci o školi<hr /></td>
<td></td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>Naziv škole : OŠ </td>
  <td>
<input type="text" name="naziv_skole" maxlength="60"></td></tr>
<tr>
  <td>Ulica i broj :</td>
  <td>
<input type="text" name="ulica_i_broj_skole" maxlength="60"></td></tr>
<tr>
<td>Poštanski broj :</td>
<td><input type="text" name="postanski_broj_skole" maxlength="60" /></td>
</tr>
<tr>
  <td>Mjesto :</td>
  <td>
<input type="text" name="mjesto_skole" maxlength="60"></td></tr>
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
<tr><td>Lozinka :</td>
<td>
<input type="password" name="lozinka" maxlength="10"></td></tr>
<tr><td>Potvrdi lozinku :</td>
<td>
<input type="password" name="pass2" maxlength="10"></td></tr>
<tr><td class="style1">&nbsp;</td>
</tr>
<tr><th colspan=2><input type="submit" name="submit" value="Registriraj se"></th></tr> </table>

</form>
  
  <?php
}
?>

	</td>
    <td background="desno_mala.png">&nbsp;</td>
  </tr>
  <tr>
    <td height="28" background="dolje_lijevo.png">&nbsp;</td>
    <td valign="baseline" background="dolje_mala.png">&nbsp;</td>
    <td background="dolje_desno.png">&nbsp;</td>
  </tr>
</table>
</div>
</body>
</html>
<?php
ob_flush();
?>