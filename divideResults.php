<?php

    if (isSet($_POST['divideResults'])) {
        include '_connectDB.php';
        
        $idTeam             = null;
        $budget             = null;
        $total              = 0;
        $rest               = null;
        $idUsers            = array();
        $bonus              = array();

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'teamId': $idTeam = $value; break;
                case 'budget': $budget = $value; break;
            }
        }
        
        foreach($_POST['bonus'] as $myarray) {
            $bonus[] = $myarray;
            $total += $myarray;
        }
        
        foreach($_POST['userId'] as $myarray) {
            $idUsers[] = $myarray;
        }
        
        if ($budget < $total) {
            $_SESSION['error_msg'] = 'Součet převýšil rozpočet! Nemůžeš dávat tolik, kolik nemáš! Máš jen {$budget} HRD.';
        }
        
        if ($_SESSION['error_msg'] == '') {
            $rest = $budget-$total;
            
            $upd = "UPDATE teamdata SET mon_to_div_from_cg_remains = '" . $rest. "', mon_to_div_from_cg_divided_already = mon_to_div_from_cg_divided_already + '$total' WHERE id = '" . $idTeam. "';";
            $query = mysqli_query($conn, $upd);
            
            for ($i = 0; $i<count($idUsers); $i++) {
                $upd = "UPDATE money_records SET money_extra_tg_cpt  = '" . $bonus[$i]. "' WHERE id = '" . $idUsers[$i]. "';";
                $query = mysqli_query($conn, $upd);
            }
            
            for ($i = 0; $i<count($idUsers); $i++) {
                $upd = "UPDATE userdata SET gifts_number_tg_cpt = gifts_number_tg_cpt+1 WHERE id = '" . $idUsers[$i]. "';";
                $query = mysqli_query($conn, $upd);
            }
            
        }
        
        
        if ($_SESSION['error_msg'] != '') {
            include 'divideResultsPage.php';
        }
        
    }
        
        
        

