<?php
    if ($_SESSION['username'] != 'Admin') {
        sendLog('_home', 'Uživatel ' . $_SESSION['username'] . ' potvrzuje přihlášení načtením stránky Home.');
        $_SESSION['error_msg'] = '';
        include '_connectDB.php';
        dbRecount();
    
//        $getU = mysqli_query($conn, "SELECT username, mon_all_bal FROM userdata ORDER BY mon_all_bal DESC ;");
//        $getT = mysqli_query($conn, "SELECT id, score FROM teamdata ORDER BY score DESC ;");
//        $get2 = mysqli_query($conn, "SELECT * FROM userdata WHERE username ='".$_SESSION["username"]."';");
//    
//    $getTId = mysqli_query($conn, "SELECT team_id FROM userdata WHERE username = '".$_SESSION["username"]."' ;");
//    $userTeamId = mysqli_fetch_assoc($getTId);
//    $userTeamId = $userTeamId['team_id'];
//    
//    $allResult = mysqli_fetch_assoc($get2);
//    
//    foreach($allResult as $key =>$value){
//        $temp = $allResult[$key];
//        $allResult[$key] = htmlspecialchars($temp);
//    }
//    
//    $numbUsers = mysqli_num_rows($getU);
//    $pos = 1;
//    $ratingUser = '';
//    while($getResult = mysqli_fetch_assoc($getU)){
//	$ratingUser = $pos . '. z ' . $numbUsers;
//	if($getResult['username'] == $_SESSION['username']){break;}
//	$pos++;
//    }
//    
//    $numbTeams = mysqli_num_rows($getT);
//    $pos = 1;
//    $ratingTeam = '';
//    while($getResult = mysqli_fetch_assoc($getT)){
//	$ratingTeam = $pos . '. z ' . $numbTeams;
//	if($getResult['id'] == $userTeamId){break;}
//	$pos++;
//    }
//    
//    
//    
//    $accMon = 0;
//    $accMon += $allResult['mon_all_bal'];
//    $accMon -= $allResult['coin_total_value'];
//    
//    echo'
//        <div class="sharedProfileDiv profileDivHome">
//        <label class="infoL">Přehled</label>
//            <div class="profileHeader">
//    
//		<div class="profileHeaderRow"><label>Pořadí v žebříčku uživatelů: </label>'.$ratingUser.'<hr><br></div>
//		';/*<div class="profileHeaderRow"><label>Pořadí týmu: </label>'.$ratingTeam.'<hr><br></div>*/echo'
//			
//		<div class="profileHeaderRow"><label>Peníze celkem: </label>'.$allResult['mon_all_bal'].'<br><hr></div>
//		
//		<div class="profileHeaderRow"><label>Peníze na účtu: </label>'.$accMon.'<br></div>
//		<div class="profileHeaderRow"><label>Peníze v žetonech: </label>'.$allResult['coin_total_value'].'<hr><br></div> 
//            </div>
//        </div>
//    ';
//    
    //include 'calendarDay.php';
    
    }
    else{
	echo 'Toto je administrátorské rozhraní.';
    }
?>

