<?php

GLOBAL $conSearchnet,$conWMS;
$Endpoint = "https://52.220.114.60/WMS.Services/WMS.Services.asmx";
$Mode="SQLDirect"; //API/SQLDirect

$GGUserName = 'hj1@innodata.com';
$GGPassword='test@1qaz';
$GGProductionMode='OFF';//ON or OFF
$GGTaxonomy = "legal-cases-taxonomy.json";
$GGTeam="Legal Cases";

$SourceFilePath = "C:\\XAMPP\\htdocs\\primo\\uploadfiles\\SourceFiles\\";

$WorkflowID=2;

$mySQLServer="localhost";
$mySQLUsername="root";
$mySQLPassword ="";
$mySQLDbase="primo";


$WMSDSN="WMSprimo";
$WMSUsername="admin";
$WMSPassword="admin12345";

$SearchnetDSN="SearchnetIdeagen";
$SearchnetUsername="adminsearchnet";
$SearchnetPword="admin12345";

 
if ($GGProductionMode=='ON'){
	$TokenVAL ='dXNlci1saXZlLTA3OTZjYmNlYWVkODZkOGE1ZDAzYTM0MjMwNjQwYzY0YTMwNzZiZWE6';
}
else{
	//$TokenVAL ='dXNlci10ZXN0LWFjZWMzNWQ1OWM1OGUyMGEyMDU3NGEzYmJlMTg3ZTBhODhkOWUwN2Q6';	
	$TokenVAL = 'dXNlci10ZXN0LWFjZWMzNWQ1OWM1OGUyMGEyMDU3NGEzYmJlMTg3ZTBhODhkOWUwN2Q6';
}


?>