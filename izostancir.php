<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Izostanci</title>
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
	height:497px;
	z-index:4;
	left: 400px;
	top: -506px;
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
.style14 {font-size: 12px}
.style16 {font-size: 16px; }
-->
</style></head>

<body style="margin-left: 50%;">
<?
include "spoj.php";

if(isset($_COOKIE['ID_my_site'])) 
{ 
$username = $_COOKIE['ID_my_site']; 
$pass = $_COOKIE['Key_my_site']; 
$check = mysql_query("SELECT * FROM roditelji WHERE korisnicko_ime = '$username'")or die(mysql_error()); 
while($info = mysql_fetch_array( $check )) 
{ 

if ($pass != $info['lozinka']) 
{ header("Location: login.php"); 
} 

else 
{
?>
<div id="Layer1" style=" position: relative; left: -500px; top: 0px;">
<div id="Layer6" class="style5" align="center">
OŠ 
      <?
$skola=$_GET["naziv_skole"];
echo $skola;
?>
</div>
<div id="Layer5"><span class="style7"><?
$mj=$_GET["mjesto_skole"];
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
	?>
	</div>
	</th>
      <th scope="col" align="left" width="246" class="style11"><?
	$rid= $_GET["razred_id"];
$razred="select * from razred where razred_id = '$rid'";
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
	  $sql="Select * from osobni_podaci_ucenika where razred_id = '$rid' and opu_id = '$opu'";
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
   <li><a href="ucenikr.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>&mjesto_skole=<?=$_GET["mjesto_skole"]?>&naziv_skole=<?=$_GET["naziv_skole"]?>">Osobni podaci</a></li>
	<li><a href="imenikr.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>&mjesto_skole=<?=$_GET["mjesto_skole"]?>&naziv_skole=<?=$_GET["naziv_skole"]?>">Imenik</a></li>
	<li><a href="biljesker.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>&mjesto_skole=<?=$_GET["mjesto_skole"]?>&naziv_skole=<?=$_GET["naziv_skole"]?>">Bilješke</a></li>
	<li><a href="vladanjer.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>&mjesto_skole=<?=$_GET["mjesto_skole"]?>&naziv_skole=<?=$_GET["naziv_skole"]?>">Vladanje</a></li>
	<li><a href="pedagoske_mjerer.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>&mjesto_skole=<?=$_GET["mjesto_skole"]?>&naziv_skole=<?=$_GET["naziv_skole"]?>">Pedagoške mjere</a></li>
	<li><a href="kuhinjar.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>&mjesto_skole=<?=$_GET["mjesto_skole"]?>&naziv_skole=<?=$_GET["naziv_skole"]?>">Kuhinja</a></li>
	<li><a href="izostancir.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>&mjesto_skole=<?=$_GET["mjesto_skole"]?>&naziv_skole=<?=$_GET["naziv_skole"]?>">Izostanci</a></li>
	<li><a href="statistikar.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>&mjesto_skole=<?=$_GET["mjesto_skole"]?>&naziv_skole=<?=$_GET["naziv_skole"]?>">Statistika</a></li>
	</ul>
  </ul>
	<hr width="180">
	<ul>
  <ul>
    <li><a href=logout.php>Odjava</a></li> 
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
 <table width="700" height="506" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="28" height="28" background="gore_lijevo.png">&nbsp;</td>
    <td width="644" background="gore_mala.png">&nbsp;</td>
    <td width="28" background="gore_desno.png">&nbsp;</td>
  </tr>
  <tr>
    <td height="446" align="right" background="lijevo_mala.png">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF"><?
  echo "Izostanci :<br><br>";
  
	$sql="select * from izostanci where opu_id = '$opu' and datum like '____-06-__' order by datum desc";
	if (!$q=mysql_query($sql))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if (mysql_num_rows($q)==0)
		{
		
		} else 
				{
				?>
  <table width="600" border="1" cellspacing="1" cellpadding="1">
    <tr bgcolor="#BEB4FC">
      <td><div align="center" class="style14">Datum</div></td>
      <td><div align="center" class="style14">koji sat </div></td>
      <td><div align="center" class="style14">razlog izostanka </div></td>
      <td><div align="center" class="style16">O</div></td>
      <td><div align="center" class="style16">N</div></td>
    </tr>
	<?
				while ($redak=mysql_fetch_array($q))
					{
					$iz= $redak["izostanci_id"];
	?>
	<tr>
      <td><div align="center" class="style14"><?=$redak["datum"]?></div></td>
      <td><div align="center" class="style14">
	  <?=$redak["prvi"]?>
	  <?=$redak["drugi"]?>
	  <?=$redak["treci"]?>
	  <?=$redak["cetvrti"]?>
	  <?=$redak["peti"]?>
	  <?=$redak["sesti"]?>
	  <?=$redak["sedmi"]?>
	  </div></td>
	  <?
	  $izoazu="select * from izostanci_azuriranje where izostanci_id = '$iz'";
	  if (!$izo=mysql_query($izoazu))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($izo))
	{
	  ?>
      <td><div align="center" class="style14"><?=$red["razlog_izostanka"]?></div></td>
      <td><div align="center" class="style16"><?=$red["opravdano"]?></div></td>
      <td><div align="center" class="style16"><?=$red["neopravdano"]?></div></td>
    </tr>
	<?
	}
					}
				?>
		</table>
				<br />
	Broj izostanaka u 6. mjesecu:
	<br />
	<br />
	<?
	$brizo="select sum(opravdano) as oprav, sum(neopravdano) as neopr from izostanci_azuriranje where opu_id = '$opu' and datum_izostanka like '____-06-__'";
	 if (!$br=mysql_query($brizo))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($br))
	{
	?>
	<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#BEB4FC">
  <tr>
    <td><div align="center">Opravdano</div></td>
    <td><div align="center">Neopravdano</div></td>
  </tr>
  <tr>
    <td><div align="center"><?=$red["oprav"]?></div></td>
    <td><div align="center"><?=$red["neopr"]?></div></td>
  </tr>
</table>
<?
	}
?>
<br />
<br />
				<?
				}
	$sql="select * from izostanci where opu_id = '$opu' and datum like '____-05-__' order by datum desc";
	if (!$q=mysql_query($sql))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if (mysql_num_rows($q)==0)
		{
		
		} else 
				{
				?>
  <table width="600" border="1" cellspacing="1" cellpadding="1">
    <tr bgcolor="#BEB4FC">
      <td><div align="center" class="style14">Datum</div></td>
      <td><div align="center" class="style14">koji sat </div></td>
      <td><div align="center" class="style14">razlog izostanka </div></td>
      <td><div align="center" class="style16">O</div></td>
      <td><div align="center" class="style16">N</div></td>
    </tr>
	<?
				while ($redak=mysql_fetch_array($q))
					{
					$iz= $redak["izostanci_id"];
	?>
	<tr>
      <td><div align="center" class="style14"><?=$redak["datum"]?></div></td>
      <td><div align="center" class="style14">
	  <?=$redak["prvi"]?>
	  <?=$redak["drugi"]?>
	  <?=$redak["treci"]?>
	  <?=$redak["cetvrti"]?>
	  <?=$redak["peti"]?>
	  <?=$redak["sesti"]?>
	  <?=$redak["sedmi"]?>
	  </div></td>
	  <?
	  $izoazu="select * from izostanci_azuriranje where izostanci_id = '$iz'";
	  if (!$izo=mysql_query($izoazu))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($izo))
	{
	  ?>
      <td><div align="center" class="style14"><?=$red["razlog_izostanka"]?></div></td>
      <td><div align="center" class="style16"><?=$red["opravdano"]?></div></td>
      <td><div align="center" class="style16"><?=$red["neopravdano"]?></div></td>
    </tr>
	<?
	}
					}
				?>
		</table>
				<br />
	Broj izostanaka u 5. mjesecu:
	<br />
	<br />
	<?
	$brizo="select sum(opravdano) as oprav, sum(neopravdano) as neopr from izostanci_azuriranje where opu_id = '$opu' and datum_izostanka like '____-05-__'";
	 if (!$br=mysql_query($brizo))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($br))
	{
	?>
	<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#BEB4FC">
  <tr>
    <td><div align="center">Opravdano</div></td>
    <td><div align="center">Neopravdano</div></td>
  </tr>
  <tr>
    <td><div align="center"><?=$red["oprav"]?></div></td>
    <td><div align="center"><?=$red["neopr"]?></div></td>
  </tr>
</table>
<?
	}
