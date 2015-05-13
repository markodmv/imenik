<?php
ob_start();
include("Includes/FusionCharts.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
<title>Statistika</title>
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
	top: 7px;
	left: 3px;
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
.style12 {font-size: 12px}
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
<table width="1000" height="170" border="0" cellpadding="0" cellspacing="0" style="position:relative; left: -500px; top: 0px;">
  <tr>
    <td width="300" align="left" valign="top">

<table width="300" height="506" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td height="28" background="lijeva_gore.png">&nbsp;</td>
  </tr>
  <tr>
    <td height="446" valign="top" background="lijeva_srednja.png">
  <ul>
  <ul>
    <li><a href="ucenik.php?razred_id=<?=$_GET["razred_id"]?>&amp;opu_id=<?=$_GET["opu_id"]?>">Osobni podaci</a></li>
	<li><a href="imenik.php?razred_id=<?=$_GET["razred_id"]?>&amp;opu_id=<?=$_GET["opu_id"]?>">Imenik</a></li>
	<li><a href="biljeske.php?razred_id=<?=$_GET["razred_id"]?>&amp;opu_id=<?=$_GET["opu_id"]?>">Bilješke</a></li>
	<li><a href="vladanje.php?razred_id=<?=$_GET["razred_id"]?>&amp;opu_id=<?=$_GET["opu_id"]?>">Vladanje</a></li>
	<li><a href="pedagoske_mjere.php?razred_id=<?=$_GET["razred_id"]?>&amp;opu_id=<?=$_GET["opu_id"]?>">Pedagoške mjere</a></li>
	<li><a href="kuhinja.php?razred_id=<?=$_GET["razred_id"]?>&amp;opu_id=<?=$_GET["opu_id"]?>">Kuhinja</a></li>
	<li><a href="izostanci.php?razred_id=<?=$_GET["razred_id"]?>&amp;opu_id=<?=$_GET["opu_id"]?>">Izostanci</a></li>
	<li><a href="statistika.php?razred_id=<?=$_GET["razred_id"]?>&amp;opu_id=<?=$_GET["opu_id"]?>">Statistika</a></li>
	</ul>
  </ul>
	<hr width="180" />
	<ul>
  <ul>
    <li><a href="razred.php?razred_id=<?=$_GET["razred_id"]?>">Razred</a></li>
    <li><a href="logout.php">Odjava</a></li> 
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
					<a href="statistika.php?razred_id=<?=$redak["razred_id"]?>&amp;opu_id=<?=$redak["opu_id"]?>" class="style12"> <span class="style12">
					<?=$redak["rbr_ucenika"]?>
					. 
					<?=$redak["prezime_ucenika"]?> 
					<?=$redak["ime_ucenika"]?> 
					</span><br />
					</a>					</td>
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
    <td width="700" align="left" valign="top">

 <table width="700" height="506" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="28" height="28" background="gore_lijevo.png">&nbsp;</td>
    <td width="644" background="gore_mala.png">&nbsp;</td>
    <td width="28" background="gore_desno.png">&nbsp;</td>
  </tr>
  <tr>
    <td height="446" align="right" background="lijevo_mala.png">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF">
 <div align="center">
    <?php
	
	echo "<br>Prirodni predmeti: <br>";
	echo "(Matematika, Priroda i društvo)<br>";
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Priroda i društvo'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-09-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Matematika'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-09-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$ruj = '';}
	else
		{
	if ($prirod == 0){$ruj = $mat;}
		else
			{
				if($mat == 0){$ruj = $prirod;}
				else
					{
	$ruj = ($mat + $prirod) / 2;
					}
			}
		}
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Priroda i društvo'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-10-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Matematika'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-10-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$lis = '';}
	else
		{
	if ($prirod == 0){$lis = $mat;}
		else
			{
				if($mat == 0){$lis = $prirod;}
				else
					{
	$lis = ($mat + $prirod) / 2;
					}
			}
		}
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Priroda i društvo'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-11-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Matematika'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-11-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$stu = '';}
	else
		{
	if ($prirod == 0){$stu = $mat;}
		else
			{
				if($mat == 0){$stu = $prirod;}
				else
					{
	$stu = ($mat + $prirod) / 2;
					}
			}
		}
		
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Priroda i društvo'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-12-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Matematika'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-12-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$pro = '';}
	else
		{
	if ($prirod == 0){$pro = $mat;}
		else
			{
				if($mat == 0){$pro = $prirod;}
				else
					{
	$pro = ($mat + $prirod) / 2;
					}
			}
		}
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Priroda i društvo'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-01-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Matematika'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-01-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$sje = '';}
	else
		{
	if ($prirod == 0){$sje = $mat;}
		else
			{
				if($mat == 0){$sje = $prirod;}
				else
					{
	$sje = ($mat + $prirod) / 2;
					}
			}
		}
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Priroda i društvo'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-02-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Matematika'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-02-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$velj = '';}
	else
		{
	if ($prirod == 0){$velj = $mat;}
		else
			{
				if($mat == 0){$velj = $prirod;}
				else
					{
	$velj = ($mat + $prirod) / 2;
					}
			}
		}
		
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Priroda i društvo'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-03-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Matematika'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-03-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$ozu = '';}
	else
		{
	if ($prirod == 0){$ozu = $mat;}
		else
			{
				if($mat == 0){$ozu = $prirod;}
				else
					{
	$ozu = ($mat + $prirod) / 2;
					}
			}
		}
		
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Priroda i društvo'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-04-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Matematika'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-04-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$tra = '';}
	else
		{
	if ($prirod == 0){$tra = $mat;}
		else
			{
				if($mat == 0){$tra = $prirod;}
				else
					{
	$tra = ($mat + $prirod) / 2;
					}
			}
		}
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Priroda i društvo'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-05-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Matematika'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-05-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$svi = '';}
	else
		{
	if ($prirod == 0){$svi = $mat;}
		else
			{
				if($mat == 0){$svi = $prirod;}
				else
					{
	$svi = ($mat + $prirod) / 2;
					}
			}
		}
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Priroda i društvo'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-06-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Matematika'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-06-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$lip = '';}
	else
		{
	if ($prirod == 0){$lip = $mat;}
		else
			{
				if($mat == 0){$lip = $prirod;}
				else
					{
	$lip = ($mat + $prirod) / 2;
					}
			}
		}
	$strXML = "<graph caption='Prosjek ocjena' xAxisName='Mjesec' yAxisName='Ocjena' decimalPrecision='2' formatNumberScale='0' yAxisMaxValue='5'>";
	$strXML .= "<set name='Ruj' value='$ruj' color='AFD8F8' />";
	$strXML .= "<set name='Lis' value='$lis' color='F6BD0F' />";
	$strXML .= "<set name='Stu' value='$stu' color='8BBA00' />";
	$strXML .= "<set name='Pro' value='$pro' color='FF8E46'/>";
	$strXML .= "<set name='Sje' value='$sje' color='008E8E'/>";
	$strXML .= "<set name='Velj' value='$velj' color='D64646'/>";
	$strXML .= "<set name='Ožu' value='$ozu' color='8E468E'/>";
	$strXML .= "<set name='Tra' value='$tra' color='588526'/>";
	$strXML .= "<set name='Svi' value='$svi' color='B3AA00'/>";
	$strXML .= "<set name='Lip' value='$lip' color='008ED6'/>";
	$strXML .=  "</graph>";
	
	
	echo renderChartHTML("FusionCharts/FCF_Line.swf", "", $strXML, "myNext", 400, 300);
	?>
    </div>
    <br />
    <div align="center">
    <?
	echo "<br>Društveni predmeti: <br>";
	echo "(Hrvatski jezik, Engleski jezik, Njemački jezik)<br>";

	$hrvatski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Hrvatski jezik'";
	if(!$hrvat=mysql_query($hrvatski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($hrvat))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-09-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$hrv= $red["pro"];
	}
