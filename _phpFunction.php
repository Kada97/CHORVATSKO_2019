<?php

    include '_dbRecountMoney.php';

    function removeDangerFromString($wrongString) {
        include '_connectDB.php';
        htmlspecialchars($wrongString);
        $newString = stripslashes($wrongString);
        $newString = mysqli_escape_string($conn, $newString);
        mysqli_close($conn);
        
        return $newString;
    }
    
    function getVerificationCode($base) {
        $t1     = mb_substr(str_shuffle($base), 1, 1, 'utf-8');
        $t2     = mb_substr(str_shuffle($base), -2,1, 'utf-8');
        $t3     = chr(rand(97, 122));
        $t4     = rand(0,9);
        $t5     = rand(0,9);
        $t6     = rand(0,9);
        $temp   = $t1.$t2.$t3.$t4.$t5.$t6;
        
        return str_shuffle($temp);
    }
    
    function getAge($birthday) {
        return date_diff(date_create($birthday), date_create('now'))->y;
    }
    
    function dbRecount() {
//	include '_webSession.php';
//	include '_connectDB.php';
//        include '_recountDB.php';
    }
    
    function getDailyQuestion() {
        // "day-part" , for e.g. 6-2
        // days: 9 FRI-SAT
        // parts: 4
        // in hours: 8-12, 12-16, 16-20, 20-22 + 6-8
        // first day only last part 20-22 + 6-8
        // last day only first part 8-12
        // Start: 14. 6. 2019 minus 13 to get ONE
        // End: 22. 6. 2019
        
        $d = date('j') - 13;
        $h = date('G');
        $part = 0;
        
        //testing
	//$d = date('i')%4+1;
        //$h = date('G')+13;
        
        if ($h >= 8 && $h < 12) {
            $part = 1;
        }
        elseif ($h >= 12 && $h < 16) {
            $part = 2;
        }
        elseif ($h >= 16 && $h < 20) {
            $part = 3;
        }
        elseif ($h >= 20 && $h < 22) {
            $part = 4;
        }
        elseif ($h >= 6 && $h < 8){
            $part = 4;
            $d-=1;
        }
        else {
            $d = 0;
            $part = 0;
        }
        
        $result = 'src/apk/dailyQuestions/' . $d . '-' . $part . '.jpg';
        
	return $result;
    }
    
    function sendLog($location, $what, $priority = 0) {
        include '_connectDB.php';
        
        $w = $what != '' ? $what : (isset($_SESSION['error_msg']) ? $_SESSION['error_msg'] : '');
        $l = $location != '' ? $location : (isset($_SESSION['error_location']) ? $_SESSION['error_location'] : '');
        $u = isset($_SESSION['username']) ? $_SESSION['username'] : 'None' ;
        $d = '';

        if (isset($_POST)) {
            foreach ($_POST as $key => $value) {
                $d .= '['.$key.']';
                $d .= ' => ';
                $d .= $value;
                $d .= '  |  ';
            }
        }
        
        $loggerQuery = "INSERT INTO logger (who, location, what, detail, priority) VALUES ('$u', '$l', '$w', '$d', '$priority');";
        $logger = mysqli_query($conn, $loggerQuery) or die(mysqli_error($conn));
        
    }
    
    function checkRank($numberLogins){
        
        $rank = '';
        $loginCoef = 0;
        $limit = 30;
        $i = $numberLogins - $limit;
        while ($i > 0) {
            
            $i -= $limit;
            $loginCoef++;
            if ($loginCoef >=10) {
                break;
            }
        }
        
        switch ($loginCoef) {
            case 0 : $rank = 'NOOB'; break;
            case 1 : $rank = 'WEBOVÝ ODPAD'; break;
            case 2 : $rank = 'NÁVŠTĚVNÍK'; break;
            case 3 : $rank = 'ZAČÁTEČNÍK'; break;
            case 4 : $rank = 'TEN, KDO TO VZAL VÁŽNĚ'; break;
            case 5 : $rank = 'CHVÁLYHODNÝ'; break;
            case 6 : $rank = 'ZKUŠENÝ'; break;
            case 7 : $rank = 'NOLIFER'; break;
            case 8 : $rank = 'ZÁVISLÝ'; break;
            case 9 : $rank = 'NEOČEKÁVANÝ'; break;
            case 10 : $rank = 'SAHAJÍCÍ ZA HRANICE VESMÍRU'; break;
        }
        
        return $rank;
        
    }
    
    function getRankPrice($rank) {
        $nB = 0;
        switch ($rank) {
            case 'NOOB'                         : $nB = 0; break;
            case 'WEBOVÝ ODPAD'                 : $nB = 0.1; break;
            case 'NÁVŠTĚVNÍK'                   : $nB = 0.3; break;
            case 'ZAČÁTEČNÍK'                   : $nB = 0.6; break;
            case 'TEN, KDO TO VZAL VÁŽNĚ'       : $nB = 1; break;
            case 'CHVÁLYHODNÝ'                  : $nB = 1.5; break;
            case 'ZKUŠENÝ'                      : $nB = 2.1; break;
            case 'NOLIFER'                      : $nB = 2.8; break;
            case 'ZÁVISLÝ'                      : $nB = 3.6; break;
            case 'NEOČEKÁVANÝ'                  : $nB = 4.5; break;
            case 'SAHAJÍCÍ ZA HRANICE VESMÍRU'  : $nB = 5.5; break;
        }
        
        return $nB;
    }
?>
