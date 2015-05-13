<?php
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Imenik</title>
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
	height:500px;
	z-index:4;
	left: 400px;
	top: -497px;
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
	height:412px;
	z-index:1;
	left: 40px;
	top: 40px;
	width: 640px;
}
.style12 {font-size: 12px}
.style13 {
	font-size: 18px;
	font-weight: bold;
}

-->
</style>
</head>
<body style="margin-left: 50%;">
<a name="početak"></a>
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
        </div></th>
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
<table width="300" height="506" border="0" cellpadding="0" cellspacing="0" class="style6">
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
    <li><a href="izborni_predmeti.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>">Upis izbornih<br /> predmeta</a></li>
	</ul>                                     
  </ul>
  <hr width="180" />
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
					<a href="imenik.php?razred_id=<?=$redak["razred_id"]?>&opu_id=<?=$redak["opu_id"]?>" class="style12"> <span class="style12">
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
				<br />	</td>
  </tr>
  <tr>
    <td height="28" background="lijeva_dolje.png">&nbsp;</td>
  </tr>
</table>

</td>
    <td valign="top">

  <table width="700" height="568" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="28" height="28" background="gore_lijevo.png">&nbsp;</td>
    <td width="644" background="gore_mala.png">&nbsp;</td>
    <td width="28" background="gore_desno.png">&nbsp;</td>
  </tr>
  <tr>
    <td height="508" align="right" background="lijevo_mala.png">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF">
	<?
  $predmeti="select * from predmeti where opu_id = '$opu' order by rb asc";
  if(!$pred=mysql_query($predmeti)){echo"<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
  while ($redak=mysql_fetch_array($pred))
  {
  $pr_id= $redak["predmet_id"];
  ?>
    <table width="600" border="1">
      <tr>
        <td bgcolor="#BEB4FC"><span class="style13">
          <?=$redak["predmet"]?>
        </span></td>
      </tr>
	  <tr>
	  <td bgcolor="#BEB4FC">
	    <div align="center">OPISNO PRAĆENJE I BROJČANO OCJENJIVANJE UČENIKA        </div></td>
	  </tr>
      <tr>
        <td>
		
		<table width="592" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#BEB4FC">
          <tr>
            <td width="222" bgcolor="#BEB4FC"><div align="center">SASTAVNICE I NAČINI PRAĆENJA </div></td>
            <td width="30"><div align="center">9.</div></td>
            <td width="30"><div align="center">10.</div></td>
            <td width="30"><div align="center">11.</div></td>
            <td width="30"><div align="center">12.</div></td>
            <td width="30"><div align="center">1.</div></td>
            <td width="30"><div align="center">2.</div></td>
            <td width="30"><div align="center">3.</div></td>
            <td width="30"><div align="center">4.</div></td>
            <td width="30"><div align="center">5.</div></td>
            <td width="30"><div align="center">6.</div></td>
          </tr>
		   <?
  $sastavnice="select * from sastavnice where opu_id = '$opu' and predmet_id = '$pr_id' order by sastavnice_id asc";
  if(!$sast=mysql_query($sastavnice)){echo"<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
  while ($redak=mysql_fetch_array($sast))
  {
  $s= $redak["sastavnice_id"];
  ?>
          <tr>
            <td><?=$redak["sastavnica"]?></td>
            <td>
			  <div align="center">
			    <?
			$ocjena="select * from ocjene where opu_id = '$opu' and sastavnice_id = '$s' and datum like '2008-09-__'order by datum asc";
			if(!$oc=mysql_query($ocjena)){echo"<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
			 if(mysql_num_rows($oc) > 0)
  	{
  while ($redak=mysql_fetch_array($oc))
  {
  $ocjena= $redak["ocjena"];
	echo $ocjena;
  }
	}
	else
		{
		echo "&nbsp;";
		}
			?>
	          </div></td>
            <td>
			  <div align="center">
			    <?
			$ocjena="select * from ocjene where opu_id = '$opu' and sastavnice_id = '$s' and datum like '2008-10-__'order by datum asc";
			if(!$oc=mysql_query($ocjena)){echo"<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
 if(mysql_num_rows($oc) > 0)
  	{
  while ($redak=mysql_fetch_array($oc))
  {
  $ocjena= $redak["ocjena"];
	echo $ocjena;
  }
	}
	else
		{
		echo "&nbsp;";
		}
			?>
		      </div></td>
            <td><div align="center">
              <?
			$ocjena="select * from ocjene where opu_id = '$opu' and sastavnice_id = '$s' and datum like '2008-11-__'order by datum asc";
			if(!$oc=mysql_query($ocjena)){echo"<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
  if(mysql_num_rows($oc) > 0)
  	{
  while ($redak=mysql_fetch_array($oc))
  {
  $ocjena= $redak["ocjena"];
	echo $ocjena;
  }
	}
	else
		{
		echo "&nbsp;";
		}
			?>
            </div></td>
            <td><div align="center">
              <?
			$ocjena="select * from ocjene where opu_id = '$opu' and sastavnice_id = '$s' and datum like '2008-12-__'order by datum asc";
			if(!$oc=mysql_query($ocjena)){echo"<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
 if(mysql_num_rows($oc) > 0)
  	{
  while ($redak=mysql_fetch_array($oc))
  {
  $ocjena= $redak["ocjena"];
	echo $ocjena;
  }
	}
	else
		{
		echo "&nbsp;";
		}
			?>
            </div></td>
            <td><div align="center">
              <?
			$ocjena="select * from ocjene where opu_id = '$opu' and sastavnice_id = '$s' and datum like '2009-01-__'order by datum asc";
			if(!$oc=mysql_query($ocjena)){echo"<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
 if(mysql_num_rows($oc) > 0)
  	{
  while ($redak=mysql_fetch_array($oc))
  {
  $ocjena= $redak["ocjena"];
	echo $ocjena;
  }
	}
	else
		{
		echo "&nbsp;";
		}
			?>
            </div></td>
            <td><div align="center">
              <?
			$ocjena="select * from ocjene where opu_id = '$opu' and sastavnice_id = '$s' and datum like '2009-02-__'order by datum asc";
			if(!$oc=mysql_query($ocjena)){echo"<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
 if(mysql_num_rows($oc) > 0)
  	{
  while ($redak=mysql_fetch_array($oc))
  {
  $ocjena= $redak["ocjena"];
	echo $ocjena;
  }
	}
	else
		{
		echo "&nbsp;";
		}
			?>
            </div></td>
            <td><div align="center">
              <?
			$ocjena="select * from ocjene where opu_id = '$opu' and sastavnice_id = '$s' and datum like '2009-03-__'order by datum asc";
			if(!$oc=mysql_query($ocjena)){echo"<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
  if(mysql_num_rows($oc) > 0)
  	{
  while ($redak=mysql_fetch_array($oc))
  {
  $ocjena= $redak["ocjena"];
	echo $ocjena;
  }
	}
	else
		{
		echo "&nbsp;";
		}
			?>
            </div></td>
            <td><div align="center">
              <?
			$ocjena="select * from ocjene where opu_id = '$opu' and sastavnice_id = '$s' and datum like '2009-04-__'order by datum asc";
			if(!$oc=mysql_query($ocjena)){echo"<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
  if(mysql_num_rows($oc) > 0)
  	{
  while ($redak=mysql_fetch_array($oc))
  {
  $ocjena= $redak["ocjena"];
	echo $ocjena;
  }
	}
	else
		{
		echo "&nbsp;";
		}
			?>
            </div></td>
            <td><div align="center">
              <?
			$ocjena="select * from ocjene where opu_id = '$opu' and sastavnice_id = '$s' and datum like '2009-05-__'order by datum asc";
			if(!$oc=mysql_query($ocjena)){echo"<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
 if(mysql_num_rows($oc) > 0)
  	{
  while ($redak=mysql_fetch_array($oc))
  {
  $ocjena= $redak["ocjena"];
	echo $ocjena;
  }
	}
	else
		{
		echo "&nbsp;";
		}
			?>
            </div></td>
            <td><div align="center">
              <?
			$ocjena="select * from ocjene where opu_id = '$opu' and sastavnice_id = '$s' and datum like '2009-06-__'order by datum asc";
			if(!$oc=mysql_query($ocjena)){echo"<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
 if(mysql_num_rows($oc) > 0)
  	{
  while ($redak=mysql_fetch_array($oc))
  {
  $ocjena= $redak["ocjena"];
	echo $ocjena;
  }
	}
	else
		{
		echo "&nbsp;";
		}
			?>
            </div></td>
          </tr>
		 <?
	}
		 ?>
        </table>		</td>
      </tr>
	   <tr>
        <td>
		<table width="592" border="1" cellpadding="1" cellspacing="1" bordercolor="#BEB4FC">
  <tr>
    <td width="147" rowspan="2" bgcolor="#BEB4FC"><div align="center"><strong>Završne ocjene </strong><a href="zavrsne_ocjene.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>&predmet_id=<?=$pr_id?>"><br />unos</a> </div></td>
    <td width="210" bgcolor="#BEB4FC"><div align="center">USPJEH NA 1. POLUGODIŠTU </div></td>
    <td width="217" bgcolor="#BEB4FC"><div align="center">USPJEH NA KRAJU NASTAVNE GODINE </div></td>
  </tr>
  <tr>
    <td><div align="center">
	<?
	$zavoc="select uspjeh_na_polugodistu from zavrsne_ocjene where opu_id = '$opu' and predmet_id = '$pr_id'";
	if(!$zav=mysql_query($zavoc)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
	if($red=mysql_fetch_array($zav))
		{
		$zo=$red["uspjeh_na_polugodistu"];
		if($zo == 5) {echo "odličan (5)";}
		if($zo == 4) {echo "vrlo dobar (4)";}
		if($zo == 3) {echo "dobar (3)";}
		if($zo == 2) {echo "dovoljan (2)";}
		if($zo == 1) {echo "nedovoljan (1)";}
		}
	?>
	</div></td>
    <td><div align="center">
	<?
	$zavoc="select uspjeh_na_kraju from zavrsne_ocjene where opu_id = '$opu' and predmet_id = '$pr_id'";
	if(!$zav=mysql_query($zavoc)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
	if($red=mysql_fetch_array($zav))
		{
		$zo=$red["uspjeh_na_kraju"];
		if($zo == 5) {echo "odličan (5)";}
		if($zo == 4) {echo "vrlo dobar (4)";}
		if($zo == 3) {echo "dobar (3)";}
		if($zo == 2) {echo "dovoljan (2)";}
		if($zo == 1) {echo "nedovoljan (1)";}
		}
	?>
	</div></td>
  </tr>
</table>		</td>
      </tr>
	  <tr>
	  <td bgcolor="#BEB4FC">
	    <div align="center">RAZVOJ INTERESA, SPOSOBNOSTI I ODNOSA NA RADU        </div></td>
	  </tr>
	  <tr>
        <td class="style12">
	  <?	
	  $opr="select * from opisno_pracenje where opu_id = '$opu' and predmet_id = '$pr_id' order by datum asc";
	  if(!$op=mysql_query($opr)){echo"<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
  while ($redak=mysql_fetch_array($op))
  {
	  echo $redak["podatak"]."<br>";
	  }
	  ?>	  </td>
      </tr>
      <tr>
        <td>
		<table width="592" border="1" cellpadding="1" cellspacing="1" bordercolor="#BEB4FC">
  <tr>
    <td width="225"><div align="center"><a href="unos_op.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>&predmet_id=<?=$pr_id?>">Unos opisnog praćenja</a></div></td>
    <td width="351"> <div align="center"><a href="unos_ocjene.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>&predmet_id=<?=$pr_id?>">Unos ocjene</a></div></td>
  </tr>
</table>		</td>
      </tr>
    </table>
	<br />
<br />
<a href="imenik.php?razred_id=<?=$_GET["razred_id"]?>&opu_id=<?=$_GET["opu_id"]?>#početak">Vrh stranice</a>
<br />
<br />
<br />


<?
	}
?></td>
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
?><br />
<br />
<br />
<br />

</body>
</html>
<?php
ob_flush();
?>