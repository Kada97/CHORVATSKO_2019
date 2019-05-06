<?php

    include '_connectDB.php';
    $get = mysqli_query($conn, "SELECT * FROM users WHERE id ='".$_SESSION["viewUserId"]."';");
    $get2 = mysqli_query($conn, "SELECT * FROM userdata WHERE id ='".$_SESSION["viewUserId"]."';");
    
    $res = mysqli_fetch_assoc($get);
    $res2 = mysqli_fetch_assoc($get2);
    $allResult = array_merge($res, $res2);
    
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
		<div class="profileHeaderRow"><label>Pohlaví: </label>  '.$allResult['sex'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Vytvoření účtu: </label>'.$allResult['firstaccess'].'<br></div>
                <div class="profileHeaderRow"><label>Poslední přihlášení: </label>'.$allResult['lastaccess'].'<hr><br></div>
	
		<div class="profileHeaderRow"><label>Tým: </label>'.$allResult['team_id'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet přihlášení: </label>'.$allResult['data_weblogins'].'<br></div>
		<div class="profileHeaderRow"><label>Webová hodnost: </label>'.$allResult['data_rank'].'<hr><br></div>
		    
            </div>
        </div>
    ';
    $accMon = 0;
    
    $accMon += $allResult['mon_all_bal'];
    $accMon -= $allResult['coin_total_value'];
    echo'
            
        <div class="sharedProfileDiv profileDivPenize">
        <label class="infoL">Peníze</label>
            <div class="profileHeader">
    
	    <div class="profileHeaderRow"><label>Bohatství: </label>'.$allResult['mon_all_bal'].'<br><hr></div>
		
	    <div class="profileHeaderRow"><label>Peníze na účtu: </label>'.$accMon.'<br></div>
	    <div class="profileHeaderRow"><label>Peníze v žetonech: </label>'.$allResult['coin_total_value'].'<hr><br></div>
		
	    <div class="profileHeaderRow"><label>Součet vyhraných peněz: </label>'.$allResult['mon_all_won'].'<br></div>
	    <div class="profileHeaderRow"><label>Součet prohraných peněz: </label>'.$allResult['mon_all_lost'].'<br></div>
	    <div class="profileHeaderRow"><label>Součet sázek: </label>'.$allResult['mon_all_bet'].'<hr><br></div>
	    
	    <div class="profileHeaderRow"><label>WEB - bilance: </label>'.$allResult['mon_wg_all_bal'].'<br></div>
	    <div class="profileHeaderRow"><label>WEB - vyhráno: </label>'.$allResult['mon_wg_all_won'].'<br></div>
	    <div class="profileHeaderRow"><label>WEB - prohráno: </label>'.$allResult['mon_wg_all_lost'].'<br></div>
	    <div class="profileHeaderRow"><label>WEB - vsazeno: </label>'.$allResult['mon_wg_all_bet'].'<hr><br></div>
		
	    <div class="profileHeaderRow"><label>Hry jednotlivců - bilance: </label>'.$allResult['mon_ig_all_bal'].'<br></div>
	    <div class="profileHeaderRow"><label>Hry jednotlivců - vyhráno: </label>'.$allResult['mon_ig_all_won'].'<br></div>
	    <div class="profileHeaderRow"><label>Hry jednotlivců - prohráno: </label>'.$allResult['mon_ig_all_lost'].'<br></div>
	    <div class="profileHeaderRow"><label>Hry jednotlivců - vsazeno: </label>'.$allResult['mon_ig_all_bet'].'<hr><br></div>
		
            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivZetony">
        <label class="infoL">Žetony - počet (hodnota žetonu, podle barvy, počet)</label>
            <div class="profileHeader">
	    
		<div class="profileHeaderRow"><label>Celkový počet: </label>'.$allResult['coin_total_number'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>(1) =  levný bílý: </label>'.$allResult['coin_n_v_ch_white'].'<br></div>
		<div class="profileHeaderRow"><label>(1) =  standardní bílý: </label>'.$allResult['coin_n_v_std_white'].'<br></div>
		<div class="profileHeaderRow"><label>(5) =  standardní bílý s hodnotou: </label>'.$allResult['coin_y_v_std_white'].'<hr><br></div>    

		<div class="profileHeaderRow"><label>(5) =  levný červený: </label>'.$allResult['coin_n_v_ch_red'].'<br></div>
		<div class="profileHeaderRow"><label>(5) =  standardní červený: </label>'.$allResult['coin_n_v_std_red'].'<br></div>
		<div class="profileHeaderRow"><label>(50) =  standardní červený s hodnotou: </label>'.$allResult['coin_y_v_std_red'].'<br></div>
		<div class="profileHeaderRow"><label>(5) =  matný červený s hodnotou: </label>'.$allResult['coin_y_v_oth_red'].'<br></div>
		<div class="profileHeaderRow"><label>(5) =  ultimate červený: </label>'.$allResult['coin_y_v_ult_red'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>(10) =  levný modrý: </label>'.$allResult['coin_n_v_ch_blue'].'<br></div>
		<div class="profileHeaderRow"><label>(10) =  standardní modrý: </label>'.$allResult['coin_n_v_std_blue'].'<br></div>
		<div class="profileHeaderRow"><label>(10) =  standardní modrý s hodnotou: </label>'.$allResult['coin_y_v_std_blue'].'<br></div>
		<div class="profileHeaderRow"><label>(10) =  ultimate tmavě modrý: </label>'.$allResult['coin_y_v_ult_darkblue'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>(25) =  levný zelený: </label>'.$allResult['coin_n_v_ch_green'].'<br></div>
		<div class="profileHeaderRow"><label>(25) =  standardní zelený: </label>'.$allResult['coin_n_v_std_green'].'<hr><br></div>
		<div class="profileHeaderRow"><label>(25) =  standardní zelený s hodnotou: </label>'.$allResult['coin_y_v_std_green'].'<br></div>
		<div class="profileHeaderRow"><label>(25) =  matný zelený s hodnotou: </label>'.$allResult['coin_y_v_oth_green'].'<br></div>
		<div class="profileHeaderRow"><label>(25) =  ultimate zelený: </label>'.$allResult['coin_y_v_ult_green'].'<hr><br></div>
		
		<div class="profileHeaderRow"><label>(50) =  matný světlemodrý s hodnotou: </label>'.$allResult['coin_y_v_oth_lightblue'].'<br></div>
		<div class="profileHeaderRow"><label>(50) =  ultimate světle modrý: </label>'.$allResult['coin_y_v_ult_lightblue'].'<hr><br></div>
		
		<div class="profileHeaderRow"><label>(100) =  levný černý: </label>'.$allResult['coin_n_v_ch_black'].'<br></div>
		<div class="profileHeaderRow"><label>(100) =  standardní černý: </label>'.$allResult['coin_n_v_std_black'].'<br></div>
		<div class="profileHeaderRow"><label>(100) =  standardní černý s hodnotou: </label>'.$allResult['coin_y_v_std_black'].'<br></div>
		<div class="profileHeaderRow"><label>(100) =  ultimate černý: </label>'.$allResult['coin_y_v_ult_black'].'<hr><br></div>

		<div class="profileHeaderRow"><label>(500) =  matný bílofialový s hodnotou: </label>'.$allResult['coin_y_v_oth_whitepurple'].'<br></div>
		<div class="profileHeaderRow"><label>(500) =  ultimate fialový: </label>'.$allResult['coin_y_v_ult_purple'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>(1000) =  ultimate žlutý: </label>'.$allResult['coin_y_v_ult_yellow'].'<hr><br></div>
            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivTTT">
        <label class="infoL">Hra - TicTacToe</label>
            <div class="profileHeader">
    
		
		<div class="profileHeaderRow"><label>Bilance: </label>'.$allResult['mon_wg_ttt_bal'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Vyhráno: </label>'.$allResult['mon_wg_ttt_won'].'<br></div>
		<div class="profileHeaderRow"><label>Prohráno: </label>'.$allResult['mon_wg_ttt_lost'].'<br></div>
		<div class="profileHeaderRow"><label>Vsazeno: </label>'.$allResult['mon_wg_ttt_bet'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet her: </label>'.$allResult['wg_numb_played_ttt_tot'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet výher: </label>'.$allResult['wg_numb_played_ttt_won'].'<br></div>
		<div class="profileHeaderRow"><label>Počet proher: </label>'.$allResult['wg_numb_played_ttt_lost'].'<hr><br></div>

            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivSpin">
        <label class="infoL">Hra - Automat</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>Bilance: </label>'.$allResult['mon_wg_spin_bal'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Vyhráno: </label>'.$allResult['mon_wg_spin_won'].'<br></div>
		<div class="profileHeaderRow"><label>Prohráno: </label>'.$allResult['mon_wg_spin_lost'].'<br></div>
		<div class="profileHeaderRow"><label>Vsazeno: </label>'.$allResult['mon_wg_spin_bet'].'<hr><br></div>

		<div class="profileHeaderRow"><label>Počet her: </label>'.$allResult['wg_numb_played_spin_tot'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet výher: </label>'.$allResult['wg_numb_played_spin_won'].'<br></div>
		<div class="profileHeaderRow"><label>Počet proher: </label>'.$allResult['wg_numb_played_spin_lost'].'<hr><br></div>

            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivRnd">
        <label class="infoL">Hra - Číselník</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>Bilance: </label>'.$allResult['mon_wg_rnd_bal'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Vyhráno: </label>'.$allResult['mon_wg_rnd_won'].'<br></div>
		<div class="profileHeaderRow"><label>Prohráno: </label>'.$allResult['mon_wg_rnd_lost'].'<br></div>
		<div class="profileHeaderRow"><label>Vsazeno: </label>'.$allResult['mon_wg_rnd_bet'].'<hr><br></div>

		<div class="profileHeaderRow"><label>Počet her: </label>'.$allResult['wg_numb_played_rnd_tot'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet výher: </label>'.$allResult['wg_numb_played_rnd_won'].'<br></div>
		<div class="profileHeaderRow"><label>Počet proher: </label>'.$allResult['wg_numb_played_rnd_lost'].'<hr><br></div>

            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivGameinfo">
        <label class="infoL">Herní info</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>Nasbíraných kolíků: </label>'.$allResult['cg_kolik_total'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet zahájených webových her: </label>'.$allResult['wg_numb_played_tot'].'<br></div>
		<div class="profileHeaderRow"><label>Počet všech vyhraných webových her: </label>'.$allResult['wg_numb_played_won'].'<br></div>
		<div class="profileHeaderRow"><label>Počet všech prohraných webových her: </label>'.$allResult['wg_numb_played_lost'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Hry jednotlivců - počet uskutečněných: </label>'.$allResult['ig_numb_played_tot'].'<hr><br></div>
		<div class="profileHeaderRow"><label>Hry jednotlivců - počet vyhraných: </label>'.$allResult['ig_numb_played_won'].'<hr><br></div>
		<div class="profileHeaderRow"><label>Hry jednotlivců - počet prohraných: </label>'.$allResult['ig_numb_played_lost'].'<hr><br></div>
		    

            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivGiftsRewards">
        <label class="infoL">Dary a odměny</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>Počet darů od Dominika: </label>'.$allResult['gifts_user_by_dom_tot'].'<br></div>
		<div class="profileHeaderRow"><label>Hodnota celkem: </label>'.$allResult['gifts_user_by_dom_val'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet darů od organizátorů: </label>'.$allResult['gifts_user_by_org_tot'].'<br></div>
		<div class="profileHeaderRow"><label>Hodnota celkem: </label>'.$allResult['gifts_user_by_org_val'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet darů od táborových vedoucích: </label>'.$allResult['gifts_user_by_cl_tot'].'<br></div>
		<div class="profileHeaderRow"><label>Hodnota celkem: </label>'.$allResult['gifts_user_by_cl_val'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet darů od systému: </label>'.$allResult['gifts_user_by_sys_tot'].'<br></div>
		<div class="profileHeaderRow"><label>Hodnota celkem: </label>'.$allResult['gifts_user_by_sys_val'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Počet darů od kapitána: </label>'.$allResult['gifts_team_by_cpt_tot'].'<br></div>
		<div class="profileHeaderRow"><label>Hodnota celkem: </label>'.$allResult['gifts_team_by_cpt_val'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Odměna z her - peníze z darů ze hry: </label>'.$allResult['mon_to_div_from_cg_divided_already'].'<br></div>
		<div class="profileHeaderRow"><label>Odměna z her - peníze z rozdělování kapitánem: </label>'.$allResult['mon_to_div_from_cpt_divided_already'].'<br></div>
		<div class="profileHeaderRow"><label>Odměna z her - celkem: </label>'.$allResult['mon_to_div_divided_tot'].'<hr><br></div>

            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivQRs">
        <label class="infoL">QR kódy a jiné kódy</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>QR kódy - počet nasbíraných: </label>'.$allResult['qr_tot'].'<br></div>
		<div class="profileHeaderRow"><label>QR kódy - hodnota celkem: </label>'.$allResult['qr_mon_tot'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>QR kódy - peníze pro uživatele: </label>'.$allResult['qr_mon_users'].'<br></div>
		<div class="profileHeaderRow"><label>QR kódy - peníze pro tým: </label>'.$allResult['qr_mon_teams'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Jiné kódy - počet nasbíraných: </label>'.$allResult['code_oth_tot'].'<br></div>
		<div class="profileHeaderRow"><label>Jiné kódy - zisk celkem: </label>'.$allResult['code_oth_mon_tot'].'<hr><br></div>

            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivBank">
        <label class="infoL">Banka</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>Počet transakcí: </label>'.$allResult['data_bank_trans_tot'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Hodnota odeslaného: </label>'.$allResult['data_bank_trans_val_sent'].'<br></div>
		<div class="profileHeaderRow"><label>Hodnota přijmutého: </label>'.$allResult['data_bank_trans_val_received'].'<hr><br></div>
		
            </div>
        </div>
    ';
    
    echo'
            
        <div class="sharedProfileDiv profileDivClean">
        <label class="infoL">Úklid</label>
            <div class="profileHeader">
    
		<div class="profileHeaderRow"><label>Bilance: </label>'.$allResult['data_cleanpts_bal'].'<hr><br></div>
		    
		<div class="profileHeaderRow"><label>Získáno: </label>'.$allResult['data_cleanpts_earned'].'<br></div>
		<div class="profileHeaderRow"><label>Strhnuto: </label>'.$allResult['data_cleanpts_lost'].'<hr><br></div>
		
            </div>
        </div>
    ';          

?>


