<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
	$_PATH_UPLOAD = "uploads/";
	$_PATH_UPLOAD_FOR_VIEW = "uploads/";
	$_IMAGES = array();
	if($_FILES) {
		$fileName = "uploaded-file-".time()."-".rand().".".pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION); // The file name
		$fileTmpLoc = $_FILES["file"]["tmp_name"];
		$fileType = $_FILES["file"]["type"];
		$fileSize = $_FILES["file"]["size"];
		$fileErrorMsg = $_FILES["file"]["error"];
		
		if (!$fileTmpLoc) {
			die("error");
		}
		if(move_uploaded_file($fileTmpLoc, $_PATH_UPLOAD."$fileName")) {
			$_IMAGES["link"] = "http://localhost/jkrowling/".$_PATH_UPLOAD_FOR_VIEW.$fileName;
			$_IMAGES["name"] = $_FILES["file"]["name"];
			die(json_encode($_IMAGES));
		} else  {
			die("failed");
		}
	}
?>