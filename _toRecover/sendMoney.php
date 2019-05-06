<?php

    include '_webSession.php';
    
    if (isSet($_POST["confirmSend"])) {
	$user = null;
	$amount = null;
	

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'chooseUser': $user = $value; $_SESSION["sendChooseUser"] = $value; break;
		case 'sendMon': $amount = $value; $_SESSION["sendMon"] = $value; break;
				    
            }
        }
        
        if ($_SESSION['error_msg'] == "") {

            include "_connectDB.php";
            mysqli_query($conn, "SET NAMES utf8");

	    $sql = "SELECT data_bank_trans_tot, data_bank_trans_val_sent FROM userdata WHERE username ='".$_SESSION["username"]."';";
	    $query = mysqli_query($conn,$sql);
	    $result = mysqli_fetch_assoc($query);
	    
	    $sTot = $result["data_bank_trans_tot"] + 1;
	    $sAmo = $result["data_bank_trans_val_sent"] + $amount;
	
	    $udpSql = "UPDATE userdata SET "
		    . "data_bank_trans_tot  = '".$sTot."', "
		    . "data_bank_trans_val_sent = '".$sAmo."' "
		    . "WHERE username ='".$_SESSION["username"]."';";
	    $query = mysqli_query($conn,$udpSql);
	    
	    $sql = "SELECT data_bank_trans_val_received FROM userdata WHERE id ='".$user."';";
	    $query = mysqli_query($conn,$sql);
	    $result = mysqli_fetch_assoc($query);
	    
	    $rAmo = $result["data_bank_trans_val_received"] + $amount;
	
	    $udpSql = "UPDATE userdata SET "
		    . "data_bank_trans_val_received = '".$rAmo."' "
		    . "WHERE id = '".$user."';";
	    $query = mysqli_query($conn,$udpSql);
	    
	    
	    dbRecount();
        }
        
    }
    if($_SESSION['error_msg'] != null){
        include 'sendMoneyPage.php';
    }
