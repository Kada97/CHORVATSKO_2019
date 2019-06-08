<?php


    if (isSet($_POST['addGameResult'])) {
        $addGameName        = null;
        $addGameDatePlayed  = null;
        $addGameTimePlayed  = null;
        $addGamePopularity  = null;
        $addGamePreparation = null;
        $addGameBudget      = null;
        $addGameResults     = array();

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'addGameName':        $addGameName                               = $value; break;
                                    
                case 'addGameDatePlayed':         $forType                                = $value; break;
                                    
                case 'addGameTimePlayed':       $valueCode                              = $value;  break;
                                    
                case 'addGamePopularity':        $typeGame                               = $value; break;
                                    
                case 'addGamePreparation':      $detailText                             = $value; break;
                case 'addGameBudget':      $detailText                             = $value; break;
                case 'addGameResults':      $detailText                             = $value; break;
            }
        }
        if ($codeText == null) {
            $_SESSION['error_msg'] = 'Kód nezadán';
        }
        if ($forType == null) {
            $_SESSION['error_msg'] = 'Typ příjemce nezadán';
        }
        if ($valueCode == null) {
            $_SESSION['error_msg'] = 'Hodnota nezadána';
        }
        if ($typeGame == null) {
            $_SESSION['error_msg'] = 'Typ hry nezadán';
        }
        if ($detailText == null && $typeGame == 8) {
            $_SESSION['error_msg'] = 'K vazbě "Typ hry <8 = Other>" je potřeba povinně vyplnit poznámku';
        }
        
        if ($_SESSION['error_msg'] == '') {

            include '_connectDB.php';
            mysqli_query($conn, "SET NAMES utf8");

            $codeText       = removeDangerFromString($codeText);
            $valueCode      = removeDangerFromString($valueCode);
            $detailText     = removeDangerFromString($detailText);
            
            $codeTextCheck  = mysqli_query($conn, "SELECT code FROM log_codes WHERE code='$codeText'");
            
            if (mysqli_num_rows($codeTextCheck) != 0) {
                $_SESSION['error_msg'] = 'Tento kód již existuje. Zvol jiný název!';
            }
            
            if ($_SESSION['error_msg'] == '') {
                $createCode = mysqli_query($conn, "INSERT INTO data_codes(code,typeuser,value,typegame,detail)
                                                 VALUES('$codeText', '$forType', '$valueCode', '$typeGame', '$detailText');") or die(mysqli_error($conn));
                if ($createCode) {
                    $_SESSION['addNewCodeText']         = '';
                    $_SESSION['addNewCodeForType']      = '';
                    $_SESSION['addNewCodeValueCode']    = '';
                    $_SESSION['addNewCodeTypeGame']     = '';
                    $_SESSION['addNewCodeDetailText']   = '';
                    
                    $listNewCodes = mysqli_query($conn, "INSERT INTO log_codes(code) VALUES('$codeText');") or die(mysqli_error($conn));
                    
                    echo("<meta http-equiv='refresh' content='0'>");
                } else {
                    $_SESSION['error_msg'] = 'Chyba při vytváření!';
                }
            }
        }
    }
    if($_SESSION['error_msg'] != null){
        include 'addNewCodePage.php';
    }
?>
