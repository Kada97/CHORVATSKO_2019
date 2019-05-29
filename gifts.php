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
            $giftValue = 20;
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
            switch ($typeGift) {
                
                case 'tg':
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
                        case 'cpt': 
                            $totalNumber    = 0;
                            $totalValue     = 0;
                            $toDivide       = 0;
                            $totalNumber    += $row['gifts_team_by_cpt_tot'];
                            $totalValue     += $row['gifts_team_by_cpt_val'];
                            $toDivide       += $row['mon_to_div_from_cg_remains'];
                            $totalNumber    += 1;
                            $totalValue     += $giftValue;
                            $toDivide       += $totalValue;
                            $giftSql        = "UPDATE teamdata SET "
                                    . "gifts_team_by_cpt_tot = '".$totalNumber."', "
                                    . "gifts_team_by_cpt_val = '".$totalValue."', "
                                    . "mon_to_div_from_cg_remains = '".$toDivide."' "
                                    . "WHERE id='".$forTeam."';";
                            break;
                    }
                    break;
                
                case 'ig':
                    $queryLog1 = "SELECT "
                            . "id,"
                            . "gifts_number_ig "
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
                    
                    $totalNumber    = 0;
                    $totalNumber    += $row1['gifts_number_ig'];
                    $totalNumber    += 1;
                    $updUserSql        = "UPDATE userdata SET "
                            . "gifts_number_ig = '".$totalNumber."' "
                            . "WHERE id='".$forUser."';";
                    $giftQuery = mysqli_query($conn, $updUserSql);
                    
                    switch ($creator) {
                        case 'dom': 
                            $totalValue     = 0;
                            $totalValue     += $row2['money_extra_ig_dk'];
                            $totalValue     += $giftValue;
                            $giftSql        = "UPDATE money_records SET "
                                    . "money_extra_ig_dk = '".$totalValue."' "
                                    . "WHERE id='".$forUser."';";
                            break;
                        case 'org':
                            $totalValue     = 0;
                            $totalValue     += $row2['money_extra_ig_org'];
                            $totalValue     += $giftValue;
                            $giftSql        = "UPDATE money_records SET "
                                    . "money_extra_ig_org = '".$totalValue."' "
                                    . "WHERE id='".$forUser."';";
                            break;
                        case 'lea':
                            $totalValue     = 0;
                            $totalValue     += $row2['money_extra_ig_cl'];
                            $totalValue     += $giftValue;
                            $giftSql        = "UPDATE money_records SET "
                                    . "money_extra_ig_cl = '".$totalValue."' "
                                    . "WHERE id='".$forUser."';";
                            break;
                        case 'sys':
                            $totalValue     = 0;
                            $totalValue     += $row2['money_extra_ig_sys'];
                            $totalValue     += $giftValue;
                            $giftSql        = "UPDATE money_records SET "
                                    . "money_extra_ig_sys = '".$totalValue."' "
                                    . "WHERE id='".$forUser."';";
                            break;
                        case 'cpt':
                            $totalValue     = 0;
                            $totalValue     += $row2['money_extra_ig_cpt'];
                            $totalValue     += $giftValue;
                            $giftSql        = "UPDATE money_records SET "
                                    . "money_extra_ig_cpt = '".$totalValue."' "
                                    . "WHERE id='".$forUser."';";
                            break;
                    }
                    break;
            }
            
            $giftQuery = mysqli_query($conn, $giftSql);
            
            $usersToRecountMoney = array();
            $usersToRecountMoney[] = $forUser;
            dbRecountMoney($usersToRecountMoney);
	    
        }
    }
    include 'giftsPage.php';
?>


