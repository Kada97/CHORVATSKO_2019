<?php

    if (isSet($_POST['confirmSendGift'])) {
        $giftValue          = null;
        $forUser            = null;
        $forTeam            = null;
        $creator            = null;
        $typeGift           = null;
        $giftDesc           = null;

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'giftsValue':      $giftValue                          = $value; 
                                        $_SESSION['giftsValue']             = $value;   break;
                case 'chooseUser':      $forUser                            = $value; 
                                        $_SESSION['giftsChooseUser']        = $value;   break;
                case 'chooseTeam':      $forTeam                            = $value; 
                                        $_SESSION['giftsChooseTeam']        = $value;   break;
                case 'zadavatel':       $creator                            = $value; 
                                        $_SESSION['giftsCreator']           = $value;   break;
                case 'typeGift':        $typeGift                           = $value; 
                                        $_SESSION['giftsTypeGift']          = $value;   break;
                case 'giftDesc':        $giftDesc                           = $value;
            }
        }
        
        if ($creator != 'dom') {
            $giftValue = 25;
            if ($typeGift == 'tg'){
                $giftValue *= 6;
            }
        }
        if ($typeGift == null || $typeGift == 'msg') {
            $_SESSION['error_msg'] = 'Vyber typ daru.';
        }
        if ($creator == 'dom' && ($giftValue == null || $giftValue == '')) {
            $_SESSION['error_msg'] = 'Nastav částku daru.';
        }
        if ($forUser != 'NULL' && $forTeam != 'NULL') {
            $_SESSION['error_msg'] = 'Lze vybrat pouze jednoho adresáta daru.';
        }
        if (($forUser == 'NULL' && $forTeam == 'NULL')) {
            $_SESSION['error_msg'] = 'Vyber adresáta daru.';
        }
        
        
        if ($_SESSION['error_msg'] == '') {

            include '_connectDB.php';

            $giftValue   = removeDangerFromString($giftValue);
            $sqlLogInsert = "INSERT INTO log_gifts(type,for_username,for_teamname,value,creator,description)
                             VALUES('$typeGift','$forUser','$forTeam','$giftValue','$creator','$giftDesc');";
            $insertLog = mysqli_query($conn, $sqlLogInsert) or die(mysqli_error($conn));
            
            $giftSql = "";
            $giftSql2 = "";
            switch ($typeGift) {
                
                case 'tg':
                    
                    if ($forUser == 'NULL') {
                        $queryLog = "SELECT "
                                . "id,"
                                . "gifts_team_by_dom_tot,"
                                . "gifts_team_by_dom_val,"
                                . "gifts_team_by_org_tot,"
                                . "gifts_team_by_org_val,"
                                . "gifts_team_by_cl_tot,"
                                . "gifts_team_by_cl_val,"
                                . "gifts_team_by_cpt_tot,"
                                . "gifts_team_by_cpt_val,"
                                . "gifts_team_by_sys_tot,"
                                . "gifts_team_by_sys_val,"
                                . "mon_to_div_from_cg_remains"
                                . " FROM teamdata;";
                        $query = mysqli_query($conn, $queryLog);
                        $row = mysqli_fetch_assoc($query);

                        switch ($creator) {
                            case 'dom': 
                                $totalNumber    = 0;
                                $totalValue     = 0;
                                $toDivide       = 0;
                                $totalNumber    += $row['gifts_team_by_dom_tot'];
                                $totalValue     += $row['gifts_team_by_dom_val'];
                                $toDivide       += $row['mon_to_div_from_cg_remains'];
                                $totalNumber    += 1;
                                $totalValue     += $giftValue;
                                $toDivide       += $totalValue;
                                $giftSql        = "UPDATE teamdata SET "
                                        . "gifts_team_by_dom_tot = '".$totalNumber."', "
                                        . "gifts_team_by_dom_val = '".$totalValue."', "
                                        . "mon_to_div_from_cg_remains = '".$toDivide."' "
                                        . "WHERE id='".$forTeam."';";
                                break;
                            case 'org': 
                                $totalNumber    = 0;
                                $totalValue     = 0;
                                $toDivide       = 0;
                                $totalNumber    += $row['gifts_team_by_org_tot'];
                                $totalValue     += $row['gifts_team_by_org_val'];
                                $toDivide       += $row['mon_to_div_from_cg_remains'];
                                $totalNumber    += 1;
                                $totalValue     += $giftValue;
                                $toDivide       += $totalValue;
                                $giftSql        = "UPDATE teamdata SET "
                                        . "gifts_team_by_org_tot = '".$totalNumber."', "
                                        . "gifts_team_by_org_val = '".$totalValue."', "
                                        . "mon_to_div_from_cg_remains = '".$toDivide."' "
                                        . "WHERE id='".$forTeam."';";
                                break;
                            case 'lea': 
                                $totalNumber    = 0;
                                $totalValue     = 0;
                                $toDivide       = 0;
                                $totalNumber    += $row['gifts_team_by_cl_tot'];
                                $totalValue     += $row['gifts_team_by_cl_val'];
                                $toDivide       += $row['mon_to_div_from_cg_remains'];
                                $totalNumber    += 1;
                                $totalValue     += $giftValue;
                                $toDivide       += $totalValue;
                                $giftSql        = "UPDATE teamdata SET "
                                        . "gifts_team_by_cl_tot = '".$totalNumber."', "
                                        . "gifts_team_by_cl_val = '".$totalValue."', "
                                        . "mon_to_div_from_cg_remains = '".$toDivide."' "
                                        . "WHERE id='".$forTeam."';";
                                break;
                            case 'sys': 
                                $totalNumber    = 0;
                                $totalValue     = 0;
                                $toDivide       = 0;
                                $totalNumber    += $row['gifts_team_by_sys_tot'];
                                $totalValue     += $row['gifts_team_by_sys_val'];
                                $toDivide       += $row['mon_to_div_from_cg_remains'];
                                $totalNumber    += 1;
                                $totalValue     += $giftValue;
                                $toDivide       += $totalValue;
                                $giftSql        = "UPDATE teamdata SET "
                                        . "gifts_team_by_sys_tot = '".$totalNumber."', "
                                        . "gifts_team_by_sys_val = '".$totalValue."', "
                                        . "mon_to_div_from_cg_remains = '".$toDivide."' "
                                        . "WHERE id='".$forTeam."';";
                                break;
                        }
                    }
                    elseif ($forTeam == 'NULL') {
                        $queryLog1 = "SELECT "
                                . "id,"
                                . "gifts_number_tg_dk,"
                                . "gifts_number_tg_org,"
                                . "gifts_number_tg_cl,"
                                . "gifts_number_tg_cpt,"
                                . "gifts_number_tg_sys"
                                . " FROM userdata;";
                        $query1 = mysqli_query($conn, $queryLog1);
                        $rowUser = mysqli_fetch_assoc($query1);
                        
                        $queryLog2 = "SELECT "
                                . "id,"
                                . "money_extra_tg_dk,"
                                . "money_extra_tg_org,"
                                . "money_extra_tg_cl,"
                                . "money_extra_tg_cpt,"
                                . "money_extra_tg_sys"
                                . " FROM money_records;";
                        $query2 = mysqli_query($conn, $queryLog2);
                        $rowMoney = mysqli_fetch_assoc($query2);

                        switch ($creator) {
                            case 'dom': 
                                $totalNumber    = 0;
                                $totalValue     = 0;
                                $totalNumber    += $rowUser['gifts_number_tg_dk'];
                                $totalValue     += $rowMoney['money_extra_tg_dk'];
                                $totalNumber    += 1;
                                $totalValue     += $giftValue;
                                
                                $giftSql        = "UPDATE userdata SET "
                                        . "gifts_number_tg_dk = '".$totalNumber."' "
                                        . "WHERE id='".$forUser."';";
                                
                                $giftSql2        = "UPDATE money_records SET "
                                        . "money_extra_tg_dk = '".$totalValue."' "
                                        . "WHERE id='".$forUser."';";
                                break;
                            case 'org': 
                                $totalNumber    = 0;
                                $totalValue     = 0;
                                $totalNumber    += $rowUser['gifts_number_tg_org'];
                                $totalValue     += $rowMoney['money_extra_tg_org'];
                                $totalNumber    += 1;
                                $totalValue     += $giftValue;
                                
                                $giftSql        = "UPDATE userdata SET "
                                        . "gifts_number_tg_org = '".$totalNumber."' "
                                        . "WHERE id='".$forUser."';";
                                
                                $giftSql2        = "UPDATE money_records SET "
                                        . "money_extra_tg_org = '".$totalValue."' "
                                        . "WHERE id='".$forUser."';";
                                break;
                            case 'lea': 
                                $totalNumber    = 0;
                                $totalValue     = 0;
                                $totalNumber    += $rowUser['gifts_number_tg_cl'];
                                $totalValue     += $rowMoney['money_extra_tg_cl'];
                                $totalNumber    += 1;
                                $totalValue     += $giftValue;
                                
                                $giftSql        = "UPDATE userdata SET "
                                        . "gifts_number_tg_cl = '".$totalNumber."' "
                                        . "WHERE id='".$forUser."';";
                                
                                $giftSql2        = "UPDATE money_records SET "
                                        . "money_extra_tg_cl = '".$totalValue."' "
                                        . "WHERE id='".$forUser."';";
                                break;
                            case 'sys': 
                                $totalNumber    = 0;
                                $totalValue     = 0;
                                $totalNumber    += $rowUser['gifts_number_tg_sys'];
                                $totalValue     += $rowMoney['money_extra_tg_sys'];
                                $totalNumber    += 1;
                                $totalValue     += $giftValue;
                                
                                $giftSql        = "UPDATE userdata SET "
                                        . "gifts_number_tg_sys = '".$totalNumber."' "
                                        . "WHERE id='".$forUser."';";
                                
                                $giftSql2        = "UPDATE money_records SET "
                                        . "money_extra_tg_sys = '".$totalValue."' "
                                        . "WHERE id='".$forUser."';";
                                break;
                            case 'cpt': 
                                $totalNumber    = 0;
                                $totalValue     = 0;
                                $totalNumber    += $rowUser['gifts_number_tg_cpt'];
                                $totalValue     += $rowMoney['money_extra_tg_cpt'];
                                $totalNumber    += 1;
                                $totalValue     += $giftValue;
                                
                                $giftSql        = "UPDATE userdata SET "
                                        . "gifts_number_tg_cpt = '".$totalNumber."' "
                                        . "WHERE id='".$forUser."';";
                                
                                $giftSql2        = "UPDATE money_records SET "
                                        . "money_extra_tg_cpt = '".$totalValue."' "
                                        . "WHERE id='".$forUser."';";
                                break;
                        }
                    }
                    break;
                
                case 'ig':
                    $queryLog1 = "SELECT "
                            . "id, "
                            . "gifts_number_ig_dk, "
                            . "gifts_number_ig_cl, "
                            . "gifts_number_ig_org, "
                            . "gifts_number_ig_sys "
                            . "FROM userdata "
                            . "WHERE id='".$forUser."';";
                    $query1 = mysqli_query($conn, $queryLog1);
                    $row1 = mysqli_fetch_assoc($query1);
                    
                    $queryLog2 = "SELECT "
                            . "id, "
                            . "money_extra_ig_cl, "
                            . "money_extra_ig_dk, "
                            . "money_extra_ig_org, "
                            . "money_extra_ig_sys "
                            . "FROM money_records "
                            . "WHERE id='".$forUser."';";
                    $query2 = mysqli_query($conn, $queryLog2);
                    $row2 = mysqli_fetch_assoc($query2);
                    
                    switch ($creator) {
                        case 'dom': 
                            $totalValue     = 0;
                            $totalNumber    = 0;
                            $totalValue     += $row2['money_extra_ig_dk'];
                            $totalNumber    += $row1['gifts_number_ig_dk'];
                            $totalValue     += $giftValue;
                            $totalNumber    += 1;
                            
                            $giftSql        = "UPDATE money_records SET "
                                    . "money_extra_ig_dk = '".$totalValue."' "
                                    . "WHERE id='".$forUser."';";
                            
                            $giftSql2       = "UPDATE userdata SET "
                            . "gifts_number_ig_dk = '".$totalNumber."' "
                            . "WHERE id='".$forUser."';";
                            break;
                        case 'org':
                            $totalValue     = 0;
                            $totalNumber    = 0;
                            $totalValue     += $row2['money_extra_ig_org'];
                            $totalNumber    += $row1['gifts_number_ig_org'];
                            $totalValue     += $giftValue;
                            $totalNumber    += 1;
                            
                            $giftSql        = "UPDATE money_records SET "
                                    . "money_extra_ig_org = '".$totalValue."' "
                                    . "WHERE id='".$forUser."';";
                            
                            $giftSql2       = "UPDATE userdata SET "
                            . "gifts_number_ig_org = '".$totalNumber."' "
                            . "WHERE id='".$forUser."';";
                            break;
                        case 'lea':
                            $totalValue     = 0;
                            $totalNumber    = 0;
                            $totalValue     += $row2['money_extra_ig_cl'];
                            $totalNumber    += $row1['gifts_number_ig_cl'];
                            $totalValue     += $giftValue;
                            $totalNumber    += 1;
                            
                            $giftSql        = "UPDATE money_records SET "
                                    . "money_extra_ig_cl = '".$totalValue."' "
                                    . "WHERE id='".$forUser."';";
                            
                            $giftSql2       = "UPDATE userdata SET "
                            . "gifts_number_ig_cl = '".$totalNumber."' "
                            . "WHERE id='".$forUser."';";
                            break;
                        case 'sys':
                            $totalValue     = 0;
                            $totalNumber    = 0;
                            $totalValue     += $row2['money_extra_ig_sys'];
                            $totalNumber    += $row1['gifts_number_ig_sys'];
                            $totalValue     += $giftValue;
                            $totalNumber    += 1;
                            
                            $giftSql        = "UPDATE money_records SET "
                                    . "money_extra_ig_sys = '".$totalValue."' "
                                    . "WHERE id='".$forUser."';";
                            
                            $giftSql2       = "UPDATE userdata SET "
                            . "gifts_number_ig_sys = '".$totalNumber."' "
                            . "WHERE id='".$forUser."';";
                            break;
                    }
                    break;
            }
            
            $giftQuery = mysqli_query($conn, $giftSql);
            if ($giftSql2 != "") {
                $giftQuery2 = mysqli_query($conn, $giftSql2);
            }
            
            $usersToRecountMoney = array();
            $usersToRecountMoney[] = $forUser;
            dbRecountMoney($usersToRecountMoney);
	    unset($_POST['confirmSendGift']);
        }
    }
    include 'giftsPage.php';
?>


