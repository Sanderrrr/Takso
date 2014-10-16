<?php
	require_once("functions.php");
	
	//lisame andmebaasi
	if(isSet($_REQUEST["algus"], $_REQUEST["siht"])){
	
		addMessage($_REQUEST["algus"], $_REQUEST["siht"]);
		//header("location: klient.php");

	}elseif(isSet($_REQUEST["delete"])){
	
		//kustutame andmebaasis
		deleteMessage($_REQUEST["delete"]);
		header("location: taxi.php");
	
	
	}elseif(isSet($_REQUEST["update_id"])){
	
		updateMessage($_REQUEST["update_id"], $_REQUEST["update_kinnitus"], $_REQUEST["update_algusaeg"], $_REQUEST["update_sihtaeg"], $_REQUEST["update_labitud"], $_REQUEST["update_makstud"], $_REQUEST["update_raha"]);
	}

	$messages = getAllMessages();

?>

<html>
	<head>
		<title>Taxi</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>
		<table>
			<tr>
				<?php
					// loome päisetulbad
					foreach($columns as $c){
						echo "<th>$c</th>";
					}
				
				?>
				<th>Delete</th>
				<th>Edit(=>)</th>
			</tr>

				<?php

					// $messages
					// foreach
					// ->
					
					foreach($messages as $m){
					
						if(isSet($_REQUEST["edit"]) AND $_REQUEST["edit"] == $m->id){
						
						echo "
								<form action='taxi.php'>
								<input hidden=hidden name='update_id' value='$m->id' >
									<tr>
										<td>$m->id</td>
										<td>$m->aeg</td>
										<td>$m->algus</td>
										<td>$m->siht</td>
										<td><input type='text' name='update_kinnitus' value='$m->kinnitus'></td>
										<td><input type='text' name='update_algusaeg' value='$m->algusaeg'></td>
										<td><input type='text' name='update_sihtaeg' value='$m->sihtaeg'></td>
										<td><input type='text' name='update_labitud' value='$m->labitud'></td>
										<td><input type='text' name='update_makstud' value='$m->makstud'></td>
										<td><input type='text' name='update_raha' value='$m->raha'></td>
										<td><input type='submit' value='Save'></td>
										<td>
											<a href='taxi.php'>
												<input type='button' value='Cancel'>
											</a>
										</td>
									</tr>
								</form>
							 ";
						
						}else{

							echo "
								<tr>
									<td>$m->id</td>
									<td>$m->aeg</td>
									<td>$m->algus</td>
									<td>$m->siht</td>
									<td>$m->kinnitus</td>
									<td>$m->algusaeg</td>
									<td>$m->sihtaeg</td>
									<td>$m->labitud</td>
									<td>$m->makstud</td>
									<td>$m->raha</td>
									<td><a href='?delete=$m->id'>Delete</a></td>
									<td><a href='edit.php?id=$m->id'>=></a></td>
								</tr>
							";
						
						}
					}

					
				?>
		</table>

	</body>
</html>