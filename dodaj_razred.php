<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Dodaj razred</title>
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
#Layer9 {
	position:absolute;
	width:400px;
	height:250px;
	z-index:1;
	left: 50px;
	top: 30px;
}
.style10 {color: #000000}
.style11 {color:#000000}
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
      <th scope="col" align="left" width="282" class="style11"></th>
      <th width="386" align="left" class="style11" scope="col"></th>
    </tr>
  </table>
</div>
<table width="1000" border="0" cellspacing="0" cellpadding="0" style="position:relative; left: -500px; top: 0px;">
  <tr>
    <td align="left" valign="top">
<table width="300" height="506" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="28" background="lijeva_gore.png">&nbsp;</td>
  </tr>
  <tr>
    <td height="446" valign="top" background="lijeva_srednja.png">
 <ul>
  <ul>
    <li><a href="korisnik.php">Povratak</a></li>
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
    <td align="left" valign="top">

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
<div>
  <p>Odaberi razred :</p>
</div>
	<form method="post" action="">
  <table width="200" border="0" align="center">
    <tr>
      <td>Razred : </td>
      <td><select name="razred">
	<?
				for ($i=1; $i<9; $i++)
				{
				?>
				<option><?=$i?></option>
			<?
				}
			?>
	  </select></td>
    </tr>
    <tr>
      <td>Odjel : </td>
      <td><select name="odjel">
	  <option>a</option>
	  <option>b</option>
	  <option>c</option>
	  <option>d</option>
	  <option>e</option>
	  <option>f</option>
	  <option>g</option>
	  <option>h</option>
	  </select></td>
    </tr>
	<tr><td colspan="2"><span class="style7"></span></td>
	</tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="SBunos" value="Pohrani">
      </div></td>
    </tr>
  </table>
  </form>
<?
}else 
	{
	include "spoj.php";
	$kor="SELECT * FROM korisnik WHERE korisnik_id = '$kid'";
	if(!$ko=mysql_query($kor)) {echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query(); }
	if ($k=mysql_fetch_array($ko))
		{
	$ns = $k["naziv_skole"];
	$ms = $k["mjesto_skole"];
	$raz = $_POST["razred"].".".$_POST["odjel"];
	$prov="select * from razred where korisnik_id = '$kid' and razred = '$raz'";
	if (!$pro=mysql_query($prov))
				{echo "Nastala je greška pri izvođenju upita!<br />" . mysql_query();}
	if(mysql_affected_rows() == 1)
		{
			?>
		<div><br>
		  <div align="center"><br>
		    <?
			echo "$raz razred već postoji!";
					?>
			<br /><br /><a href="dodaj_razred.php">Ponovi unos.</a>
          </div>
		</div>
		<?
			}else
				{
	$sql="insert into razred (korisnik_id, razred) values('$kid', '$raz')";
	if (mysql_query($sql))
		{
			?>
		<div><br>
		  <div align="center"><br>
		    <?
		echo "<br>$raz razred je uspješno unesen!<br> ";
		?>
		<br /><br /><a href="korisnik.php">Povratak.</a>
		<?
		}else 
			{
			echo "$raz razred nije unesen!";
				?>
				<br /><br /><a href="dodaj_razred.php">Ponovi unos.</a>
          </div>
		</div>
		<?
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