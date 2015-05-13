<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Kuhinja</title>
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
	width: 612px;
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
					<a href="kuhinja.php?razred_id=<?=$redak["razred_id"]?>&opu_id=<?=$redak["opu_id"]?>"> <span class="style12">
					<?=$redak["rbr_ucenika"]?>
					. 
					<?=$redak["prezime_ucenika"]?> 
					<?=$redak["ime_ucenika"]?> 
					</span><br />
					</a>
					</td>
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
    <td valign="top" bgcolor="#FFFFFF">  <?
  echo "Kuhinja :<br><br>";
  ?>
 
 <?
$kuhinja= "Select * from kuhinja where opu_id = '$opu'";
if ($k=mysql_query($kuhinja))
	{
	if ($red=mysql_fetch_array($k))
		{
?>
<table width="610" height="100" border="0">
  <tr>
    <td width="200"><div align="center" class="style2">
      <div align="center">Mjesec</div>
    </div></td>
	<td></td>
    <td><div align="center"><span class="style2">9.</span></div></td>
    <td><div align="center" class="style2">
      <div align="center">10.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">11.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">12.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">1.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">2.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">3.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">4.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">5.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">6.</div>
    </div></td>
  </tr>
  <tr>
    <td width="180"><div align="center" class="style2">
      <div align="center">Dali je učenik korisnik kuhinje </div>
    </div></td>
	<td></td>
    <td><div align="center">
      <?=$red["mj09"]?>
    </div></td>
    <td><div align="center">
      <?=$red["mj10"]?>
    </div></td>
    <td><div align="center">
      <?=$red["mj11"]?>
    </div></td>
    <td><div align="center">
      <?=$red["mj12"]?>
    </div></td>
    <td><div align="center">
      <?=$red["mj01"]?>
    </div></td>
    <td><div align="center">
      <?=$red["mj02"]?>
    </div></td>
    <td><div align="center">
      <?=$red["mj03"]?>
    </div></td>
    <td><div align="center">
      <?=$red["mj04"]?>
    </div></td>
    <td><div align="center">
      <?=$red["mj05"]?>
    </div></td>
    <td><div align="center">
      <?=$red["mj06"]?>
    </div></td>
  </tr>
</table>
<?
}
else 
			{
			$kuh= "insert into kuhinja(korisnik_id, razred_id, opu_id) values ('$kid', '$_GET[razred_id]', '$opu')";
				if (mysql_query($kuh))
					{
				echo "<br>";
					}
					else
						{
						echo "<br>Podaci za kuhinju nisu pohranjeni!<br />" .mysql_error();		
						}
			?>
			<table width="610" height="100" border="0">
  <tr>
    <td width="200"><div align="center" class="style2">
      <div align="center">Mjesec</div>
    </div></td>
	<td></td>
    <td><div align="center"><span class="style2">9.</span></div></td>
    <td><div align="center" class="style2">
      <div align="center">10.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">11.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">12.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">1.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">2.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">3.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">4.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">5.</div>
    </div></td>
    <td><div align="center" class="style2">
      <div align="center">6.</div>
    </div></td>
  </tr>
  <tr>
    <td width="180"><div align="center" class="style2">
      <div align="center">Dali je učenik korisnik kuhinje </div>
    </div></td>
	<td></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
</table>
<?
			}
	}
	 
?>
    <a href="kuhinja_upis.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>"><br>
    Upiši hrani li se učenik u školi ovaj mjesec!</a>
  
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