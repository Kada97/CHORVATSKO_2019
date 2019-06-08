<?php
    if (isSet($_POST['addNewCode'])) {
        $codeText       = null;
        $forType        = null;
        $valueCode      = null;
        $typeGame       = null;
        $detailText     = null;

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'codeText':        $codeText                               = $value; 
                                        $_SESSION['addNewCodeText']             = $value;   break;
                                    
                case 'forType':         $forType                                = $value; 
                                        $_SESSION['addNewCodeForType']          = $value;   break;
                                    
                case 'valueCode':       $valueCode                              = $value; 
                                        $_SESSION['addNewCodeValueCode']        = $value;   break;
                                    
                case 'typeGame':        $typeGame                               = $value; 
                                        $_SESSION['addNewCodeTypeGame']         = $value;   break;
                                    
                case 'detailText':      $detailText                             = $value; 
                                        $_SESSION['addNewCodeDetailText']       = $value;   break;
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


