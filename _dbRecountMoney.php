<?php
    
    function dbRecountMoney($usersToRecount) {
        include '_connectDB.php';
        
        for ($i = 0; $i < count($usersToRecount); $i++) {
            $id                             = $usersToRecount[$i];
            $money_actual_total             = 0;
            $money_total_received           = 0;
            $money_total_bet                = 0;
            $money_total_won                = 0;
            $money_total_lost               = 0;
            $money_sent                     = 0;
            $money_received                 = 0;
            $money_web_balance              = 0;
            $money_web_bet                  = 0;
            $money_web_won                  = 0;
            $money_web_lost                 = 0;
            $money_ig_balance               = 0;
            $money_ig_bet                   = 0;
            $money_ig_won                   = 0;
            $money_ig_lost                  = 0;
            $money_tg_received              = 0;
            $money_extra_total              = 0;
            $money_extra_ig_total           = 0;
            $money_extra_ig_cl              = 0;
            $money_extra_ig_dk              = 0;
            $money_extra_ig_org             = 0;
            $money_extra_ig_sys             = 0;
            $money_extra_tg_total           = 0;
            $money_extra_tg_cl              = 0;
            $money_extra_tg_dk              = 0;
            $money_extra_tg_cpt             = 0;
            $money_extra_tg_org             = 0;
            $money_extra_tg_sys             = 0;
            $money_extra_web_total          = 0;
            $money_extra_web_rank           = 0;
            $money_extra_web_achievements   = 0;
            $money_extra_qr_total           = 0;
            $money_extra_qr_ig              = 0;
            $money_extra_qr_tg              = 0;
            $money_extra_code               = 0;
            $money_extra_code_total         = 0;
            $money_extra_clean_balance      = 0;
            $money_extra_clean_won          = 0;
            $money_extra_clean_lost         = 0;
            $money_sanctions                = 0;
            $coin_value_total               = 0;
            $coin_value_earned              = 0;
            $coin_value_returned            = 0;
            $score                          = 0;
            
            $sqlBankRecords = 
                    "SELECT "
                    . "money_sent, "
                    . "money_received, "
                    . "money_web_bet, "
                    . "money_web_won, "
                    . "money_web_lost, "
                    . "money_ig_bet, "
                    . "money_ig_won, "
                    . "money_ig_lost, "
                    . "money_tg_received, "
                    . "money_extra_ig_cl, "
                    . "money_extra_ig_dk, "
                    . "money_extra_ig_org, "
                    . "money_extra_ig_sys, "
                    . "money_extra_tg_cl, "
                    . "money_extra_tg_dk, "
                    . "money_extra_tg_org, "
                    . "money_extra_tg_cpt, "
                    . "money_extra_tg_sys, "
                    . "money_extra_web_rank, "
                    . "money_extra_web_achievements, "
                    . "money_extra_qr_ig, "
                    . "money_extra_qr_tg, "
                    . "money_extra_code, "
                    . "money_extra_code_total, "
                    . "money_extra_clean_won, "
                    . "money_extra_clean_lost, "
                    . "money_sanctions, "
                    . "coin_value_earned, "
                    . "coin_value_returned "
                    . "FROM money_records WHERE id ='".$id."';";
            
            $queryBankRecords = mysqli_query($conn,$sqlBankRecords);
            $resultBankRecords = mysqli_fetch_assoc($queryBankRecords);
            
            $money_sent                     += $resultBankRecords['money_sent'];
            $money_received                 += $resultBankRecords['money_received'];
            $money_web_bet                  += $resultBankRecords['money_web_bet'];
            $money_web_won                  += $resultBankRecords['money_web_won'];
            $money_web_lost                 += $resultBankRecords['money_web_lost'];
            $money_ig_bet                   += $resultBankRecords['money_ig_bet'];
            $money_ig_won                   += $resultBankRecords['money_ig_won'];
            $money_ig_lost                  += $resultBankRecords['money_ig_lost'];
            $money_tg_received              += $resultBankRecords['money_tg_received'];
            $money_extra_ig_cl              += $resultBankRecords['money_extra_ig_cl'];
            $money_extra_ig_dk              += $resultBankRecords['money_extra_ig_dk'];
            $money_extra_ig_org             += $resultBankRecords['money_extra_ig_org'];
            $money_extra_ig_sys             += $resultBankRecords['money_extra_ig_sys'];
            $money_extra_tg_cl              += $resultBankRecords['money_extra_tg_cl'];
            $money_extra_tg_dk              += $resultBankRecords['money_extra_tg_dk'];
            $money_extra_tg_org             += $resultBankRecords['money_extra_tg_org'];
            $money_extra_tg_cpt             += $resultBankRecords['money_extra_tg_cpt'];
            $money_extra_tg_sys             += $resultBankRecords['money_extra_tg_sys'];
            $money_extra_web_rank           += $resultBankRecords['money_extra_web_rank'];
            $money_extra_web_achievements   += $resultBankRecords['money_extra_web_achievements'];
            $money_extra_qr_ig              += $resultBankRecords['money_extra_qr_ig'];
            $money_extra_qr_tg              += $resultBankRecords['money_extra_qr_tg'];
            $money_extra_code               += $resultBankRecords['money_extra_code'];
            //$money_extra_code_total         += $resultBankRecords['money_extra_code_total'];
            $money_extra_clean_won          += $resultBankRecords['money_extra_clean_won'];
            $money_extra_clean_lost         += $resultBankRecords['money_extra_clean_lost'];
            $money_sanctions                += $resultBankRecords['money_sanctions'];
            $coin_value_earned              += $resultBankRecords['coin_value_earned'];
            $coin_value_returned            += $resultBankRecords['coin_value_returned'];
            
            $coin_value_total               += $coin_value_earned - $coin_value_returned;
            $money_extra_clean_balance      += $money_extra_clean_won - $money_extra_clean_lost;
            $money_extra_qr_total           += $money_extra_qr_ig + $money_extra_qr_tg;
            $money_extra_web_total          += $money_extra_web_rank + $money_extra_web_achievements;
            $money_extra_ig_total           += $money_extra_ig_cl + $money_extra_ig_dk + $money_extra_ig_org + $money_extra_ig_sys;
            $money_extra_tg_total           += $money_extra_tg_cl + $money_extra_tg_dk + $money_extra_tg_org + $money_extra_tg_cpt + $money_extra_tg_sys;
            $money_extra_code_total         += $money_extra_code + $money_extra_qr_total;
            $money_extra_total              += $money_extra_ig_total + $money_extra_tg_total + $money_extra_web_total + $money_extra_clean_balance + $money_extra_code_total;
            $money_ig_balance               += $money_ig_won - $money_ig_lost;
            $money_web_balance              += $money_web_won - $money_web_lost;
            $money_total_lost               += $money_web_lost + $money_ig_lost + $money_sanctions;
            $money_total_won                += $money_web_won + $money_tg_received + $money_ig_won;
            $money_total_bet                += $money_web_bet + $money_ig_bet;
            $money_total_received           += $money_received + $money_extra_total + $coin_value_total;
            $money_actual_total             += $money_total_received + $money_total_won - $money_total_lost - $money_sent;
            
            $score                          += $money_total_won + $money_extra_total - $money_extra_clean_balance + $money_extra_clean_won - $money_sanctions;
            
            $udpSqlBankRecords = 
                    "UPDATE money_records SET "
                    . "money_actual_total = '".$money_actual_total."', "
                    . "money_total_received = '".$money_total_received."', "
                    . "money_total_bet = '".$money_total_bet."', "
                    . "money_total_won = '".$money_total_won."', "
                    . "money_total_lost = '".$money_total_lost."', "
                    . "money_web_balance = '".$money_web_balance."', "
                    . "money_ig_balance = '".$money_ig_balance."', "
                    . "money_extra_total = '".$money_extra_total."', "
                    . "money_extra_ig_total = '".$money_extra_ig_total."', "
                    . "money_extra_tg_total = '".$money_extra_tg_total."', "
                    . "money_extra_code_total = '".$money_extra_code_total."', "
                    . "money_extra_web_total = '".$money_extra_web_total."', "
                    . "money_extra_qr_total = '".$money_extra_qr_total."', "
                    . "money_extra_clean_balance = '".$money_extra_clean_balance."', "
                    . "coin_value_total = '".$coin_value_total."', "
                    . "score = '".$score."' "
                    . "WHERE id ='".$id."'";
            $queryUpdBankRecords = mysqli_query($conn,$udpSqlBankRecords);
            
            $udpSqlUserdata = 
                    "UPDATE userdata SET "
                    . "score = '".$score."' "
                    . "WHERE id ='".$id."'";
            $queryUpdUserdata = mysqli_query($conn,$udpSqlUserdata);
        }
    }