?>
<br />
<br />
				<?
				}
				$sql="select * from izostanci where opu_id = '$opu' and datum like '____-04-__' order by datum desc";
	if (!$q=mysql_query($sql))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if (mysql_num_rows($q)==0)
		{
		
		} else 
				{
				?>
  <table width="600" border="1" cellspacing="1" cellpadding="1">
    <tr bgcolor="#BEB4FC">
      <td><div align="center" class="style14">Datum</div></td>
      <td><div align="center" class="style14">koji sat </div></td>
      <td><div align="center" class="style14">razlog izostanka </div></td>
      <td><div align="center" class="style16">O</div></td>
      <td><div align="center" class="style16">N</div></td>
    </tr>
	<?
				while ($redak=mysql_fetch_array($q))
					{
					$iz= $redak["izostanci_id"];
	?>
	<tr>
      <td><div align="center" class="style14"><?=$redak["datum"]?></div></td>
      <td><div align="center" class="style14">
	  <?=$redak["prvi"]?>
	  <?=$redak["drugi"]?>
	  <?=$redak["treci"]?>
	  <?=$redak["cetvrti"]?>
	  <?=$redak["peti"]?>
	  <?=$redak["sesti"]?>
	  <?=$redak["sedmi"]?>
	  </div></td>
	  <?
	  $izoazu="select * from izostanci_azuriranje where izostanci_id = '$iz'";
	  if (!$izo=mysql_query($izoazu))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($izo))
	{
	  ?>
      <td><div align="center" class="style14"><?=$red["razlog_izostanka"]?></div></td>
      <td><div align="center" class="style16"><?=$red["opravdano"]?></div></td>
      <td><div align="center" class="style16"><?=$red["neopravdano"]?></div></td>
    </tr>
	<?
	}
					}
				?>
		</table>
				<br />
	Broj izostanaka u 4. mjesecu:
	<br />
	<br />
	<?
	$brizo="select sum(opravdano) as oprav, sum(neopravdano) as neopr from izostanci_azuriranje where opu_id = '$opu' and datum_izostanka like '____-04-__'";
	 if (!$br=mysql_query($brizo))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($br))
	{
	?>
	<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#BEB4FC">
  <tr>
    <td><div align="center">Opravdano</div></td>
    <td><div align="center">Neopravdano</div></td>
  </tr>
  <tr>
    <td><div align="center"><?=$red["oprav"]?></div></td>
    <td><div align="center"><?=$red["neopr"]?></div></td>
  </tr>
</table>
<?
	}
