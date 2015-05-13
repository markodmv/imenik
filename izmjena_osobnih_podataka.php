<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Izmjena osobnih podataka učenika</title>
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
	z-index:1;
	left: 50px;
	top: 30px;
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
      <th width="422" align="left" class="style11" scope="col">
	  <?
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
	 ?>	  </th>
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
     <li><a href="ucenik.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Povratak</a></li>
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
    <td valign="top" bgcolor="#FFFFFF">
	<?
  echo "Osobni podaci :<br>";
  ?>
  
   <?
if (!$_POST["SBuredi"])
	{
	$err=false;
	if (!$_GET["opu_id"])
		{
		echo "<br>Nepotpuni ulazni podaci!";
		?>
</span><a href="ucenik.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Povratak</a><?
		$err=true;
		} else 
			{
			$sql="select * from osobni_podaci_ucenika where opu_id= '$_GET[opu_id]'";
			if (!$q=mysql_query($sql))
				{
				echo "<br>Nastala je greška pri izvođenju upita!<br>" . mysql_query();
				?><a href="ucenik.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Povratak</a><?
				$err=true;
				} elseif (mysql_num_rows($q)==0)
					{
					echo "<br>Nema takvih podataka!";
					?><a href="ucenik.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Povratak</a><?
					$err=true;
					} else
						{
						$novi_podatak=mysql_fetch_array($q);
						}
			}
			if (!$err)
				{
				?>
  <form method="post" action="" > 
  <table width="600" border="0" cellspacing="1" cellpadding="1">
    <tr>
	<td width="315">Podaci o učeniku 
	  <hr align="left" width="200" /></td><td width="278"></td>
	</tr>
	<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
    <tr>
      <td>Redni broj učenika :</td>
      <td><?=$novi_podatak["rbr_ucenika"]?></td>
    </tr>
	<tr>
	<td>Red. br. mat. knj. :</td>
	<td><input type="text" name="red_br_mat_knj" value="<?=$novi_podatak["red_br_mat_knj"]?>" /></td>
	</tr>
    <tr>
      <td>Ime učenika :</td>
      <td><input type="text" name="ime_ucenika" value="<?=$novi_podatak["ime_ucenika"]?>"></td>
    </tr>
    <tr>
      <td>Prezime učenika :</td>
      <td><input type="text" name="prezime_ucenika" value="<?=$novi_podatak["prezime_ucenika"]?>"></td>
    </tr>
     <tr>
      <td>Spol učenika :</td>
      <td><select name="spol_ucenika">
      <option <? if($novi_podatak["spol_ucenika"] == 'Ž') {?> selected="selected" <? } ?>>Ž</option>
      <option <? if($novi_podatak["spol_ucenika"] == 'M') {?> selected="selected" <? } ?>>M</option>
      </select></td>
    </tr>
	<tr>
	<td>Učenik polazi razred </td>
	<td><select name="polazi_razred">
			<option <?
			if ($novi_podatak["polazi_razred"] == 'prvi') {?> selected="selected" <? } ?>> prvi </option>
			<option <?
			if ($novi_podatak["polazi_razred"] == 'drugi') {?> selected="selected" <? } ?>> drugi </option>
			<option <?
			if ($novi_podatak["polazi_razred"] == 'treći') {?> selected="selected" <? } ?>> treći </option>
			<option <?
			if ($novi_podatak["polazi_razred"] == 'četvrti') {?> selected="selected" <? } ?>> četvrti </option>
			<option <?
			if ($novi_podatak["polazi_razred"] == 'peti') {?> selected="selected" <? } ?>> peti </option>
	
	</select>
	 put.</td>
	</tr>
    <tr>
      <td>OIB učenika :</td>
      <td><input type="text" name="oib_ucenika" value="<?=$novi_podatak["oib_ucenika"]?>"></td>
    </tr>
    <tr>
      <td>Nadnevak rođenja učenika <br />(g-m-d) :</td>
      <td><input type="text" name="datum_rodjenja_ucenika" value="<?=$novi_podatak["datum_rodjenja_ucenika"]?>"></td>
    </tr>
    <tr>
      <td>Mjesto rođenja učenika :</td>
      <td><input type="text" name="mjesto_rodjenja_ucenika" value="<?=$novi_podatak["mjesto_rodjenja_ucenika"]?>"></td>
    </tr>
    <tr>
      <td>Država rođenja učenika :</td>
      <td><input type="text" name="drzava_rodjenja_ucenika" value="<?=$novi_podatak["drzava_rodjenja_ucenika"]?>"></td>
    </tr>
	<tr>
	<td>Državljanstvo :</td>
	<td><input type="text" name="drzavljanstvo_ucenika" value="<?=$novi_podatak["drzavljanstvo_ucenika"]?>" /></td>
	</tr>
	<tr>
	<td>Narodnost :</td>
	<td><input type="text" name="narodnost_ucenika" value="<?=$novi_podatak["narodnost_ucenika"]?>" /></td>
	</tr>
	<tr>
      <td>Ime majke :</td>
      <td><input type="text" name="ime_majke_ucenika" value="<?=$novi_podatak["ime_majke_ucenika"]?>"></td>
    </tr>
    <tr>
      <td>Prezime majke :</td>
      <td><input type="text" name="prezime_majke_ucenika" value="<?=$novi_podatak["prezime_majke_ucenika"]?>"></td>
    </tr>
    <tr>
      <td>Zanimanje majke :</td>
      <td><input type="text" name="zanimanje_majke_ucenika" value="<?=$novi_podatak["zanimanje_majke_ucenika"]?>"></td>
    </tr>
    <tr>
      <td>Ime oca :</td>
      <td><input type="text" name="ime_oca_ucenika" value="<?=$novi_podatak["ime_oca_ucenika"]?>"></td>
    </tr>
    <tr>
      <td>Prezime oca :</td>
      <td><input type="text" name="prezime_oca_ucenika" value="<?=$novi_podatak["prezime_oca_ucenika"]?>"></td>
    </tr>
    <tr>
      <td>Zanimanje oca :</td>
      <td><input type="text" name="zanimanje_oca_ucenika" value="<?=$novi_podatak["zanimanje_oca_ucenika"]?>"></td>
    </tr>
	<tr>
	<td>Učenik stanuje s :</td>
	<td><input type="text" name="stanuje_s" value="<?=$novi_podatak["stanuje_s"]?>" />
	</td>
	</tr>
    <tr>
      <td>Ulica i broj :</td>
      <td><input type="text" name="ulica_i_broj_ucenika" value="<?=$novi_podatak["ulica_i_broj_ucenika"]?>"></td>
    </tr>
	<tr>
	<td>Poštanski broj :</td>
	<td><input type="text" name="postanski_broj_ucenika" value="<?=$novi_podatak["postanski_broj_ucenika"]?>" /></td>
	</tr>
	<tr>
	<td>Mjesto :</td>
	<td><input type="text" name="mjesto_ucenika" value="<?=$novi_podatak["mjesto_ucenika"]?>" /></td>
	</tr>
	 <tr>
      <td>Broj telefona :</td>
      <td><input type="text" name="telefon_ucenika" value="<?=$novi_podatak["telefon_ucenika"]?>"></td>
    </tr>
    <tr>
      <td>Broj mobitela :</td>
      <td><input type="text" name="mobitel_ucenika" value="<?=$novi_podatak["mobitel_ucenika"]?>"></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="right">
        <input type="submit" name="SBuredi" value="Pohrani">
      </div></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  </form>
 
  <?
  }
} else {
			
			$sql = "update osobni_podaci_ucenika set ime_ucenika = '". $_POST["ime_ucenika"] ."', prezime_ucenika = '". $_POST["prezime_ucenika"] ."', spol_ucenika = '". $_POST["spol_ucenika"] ."', oib_ucenika = '". $_POST["oib_ucenika"] ."', datum_rodjenja_ucenika = '". $_POST["datum_rodjenja_ucenika"] ."', mjesto_rodjenja_ucenika = '". $_POST["mjesto_rodjenja_ucenika"] ."', drzava_rodjenja_ucenika = '". $_POST["drzava_rodjenja_ucenika"] ."', telefon_ucenika = '". $_POST["telefon_ucenika"] ."', mobitel_ucenika = '". $_POST["mobitel_ucenika"] ."', ulica_i_broj_ucenika = '". $_POST["ulica_i_broj_ucenika"] ."', postanski_broj_ucenika = '". $_POST["postanski_broj_ucenika"] ."', mjesto_ucenika = '". $_POST["mjesto_ucenika"] ."', drzavljanstvo_ucenika = '". $_POST["drzavljanstvo_ucenika"] ."', narodnost_ucenika = '". $_POST["narodnost_ucenika"] ."', ime_majke_ucenika = '". $_POST["ime_majke_ucenika"] ."', prezime_majke_ucenika = '". $_POST["prezime_majke_ucenika"] ."', zanimanje_majke_ucenika = '". $_POST["zanimanje_majke_ucenika"] ."', ime_oca_ucenika = '". $_POST["ime_oca_ucenika"] ."', prezime_oca_ucenika = '". $_POST["prezime_oca_ucenika"] ."', zanimanje_oca_ucenika = '". $_POST["zanimanje_oca_ucenika"] ."', red_br_mat_knj = '". $_POST["red_br_mat_knj"] ."', polazi_razred = '". $_POST["polazi_razred"] ."', stanuje_s = '". $_POST["stanuje_s"] ."' where opu_id = '". $_GET["opu_id"] ."'"; 
			if (mysql_query($sql))
			{
			if (mysql_affected_rows()>0)
				{
				header("Location: ucenik.php?razred_id=$_GET[razred_id]&opu_id=$_GET[opu_id]");
				} else {echo "<br>Podaci nisu izmjenjeni!<br>";
					?><a href="ucenik.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>"><br />Povratak</a>
					<?
					}				
			} else 
				{
				echo "<br>Nastala je greška pri izmjeni podataka.<br>" . mysql_error();
				?><a href="ucenik.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>"><br />Povratak</a><?
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

</td>
  </tr>
</table>
</div>
<?
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