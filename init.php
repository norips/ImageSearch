<?php
	set_include_path("./googleapi/src/");
	require_once 'Google/Client.php'; 
	require_once 'Google/Service/Customsearch.php';	
	
	$client = new Google_Client();
	$client->setApplicationName("Client_Image_Examples");
	$apiKey = "AIzaSyAHEknHjbx8u1xDYovFPkh91yY12u5fmBE";
	if ($apiKey == '<YOUR_API_KEY>') {
		echo missingApiKeyWarning();
	}
	$client->setDeveloperKey($apiKey);
	
	$service = new Google_Service_Customsearch($client);
?>