?>
<br />
<br />
				<?
				}
				$sql="select * from izostanci where opu_id = '$opu' and datum like '____-03-__' order by datum desc";
	if (!$q=mysql_query($sql))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if (mysql_num_rows($q)==0)
		{
		
		} else 
				{
				?>
  <table width="600" border="1" cellspacing="1" cellpadding="1">
    <tr bgcolor="#BEB4FC">
      <td><div align="center" class="style14">Datum</div></td>
      <td><div align="center" class="style14">koji sat </div></td>
      <td><div align="center" class="style14">razlog izostanka </div></td>
      <td><div align="center" class="style16">O</div></td>
      <td><div align="center" class="style16">N</div></td>
    </tr>
	<?
				while ($redak=mysql_fetch_array($q))
					{
					$iz= $redak["izostanci_id"];
	?>
	<tr>
      <td><div align="center" class="style14"><?=$redak["datum"]?></div></td>
      <td><div align="center" class="style14">
	  <?=$redak["prvi"]?>
	  <?=$redak["drugi"]?>
	  <?=$redak["treci"]?>
	  <?=$redak["cetvrti"]?>
	  <?=$redak["peti"]?>
	  <?=$redak["sesti"]?>
	  <?=$redak["sedmi"]?>
	  </div></td>
	  <?
	  $izoazu="select * from izostanci_azuriranje where izostanci_id = '$iz'";
	  if (!$izo=mysql_query($izoazu))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($izo))
	{
	  ?>
      <td><div align="center" class="style14"><?=$red["razlog_izostanka"]?></div></td>
      <td><div align="center" class="style16"><?=$red["opravdano"]?></div></td>
      <td><div align="center" class="style16"><?=$red["neopravdano"]?></div></td>
    </tr>
	<?
	}
					}
				?>
		</table>
				<br />
	Broj izostanaka u 3. mjesecu:
	<br />
	<br />
	<?
	$brizo="select sum(opravdano) as oprav, sum(neopravdano) as neopr from izostanci_azuriranje where opu_id = '$opu' and datum_izostanka like '____-03-__'";
	 if (!$br=mysql_query($brizo))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($br))
	{
	?>
	<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#BEB4FC">
  <tr>
    <td><div align="center">Opravdano</div></td>
    <td><div align="center">Neopravdano</div></td>
  </tr>
  <tr>
    <td><div align="center"><?=$red["oprav"]?></div></td>
    <td><div align="center"><?=$red["neopr"]?></div></td>
  </tr>
</table>
<?
	}
