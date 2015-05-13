<?php
ob_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Upis izostanaka</title>
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
.style13 {font-size: 12px; color: #000000;}
#Layer10 {
	position:absolute;
	width:196px;
	height:59px;
	z-index:5;
	left: -233px;
	top: 212px;
}
.style15 {
	font-size: 12px;
	color: #000000;
	font-weight: bold;
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
  echo "Upis izostanaka :<br><br>";
  ?>  
  <p>Datum : <? echo $d; ?> 
  <br>  
  <p class="style13">
  <?
  if (!$_POST["SBunos"])
	{
		?>
 <form method="post" action="" > 
  <table width="556px" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
    <tr>
      <td width="400px" height="35" bgcolor="#BEB4FC"><div align="center" class="style13">
        <div align="center">učenik/ca</div>
      </div></td>
      <td width="156px" bgcolor="#BEB4FC"><div align="center" class="style13">
        <div align="center">koji sat </div>
		<table width="156" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999">
		<tr>		</tr>
		<tr>
          <td> <div align="center">1.</div></td>
          <td><div align="center">2.</div></td>
          <td><div align="center">3.</div></td>
          <td><div align="center">4.</div></td>
          <td><div align="center">5.</div></td>
          <td><div align="center">6.</div></td>
          <td><div align="center">7.</div></td>
        </tr></table>
      </div></td>
    </tr>
	<?
	  $ucenik="Select * from osobni_podaci_ucenika where razred_id = '$rid' and korisnik_id = '$kid' order by rbr_ucenika asc";
	  if(!$uco=mysql_query($ucenik)) {echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query(); }
	  while ($redak=mysql_fetch_array($uco))
	  {
	  $rb_uco= $redak["rbr_ucenika"];
	  $pr = $redak["prezime_ucenika"];
	  $im = $redak["ime_ucenika"];
	  $ucenici= "$pr $im";
	  $ucen= "$rb_uco. $pr $im";
	  $opu= $redak["opu_id"];
	  ?>
    <tr>
      <td>
        <div align="left">
          <input type="checkbox" name="uceni[]" value="<?=$opu?>"/>
          <? echo $ucen;?><hr size="3" color="#999999"/></div></td>
		  <td><div align="center">
	  <table border="1" cellpadding="0" cellspacing="0" bordercolor="#999999">
        <tr>
          <td><input type="checkbox" name="s1<?=$opu?>" value="1" /></td>
          <td><input type="checkbox" name="s2<?=$opu?>" value="2" /></td>
          <td><input type="checkbox" name="s3<?=$opu?>" value="3" /></td>
          <td><input type="checkbox" name="s4<?=$opu?>" value="4" /></td>
          <td><input type="checkbox" name="s5<?=$opu?>" value="5" /></td>
          <td><input type="checkbox" name="s6<?=$opu?>" value="6" /></td>
          <td><input type="checkbox" name="s7<?=$opu?>" value="7" /></td>
        </tr>
      </table>
	  </div>
	 
	  </td>
    </tr> 
	<?
	 }
	  ?>
	  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="SBunos" value="  Pohrani	" /></td>
  </tr>
  </table>
 </form>
  
  
  
  <?
  }	else
  	{
	if (is_array($_POST["uceni"]))
{	
		echo "<br><br><br>Na nastavi nisu prisutni sljedeći učenici:<br><br>";
		foreach($_POST["uceni"] as $uc)
		{
		$ucenik="Select * from osobni_podaci_ucenika where razred_id = '$rid' and korisnik_id = '$kid' order by rbr_ucenika asc";
	  if(!$uco=mysql_query($ucenik)) {echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query(); }
	  while ($redak=mysql_fetch_array($uco))
	  {
	  $pr = $redak["prezime_ucenika"];
	  $im = $redak["ime_ucenika"];
	  $ucenici= "$pr $im";
	  $opu= $redak["opu_id"];
	  if ( $uc == $opu)
	  	  {
		$dat= date("Y")."-".date("m")."-".date("d");
		$izostanak="select * from izostanci where opu_id = '$opu' and datum = '$dat'";
	  if(!$izo=mysql_query($izostanak)) {echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query(); }
	  if(mysql_num_rows($izo) > 0)
	 	 {
	 				if($_POST["s1". $opu .""] == 1)
					{
						$prvi=$_POST["s1". $opu .""];
						$sql="update izostanci set prvi = '$prvi' where opu_id = '$opu' and datum = '$dat'";
						if (mysql_query($sql))
							{
								//echo "<br>Podaci za učenika $ucenici su uspješno pohranjeni!<br>";
							}
							else{echo "<br>Podaci za učenika $ucenici nisu pohranjeni!<br />" .mysql_error();}
					}
					if($_POST["s2". $opu .""] == 2)
					{
						$drugi=$_POST["s2". $opu .""];
						$sql="update izostanci set drugi = '$drugi' where opu_id = '$opu' and datum = '$dat'";
						if (mysql_query($sql))
							{
								//echo "<br>Podaci za učenika $ucenici su uspješno pohranjeni!<br>";
							}
							else{echo "<br>Podaci za učenika $ucenici nisu pohranjeni!<br />" .mysql_error();}
					}
					if($_POST["s3". $opu .""] == 3)
					{
						$treci=$_POST["s3". $opu .""];
						$sql="update izostanci set treci = '$treci' where opu_id = '$opu' and datum = '$dat'";
						if (mysql_query($sql))
							{
								//echo "<br>Podaci za učenika $ucenici su uspješno pohranjeni!<br>";
							}
							else{echo "<br>Podaci za učenika $ucenici nisu pohranjeni!<br />" .mysql_error();}
					}
					if($_POST["s4". $opu .""] == 4)
					{
						$cetvrti=$_POST["s4". $opu .""];
						$sql="update izostanci set cetvrti = '$cetvrti' where opu_id = '$opu' and datum = '$dat'";
						if (mysql_query($sql))
							{
								//echo "<br>Podaci za učenika $ucenici su uspješno pohranjeni!<br>";
							}
							else{echo "<br>Podaci za učenika $ucenici nisu pohranjeni!<br />" .mysql_error();}
					}
					if($_POST["s5". $opu .""] == 5)
					{
						$peti=$_POST["s5". $opu .""];
						$sql="update izostanci set peti = '$peti' where opu_id = '$opu' and datum = '$dat'";
						if (mysql_query($sql))
							{
								//echo "<br>Podaci za učenika $ucenici su uspješno pohranjeni!<br>";
							}
							else{echo "<br>Podaci za učenika $ucenici nisu pohranjeni!<br />" .mysql_error();}
					}
					if($_POST["s6". $opu .""] == 6)
					{
						$sesti=$_POST["s6". $opu .""];
						$sql="update izostanci set sesti = '$sesti' where opu_id = '$opu' and datum = '$dat'";
						if (mysql_query($sql))
							{
								//echo "<br>Podaci za učenika $ucenici su uspješno pohranjeni!<br>";
							}
							else{echo "<br>Podaci za učenika $ucenici nisu pohranjeni!<br />" .mysql_error();}
					}
					if($_POST["s7". $opu .""] == 7)
					{
						$sedmi=$_POST["s7". $opu .""];
						$sql="update izostanci set sedmi = '$sedmi' where opu_id = '$opu' and datum = '$dat'";
						if (mysql_query($sql))
							{
								//echo "<br>Podaci za učenika $ucenici su uspješno pohranjeni!<br>";
							}
							else{echo "<br>Podaci za učenika $ucenici nisu pohranjeni!<br />" .mysql_error();}
					}
					echo "<br>- $ucenici<br>";
		  }
		  else 
		  	{
			$prvi=$_POST["s1". $opu .""];
				$drugi=$_POST["s2". $opu .""];
				$treci=$_POST["s3". $opu .""];
				$cetvrti=$_POST["s4". $opu .""];
				$peti=$_POST["s5". $opu .""];
				$sesti=$_POST["s6". $opu .""];
				$sedmi=$_POST["s7". $opu .""];
		$sql="insert into izostanci (korisnik_id, razred_id, opu_id, datum, prvi, drugi, treci, cetvrti, peti, sesti, sedmi) values ('$kid', '$_GET[razred_id]', '$opu', '$dat', '$prvi', '$drugi', '$treci', '$cetvrti', '$peti', '$sesti', '$sedmi')";
		if (mysql_query($sql))
					{
				echo "<br>- $ucenici<br>";
					}
					else
						{
						echo "<br>Podaci za učenika $ucenici nisu pohranjeni!<br />" .mysql_error();
								
						}
			}		  
		  }
		
		}
		}
	
		}
		else{
		?>
		<br><a href="upis_izostanaka.php?razred_id=<?=$_GET["razred_id"]?>"><br />Odberi učenika!</a>
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