$engleski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Engleski jezik'";
	if(!$engl=mysql_query($engleski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($engl))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-09-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$eng= $red["pro"];
	}
$njemacki="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Njemački jezik'";
	if(!$njema=mysql_query($njemacki)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($njema))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-09-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$njem= $red["pro"];
	}
	if($hrv == 0 and $eng == 0 and $njem == 0){$dev = '';}
	elseif ($hrv == 0 and $eng == 0){$dev = $njem;}
	elseif ($hrv == 0 and $njem == 0){$dev = $eng;}
	elseif ($eng == 0 and $njem == 0){$dev = $hrv;}
	elseif ($hrv == 0){$dev = ($eng + $njem)/2;}
	elseif ($eng == 0){$dev = ($hrv + $njem)/2;}
	elseif ($njem == 0){$dev = ($hrv + $eng)/2;}
	else {
		$dev = ($hrv + $eng + $njem)/3;
	}
	
					$hrvatski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Hrvatski jezik'";
	if(!$hrvat=mysql_query($hrvatski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($hrvat))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-10-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$hrv= $red["pro"];
	}
$engleski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Engleski jezik'";
	if(!$engl=mysql_query($engleski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($engl))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-10-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$eng= $red["pro"];
	}
$njemacki="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Njemački jezik'";
	if(!$njema=mysql_query($njemacki)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($njema))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-10-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$njem= $red["pro"];
	}
	if($hrv == 0 and $eng == 0 and $njem == 0){$des = '';}
	elseif ($hrv == 0 and $eng == 0){$des = $njem;}
	elseif ($hrv == 0 and $njem == 0){$des = $eng;}
	elseif ($eng == 0 and $njem == 0){$des = $hrv;}
	elseif ($hrv == 0){$des = ($eng + $njem)/2;}
	elseif ($eng == 0){$des = ($hrv + $njem)/2;}
	elseif ($njem == 0){$des = ($hrv + $eng)/2;}
	else {
		$des = ($hrv + $eng + $njem)/3;
	}
					$hrvatski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Hrvatski jezik'";
	if(!$hrvat=mysql_query($hrvatski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($hrvat))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-11-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$hrv= $red["pro"];
	}
