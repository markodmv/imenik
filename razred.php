<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Razred</title>
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
	color: #006600;
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
	top: 0px;
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
	z-index:4;
	left: 400px;
	top: -541px;
	height: 497px;
}
#Layer5 {
	position:absolute;
	width:335px;
	height:38px;
	z-index:4;
	left: 400px;
	top: 97px;
}
#Layer6 {
	position:absolute;
	width:950px;
	height:56px;
	z-index:0;
	left: 20px;
	top: 50px;
}
.style5 {
	font-size: 36px;
	color: #003399;
	font-weight: bold;
}
.style6 {
	color: #CC0000;
	font-weight: bold;
}
.style7 {
    color: #003399;
	font-size: 15px;
	font-weight: bold;
}
#Layer7 {
	position:absolute;
	width:216px;
	height:40px;
	z-index:5;
	left: 765px;
	top: 119px;
}
#Layer8 {
	position:absolute;
	width:610px;
	height:41px;
	z-index:6;
	left: 380px;
	top: 12px;
}
.style9 {
	font-size: 11px;
	color: #000000;
}
.style11 {color:#000000}
#Layer9 {
	position:absolute;
	height:400px;
	z-index:1;
	left: 50px;
	top: 30px;
	width: 500px;
}
#Layer10 {
	position:absolute;
	width:620px;
	height:245px;
	z-index:5;
	left: 43px;
	top: 19px;
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
$check = mysql_query("SELECT * FROM korisnik WHERE korisnicko_ime = '$username'")or die(mysql_error()); 
while($info = mysql_fetch_array( $check )) 
{ 

if ($pass != $info['lozinka']) 
{ header("Location: login.php"); 
} 

else 
{
$kid= $info['korisnik_id'];
?>
<div id="Layer1" style=" position: relative; left: -500px; top: 0px;">
<div id="Layer6" class="style5" align="center">
OŠ 
      <?
$skola=$info['naziv_skole'];
echo $skola;
?>
</div>
<div id="Layer5"><span class="style7"><?
$mj=$info['mjesto_skole'];
echo $mj;
?>
</span></div>
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
  <table width="1000" height="30" border="0" align="left">
    <tr>
      <th scope="col" align="left" width="318" class="style11"><div align="center"><?
	$kor = ucfirst(strtolower($username));
	echo "Korisnik : $kor "; 
	?></div></th>
      <th scope="col" align="left" width="246" class="style11"><?
$rid= $_GET["razred_id"];
$razred="select * from razred where korisnik_id = '$kid' and razred_id = '$rid'";
if(!$r=mysql_query($razred))
{
echo "Nevalja nešto sa ridom!";
}
else {
while($redak=mysql_fetch_array($r))
{
echo "Razred : ". $redak['razred'];
}
	}
?></th>
      <th width="422" align="left" scope="col"></th>
    </tr>
  </table>
</div>
<table width="1000" border="0" cellspacing="0" cellpadding="0" style="position:relative; left: -500px; top: 0px;">
  <tr>
    <td valign="top"> 

 <table width="300" height="506" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="28" background="lijeva_gore.png">&nbsp;</td>
  </tr>
  <tr>
    <td height="446" valign="top" background="lijeva_srednja.png">
  <ul>
  <ul>
    <li><a href="dodaj_ucenika.php?razred_id=<?=$_GET["razred_id"]?>">Dodaj učenika</a></li>
	</ul>
  </ul>
	<hr width="180">
	<ul>
  <ul>
    <li><a href="korisnik.php">Korisnik</a></li>
    <li><a href=logout.php>Odjava</a></li> 
	</ul>                                     
  </ul>
  <hr width="180" />
  <ul>
  <ul>
  <li><a href="upis_izostanaka.php?razred_id=<?=$_GET["razred_id"]?>">Upis izostanaka</a></li>
  </ul>
  </ul>
  <hr width="180"/>
  <ul>
  <ul>
  <li><a href="stat_raz.php?razred_id=<?=$_GET["razred_id"]?>">Statistika<br> razreda</a></li>
  </ul>
  </ul>
  <hr width="180" />
    <ul>
  <ul>
  <li><a href="predmeti.php?razred_id=<?=$_GET["razred_id"]?>">Upis osnovnih <br />predmeta</a></li>
  <li><a href="strani_predmeti.php?razred_id=<?=$_GET["razred_id"]?>">Upis stranih <br />jezika</a></li>
  </ul>
  </ul>
  <hr width="180" />
 <br />
 <br />
 <br />	 
 </td>
  </tr>
  <tr>
    <td height="28" background="lijeva_dolje.png">&nbsp;</td>
  </tr>
</table>
 </td>
    <td valign="top"> 
 <table width="700" height="506" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="28" height="28" background="gore_lijevo.png">&nbsp;</td>
    <td width="644" background="gore_mala.png">&nbsp;</td>
    <td width="28" background="gore_desno.png">&nbsp;</td>
  </tr>
  <tr>
    <td height="446" align="right" background="lijevo_mala.png">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF">
	<?
if ($_GET["action"]=="obrisi")
	{
		echo "<br>Jeste li sigurni da želite obrisati sve podatke vezane za učenika?<br>";
		?>
		<br />
		<a href="?action=brisi&razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>"> DA </a><a href="razred.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>"> NE </a>
		<?	
	}
	else
			{
	if ($_GET["action"]=='brisi')
	{
		$rid= $_GET["razred_id"];
		$b= $_GET["opu_id"];
		$sql="delete from osobni_podaci_ucenika where korisnik_id = '$kid' and razred_id = '$rid' and opu_id = '$b'"; 
		$kuh="delete from kuhinja where korisnik_id = '$kid' and razred_id = '$rid' and opu_id = '$b'";
		$bilj="delete from biljeske where korisnik_id = '$kid' and razred_id = '$rid' and opu_id = '$b'";
		if (mysql_query($sql) and mysql_query($kuh) and mysql_query($bilj))
			{
			if (mysql_affected_rows() > 0)
				{
				echo "<br>Učenik je uspješno obrisan!<br>";
				} 
			} else {echo "<br>Nastala je greska pri brisanju podataka!<br />" . mysql_error();}
		}

  
		$sql="select * from osobni_podaci_ucenika where korisnik_id = '$kid' and razred_id = '$_GET[razred_id]' order by rbr_ucenika asc";
if (!$q=mysql_query($sql))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if (mysql_num_rows($q)==0)
		{
		echo "Nema niti jednog učenika u imeniku!<br>";
		} else 
				{
				?>
			<br /><br />
 				<table width="600" border="0" align="center" cellpadding="1" cellspacing="1">
				<?
				while ($redak=mysql_fetch_array($q))
					{
					?>
					<tr>
					<td width="50"><?=$redak["rbr_ucenika"]?>.<hr /></td>
					<td width="300"> <?=$redak["prezime_ucenika"]?> <?=$redak["ime_ucenika"]?> <hr /></td>
      				<td width="100"><a href="imenik.php?razred_id=<?=$redak["razred_id"]?>&opu_id=<?=$redak["opu_id"]?>"> Pogledaj </a>
      				  <hr /></td>
					<td width="100"><a href="?action=obrisi&razred_id=<?=$redak["razred_id"]?>&opu_id=<?=$redak["opu_id"]?>"> Obriši </a>
					  <hr /></td>
    				</tr>
					<?	
					}
				?>
	</table>
				    <?
				}
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
 </td>
  </tr>
</table>
<?
} 
} 
 }
else 
{ 
echo "Cooki ne postoji";
} 

?>
</body>
</html>
<?php
ob_flush();
?>