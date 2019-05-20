<?php

    if (isSet($_POST['useCode'])) {
        $codeText       = null;

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'codeText':        $codeText                           = $value; 
                                        $_SESSION['useCodeText']            = $value;   break;
            }
        }
        if ($codeText == null) {
            $_SESSION['error_msg'] = 'Kód nezadán';
        }
        if ($_SESSION['error_msg'] == '') {

            include '_connectDB.php';

            $codeText   = removeDangerFromString($codeText);
            
            $sqlCodeCheck = "SELECT * FROM data_codes WHERE code='" . $codeText . "'";
            $codeTextCheckOK = mysqli_query($conn, $sqlCodeCheck);
            $okCode = mysqli_fetch_assoc($codeTextCheckOK);
            
	    if (mysqli_num_rows($codeTextCheckOK) != 0) {
		$invCode = $okCode;
                echo $invCode['valid'];
		if($invCode['valid'] == 0){
		    $_SESSION['error_msg'] = "Tento kód použil uživatel: ".$invCode['invoker'].".\r\n Kód byl zadán dne a času ".$invCode['usetime'].",\n\r a obsahoval peníze v hodnotě ".$invCode['value']." HRD.";
		}
            }
            
	    if ($_SESSION['error_msg'] == '') {
	    if (mysqli_num_rows($codeTextCheckOK) == 0) {
		$_SESSION['error_msg'] = 'Tento kód je neplatný.';
	    }
	    if ($_SESSION['error_msg'] == '') {
	    
	    
	    $codeId = $okCode['id'];
	    $codeCode = $okCode['code'];
	    $codeTypeuser = $okCode['typeuser'];
	    $codeValue = $okCode['value'];
	    $codeValid = 0;
	    $codeInvoker = $_SESSION['username'];
	    $codeTypegame = $okCode['typegame'];
            
            if ($codeTypegame == 6) {
                $codeValue = 0;
            }
	    
	    
	    if($codeTypeuser == 1){
		$getUserdata = mysqli_query($conn, "SELECT id, code_total, code_ig_entered FROM userdata WHERE username ='".$_SESSION["username"]."';");
		$getMoneyRecords = mysqli_query($conn, "SELECT id, money_extra_qr_ig FROM money_records WHERE username ='".$_SESSION["username"]."';");
                
		$userdata = mysqli_fetch_assoc($getUserdata);
		$moneyRecords = mysqli_fetch_assoc($getMoneyRecords);
                
		$userid = $userdata['id'];
		$userQrTot = $userdata['code_total']+1;
		$userIgEnt = $userdata['code_ig_entered']+1;
		$userQrMonUs = $moneyRecords['money_extra_qr_ig']+$codeValue;
		
		$updUserData = "UPDATE userdata SET code_total = '".$userQrTot."', code_ig_entered = '".$userIgEnt."' WHERE id='".$userid."';";
		$queryUserData = mysqli_query($conn, $updUserData);
                
                $updMoneyRecords = "UPDATE money_records SET money_extra_qr_ig = '".$userQrMonUs."' WHERE id='".$userid."';";
		$queryMoneyRecords = mysqli_query($conn, $updMoneyRecords);
                
                $u = array();
                array_push($u, $userid);
                dbRecountMoney($u);
                
	    }
	    elseif($codeTypeuser == 2){
		$getUserdata = mysqli_query($conn, "SELECT id, teamId, code_total, code_tg_entered FROM userdata WHERE username ='".$_SESSION["username"]."';");
		$userdata = mysqli_fetch_assoc($getUserdata);
		$userid = $userdata['id'];
		$teamid = $userdata['teamId'];
		$getTeamdata = mysqli_query($conn, "SELECT id, qr_mon_teams, qr_tot, mon_to_div_from_qr_remains FROM teamdata WHERE id ='".$teamid."';");
		$teamdata = mysqli_fetch_assoc($getTeamdata);
                $userQrTot = $userdata['code_total']+1;
		$userTgEnt = $userdata['code_tg_entered']+1;
		$userQrMonTe = $teamdata['qr_mon_teams']+$codeValue;
		$qrMonRemains = $teamdata['mon_to_div_from_qr_remains']+$codeValue;
		$numbCodes = $teamdata['qr_tot']+1;
                
		$updUserData = "UPDATE userdata SET code_total = '".$userQrTot."', code_tg_entered = '".$userTgEnt."' WHERE id='".$userid."';";
		$queryUserData = mysqli_query($conn, $updUserData);
                
                $updTeamdata = "UPDATE teamdata SET qr_mon_teams = '".$userQrMonTe."', mon_to_div_from_qr_remains = '".$qrMonRemains."', qr_tot = '".$numbCodes."' WHERE id='".$teamid."';";
		$queryTeamdata = mysqli_query($conn, $updTeamdata);
	    }
	    
	    $upd = "UPDATE data_codes SET valid = '".$codeValid."', invoker = '".$_SESSION["username"]."' WHERE id='".$codeId."';";
	    $query = mysqli_query($conn, $upd);
	    
        }
    }}}
    if($_SESSION['error_msg'] != null){
        include 'useCodePage.php';
    }
?>