?>
<br />
<br />
				<?
				}
				$sql="select * from izostanci where opu_id = '$opu' and datum like '____-02-__' order by datum desc";
	if (!$q=mysql_query($sql))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if (mysql_num_rows($q)==0)
		{
		
		} else 
				{
				?>
  <table width="600" border="1" cellspacing="1" cellpadding="1">
    <tr bgcolor="#BEB4FC">
      <td><div align="center" class="style14">Datum</div></td>
      <td><div align="center" class="style14">koji sat </div></td>
      <td><div align="center" class="style14">razlog izostanka </div></td>
      <td><div align="center" class="style16">O</div></td>
      <td><div align="center" class="style16">N</div></td>
    </tr>
	<?
				while ($redak=mysql_fetch_array($q))
					{
					$iz= $redak["izostanci_id"];
	?>
	<tr>
      <td><div align="center" class="style14"><?=$redak["datum"]?></div></td>
      <td><div align="center" class="style14">
	  <?=$redak["prvi"]?>
	  <?=$redak["drugi"]?>
	  <?=$redak["treci"]?>
	  <?=$redak["cetvrti"]?>
	  <?=$redak["peti"]?>
	  <?=$redak["sesti"]?>
	  <?=$redak["sedmi"]?>
	  </div></td>
	  <?
	  $izoazu="select * from izostanci_azuriranje where izostanci_id = '$iz'";
	  if (!$izo=mysql_query($izoazu))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($izo))
	{
	  ?>
      <td><div align="center" class="style14"><?=$red["razlog_izostanka"]?></div></td>
      <td><div align="center" class="style16"><?=$red["opravdano"]?></div></td>
      <td><div align="center" class="style16"><?=$red["neopravdano"]?></div></td>
    </tr>
	<?
	}
					}
				?>
		</table>
				<br />
	Broj izostanaka u 2. mjesecu:
	<br />
	<br />
	<?
	$brizo="select sum(opravdano) as oprav, sum(neopravdano) as neopr from izostanci_azuriranje where opu_id = '$opu' and datum_izostanka like '____-02-__'";
	 if (!$br=mysql_query($brizo))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($br))
	{
	?>
	<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#BEB4FC">
  <tr>
    <td><div align="center">Opravdano</div></td>
    <td><div align="center">Neopravdano</div></td>
  </tr>
  <tr>
    <td><div align="center"><?=$red["oprav"]?></div></td>
    <td><div align="center"><?=$red["neopr"]?></div></td>
  </tr>
</table>
<?
	}
