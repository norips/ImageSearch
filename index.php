<?php
	include('init.php');
	require_once('download.php')
?>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	
	<body>
	
	<div align="center">
	<H1> Bienvenue sur le crawler d'image google </H1>
		<FORM METHOD="POST">
			<p>Veuillez entrer vos requetes (séparer les requetes par des virgules (,) ) :</p>
			<textarea rows="10" cols="20" name="textareaQuery"></textarea>
			<INPUT type="submit" value="Envoyer">
		</FORM>	
		<?php
			if (isset($_POST['textareaQuery']))
			{
				if ($_POST['textareaQuery'] != ""){
					$SingleQuery = explode(',',$_POST['textareaQuery']);
					$tempDir = rand();
					mkdir("./save/".$tempDir."/");
					foreach ($SingleQuery as $line)
					{
						MakeQuery($line,$service,$tempDir."/");
					}
					makeZip($tempDir,"./save/".$tempDir."/");
					echo '<a href='.$tempDir.'.zip>'.'Cliquez ici pour télécharger le resultat'.'</a>';
					delTree("./save/".$tempDir."/");
				}
			}	
			
			
		?>
		</div>
	</body>
</html>