$engleski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Engleski jezik'";
	if(!$engl=mysql_query($engleski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($engl))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-11-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$eng= $red["pro"];
	}
$njemacki="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Njemački jezik'";
	if(!$njema=mysql_query($njemacki)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($njema))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-11-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$njem= $red["pro"];
	}
	if($hrv == 0 and $eng == 0 and $njem == 0){$jed = '';}
	elseif ($hrv == 0 and $eng == 0){$jed = $njem;}
	elseif ($hrv == 0 and $njem == 0){$jed = $eng;}
	elseif ($eng == 0 and $njem == 0){$jed = $hrv;}
	elseif ($hrv == 0){$jed = ($eng + $njem)/2;}
	elseif ($eng == 0){$jed = ($hrv + $njem)/2;}
	elseif ($njem == 0){$jed = ($hrv + $eng)/2;}
	else {
		$jed = ($hrv + $eng + $njem)/3;
	}
					$hrvatski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Hrvatski jezik'";
	if(!$hrvat=mysql_query($hrvatski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($hrvat))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-12-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$hrv= $red["pro"];
	}
$engleski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Engleski jezik'";
	if(!$engl=mysql_query($engleski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($engl))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-12-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$eng= $red["pro"];
	}
$njemacki="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Njemački jezik'";
	if(!$njema=mysql_query($njemacki)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($njema))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-12-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$njem= $red["pro"];
	}
	if($hrv == 0 and $eng == 0 and $njem == 0){$dva = '';}
	elseif ($hrv == 0 and $eng == 0){$dva = $njem;}
	elseif ($hrv == 0 and $njem == 0){$dva = $eng;}
	elseif ($eng == 0 and $njem == 0){$dva = $hrv;}
	elseif ($hrv == 0){$dva = ($eng + $njem)/2;}
	elseif ($eng == 0){$dva = ($hrv + $njem)/2;}
	elseif ($njem == 0){$dva = ($hrv + $eng)/2;}
	else {
		$dva = ($hrv + $eng + $njem)/3;
	}
					$hrvatski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Hrvatski jezik'";
	if(!$hrvat=mysql_query($hrvatski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($hrvat))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-01-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$hrv= $red["pro"];
	}
$engleski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Engleski jezik'";
	if(!$engl=mysql_query($engleski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($engl))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-01-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$eng= $red["pro"];
	}
