<?php

GLOBAL $conSearchnet,$conWMS;
$Endpoint = "https://52.220.114.60/WMS.Services/WMS.Services.asmx";
$Mode="SQLDirect"; //API/SQLDirect

$GGUserName = 'hj1@innodata.com';
$GGPassword='test@1qaz';
$GGProductionMode='OFF';//ON or OFF;
$GGTaxonomyZoning = "legal-bu-zoning-taxonomy-test-v2.json";
$GGTaxonomyMapping = "legal-bu-taxonomy-test-v2.json";
//job type: data-point-extraction or doc2xml
$GGJobType = "data-point-extraction";
$GGTeam="TPCCR";


$SourceFilePath = "C:\\XAMPP\\htdocs\\primoTPCCR\\uploadfiles\\SourceFiles\\";

$WorkflowID=2;

$mySQLServer="localhost";
$mySQLUsername="root";
$mySQLPassword ="";
$mySQLDbase="primo";


$WMSDSN="WMSprimo";
$WMSUsername="oos";
$WMSPassword="it-oos";

$SearchnetDSN="SearchnetIdeagen";
$SearchnetUsername="oos";
$SearchnetPword="it-oos";

 
if ($GGProductionMode=='ON'){
	$TokenVAL ='dXNlci1saXZlLTA3OTZjYmNlYWVkODZkOGE1ZDAzYTM0MjMwNjQwYzY0YTMwNzZiZWE6';
}
else{
	//$TokenVAL ='dXNlci10ZXN0LWFjZWMzNWQ1OWM1OGUyMGEyMDU3NGEzYmJlMTg3ZTBhODhkOWUwN2Q6';	
	$TokenVAL = 'dXNlci10ZXN0LTUzY2FkNzZmYzIzOGUzNTgwNWU5NjgzY2YxNDFlNTE4ZjliZWUzMTA6';
}


?>