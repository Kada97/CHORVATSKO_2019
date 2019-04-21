<?php
    function removeDangerFromString($wrongString) {
        include "_connectDB.php";
        htmlspecialchars($wrongString);
        $newString = stripslashes($wrongString);
        $newString = mysqli_escape_string($conn, $newString);
        mysqli_close($conn);
        return $newString;
    }
    
    function getVerificationCode($base){
        $t1     = mb_substr(str_shuffle($base), 1, 1, "utf-8");
        $t2     = mb_substr(str_shuffle($base), -2,1, "utf-8");
        $t3     = chr(rand(97, 122));
        $t4     = rand(0,9);
        $t5     = rand(0,9);
        $t6     = rand(0,9);
        $temp   = $t1.$t2.$t3.$t4.$t5.$t6;
        return str_shuffle($temp);
    }
    
    function getAge($birthday){
        return date_diff(date_create($birthday), date_create('now'))->y;
    }
    
    function dbRecount(){
	include "_webSession.php";
	include "_connectDB.php";
        include "_recountDB.php";
    }
    
    function numbDay(){
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
?>
