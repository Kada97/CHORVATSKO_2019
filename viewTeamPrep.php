<?php

        $id             = null;
        
        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'IDTeam':	$id = $value;
				$_SESSION['viewTeamId']= $id;break;
            }
        }
        include 'viewTeamPage.php';

?>

