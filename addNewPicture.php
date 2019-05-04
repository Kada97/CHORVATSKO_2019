<?php

    include "_connectDB.php";
    
    if (isset($_POST['addNewPic'])) {
	
	$image_text		= null;
	$picrights		= null;
	$userTo			= null;
	
	foreach ($_POST as $key => $value) {
	    switch ($key) {
		case 'image_text':	$image_text				= $value; 
					$_SESSION['image_text']			= $value;   break;

		case 'picrights':       $picrights                              = $value; 
					$_SESSION['picrights']			= $value;   break;
				    
		case 'chooseUserTo':	$userTo					= $value; 
					$_SESSION['userTo']			= $value;   break;
	    }
	}
	
	$text = mysqli_real_escape_string($conn,$image_text);
	if($userTo == null){
	    $userTo = "nobody";
	}
	$us = $_SESSION["username"];
	if(!isset($_SESSION["username"])){
	    $us = "ADMIN";
	}
	
	// Valid file extensions
	$extensions_arr = array("jpg","jpeg","png","gif","bmp");
	
	$target_dir_public  = "C:/xampp/htdocs/CHORVATSKO2018/upload/public/";
	$target_dir_private = "C:/xampp/htdocs/CHORVATSKO2018/upload/private/";
	$target_dir_other   = "C:/xampp/htdocs/CHORVATSKO2018/upload/other/";
	$sql = '';
	
	function reArrayFiles($file){
	    $file_ary = array();
	    $file_count = count($file['name']);
	    $file_key = array_keys($file);

	    for($i=0;$i<$file_count;$i++)
	    {
		foreach($file_key as $val)
		{
		    $file_ary[$i][$val] = $file[$val][$i];
		}
	    }
	    return $file_ary;
	}
	
	$img = $_FILES['file'];
	$target_dir = '';
	if(!empty($img)){
	    $img_desc = reArrayFiles($img);
	    
	    foreach($img_desc as $val){
		
	    $numrows = null;
	    switch($picrights){
		case 'all'	    :	$numrows = mysqli_query($conn, "SELECT id FROM photo_forall;");
					$target_dir = $target_dir_public;
					break;
		case 'user'	    :	$numrows = mysqli_query($conn, "SELECT id FROM photo_forusers;");
					$target_dir = $target_dir_private;
					break;
		case 'other'	    :	$numrows = mysqli_query($conn, "SELECT id FROM pictures;");
					$target_dir = $target_dir_other;
					break;
		default		    :	$numrows = mysqli_query($conn, "SELECT id FROM pictures;");
					$target_dir = $target_dir_other;
	    }
	    $tmp = '';
	    $tmp .= $val["type"];
	    $path_parts = pathinfo($tmp);
	    $ext = $path_parts['filename'];
	    if(in_array($ext,$extensions_arr) ){
		
		$nr = mysqli_num_rows($numrows)+1;
		$name = $nr."-".time().".".$ext;
		
		switch($picrights){
		    case 'all'	    :	$sql = "INSERT INTO photo_forall(photo,username,comment) VALUES('".$name."','".$us."','".$text."')";
					break;
		    case 'user'	    :	$sql = "INSERT INTO photo_forusers (photo,username,forwho,comment) VALUES('".$name."','".$us."','".$userTo."','".$text."')";
					break;
		    case 'other'    :	$sql = "INSERT INTO pictures (picture,text) VALUES('".$name."','".$text."')";
					break;
		    default	    :	$sql = "INSERT INTO pictures (picture,text) VALUES('".$name."','".$text."')";
		}
		mysqli_query($conn,$sql);
		move_uploaded_file($val['tmp_name'],$target_dir.'/'.$name);
	    }
	    }
	}
	
	
	
	
	
	/*$newimg			= null;
	$image_text		= null;
	$picrights		= null;

	foreach ($_POST as $key => $value) {
	    switch ($key) {
		case 'file':		$newimg					= $value; 
					$_SESSION['newimg']			= $value;   break;

		case 'image_text':	$image_text				= $value; 
					$_SESSION['image_text']			= $value;   break;

		case 'picrights':       $picrights                              = $value; 
					$_SESSION['picrights']			= $value;   break;
	    }
	}
	$text = mysqli_real_escape_string($conn,$image_text);
	$name = $_FILES['file']['name'];
	$userTo = "nobody";
	$us = $_SESSION["username"];
	
	// Valid file extensions
	$extensions_arr = array("jpg","jpeg","png","gif","bmp");
	
	$target_dir_public  = "C:/xampp/htdocs/CHORVATSKO2018/upload/public/";
	$target_dir_private = "C:/xampp/htdocs/CHORVATSKO2018/upload/private/";
	$target_dir_other   = "C:/xampp/htdocs/CHORVATSKO2018/upload/other/";
	$target_file = '';
	$sql = '';
	
	$right = 0;
	switch($picrights){
	    case 'all'	    :	$right = 0;
				$target_file = $target_dir_public;
				break;
	    case 'user'	    :	$right = 1;
				$target_file = $target_dir_private;
				break;
	    case 'other'    :	$right = 2;
				$target_file = $target_dir_other;
				break;
	    default	    :	$right = 2;
				$target_file = $target_dir_other;
	}
	$target_dir = $target_file;
	$target_file .= basename($_FILES["file"]["name"]);
	
	// Select file type
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	// Check extension
	if(in_array($imageFileType,$extensions_arr) ){
	$filename = $target_dir.'/'.$name;
	$tempfilename = $filename;
	$iterator = 0;


//	while(file_exists($tempfilename)){
//	    $tmp = '';
//	    $tmp .= $iterator;
//	    $tempfilename = $filename."(".$tmp.")";
//	    $iterator++;
//	}
//	if($iterator != 0){
//	    $path_parts = pathinfo($name);
//	    $fln = $path_parts['filename'];
//	    $ext = $path_parts['extension'];
//	    //$tmp = '';
//	    //$tmp .= ''.$iterator;
//	    $name = $fln."(".$iterator.").".$ext;
//	}
	$numrows = null;
	switch($picrights){
	    case 'all'	    :	$numrows = mysqli_query($conn, "SELECT id FROM photo_forall;");
				break;
	    case 'user'	    :	$numrows = mysqli_query($conn, "SELECT id FROM photo_forusers;");
				break;
	    case 'other'    :	$numrows = mysqli_query($conn, "SELECT id FROM pictures");
				break;
	    default	    :	$numrows = mysqli_query($conn, "SELECT id FROM pictures");
	}
	
	$nr = mysqli_num_rows($numrows)+1;
	    $path_parts = pathinfo($name);
	    $ext = $path_parts['extension'];
	    $name = $nr."-".time().".".$ext;
	
	
	
	
	
	
	
	
	switch($picrights){
	    case 'all'	    :	$sql = "INSERT INTO photo_forall(photo,username,comment) VALUES('".$name."','".$us."','".$text."')";
				break;
	    case 'user'	    :	$sql = "INSERT INTO photo_forusers (photo,username,forwho,comment) VALUES('".$name."','".$us."','".$userTo."','".$text."')";
				break;
	    case 'other'    :	$sql = "INSERT INTO pictures (picture,text) VALUES('".$name."','".$text."')";
				break;
	    default	    :	$sql = "INSERT INTO pictures (picture,text) VALUES('".$name."','".$text."')";
	}
	

	// Insert record
	mysqli_query($conn,$sql);
	// Upload file
	move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.'/'.$name);
	}*/
    }
    
	/*if (isset($_POST['addNewPic'])) {
	    
	    $newimg		= null;
	    $image_text		= null;
	    $picrights		= null;
	    
	    
	    foreach ($_POST as $key => $value) {
		switch ($key) {
		    case 'newimg':	    $newimg					= $value; 
					    $_SESSION['newimg']				= $value;   break;

		    case 'image_text':	    $image_text					= $value; 
					    $_SESSION['image_text']			= $value;   break;

		    case 'picrights':       $picrights					= $value; 
					    $_SESSION['picrights']			= $value;   break;
		}
	    }
		
		$text = mysqli_real_escape_string($conn,$image_text);
		$imagetmp = addslashes(file_get_contents($_FILES['newimg']['tmp_name']));
		$right = 0;
		
		switch($picrights){
		    case 'all'	    : $right = 0;break;
		    case 'user'	    : $right = 1;break;
		    case 'other'    : $right = 2;break;
		    default	    : $right = 2;
		}
		$sql = "";
		$us = $_SESSION["username"];
		$userTo = "nobody";
		if($right == 0){
		    $sql = "INSERT INTO photo_forall (photo,username,comment) VALUES('$imagetmp','$us','$text')";
		}
		if($right == 1){
		    $sql = "INSERT INTO photo_forusers (photo,username,forwho,comment) VALUES('$imagetmp','$us','$userTo','$text')";
		}

		mysqli_query($conn,$sql);
	
	}*/