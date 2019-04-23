<?php
    function removeDangerFromString($wrongString) {
        include "_connectDB.php";
        htmlspecialchars($wrongString);
        $newString = stripslashes($wrongString);
        $newString = mysqli_escape_string($conn, $newString);
        mysqli_close($conn);
        
        return $newString;
    }
    
    function getVerificationCode($base) {
        $t1     = mb_substr(str_shuffle($base), 1, 1, "utf-8");
        $t2     = mb_substr(str_shuffle($base), -2,1, "utf-8");
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
	include "_webSession.php";
	include "_connectDB.php";
        include "_recountDB.php";
    }
    
    function numbDay() {
	//-21
	$m = 0;
	$m += date("i");
	$result = $m % 8;
	if($result == 0){
	    $result = 9;
	}
        
	return $result;
	//return mt_rand(1, 9);
	//return date("d")- 21;
    }
    
    function sendLog($location, $what, $priority = 0) {
        include '_connectDB.php';
        
        $w = $what != '' ? $what : $_SESSION['error_msg'];
        $l = $location != '' ? $location : $_SESSION['error_location'];
        $u = isset($_SESSION['username']) ? $_SESSION['username'] : 'None' ;
        $d = '';

        foreach ($_POST as $key => $value){
            $d .= '['.$key.']';
            $d .= ' => ';
            $d .= $value;
            $d .= '  |  ';
        }

        $loggerQuery = "INSERT INTO logger (who, location, what, detail, priority) VALUES ('$u', '$l', '$w', '$d', '$priority');";
        $logger = mysqli_query($conn, $loggerQuery) or die(mysqli_error($conn));
        
    }
?>