?>
<br />
<br />
				<?
				}
				$sql="select * from izostanci where opu_id = '$opu' and datum like '____-01-__' order by datum desc";
	if (!$q=mysql_query($sql))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if (mysql_num_rows($q)==0)
		{
		
		} else 
				{
				?>
  <table width="600" border="1" cellspacing="1" cellpadding="1">
    <tr bgcolor="#BEB4FC">
      <td><div align="center" class="style14">Datum</div></td>
      <td><div align="center" class="style14">koji sat </div></td>
      <td><div align="center" class="style14">razlog izostanka </div></td>
      <td><div align="center" class="style16">O</div></td>
      <td><div align="center" class="style16">N</div></td>
    </tr>
	<?
				while ($redak=mysql_fetch_array($q))
					{
					$iz= $redak["izostanci_id"];
	?>
	<tr>
      <td><div align="center" class="style14"><?=$redak["datum"]?></div></td>
      <td><div align="center" class="style14">
	  <?=$redak["prvi"]?>
	  <?=$redak["drugi"]?>
	  <?=$redak["treci"]?>
	  <?=$redak["cetvrti"]?>
	  <?=$redak["peti"]?>
	  <?=$redak["sesti"]?>
	  <?=$redak["sedmi"]?>
	  </div></td>
	  <?
	  $izoazu="select * from izostanci_azuriranje where izostanci_id = '$iz'";
	  if (!$izo=mysql_query($izoazu))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($izo))
	{
	  ?>
      <td><div align="center" class="style14"><?=$red["razlog_izostanka"]?></div></td>
      <td><div align="center" class="style16"><?=$red["opravdano"]?></div></td>
      <td><div align="center" class="style16"><?=$red["neopravdano"]?></div></td>
    </tr>
	<?
	}
					}
				?>
		</table>
				<br />
	Broj izostanaka u 1. mjesecu:
	<br />
	<br />
	<?
	$brizo="select sum(opravdano) as oprav, sum(neopravdano) as neopr from izostanci_azuriranje where opu_id = '$opu' and datum_izostanka like '____-01-__'";
	 if (!$br=mysql_query($brizo))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($br))
	{
	?>
	<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#BEB4FC">
  <tr>
    <td><div align="center">Opravdano</div></td>
    <td><div align="center">Neopravdano</div></td>
  </tr>
  <tr>
    <td><div align="center"><?=$red["oprav"]?></div></td>
    <td><div align="center"><?=$red["neopr"]?></div></td>
  </tr>
</table>
<?
	}
?>
<br />
<br />
				<?
				}
				$sql="select * from izostanci where opu_id = '$opu' and datum like '____-12-__' order by datum desc";
	if (!$q=mysql_query($sql))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if (mysql_num_rows($q)==0)
		{
		
		} else 
				{
				?>
  <table width="600" border="1" cellspacing="1" cellpadding="1">
    <tr bgcolor="#BEB4FC">
      <td><div align="center" class="style14">Datum</div></td>
      <td><div align="center" class="style14">koji sat </div></td>
      <td><div align="center" class="style14">razlog izostanka </div></td>
      <td><div align="center" class="style16">O</div></td>
      <td><div align="center" class="style16">N</div></td>
    </tr>
	<?
				while ($redak=mysql_fetch_array($q))
					{
					$iz= $redak["izostanci_id"];
	?>
	<tr>
      <td><div align="center" class="style14"><?=$redak["datum"]?></div></td>
      <td><div align="center" class="style14">
	  <?=$redak["prvi"]?>
	  <?=$redak["drugi"]?>
	  <?=$redak["treci"]?>
	  <?=$redak["cetvrti"]?>
	  <?=$redak["peti"]?>
	  <?=$redak["sesti"]?>
	  <?=$redak["sedmi"]?>
	  </div></td>
	  <?
	  $izoazu="select * from izostanci_azuriranje where izostanci_id = '$iz'";
	  if (!$izo=mysql_query($izoazu))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($izo))
	{
	  ?>
      <td><div align="center" class="style14"><?=$red["razlog_izostanka"]?></div></td>
      <td><div align="center" class="style16"><?=$red["opravdano"]?></div></td>
      <td><div align="center" class="style16"><?=$red["neopravdano"]?></div></td>
    </tr>
	<?
	}
					}
				?>
		</table>
				<br />
	Broj izostanaka u 12. mjesecu:
	<br />
	<br />
	<?
	$brizo="select sum(opravdano) as oprav, sum(neopravdano) as neopr from izostanci_azuriranje where opu_id = '$opu' and datum_izostanka like '____-12-__'";
	 if (!$br=mysql_query($brizo))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($br))
	{
	?>
	<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#BEB4FC">
  <tr>
    <td><div align="center">Opravdano</div></td>
    <td><div align="center">Neopravdano</div></td>
  </tr>
  <tr>
    <td><div align="center"><?=$red["oprav"]?></div></td>
    <td><div align="center"><?=$red["neopr"]?></div></td>
  </tr>
</table>
<?
	}
