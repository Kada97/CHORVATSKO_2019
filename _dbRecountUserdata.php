<?php

    function dbRecountUserdata($usersToRecount) {
        include '_connectDB.php';

        $userdataColumns = getUserdataColumnsForUserdata();
        
        for ($i = 0; $i < count($usersToRecount); $i++) {

            $id                         = $usersToRecount[$i];
            $data_bank_trans_outgoing   = 0;
            $data_bank_trans_incoming   = 0;
            $code_ig_entered		= 0;
            $code_tg_entered		= 0;
            $code_kolikCode		= 0;
            $gifts_number_ig_dk		= 0;
            $gifts_number_ig_cl		= 0;
            $gifts_number_ig_org        = 0;
            $gifts_number_ig_sys        = 0;
            $gifts_number_tg_cl		= 0;
            $gifts_number_tg_dk		= 0;
            $gifts_number_tg_org        = 0;
            $gifts_number_tg_cpt        = 0;
            $gifts_number_tg_sys        = 0;
            $wg_numb_played_won		= 0;
            $wg_numb_played_lost        = 0;
            $wg_numb_played_draw        = 0;
            $ig_numb_played_won		= 0;
            $ig_numb_played_lost        = 0;
            $ig_numb_played_draw        = 0;
            
            // USERDATA GET
            for ($j = 0; $j < count($userdataColumns); $j++) {
                $tempColumn = $userdataColumns[$j];
                
                $sqlGenericValueUserdata = "SELECT ".$tempColumn." AS result FROM userdata WHERE id = '".$id."';";
                $queryGenericValueUserdata = mysqli_query($conn,$sqlGenericValueUserdata);
                $resultGenericValueUserdata = mysqli_fetch_array($queryGenericValueUserdata);
                
                switch ($tempColumn){
                    case 'data_bank_trans_outgoing':        $data_bank_trans_outgoing   += $resultGenericValueUserdata[0]; break; 
                    case 'data_bank_trans_incoming':        $data_bank_trans_incoming   += $resultGenericValueUserdata[0]; break; 
                    case 'code_ig_entered':                 $code_ig_entered		+= $resultGenericValueUserdata[0]; break; 
                    case 'code_tg_entered':                 $code_tg_entered		+= $resultGenericValueUserdata[0]; break; 
                    case 'code_kolikCode':                  $code_kolikCode		+= $resultGenericValueUserdata[0]; break; 
                    case 'gifts_number_ig_dk':              $gifts_number_ig_dk		+= $resultGenericValueUserdata[0]; break; 
                    case 'gifts_number_ig_cl':              $gifts_number_ig_cl		+= $resultGenericValueUserdata[0]; break; 
                    case 'gifts_number_ig_org':             $gifts_number_ig_org        += $resultGenericValueUserdata[0]; break; 
                    case 'gifts_number_ig_sys':             $gifts_number_ig_sys        += $resultGenericValueUserdata[0]; break; 
                    case 'gifts_number_tg_cl':              $gifts_number_tg_cl		+= $resultGenericValueUserdata[0]; break; 
                    case 'gifts_number_tg_dk':              $gifts_number_tg_dk		+= $resultGenericValueUserdata[0]; break; 
                    case 'gifts_number_tg_org':             $gifts_number_tg_org        += $resultGenericValueUserdata[0]; break; 
                    case 'gifts_number_tg_cpt':             $gifts_number_tg_cpt        += $resultGenericValueUserdata[0]; break; 
                    case 'gifts_number_tg_sys':             $gifts_number_tg_sys        += $resultGenericValueUserdata[0]; break; 
                    case 'wg_numb_played_won':              $wg_numb_played_won		+= $resultGenericValueUserdata[0]; break; 
                    case 'wg_numb_played_lost':             $wg_numb_played_lost        += $resultGenericValueUserdata[0]; break; 
                    case 'wg_numb_played_draw':             $wg_numb_played_draw        += $resultGenericValueUserdata[0]; break;
                    case 'ig_numb_played_won':              $ig_numb_played_won		+= $resultGenericValueUserdata[0]; break; 
                    case 'ig_numb_played_lost':             $ig_numb_played_lost        += $resultGenericValueUserdata[0]; break; 
                    case 'ig_numb_played_draw':             $ig_numb_played_draw        += $resultGenericValueUserdata[0]; break; 
                } 
            }
            
            $data_bank_trans_total      = $data_bank_trans_outgoing + $data_bank_trans_incoming;
            $code_total                 = $code_ig_entered + $code_tg_entered + $code_kolikCode;
            $gifts_number_ig		= $gifts_number_ig_dk + $gifts_number_ig_cl + $gifts_number_ig_org + $gifts_number_ig_sys;
            $gifts_number_tg		= $gifts_number_tg_cl + $gifts_number_tg_dk + $gifts_number_tg_org + $gifts_number_tg_cpt + $gifts_number_tg_sys;
            $gifts_number_total         = $gifts_number_tg + $gifts_number_ig;
            $wg_numb_played_total       = $wg_numb_played_won + $wg_numb_played_lost + $wg_numb_played_draw;
            $ig_numb_played_total       = $ig_numb_played_won + $ig_numb_played_lost + $ig_numb_played_draw;
            
            
            $sqlUserdataUpdate =
            "UPDATE userdata SET "
            . "data_bank_trans_total = '".$data_bank_trans_total."', "
            . "code_total = '".$code_total."', "
            . "gifts_number_total = '".$gifts_number_total."', "
            . "gifts_number_ig = '".$gifts_number_ig."', "
            . "gifts_number_tg = '".$gifts_number_tg."', "
            . "wg_numb_played_total = '".$wg_numb_played_total."', "
            . "ig_numb_played_total = '".$ig_numb_played_total."' "
            . "WHERE id ='".$id."';";
            
            $queryUpdUserdata = mysqli_query($conn,$sqlUserdataUpdate);
        }
        
    }
    
    function getUserdataColumnsForUserdata() {
        return array(
            'data_bank_trans_outgoing',
            'data_bank_trans_incoming',
            'code_ig_entered',
            'code_tg_entered',
            'code_kolikCode',
            'gifts_number_ig_dk',
            'gifts_number_ig_cl',
            'gifts_number_ig_org',
            'gifts_number_ig_sys',
            'gifts_number_tg_cl',
            'gifts_number_tg_dk',
            'gifts_number_tg_org',
            'gifts_number_tg_cpt',
            'gifts_number_tg_sys',
            'wg_numb_played_won',
            'wg_numb_played_lost',
            'wg_numb_played_draw',
            'ig_numb_played_won',
            'ig_numb_played_lost',
            'ig_numb_played_draw',
        );
    }