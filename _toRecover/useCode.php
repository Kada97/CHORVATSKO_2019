<?php

    if (isSet($_POST["useCode"])) {
        $codeText       = null;

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'codeText':        $codeText                              = $value; 
                                        $_SESSION['useCodeText']            = $value;   break;
            }
        }
        if ($codeText == null) {
            $_SESSION['error_msg'] = "Kód nezadán";
        }
        if ($_SESSION['error_msg'] == "") {

            include "_connectDB.php";
            mysqli_query($conn, "SET NAMES utf8");

            $codeText   = removeDangerFromString($codeText);
            
            $codeTextCheckInvalid = mysqli_query($conn, "SELECT code, valid, invoker, value, usetime FROM codes WHERE code='" . $codeText . "'");
            $codeTextCheckOK = mysqli_query($conn, "SELECT * FROM codes WHERE code='" . $codeText . "'");
            
	    if (mysqli_num_rows($codeTextCheckInvalid) != 0) {
		$invCode = mysqli_fetch_assoc($codeTextCheckInvalid);
		if($invCode['valid'] == 0){
		    $_SESSION['error_msg'] = "Tento kód použil uživatel: ".$invCode['invoker'].".\r\n Kód byl zadán dne a času ".$invCode['usetime'].",\n\r a obsahoval peníze v hodnotě ".$invCode['value']."";
		}
            }
	    if ($_SESSION['error_msg'] == "") {
	    if (mysqli_num_rows($codeTextCheckOK) == 0) {
		$_SESSION['error_msg'] = "Tento kód je neplatný.";
	    }
	    if ($_SESSION['error_msg'] == "") {
            $codeTextCheckOK = mysqli_query($conn, "SELECT * FROM codes WHERE code='" . $codeText . "'");
	    $okCode = mysqli_fetch_assoc($codeTextCheckOK);
	    
	    $codeId = $okCode['id'];
	    $codeCode = $okCode['code'];
	    $codeTypeuser = $okCode['typeuser'];
	    $codeValue = $okCode['value'];
	    $codeValid = 0;
	    $codeInvoker = $_SESSION['username'];
	    $codeTypegame = $okCode['typegame'];
	    
	    
	    if($codeTypeuser == 1){
		$getUserdata = mysqli_query($conn, "SELECT id, qr_tot, qr_mon_users FROM userdata WHERE username ='".$_SESSION["username"]."';");
		$userdata = mysqli_fetch_assoc($getUserdata);
		$userid = $userdata['id'];
		$userQrTot = $userdata['qr_tot']+1;
		$userQrMonUs = $userdata['qr_mon_users']+$codeValue;
		
		$upd = "UPDATE userdata SET qr_tot = '".$userQrTot."', qr_mon_users = '".$userQrMonUs."' WHERE id='".$userid."';";
		$query = mysqli_query($conn, $upd);
	    }
	    if($codeTypeuser == 2){
		$getUserdata = mysqli_query($conn, "SELECT id, qr_tot, qr_mon_teams FROM userdata WHERE username ='".$_SESSION["username"]."';");
		$userdata = mysqli_fetch_assoc($getUserdata);
		$userid = $userdata['id'];
		$userQrTot = $userdata['qr_tot']+1;
		$userQrMonTe = $userdata['qr_mon_teams']+$codeValue;
		
		$upd = "UPDATE userdata SET qr_tot = '".$userQrTot."', qr_mon_teams = '".$userQrMonTe."' WHERE id='".$userid."';";
		$query = mysqli_query($conn, $upd);
	    }
	    
	    $upd = "UPDATE codes SET valid = '".$codeValid."', invoker = '".$_SESSION["username"]."' WHERE id='".$codeId."';";
	    $query = mysqli_query($conn, $upd);
	    
        }
    }}}
    if($_SESSION['error_msg'] != null){
        include 'useCodePage.php';
    }
?>


