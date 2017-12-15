<?php
	$codeTable = array();
	$codeTable['TTL'] = "title.html"; $codeTable['INF'] = "info.html"; $codeTable['PRE'] = "pref.html"; $codeTable['HFT'] = "hftest.html"; $codeTable['EXT'] = "extra.html"; $codeTable['APX'] = "appendix.html"; $codeTable['CTC'] = "contact.html"; $codeTable['LS1'] = "lesson1.html"; $codeTable['LS2'] = "lesson2.html"; $codeTable['LS3'] = "lesson3.html"; $codeTable['LS4'] = "lesson4.html"; $codeTable['LS5'] = "lesson5.html"; $codeTable['LS6'] = "lesson6.html"; $codeTable['LS7'] = "lesson7.html"; $codeTable['LS8'] = "lesson8.html"; $codeTable['LS9'] = "lesson9.html"; 

	$response = new \stdClass();
	$response->data = "";
	$response->error = true;

	if(!isset($_POST["page"])) {
		$response->code = 1;
	}
	else if (strlen($_POST["page"]) != 3) {
		$response->code = 2;
	}
	else if(!array_key_exists($_POST["page"], $codeTable)) {
		$response->code = 3;
	}
	else {
		$response->error = false;
		$response->code = 0;
		$response->data = file_get_contents("page/".$codeTable[$_POST["page"]]);
	}

	echo json_encode($response);
?>