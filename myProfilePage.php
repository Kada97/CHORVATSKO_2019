<?php

    include '_connectDB.php';
    include_once '_dbRecountUserdata.php';
    include_once '_dbRecountMoney.php';
    
    $idUsersForRecount = array();
    $idUsersForRecount[] = $_SESSION['userID'];
    
    dbRecountMoney($idUsersForRecount);
    dbRecountUserdata($idUsersForRecount);
    
    
    
    $get = mysqli_query($conn, "SELECT * FROM users WHERE id ='".$_SESSION['userID']."';");
    $get2 = mysqli_query($conn, "SELECT * FROM userdata WHERE id ='".$_SESSION['userID']."';");
    $get3 = mysqli_query($conn, "SELECT * FROM money_records WHERE id ='".$_SESSION['userID']."';");
    $get4 = mysqli_query($conn, "SELECT * FROM data_user_kolik WHERE id ='".$_SESSION['userID']."';");
    
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
        <div class="sharedProfileDiv">
        <fieldset>  
            <legend id="legendGeneralDescription" align="center">Profil '.$allResult['username'].'</legend>
                
		<div  class = "formRow" id ="birthdateLikeRow"><label>Potřebuji pomoc: </label>'.(($allResult['needhelp'] == "OK") ? "Nepotřebuji" : "Prosím pomoc").'<hr><br></div>
		    
		<label>Jméno: </label><div class = "formRow" id ="birthdateLikeRow">'.$allResult['firstname'].'<br></div>
                <label>Příjmení: </label><div class = "formRow" id ="birthdateLikeRow">'.$allResult['lastname'].'<br></div>
                <div class = "formRow" id ="birthdateLikeRow"><label>Věk: </label> '.$allResult['age'].'<br></div>
                <div class = "formRow" id ="birthdateLikeRow"><label>Narozeniny: </label> '.$allResult['birthdate'].'<br></div>
		<div class="profileHeaderRow"><label>Pohlaví: </label>  '.$allResult['sex'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Vytvoření účtu: </label>'.$allResult['firstaccess'].'<br></div>
                <div class="profileHeaderRow"><label>Poslední aktivita: </label>'.$allResult['last_access'].'<hr><br></div>
	
		<div class="profileHeaderRow"><label>Tým: </label>'.$allResult['teamId'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet přihlášení: </label>'.$allResult['weblogins'].'<br></div>
		<div class="profileHeaderRow"><label>Webová hodnost: </label>'.$allResult['rank'].'<hr><br></div>
		<div class="profileHeaderRow"><label>Skóre: </label>'.$allResult['score'].'<hr><br></div>
                    
                <div class="profileHeaderRow"><a href="src/apk/com.google.zxing.client.android.apk">QR čtečka ke stažení</a><hr><br></div>
		<div class="profileHeaderRow"><label>Verifikační kód: </label>'.$allResult['verification'].'<br><hr></div>
                    
		    
           
        </div> 
        </fieldset>
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
    
    
    $nGD = $allResult['gifts_number_tg_dk'] + $allResult['gifts_number_ig_dk'];
    $vGD = $allResult['money_extra_tg_dk'] + $allResult['money_extra_ig_dk'];
    $nGO = $allResult['gifts_number_tg_org'] + $allResult['gifts_number_ig_org'];
    $vGO = $allResult['money_extra_tg_org'] + $allResult['money_extra_ig_org'];
    $nGL = $allResult['gifts_number_tg_cl'] + $allResult['gifts_number_ig_cl'];
    $vGL = $allResult['money_extra_tg_cl'] + $allResult['money_extra_ig_cl'];
    $nGS = $allResult['gifts_number_tg_sys'] + $allResult['gifts_number_ig_sys'];
    $vGS = $allResult['money_extra_tg_sys'] + $allResult['money_extra_ig_sys'];
    
    echo'
            
        <div class="sharedProfileDiv profileDivGiftsRewards">
        <label class="infoL">Dary a odměny</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>Počet darů od Dominika celkem: </label>'.$nGD.'<br></div>
		<div class="profileHeaderRow"><label>Z toho počet za individuální hry: </label>'.$allResult['gifts_number_ig_dk'].'<br></div>
		<div class="profileHeaderRow"><label>Z toho počet za týmové hry: </label>'.$allResult['gifts_number_tg_dk'].'<br></div>
                    
		<div class="profileHeaderRow"><label>Hodnota darů od Dominika celkem: </label>'.$vGD.'<hr><br></div>
                <div class="profileHeaderRow"><label>Z toho hodnota za individuální hry: </label>'.$allResult['money_extra_ig_dk'].'<br></div>
		<div class="profileHeaderRow"><label>Z toho hodnota za týmové hry: </label>'.$allResult['money_extra_tg_dk'].'<br></div>
		    
		<div class="profileHeaderRow"><label>Počet darů od organizátorů celkem: </label>'.$nGO.'<br></div>
		<div class="profileHeaderRow"><label>Z toho počet za individuální hry: </label>'.$allResult['gifts_number_ig_org'].'<br></div>
		<div class="profileHeaderRow"><label>Z toho počet za týmové hry: </label>'.$allResult['gifts_number_tg_org'].'<br></div>
                    
		<div class="profileHeaderRow"><label>Hodnota darů od organizátorů celkem: </label>'.$vGO.'<hr><br></div>
                <div class="profileHeaderRow"><label>Z toho hodnota za individuální hry: </label>'.$allResult['money_extra_ig_org'].'<br></div>
		<div class="profileHeaderRow"><label>Z toho hodnota za týmové hry: </label>'.$allResult['money_extra_tg_org'].'<br></div>
		    
                <div class="profileHeaderRow"><label>Počet darů od vedoucích celkem: </label>'.$nGL.'<br></div>
		<div class="profileHeaderRow"><label>Z toho počet za individuální hry: </label>'.$allResult['gifts_number_ig_cl'].'<br></div>
		<div class="profileHeaderRow"><label>Z toho počet za týmové hry: </label>'.$allResult['gifts_number_tg_cl'].'<br></div>
                    
		<div class="profileHeaderRow"><label>Hodnota darů od vedoucích celkem: </label>'.$vGL.'<hr><br></div>
                <div class="profileHeaderRow"><label>Z toho hodnota za individuální hry: </label>'.$allResult['money_extra_ig_cl'].'<br></div>
		<div class="profileHeaderRow"><label>Z toho hodnota za týmové hry: </label>'.$allResult['money_extra_tg_cl'].'<br></div>

                <div class="profileHeaderRow"><label>Počet darů od systému celkem: </label>'.$nGS.'<br></div>
		<div class="profileHeaderRow"><label>Z toho počet za individuální hry: </label>'.$allResult['gifts_number_ig_sys'].'<br></div>
		<div class="profileHeaderRow"><label>Z toho počet za týmové hry: </label>'.$allResult['gifts_number_tg_sys'].'<br></div>
                    
		<div class="profileHeaderRow"><label>Hodnota darů od systému celkem: </label>'.$vGS.'<hr><br></div>
                <div class="profileHeaderRow"><label>Z toho hodnota za individuální hry: </label>'.$allResult['money_extra_ig_sys'].'<br></div>
		<div class="profileHeaderRow"><label>Z toho hodnota za týmové hry: </label>'.$allResult['money_extra_tg_sys'].'<br></div>

		<div class="profileHeaderRow"><label>Počet darů od kapitána: </label>'.$allResult['gifts_number_tg_cpt'].'<br></div>
		<div class="profileHeaderRow"><label>Hodnota celkem: </label>'.$allResult['gifts_number_tg_cpt'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet darů - celkem: </label>'.$allResult['gifts_number_total'].'<hr><br></div>
		<div class="profileHeaderRow"><label>Počet darů - z toho pro jednotlivce: </label>'.$allResult['gifts_number_ig'].'<hr><br></div>
		<div class="profileHeaderRow"><label>Počet darů - z toho od týmu: </label>'.$allResult['gifts_number_tg'].'<hr><br></div>
		<div class="profileHeaderRow"><label>Hodnota darů - celkem: </label>'.$allResult['money_extra_total'].'<hr><br></div>
                    
		<div class="profileHeaderRow"><label>Odměna z her - peníze z darů ze hry: </label>'.$allResult['money_tg_received'].'<br><hr></div>

            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivQRs">
        <label class="infoL">QR kódy a jiné kódy</label>
            <div class="profileHeader">
            
                <div class="profileHeaderRow"><label>Všechny kódy - zisk celkem: </label>'.$allResult['money_extra_code_total'].'<hr><br></div>
		<div class="profileHeaderRow"><label>Všechny kódy - počet nasbíraných: </label>'.$allResult['code_total'].'<br></div>
		<div class="profileHeaderRow"><label>Z toho je počet nasbíraných indícií k šifrám: </label>'.$allResult['code_kolikCode'].'<br></div>
		<div class="profileHeaderRow"><label>Všechny kódy - počet pro jednotlivce: </label>'.$allResult['code_ig_entered'].'<br></div>
		<div class="profileHeaderRow"><label>Všechny kódy - počet pro tým: </label>'.$allResult['code_tg_entered'].'<br></div>
		<div class="profileHeaderRow"><label>QR kódy - hodnota celkem: </label>'.$allResult['money_extra_qr_total'].'<hr><br></div>
		<div class="profileHeaderRow"><label>Jiné kódy - hodnota celkem: </label>'.$allResult['money_extra_code'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>QR kódy - peníze pro uživatele: </label>'.$allResult['money_extra_qr_ig'].'<br></div>
		<div class="profileHeaderRow"><label>QR kódy - peníze pro tým: </label>'.$allResult['money_extra_qr_tg'].'<hr><br></div>
		    
		

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
        

</div>
    ';          

?>


