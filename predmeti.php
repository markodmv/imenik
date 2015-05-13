<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Unos osnovnih predmeta</title>
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
	left: 98px;
	top: -7px;
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
	height:660px;
	z-index:1;
	left: 3px;
	top: 28px;
	width: 639px;
}
#Layer10 {
	position:absolute;
	width:196px;
	height:59px;
	z-index:5;
	left: -233px;
	top: 212px;
}
.style16 {font-size: 14px}
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
$d= date("d").".".date("m").".".date("Y");
echo $d;
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
    <li><a href="korisnik.php">Korisnik</a></li>
    <li><a href=logout.php>Odjava</a></li> 
	</ul>                                     
  </ul>
  <hr width="180" />
  <ul>
  <ul>
  <li><a href="razred.php?razred_id=<?=$_GET["razred_id"]?>">Povratak</a></li>
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
    <td valign="top" bgcolor="#FFFFFF">
	  <?
  if (!$_POST["SBunos"])
	{
	?>
	<span class="style16">Odaberite osnovne predmete koji su zajednički cijelom razredu te upišite sastavnice:</span>
<br />					
<br />
<br />
	<form method="post" action="" > 
	<table width="530" border="0">
  <tr>
    <td width="20"><input name="pred[]" type="checkbox" value="HRV" checked="checked"/></td>
    <td width="500">Hrvatski jezik</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">
	<table width="310" border="0">
	
  <tr>
    <td><input type="text" name="s1HRV" value="Hrvatski jezik" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s2HRV" value="Književnost" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s3HRV" value="Lektira" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s4HRV" value="Jezično izražavanje i stvaranje - usmeno" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s5HRV" value="Jezično izražavanje i stvaranje - pismeno" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s6HRV" value="Medijska kultura" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s7HRV" value="Domaći uradak" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s8HRV" size="70" /></td>
  </tr>
   <tr>
    <td><input type="text" name="s9HRV" size="70" /></td>
  </tr>
</table>
</td>
</tr>
  <tr>
    <td width="20"><input name="pred[]" type="checkbox" value="LK" checked="checked"/></td>
    <td width="500">Likovna kultura </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">
	<table width="310" border="0">
  <tr>
    <td><input type="text" name="s1LK" value="Risanje" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s2LK" value="Slikanje" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s3LK" value="Oblikovanje" size="70" /> </td>
  </tr>
  <tr>
    <td> <input type="text" name="s4LK" size="70" /> </td>
  </tr>
  <tr>
    <td> <input type="text" name="s5LK" size="70" /> </td>
  </tr>
</table>
</td>
</tr>
  <tr>
    <td width="20"><input name="pred[]" type="checkbox" value="GK" checked="checked"/></td>
    <td width="500">Glazbena kultura </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">
	<table width="310" border="0">
  <tr>
    <td><input type="text" name="s1GK" value="Pjevanje" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s2GK" value="Sviranje" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s3GK" value="Slušanje" size="70" /> </td>
  </tr>
  <tr>
    <td> <input type="text" name="s4GK" size="70" /> </td>
  </tr>
  <tr>
    <td> <input type="text" name="s5GK" size="70" /> </td>
  </tr>
</table>
</td>
</tr>
  <tr>
    <td width="20"><input name="pred[]" type="checkbox" value="MAT" checked="checked"/></td>
    <td width="500">Matematika</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">
	<table width="310" border="0">
  <tr>
    <td><input type="text" name="s1MAT" value="Usvojenost, razumijevanje i primjena programskih sadržaja - usmeno" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s2MAT" value="Usvojenost, razumijevanje i primjena programskih sadržaja - pismeno" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s3MAT" value="Domaći uradak" size="70" /> </td>
  </tr>
  <tr>
    <td><input type="text" name="s4MAT" size="70" /></td>
  </tr>
  <tr>
    <td> <input type="text" name="s5MAT" size="70" /> </td>
  </tr>
</table>
</td>
</tr>
  <tr>
    <td width="20"><input name="pred[]" type="checkbox" value="PID" checked="checked"/></td>
    <td width="500">Priroda i društvo </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">
	<table width="310" border="0">
  <tr>
    <td><input type="text" name="s1PID" value="Usvojenost, razumijevanje i primjena programskih sadržaja - usmeno" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s2PID" value="Usvojenost, razumijevanje i primjena programskih sadržaja - pismeno" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s3PID" value="Praktični rad" size="70" /> </td>
  </tr>
  <tr>
    <td> <input type="text" name="s4PID" size="70" /> </td>
  </tr>
  <tr>
    <td> <input type="text" name="s5PID" size="70" /> </td>
  </tr>
</table>
</td>
</tr>
  <tr>
    <td width="20"><input name="pred[]" type="checkbox" value="TZK" checked="checked"/></td>
    <td width="500">Tjelesna zdravstvena kultura </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">
	<table width="310" border="0">
	  <tr>
    <td><input type="text" name="s1TZK" value="Motorička znanja" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s2TZK" value="Motorička dostignuća" size="70" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s3TZK" value="Funkcionalne sposobnosti" size="70" /> </td>
  </tr>
  <tr>
    <td> <input type="text" name="s4TZK"  size="70" /> </td>
  </tr>
</table>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="SBunos" value="Potvrdi unos" /></td>
  </tr>
</table>

	</form>
	<?
	}
	else
	{	

		$ucenik="select * from osobni_podaci_ucenika where razred_id = '$rid' order by rbr_ucenika asc";
				if(!$ucen=mysql_query($ucenik)){echo "<br>Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
				while($red=mysql_fetch_array($ucen))
					{
					$opu= $red["opu_id"];
					$provjera="select * from predmeti where predmet = 'Hrvatski jezik' and opu_id = '$opu'";
		if(!$prov=mysql_query($provjera)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
		if(mysql_num_rows($prov) < 1)
			{
				$predmet="insert into predmeti(predmet, korisnik_id, razred_id, opu_id, rb) values ('Hrvatski jezik', '$kid', '$rid', '$opu', '1')";
					if(!$pred=mysql_query($predmet)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
			}
					}
		$ucenik="select * from osobni_podaci_ucenika where razred_id = '$rid' order by rbr_ucenika asc";
				if(!$ucen=mysql_query($ucenik)){echo "<br>Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
				while($red=mysql_fetch_array($ucen))
					{
					$opu= $red["opu_id"];
					$provjera="select * from predmeti where predmet = 'Likovna kultura' and opu_id = '$opu'";
		if(!$prov=mysql_query($provjera)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
		if(mysql_num_rows($prov) < 1)
			{
				$predmet="insert into predmeti(predmet, korisnik_id, razred_id, opu_id, rb) values ('Likovna kultura', '$kid', '$rid', '$opu', '2')";
					if(!$pred=mysql_query($predmet)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
			}
					}
		$ucenik="select * from osobni_podaci_ucenika where razred_id = '$rid' order by rbr_ucenika asc";
				if(!$ucen=mysql_query($ucenik)){echo "<br>Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
				while($red=mysql_fetch_array($ucen))
					{
					$opu= $red["opu_id"];
					$provjera="select * from predmeti where predmet = 'Glazbena kultura' and opu_id = '$opu'";
		if(!$prov=mysql_query($provjera)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
		if(mysql_num_rows($prov) < 1)
			{
				$predmet="insert into predmeti(predmet, korisnik_id, razred_id, opu_id, rb) values ('Glazbena kultura', '$kid', '$rid', '$opu', '3')";
					if(!$pred=mysql_query($predmet)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
			}
					}
		$ucenik="select * from osobni_podaci_ucenika where razred_id = '$rid' order by rbr_ucenika asc";
				if(!$ucen=mysql_query($ucenik)){echo "<br>Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
				while($red=mysql_fetch_array($ucen))
					{
					$opu= $red["opu_id"];
					$provjera="select * from predmeti where predmet = 'Matematika' and opu_id = '$opu'";
		if(!$prov=mysql_query($provjera)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
		if(mysql_num_rows($prov) < 1)
			{
				$predmet="insert into predmeti(predmet, korisnik_id, razred_id, opu_id, rb) values ('Matematika', '$kid', '$rid', '$opu', '5')";
					if(!$pred=mysql_query($predmet)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
			}
					}
		$ucenik="select * from osobni_podaci_ucenika where razred_id = '$rid' order by rbr_ucenika asc";
				if(!$ucen=mysql_query($ucenik)){echo "<br>Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
				while($red=mysql_fetch_array($ucen))
					{
					$opu= $red["opu_id"];
					$provjera="select * from predmeti where predmet = 'Priroda i društvo' and opu_id = '$opu'";
		if(!$prov=mysql_query($provjera)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
		if(mysql_num_rows($prov) < 1)
			{
				$predmet="insert into predmeti(predmet, korisnik_id, razred_id, opu_id, rb) values ('Priroda i društvo', '$kid', '$rid', '$opu', '6')";
					if(!$pred=mysql_query($predmet)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
			}
					}
		$ucenik="select * from osobni_podaci_ucenika where razred_id = '$rid' order by rbr_ucenika asc";
				if(!$ucen=mysql_query($ucenik)){echo "<br>Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
				while($red=mysql_fetch_array($ucen))
					{
					$opu= $red["opu_id"];
					$provjera="select * from predmeti where predmet = 'Tjelesna zdravstvena kultura' and opu_id = '$opu'";
		if(!$prov=mysql_query($provjera)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
		if(mysql_num_rows($prov) < 1)
			{
				$predmet="insert into predmeti(predmet, korisnik_id, razred_id, opu_id, rb) values ('Tjelesna zdravstvena kultura', '$kid', '$rid', '$opu', '7')";
					if(!$pred=mysql_query($predmet)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
			}
					}
	
		if (is_array($_POST["pred"]) and count($_POST["pred"]) == 6)
			{
			foreach($_POST["pred"] as $pre)
				{
				$ucenik="select * from osobni_podaci_ucenika where razred_id = '$rid' order by rbr_ucenika asc";
				if(!$ucen=mysql_query($ucenik)){echo "<br>Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
				while($red=mysql_fetch_array($ucen))
					{
					$opu= $red["opu_id"];
					if($pre == 'HRV')
					{$p = "Hrvatski jezik";}
					if($pre == 'LK')
					{$p = "Likovna kultura";}
					if($pre == 'GK')
					{$p = "Glazbena kultura";}
					if($pre == 'MAT')
					{$p = "Matematika";}
					if($pre == 'PID')
					{$p = "Priroda i društvo";}
					if($pre == 'TZK')
					{$p = "Tjelesna zdravstvena kultura";}
				$predmet="select * from predmeti where predmet = '$p' and opu_id ='$opu'";
	if(!$predm=mysql_query($predmet))
	{echo "<br>Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
	 if ($redak=mysql_fetch_array($predm))
	  {
	  $pr= $redak["predmet_id"];
	  $provjera="select * from sastavnice where predmet_id = '$pr' and opu_id = '$opu'";
		if(!$prov=mysql_query($provjera)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
		if(mysql_num_rows($prov) < 1)
			{	
				if ($_POST["s1".$pre] != '')
					{
					$sast= $_POST["s1".$pre];
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, sastavnica, opu_id) values ('$pr', '$kid', '$rid', '$sast', '$opu')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
					if ($_POST["s2".$pre] != '')
					{
					$sast= $_POST["s2".$pre];
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, sastavnica, opu_id) values ('$pr', '$kid', '$rid', '$sast', '$opu')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
					if ($_POST["s3".$pre] != '')
					{
					$sast= $_POST["s3".$pre];
					
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, sastavnica, opu_id) values ('$pr', '$kid', '$rid', '$sast', '$opu')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
					if ($_POST["s4".$pre] != '')
					{
					$sast= $_POST["s4".$pre];
				
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, sastavnica, opu_id) values ('$pr', '$kid', '$rid', '$sast', '$opu')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
					if ($_POST["s5".$pre] != '')
					{
					$sast= $_POST["s5".$pre];
			
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, sastavnica, opu_id) values ('$pr', '$kid', '$rid', '$sast', '$opu')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
					if ($_POST["s6".$pre] != '')
					{
					$sast= $_POST["s6".$pre];
					
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, sastavnica, opu_id) values ('$pr', '$kid', '$rid', '$sast', '$opu')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
					if ($_POST["s7".$pre] != '')
					{
					$sast= $_POST["s7".$pre];
					
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, sastavnica, opu_id) values ('$pr', '$kid', '$rid', '$sast', '$opu')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
					if ($_POST["s8".$pre] != '')
					{
					$sast= $_POST["s8".$pre];
					
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, sastavnica, opu_id) values ('$pr', '$kid', '$rid', '$sast', '$opu')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
					if ($_POST["s9".$pre] != '')
					{
					$sast= $_POST["s9".$pre];
					
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, sastavnica, opu_id) values ('$pr', '$kid', '$rid', '$sast', '$opu')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
			
		}
					}
		}
				}
				header("Location: razred.php?razred_id=$_GET[razred_id]");
			}	
			else
			{
			echo "<br>Svih šest osnovnih predmeta moraju biti označeni!<br>";
		?>
		<br><a href="predmeti.php?razred_id=<?=$_GET["razred_id"]?>"><br />Ponovi unos!</a>
		<?
			}
		}
		
		?>
		<br />
		<br />
		<br />
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