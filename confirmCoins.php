<?php

    if (isSet($_POST['confirmCoins'])) {
        $chooseUser = null;
        $coin1 = null;
        $coin2 = null;
        $coin3 = null;
        $coin4 = null;
        $coin5 = null;
        $coin6 = null;
        $coin7 = null;
        $coin8 = null;
        $coin9 = null;
        $coin10 = null;
        $coin11 = null;
        $coin12 = null;
        $coin13 = null;
        $coin14 = null;
        $coin15 = null;
        $coin16 = null;
        $coin17 = null;
        $coin18 = null;
        $coin19 = null;
        $coin20 = null;
        $coin21 = null;
        $coin22 = null;
        $coin23 = null;
        $coin24 = null;
        $coin25 = null;
        $coin26 = null;
        $coins = array();

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'chooseUser':  $chooseUser             = $value;   
                                    $_SESSION['coinChooseUser'] = $value;  break;
                                
                case 'coin1':       $coin1                  = $value;
                                    $_SESSION['coin1']      = $value;      
                                    if($value !=0){$coins[] = 1;}            
                                                            break;
                                                            
                case 'coin2':       $coin2                  = $value;
                                    $_SESSION['coin2']      = $value;
                                    if($value !=0){$coins[] = 2;}            
                                                            break;
                                                            
                case 'coin3':       $coin3                  = $value;
                                    $_SESSION['coin3']      = $value;
                                    if($value !=0){$coins[] = 3;}            
                                                            break;
                                                            
                case 'coin4':       $coin4                  = $value;
                                    $_SESSION['coin4']      = $value;
                                    if($value !=0){$coins[] = 4;}            
                                                            break;
                                                            
                case 'coin5':       $coin5                  = $value;
                                    $_SESSION['coin5']      = $value;
                                    if($value !=0){$coins[] = 5;}            
                                                            break;
                                                            
                case 'coin6':       $coin6                  = $value;
                                    $_SESSION['coin6']      = $value;
                                    if($value !=0){$coins[] = 6;}            
                                                            break;
                                                            
                case 'coin7':       $coin7                  = $value;
                                    $_SESSION['coin7']      = $value;
                                    if($value !=0){$coins[] = 7;}            
                                                            break;
                                                            
                case 'coin8':       $coin8                  = $value;
                                    $_SESSION['coin8']      = $value;
                                    if($value !=0){$coins[] = 8;}            
                                                            break;
                                                            
                case 'coin9':       $coin9                  = $value;
                                    $_SESSION['coin9']      = $value;
                                    if($value !=0){$coins[] = 9;}            
                                                            break;
                                                            
                case 'coin10':      $coin10                 = $value;
                                    $_SESSION['coin10']     = $value;
                                    if($value !=0){$coins[] = 10;}            
                                                            break;
                                                            
                case 'coin11':      $coin11                 = $value;
                                    $_SESSION['coin11']     = $value;
                                    if($value !=0){$coins[] = 11;}            
                                                            break;
                                                            
                case 'coin12':      $coin12                 = $value;
                                    $_SESSION['coin12']     = $value;
                                    if($value !=0){$coins[] = 12;}            
                                                            break;
                                                            
                case 'coin13':      $coin13                 = $value;
                                    $_SESSION['coin13']     = $value;
                                    if($value !=0){$coins[] = 13;}            
                                                            break;
                                                            
                case 'coin14':      $coin14                 = $value;
                                    $_SESSION['coin14']     = $value;
                                    if($value !=0){$coins[] = 14;}            
                                                            break;
                                                            
                case 'coin15':      $coin15                 = $value;
                                    $_SESSION['coin15']     = $value;
                                    if($value !=0){$coins[] = 15;}            
                                                            break;
                                                            
                case 'coin16':      $coin16                 = $value;
                                    $_SESSION['coin16']     = $value;
                                    if($value !=0){$coins[] = 16;}            
                                                            break;
                                                            
                case 'coin17':      $coin17                 = $value;
                                    $_SESSION['coin17']     = $value;
                                    if($value !=0){$coins[] = 17;}            
                                                            break;
                                                            
                case 'coin18':      $coin18                 = $value;
                                    $_SESSION['coin18']     = $value;
                                    if($value !=0){$coins[] = 18;}            
                                                            break;
                                                            
                case 'coin19':      $coin19                 = $value;
                                    $_SESSION['coin19']     = $value;
                                    if($value !=0){$coins[] = 19;}            
                                                            break;
                                                            
                case 'coin20':      $coin20                 = $value;
                                    $_SESSION['coin20']     = $value;
                                    if($value !=0){$coins[] = 20;}            
                                                            break;
                                                            
                case 'coin21':      $coin21                 = $value;
                                    $_SESSION['coin21']     = $value;
                                    if($value !=0){$coins[] = 21;}            
                                                            break;
                                                            
                case 'coin22':      $coin22                 = $value;
                                    $_SESSION['coin22']     = $value;
                                    if($value !=0){$coins[] = 22;}            
                                                            break;
                                                            
                case 'coin23':      $coin23                 = $value;
                                    $_SESSION['coin23']     = $value;
                                    if($value !=0){$coins[] = 23;}            
                                                            break;
                                                            
                case 'coin24':      $coin24                 = $value;
                                    $_SESSION['coin24']     = $value;
                                    if($value !=0){$coins[] = 24;}            
                                                            break;
                                                            
                case 'coin25':      $coin25                 = $value;
                                    $_SESSION['coin25']     = $value;
                                    if($value !=0){$coins[] = 25;}            
                                                            break;
                                                            
                case 'coin26':      $coin26                 = $value;
                                    $_SESSION['coin26']     = $value;
                                    if($value !=0){$coins[] = 26;}            
                                                            break;
                                                            
            }
        }
        if ($chooseUser == null) {
           $_SESSION['error_msg'] = 'Vyber uživatele!'; 
        }
        if (count($coins) <= 0) {
            $_SESSION['error_msg'] = 'Nebyl vybrán žádný žeton k manipulaci!'; 
        }
        
        if ($_SESSION['error_msg'] == '') {
            include '_connectDB.php';
            
            for ($i = 0; $i < count($coins); $i++) {
                $id = $coins[$i];
                $c = "coin".$id;
                $qua = $_SESSION[$c];
                if ($qua == 0){continue;}
                
                $sqlLogInsert = "INSERT INTO log_coins(coin_id,user_id,quantity)
                                 VALUES('$id','$chooseUser','$qua');";
                $insertLog = mysqli_query($conn, $sqlLogInsert) or die(mysqli_error($conn));
                
                $sqlCoins = 
                        "SELECT "
                        . "released, "
                        . "value "
                        . "FROM coins WHERE id ='".$id."';";

                $queryCoins = mysqli_query($conn,$sqlCoins);
                $resultCoins = mysqli_fetch_assoc($queryCoins);

                $qua += $resultCoins['released'];

                $udpSqlCoins = 
                        "UPDATE coins SET "
                        . "released = '".$qua."' "
                        . "WHERE id ='".$id."'";
                $queryUpdCoins = mysqli_query($conn,$udpSqlCoins);
                
                
                $sqlMoney = 
                        "SELECT "
                        . "coin_value_earned, "
                        . "coin_value_returned "
                        . "FROM money_records WHERE id ='".$chooseUser."';";

                $queryMoney = mysqli_query($conn,$sqlMoney);
                $resultMoney = mysqli_fetch_assoc($queryMoney);

                $earned     = 0;
                $returned   = 0;
                $earned     += $resultMoney['coin_value_earned'];
                $returned   += $resultMoney['coin_value_returned'];
                $coinValue  = $resultCoins['value'];
                $udpSqlMoney = "";
                
                if ($_SESSION[$c] < 0) {
                    $returned += $_SESSION[$c] * $coinValue * (-1);
                    $udpSqlMoney = 
                        "UPDATE money_records SET "
                        . "coin_value_returned = '".$returned."' "
                        . "WHERE id ='".$chooseUser."'";
                }
                if ($_SESSION[$c] > 0) {
                    $earned += $_SESSION[$c] * $coinValue;
                    $udpSqlMoney = 
                        "UPDATE money_records SET "
                        . "coin_value_earned = '".$earned."' "
                        . "WHERE id ='".$chooseUser."'";
                }
                
                $queryUpdMoney = mysqli_query($conn,$udpSqlMoney);
                
            }  
            $user = array();
            $user[] = $chooseUser;
            include_once '_dbRecountCoins.php';
            include_once '_dbRecountMoney.php';
            dbRecountCoins($coins);
            dbRecountMoney($user);
        }
    }
    include 'coinManagerPage.php';
?>