$njemacki="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Njemački jezik'";
	if(!$njema=mysql_query($njemacki)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($njema))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-01-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$njem= $red["pro"];
	}
	if($hrv == 0 and $eng == 0 and $njem == 0){$prv = '';}
	elseif ($hrv == 0 and $eng == 0){$prv = $njem;}
	elseif ($hrv == 0 and $njem == 0){$prv = $eng;}
	elseif ($eng == 0 and $njem == 0){$prv = $hrv;}
	elseif ($hrv == 0){$prv = ($eng + $njem)/2;}
	elseif ($eng == 0){$prv = ($hrv + $njem)/2;}
	elseif ($njem == 0){$prv = ($hrv + $eng)/2;}
	else {
		$prv = ($hrv + $eng + $njem)/3;
	}
					$hrvatski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Hrvatski jezik'";
	if(!$hrvat=mysql_query($hrvatski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($hrvat))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-02-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$hrv= $red["pro"];
	}
$engleski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Engleski jezik'";
	if(!$engl=mysql_query($engleski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($engl))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-02-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$eng= $red["pro"];
	}
$njemacki="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Njemački jezik'";
	if(!$njema=mysql_query($njemacki)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($njema))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-02-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$njem= $red["pro"];
	}
	if($hrv == 0 and $eng == 0 and $njem == 0){$dru = '';}
	elseif ($hrv == 0 and $eng == 0){$dru = $njem;}
	elseif ($hrv == 0 and $njem == 0){$dru = $eng;}
	elseif ($eng == 0 and $njem == 0){$dru = $hrv;}
	elseif ($hrv == 0){$dru = ($eng + $njem)/2;}
	elseif ($eng == 0){$dru = ($hrv + $njem)/2;}
	elseif ($njem == 0){$dru = ($hrv + $eng)/2;}
	else {
		$dru = ($hrv + $eng + $njem)/3;
	}
					$hrvatski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Hrvatski jezik'";
	if(!$hrvat=mysql_query($hrvatski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($hrvat))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-03-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$hrv= $red["pro"];
	}
$engleski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Engleski jezik'";
	if(!$engl=mysql_query($engleski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($engl))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-03-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$eng= $red["pro"];
	}
$njemacki="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Njemački jezik'";
	if(!$njema=mysql_query($njemacki)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($njema))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-03-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$njem= $red["pro"];
	}
	if($hrv == 0 and $eng == 0 and $njem == 0){$tre = '';}
	elseif ($hrv == 0 and $eng == 0){$tre = $njem;}
	elseif ($hrv == 0 and $njem == 0){$tre = $eng;}
	elseif ($eng == 0 and $njem == 0){$tre = $hrv;}
	elseif ($hrv == 0){$tre = ($eng + $njem)/2;}
	elseif ($eng == 0){$tre = ($hrv + $njem)/2;}
	elseif ($njem == 0){$tre = ($hrv + $eng)/2;}
	else {
		$tre = ($hrv + $eng + $njem)/3;
	}
					$hrvatski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Hrvatski jezik'";
	if(!$hrvat=mysql_query($hrvatski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($hrvat))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-04-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$hrv= $red["pro"];
	}
$engleski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Engleski jezik'";
	if(!$engl=mysql_query($engleski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($engl))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-04-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$eng= $red["pro"];
	}
$njemacki="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Njemački jezik'";
	if(!$njema=mysql_query($njemacki)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($njema))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-04-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$njem= $red["pro"];
	}
	if($hrv == 0 and $eng == 0 and $njem == 0){$cet = '';}
	elseif ($hrv == 0 and $eng == 0){$cet = $njem;}
	elseif ($hrv == 0 and $njem == 0){$cet = $eng;}
	elseif ($eng == 0 and $njem == 0){$cet = $hrv;}
	elseif ($hrv == 0){$cet = ($eng + $njem)/2;}
	elseif ($eng == 0){$cet = ($hrv + $njem)/2;}
	elseif ($njem == 0){$cet = ($hrv + $eng)/2;}
	else {
		$cet = ($hrv + $eng + $njem)/3;
	}
					$hrvatski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Hrvatski jezik'";
	if(!$hrvat=mysql_query($hrvatski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($hrvat))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-05-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$hrv= $red["pro"];
	}
$engleski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Engleski jezik'";
	if(!$engl=mysql_query($engleski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($engl))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-05-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$eng= $red["pro"];
	}
