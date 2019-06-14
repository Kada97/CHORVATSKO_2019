<?php
    // DEFINE A RANK
    $wl = $userDataResult['data_weblogins'];
    $rank = "";
    
    $nwl = 0;
    $nwl += $wl;
    $nwl /=3;
    $nwl = round($nwl);
    
    switch ($nwl) {
	case 0 : $rank = "NOOB"; break;
	case 1 : $rank = "WEBOVÝ ODPAD"; break;
	case 2 : $rank = "NÁVŠTĚVNÍK"; break;
	case 3 : $rank = "TEN, KDO TO VZAL VÁŽNĚ"; break;
	case 4 : $rank = "CHVÁLYHODNÝ"; break;
	case 5 : $rank = "ZKUŠENÝ"; break;
	case 6 : $rank = "NOLIFER"; break;
	case 7 : $rank = "ZÁVISLÝ"; break;
	case 8 : $rank = "NEOČEKÁVANÝ"; break;
	case 9 : $rank = "SAHAJÍCÍ ZA HRANICE VESMÍRU"; break;
    }
    
    // COUNTING OF TOTAL MONEY OF QR
    
    $qr_mon_users = $userDataResult['qr_mon_users'];
    $qr_mon_teams = $userDataResult['qr_mon_teams'];
    $qr_mon_tot = $qr_mon_users + $qr_mon_teams;
    
    // COUNTING OF ALL DIVIDED MONEY ALREADY
    $mon_to_div_divided_tot = $userDataResult['mon_to_div_from_cg_divided_already'] + $userDataResult['mon_to_div_from_cpt_divided_already'];
    
    // COUNTING MONEY BALANCE AT INDIVIDUAL GAMES
    $mon_ig_all_bal = $userDataResult['mon_ig_all_won'] - $userDataResult['mon_ig_all_lost'];
    
    // COUNTING MONEY BALANCE FOR EACH WEB GAME
    $mon_wg_rnd_bal = $userDataResult['mon_wg_rnd_won'] - $userDataResult['mon_wg_rnd_lost'];
    $mon_wg_spin_bal = $userDataResult['mon_wg_spin_won'] - $userDataResult['mon_wg_spin_lost'];
    $mon_wg_ttt_bal = $userDataResult['mon_wg_ttt_won'] - $userDataResult['mon_wg_ttt_lost'];
    
    // COUNTING WEB GAMES STATS
    $mon_wg_all_bet = $userDataResult['mon_wg_ttt_bet'] + $userDataResult['mon_wg_spin_bet'] + $userDataResult['mon_wg_rnd_bet'];
    $mon_wg_all_lost = $userDataResult['mon_wg_ttt_lost'] + $userDataResult['mon_wg_spin_lost'] + $userDataResult['mon_wg_rnd_lost'];
    $mon_wg_all_won = $userDataResult['mon_wg_ttt_won'] + $userDataResult['mon_wg_spin_won'] + $userDataResult['mon_wg_rnd_won'];
    $mon_wg_all_bal = $mon_wg_all_won - $mon_wg_all_lost;
    
    // COUNTING OF TOTAL NUMBERS PLAYED WEB GAMES
    $wg_numb_played_lost = $userDataResult['wg_numb_played_ttt_lost'] + $userDataResult['wg_numb_played_spin_lost'] + $userDataResult['wg_numb_played_rnd_lost'];
    $wg_numb_played_won	= $userDataResult['wg_numb_played_ttt_won'] + $userDataResult['wg_numb_played_spin_won'] + $userDataResult['wg_numb_played_rnd_won'];
    $wg_numb_played_tot	= $wg_numb_played_won + $wg_numb_played_lost;
