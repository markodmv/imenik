<?
if (!$db = @mysql_connect("localhost", "root", "aurora"))
{
die ("<b>Nismo se mogli spojiti na MySQL server!</b>");
}
if (!mysql_select_db("skolski_imenik", $db))
{
die ("<b>Greska pri odabiru baze</b>");
}
?> 
