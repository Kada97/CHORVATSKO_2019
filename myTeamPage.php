<?php
    include '_connectDB.php';
    include_once '_dbRecountTeamdata.php';
    
    $idTeamsForRecount = array();
    $idTeamsForRecount[] = $_SESSION['userTeamID'];
    dbRecountTeamdata($idTeamsForRecount);
    
    if(isset($res)){unset($res);}
    $sql = "SELECT * FROM teamdata WHERE id ='".$_SESSION['userTeamID']."';";
    $get = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($get);
?>


    <div class="teamProfileDiv">
        <label class="teamProfileHeader">Nadpis</label>
        
        <div class="teamProfileRow"><label>Týmový kapitán: </label><?php echo $res['data_teamcpt']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Celkové skóre: </label><?php echo $res['score']; ?><br></div>
        <div class="teamProfileRow"><label>Získané body v táborových soutěžích: </label><?php echo $res['mon_cg_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Počet bodů z kolíků: </label><?php echo $res['cg_kolik_total']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Aktuální peníze v týmu: </label><?php echo $res['mon_all_bal']; ?><br></div>
        <div class="teamProfileRow"><label>Celkem vyhrané peníze: </label><?php echo $res['mon_all_won']; ?><br></div>
        <div class="teamProfileRow"><label>Celkem prohrané peníze: </label><?php echo $res['mon_all_lost']; ?><br></div>
        <div class="teamProfileRow"><label>Celkem vsazené peníze: </label><?php echo $res['mon_all_bet']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>WEBhry - hry celkem: </label><?php echo $res['wg_numb_played_tot']; ?><br></div>
        <div class="teamProfileRow"><label>WEBhry - hry vyhrané: </label><?php echo $res['wg_numb_played_won']; ?><br></div>
        <div class="teamProfileRow"><label>WEBhry - hry prohrané: </label><?php echo $res['wg_numb_played_lost']; ?><br></div>
        <div class="teamProfileRow"><label>WEBhry - hry remizované: </label><?php echo $res['wg_numb_played_draw']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>WEBhry - celkový zisk: </label><?php echo $res['mon_wg_all_bal']; ?><br></div>
        <div class="teamProfileRow"><label>WEBhry - vyhrané peníze: </label><?php echo $res['mon_wg_all_won']; ?><br></div>
        <div class="teamProfileRow"><label>WEBhry - prohrané peníze: </label><?php echo $res['mon_wg_all_lost']; ?><br></div>
        <div class="teamProfileRow"><label>WEBhry - vsazené peníze: </label><?php echo $res['mon_wg_all_bet']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Individuální hry - hry celkem: </label><?php echo $res['ig_numb_played_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Individuální hry - hry vyhrané: </label><?php echo $res['ig_numb_played_won']; ?><br></div>
        <div class="teamProfileRow"><label>Individuální hry - hry prohrané: </label><?php echo $res['ig_numb_played_lost']; ?><br></div>
        <div class="teamProfileRow"><label>Individuální hry - hry remizované: </label><?php echo $res['ig_numb_played_draw']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Individuální hry - celkový zisk: </label><?php echo $res['mon_ig_all_bal']; ?><br></div>
        <div class="teamProfileRow"><label>Individuální hry - vyhrané peníze: </label><?php echo $res['mon_ig_all_won']; ?><br></div>
        <div class="teamProfileRow"><label>Individuální hry - prohrané peníze: </label><?php echo $res['mon_ig_all_lost']; ?><br></div>
        <div class="teamProfileRow"><label>Individuální hry - vsazené peníze: </label><?php echo $res['mon_ig_all_bet']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Dary - celkový počet: </label><?php echo $res['gifts_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Dary - celková hodnota: </label><?php echo $res['gifts_val']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Dary jednotlivci - celkový počet: </label><?php echo $res['gifts_user_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Dary jednotlivci - celková hodnota: </label><?php echo $res['gifts_user_val']; ?><br></div>
        <div class="teamProfileRow"><label>Dary jednotlivci - celkem od Dominika: </label><?php echo $res['gifts_user_by_dom_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Dary jednotlivci - celková hodnota od Dominika: </label><?php echo $res['gifts_user_by_dom_val']; ?><br></div>
        <div class="teamProfileRow"><label>Dary jednotlivci - celkem od organizátorů: </label><?php echo $res['gifts_user_by_org_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Dary jednotlivci - celková hodnota od organizátorů: </label><?php echo $res['gifts_user_by_org_val']; ?><br></div>
        <div class="teamProfileRow"><label>Dary jednotlivci - celkem od vedoucích: </label><?php echo $res['gifts_user_by_cl_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Dary jednotlivci - celková hodnota od vedoucích: </label><?php echo $res['gifts_user_by_cl_val']; ?><br></div>
        <div class="teamProfileRow"><label>Dary jednotlivci - celkem od systému: </label><?php echo $res['gifts_user_by_sys_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Dary jednotlivci - celková hodnota od systému: </label><?php echo $res['gifts_user_by_sys_val']; ?><br></div>
        <div class="teamProfileRow"><label>Dary jednotlivci - celkový počet od kapitánů týmů: </label><?php echo $res['gifts_team_by_cpt_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Dary jednotlivci - celková hodnota od kapitánů týmů: </label><?php echo $res['gifts_team_by_cpt_val']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Dary týmové - celkový počet: </label><?php echo $res['gifts_team_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Dary týmové - celková hodnota: </label><?php echo $res['gifts_team_val']; ?><br></div>
        <div class="teamProfileRow"><label>Dary týmové - celkový počet od Dominika: </label><?php echo $res['gifts_team_by_dom_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Dary týmové - celková hodnota od Dominika: </label><?php echo $res['gifts_team_by_dom_val']; ?><br></div>
        <div class="teamProfileRow"><label>Dary týmové - celkových počet od organizátorů: </label><?php echo $res['gifts_team_by_org_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Dary týmové - celková hodnota od organizátorů: </label><?php echo $res['gifts_team_by_org_val']; ?><br></div>
        <div class="teamProfileRow"><label>Dary týmové - celkový počet od vedoucích: </label><?php echo $res['gifts_team_by_cl_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Dary týmové - celková hodnota od vedoucích: </label><?php echo $res['gifts_team_by_cl_val']; ?><br></div>
        
        <div class="teamProfileRow"><label>Dary týmové - celkový počet od systému: </label><?php echo $res['gifts_team_by_sys_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Dary týmové - celková hodnota od systému: </label><?php echo $res['gifts_team_by_sys_val']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Peníze k rozdělení z týmových her: </label><?php echo $res['mon_to_div_from_cg_remains']; ?><br></div>
        <div class="teamProfileRow"><label>Rozdělené peníze z týmových her: </label><?php echo $res['mon_to_div_from_cg_divided_already']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Kapitán může rozdělit bonusy: </label><?php echo $res['mon_to_div_from_cpt_remains']; ?><br></div>
        <div class="teamProfileRow"><label>Kapitán rozdělil bonusy v hodnotě: </label><?php echo $res['mon_to_div_from_cpt_divided_already']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Peníze z kódů: </label><?php echo $res['mon_to_div_from_qr_remains']; ?><br></div>
        <div class="teamProfileRow"><label>Rozdělené peníze z kódů: </label><?php echo $res['mon_to_div_from_qr_divided_already']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Celkem všechny rozdělené peníze: </label><?php echo $res['mon_to_div_divided_tot']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Počet nasbíraných všech kódů: </label><?php echo $res['code_total']; ?><br></div>
        <div class="teamProfileRow"><label>Hodnota peněz ze všech kódů: </label><?php echo $res['code_mon_total']; ?><br><hr></div>
        <div class="teamProfileRow"><label>Počet nasbraných QR kódů pro tým: </label><?php echo $res['qr_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Peníze z QR kódů celkem: </label><?php echo $res['qr_mon_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Z toho pro uživatele: </label><?php echo $res['qr_mon_users']; ?><br></div>
        <div class="teamProfileRow"><label>Z toho pro týmy: </label><?php echo $res['qr_mon_teams']; ?><br><hr></div>
        
        
        
        <div class="teamProfileRow"><label>1. nejaktivnější hráč: </label><?php echo $res['memb_activ_first']; ?><br></div>
        <div class="teamProfileRow"><label>2. nejaktivnější hráč: </label><?php echo $res['memb_activ_second']; ?><br></div>
        <div class="teamProfileRow"><label>3. nejaktivnější hráč: </label><?php echo $res['memb_activ_third']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>1. nejproduktivnější hráč: </label><?php echo $res['memb_profit_first']; ?><br></div>
        <div class="teamProfileRow"><label>2. nejproduktivnější hráč: </label><?php echo $res['memb_profit_second']; ?><br></div>
        <div class="teamProfileRow"><label>3. nejproduktivnější hráč: </label><?php echo $res['memb_profit_third']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Celkový počet přihlášení do webové aplikace: </label><?php echo $res['data_weblogins']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Bilance úklidové peníze (body): </label><?php echo $res['data_cleanpts_bal']; ?><br></div>
        <div class="teamProfileRow"><label>Získané úklidové peníze (body): </label><?php echo $res['data_cleanpts_earned']; ?><br></div>
        <div class="teamProfileRow"><label>Ztracené úklidové peníze (body): </label><?php echo $res['data_cleanpts_lost']; ?><br><hr></div>
        
        <div class="teamProfileRow"><label>Počet bankovních transakcí v týmu - celkem: </label><?php echo $res['data_bank_trans_tot']; ?><br></div>
        <div class="teamProfileRow"><label>Odchozích transakcí: </label><?php echo $res['data_bank_trans_numb_sent']; ?><br></div>
        <div class="teamProfileRow"><label>Příchozích transakcí: </label><?php echo $res['data_bank_trans_numb_received']; ?><br></div>
        <div class="teamProfileRow"><label>Celkem odesláno: </label><?php echo $res['data_bank_trans_val_sent']; ?><br></div>
        <div class="teamProfileRow"><label>Celkem přijato: </label><?php echo $res['data_bank_trans_val_received']; ?><br><hr></div>
		
    </div>
    
    
    
    
    
    
    
    



