<?php
    
    function dbRecountCoins($coinsToRecount) {
        include '_connectDB.php';
        
        for ($i = 0; $i < count($coinsToRecount); $i++) {
            $id                             = $coinsToRecount[$i];
            $coin_qua                       = 0;
            $coin_rel                       = 0;
            
            $sqlCoins = 
                    "SELECT "
                    . "quantity, "
                    . "released "
                    . "FROM coins WHERE id ='".$id."';";
            
            $queryCoins = mysqli_query($conn,$sqlCoins);
            $resultCoins = mysqli_fetch_assoc($queryCoins);
            
            $coin_rel += $resultCoins['released'];
            $coin_qua += $resultCoins['quantity'];
            $coin_rem = $coin_qua - $coin_rel;
            
            $udpSqlCoins = 
                    "UPDATE coins SET "
                    . "remains = '".$coin_rem."' "
                    . "WHERE id ='".$id."'";
            $queryUpdCoins = mysqli_query($conn,$udpSqlCoins);
            
        }
    }

