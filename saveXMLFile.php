<?php
//error_reporting(E_ALL);
//var_dump($_SERVER);
 include ("conn.php");


session_start();
$post_data = $_POST['data'];
$filename= $_POST['filename'];
$nfilename= $_POST['filename'];
 
 
if (!empty($post_data)) {
    $dir = 'uploadfiles';
    // $file= explode('.',$sFileVal[1]);
    $filename = pathinfo(basename($filename), PATHINFO_FILENAME);

    $extension= pathinfo(basename($nfilename), PATHINFO_EXTENSION);

    $nfile=$filename.".xml";
    

     $sXML=strtoupper( $post_data);
    $A1= strpos($sXML,"<IMG");

   	if ($A1!==false){
   		$Image="Yes"; 		

   	}
   	else{
   		   $Image="No"; 
		 
   	}

   	$A1= strpos($sXML,"<TABLE");

   	if ($A1!==false){
   		$Table="Yes";
   		
   	}
   	else{
   		$Table="No"; 
		  		
   	}

    file_put_contents($dir."/".$nfile, $post_data);


    $sql="Select * from PRIMO_Integration WHERE Filename='".$nfilename."'";
    $rs=odbc_exec($conWMS,$sql);
	$ctr = odbc_num_rows($rs);
	while(odbc_fetch_row($rs))
	{
		$RequestID=odbc_result($rs,"RequestID");
		$Requestor=odbc_result($rs,"Requestor");
		$collabkey=odbc_result($rs,"collabkey");
		$courtname=odbc_result($rs,"courtname");
		$filenamePath=odbc_result($rs,"filenamePath");
	}
	$filenamePath = str_replace(".Request", ".Response", $filenamePath);

	$jaXML = str_replace(".request", '', $filename);
	$jaXML = $jaXML.".".$extension.".response_ja.xml";


	file_put_contents($dir."/Completed/".$jaXML, $post_data);

	$metadataXML = str_replace(".request", '', $filename);
	$metadataXML = $metadataXML.".".$extension.".response.metadata.xml";

	$sMetadata='<?xml version="1.0" encoding="UTF-8"?><response id="'.$RequestID.'"><collaboration.key id="'.$collabkey.'"/><court.name>'.$courtname.'</court.name><info><file.info><file name="'.$jaXML.'" path="'.$filenamePath.'"/><file name="'.$metadataXML.'" path="'.$filenamePath.'"/></file.info><metadata><image.present>'.$Image.'</image.present><table.present>'.$Table.'</table.present></metadata></info></response>';
	
	file_put_contents($dir."/Completed/".$metadataXML, $sMetadata);


    echo "File successfully saved.";

}
?>