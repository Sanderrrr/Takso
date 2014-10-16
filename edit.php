<?php
	require_once("functions.php");
	
	if(isSet($_REQUEST["id"])){
	
		echo "<h2>".$_REQUEST["id"]."</h2>";
		
		$message = getSinglemessage($_REQUEST["id"]);
		
	?>
	<html>
		<head>
			<title>Edit</title>
			<link rel="stylesheet" type="text/css" href="stylesheet2.css">
		</head>
		<body>
			<a href="taxi.php">Return</a>
			<br>
			<br>
			<b>Aeg:</b><br><?php echo "$message->aeg" ?><br>
			<b>Algus</b><br><?php echo "$message->algus" ?><br>
			<b>Siht</b><br><?php echo "$message->siht" ?><br>
			<form action="taxi.php">
				<input hidden=hidden type="text" name="update_id" value="<?php echo $message->id; ?>"><br>
				<b>Kinnitus:</b> <br>
					<select name='update_kinnitus' >
						<?php
							if($message->kinnitus == 1){
								echo "	<option selected='selected' value='1'>Jah</option>
										<option value='0'>Ei</option>";
							}else{
								echo "	<option value='1'>Jah</option>
										<option selected='selected' value='0'>Ei</option>";
							}
						?>
					</select>
				<br>
				<b>Algusaeg:</b> <br><input type="text" name="update_algusaeg" value="<?php echo $message->algusaeg; ?>"><br>
				<b>Sihtaeg:</b> <br><input type="text" name="update_sihtaeg" value="<?php echo $message->sihtaeg; ?>"><br>
				<b>Läbitud:</b> <br><input type="text" name="update_labitud" value="<?php echo $message->labitud; ?>"><br>
				<b>Makstud:</b> <br><input type="text" name="update_makstud" value="<?php echo $message->makstud; ?>"><br>
				<b>Raha:</b> <br>
					<select name='update_raha' >
						<?php
							if($message->raha == sularaha){
								echo "	<option selected='selected' value='sularaha'>sularaha</option>
										<option value='pangakaart'>pangakaart</option>";
							}else{
								echo "	<option value='sularaha'>sularaha</option>
										<option selected='selected' value='pangakaart'>pangakaart</option>";
							}
						?>
					</select>
				<br>
				<input type="submit" value="Add">
			</form>
		</body>
	</html>
	<?php
	
	}else{
		header("location: taxi.php");
	}
?>