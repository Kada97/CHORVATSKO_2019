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
            
            if ($codeTypegame == 7) {
                $codeValue = 0;
            }
	    
//                          <li>(1,2)   1  = QR     = Find & Fill - Hidden (umisťování na různá místa)</li>
//                          <li>(1,2)   2  = QR     = Treasury - Reward (odměna)</li>
//                          <li>(1,2)   3  = QR     = InGame - Bonus (při hrách se můžou objevit kódy)</li>
//                          <li>(1,2)   4  = nonQR  = Treasury - Reward (odměna jednotlivce, týmu, či bonusové ohodnocení)</li>
//                          <li>(1)     5  = nonQR  = Daily Quest - Reward (za vykonané úkoly jakéhokoli rázu náleží odměna)</li>
//                          <li>(1,2)   6  = nonQR  = InGame - Bonus (při hrách se můžou objevit kódy)</li>
//                          <li>(1)     7  = nonQR  = Indície k rozklíčování šifry kolíku (nepočítá se odměna - nominální hodnota kódu, vyplní se 0)</li>
//                          <li>(1,2)   8  = nonQR  = Other (jiné nespecifikované, potřeba vyplnit poznámku)</li>
            
            
	    if($codeTypeuser == 1){
		$getUserdata = mysqli_query($conn, "SELECT id, teamId, code_total, code_ig_entered, code_kolikCode FROM userdata WHERE username ='".$_SESSION["username"]."';");
		$getMoneyRecords = mysqli_query($conn, "SELECT id, money_extra_qr_ig, money_extra_code FROM money_records WHERE username ='".$_SESSION["username"]."';");
                
		$userdata = mysqli_fetch_assoc($getUserdata);
		$moneyRecords = mysqli_fetch_assoc($getMoneyRecords);
                
		$userid = $userdata['id'];
                $teamId = $userdata['teamId'];
		$userQrTot = $userdata['code_total']+1;
		$userIgEnt = $userdata['code_ig_entered']+1;
		$code_kolikCode = $userdata['code_kolikCode']+1;
		$userQrMonUs = $moneyRecords['money_extra_qr_ig']+$codeValue;
		$userCodeMonUs = $moneyRecords['money_extra_code']+$codeValue;
		
		$updUserData = "UPDATE userdata SET code_total = '".$userQrTot."', code_ig_entered = '".$userIgEnt."' WHERE id='".$userid."';";
		$queryUserData = mysqli_query($conn, $updUserData);
                
                $updMoneyRecords = "";
		
                
                switch ($codeTypegame) {
                    case 1:
                    case 2:
                    case 3:
                        $updMoneyRecords = "UPDATE money_records SET money_extra_qr_ig = '".$userQrMonUs."' WHERE id='".$userid."';";
                        break;
                    case 4:
                    case 5:
                    case 6:
                    case 8:
                        $updMoneyRecords = "UPDATE money_records SET money_extra_code = '".$userCodeMonUs."' WHERE id='".$userid."';";
                        break;
                    case 7:
                        $updMoneyRecords = "UPDATE userdata SET code_kolikCode = '".$code_kolikCode."' WHERE id='".$userid."';";
                        $insertDataKolikSql = "INSERT INTO data_code_kolik (founder,teamId,code) VALUES ('$codeInvoker','$teamId','$codeCode');";
                        $queryMoneyRecords = mysqli_query($conn, $insertDataKolikSql);
                        
                }
                
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
		$getTeamdata = mysqli_query($conn, "SELECT id, qr_mon_teams, qr_tot, code_total, code_mon, mon_to_div_from_qr_remains FROM teamdata WHERE id ='".$teamid."';");
		$teamdata = mysqli_fetch_assoc($getTeamdata);
                $userQrTot = $userdata['code_total']+1;
		$userTgEnt = $userdata['code_tg_entered']+1;
		$userQrMonTeQR = $teamdata['qr_mon_teams']+$codeValue;
		$userQrMonTe = $teamdata['code_mon']+$codeValue;
		$qrMonRemains = $teamdata['mon_to_div_from_qr_remains']+$codeValue;
		$numbCodesQR = $teamdata['qr_tot']+1;
		$numbCodes = $teamdata['code_total']+1;
                
		$updUserData = "UPDATE userdata SET code_total = '".$userQrTot."', code_tg_entered = '".$userTgEnt."' WHERE id='".$userid."';";
		$queryUserData = mysqli_query($conn, $updUserData);
                
                $updTeamdata = "";
		
                
                switch ($codeTypegame) {
                    case 1:
                    case 2:
                    case 3:
                        $updTeamdata = "UPDATE teamdata SET qr_mon_teams = '".$userQrMonTeQR."', mon_to_div_from_qr_remains = '".$qrMonRemains."', qr_tot = '".$numbCodesQR."' WHERE id='".$teamid."';";
                        break;
                    case 4:
                    case 6:
                    case 8:
                        $updTeamdata = "UPDATE teamdata SET code_mon = '".$userQrMonTe."', mon_to_div_from_qr_remains = '".$qrMonRemains."', code_total = '".$numbCodes."' WHERE id='".$teamid."';";
                        break;
                }
                
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


