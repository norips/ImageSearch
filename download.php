<?php
	//download a file using downloadFile(url of file,output name of file, save path)
	function downloadFile ($url, $name, $path) {
		file_put_contents($path.$name.".".pathinfo(parse_url($url,PHP_URL_PATH), PATHINFO_EXTENSION), fopen($url, 'r'));
	}
	
	
	
	//Make Zip using  makeZip(name of the zip file, chemin vers le dossier contenant les fichiers
	//Add in a zip file, all files in $path
	function makeZip($name,$path) {
		$array = NULL;
		$zip = new ZipArchive();
		$filename = $name.".zip";
		
		if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
			exit("Impossible d'ouvrir le fichier <$filename>\n");
		}
		if ($handle = opendir($path)) {
			
			/* Ceci est la façon correcte de traverser un dossier. */
			while (false !== ($array[] = readdir($handle))){}
			closedir($handle);
		}
		foreach($array as $file){
			if ($file != '.' && $file != '..' && ($file != '' || $file != NULL)){
				$zip->addFile($path.$file,$file);
			}
		}
		$zip->close();
	}
	
	function MakeQuery($query,$service,$tempDir){
		
		
		$optParams = array('searchType' => 'image','cx' => '012096867238563156731:gbb7afwwuo4');
		$results = $service->cse->listCSE($query, $optParams);
		downloadFile($results[0]->link,$query,"./save/".$tempDir);
	}	
	
function delTree($dir) { 
   $files = array_diff(scandir($dir), array('.','..')); 
    foreach ($files as $file) { 
      (is_dir("$dir/$file") && !is_link($dir)) ? delTree("$dir/$file") : unlink("$dir/$file"); 
    } 
    return rmdir($dir); 
  } 
