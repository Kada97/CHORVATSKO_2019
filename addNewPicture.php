<?php
    include '_connectDB.php';
    
    if (isset($_POST['addNewPic'])) {
        
        $_SESSION['numbUploadedPictures'] = 0;
	
	$image_text		= null;
	$picrights		= null;
	$userTo			= null;
        $purposeTo              = null;
	
	foreach ($_POST as $key => $value) {
	    switch ($key) {
		case 'image_text':	$image_text				= $value; 
					$_SESSION['image_text']			= $value;   break;

		case 'picrights':       $picrights                              = $value; 
					$_SESSION['picrights']			= $value;   break;
				    
		case 'chooseUserTo':	$userTo					= $value; 
					$_SESSION['chooseUserTo']               = $value;   break;
                                    
		case 'choosePurposeTo':	$purposeTo				= $value;   break;
	    }
	}
        
        if ($picrights == 'other' && $purposeTo == 'msg'){
            $_SESSION['error_msg'] = 'Je potřeba vybrat soutěž, pro kterou je obrázek posílán.';
        }
	
        if ($_SESSION['error_msg'] == '') {
            $text = mysqli_real_escape_string($conn,$image_text);
            if($userTo == null){
                $userTo = 'nobody';
            }
            $us = $_SESSION['username'];
            if(!isset($_SESSION['username'])){
                $us = 'ADMIN';
            }

            // Valid file extensions
            $extensions_arr = array('jpg','jpeg','png','gif','bmp');

            $target_dir_public  = 'C:/xampp/htdocs/CHORVATSKO_2019/upload/public/';
            $target_dir_private = 'C:/xampp/htdocs/CHORVATSKO_2019/upload/private/';
            $target_dir_other   = 'C:/xampp/htdocs/CHORVATSKO_2019/upload/other/';
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

                $totalPicturesNumber = 0;
                foreach($img_desc as $val){
                $totalPicturesNumber++;

                $numrows = null;
                switch($picrights){
                    case 'all'	    :	$numrows = mysqli_query($conn, "SELECT id FROM photo_forall;");
                                            $target_dir = $target_dir_public;
                                            break;
                    case 'user'	    :	$numrows = mysqli_query($conn, "SELECT id FROM photo_forusers;");
                                            $target_dir = $target_dir_private;
                                            break;
                    case 'other'	    :	$numrows = mysqli_query($conn, "SELECT id FROM pictures;");
                                            $target_dir = $target_dir_other . $purposeTo;
                                            break;
                    default		    :	$numrows = mysqli_query($conn, "SELECT id FROM pictures;");
                                            $target_dir = $target_dir_other;
                }
                $tmp = '';
                $tmp .= $val['type'];
                $path_parts = pathinfo($tmp);
                $ext = $path_parts['filename'];
                if(in_array($ext,$extensions_arr) ){

                    $nr = mysqli_num_rows($numrows)+1;
                    $name = $nr.'-'.time().'.'.$ext;

                    switch($picrights){
                        case 'all'	    :	$sql = "INSERT INTO photo_forall(photo,username,comment) VALUES('" . $name . "','" . $us . "','" . $text . "')";
                                            break;
                        case 'user'	    :	$sql = "INSERT INTO photo_forusers (photo,username,forwho,comment) VALUES('" . $name."','".$us."','" . $userTo . "','" . $text . "')";
                                            break;
                        case 'other'    :	$sql = "INSERT INTO pictures (picture,text,purpose) VALUES('" . $name . "','" . $text . "','" . $purposeTo . "')";
                                            break;
                        default	    :	$sql = "INSERT INTO pictures (picture,text) VALUES('" . $name."','" . $text . "')";
                    }
                    mysqli_query($conn,$sql);
                    move_uploaded_file($val['tmp_name'],$target_dir.'/'.$name); 
                    $_SESSION['numbUploadedPictures'] = $totalPicturesNumber;
                }
                else{
                   $_SESSION['error_msg'] = 'Pokoušíš se nahrávat nějaký divný soubor. Kontaktuj správce.'; 
                }
                }
                
            }
            if ($_SESSION['error_msg'] == '') {
                include 'addNewPicturePage.php';
            }
        }
        
        if ($_SESSION['error_msg'] != '') {
            include 'addNewPicturePage.php';
            $_SESSION['error_location'] = 'addNewPicturePage';
        }
        
    }
    