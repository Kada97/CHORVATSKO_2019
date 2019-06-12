<?php
    include '_connectDB.php';
    
    if (isset($_POST['cleanPoints'])) {
        
	$points		= 0;
	$userTo		= null;
	
	foreach ($_POST as $key => $value) {
	    switch ($key) {
		case 'numberPoints':	$points  += $value; 
		case 'chooseUserTo':	$userTo = $value; 
	    }
	}
        
        $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM users WHERE username = '$userTo';"));
        $idUser = $result['id'];
        
        $sql = "";
        if($points > 0){
            $sql = "UPDATE money_records SET money_extra_clean_won = money_extra_clean_won+'$points' WHERE username = '$userTo';";
        }
        else {
            $points *= -1;
            $sql = "UPDATE money_records SET money_extra_clean_lost = money_extra_clean_lost+'$points' WHERE username = '$userTo';";
        }
        
        mysqli_query($conn, $sql);
        include_once '_dbRecountMoney.php';
        
        $temp = array();
        $temp[] = $idUser;
        dbRecountMoney($temp);
        include 'cleanPointsPage.php';
        
    }
    