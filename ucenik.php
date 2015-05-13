<?php
ob_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Osobni podaci učenika</title>
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
	background-image: url();
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
	height:497px;
	z-index:4;
	left: 400px;
	top: -594px;
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
	width: 600px;
}
.style12 {
	font-size: 12px;
	color: #000033;
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
      <th scope="col" align="left" width="318" class="style11">
	  <div align="center">
	  <?
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
if($redak=mysql_fetch_array($r))
{
echo "Razred : ". $redak['razred'];
}
	}
?></th>
      <th width="422" align="left" class="style11" scope="col"><?
	  $opu= $_GET["opu_id"]; 
	  $sql="Select * from osobni_podaci_ucenika where korisnik_id = '$kid' and razred_id = '$rid' and opu_id = '$opu'";
	  if(!$sq=mysql_query($sql)) {echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query(); }
	else
	{
	if ($s=mysql_fetch_array($sq))
	{
	$p = $s["prezime_ucenika"];
	$i = $s["ime_ucenika"];
	echo "Učenik : $p $i";
	}
	}
	 ?></th>
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
    <li><a href="ucenik.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Osobni podaci</a></li>
	<li><a href="imenik.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Imenik</a></li>
	<li><a href="biljeske.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Bilješke</a></li>
	<li><a href="vladanje.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Vladanje</a></li>
	<li><a href="pedagoske_mjere.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Pedagoške mjere</a></li>
	<li><a href="kuhinja.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Kuhinja</a></li>
	<li><a href="izostanci.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Izostanci</a></li>
	<li><a href="statistika.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Statistika</a></li>
	</ul>
  </ul>
  	<hr width="180" />
	<ul>
	<ul>
	<li><a href="izmjena_osobnih_podataka.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Izmjena osobnih  podataka</a></li>
	</ul>
	</ul>
	<hr width="180">
	<ul>
  <ul>
    <li><a href="razred.php?razred_id=<?=$_GET["razred_id"]?>">Razred</a></li>
    <li><a href=logout.php>Odjava</a></li> 
	</ul>                                     
  </ul>
  <hr width="180" />
  <?
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
				<table width="190" border="0" align="center" cellpadding="1" cellspacing="1">
				<?
				while ($redak=mysql_fetch_array($q))
					{
					?>
					<tr>
					<td width="180">
					<a href="ucenik.php?razred_id=<?=$redak["razred_id"]?>&opu_id=<?=$redak["opu_id"]?>" class="style12"> <?=$redak["rbr_ucenika"]?>. <?=$redak["prezime_ucenika"]?> <?=$redak["ime_ucenika"]?> <br /></a>					</td>
					</tr>
					<?
					}
					?>
				</table>
  
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
  echo "Osobni podaci :<br><br>";
  ?>
  
  <?
  $opu="Select * from osobni_podaci_ucenika where opu_id = '$opu' and razred_id = '$rid' and korisnik_id = '$kid'";
  if (!$op=mysql_query($opu))
		{
		echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
		die();
		} if ($redak=mysql_fetch_array($op)) 
				{?>
				<table width="600">
  <tr>
    <td>Redni broj učenika : </td>
    <td><?=$redak["rbr_ucenika"]?></td>
    </tr>
	<tr>
	<td>Red. br. mat. knj. : </td>
	<td><?=$redak["red_br_mat_knj"]?></td>
	</tr>
	<tr>
	<td>Učenik polazi razred </td>
	<td><?=$redak["polazi_razred"]?> (
	<?
	if ($redak["polazi_razred"] == 'prvi') {echo "1.";}
	elseif ($redak["polazi_razred"] == 'drugi') {echo "2.";}
	elseif ($redak["polazi_razred"] == 'treći') {echo "3.";}
	elseif ($redak["polazi_razred"] == 'četvrti') {echo "4.";}
	elseif ($redak["polazi_razred"] == 'peti') {echo "5.";}
	?>
	) put.</td>
	</tr>
    <tr>
    <td>Spol učenika :</td>
    <td><?=$redak["spol_ucenika"]?></td>
    </tr>
  <tr>
    <td>Nadnevak rođenja :</td>
    <td><?=$redak["datum_rodjenja_ucenika"]?></td>
    </tr>
  <tr>
    <td>Mjesto rođenja :</td>
    <td><?=$redak["mjesto_rodjenja_ucenika"]?></td>
    </tr>
  <tr>
    <td>Država rođenja :</td>
    <td><?=$redak["drzava_rodjenja_ucenika"]?></td>
    </tr>
  <tr>
    <td>OIB :</td>
    <td><?=$redak["oib_ucenika"]?></td>
    </tr>
  <tr>
    <td>Državljanstvo :</td>
    <td><?=$redak["drzavljanstvo_ucenika"]?></td>
  </tr>
  <tr>
    <td>Narodnost :</td>
    <td><?=$redak["narodnost_ucenika"]?></td>
  </tr>
  <tr>
    <td>Ime majke :</td>
    <td><?=$redak["ime_majke_ucenika"]?></td>
  </tr>
  <tr>
    <td>Prezime majke :</td>
    <td><?=$redak["prezime_majke_ucenika"]?></td>
  </tr>
  <tr>
    <td>Zanimanje majke :</td>
    <td><?=$redak["zanimanje_majke_ucenika"]?></td>
  </tr>
  <tr>
    <td>Ime oca :</td>
    <td><?=$redak["ime_oca_ucenika"]?></td>
  </tr>
  <tr>
    <td>Prezime oca :</td>
    <td><?=$redak["prezime_oca_ucenika"]?></td>
  </tr>
  <tr>
    <td>Zanimanje oca :</td>
    <td><?=$redak["zanimanje_oca_ucenika"]?></td>
  </tr>
  <tr>
  <td>Učenik stanuje s :</td>
  <td><?=$redak["stanuje_s"]?></td>
  </tr>
    <td>Adresa roditelja ili skrbnika :</td>
    <td><?=$redak["ulica_i_broj_ucenika"]?></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td><?=$redak["postanski_broj_ucenika"]?> <?=$redak["mjesto_ucenika"]?></td>
  </tr>
   <tr>
    <td>Telefon :</td>
    <td><?=$redak["telefon_ucenika"]?></td>
  </tr>
  <tr>
    <td>Mobitel :</td>
    <td><?=$redak["mobitel_ucenika"]?></td>
  </tr>
  <tr>
  
</table>

  <?
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
</div>
<?
} 
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
<?
ob_flush();
?>