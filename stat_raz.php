<?php
ob_start();
include("Includes/FusionCharts.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>Statistika razreda</title>
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
    <div align="center">    
    <br />
    <br />
    <div align="left" class="style6"><strong>Statistika razreda na kraju prvog polugodišta:</strong></div>
    <br />
    <br />
    <br />
    Uspjeh učenika:
    <br />
    <br />
      <table width="637" height="85" border="1" cellpadding="1" cellspacing="1" bordercolor="#BEB4FC">
        <tr class="style13">
          <td width="28" align="center" bgcolor="#BEB4FC"><span class="style13">Br. im.</span></td>
          <td width="144" align="center" bgcolor="#BEB4FC"><span class="style13">Prezime i ime</span></td>
          <td width="63" align="center" bgcolor="#BEB4FC"><span class="style13">Izostanci</span></td>
          <td width="63" align="center" bgcolor="#BEB4FC"><span class="style13">Opravdano</span></td>
          <td width="77" align="center" bgcolor="#BEB4FC"><span class="style13">Neopravdano</span></td>
          <td width="56" align="center" bgcolor="#BEB4FC"><span class="style13">Prosjek ocjena</span></td>
          <td width="107" align="center" bgcolor="#BEB4FC"><span class="style13">Uspjeh</span></td>
          <td width="56" align="center" bgcolor="#BEB4FC"><span class="style13">Br. neg. ocjena</span></td>
        </tr>
        <?
        $ucenici="select * from osobni_podaci_ucenika where razred_id = '$rid' order by rbr_ucenika asc";
		if(!$ucen=mysql_query($ucenici)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
		while($red=mysql_fetch_array($ucen))
		{
			$rbr=$red["rbr_ucenika"];
			$id=$red["opu_id"];
			$ime=$red["ime_ucenika"];
			$pre=$red["prezime_ucenika"];
		?>
        <tr class="style13">
          <td align="center">            <span class="style13">
            <?=$red["rbr_ucenika"]?>          
            </span></td>
          <td align="left">
            <span class="style13">
            <?=$red["prezime_ucenika"]?>            
            <?=$red["ime_ucenika"]?>          
            </span></td>
          <?
		  if(date("m") >= 1 and date("m") <9 ){$g=date("Y") - 1;}else{$g=date("Y");}
		  $izostanci="select sum(opravdano) as opr, sum(neopravdano) as nopr from izostanci_azuriranje where opu_id = '$id' and datum_izostanka >= '2008-09-01' and datum_izostanka < '2008-12-31'";
		  if(!$izo=mysql_query($izostanci)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
		  if($red=mysql_fetch_array($izo))
		  	{
				$op = $red["opr"];
				$nop = $red["nopr"];
				$izo= $op + $nop;
				if($op == null){$op=0;}
				if($nop == null){$nop=0;}
		  ?>
          <td align="center">            <span class="style13">
            <?=$izo?>          
            </span></td>
          <td align="center">            <span class="style13">
            <?=$op?>          
            </span></td>
          <td align="center">            <span class="style13">
            <?=$nop?>          
            </span></td>
          	<?
			}
			$negativne="select count(uspjeh_na_polugodistu) as negat from zavrsne_ocjene where opu_id = '$id' and uspjeh_na_polugodistu = '1'";
			if(!$nega=mysql_query($negativne)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
			if($red=mysql_fetch_array($nega))
				{
					$neg=$red["negat"];
				}
			$ocjene="select avg(uspjeh_na_polugodistu) as pol from zavrsne_ocjene where opu_id = '$id'";
			if(!$oc=mysql_query($ocjene)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
			if($red=mysql_fetch_array($oc))
			{
				$pros=$red["pol"];
			?>
          <td align="center"><?
          echo round ($pros,2);
		  ?>
          </td>
          <?
		  if ($pros < 1){$uspjeh = "&nbsp;";}
		  if ($pros >= 1 and $pros < 1.5) {$uspjeh= "nedovoljan (1)";}
		  if ($pros >= 1.5 and $pros < 2.5) {$uspjeh= "dovoljan (2)";}
		  if ($pros >= 2.5 and $pros < 3.5) {$uspjeh= "dobar (3)";}
		  if ($pros >= 3.5 and $pros < 4.5) {$uspjeh= "vrlo dobar (4)";}
		  if ($pros >= 4.5) {$uspjeh= "odličan (5)";}
		  if ($pros > 5){$uspjeh = "&nbsp;";}
		  ?>
          <td align="center"><?
          if($neg > 0){echo "nedovoljan (1)";}
		  else
		  {
		  echo $uspjeh;
		  }
		  ?></td>
          <?
			}
			
		  ?>
          <td align="center"><?=$neg?></td>
        </tr>
        <?
		}
		?>        
        <tr>
          <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">Ukupno</td>
          <?
		$uizostanci="select sum(opravdano) as uopr, sum(neopravdano) as unopr from izostanci_azuriranje where razred_id = '$rid' and datum_izostanka >= '2008-09-01' and datum_izostanka < '2008-12-31'";
		  if(!$uizo=mysql_query($uizostanci)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
		  if($red=mysql_fetch_array($uizo))
		  	{
				$uo=$red["uopr"];
				$uno=$red["unopr"];
				$uiz= $uo + $uno;
				if($uo == null){$uo=0;}
				if($uno == null){$uno=0;}
		  ?>
          <td align="center" bgcolor="#E8EAFF">            <strong><span class="style15">
            <?=$uiz?>            
            </span></strong></td>
          <td align="center" bgcolor="#E8EAFF">            <strong><span class="style15">
            <?=$uo?>            
            </span></strong></td>
          <td align="center" bgcolor="#E8EAFF">            <strong><span class="style15">
            <?=$uno?>            
            </span></strong></td>
          <?
			}
			  $ucenici="select * from osobni_podaci_ucenika where razred_id = '$rid' order by rbr_ucenika asc";
		if(!$ucen=mysql_query($ucenici)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
		while($red=mysql_fetch_array($ucen))
		{
			$id=$red["opu_id"];
			$ocjene="select avg(uspjeh_na_polugodistu) as pol from zavrsne_ocjene where opu_id = '$id'";
			if(!$oc=mysql_query($ocjene)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
			if($red=mysql_fetch_array($oc))
			{
				$pros=$red["pol"];
				$uk_pros= $uk_pros + $pros;
				if ($pros != null){$br+=1;}
			}
		}
			if($br == null){$uk_prosjek= "";}else{$uk_prosjek= $uk_pros/$br;}
			
			?>
          <td align="center" bgcolor="#E8EAFF" class="style15">
          <?
          echo round($uk_prosjek,2);
		  ?>
          </td>
          <?
		  if ($uk_prosjek < 1){$usp= "&nbsp;";}
		  if ($uk_prosjek >= 1 and $uk_prosjek < 1.5) {$usp= "nedovoljan (1)";}
		  if ($uk_prosjek >= 1.5 and $uk_prosjek < 2.5) {$usp= "dovoljan (2)";}
		  if ($uk_prosjek >= 2.5 and $uk_prosjek < 3.5) {$usp= "dobar (3)";}
		  if ($uk_prosjek >= 3.5 and $uk_prosjek < 4.5) {$usp= "vrlo dobar (4)";}
		  if ($uk_prosjek >= 4.5 and $uk_prosjek <= 5) {$usp= "odličan (5)";}
		  if ($uk_prosjek > 5){$usp= "&nbsp;";}
		  ?>
          <td align="center" bgcolor="#E8EAFF" class="style15"><?=$usp?></td>
          <?
		  $jedinice="select count(uspjeh_na_polugodistu) as jedan from zavrsne_ocjene where razred_id = '$rid' and uspjeh_na_polugodistu = '1'";
		  if(!$jedin=mysql_query($jedinice)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
		  if($red=mysql_fetch_array($jedin))
		  	{
				$jed=$red["jedan"];
		  ?>
          <td align="center" bgcolor="#E8EAFF" class="style15">
            <strong>
            <?=$jed?>
            </strong></td>
          <?
			}
		  ?>
        </tr>
      </table>
      <br />
      <br />
Uspjeh po predmetima:
<br />
<br />
<table width="637" border="1" cellpadding="1" cellspacing="1" class="style13">
  <tr>
    <td width="150" align="center" bgcolor="#BEB4FC">Nastavni predmet</td>
    <td width="73" align="center" bgcolor="#BEB4FC">odličan (5)</td>
    <td width="75" align="center" bgcolor="#BEB4FC">vrlo dobar (4)</td>
    <td width="70" align="center" bgcolor="#BEB4FC">dobar (3)</td>
    <td width="74" align="center" bgcolor="#BEB4FC">dovoljan (2)</td>
    <td width="77" align="center" bgcolor="#BEB4FC">nedovoljan (1)</td>
    <td width="80" align="center" bgcolor="#BEB4FC">Srednja ocjena</td>
  </tr>
  <?
  $naziv="select distinct predmet from predmeti where razred_id = '$rid' order by rb asc";
  if(!$naz=mysql_query($naziv)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
  while($red=mysql_fetch_array($naz))
  {
	  $pred=$red["predmet"];
	  $petica=0;
	  $cetvorka=0;
	  $trojka=0;
	  $dvojka=0;
	  $jedinica=0;
  $predmeti="select * from predmeti where razred_id = '$rid' and predmet = '$pred'";
  if(!$predm=mysql_query($predmeti)){echo "<br>Nastala je greška prilikom izvđenja upita!<br>".mysql_query();}
  while($red=mysql_fetch_array($predm))
  	{
		$pred_id=$red["predmet_id"];
		$ocjene="select * from zavrsne_ocjene where predmet_id = '$pred_id'";
		if(!$ocje=mysql_query($ocjene)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
		if($red=mysql_fetch_array($ocje))
			{
			$ocjena=$red["uspjeh_na_polugodistu"];
			if($ocjena == 5){$petica+=1; $p+=1;}
			if($ocjena == 4){$cetvorka+=1; $c+=1;}
			if($ocjena == 3){$trojka+=1; $t+=1;}
			if($ocjena == 2){$dvojka+=1; $dv+=1;}
			if($ocjena == 1){$jedinica+=1; $j+=1;}
			}
	}
  ?>
  <tr>
    <td align="left"><?=$pred?></td>
    <td align="center"><?=$petica?></td>
    <td align="center"><?=$cetvorka?></td>
    <td align="center"><?=$trojka?></td>
    <td align="center"><?=$dvojka?></td>
    <td align="center"><?=$jedinica?></td>
    <?
	if(($petica + $cetvorka + $trojka + $dvojka + $jedinica) == 0){$sr=0;}
	else{$sr=($petica*5 + $cetvorka*4 + $trojka*3 + $dvojka*2 + $jedinica*1)/($petica + $cetvorka + $trojka + $dvojka + $jedinica);}
	?>
    <td align="center">
	<?
	echo round($sr,2);
	?>
    </td>
  </tr>
  <?
	}
	if($p < 1){$p=0;}
	if($c < 1){$c=0;}
	if($t < 1){$t=0;}
	if($dv < 1){$dv=0;}
	if($j < 1){$j=0;}
  ?>
  <tr class="style15">
    <td align="center" bgcolor="#BEB4FC"><strong>Ukupno</strong></td>
    <td align="center" bgcolor="#E8EAFF"><?=$p?></td>
    <td align="center" bgcolor="#E8EAFF"><?=$c?></td>
    <td align="center" bgcolor="#E8EAFF"><?=$t?></td>
    <td align="center" bgcolor="#E8EAFF"><?=$dv?></td>
    <td align="center" bgcolor="#E8EAFF"><?=$j?></td>
    <?
	if(($p + $c + $t + $dv + $j) == 0){$pr=0;}
	else{$pr=($p*5 + $c*4 + $t*3 + $dv*2 + $j*1)/($p + $c + $t + $dv + $j);}
	?>
    <td align="center" bgcolor="#E8EAFF">
    <?
	echo round($pr,2);
	?>
    </td>
  </tr>
</table>
<br />
<br />
<?
$strXML = "<graph caption='Prosjek ocjena po predmetima' xAxisName='Predmet' yAxisName='Ocjena' decimalPrecision='2' formatNumberScale='0' yAxisMaxValue='5'>";

 $naziv="select distinct predmet from predmeti where razred_id = '$rid' order by rb asc";
  if(!$naz=mysql_query($naziv)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
  while($red=mysql_fetch_array($naz))
  {
	  $pred=$red["predmet"];
	  $petica=0;
	  $cetvorka=0;
	  $trojka=0;
	  $dvojka=0;
	  $jedinica=0;
  $predmeti="select * from predmeti where razred_id = '$rid' and predmet = '$pred'";
  if(!$predm=mysql_query($predmeti)){echo "<br>Nastala je greška prilikom izvđenja upita!<br>".mysql_query();}
  while($red=mysql_fetch_array($predm))
  	{
		$pred_id=$red["predmet_id"];
		$ocjene="select * from zavrsne_ocjene where predmet_id = '$pred_id'";
		if(!$ocje=mysql_query($ocjene)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
		if($red=mysql_fetch_array($ocje))
			{
			$ocjena=$red["uspjeh_na_polugodistu"];
			if($ocjena == 5){$petica+=1;}
			if($ocjena == 4){$cetvorka+=1;}
			if($ocjena == 3){$trojka+=1;}
			if($ocjena == 2){$dvojka+=1;}
			if($ocjena == 1){$jedinica+=1;}
			}
	}
	if(($petica + $cetvorka + $trojka + $dvojka + $jedinica) == 0){$sr=0;}
	else{$sr=($petica*5 + $cetvorka*4 + $trojka*3 + $dvojka*2 + $jedinica*1)/($petica + $cetvorka + $trojka + $dvojka + $jedinica);}
 $predm=substr($pred,0,3);
	$strXML .= "<set name='$predm' value='$sr' color='FF0000' />";
  }
	
	$strXML .=  "</graph>";
	
	
	echo renderChartHTML("FusionCharts/FCF_Line.swf", "", $strXML, "myNext", 400, 300);
?>
<br />
<br />
<table width="636" border="1" cellspacing="1" cellpadding="1">
  <tr align="center" class="style15">
    <td colspan="18" bgcolor="#BEB4FC" class="style15">USPJEH UČENIKA</td>
  </tr>
  <tr>
    <td colspan="8" align="center" bgcolor="#BEB4FC" class="style15">Pozitivan uspjeh</td>
    <td colspan="2" rowspan="2" align="center" bgcolor="#BEB4FC" class="style15">Uspje&scaron;ni ukupno</td>
    <td colspan="6" align="center" bgcolor="#BEB4FC" class="style15">Nedovoljan uspjeh</td>
    <td colspan="2" rowspan="2" align="center" bgcolor="#BEB4FC" class="style15">Ukupno nedovoljnih</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">odličnih</td>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">vrlo dobrih</td>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">dobrih </td>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">dovoljnih</td>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">1</td>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">2</td>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">3 i &gt;</td>
  </tr>
  <tr class="style13">
    <td  align="center">br.</td>
    <td  align="center">%</td>
    <td  align="center">br.</td>
    <td  align="center">%</td>
    <td  align="center">br.</td>
    <td  align="center">%</td>
    <td  align="center">br.</td>
    <td  align="center">%</td>
    <td  align="center" bgcolor="#E8EAFF">br.</td>
    <td  align="center" bgcolor="#E8EAFF">%</td>
    <td  align="center">br.</td>
    <td  align="center">%</td>
    <td  align="center">br.</td>
    <td  align="center">%</td>
    <td align="center">br.</td>
    <td  align="center">%</td>
    <td  align="center" bgcolor="#E8EAFF">br.</td>
    <td  align="center" bgcolor="#E8EAFF">%</td>
  </tr>
  <tr class="style13">
  <?
  $pet=0;
  $cet=0;
  $tri=0;
  $dva=0;
  $jed=0;
  $jedan_kec=0;
  $dva_keca=0;
  $tri_keca=0;
  $br_uc=0;
  $ucenik="select * from osobni_podaci_ucenika where razred_id = '$rid'";
  if(!$raz=mysql_query($ucenik)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
  while($red=mysql_fetch_array($raz))
  {
	  $br_uc+=1;
	  $pid=$red["opu_id"];
	    $neuspjeh="select count(uspjeh_na_polugodistu) as neus_pol from zavrsne_ocjene where opu_id = '$pid' and uspjeh_na_polugodistu = '1'";
	  if(!$neusp=mysql_query($neuspjeh)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
	  if($red=mysql_fetch_array($neusp))
			{
				$jedinica=$red["neus_pol"];
				if($jedinica > 0)
				{
				$jed+=1;
				if($jedinica == 1){$jedan_kec+=1;}
				if($jedinica == 2){$dva_keca+=1;}
				if($jedinica > 2){$tri_keca+=1;}
				}
				else
		{
	  $uspjeh="select avg(uspjeh_na_polugodistu) as us_pol from zavrsne_ocjene where opu_id = '$pid'";
	  if(!$usp=mysql_query($uspjeh)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
	  if($red=mysql_fetch_array($usp))
	  	{
			$avg=$red["us_pol"];
			if($avg >= 4.5 and $avg <= 5){$pet+=1;}
			if($avg >= 3.5 and $avg < 4.5){$cet+=1;}
			if($avg >= 2.5 and $avg < 3.5){$tri+=1;}
			if($avg >= 1.5 and $avg < 2.5){$dva+=1;}
			}
		}
			}
	  }
	  $br_uspj=$pet + $cet + $tri + $dva;
	  $pet_posto=($pet/$br_uc)*100;
	  $cet_posto=($cet/$br_uc)*100;
	  $tri_posto=($tri/$br_uc)*100;
	  $dva_posto=($dva/$br_uc)*100;
	  $jed_posto=($jed/$br_uc)*100;
	  $jedan_kec_posto=($jedan_kec/$br_uc)*100;
	  $dva_keca_posto=($dva_keca/$br_uc)*100;
	  $tri_keca_posto=($tri_keca/$br_uc)*100;
	  $br_uspj_posto=($br_uspj/$br_uc)*100;
  ?>
    <td width="42" align="center"><?=$pet?></td>
    <td width="11" align="center"><?
    echo round($pet_posto, 2);
	?></td>
    <td width="36" align="center"><?=$cet?></td>
    <td width="32" align="center"><?
	echo round($cet_posto, 2);
    ?></td>
    <td width="37" align="center"><?=$tri?></td>
    <td width="9" align="center"><?
    echo round($tri_posto, 2);
	?></td>
    <td width="46" align="center"><?=$dva?></td>
    <td width="14" align="center"><?
    echo round($dva_posto, 2);
	?></td>
    <td width="48" align="center" bgcolor="#E8EAFF"><?=$br_uspj?></td>
    <td width="46" align="center" bgcolor="#E8EAFF"><?
    echo round($br_uspj_posto, 2);
	?></td>
    <td width="5" align="center"><?=$jedan_kec?></td>
    <td width="13" align="center"><?
    echo round($jedan_kec_posto,2);
	?></td>
    <td width="5" align="center"><?=$dva_keca?></td>
    <td width="26" align="center"><?
    echo round($dva_keca_posto,2);
	?></td>
    <td width="22" align="center"><?=$tri_keca?></td>
    <td width="30" align="center"><?
    echo round($tri_keca_posto,2);
	?></td>
    <td width="47" align="center" bgcolor="#E8EAFF"><?=$jed?></td>
    <td width="74" align="center" bgcolor="#E8EAFF"><?
    echo round($jed_posto, 2);
	?></td>
  </tr>
</table>
<br />
<br />
<?
if($pet == 0 and $cet == 0 and $tri == 0 and $dva == 0 and $jed == 0){}
else
{
$strXML = "<graph caption='Uspjeh učenika' xAxisName='' yAxisName='' decimalPrecision='0' formatNumberScale='5'>";
	$strXML .= "<set name='Odličnih' value='$pet' color='AFD8F8' />";
	$strXML .= "<set name='Vrlo dobrih' value='$cet' color='F6BD0F' />";
	$strXML .= "<set name='Dobrih' value='$tri' color='8BBA00' />";
	$strXML .= "<set name='Dovoljnih' value='$dva' color='FF8E46'/>";
	$strXML .= "<set name='Nedovoljnih' value='$jed' color='008E8E'/>";
	$strXML .=  "</graph>";
	
	
	echo renderChartHTML("FusionCharts/FCF_Column3D.swf", "", $strXML, "myNext", 400, 300);
}
	?>
<br />
<br />
<table width="340" border="1" cellspacing="1" cellpadding="1">
  <tr class="style15">
    <td width="80" rowspan="2" align="center" bgcolor="#BEB4FC">čl. 58</td>
    <td colspan="3" rowspan="2" align="center" bgcolor="#BEB4FC">Broj učenika</td>
  </tr>
  <tr></tr>
   <?
  $clanak="select count(cl58) as cl58 from clanak58 where razred_id = '$rid' and datum >= '2008-09-01' and datum < '2008-12-31'";
  if(!$clan=mysql_query($clanak)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
  if($red=mysql_fetch_array($clan))
  {
	  $cl=$red["cl58"];
	  }
  ?>
  <tr>
    <td rowspan="2" align="center" bgcolor="#E8EAFF" class="style13"><?=$cl?></td>
    <td align="center" bgcolor="#BEB4FC" class="style15">M</td>
    <td align="center" bgcolor="#BEB4FC" class="style15">Ž</td>
    <td align="center" bgcolor="#BEB4FC" class="style15">Ukupno</td>
  </tr>
  <tr>
  <?
  $ukupno="select count(spol_ucenika) as m from osobni_podaci_ucenika where razred_id = '$rid' and spol_ucenika = 'M' and datum >= '2008-09-01' and datum < '2008-12-31'";
  if(!$ukup=mysql_query($ukupno)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
  if($red=mysql_fetch_array($ukup))
  {
	  $muski=$red["m"];
	  }
 $zukupno="select count(spol_ucenika) as z from osobni_podaci_ucenika where razred_id = '$rid' and spol_ucenika = 'Ž' and datum >= '2008-09-01' and datum < '2008-12-31'";
  if(!$zukup=mysql_query($zukupno)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
  if($red=mysql_fetch_array($zukup))
  {
	  $zenski=$red["z"];
	  }
	  $ukupno_ucenika= $muski + $zenski;
  ?>
    <td align="center" class="style13">
      <?=$muski?>
    </td>
    <td align="center" class="style13">
      <?=$zenski?>
    </td>
    <td align="center" class="style13">
      <?=$ukupno_ucenika?>
    </td>
  </tr>
</table>
<br />
<br />
<br />
    <br />
    <div align="left" class="style6"><strong>Statistika razreda na kraju nastavne godine:</strong></div>
    <br />
    <br />
    <br />
    Uspjeh učenika:
    <br />
    <br />
      <table width="637" height="85" border="1" cellpadding="1" cellspacing="1" bordercolor="#BEB4FC">
        <tr class="style13">
          <td width="28" align="center" bgcolor="#BEB4FC"><span class="style13">Br. im.</span></td>
          <td width="144" align="center" bgcolor="#BEB4FC"><span class="style13">Prezime i ime</span></td>
          <td width="63" align="center" bgcolor="#BEB4FC"><span class="style13">Izostanci</span></td>
          <td width="63" align="center" bgcolor="#BEB4FC"><span class="style13">Opravdano</span></td>
          <td width="77" align="center" bgcolor="#BEB4FC"><span class="style13">Neopravdano</span></td>
          <td width="56" align="center" bgcolor="#BEB4FC"><span class="style13">Prosjek ocjena</span></td>
          <td width="107" align="center" bgcolor="#BEB4FC"><span class="style13">Uspjeh</span></td>
          <td width="56" align="center" bgcolor="#BEB4FC"><span class="style13">Br. neg. ocjena</span></td>
        </tr>
        <?
        $ucenici="select * from osobni_podaci_ucenika where razred_id = '$rid' order by rbr_ucenika asc";
		if(!$ucen=mysql_query($ucenici)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
		while($red=mysql_fetch_array($ucen))
		{
			$krbr=$red["rbr_ucenika"];
			$idk=$red["opu_id"];
			$kime=$red["ime_ucenika"];
			$kpre=$red["prezime_ucenika"];
		?>
        <tr class="style13">
          <td align="center">            <span class="style13">
            <?=$red["rbr_ucenika"]?>          
            </span></td>
          <td align="left">
            <span class="style13">
            <?=$red["prezime_ucenika"]?>            
            <?=$red["ime_ucenika"]?>          
            </span></td>
          <?
		  $izostanci="select sum(opravdano) as kopr, sum(neopravdano) as knopr from izostanci_azuriranje where opu_id = '$idk'";
		  if(!$izo=mysql_query($izostanci)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
		  if($red=mysql_fetch_array($izo))
		  	{
				$kop = $red["kopr"];
				$knop = $red["knopr"];
				$kizo= $kop + $knop;
				if($kop == null){$kop=0;}
				if($knop == null){$knop=0;}
		  ?>
          <td align="center">            <span class="style13">
            <?=$kizo?>          
            </span></td>
          <td align="center">            <span class="style13">
            <?=$kop?>          
            </span></td>
          <td align="center">            <span class="style13">
            <?=$knop?>          
            </span></td>
          	<?
			}
			$negativne="select count(uspjeh_na_kraju) as knegat from zavrsne_ocjene where opu_id = '$idk' and uspjeh_na_kraju = '1'";
			if(!$nega=mysql_query($negativne)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
			if($red=mysql_fetch_array($nega))
				{
					$kneg=$red["knegat"];
				}
			$ocjene="select avg(uspjeh_na_kraju) as kra from zavrsne_ocjene where opu_id = '$idk'";
			if(!$oc=mysql_query($ocjene)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
			if($red=mysql_fetch_array($oc))
			{
				$prosk=$red["kra"];
			?>
          <td align="center"><?
          echo round ($prosk,2);
		  ?>
          </td>
          <?
		  if ($prosk < 1){$kuspjeh = "&nbsp;";}
		  if ($prosk >= 1 and $prosk < 1.5) {$kuspjeh= "nedovoljan (1)";}
		  if ($prosk >= 1.5 and $prosk < 2.5) {$kuspjeh= "dovoljan (2)";}
		  if ($prosk >= 2.5 and $prosk < 3.5) {$kuspjeh= "dobar (3)";}
		  if ($prosk >= 3.5 and $prosk < 4.5) {$kuspjeh= "vrlo dobar (4)";}
		  if ($prosk >= 4.5 and $prosk <= 5) {$kuspjeh= "odličan (5)";}
		   if ($prosk > 5){$kuspjeh = "&nbsp;";}
		  ?>
          <td align="center"><?
          if($kneg > 0){echo "nedovoljan (1)";}
		  else
		  {
		  echo $kuspjeh;
			}
		  ?></td>
          <?
			}
		  ?>
          <td align="center"><?=$kneg?></td>
        </tr>
        <?
		}
		?>        
        <tr>
          <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">Ukupno</td>
          <?
		$uizostanci="select sum(opravdano) as kuopr, sum(neopravdano) as kunopr from izostanci_azuriranje where razred_id = '$rid'";
		  if(!$uizo=mysql_query($uizostanci)){echo "<br>Nastala je greška pri izvođenju upita!<br>".mysql_query();}
		  if($red=mysql_fetch_array($uizo))
		  	{
				$kuo=$red["kuopr"];
				$kuno=$red["kunopr"];
				$kuiz= $kuo + $kuno;
				if($kuo == null){$kuo=0;}
				if($kuno == null){$kuno=0;}
		  ?>
          <td align="center" bgcolor="#E8EAFF">            <strong><span class="style15">
            <?=$kuiz?>            
            </span></strong></td>
          <td align="center" bgcolor="#E8EAFF">            <strong><span class="style15">
            <?=$kuo?>            
            </span></strong></td>
          <td align="center" bgcolor="#E8EAFF">            <strong><span class="style15">
            <?=$kuno?>            
            </span></strong></td>
          <?
			}
			  $ucenici="select * from osobni_podaci_ucenika where razred_id = '$rid' order by rbr_ucenika asc";
		if(!$ucen=mysql_query($ucenici)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
		while($red=mysql_fetch_array($ucen))
		{
			$id=$red["opu_id"];
			$ocjene="select avg(uspjeh_na_kraju) as kraj from zavrsne_ocjene where opu_id = '$id'";
			if(!$oc=mysql_query($ocjene)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
			if($red=mysql_fetch_array($oc))
			{
				$kpros=$red["kraj"];
				$kuk_pros= $kuk_pros + $kpros;
				if($kpros != null){$kbr+=1;}
			}
		}
		if($kbr == null){$kuk_prosjek= "";}else{$kuk_prosjek= $kuk_pros/$kbr;}
			
			?>
          <td align="center" bgcolor="#E8EAFF" class="style15">
          <?
          echo round($kuk_prosjek,2);
		  ?>
          </td>
          <?
		  if ($kuk_prosjek < 1){$kusp= "&nbsp;";}
		  if ($kuk_prosjek >= 1 and $kuk_prosjek < 1.5) {$kusp= "nedovoljan (1)";}
		  if ($kuk_prosjek >= 1.5 and $kuk_prosjek < 2.5) {$kusp= "dovoljan (2)";}
		  if ($kuk_prosjek >= 2.5 and $kuk_prosjek < 3.5) {$kusp= "dobar (3)";}
		  if ($kuk_prosjek >= 3.5 and $kuk_prosjek < 4.5) {$kusp= "vrlo dobar (4)";}
		  if ($kuk_prosjek >= 4.5 and $kuk_prosjek <= 5) {$kusp= "odličan (5)";}
		  if ($kuk_prosjek > 5){$kusp= "&nbsp;";}
		  ?>
          <td align="center" bgcolor="#E8EAFF" class="style15"><?=$kusp?></td>
          <?
		  $jedinice="select count(uspjeh_na_kraju) as kjedan from zavrsne_ocjene where razred_id = '$rid' and uspjeh_na_kraju = '1'";
		  if(!$jedin=mysql_query($jedinice)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
		  if($red=mysql_fetch_array($jedin))
		  	{
				$kjed=$red["kjedan"];
		  ?>
          <td align="center" bgcolor="#E8EAFF" class="style15">
            <strong>
            <?=$kjed?>
            </strong></td>
          <?
			}
		  ?>
        </tr>
      </table>
      <br />
      <br />
Uspjeh po predmetima:
<br />
<br />
<table width="637" border="1" cellpadding="1" cellspacing="1" class="style13">
  <tr>
    <td width="150" align="center" bgcolor="#BEB4FC">Nastavni predmet</td>
    <td width="73" align="center" bgcolor="#BEB4FC">odličan (5)</td>
    <td width="75" align="center" bgcolor="#BEB4FC">vrlo dobar (4)</td>
    <td width="70" align="center" bgcolor="#BEB4FC">dobar (3)</td>
    <td width="74" align="center" bgcolor="#BEB4FC">dovoljan (2)</td>
    <td width="77" align="center" bgcolor="#BEB4FC">nedovoljan (1)</td>
    <td width="80" align="center" bgcolor="#BEB4FC">Srednja ocjena</td>
  </tr>
  <?
  $knaziv="select distinct predmet from predmeti where razred_id = '$rid' order by rb asc";
  if(!$knaz=mysql_query($knaziv)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
  while($red=mysql_fetch_array($knaz))
  {
	  $kpred=$red["predmet"];
	  $kpetica=0;
	  $kcetvorka=0;
	  $ktrojka=0;
	  $kdvojka=0;
	  $kjedinica=0;
  $kpredmeti="select * from predmeti where razred_id = '$rid' and predmet = '$kpred'";
  if(!$kpredm=mysql_query($kpredmeti)){echo "<br>Nastala je greška prilikom izvđenja upita!<br>".mysql_query();}
  while($red=mysql_fetch_array($kpredm))
  	{
		$kpred_id=$red["predmet_id"];
		$ocjene="select * from zavrsne_ocjene where predmet_id = '$kpred_id'";
		if(!$ocje=mysql_query($ocjene)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
		if($red=mysql_fetch_array($ocje))
			{
			$kocjena=$red["uspjeh_na_kraju"];
			if($kocjena == 5){$kpetica+=1; $kp+=1;}
			if($kocjena == 4){$kcetvorka+=1; $kc+=1;}
			if($kocjena == 3){$ktrojka+=1; $kt+=1;}
			if($kocjena == 2){$kdvojka+=1; $kdv+=1;}
			if($kocjena == 1){$kjedinica+=1; $kj+=1;}
			}
	}
  ?>
  <tr>
    <td align="left"><?=$kpred?></td>
    <td align="center"><?=$kpetica?></td>
    <td align="center"><?=$kcetvorka?></td>
    <td align="center"><?=$ktrojka?></td>
    <td align="center"><?=$kdvojka?></td>
    <td align="center"><?=$kjedinica?></td>
    <?
	if(($kpetica + $kcetvorka + $ktrojka + $kdvojka + $kjedinica) == 0){$ksr=0;}
	else{$ksr=($kpetica*5 + $kcetvorka*4 + $ktrojka*3 + $kdvojka*2 + $kjedinica*1)/($kpetica + $kcetvorka + $ktrojka + $kdvojka + $kjedinica);}
	?>
    <td align="center">
	<?
	echo round($ksr,2);
	?>
    </td>
  </tr>
  <?
	}
	if($kp < 1){$kp=0;}
	if($kc < 1){$kc=0;}
	if($kt < 1){$kt=0;}
	if($kdv < 1){$kdv=0;}
	if($kj < 1){$kj=0;}
  ?>
  <tr class="style15">
    <td align="center" bgcolor="#BEB4FC"><strong>Ukupno</strong></td>
    <td align="center" bgcolor="#E8EAFF"><strong>
      <?=$kp?>
    </strong></td>
    <td align="center" bgcolor="#E8EAFF"><strong>
      <?=$kc?>
    </strong></td>
    <td align="center" bgcolor="#E8EAFF"><strong>
      <?=$kt?>
    </strong></td>
    <td align="center" bgcolor="#E8EAFF"><strong>
      <?=$kdv?>
    </strong></td>
    <td align="center" bgcolor="#E8EAFF"><strong>
      <?=$kj?>
    </strong></td>
    <?
	if(($kp + $kc + $kt + $kdv + $kj) == 0){$kpr=0;}
	else{$kpr=($kp*5 + $kc*4 + $kt*3 + $kdv*2 + $kj*1)/($kp + $kc + $kt + $kdv + $kj);}
	?>
    <td align="center" bgcolor="#E8EAFF">
      <strong>
      <?
	echo round($kpr,2);
	?>
      </strong></td>
  </tr>
</table>
<br />
<br />
<?
$strXML = "<graph caption='Prosjek ocjena po predmetima' xAxisName='Predmet' yAxisName='Ocjena' decimalPrecision='2' formatNumberScale='0' yAxisMaxValue='5'>";

 $naziv="select distinct predmet from predmeti where razred_id = '$rid' order by rb asc";
  if(!$naz=mysql_query($naziv)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
  while($red=mysql_fetch_array($naz))
  {
	  $pred=$red["predmet"];
	  $petica=0;
	  $cetvorka=0;
	  $trojka=0;
	  $dvojka=0;
	  $jedinica=0;
  $predmeti="select * from predmeti where razred_id = '$rid' and predmet = '$pred'";
  if(!$predm=mysql_query($predmeti)){echo "<br>Nastala je greška prilikom izvđenja upita!<br>".mysql_query();}
  while($red=mysql_fetch_array($predm))
  	{
		$pred_id=$red["predmet_id"];
		$ocjene="select * from zavrsne_ocjene where predmet_id = '$pred_id'";
		if(!$ocje=mysql_query($ocjene)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
		if($red=mysql_fetch_array($ocje))
			{
			$ocjena=$red["uspjeh_na_kraju"];
			if($ocjena == 5){$petica+=1;}
			if($ocjena == 4){$cetvorka+=1;}
			if($ocjena == 3){$trojka+=1;}
			if($ocjena == 2){$dvojka+=1;}
			if($ocjena == 1){$jedinica+=1;}
			}
	}
	if(($petica + $cetvorka + $trojka + $dvojka + $jedinica) == 0){$sr=0;}
	else{$sr=($petica*5 + $cetvorka*4 + $trojka*3 + $dvojka*2 + $jedinica*1)/($petica + $cetvorka + $trojka + $dvojka + $jedinica);}
 $predm=substr($pred,0,3);
	$strXML .= "<set name='$predm' value='$sr' color='FF0000' />";
  }
	
	$strXML .=  "</graph>";
	
	
	echo renderChartHTML("FusionCharts/FCF_Line.swf", "", $strXML, "myNext", 400, 300);
?>
<br />
<br />
<table width="636" border="1" cellspacing="1" cellpadding="1">
  <tr align="center" class="style15">
    <td colspan="18" bgcolor="#BEB4FC" class="style15">USPJEH UČENIKA</td>
  </tr>
  <tr>
    <td colspan="8" align="center" bgcolor="#BEB4FC" class="style15">Pozitivan uspjeh</td>
    <td colspan="2" rowspan="2" align="center" bgcolor="#BEB4FC" class="style15">Uspje&scaron;ni ukupno</td>
    <td colspan="6" align="center" bgcolor="#BEB4FC" class="style15">Nedovoljan uspjeh</td>
    <td colspan="2" rowspan="2" align="center" bgcolor="#BEB4FC" class="style15">Ukupno nedovoljnih</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">odličnih</td>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">vrlo dobrih</td>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">dobrih </td>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">dovoljnih</td>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">1</td>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">2</td>
    <td colspan="2" align="center" bgcolor="#BEB4FC" class="style15">3 i &gt;</td>
  </tr>
  <tr class="style13">
    <td  align="center">br.</td>
    <td  align="center">%</td>
    <td  align="center">br.</td>
    <td  align="center">%</td>
    <td  align="center">br.</td>
    <td  align="center">%</td>
    <td  align="center">br.</td>
    <td  align="center">%</td>
    <td  align="center" bgcolor="#E8EAFF">br.</td>
    <td  align="center" bgcolor="#E8EAFF">%</td>
    <td  align="center">br.</td>
    <td  align="center">%</td>
    <td  align="center">br.</td>
    <td  align="center">%</td>
    <td align="center">br.</td>
    <td  align="center">%</td>
    <td  align="center" bgcolor="#E8EAFF">br.</td>
    <td  align="center" bgcolor="#E8EAFF">%</td>
  </tr>
  <tr class="style13">
  <?
  $pet=0;
  $cet=0;
  $tri=0;
  $dva=0;
  $jed=0;
  $jedan_kec=0;
  $dva_keca=0;
  $tri_keca=0;
  $br_uc=0;
  $ucenik="select * from osobni_podaci_ucenika where razred_id = '$rid'";
  if(!$raz=mysql_query($ucenik)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
  while($red=mysql_fetch_array($raz))
  {
	  $br_uc+=1;
	  $pid=$red["opu_id"];
	    $neuspjeh="select count(uspjeh_na_kraju) as neus_pol from zavrsne_ocjene where opu_id = '$pid' and uspjeh_na_kraju = '1'";
	  if(!$neusp=mysql_query($neuspjeh)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
	  if($red=mysql_fetch_array($neusp))
			{
				$jedinica=$red["neus_pol"];
				if($jedinica > 0)
				{
				$jed+=1;
				if($jedinica == 1){$jedan_kec+=1;}
				if($jedinica == 2){$dva_keca+=1;}
				if($jedinica > 2){$tri_keca+=1;}
				}
				else
		{
	  $uspjeh="select avg(uspjeh_na_kraju) as us_pol from zavrsne_ocjene where opu_id = '$pid'";
	  if(!$usp=mysql_query($uspjeh)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
	  if($red=mysql_fetch_array($usp))
	  	{
			$avg=$red["us_pol"];
			if($avg >= 4.5 and $avg <= 5){$pet+=1;}
			if($avg >= 3.5 and $avg < 4.5){$cet+=1;}
			if($avg >= 2.5 and $avg < 3.5){$tri+=1;}
			if($avg >= 1.5 and $avg < 2.5){$dva+=1;}
			}
		}
			}
	  }
	  $br_uspj=$pet + $cet + $tri + $dva;
	  $pet_posto=($pet/$br_uc)*100;
	  $cet_posto=($cet/$br_uc)*100;
	  $tri_posto=($tri/$br_uc)*100;
	  $dva_posto=($dva/$br_uc)*100;
	  $jed_posto=($jed/$br_uc)*100;
	  $jedan_kec_posto=($jedan_kec/$br_uc)*100;
	  $dva_keca_posto=($dva_keca/$br_uc)*100;
	  $tri_keca_posto=($tri_keca/$br_uc)*100;
	  $br_uspj_posto=($br_uspj/$br_uc)*100;
  ?>
    <td width="42" align="center"><?=$pet?></td>
    <td width="11" align="center"><?
    echo round($pet_posto, 2);
	?></td>
    <td width="36" align="center"><?=$cet?></td>
    <td width="32" align="center"><?
	echo round($cet_posto, 2);
    ?></td>
    <td width="37" align="center"><?=$tri?></td>
    <td width="9" align="center"><?
    echo round($tri_posto, 2);
	?></td>
    <td width="46" align="center"><?=$dva?></td>
    <td width="14" align="center"><?
    echo round($dva_posto, 2);
	?></td>
    <td width="48" align="center" bgcolor="#E8EAFF"><?=$br_uspj?></td>
    <td width="46" align="center" bgcolor="#E8EAFF"><?
    echo round($br_uspj_posto, 2);
	?></td>
    <td width="5" align="center"><?=$jedan_kec?></td>
    <td width="13" align="center"><?
    echo round($jedan_kec_posto,2);
	?></td>
    <td width="5" align="center"><?=$dva_keca?></td>
    <td width="26" align="center"><?
    echo round($dva_keca_posto,2);
	?></td>
    <td width="22" align="center"><?=$tri_keca?></td>
    <td width="30" align="center"><?
    echo round($tri_keca_posto,2);
	?></td>
    <td width="47" align="center" bgcolor="#E8EAFF"><?=$jed?></td>
    <td width="74" align="center" bgcolor="#E8EAFF"><?
    echo round($jed_posto, 2);
	?></td>
  </tr>
</table>
<br />
<br />
<?
if($pet == 0 and $cet == 0 and $tri == 0 and $dva == 0 and $jed == 0){}
else
{
$strXML = "<graph caption='Uspjeh učenika' xAxisName='' yAxisName='' decimalPrecision='0' formatNumberScale='1'>";
	$strXML .= "<set name='Odličnih' value='$pet' color='AFD8F8' />";
	$strXML .= "<set name='Vrlo dobrih' value='$cet' color='F6BD0F' />";
	$strXML .= "<set name='Dobrih' value='$tri' color='8BBA00' />";
	$strXML .= "<set name='Dovoljnih' value='$dva' color='FF8E46'/>";
	$strXML .= "<set name='Nedovoljnih' value='$jed' color='008E8E'/>";
	$strXML .=  "</graph>";
	
	
	echo renderChartHTML("FusionCharts/FCF_Column3D.swf", "", $strXML, "myNext", 400, 300);
}
	?>
<br />
<br />
<table width="340" border="1" cellspacing="1" cellpadding="1">
  <tr class="style15">
    <td width="80" rowspan="2" align="center" bgcolor="#BEB4FC">čl. 58</td>
    <td colspan="3" rowspan="2" align="center" bgcolor="#BEB4FC">Broj učenika</td>
  </tr>
  <tr></tr>
  <?
  $clanak="select count(cl58) as cl58 from clanak58 where razred_id = '$rid'";
  if(!$clan=mysql_query($clanak)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
  if($red=mysql_fetch_array($clan))
  {
	  $cl=$red["cl58"];
	  }
  ?>
  <tr>
    <td rowspan="2" align="center" bgcolor="#E8EAFF" class="style13"><?=$cl?></td>
    <td align="center" bgcolor="#BEB4FC" class="style15">M</td>
    <td align="center" bgcolor="#BEB4FC" class="style15">Ž</td>
    <td align="center" bgcolor="#BEB4FC" class="style15">Ukupno</td>
  </tr>
  <tr>
  <?
  $ukupno="select count(spol_ucenika) as m from osobni_podaci_ucenika where razred_id = '$rid' and spol_ucenika = 'M'";
  if(!$ukup=mysql_query($ukupno)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
  if($red=mysql_fetch_array($ukup))
  {
	  $muski=$red["m"];
	  }
 $zukupno="select count(spol_ucenika) as z from osobni_podaci_ucenika where razred_id = '$rid' and spol_ucenika = 'Ž'";
  if(!$zukup=mysql_query($zukupno)){echo "<br>Nastala je greška prilikom izvođenja upita!<br>".mysql_query();}
  if($red=mysql_fetch_array($zukup))
  {
	  $zenski=$red["z"];
	  }
	  $ukupno_ucenika= $muski + $zenski;
  ?>
    <td align="center" class="style13">
      <?=$muski?>
    </td>
    <td align="center" class="style13">
      <?=$zenski?>
    </td>
    <td align="center" class="style13">
      <?=$ukupno_ucenika?>
    </td>
  </tr>
</table>
<br />
<br />
<br />
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