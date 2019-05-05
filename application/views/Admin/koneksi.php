<?php
$db = "(DESCRIPTION=(ADDRESS_LIST = ( ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID = Azhr)))";

if($c = OCILogon('ITSFOOD', 'ASUS',$db))
{
	echo "Successfully connected to Oracle. \n";
}
else
{
	$err = OCIError();
	echo "Can't Connect to Oracle";
}

$array = oci_parse($c, "SELECT * FROM MAKANAN");

oci_execute($array);

while($row=oci_fetch_array($array))

{
echo "<br>". $row[0]." -- ".$row[1] ."<br>";
}


OCILogoff($c);
?>
