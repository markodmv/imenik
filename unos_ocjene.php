<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Unos ocjene</title>
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
	height:600px;
	z-index:1;
	left: 50px;
	top: 30px;
	width: 550px;
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
O� 
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
mentor: Goran Martinovi�, ELEKTROTEHNI�KI FAKULTET OSIJEK</div>
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
echo "Nevalja ne�to sa ridom!";
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
	  if(!$sq=mysql_query($sql)) {echo "Nastala je gre�ka pri izvo�enju upita!<br />" . mysql_query(); }
	else
	{
	if ($s=mysql_fetch_array($sq))
	{
	$p = $s["prezime_ucenika"];
	$i = $s["ime_ucenika"];
	echo "U�enik : $p $i";
	}
	}
	 ?></th>
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
  <ul>
  <ul>
    <li><a href="ucenik.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Osobni podaci</a></li>
	<li><a href="imenik.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Imenik</a></li>
	<li><a href="biljeske.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Bilje�ke</a></li>
	<li><a href="vladanje.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Vladanje</a></li>
	<li><a href="pedagoske_mjere.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Pedago�ke mjere</a></li>
	<li><a href="kuhinja.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Kuhinja</a></li>
	<li><a href="izostanci.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Izostanci</a></li>
	<li><a href="statistika.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Statistika</a></li>
	</ul>
  </ul>
  <hr width="180">
	<ul>
  <ul>
    <li><a href="imenik.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">
    Povratak</a></li> 
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
  if (!$_POST["SBunos"])
	{
	?>
	<br />
	Odaberite sastavnicu:
	<form method="post" action="">
	<select name="sastavnica">
	<?
	 $sastavnice="select * from sastavnice where opu_id = '$opu' and predmet_id = '$_GET[predmet_id]' order by sastavnice_id asc";
  if(!$sast=mysql_query($sastavnice)){echo"<br>Nastala je gre�ka pri izvo�enju upita!<br>".mysql_query();}
  while ($redak=mysql_fetch_array($sast))
  {
  ?>
  <option><?=$redak["sastavnica"]?></option>
  <?
  }
  ?>
	</select>
	<br />
	<br />
Odaberite ocjenu:
<br />
<br />

<select name="ocjena">
<option>5</option>
<option>4</option>
<option>3</option>
<option>2</option>
<option>1</option>
</select>
<br />
<br />
Odaberite datum:
<br />
<br />
<select  name="dan">
	  <?
	  for ($i=1; $i<32; $i++)
	  {
	  ?>
	  		<option><?=$i?></option>
			<?
			}
			?>
	  </select>
	  	  <select  name="mj">
		   <?
		   $gr=date("m");
		   if($gr < 8)
		   {
	  for ($i=1; $i<8; $i++)
	  {
	  ?>
	  		<option><?=$i?></option>
			<?
			}
			}
			else
				{
				for ($i=8; $i<13; $i++)
	  {
	  ?>
	  		<option><?=$i?></option>
			<?
			}
				}
			?>
		  </select>
		  <select  name="godina">
		   <option>
		   <?
		   echo date("Y");
		   ?>
		   </option>
		  </select>	
		  <br />
<br />
Unesite opisno pra�enje:<br />
<br />
<input type="text" name="podatak" size="60" />
<br />
<br />
<input type="submit" name="SBunos" value="Pohrani" />
	</form>
<?
}
else
	{
	 $sastavnice="select * from sastavnice where opu_id = '$opu' and predmet_id = '$_GET[predmet_id]' and sastavnica = '$_POST[sastavnica]' order by sastavnice_id asc";
  if(!$sast=mysql_query($sastavnice)){echo"<br>Nastala je gre�ka pri izvo�enju upita!<br>".mysql_query();}
	if ($red=mysql_fetch_array($sast))
	{
	$s= $red["sastavnice_id"];
	$dat=$_POST["godina"] ."-". $_POST["mj"] ."-". $_POST["dan"];
	$oprac="insert into ocjene(ocjena, korisnik_id, razred_id, opu_id, predmet_id, datum, sastavnice_id) values('$_POST[ocjena]', '$kid', '$rid', '$opu', '$_GET[predmet_id]', '$dat', '$s')";
	if(!$op=mysql_query($oprac)){echo "<br>Nastala je gre�ka pri izvo�enju upita!<br>".mysql_query();}
	else
				{
				$ocjena="select * from ocjene where opu_id = '$opu' and ocjena = '$_POST[ocjena]' and datum = '$dat' and sastavnice_id = '$s'";
				if(!$oc=mysql_query($ocjena)){echo "<br>Nastala je gre�ka pri izvo�enju upita!<br>".mysql_query();}
				if($red=mysql_fetch_array($oc))
						{
						if($_POST["podatak"] == '')
							{header("Location: imenik.php?razred_id=$_GET[razred_id]&opu_id=$_GET[opu_id]"); }
							else
							{
						$oc= $red["ocjena_id"];
						$datum= date("Y")."-".date("m")."-".date("d");
	$oprac="insert into opisno_pracenje(podatak, korisnik_id, razred_id, opu_id, predmet_id, datum, ocjena_id) values('$_POST[podatak]', '$kid', '$rid', '$opu', '$_GET[predmet_id]', '$datum', '$oc')";
	if(!$op=mysql_query($oprac)){echo "<br>Nastala je gre�ka pri izvo�enju upita!<br>".mysql_query();}
	else
	{ header("Location: imenik.php?razred_id=$_GET[razred_id]&opu_id=$_GET[opu_id]"); }	
							}
						}
				}	
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
</div>
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