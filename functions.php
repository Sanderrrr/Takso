<?php

	$columns = array("id","aeg","algus", "siht", "kinnitus", "algusaeg", "sihtaeg", "labitud", "makstud", "raha");
	$mysqli = new mysqli("localhost", "if14", "ifikas2014", "if14_sanderp");
	
	
	function addMessage($algus,$siht){
	
		//echo "<h1>$kinnitus / $algusaeg </h1>";
		global $mysqli;
		
		$stmt = $mysqli->prepare("INSERT INTO takso (aeg, algus, siht) VALUES (NOW(), ?, ?)");
		$stmt->bind_param("ss", $algus, $siht);
		$stmt->execute();
	
	
	
	}
	
		function getAllMessages(){
	
	
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT id, aeg, algus, siht, kinnitus, algusaeg, sihtaeg, labitud, makstud, raha FROM takso");
		$stmt->bind_result($id, $aeg, $algus, $siht, $kinnitus, $algusaeg, $sihtaeg, $labitud, $makstud, $raha);
		$stmt->execute();
		
		$messages = array();
		
		while($stmt->fetch()){
		
			$message = new StdClass;
			$message->id = $id;
			$message->aeg = $aeg;
			$message->algus= $algus;
			$message->siht = $siht;
			$message->kinnitus = $kinnitus;
			$message->algusaeg = $algusaeg;
			$message->sihtaeg = $sihtaeg;
			$message->labitud = $labitud;
			$message->makstud = $makstud;
			$message->raha = $raha;
			
			//lisan array-sse
			array_push($messages, $message);
		
		}
		 
		return $messages;
	
	}

		function updateMessage($id, $kinnitus, $algusaeg, $sihtaeg, $labitud, $makstud, $raha){
	
		global $mysqli;
		$stmt= $mysqli->prepare("UPDATE takso SET kinnitus=?, algusaeg=?, sihtaeg=?, labitud=?, makstud=?, raha=? WHERE id=?");
		$stmt->bind_param("ssssssi", $kinnitus, $algusaeg, $sihtaeg, $labitud, $makstud, $raha, $id);
		$stmt->execute();
		
	
	}

		function deleteMessage($delete_id){
	
		global $mysqli;
		
		$stmt = $mysqli->prepare("DELETE FROM takso WHERE id=?");
		$stmt->bind_param("i", $delete_id);
		$stmt->execute();
	
	}

	function getSinglemessage($get_id){
	
	
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT id, aeg, algus, siht, kinnitus, algusaeg, sihtaeg, labitud, makstud, raha FROM takso WHERE id=?");
		$stmt->bind_param("i", $get_id);
		$stmt->bind_result($id, $aeg, $algus, $siht, $kinnitus, $algusaeg, $sihtaeg, $labitud, $makstud, $raha);
		$stmt->execute();
		
		while($stmt->fetch()){
		
			$message = new StdClass;
			$message->id = $id;
			$message->aeg = $aeg;
			$message->algus = $algus;
			$message->siht = $siht;
			$message->kinnitus = $kinnitus;
			$message->algusaeg = $algusaeg;
			$message->sihtaeg = $sihtaeg;
			$message->labitud = $labitud;
			$message->makstud = $makstud;
			$message->raha = $raha;
			
			return $message;
		
		}
		 
	
	}
?>