<?php

    $_SESSION['error_msg'] = '';
    include "_connectDB.php";
    include_once '_dbRecountUserdata.php';
    include_once '_dbRecountMoney.php';
    
    $sqlGetNumberUsersForRecount = "SELECT COUNT(id) as number FROM users;";
    $queryGetNumberUsersForRecount = mysqli_query($conn, $sqlGetNumberUsersForRecount);
    $numberUsersForRecount = mysqli_fetch_assoc($queryGetNumberUsersForRecount);
    
    $idUsersForRecount = array();
    for ($i = 1; $i <= $numberUsersForRecount['number']; $i++){
        $idUsersForRecount[] = $i;
    }
    
    dbRecountMoney($idUsersForRecount);
    dbRecountUserdata($idUsersForRecount);
    
    $i = 0;
    
    $sqlNum = "SELECT "
            . "id "
            . "FROM userdata;";
    
    $queryNum = mysqli_query($conn, $sqlNum);
    $numbUsers = mysqli_num_rows($queryNum);
    while($i < $numbUsers){
	$i++;
        
        $sql2 = "SELECT "
            . "id, "
            . "username, "
            . "teamId, "
            . "last_access, "
            . "rank "
            . "FROM userdata WHERE id ='".$i."';";
    
        $sql3 = "SELECT "
                . "id, "
                . "username, "
                . "score, "
                . "money_actual_total, "
                . "money_total_bet, "
                . "money_total_won, "
                . "money_total_lost "
                . "FROM money_records WHERE id ='".$i."';";


        $allQuery2 = mysqli_query($conn, $sql2);

        $allQuery3 = mysqli_query($conn, $sql3);

        $res = mysqli_fetch_assoc($allQuery2);
        $res2 = mysqli_fetch_assoc($allQuery3);
        $allResult = array_merge($res, $res2);
        
        
        
        
	$sql1 = "SELECT id, username, firstname, lastname FROM users WHERE id ='".$i."';";
	$get2 = mysqli_query($conn, $sql1);
	$res2 = mysqli_fetch_assoc($get2);
	$allResult = array_merge($allResult, $res2);
	
	
	$userID	= $allResult['id'];
	$score	= $allResult['score'];
	$rank = $allResult['rank'];
	$username = $allResult['username'];
	$firstname = $allResult['firstname'];
        $lastname = $allResult['lastname'];
	$allBalance = $allResult['money_actual_total'];
	$allWon = $allResult['money_total_won'];
        $allLost = $allResult['money_total_lost'];
        $allBet = $allResult['money_total_bet'];
        $userTeam = $allResult['teamId'];
        
	echo'

        <div class="userViewDiv">
            <div class="viewUserHeader">
		<div class="userViewRow"><label>Pořadí:</label>  '.$i.' z ' . $numbUsers.'<br></div>
		<div class="userViewRow"><label>Skóre:</label>   '. $score.'<br></div>
		<div class="userViewRow"><label>Uživatelské jméno:</label>  '.$username.'<br></div>
                <div class="userViewRow"><label>Rank:</label>  '.$rank.'</div>
                <div class="userViewRow"><label>Jméno:</label>  '.$firstname.' '.$lastname.'</div>
		<div class="userViewRow"><label>Aktuální peníze:</label>  '.$allBalance.'<br></div>
		<div class="userViewRow"><label>Celkem vyhráno:</label>  '.$allWon.'<br></div>
		<div class="userViewRow"><label>Celkem prohráno:</label>  '.$allLost.'</div>
		<div class="userViewRow"><label>Celkem vsazeno:</label>  '.$allBet.'<br></div>
		    
                <div class="settingsViewUser">
                    <form method="POST">
                        <input type="hidden" name="IDUser" value="'.$userID.'">
                        <label for = "butViewUser'.$userID.'" hidden>Prohlédnout profil</label>
                        <button id = "butViewUser'.$userID.'" class="buttViewUser" name = "viewUserPrep">Prohlédnout profil</button>
                    </form>
                </div>
	    </div>
	</div>';
    }
