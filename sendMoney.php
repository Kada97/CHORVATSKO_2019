<?php

    include '_webSession.php';
    
    if (isSet($_POST['confirmSendMoney'])) {
	$user = null;
	$amount = null;
	

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'chooseUser': $user = $value; $_SESSION['sendChooseUser'] = $value; break;
		case 'sendMon': $amount = $value; $_SESSION['sendMon'] = $value; break;
				    
            }
            
        }
        if ($user == 'msg') {$_SESSION['error_msg'] = 'Nebyl vybrán příjemce!';}
        if ($_SESSION['error_msg'] == '') {
            
            include '_connectDB.php';
            mysqli_query($conn, "SET NAMES utf8");

	    $sqlUserData1 = "SELECT data_bank_trans_total, data_bank_trans_outgoing FROM userdata WHERE username ='".$_SESSION["username"]."';";
	    $sqlBankRecords1 = "SELECT money_actual_total, money_sent FROM money_records WHERE username ='".$_SESSION["username"]."';";
            
	    $queryUserdata1 = mysqli_query($conn,$sqlUserData1);
	    $resultUserdata1 = mysqli_fetch_assoc($queryUserdata1);
            
	    $queryBankRecords1 = mysqli_query($conn,$sqlBankRecords1);
	    $resultBankRecords1 = mysqli_fetch_assoc($queryBankRecords1);
            
            if ($resultBankRecords1['money_actual_total'] > 0 || $resultBankRecords1['money_actual_total'] - $amount >= 0) {
	    
                $sTot1 = $resultUserdata1['data_bank_trans_total'] + 1;
                $sOut = $resultUserdata1['data_bank_trans_outgoing'] + 1;
                $sAmo = $resultBankRecords1['money_sent'] + $amount;

                $udpSqlUserdata1 = "UPDATE userdata SET "
                                . "data_bank_trans_total = '".$sTot1."', "
                                . "data_bank_trans_outgoing = '".$sOut."' "
                                . "WHERE username ='".$_SESSION["username"]."';";
                $queryUpdUserdata1 = mysqli_query($conn,$udpSqlUserdata1);

                $udpSqlBankRecords1 = "UPDATE money_records SET "
                                    . "money_sent  = '".$sAmo."' "
                                    . "WHERE username ='".$_SESSION["username"]."';";
                $queryUpdBankRecords1 = mysqli_query($conn,$udpSqlBankRecords1);



                $sqlUserData2 = "SELECT data_bank_trans_total, data_bank_trans_incoming FROM userdata WHERE id ='".$user."';";
                $sqlBankRecords2 = "SELECT money_received FROM money_records WHERE id ='".$user."';";

                $queryUserdata2 = mysqli_query($conn,$sqlUserData2);
                $resultUserdata2 = mysqli_fetch_assoc($queryUserdata2);

                $queryBankRecords2 = mysqli_query($conn,$sqlBankRecords2);
                $resultBankRecords2 = mysqli_fetch_assoc($queryBankRecords2);

                $sTot2 = $resultUserdata2['data_bank_trans_total'] + 1;
                $sIn = $resultUserdata2['data_bank_trans_incoming'] + 1;
                $rAmo = $resultBankRecords2['money_received'] + $amount;

                $udpSqlUserdata2 = "UPDATE userdata SET "
                                . "data_bank_trans_total = '".$sTot2."', "
                                . "data_bank_trans_incoming = '".$sIn."' "
                                . "WHERE id ='".$user."';";
                $queryUpdUserdata2 = mysqli_query($conn,$udpSqlUserdata2);

                $udpSqlBankRecords2 = "UPDATE money_records SET "
                                    . "money_received  = '".$rAmo."' "
                                    . "WHERE id ='".$user."';";
                $queryUpdBankRecords2 = mysqli_query($conn,$udpSqlBankRecords2);

                $usersToRecountMoney = array();
                $activeUserData = $_SESSION['userdata'];
                $idActiveUser = $activeUserData['id'];

                array_push($usersToRecountMoney,$idActiveUser);
                array_push($usersToRecountMoney,$user);

                dbRecountMoney($usersToRecountMoney);
                $_SESSION['error_msg'] = 'Peníze byly ODESLÁNY!';
            }
            else {
                $_SESSION['error_msg'] = 'Nemáš dostatek peněz!';
            }
        }
        
        include 'sendMoneyPage.php';
    }
    if($_SESSION['error_msg'] != null){
        include 'sendMoneyPage.php';
    }
