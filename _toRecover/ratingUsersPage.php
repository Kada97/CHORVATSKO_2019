<?php

    $_SESSION['error_msg'] = "";
    include "_connectDB.php";
    $sql2 = "SELECT id, username, mon_all_bal, mon_all_won, mon_all_lost, mon_all_bet, team_id FROM userdata ORDER BY mon_all_bal DESC;";
    
    $allQuery = mysqli_query($conn, $sql2);
    $numbUsers = mysqli_num_rows($allQuery);
    $i = 0;
    while($allResult = mysqli_fetch_assoc($allQuery)){
	$i++;
	$sql1 = "SELECT id, username, firstname, lastname FROM users WHERE username ='".$allResult['username']."';";
	$get2 = mysqli_query($conn, $sql1);
	$res2 = mysqli_fetch_assoc($get2);
	$allResult = array_merge($allResult, $res2);
	
	
	$userID	= $allResult['id'];
	$username = $allResult['username'];
	$firstname = $allResult['firstname'];
        $lastname = $allResult['lastname'];
	$allBalance = $allResult['mon_all_bal'];
	$allWon = $allResult['mon_all_won'];
        $allLost = $allResult['mon_all_lost'];
        $allBet = $allResult['mon_all_bet'];
        $userTeam = $allResult['team_id'];
        
	echo'

        <div class="userViewDiv">
            <div class="viewUserHeader">
		<div class="userViewRow"><label>Pořadí:</label>  '.$i.' z ' . $numbUsers.'<br></div>
		<div class="userViewRow"><label>Uživatelské jméno:</label>  '.$username.'<br></div>
                <div class="userViewRow"><label>Jméno:</label>  '.$firstname.'</div>
		<div class="userViewRow"><label>Příjmení:</label>  '.$lastname.'</div>
		<div class="userViewRow"><label>Peněžní bilance:</label>  '.$allBalance.'<br></div>
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