?>
<br />
<br />
				<?
				}
				$sql="select * from izostanci where opu_id = '$opu' and datum like '____-11-__' order by datum desc";
	if (!$q=mysql_query($sql))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if (mysql_num_rows($q)==0)
		{
		
		} else 
				{
				?>
  <table width="600" border="1" cellspacing="1" cellpadding="1">
    <tr bgcolor="#BEB4FC">
      <td><div align="center" class="style14">Datum</div></td>
      <td><div align="center" class="style14">koji sat </div></td>
      <td><div align="center" class="style14">razlog izostanka </div></td>
      <td><div align="center" class="style16">O</div></td>
      <td><div align="center" class="style16">N</div></td>
    </tr>
	<?
				while ($redak=mysql_fetch_array($q))
					{
					$iz= $redak["izostanci_id"];
	?>
	<tr>
      <td><div align="center" class="style14"><?=$redak["datum"]?></div></td>
      <td><div align="center" class="style14">
	  <?=$redak["prvi"]?>
	  <?=$redak["drugi"]?>
	  <?=$redak["treci"]?>
	  <?=$redak["cetvrti"]?>
	  <?=$redak["peti"]?>
	  <?=$redak["sesti"]?>
	  <?=$redak["sedmi"]?>
	  </div></td>
	  <?
	  $izoazu="select * from izostanci_azuriranje where izostanci_id = '$iz'";
	  if (!$izo=mysql_query($izoazu))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($izo))
	{
	  ?>
      <td><div align="center" class="style14"><?=$red["razlog_izostanka"]?></div></td>
      <td><div align="center" class="style16"><?=$red["opravdano"]?></div></td>
      <td><div align="center" class="style16"><?=$red["neopravdano"]?></div></td>
    </tr>
	<?
	}
					}
				?>
		</table>
				<br />
	Broj izostanaka u 11. mjesecu:
	<br />
	<br />
	<?
	$brizo="select sum(opravdano) as oprav, sum(neopravdano) as neopr from izostanci_azuriranje where opu_id = '$opu' and datum_izostanka like '____-11-__'";
	 if (!$br=mysql_query($brizo))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($br))
	{
	?>
	<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#BEB4FC">
  <tr>
    <td><div align="center">Opravdano</div></td>
    <td><div align="center">Neopravdano</div></td>
  </tr>
  <tr>
    <td><div align="center"><?=$red["oprav"]?></div></td>
    <td><div align="center"><?=$red["neopr"]?></div></td>
  </tr>
</table>
<?
	}
