<?php

    $_SESSION['error_msg'] = '';
    include '_connectDB.php';
    include_once '_dbRecountUserdata.php';
    include_once '_dbRecountMoney.php';
    include_once '_dbRecountTeamdata.php';
    
    $sqlGetNumberUsersForRecount = "SELECT COUNT(id) as number FROM users;";
    $queryGetNumberUsersForRecount = mysqli_query($conn, $sqlGetNumberUsersForRecount);
    $numberUsersForRecount = mysqli_fetch_assoc($queryGetNumberUsersForRecount);
    
    $idUsersForRecount = array();
    for ($i = 1; $i <= $numberUsersForRecount['number']; $i++){
        $idUsersForRecount[] = $i;
    }
    
    dbRecountMoney($idUsersForRecount);
    dbRecountUserdata($idUsersForRecount);
    
    $sqlGetNumberTeamsForRecount = "SELECT COUNT(id) as number FROM teams;";
    $queryGetNumberTeamsForRecount = mysqli_query($conn, $sqlGetNumberTeamsForRecount);
    $numberTeamsForRecount = mysqli_fetch_assoc($queryGetNumberTeamsForRecount);
    
    $idTeamsForRecount = array();
    for ($i = 1; $i <= $numberTeamsForRecount['number']; $i++){
        $idTeamsForRecount[] = $i;
    }
    
    dbRecountTeamdata($idTeamsForRecount);
    
    
    $sql2 = "SELECT id, score, cg_kolik_total, data_teamcpt FROM teamdata ORDER BY score DESC;";
    
    $allQuery = mysqli_query($conn, $sql2);
    $numbTeams = mysqli_num_rows($allQuery);
    $i = 0;
    while($allResult = mysqli_fetch_assoc($allQuery)){
	$i++;
	$sql1 = "SELECT id, name, color FROM teams WHERE id ='".$allResult['id']."';";
	$get2 = mysqli_query($conn, $sql1);
	$res2 = mysqli_fetch_assoc($get2);
	$allResult = array_merge($allResult, $res2);
	
	
	$teamID	= $allResult['id'];
	$name = $allResult['name'];
	$kolik = $allResult['cg_kolik_total'];
	$score = $allResult['score'];
        $cpt = $allResult['data_teamcpt'];
        $color = $allResult['color'];
	if ($cpt == ''){$cpt = '---';}
        
	echo'

        <div class="userViewDiv">
            <div class="viewUserHeader">
		<div class="userViewRow"><label>Pořadí:</label>  '.$i.' z ' . $numbTeams.'<br></div>
		<div class="userViewRow"><label>Název týmu:</label>  '.$name.'<br></div>
		<div class="userViewRow"><label>Skóre:</label>  '.$score.'<br></div>
                <div class="userViewRow"><label>Barva:</label>  '.$color.'</div>
		<div class="userViewRow"><label>Počet nasbíraných bodů - kolíků:</label>  '.$kolik.'</div>
		<div class="userViewRow"><label>Kapitán:</label>  '.$cpt.'<br></div>
		    
                <div class="settingsViewUser">
                    <form method="POST">
                        <input type="hidden" name="IDTeam" value="'.$teamID.'">
                        <label for = "butViewTeam'.$teamID.'" hidden>Prohlédnout tým</label>
                        <button id = "butViewTeam'.$teamID.'" class="buttViewUser" name = "viewTeamPrep">Prohlédnout tým</button>
                    </form>
                </div>
	    </div>
	</div>';
    }
