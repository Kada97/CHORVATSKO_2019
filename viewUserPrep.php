<?php

        $id             = null;
        
        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'IDUser':	$id = $value;
				$_SESSION['viewUserId']= $id;break;
            }
        }
        include 'viewProfilePage.php';

?>

