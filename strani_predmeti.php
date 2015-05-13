<?php
ob_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Upis stranih predmeta</title>
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
	<span class="style16">Odaberite predmet:</span>
<br />
<form method="post" action="">
<table width="400" border="0">
  <tr>
    <td><select name="predmet">
		<option>Engleski jezik</option>
		<option>Njemački jezik</option>
		</select>	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td class="style16">Upišite sastavnice:</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right">
	<table width="300" border="0">
  <tr>
    <td><input type="text" name="s1" size="50" value="Razumijevanje - slušanje" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s2" size="50"  value="Razumijevanje - čitanje"/></td>
  </tr>
  <tr>
    <td><input type="text" name="s3" size="50" value="Izražavanje i stvaranje - usmeno" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s4" size="50" value="Izražavanje i stvaranje - pismeno" /></td>
  </tr>
  <tr>
    <td><input type="text" name="s5" size="50" /></td>
  </tr>
</table>

	</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="style16">Označite učenike za odabrani predmet:</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
	<table width="400" border="0">
	<?
	  $ucenik="Select * from osobni_podaci_ucenika where razred_id = '$rid' and korisnik_id = '$kid' order by rbr_ucenika asc";
	  if(!$uco=mysql_query($ucenik)) {echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query(); }
	  while ($redak=mysql_fetch_array($uco))
	  {
	  $rb_uco= $redak["rbr_ucenika"];
	  $pr = $redak["prezime_ucenika"];
	  $im = $redak["ime_ucenika"];
	  $ucen= "$rb_uco. $pr $im";
	  $opu= $redak["opu_id"];
	  ?>
  <tr>
    <td width="40"><input type="checkbox" name="ucenik[]" value="<?=$opu?>" /></td>
    <td width="344"> <? echo $ucen;?></td>
  </tr>
  <?
	 }
	  ?>
</table>

	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><input type="submit" name="SBunos" value="Pohrani podatke" /></div></td>
  </tr>
</table>
</form>

<?
	}
	else
		{
		if(is_array($_POST["ucenik"]))
			{
			foreach($_POST["ucenik"] as $ucenik)
				{
		$provjera="select * from predmeti where opu_id = '$ucenik' and rb = '4'";
		if(!$prov=mysql_query($provjera)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
		if(mysql_num_rows($prov) < 1)
			{
		$izborni="insert into predmeti(predmet, korisnik_id, razred_id, opu_id, rb) values('$_POST[predmet]', '$kid', '$rid', '$ucenik', '4')";
		if(!$izbo=mysql_query($izborni)){echo "<br>Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
				
			$predmet="select * from predmeti where predmet = '$_POST[predmet]' and opu_id = '$ucenik'";
	if(!$predm=mysql_query($predmet)){echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
	 				if ($redak=mysql_fetch_array($predm))
						{
					$pred= $redak["predmet_id"];

				if ($_POST["s1"] != '')
					{
					$sast= $_POST["s1"];
					
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, opu_id, sastavnica) values ('$pred', '$kid', '$rid', '$ucenik', '$sast')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
					if ($_POST["s2"] != '')
					{
					$sast= $_POST["s2"];
					
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, opu_id, sastavnica) values ('$pred', '$kid', '$rid', '$ucenik', '$sast')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
					if ($_POST["s3"] != '')
					{
					$sast= $_POST["s3"];
					
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, opu_id, sastavnica) values ('$pred', '$kid', '$rid', '$ucenik', '$sast')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
					if ($_POST["s4"] != '')
					{
					$sast= $_POST["s4"];
					
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, opu_id, sastavnica) values ('$pred', '$kid', '$rid', '$ucenik', '$sast')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
					if ($_POST["s5"] != '')
					{
					$sast= $_POST["s5"];
					
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, opu_id, sastavnica) values ('$pred', '$kid', '$rid', '$ucenik', '$sast')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
					if ($_POST["s6"] != '')
					{
					$sast= $_POST["s6"];
					
					$unos="insert into sastavnice(predmet_id, korisnik_id, razred_id, opu_id, sastavnica) values ('$pred', '$kid', '$rid', '$ucenik', '$sast')";
					if(!$un=mysql_query($unos))
	{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
					}
						}
			
			}
			else
				{
				 $ucenik="Select * from osobni_podaci_ucenika where opu_id = '$ucenik'";
	  if(!$uco=mysql_query($ucenik)) {echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query(); }
		if($redak=mysql_fetch_array($uco))
	  {
	  $pr = $redak["prezime_ucenika"];
	  $im = $redak["ime_ucenika"];
				echo "<br>Strani jezik za učenika $pr $im je već upisan, drugi strani jezik se upisuje kao izborni predmet!<br>";
		}else{header("Location: razred.php?razred_id=$_GET[razred_id]");
}
				}
				}
				
				?>
		<br><a href="razred.php?razred_id=<?=$_GET["razred_id"]?>"><br />Povratak!</a>
		<?
			}
			else 
				{
				echo "<br>Odaberite učenike!<br>";
		?>
		<br><a href="strani_predmeti.php?razred_id=<?=$_GET["razred_id"]?>"><br />Ponovi unos!</a>
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