$njemacki="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Njemački jezik'";
	if(!$njema=mysql_query($njemacki)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($njema))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-05-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$njem= $red["pro"];
	}
	if($hrv == 0 and $eng == 0 and $njem == 0){$pet = '';}
	elseif ($hrv == 0 and $eng == 0){$pet = $njem;}
	elseif ($hrv == 0 and $njem == 0){$pet = $eng;}
	elseif ($eng == 0 and $njem == 0){$pet = $hrv;}
	elseif ($hrv == 0){$pet = ($eng + $njem)/2;}
	elseif ($eng == 0){$pet = ($hrv + $njem)/2;}
	elseif ($njem == 0){$pet = ($hrv + $eng)/2;}
	else {
		$pet = ($hrv + $eng + $njem)/3;
	}
					$hrvatski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Hrvatski jezik'";
	if(!$hrvat=mysql_query($hrvatski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($hrvat))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-06-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$hrv= $red["pro"];
	}
$engleski="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Engleski jezik'";
	if(!$engl=mysql_query($engleski)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($engl))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-06-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$eng= $red["pro"];
	}
$njemacki="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Njemački jezik'";
	if(!$njema=mysql_query($njemacki)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($njema))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-06-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$njem= $red["pro"];
	}
	if($hrv == 0 and $eng == 0 and $njem == 0){$ses = '';}
	elseif ($hrv == 0 and $eng == 0){$ses = $njem;}
	elseif ($hrv == 0 and $njem == 0){$ses = $eng;}
	elseif ($eng == 0 and $njem == 0){$ses = $hrv;}
	elseif ($hrv == 0){$ses = ($eng + $njem)/2;}
	elseif ($eng == 0){$ses = ($hrv + $njem)/2;}
	elseif ($njem == 0){$ses = ($hrv + $eng)/2;}
	else {
		$ses = ($hrv + $eng + $njem)/3;
	}
	
	$strXML = "<graph caption='Prosjek ocjena' xAxisName='Mjesec' yAxisName='Ocjena' decimalPrecision='2' formatNumberScale='0' yAxisMaxValue='5'>";
	$strXML .= "<set name='Ruj' value='$dev' color='AFD8F8' />";
	$strXML .= "<set name='Lis' value='$des' color='F6BD0F' />";
	$strXML .= "<set name='Stu' value='$jed' color='8BBA00' />";
	$strXML .= "<set name='Pro' value='$dva' color='FF8E46'/>";
	$strXML .= "<set name='Sje' value='$prv' color='008E8E'/>";
	$strXML .= "<set name='Velj' value='$dru' color='D64646'/>";
	$strXML .= "<set name='Ožu' value='$tre' color='8E468E'/>";
	$strXML .= "<set name='Tra' value='$cet' color='588526'/>";
	$strXML .= "<set name='Svi' value='$pet' color='B3AA00'/>";
	$strXML .= "<set name='Lip' value='$ses' color='008ED6'/>";
	$strXML .=  "</graph>";
	
	
	echo renderChartHTML("FusionCharts/FCF_Line.swf", "", $strXML, "myNext", 400, 300);
	?>
    </div>
    <br />
    <div align="center">
    <?
    echo "<br>Umjetnički predmeti: <br>";
	echo "(Glazbena kultura, Likovna kultura)<br>";
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Glazbena kultura'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-09-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Likovna kultura'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-09-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$ru = '';}
	else
		{
	if ($prirod == 0){$ru = $mat;}
		else
			{
				if($mat == 0){$ru = $prirod;}
				else
					{
	$ru = ($mat + $prirod) / 2;
					}
			}
		}
	