?>
<br />
<br />
				<?
				}
				$sql="select * from izostanci where opu_id = '$opu' and datum like '____-10-__' order by datum desc";
	if (!$q=mysql_query($sql))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if (mysql_num_rows($q)==0)
		{
		
		} else 
				{
				?>
  <table width="600" border="1" cellspacing="1" cellpadding="1">
    <tr bgcolor="#BEB4FC">
      <td><div align="center" class="style14">Datum</div></td>
      <td><div align="center" class="style14">koji sat </div></td>
      <td><div align="center" class="style14">razlog izostanka </div></td>
      <td><div align="center" class="style16">O</div></td>
      <td><div align="center" class="style16">N</div></td>
    </tr>
	<?
				while ($redak=mysql_fetch_array($q))
					{
					$iz= $redak["izostanci_id"];
	?>
	<tr>
      <td><div align="center" class="style14"><?=$redak["datum"]?></div></td>
      <td><div align="center" class="style14">
	  <?=$redak["prvi"]?>
	  <?=$redak["drugi"]?>
	  <?=$redak["treci"]?>
	  <?=$redak["cetvrti"]?>
	  <?=$redak["peti"]?>
	  <?=$redak["sesti"]?>
	  <?=$redak["sedmi"]?>
	  </div></td>
	  <?
	  $izoazu="select * from izostanci_azuriranje where izostanci_id = '$iz'";
	  if (!$izo=mysql_query($izoazu))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($izo))
	{
	  ?>
      <td><div align="center" class="style14"><?=$red["razlog_izostanka"]?></div></td>
      <td><div align="center" class="style16"><?=$red["opravdano"]?></div></td>
      <td><div align="center" class="style16"><?=$red["neopravdano"]?></div></td>
    </tr>
	<?
	}
					}
				?>
		</table>
				<br />
	Broj izostanaka u 10. mjesecu:
	<br />
	<br />
	<?
	$brizo="select sum(opravdano) as oprav, sum(neopravdano) as neopr from izostanci_azuriranje where opu_id = '$opu' and datum_izostanka like '____-10-__'";
	 if (!$br=mysql_query($brizo))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($br))
	{
	?>
	<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#BEB4FC">
  <tr>
    <td><div align="center">Opravdano</div></td>
    <td><div align="center">Neopravdano</div></td>
  </tr>
  <tr>
    <td><div align="center"><?=$red["oprav"]?></div></td>
    <td><div align="center"><?=$red["neopr"]?></div></td>
  </tr>
</table>
<?
	}
?>
<br />
<br />
				<?
				}
	$sql="select * from izostanci where opu_id = '$opu' and datum like '____-09-__' order by datum desc";
	if (!$q=mysql_query($sql))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if (mysql_num_rows($q)==0)
		{
		
		} else 
				{
				?>
  <table width="600" border="1" cellspacing="1" cellpadding="1">
    <tr bgcolor="#BEB4FC">
      <td><div align="center" class="style14">Datum</div></td>
      <td><div align="center" class="style14">koji sat </div></td>
      <td><div align="center" class="style14">razlog izostanka </div></td>
      <td><div align="center" class="style16">O</div></td>
      <td><div align="center" class="style16">N</div></td>
    </tr>
	<?
				while ($redak=mysql_fetch_array($q))
					{
					$iz= $redak["izostanci_id"];
	?>
	<tr>
      <td><div align="center" class="style14"><?=$redak["datum"]?></div></td>
      <td><div align="center" class="style14">
	  <?=$redak["prvi"]?>
	  <?=$redak["drugi"]?>
	  <?=$redak["treci"]?>
	  <?=$redak["cetvrti"]?>
	  <?=$redak["peti"]?>
	  <?=$redak["sesti"]?>
	  <?=$redak["sedmi"]?>
	  </div></td>
	  <?
	  $izoazu="select * from izostanci_azuriranje where izostanci_id = '$iz'";
	  if (!$izo=mysql_query($izoazu))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($izo))
	{
	  ?>
      <td><div align="center" class="style14"><?=$red["razlog_izostanka"]?></div></td>
      <td><div align="center" class="style16"><?=$red["opravdano"]?></div></td>
      <td><div align="center" class="style16"><?=$red["neopravdano"]?></div></td>
    </tr>
	<?
	}
					}
				?>
		</table>
				<br />
	Broj izostanaka u 9. mjesecu:
	<br />
	<br />
	<?
	$brizo="select sum(opravdano) as oprav, sum(neopravdano) as neopr from izostanci_azuriranje where opu_id = '$opu' and datum_izostanka like '____-09-__'";
	 if (!$br=mysql_query($brizo))
	{
	echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();
	die();
	}
	if($red=mysql_fetch_array($br))
	{
	?>
	<table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#BEB4FC">
  <tr>
    <td><div align="center">Opravdano</div></td>
    <td><div align="center">Neopravdano</div></td>
  </tr>
  <tr>
    <td><div align="center"><?=$red["oprav"]?></div></td>
    <td><div align="center"><?=$red["neopr"]?></div></td>
  </tr>
</table>
<?
	}
?>
<br />
<br />
<br />
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