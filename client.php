<?php
	require_once("functions.php");
	
	//lisame andmebaasi
	if(isSet($_REQUEST["algus"], $_REQUEST["siht"])){
	
		addMessage($_REQUEST["algus"], $_REQUEST["siht"]);
		//header("location: klient.php");

	}



	
?>

<html>
	<head>
		<title>Kliendileht</title>
		<link rel="stylesheet" type="text/css" href="stylesheet2.css">
	</head>
	<body>
		<h1>Kliendileht</h1>
		<form action="client.php" method="get">
			<input type="text" name="algus">
			<input type="text" name="siht">
			<input type="submit" value="submit">
		</form>	

		<?php
			if(isSet($_REQUEST["algus"], $_REQUEST["siht"])){

				$algus = $_REQUEST["algus"];
				$siht = $_REQUEST["siht"];

				if($algus == "" ){
					echo "Kirjuta algus- ja sihtpunkt";
				}else{
					//on tühi siis trükime välja
					echo "Alguspunkt: ".$algus.", Sihtpunt: ".$siht."";
				}
			}else{
				echo "Kirjuta algus- ja sihtpunkt";
			}
		?>

	</body>
</html>