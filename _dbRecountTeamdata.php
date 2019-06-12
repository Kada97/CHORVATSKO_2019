<?php
    function dbRecountTeamdata($teamsToRecount) {
        include '_connectDB.php';
        
        $userdataColumns = getUserdataColumnsForTeamdata();
        $moneyrecordsColumns = getMoneyrecordsColumns();
        $teamdataColumns = getTeamdataColumns();
        $kolikdataColumns = getKolikdataColumns();
        
        for ($i = 0; $i < count($teamsToRecount); $i++) {
            $id                                         = $teamsToRecount[$i];
            
            $mon_all_won                                = 0;
            $mon_all_lost                               = 0;
            $mon_all_bet                                = 0;
            $cg_kolik_total                             = 0;
            $score                                      = 0;
            $mon_cg_tot                                 = 0;
            $wg_numb_played_won                         = 0;
            $wg_numb_played_lost                        = 0;
            $wg_numb_played_draw                        = 0;
            $mon_wg_all_won                             = 0;
            $mon_wg_all_lost                            = 0;
            $mon_wg_all_bet                             = 0;
            $ig_numb_played_won                         = 0;
            $ig_numb_played_lost                        = 0;
            $ig_numb_played_draw                        = 0;
            $mon_ig_all_won                             = 0;
            $mon_ig_all_lost                            = 0;
            $mon_ig_all_bet                             = 0;
            $gifts_user_by_dom_tot                      = 0;
            $gifts_user_by_dom_val                      = 0;
            $gifts_user_by_org_tot                      = 0;
            $gifts_user_by_org_val                      = 0;
            $gifts_user_by_cl_tot                       = 0;
            $gifts_user_by_cl_val                       = 0;
            $gifts_user_by_sys_tot                      = 0;
            $gifts_user_by_sys_val                      = 0;
            $gifts_team_by_dom_tot                      = 0;
            $gifts_team_by_dom_val                      = 0;
            $gifts_team_by_org_tot                      = 0;
            $gifts_team_by_org_val                      = 0;
            $gifts_team_by_cl_tot                       = 0;
            $gifts_team_by_cl_val                       = 0;
            $gifts_team_by_cpt_tot                      = 0;
            $gifts_team_by_cpt_val                      = 0;
            $gifts_team_by_sys_tot                      = 0;
            $gifts_team_by_sys_val                      = 0;
            $qr_tot                                     = 0;
            $qr_mon_users                               = 0;
            $qr_mon_teams                               = 0;
            $money_extra_code                           = 0;
            $code_total                                 = 0;
            $code_mon                                   = 0;
            $data_weblogins                             = 0;
            $data_cleanpts_earned                       = 0;
            $data_cleanpts_lost                         = 0;
            $data_bank_trans_val_sent                   = 0;
            $data_bank_trans_val_received               = 0;
            $data_bank_trans_numb_sent                  = 0;
            $data_bank_trans_numb_received              = 0;

            // KOLIKDATA GET
            for ($j = 0; $j < count($kolikdataColumns); $j++) {
                $tempColumn = $kolikdataColumns[$j];

                $sqlGenericValueKolikdata = "SELECT ".$tempColumn." AS result FROM data_team_kolik WHERE id = '".$id."';";
                $queryGenericValueKolikdata = mysqli_query($conn,$sqlGenericValueKolikdata);
                $resultGenericValueKolikdata = mysqli_fetch_array($queryGenericValueKolikdata);

                switch ($tempColumn) {

                    case 'total_points_balance': $cg_kolik_total += $resultGenericValueKolikdata[0]; break;
                }
            }
            
            
            // USERDATA GET
            for ($j = 0; $j < count($userdataColumns); $j++) {
                $tempColumn = $userdataColumns[$j];

                $sqlGenericValueUserdata = "SELECT SUM(".$tempColumn.") AS result FROM userdata WHERE teamId = '".$id."';";
                $queryGenericValueUserdata = mysqli_query($conn,$sqlGenericValueUserdata);
                $resultGenericValueUserdata = mysqli_fetch_array($queryGenericValueUserdata);

/*
        'code_ig_entered',
        'code_kolikCode',
        'gifts_number_wg',
*/
                switch ($tempColumn) {

                    case 'score':                       $score                                     += $resultGenericValueUserdata[0]; break;
                    case 'wg_numb_played_won':          $wg_numb_played_won                        += $resultGenericValueUserdata[0]; break;
                    case 'wg_numb_played_lost':         $wg_numb_played_lost                       += $resultGenericValueUserdata[0]; break;
                    case 'wg_numb_played_draw':         $wg_numb_played_draw                       += $resultGenericValueUserdata[0]; break;
                    case 'ig_numb_played_won':          $ig_numb_played_won                        += $resultGenericValueUserdata[0]; break;
                    case 'ig_numb_played_lost':         $ig_numb_played_lost                       += $resultGenericValueUserdata[0]; break;
                    case 'ig_numb_played_draw':         $ig_numb_played_draw                       += $resultGenericValueUserdata[0]; break;
                    
                    case 'gifts_number_ig_dk':
                    case 'gifts_number_tg_dk':          $gifts_user_by_dom_tot                     += $resultGenericValueUserdata[0]; break;
                    
                    case 'gifts_number_tg_org':
                    case 'gifts_number_ig_org':         $gifts_user_by_org_tot                     += $resultGenericValueUserdata[0]; break;
                    
                    case 'gifts_number_tg_cl':
                    case 'gifts_number_ig_cl':          $gifts_user_by_cl_tot                      += $resultGenericValueUserdata[0]; break;
                    
                    case 'gifts_number_tg_sys':
                    case 'gifts_number_ig_sys':         $gifts_user_by_sys_tot                     += $resultGenericValueUserdata[0]; break;
                    
                    case 'gifts_number_tg_cpt':         $gifts_team_by_cpt_tot                     += $resultGenericValueUserdata[0]; break;
                    case 'code_tg_entered':             $qr_tot                                    += $resultGenericValueUserdata[0]; break;
                    case 'code_total':                  $code_total                                += $resultGenericValueUserdata[0]; break;
                    case 'weblogins':                   $data_weblogins                            += $resultGenericValueUserdata[0]; break;
                    case 'data_bank_trans_outgoing':    $data_bank_trans_numb_sent                  += $resultGenericValueUserdata[0]; break;
                    case 'data_bank_trans_incoming':    $data_bank_trans_numb_received              += $resultGenericValueUserdata[0]; break;
                }
            }
            
            // TEAMDATA GET
            for ($j = 0; $j < count($teamdataColumns); $j++) {
                $tempColumn = $teamdataColumns[$j];

                $sqlGenericValueTeamdata = "SELECT SUM(".$tempColumn.") AS result FROM teamdata WHERE id = '".$id."';";
                $queryGenericValueTeamdata = mysqli_query($conn,$sqlGenericValueTeamdata);
                $resultGenericValueTeamdata = mysqli_fetch_array($queryGenericValueTeamdata);

/*
        'code_ig_entered',
        'code_tg_entered',
        'code_kolikCode',
        'wg_numb_played_draw',
        'gifts_number_wg',
        'ig_numb_played_draw',
*/
                switch ($tempColumn) {
                    case 'gifts_team_by_dom_tot':    $gifts_team_by_dom_tot     += $resultGenericValueTeamdata[0]; break;
                    case 'gifts_team_by_dom_val':    $gifts_team_by_dom_val     += $resultGenericValueTeamdata[0]; break;
                    case 'gifts_team_by_org_tot':    $gifts_team_by_org_tot     += $resultGenericValueTeamdata[0]; break;
                    case 'gifts_team_by_org_val':    $gifts_team_by_org_val     += $resultGenericValueTeamdata[0]; break;
                    case 'gifts_team_by_cl_tot':     $gifts_team_by_cl_tot      += $resultGenericValueTeamdata[0]; break;
                    case 'gifts_team_by_cl_val':     $gifts_team_by_cl_val      += $resultGenericValueTeamdata[0]; break;
                    case 'gifts_team_by_sys_tot':    $gifts_team_by_sys_tot     += $resultGenericValueTeamdata[0]; break;
                    case 'gifts_team_by_sys_val':    $gifts_team_by_sys_val     += $resultGenericValueTeamdata[0]; break;
                    case 'qr_mon_teams':             $qr_mon_teams              += $resultGenericValueTeamdata[0]; break;
                    case 'code_mon':                 $code_mon                  += $resultGenericValueTeamdata[0]; break;
                }
            }

            // MONEYRECORDS GET
            for ($j = 0; $j < count($moneyrecordsColumns); $j++) {
                $tempColumn = $moneyrecordsColumns[$j];

                $sqlGenericValueMoneyrecords = "SELECT SUM(".$tempColumn.") AS result FROM money_records WHERE teamId = '".$id."';";
                $queryGenericValueMoneyrecords = mysqli_query($conn,$sqlGenericValueMoneyrecords);
                $resultGenericValueMoneyrecords = mysqli_fetch_array($queryGenericValueMoneyrecords);

/*
        'money_actual_total',
        'money_total_received',
        'money_sent',
        'money_received',
        'money_tg_received',
        'money_extra_web_total',
        'money_extra_web_rank',
        'money_extra_web_achievements',
        'money_extra_qr_total',
        'money_extra_clean_balance',
        'money_sanctions',
        'coin_value_total',
        'coin_value_earned',
        'coin_value_returned',
*/                   
                switch ($tempColumn) {
                    case 'money_total_won':         $mon_all_won                               += $resultGenericValueMoneyrecords[0]; break;
                    case 'money_total_lost':        $mon_all_lost                              += $resultGenericValueMoneyrecords[0]; break;
                    case 'money_total_bet':         $mon_all_bet                               += $resultGenericValueMoneyrecords[0]; break;
                    case 'money_web_won':           $mon_wg_all_won                            += $resultGenericValueMoneyrecords[0]; break;
                    case 'money_web_lost':          $mon_wg_all_lost                           += $resultGenericValueMoneyrecords[0]; break;
                    case 'money_web_bet':           $mon_wg_all_bet                            += $resultGenericValueMoneyrecords[0]; break;
                    case 'money_ig_won':            $mon_ig_all_won                            += $resultGenericValueMoneyrecords[0]; break;
                    case 'money_ig_lost':           $mon_ig_all_lost                           += $resultGenericValueMoneyrecords[0]; break;
                    case 'money_ig_bet':            $mon_ig_all_bet                            += $resultGenericValueMoneyrecords[0]; break;
                    
                    case 'money_extra_tg_dk':
                    case 'money_extra_ig_dk':       $gifts_user_by_dom_val                     += $resultGenericValueMoneyrecords[0]; break;
                    
                    case 'money_extra_tg_org':
                    case 'money_extra_ig_org':      $gifts_user_by_org_val                     += $resultGenericValueMoneyrecords[0]; break;
                    
                    case 'money_extra_tg_cl':
                    case 'money_extra_ig_cl':       $gifts_user_by_cl_val                      += $resultGenericValueMoneyrecords[0]; break;
                    
                    case 'money_extra_tg_sys':
                    case 'money_extra_ig_sys':      $gifts_user_by_sys_val                     += $resultGenericValueMoneyrecords[0]; break;
                    
                    case 'money_extra_tg_cpt':      $gifts_team_by_cpt_val                     += $resultGenericValueMoneyrecords[0]; break;
                    case 'money_extra_qr_ig':       $qr_mon_users                              += $resultGenericValueMoneyrecords[0]; break;
                    //case 'money_extra_qr_tg':       $qr_mon_teams                              += $resultGenericValueMoneyrecords[0]; break;
                    //case 'money_extra_code_total':  $code_mon_total                            += $resultGenericValueMoneyrecords[0]; break;
                    case 'money_extra_code':        $money_extra_code                          += $resultGenericValueMoneyrecords[0]; break;
                    case 'money_extra_clean_won':   $data_cleanpts_earned                      += $resultGenericValueMoneyrecords[0]; break;
                    case 'money_extra_clean_lost':  $data_cleanpts_lost                        += $resultGenericValueMoneyrecords[0]; break;
                    
                
                    case 'money_sent':              $data_bank_trans_val_sent                  += $resultGenericValueMoneyrecords[0]; break;
                    case 'money_received':          $data_bank_trans_val_received              += $resultGenericValueMoneyrecords[0]; break;
                    
                
                }
            } 
        
        
            $sqlBestProfit = "SELECT username, score FROM userdata WHERE teamId = '".$id."' ORDER BY score DESC LIMIT";
            $sqlBestActive = "SELECT username, weblogins+code_total+gifts_number_total+wg_numb_played_total+ig_numb_played_total AS coeficient FROM userdata WHERE teamId = '".$id."' ORDER BY coeficient DESC LIMIT";
            $limitFirst = " 0,1;";
            $limitSecond = " 1,1;";
            $limitThird = " 2,1;";

            $sqlBestProfitFirstUser     = $sqlBestProfit.$limitFirst;
            $sqlBestProfitSecondUser    = $sqlBestProfit.$limitSecond;
            $sqlBestProfitThirdUser     = $sqlBestProfit.$limitThird;
            $sqlBestActiveFirstUser     = $sqlBestActive.$limitFirst;
            $sqlBestActiveSecondUser    = $sqlBestActive.$limitSecond;
            $sqlBestActiveThirdUser     = $sqlBestActive.$limitThird;

            $queryBestProfitFirstUser   = mysqli_query($conn,$sqlBestProfitFirstUser);
            $queryBestProfitSecondUser  = mysqli_query($conn,$sqlBestProfitSecondUser);
            $queryBestProfitThirdUser   = mysqli_query($conn,$sqlBestProfitThirdUser);
            $queryBestActiveFirstUser   = mysqli_query($conn,$sqlBestActiveFirstUser);
            $queryBestActiveSecondUser  = mysqli_query($conn,$sqlBestActiveSecondUser);
            $queryBestActiveThirdUser   = mysqli_query($conn,$sqlBestActiveThirdUser);

            $resultBestProfitFirstUser  = mysqli_fetch_array($queryBestProfitFirstUser);
            $resultBestProfitSecondUser = mysqli_fetch_array($queryBestProfitSecondUser);
            $resultBestProfitThirdUser  = mysqli_fetch_array($queryBestProfitThirdUser);
            $resultBestActiveFirstUser  = mysqli_fetch_array($queryBestActiveFirstUser);
            $resultBestActiveSecondUser = mysqli_fetch_array($queryBestActiveSecondUser);
            $resultBestActiveThirdUser  = mysqli_fetch_array($queryBestActiveThirdUser);
            
            
            $sqlConvertTeamIdToName = "SELECT name FROM teams WHERE id = '".$id."'";
            $queryConvertTeamIdToName = mysqli_query($conn, $sqlConvertTeamIdToName);
            $resultConvertTeamIdToName = mysqli_fetch_assoc($queryConvertTeamIdToName);
            $teamName = $resultConvertTeamIdToName['name'];
            
            $sqlTeamGamesWonMoney = "SELECT SUM({$teamName}*game_budget/100) as result FROM data_team_games WHERE 1 ";
            $queryTeamGamesWonMoney = mysqli_query($conn, $sqlTeamGamesWonMoney);
            $resultTeamGamesWonMoney = mysqli_fetch_assoc($queryTeamGamesWonMoney);
            $mon_cg_tot = $resultTeamGamesWonMoney['result'];
            
            $gifts_team_tot                             = $gifts_team_by_dom_tot + $gifts_team_by_org_tot + $gifts_team_by_cl_tot + $gifts_team_by_sys_tot;
            $gifts_team_val                             = $gifts_team_by_dom_val + $gifts_team_by_org_val + $gifts_team_by_cl_val + $gifts_team_by_sys_val;
            $gifts_user_val                             = $gifts_user_by_dom_val + $gifts_user_by_org_val + $gifts_user_by_cl_val + $gifts_user_by_sys_val + $gifts_team_by_cpt_val;
            $gifts_user_tot                             = $gifts_user_by_dom_tot + $gifts_user_by_org_tot + $gifts_user_by_cl_tot + $gifts_user_by_sys_tot + $gifts_team_by_cpt_tot;
            $gifts_val                                  = $gifts_user_val + $gifts_team_val;
            $gifts_tot                                  = $gifts_user_tot + $gifts_team_tot;
            $mon_ig_all_bal                             = $mon_ig_all_won - $mon_ig_all_lost;
            $ig_numb_played_tot                         = $ig_numb_played_won + $ig_numb_played_lost + $ig_numb_played_draw;
            $wg_numb_played_tot                         = $wg_numb_played_won + $wg_numb_played_lost + $wg_numb_played_draw;
            $mon_wg_all_bal                             = $mon_wg_all_won -$mon_wg_all_lost;
            $mon_all_bal                                = $mon_all_won - $mon_all_lost;

            $qr_tot                                     += 0;
            $qr_mon_tot                                 = $qr_mon_users + $qr_mon_teams;
            $memb_activ_first                           = ($resultBestActiveFirstUser[0] == null ? 'n/a' : $resultBestActiveFirstUser[0] . ' (koeficient: ' . $resultBestActiveFirstUser[1] . ')');
            $memb_activ_second                          = ($resultBestActiveSecondUser[0] == null ? 'n/a' : $resultBestActiveSecondUser[0]. ' (koeficient: ' . $resultBestActiveSecondUser[1] . ')');
            $memb_activ_third                           = ($resultBestActiveThirdUser[0] == null ? 'n/a' : $resultBestActiveThirdUser[0]. ' (koeficient: ' . $resultBestActiveThirdUser[1] . ')');
            $memb_profit_first                          = ($resultBestProfitFirstUser[0] == null ? 'n/a' : $resultBestProfitFirstUser[0]. ' (score: ' . $resultBestProfitFirstUser[1] . ')');
            $memb_profit_second                         = ($resultBestProfitSecondUser[0] == null ? 'n/a' : $resultBestProfitSecondUser[0]. ' (score: ' . $resultBestProfitSecondUser[1] . ')');
            $memb_profit_third                          = ($resultBestProfitThirdUser[0] == null ? 'n/a' : $resultBestProfitThirdUser[0]. ' (score: ' . $resultBestProfitThirdUser[1] . ')');
            $data_cleanpts_bal                          = $data_cleanpts_earned - $data_cleanpts_lost;
            $data_bank_trans_tot                        = $data_bank_trans_numb_sent + $data_bank_trans_numb_received;
            $code_mon_total                             = $qr_mon_tot + $code_mon + $money_extra_code;






            $sqlTeamdataUpdate =
            "UPDATE teamdata SET "
            . "mon_all_bal = '".$mon_all_bal."', "
            . "mon_all_won = '".$mon_all_won."', "
            . "mon_all_lost = '".$mon_all_lost."', "
            . "mon_all_bet = '".$mon_all_bet."', "
            . "mon_cg_tot = '".$mon_cg_tot."', "
            . "cg_kolik_total = '".$cg_kolik_total."', "
            . "score = '".$score."', "
            . "wg_numb_played_tot = '".$wg_numb_played_tot."', "
            . "wg_numb_played_won = '".$wg_numb_played_won."', "
            . "wg_numb_played_lost = '".$wg_numb_played_lost."', "
            . "wg_numb_played_draw = '".$wg_numb_played_draw."', "
            . "mon_wg_all_bal = '".$mon_wg_all_bal."', "
            . "mon_wg_all_won = '".$mon_wg_all_won."', "
            . "mon_wg_all_lost = '".$mon_wg_all_lost."', "
            . "mon_wg_all_bet = '".$mon_wg_all_bet."', "
            . "ig_numb_played_tot = '".$ig_numb_played_tot."', "
            . "ig_numb_played_won = '".$ig_numb_played_won."', "
            . "ig_numb_played_lost = '".$ig_numb_played_lost."', "
            . "ig_numb_played_draw = '".$ig_numb_played_draw."', "
            . "mon_ig_all_bal = '".$mon_ig_all_bal."', "
            . "mon_ig_all_won = '".$mon_ig_all_won."', "
            . "mon_ig_all_lost = '".$mon_ig_all_lost."', "
            . "mon_ig_all_bet = '".$mon_ig_all_bet."', "
            . "gifts_tot = '".$gifts_tot."', "
            . "gifts_val = '".$gifts_val."', "
            . "gifts_user_tot = '".$gifts_user_tot."', "
            . "gifts_user_val = '".$gifts_user_val."', "
            . "gifts_user_by_dom_tot = '".$gifts_user_by_dom_tot."', "
            . "gifts_user_by_dom_val = '".$gifts_user_by_dom_val."', "
            . "gifts_user_by_org_tot = '".$gifts_user_by_org_tot."', "
            . "gifts_user_by_org_val = '".$gifts_user_by_org_val."', "
            . "gifts_user_by_cl_tot = '".$gifts_user_by_cl_tot."', "
            . "gifts_user_by_cl_val = '".$gifts_user_by_cl_val."', "
            . "gifts_user_by_sys_tot = '".$gifts_user_by_sys_tot."', "
            . "gifts_user_by_sys_val = '".$gifts_user_by_sys_val."', "
            . "gifts_team_tot = '".$gifts_team_tot."', "
            . "gifts_team_val = '".$gifts_team_val."', "
            . "gifts_team_by_dom_tot = '".$gifts_team_by_dom_tot."', "
            . "gifts_team_by_dom_val = '".$gifts_team_by_dom_val."', "
            . "gifts_team_by_org_tot = '".$gifts_team_by_org_tot."', "
            . "gifts_team_by_org_val = '".$gifts_team_by_org_val."', "
            . "gifts_team_by_cl_tot = '".$gifts_team_by_cl_tot."', "
            . "gifts_team_by_cl_val = '".$gifts_team_by_cl_val."', "
            . "gifts_team_by_cpt_tot = '".$gifts_team_by_cpt_tot."', "
            . "gifts_team_by_cpt_val = '".$gifts_team_by_cpt_val."', "
            . "gifts_team_by_sys_tot = '".$gifts_team_by_sys_tot."', "
            . "gifts_team_by_sys_val = '".$gifts_team_by_sys_val."', "
            . "qr_tot = '".$qr_tot."', "
            . "qr_mon_tot = '".$qr_mon_tot."', "
            . "qr_mon_users = '".$qr_mon_users."', "
            . "qr_mon_teams = '".$qr_mon_teams."', "
            . "code_total = '".$code_total ."', "
            . "code_mon_total = '".$code_mon_total."', "
            . "memb_activ_first = '".$memb_activ_first."', "
            . "memb_activ_second = '".$memb_activ_second."', "
            . "memb_activ_third = '".$memb_activ_third."', "
            . "memb_profit_first = '".$memb_profit_first."', "
            . "memb_profit_second = '".$memb_profit_second."', "
            . "memb_profit_third = '".$memb_profit_third."', "
            . "data_weblogins = '".$data_weblogins."', "
            . "data_cleanpts_bal = '".$data_cleanpts_bal."', "
            . "data_cleanpts_earned = '".$data_cleanpts_earned."', "
            . "data_cleanpts_lost = '".$data_cleanpts_lost."', "
            . "data_bank_trans_tot = '".$data_bank_trans_tot."', "
            . "data_bank_trans_val_sent = '".$data_bank_trans_val_sent."', "
            . "data_bank_trans_val_received = '".$data_bank_trans_val_received."', "
            . "data_bank_trans_numb_sent = '".$data_bank_trans_numb_sent."', "
            . "data_bank_trans_numb_received = '".$data_bank_trans_numb_received."' "
            . "WHERE id ='".$id."';";

            $queryUpdTeamdata = mysqli_query($conn,$sqlTeamdataUpdate);
        }
        
    }
    
    function getUserdataColumnsForTeamdata() {
        return array(
            'score',
            'weblogins',
            'rank_percent_bonus',
            'data_bank_trans_total',
            'data_bank_trans_outgoing',
            'data_bank_trans_incoming',
            'code_total',
            'code_ig_entered',
            'code_tg_entered',
            'code_kolikCode',
            'gifts_number_total',
            'gifts_number_ig',
            'gifts_number_ig_dk',
            'gifts_number_ig_cl',
            'gifts_number_ig_org',
            'gifts_number_ig_sys',
            'gifts_number_tg',
            'gifts_number_tg_cl',
            'gifts_number_tg_dk',
            'gifts_number_tg_org',
            'gifts_number_tg_cpt',
            'gifts_number_tg_sys',
            'gifts_number_wg',
            'wg_numb_played_won',
            'wg_numb_played_lost',
            'wg_numb_played_draw',
            'ig_numb_played_won',
            'ig_numb_played_lost',
            'ig_numb_played_draw',
        );
    }
    function getMoneyrecordsColumns() {
        return array(
            'money_actual_total',
            'money_total_received',
            'money_total_bet',
            'money_total_won',
            'money_total_lost',
            'money_sent',
            'money_received',
            'money_web_bet',
            'money_web_won',
            'money_web_lost',
            'money_ig_bet',
            'money_ig_won',
            'money_ig_lost',
            'money_tg_received',
            'money_extra_tg_cl',
            'money_extra_tg_dk',
            'money_extra_tg_org',
            'money_extra_tg_cpt',
            'money_extra_tg_sys',
            'money_extra_ig_cl',
            'money_extra_ig_dk',
            'money_extra_ig_org',
            'money_extra_ig_sys',
            'money_extra_web_rank',
            'money_extra_web_achievements',
            'money_extra_qr_total',
            'money_extra_qr_ig',
            'money_extra_qr_tg',
            //'money_extra_code_total',
            'money_extra_code',
            'money_extra_clean_won',
            'money_extra_clean_lost',
            'money_sanctions',
            'coin_value_total',
            'coin_value_earned',
            'coin_value_returned',
        );
    }
    function getTeamdataColumns() {
        return array(
            'gifts_team_by_dom_tot',
            'gifts_team_by_dom_val',
            'gifts_team_by_org_tot',
            'gifts_team_by_org_val',
            'gifts_team_by_cl_tot',
            'gifts_team_by_cl_val',
            'gifts_team_by_cpt_tot',
            'gifts_team_by_cpt_val',
            'gifts_team_by_sys_tot',
            'gifts_team_by_sys_val',
            'qr_mon_teams',
            'code_mon',
        );
    }
    function getKolikdataColumns() {
        return array(
            'total_points_balance',
        );
    }