$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Glazbena kultura'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-10-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Likovna kultura'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-10-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$li = '';}
	else
		{
	if ($prirod == 0){$li = $mat;}
		else
			{
				if($mat == 0){$li = $prirod;}
				else
					{
	$li = ($mat + $prirod) / 2;
					}
			}
		}
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Glazbena kultura'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-11-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Likovna kultura'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-11-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$st = '';}
	else
		{
	if ($prirod == 0){$st = $mat;}
		else
			{
				if($mat == 0){$st = $prirod;}
				else
					{
	$st = ($mat + $prirod) / 2;
					}
			}
		}
		
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Glazbena kultura'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-12-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Likovna kultura'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-12-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$pr = '';}
	else
		{
	if ($prirod == 0){$pr = $mat;}
		else
			{
				if($mat == 0){$pr = $prirod;}
				else
					{
	$pr = ($mat + $prirod) / 2;
					}
			}
		}
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Glazbena kultura'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-01-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Likovna kultura'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-01-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$sj = '';}
	else
		{
	if ($prirod == 0){$sj = $mat;}
		else
			{
				if($mat == 0){$sj = $prirod;}
				else
					{
	$sj = ($mat + $prirod) / 2;
					}
			}
		}
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Glazbena kultura'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-02-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Likovna kultura'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-02-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$ve = '';}
	else
		{
	if ($prirod == 0){$ve = $mat;}
		else
			{
				if($mat == 0){$ve = $prirod;}
				else
					{
	$ve = ($mat + $prirod) / 2;
					}
			}
		}
		
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Glazbena kultura'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-03-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Likovna kultura'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-03-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$oz = '';}
	else
		{
	if ($prirod == 0){$oz = $mat;}
		else
			{
				if($mat == 0){$oz = $prirod;}
				else
					{
	$oz = ($mat + $prirod) / 2;
					}
			}
		}
		
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Glazbena kultura'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-04-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Likovna kultura'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-04-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$tr = '';}
	else
		{
	if ($prirod == 0){$tr = $mat;}
		else
			{
				if($mat == 0){$tr = $prirod;}
				else
					{
	$tr = ($mat + $prirod) / 2;
					}
			}
		}
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Glazbena kultura'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-05-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Likovna kultura'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-05-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$sv = '';}
	else
		{
	if ($prirod == 0){$sv = $mat;}
		else
			{
				if($mat == 0){$sv = $prirod;}
				else
					{
	$sv = ($mat + $prirod) / 2;
					}
			}
		}
		
	$priroda="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Glazbena kultura'";
	if(!$pri=mysql_query($priroda)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($pri))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-06-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$prirod= $red["pro"];
	}
		$matematika="select * from predmeti where opu_id = '$_GET[opu_id]' and predmet = 'Likovna kultura'";
	if(!$mate=mysql_query($matematika)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($mate))
	{
$pred= $red["predmet_id"];
	}
	$ocjene="select avg(ocjena) as pro from ocjene where opu_id = '$_GET[opu_id]' and predmet_id = '$pred' and datum like '____-06-__'";
if(!$oc=mysql_query($ocjene)){echo "<br>Došlo je do greške pri izvođenju upita!<br>".mysql_query();}
if($red=mysql_fetch_array($oc))
	{
$mat= $red["pro"];
	}
	if($mat == 0 and $prirod == 0){$lp = '';}
	else
		{
	if ($prirod == 0){$lp = $mat;}
		else
			{
				if($mat == 0){$lp = $prirod;}
				else
					{
	$lp = ($mat + $prirod) / 2;
					}
			}
		}
	$strXML = "<graph caption='Prosjek ocjena' xAxisName='Mjesec' yAxisName='Ocjena' decimalPrecision='2' formatNumberScale='0' yAxisMaxValue='5'>";
	$strXML .= "<set name='Ruj' value='$ru' color='AFD8F8' />";
	$strXML .= "<set name='Lis' value='$li' color='F6BD0F' />";
	$strXML .= "<set name='Stu' value='$st' color='8BBA00' />";
	$strXML .= "<set name='Pro' value='$pr' color='FF8E46'/>";
	$strXML .= "<set name='Sje' value='$sj' color='008E8E'/>";
	$strXML .= "<set name='Velj' value='$ve' color='D64646'/>";
	$strXML .= "<set name='Ožu' value='$oz' color='8E468E'/>";
	$strXML .= "<set name='Tra' value='$tr' color='588526'/>";
	$strXML .= "<set name='Svi' value='$sv' color='B3AA00'/>";
	$strXML .= "<set name='Lip' value='$lp' color='008ED6'/>";
	$strXML .=  "</graph>";
	
	
	echo renderChartHTML("FusionCharts/FCF_Line.swf", "", $strXML, "myNext", 400, 300);
        ?>
    </div>
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
<?php
ob_flush();
?>