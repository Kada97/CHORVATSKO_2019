<?php

    include '_connectDB.php';
    $get = mysqli_query($conn, "SELECT * FROM users WHERE id ='".$_SESSION["viewUserId"]."';");
    $get2 = mysqli_query($conn, "SELECT * FROM userdata WHERE id ='".$_SESSION["viewUserId"]."';");
    $get3 = mysqli_query($conn, "SELECT * FROM money_records WHERE id ='".$_SESSION["viewUserId"]."';");
    $get4 = mysqli_query($conn, "SELECT * FROM data_user_kolik WHERE id ='".$_SESSION["viewUserId"]."';");
    
    $res = mysqli_fetch_assoc($get);
    $res2 = mysqli_fetch_assoc($get2);
    $res3 = mysqli_fetch_assoc($get3);
    $res4 = mysqli_fetch_assoc($get4);
    $res5 = array_merge($res, $res2, $res3, $res4);
    
    $get6 = mysqli_query($conn, "SELECT * FROM data_team_kolik WHERE id ='".$res5['teamId']."';");
    $res6 = mysqli_fetch_assoc($get6);
    
    
    $allResult = array_merge($res5, $res6);
    
    foreach($allResult as $key =>$value){
        $temp = $allResult[$key];
        $allResult[$key] = htmlspecialchars($temp);
    }

    echo'
            
        <div class="sharedProfileDiv profileDivUser">
        <label class="infoL">Profil '.$_SESSION["username"].'</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>Uživatelské jméno: </label>'.$allResult['username'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Potřebuji pomoc: </label>'.(($allResult['needhelp'] == "OK") ? "Nepotřebuji" : "Prosím pomoc").'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Jméno: </label>'.$allResult['firstname'].'<br></div>
                <div class="profileHeaderRow"><label>Příjmení: </label>'.$allResult['lastname'].'<br></div>
                <div class="profileHeaderRow"><label>Věk: </label> '.$allResult['age'].'<br></div>
                <div class="profileHeaderRow"><label>Narozeniny: </label> '.$allResult['birthdate'].'<br></div>
		<div class="profileHeaderRow"><label>Pohlaví: </label>  '.$allResult['sex'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Vytvoření účtu: </label>'.$allResult['firstaccess'].'<br></div>
                <div class="profileHeaderRow"><label>Poslední přihlášení: </label>'.$allResult['last_access'].'<hr><br></div>
	
		<div class="profileHeaderRow"><label>Tým: </label>'.$allResult['teamId'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet přihlášení: </label>'.$allResult['weblogins'].'<br></div>
		<div class="profileHeaderRow"><label>Webová hodnost: </label>'.$allResult['rank'].'<hr><br></div>
		<div class="profileHeaderRow"><label>Skóre: </label>'.$allResult['score'].'<hr><br></div>
                    
		    
            </div>
        </div>
    ';
    $accMon = 0;
    
    $accMon += $allResult['money_actual_total'];
    $accMon -= $allResult['coin_value_total'];
    echo'
            
        <div class="sharedProfileDiv profileDivPenize">
        <label class="infoL">Peníze</label>
            <div class="profileHeader">
    
	    <div class="profileHeaderRow"><label>Bohatství: </label>'.$allResult['money_actual_total'].'<br><hr></div>
		
	    <div class="profileHeaderRow"><label>Peníze na účtu: </label>'.$accMon.'<br></div>
	    <div class="profileHeaderRow"><label>Peníze v žetonech: </label>'.$allResult['coin_value_total'].'<hr><br></div>
		
	    <div class="profileHeaderRow"><label>Součet vyhraných peněz: </label>'.$allResult['money_total_won'].'<br></div>
	    <div class="profileHeaderRow"><label>Součet prohraných peněz: </label>'.$allResult['money_total_lost'].'<br></div>
	    <div class="profileHeaderRow"><label>Součet sázek: </label>'.$allResult['money_total_bet'].'<hr><br></div>
	    
	    <div class="profileHeaderRow"><label>WEB - bilance: </label>'.$allResult['money_web_balance'].'<br></div>
	    <div class="profileHeaderRow"><label>WEB - vyhráno: </label>'.$allResult['money_web_won'].'<br></div>
	    <div class="profileHeaderRow"><label>WEB - prohráno: </label>'.$allResult['money_web_lost'].'<br></div>
	    <div class="profileHeaderRow"><label>WEB - vsazeno: </label>'.$allResult['money_web_bet'].'<hr><br></div>
		
	    <div class="profileHeaderRow"><label>Hry jednotlivců - bilance: </label>'.$allResult['money_ig_balance'].'<br></div>
	    <div class="profileHeaderRow"><label>Hry jednotlivců - vyhráno: </label>'.$allResult['money_ig_won'].'<br></div>
	    <div class="profileHeaderRow"><label>Hry jednotlivců - prohráno: </label>'.$allResult['money_ig_lost'].'<br></div>
	    <div class="profileHeaderRow"><label>Hry jednotlivců - vsazeno: </label>'.$allResult['money_ig_bet'].'<hr><br></div>
		
            </div>
        </div>
    ';
    
    $koliky = 0;
    $koliky += $allResult['total_captured_points'];
    $koliky += $allResult['total_saved_points'];
    
    echo'
            
        <div class="sharedProfileDiv profileDivGameinfo">
        <label class="infoL">Herní info</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>Nasbíraných kolíků: </label>'.$koliky.'<br></div>
		<div class="profileHeaderRow"><label>Z toho ukořistěných: </label>'.$allResult['total_captured_points'].'<br></div>
		<div class="profileHeaderRow"><label>Z toho zachráněných: </label>'.$allResult['total_saved_points'].'<br></div>
		<div class="profileHeaderRow"><label>Poslední evidovaný kolík: </label>'.$allResult['last_capture'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet zahájených webových her: </label>'.$allResult['wg_numb_played_total'].'<br></div>
		<div class="profileHeaderRow"><label>Počet vyhraných webových her: </label>'.$allResult['wg_numb_played_won'].'<br></div>
		<div class="profileHeaderRow"><label>Počet prohraných webových her: </label>'.$allResult['wg_numb_played_lost'].'<br></div>
		<div class="profileHeaderRow"><label>Počet remizovaných webových her: </label>'.$allResult['wg_numb_played_draw'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Hry jednotlivců - počet uskutečněných: </label>'.$allResult['ig_numb_played_total'].'<br></div>
		<div class="profileHeaderRow"><label>Hry jednotlivců - počet vyhraných: </label>'.$allResult['ig_numb_played_won'].'<br></div>
		<div class="profileHeaderRow"><label>Hry jednotlivců - počet prohraných: </label>'.$allResult['ig_numb_played_lost'].'<br></div>
		<div class="profileHeaderRow"><label>Hry jednotlivců - počet remizovaných: </label>'.$allResult['ig_numb_played_draw'].'<hr><br></div>
		    

            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivGiftsRewards">
        <label class="infoL">Dary a odměny</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>Počet darů od Dominika: </label>'.$allResult['gifts_user_by_dom_tot'].'<br></div>
		<div class="profileHeaderRow"><label>Hodnota celkem: </label>'.$allResult['money_extra_ig_dk'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet darů od organizátorů: </label>'.$allResult['gifts_user_by_org_tot'].'<br></div>
		<div class="profileHeaderRow"><label>Hodnota celkem: </label>'.$allResult['money_extra_ig_org'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet darů od táborových vedoucích: </label>'.$allResult['gifts_user_by_cl_tot'].'<br></div>
		<div class="profileHeaderRow"><label>Hodnota celkem: </label>'.$allResult['money_extra_ig_cl'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet darů od systému: </label>'.$allResult['gifts_user_by_sys_tot'].'<br></div>
		<div class="profileHeaderRow"><label>Hodnota celkem: </label>'.$allResult['money_extra_ig_sys'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet darů od kapitána: </label>'.$allResult['gifts_user_by_cpt_tot'].'<br></div>
		<div class="profileHeaderRow"><label>Hodnota celkem: </label>'.$allResult['gifts_user_by_cpt_val'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet darů - celkem: </label>'.$allResult['gifts_number_total'].'<hr><br></div>
		<div class="profileHeaderRow"><label>Počet darů - z toho pro jednotlivce: </label>'.$allResult['gifts_number_ig'].'<hr><br></div>
		<div class="profileHeaderRow"><label>Počet darů - z toho od týmu: </label>'.$allResult['gifts_number_tg'].'<hr><br></div>
		<div class="profileHeaderRow"><label>Hodnota darů - celkem: </label>'.$allResult['money_extra_total'].'<hr><br></div>
                    
		<div class="profileHeaderRow"><label>Odměna z her - peníze z darů ze hry: </label>'.$allResult['money_extra_tg'].'<br></div>
		<div class="profileHeaderRow"><label>Odměna z her - peníze z rozdělování kapitánem: </label>'.$allResult['money_tg_received'].'<hr><br></div>

            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivQRs">
        <label class="infoL">QR kódy a jiné kódy</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>QR kódy - počet nasbíraných: </label>'.$allResult['code_total'].'<br></div>
		<div class="profileHeaderRow"><label>QR kódy - počet pro jednotlivce: </label>'.$allResult['code_ig_entered'].'<br></div>
		<div class="profileHeaderRow"><label>QR kódy - počet pro tým: </label>'.$allResult['code_tg_entered'].'<br></div>
		<div class="profileHeaderRow"><label>QR kódy - hodnota celkem: </label>'.$allResult['money_extra_qr_total'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>QR kódy - peníze pro uživatele: </label>'.$allResult['money_extra_qr_ig'].'<br></div>
		<div class="profileHeaderRow"><label>QR kódy - peníze pro tým: </label>'.$allResult['money_extra_qr_tg'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Jiné kódy - zisk celkem: </label>'.$allResult['money_extra_code_total'].'<hr><br></div>
		<div class="profileHeaderRow"><label>Počet nasbíraných indícií k šifrám: </label>'.$allResult['code_kolikCode'].'<br></div>

            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivBank">
        <label class="infoL">Banka</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>Počet transakcí: </label>'.$allResult['data_bank_trans_total'].'<br></div>
		<div class="profileHeaderRow"><label>Počet transakcí odchozích: </label>'.$allResult['data_bank_trans_outgoing'].'<br></div>
		<div class="profileHeaderRow"><label>Počet transakcí příchozích: </label>'.$allResult['data_bank_trans_incoming'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Hodnota odeslaného: </label>'.$allResult['money_sent'].'<br></div>
		<div class="profileHeaderRow"><label>Hodnota přijmutého: </label>'.$allResult['money_received'].'<hr><br></div>
		
            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivClean">
        <label class="infoL">Úklid</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>Bilance: </label>'.$allResult['money_extra_clean_balance'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Získáno: </label>'.$allResult['money_extra_clean_won'].'<br></div>
		<div class="profileHeaderRow"><label>Strhnuto: </label>'.$allResult['money_extra_clean_lost'].'<hr><br></div>
		
            </div>
        </div>
    ';          

?>


