<?php
//codes,coins,errors,newcodes,teamdata,teams,userdata,users,gametictactoe

$coin_n_v_ch_white_val = 0;
$coin_n_v_ch_red_val = 0;
$coin_n_v_ch_blue_val = 0;
$coin_n_v_ch_green_val = 0;
$coin_n_v_ch_black_val = 0;
$coin_n_v_std_white_val = 0;
$coin_n_v_std_red_val = 0;
$coin_n_v_std_blue_val = 0;
$coin_n_v_std_green_val = 0;
$coin_n_v_std_black_val = 0;
$coin_y_v_std_white_val = 0;
$coin_y_v_std_blue_val = 0;
$coin_y_v_std_green_val = 0;
$coin_y_v_std_red_val = 0;
$coin_y_v_std_black_val = 0;
$coin_y_v_oth_red_val = 0;
$coin_y_v_oth_green_val = 0;
$coin_y_v_oth_lightblue_val = 0;
$coin_y_v_oth_whitepurple_val = 0;
$coin_y_v_ult_red_val = 0;
$coin_y_v_ult_darkblue_val = 0;
$coin_y_v_ult_green_val = 0;
$coin_y_v_ult_lightblue_val = 0;
$coin_y_v_ult_black_val = 0;
$coin_y_v_ult_purple_val = 0;
$coin_y_v_ult_yellow_val = 0;
$coin_n_v_ch_white_tot = 0;
$coin_n_v_ch_red_tot = 0;
$coin_n_v_ch_blue_tot = 0;
$coin_n_v_ch_green_tot = 0;
$coin_n_v_ch_black_tot = 0;
$coin_n_v_std_white_tot = 0;
$coin_n_v_std_red_tot = 0;
$coin_n_v_std_blue_tot = 0;
$coin_n_v_std_green_tot = 0;
$coin_n_v_std_black_tot = 0;
$coin_y_v_std_white_tot = 0;
$coin_y_v_std_blue_tot = 0;
$coin_y_v_std_green_tot = 0;
$coin_y_v_std_red_tot = 0;
$coin_y_v_std_black_tot = 0;
$coin_y_v_oth_red_tot = 0;
$coin_y_v_oth_green_tot = 0;
$coin_y_v_oth_lightblue_tot = 0;
$coin_y_v_oth_whitepurple_tot = 0;
$coin_y_v_ult_red_tot = 0;
$coin_y_v_ult_darkblue_tot = 0;
$coin_y_v_ult_green_tot = 0;
$coin_y_v_ult_lightblue_tot = 0;
$coin_y_v_ult_black_tot = 0;
$coin_y_v_ult_purple_tot = 0;
$coin_y_v_ult_yellow_tot = 0;
$coin_n_v_ch_white_qua = 0;
$coin_n_v_ch_red_qua = 0;
$coin_n_v_ch_blue_qua = 0;
$coin_n_v_ch_green_qua = 0;
$coin_n_v_ch_black_qua = 0;
$coin_n_v_std_white_qua = 0;
$coin_n_v_std_red_qua = 0;
$coin_n_v_std_blue_qua = 0;
$coin_n_v_std_green_qua = 0;
$coin_n_v_std_black_qua = 0;
$coin_y_v_std_white_qua = 0;
$coin_y_v_std_blue_qua = 0;
$coin_y_v_std_green_qua = 0;
$coin_y_v_std_red_qua = 0;
$coin_y_v_std_black_qua = 0;
$coin_y_v_oth_red_qua = 0;
$coin_y_v_oth_green_qua = 0;
$coin_y_v_oth_lightblue_qua = 0;
$coin_y_v_oth_whitepurple_qua = 0;
$coin_y_v_ult_red_qua = 0;
$coin_y_v_ult_darkblue_qua = 0;
$coin_y_v_ult_green_qua = 0;
$coin_y_v_ult_lightblue_qua = 0;
$coin_y_v_ult_black_qua = 0;
$coin_y_v_ult_purple_qua = 0;
$coin_y_v_ult_yellow_qua = 0;

// GET TABLE OF COINS AND DEFINE VARIABLES
$sqlGetCoins = "SELECT * FROM coins;";
$allCoinsData = mysqli_query($conn, $sqlGetCoins);
while($coinResult = mysqli_fetch_assoc($allCoinsData)){
    switch($coinResult['label']){
	
        case 'coin_nv_ch_white':	    $coin_n_v_ch_white_val	    = $coinResult["value"];break;
        case 'coin_nv_ch_red':		    $coin_n_v_ch_red_val	    = $coinResult['value'];break;
        case 'coin_nv_ch_blue':		    $coin_n_v_ch_bluex_val	    = $coinResult['value'];break;
        case 'coin_nv_ch_green':	    $coin_n_v_ch_greenx_val	    = $coinResult['value'];break;
        case 'coin_nv_ch_black':	    $coin_n_v_ch_black_val	    = $coinResult['value'];break;
        case 'coin_nv_std_white':	    $coin_n_v_std_white_val	    = $coinResult['value'];break;
        case 'coin_nv_std_red':		    $coin_n_v_std_red_val	    = $coinResult['value'];break;
        case 'coin_nv_std_blue':	    $coin_n_v_std_blue_val	    = $coinResult['value'];break;
        case 'coin_nv_std_green':	    $coin_n_v_std_green_val	    = $coinResult['value'];break;
        case 'coin_nv_std_black':	    $coin_n_v_std_black_val	    = $coinResult['value'];break;
        case 'coin_yv_std_white':	    $coin_y_v_std_white_val	    = $coinResult['value'];break;
        case 'coin_yv_std_blue':	    $coin_y_v_std_blue_val	    = $coinResult['value'];break;
        case 'coin_yv_std_green':	    $coin_y_v_std_green_val	    = $coinResult['value'];break;
        case 'coin_yv_std_red':		    $coin_y_v_std_red_val	    = $coinResult['value'];break;
        case 'coin_yv_std_black':	    $coin_y_v_std_black_val	    = $coinResult['value'];break;
        case 'coin_yv_oth_red':		    $coin_y_v_oth_red_val	    = $coinResult['value'];break;
        case 'coin_yv_oth_green':	    $coin_y_v_oth_green_val	    = $coinResult['value'];break;
        case 'coin_yv_oth_lightblue':	    $coin_y_v_oth_lightblue_val	    = $coinResult['value'];break;
        case 'coin_yv_oth_whitepurple':	    $coin_y_v_oth_whitepurple_val   = $coinResult['value'];break;
        case 'coin_yv_ult_red':		    $coin_y_v_ult_red_val	    = $coinResult['value'];break;
        case 'coin_yv_ult_darkblue':	    $coin_y_v_ult_darkblue_val	    = $coinResult['value'];break;
        case 'coin_yv_ult_green':	    $coin_y_v_ult_green_val	    = $coinResult['value'];break;
        case 'coin_yv_ult_lightblue':	    $coin_y_v_ult_lightblue_val	    = $coinResult['value'];break;
        case 'coin_yv_ult_black':	    $coin_y_v_ult_black_val	    = $coinResult['value'];break;
        case 'coin_yv_ult_purple':	    $coin_y_v_ult_purple_val	    = $coinResult['value'];break;
        case 'coin_yv_ult_yellow':	    $coin_y_v_ult_yellow_val	    = $coinResult['value'];break;
    }
    switch($coinResult['label']){
	case 'coin_nv_ch_white':	    $coin_n_v_ch_white_qua	    = $coinResult['quantity'];break;
        case 'coin_nv_ch_red':		    $coin_n_v_ch_red_qua	    = $coinResult['quantity'];break;
        case 'coin_nv_ch_blue':		    $coin_n_v_ch_blue_qua	    = $coinResult['quantity'];break;
        case 'coin_nv_ch_green':	    $coin_n_v_ch_green_qua	    = $coinResult['quantity'];break;
        case 'coin_nv_ch_black':	    $coin_n_v_ch_black_qua	    = $coinResult['quantity'];break;
        case 'coin_nv_std_white':	    $coin_n_v_std_white_qua	    = $coinResult['quantity'];break;
        case 'coin_nv_std_red':		    $coin_n_v_std_red_qua	    = $coinResult['quantity'];break;
        case 'coin_nv_std_blue':	    $coin_n_v_std_blue_qua	    = $coinResult['quantity'];break;
        case 'coin_nv_std_green':	    $coin_n_v_std_green_qua	    = $coinResult['quantity'];break;
        case 'coin_nv_std_black':	    $coin_n_v_std_black_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_std_white':	    $coin_y_v_std_white_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_std_blue':	    $coin_y_v_std_blue_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_std_green':	    $coin_y_v_std_green_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_std_red':		    $coin_y_v_std_red_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_std_black':	    $coin_y_v_std_black_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_oth_red':		    $coin_y_v_oth_red_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_oth_green':	    $coin_y_v_oth_green_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_oth_lightblue':	    $coin_y_v_oth_lightblue_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_oth_whitepurple':	    $coin_y_v_oth_whitepurple_qua   = $coinResult['quantity'];break;
        case 'coin_yv_ult_red':		    $coin_y_v_ult_red_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_ult_darkblue':	    $coin_y_v_ult_darkblue_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_ult_green':	    $coin_y_v_ult_green_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_ult_lightblue':	    $coin_y_v_ult_lightblue_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_ult_black':	    $coin_y_v_ult_black_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_ult_purple':	    $coin_y_v_ult_purple_qua	    = $coinResult['quantity'];break;
        case 'coin_yv_ult_yellow':	    $coin_y_v_ult_yellow_qua	    = $coinResult['quantity'];break;
    }
}

// GET TABLE OF USERDATA AND DEFINE VARIABLES - GET ALL COINS FOR COUNT A TOTALS
$sqlGetUserdata = "SELECT * FROM userdata;";
$allUserdata = mysqli_query($conn, $sqlGetUserdata);
while($userDataResult = mysqli_fetch_assoc($allUserdata)){
    $coin_n_v_ch_white_tot	    += $userDataResult['coin_n_v_ch_white'];
    $coin_n_v_ch_red_tot	    += $userDataResult['coin_n_v_ch_red'];
    $coin_n_v_ch_blue_tot	    += $userDataResult['coin_n_v_ch_blue'];
    $coin_n_v_ch_green_tot	    += $userDataResult['coin_n_v_ch_green'];
    $coin_n_v_ch_black_tot	    += $userDataResult['coin_n_v_ch_black'];
    $coin_n_v_std_white_tot	    += $userDataResult['coin_n_v_std_white'];
    $coin_n_v_std_red_tot	    += $userDataResult['coin_n_v_std_red'];
    $coin_n_v_std_blue_tot	    += $userDataResult['coin_n_v_std_blue'];
    $coin_n_v_std_green_tot	    += $userDataResult['coin_n_v_std_green'];
    $coin_n_v_std_black_tot	    += $userDataResult['coin_n_v_std_black'];
    $coin_y_v_std_white_tot	    += $userDataResult['coin_y_v_std_white'];
    $coin_y_v_std_blue_tot	    += $userDataResult['coin_y_v_std_blue'];
    $coin_y_v_std_green_tot	    += $userDataResult['coin_y_v_std_green'];
    $coin_y_v_std_red_tot	    += $userDataResult['coin_y_v_std_red'];
    $coin_y_v_std_black_tot	    += $userDataResult['coin_y_v_std_black'];
    $coin_y_v_oth_red_tot	    += $userDataResult['coin_y_v_oth_red'];
    $coin_y_v_oth_green_tot	    += $userDataResult['coin_y_v_oth_green'];
    $coin_y_v_oth_lightblue_tot	    += $userDataResult['coin_y_v_oth_lightblue'];
    $coin_y_v_oth_whitepurple_tot   += $userDataResult['coin_y_v_oth_whitepurple'];
    $coin_y_v_ult_red_tot	    += $userDataResult['coin_y_v_ult_red'];
    $coin_y_v_ult_darkblue_tot	    += $userDataResult['coin_y_v_ult_darkblue'];
    $coin_y_v_ult_green_tot	    += $userDataResult['coin_y_v_ult_green'];
    $coin_y_v_ult_lightblue_tot	    += $userDataResult['coin_y_v_ult_lightblue'];
    $coin_y_v_ult_black_tot	    += $userDataResult['coin_y_v_ult_black'];
    $coin_y_v_ult_purple_tot	    += $userDataResult['coin_y_v_ult_purple'];
    $coin_y_v_ult_yellow_tot	    += $userDataResult['coin_y_v_ult_yellow'];
}

// DEFINING A VARIABLES OF DIFFERENCE - HOW MONY COINS REMAINS IN BANK
$coin_n_v_ch_white_diff		= $coin_n_v_ch_white_qua - $coin_n_v_ch_white_tot;
$coin_n_v_ch_red_diff		= $coin_n_v_ch_red_qua - $coin_n_v_ch_red_tot;
$coin_n_v_ch_blue_diff		= $coin_n_v_ch_blue_qua - $coin_n_v_ch_blue_tot;
$coin_n_v_ch_green_diff		= $coin_n_v_ch_green_qua - $coin_n_v_ch_green_tot;
$coin_n_v_ch_black_diff		= $coin_n_v_ch_black_qua - $coin_n_v_ch_black_tot;
$coin_n_v_std_white_diff	= $coin_n_v_std_white_qua - $coin_n_v_std_white_tot;
$coin_n_v_std_red_diff		= $coin_n_v_std_red_qua - $coin_n_v_std_red_tot;
$coin_n_v_std_blue_diff		= $coin_n_v_std_blue_qua - $coin_n_v_std_blue_tot;
$coin_n_v_std_green_diff	= $coin_n_v_std_green_qua - $coin_n_v_std_green_tot;
$coin_n_v_std_black_diff	= $coin_n_v_std_black_qua - $coin_n_v_std_black_tot;
$coin_y_v_std_white_diff	= $coin_y_v_std_white_qua - $coin_y_v_std_white_tot;
$coin_y_v_std_blue_diff		= $coin_y_v_std_blue_qua - $coin_y_v_std_blue_tot;
$coin_y_v_std_green_diff	= $coin_y_v_std_green_qua - $coin_y_v_std_green_tot;
$coin_y_v_std_red_diff		= $coin_y_v_std_red_qua - $coin_y_v_std_red_tot;
$coin_y_v_std_black_diff	= $coin_y_v_std_black_qua - $coin_y_v_std_black_tot;
$coin_y_v_oth_red_diff		= $coin_y_v_oth_red_qua - $coin_y_v_oth_red_tot;
$coin_y_v_oth_green_diff	= $coin_y_v_oth_green_qua - $coin_y_v_oth_green_tot;
$coin_y_v_oth_lightblue_diff	= $coin_y_v_oth_lightblue_qua - $coin_y_v_oth_lightblue_tot;
$coin_y_v_oth_whitepurple_diff	= $coin_y_v_oth_whitepurple_qua - $coin_y_v_oth_whitepurple_tot;
$coin_y_v_ult_red_diff		= $coin_y_v_ult_red_qua - $coin_y_v_ult_red_tot;
$coin_y_v_ult_darkblue_diff	= $coin_y_v_ult_darkblue_qua - $coin_y_v_ult_darkblue_tot;
$coin_y_v_ult_green_diff	= $coin_y_v_ult_green_qua - $coin_y_v_ult_green_tot;
$coin_y_v_ult_lightblue_diff	= $coin_y_v_ult_lightblue_qua - $coin_y_v_ult_lightblue_tot;
$coin_y_v_ult_black_diff	= $coin_y_v_ult_black_qua - $coin_y_v_ult_black_tot;
$coin_y_v_ult_purple_diff	= $coin_y_v_ult_purple_qua - $coin_y_v_ult_purple_tot;
$coin_y_v_ult_yellow_diff	= $coin_y_v_ult_yellow_qua - $coin_y_v_ult_yellow_tot;

// WE HAVE ALL DATA AND VALUES, UPDATE TABLE OF COINS
// CHANGE: RELEASED (total coins - using now), REMAINS(quantity minus using now) 
$upd = "UPDATE coins SET released = '".$coin_n_v_ch_white_tot."', remains ='".$coin_n_v_ch_white_diff."' WHERE label='coin_nv_ch_white';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_n_v_ch_red_tot."', remains ='".$coin_n_v_ch_red_diff."' WHERE label='coin_nv_ch_red';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_n_v_ch_blue_tot."', remains ='".$coin_n_v_ch_blue_diff."' WHERE label='coin_nv_ch_blue';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_n_v_ch_green_tot."', remains ='".$coin_n_v_ch_green_diff."' WHERE label='coin_nv_ch_green';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_n_v_ch_black_tot."', remains ='".$coin_n_v_ch_black_diff."' WHERE label='coin_nv_ch_black';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_n_v_std_white_tot."', remains ='".$coin_n_v_std_white_diff."' WHERE label='coin_nv_std_white';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_n_v_std_red_tot."', remains ='".$coin_n_v_std_red_diff."' WHERE label='coin_nv_std_red';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_n_v_std_blue_tot."', remains ='".$coin_n_v_std_blue_diff."' WHERE label='coin_nv_std_blue';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_n_v_std_green_tot."', remains ='".$coin_n_v_std_green_diff."' WHERE label='coin_nv_std_green';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_n_v_std_black_tot."', remains ='".$coin_n_v_std_black_diff."' WHERE label='coin_nv_std_black';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_std_white_tot."', remains ='".$coin_y_v_std_white_diff."' WHERE label='coin_yv_std_white';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_std_blue_tot."', remains ='".$coin_y_v_std_blue_diff."' WHERE label='coin_yv_std_blue';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_std_green_tot."', remains ='".$coin_y_v_std_green_diff."' WHERE label='coin_yv_std_green';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_std_red_tot."', remains ='".$coin_y_v_std_red_diff."' WHERE label='coin_yv_std_red';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_std_black_tot."', remains ='".$coin_y_v_std_black_diff."' WHERE label='coin_yv_std_black';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_oth_red_tot."', remains ='".$coin_y_v_oth_red_diff."' WHERE label='coin_yv_oth_red';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_oth_green_tot."', remains ='".$coin_y_v_oth_green_diff."' WHERE label='coin_yv_oth_green';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_oth_lightblue_tot."', remains ='".$coin_y_v_oth_lightblue_diff."' WHERE label='coin_yv_oth_lightblue';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_oth_whitepurple_tot."', remains ='".$coin_y_v_oth_whitepurple_diff."' WHERE label='coin_yv_oth_whitepurple';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_ult_red_tot."', remains ='".$coin_y_v_ult_red_diff."' WHERE label='coin_yv_ult_red';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_ult_darkblue_tot."', remains ='".$coin_y_v_ult_darkblue_diff."' WHERE label='coin_yv_ult_darkblue';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_ult_green_tot."', remains ='".$coin_y_v_ult_green_diff."' WHERE label='coin_yv_ult_green';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_ult_lightblue_tot."', remains ='".$coin_y_v_ult_lightblue_diff."' WHERE label='coin_yv_ult_lightblue';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_ult_black_tot."', remains ='".$coin_y_v_ult_black_diff."' WHERE label='coin_yv_ult_black';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_ult_purple_tot."', remains ='".$coin_y_v_ult_purple_diff."' WHERE label='coin_yv_ult_purple';";
$query = mysqli_query($conn, $upd);
$upd = "UPDATE coins SET released = '".$coin_y_v_ult_yellow_tot."', remains ='".$coin_y_v_ult_yellow_diff."' WHERE label='coin_yv_ult_yellow';";
$query = mysqli_query($conn, $upd);

// SET UP AND UPDATE USERDATA
// FOR EACH USER DO THIS
$sqlGetUserdata = "SELECT * FROM userdata;";
$allUserdata = mysqli_query($conn, $sqlGetUserdata);
while($userDataResult = mysqli_fetch_assoc($allUserdata)){
    
    // WE CAN USE OLD VARIABLES AS A NEW TOTALS - TOTAL OF COINS PER EACH USER
    $coin_n_v_ch_white_tot	    = $userDataResult['coin_n_v_ch_white'];
    $coin_n_v_ch_red_tot	    = $userDataResult['coin_n_v_ch_red'];
    $coin_n_v_ch_blue_tot	    = $userDataResult['coin_n_v_ch_blue'];
    $coin_n_v_ch_green_tot	    = $userDataResult['coin_n_v_ch_green'];
    $coin_n_v_ch_black_tot	    = $userDataResult['coin_n_v_ch_black'];
    $coin_n_v_std_white_tot	    = $userDataResult['coin_n_v_std_white'];
    $coin_n_v_std_red_tot	    = $userDataResult['coin_n_v_std_red'];
    $coin_n_v_std_blue_tot	    = $userDataResult['coin_n_v_std_blue'];
    $coin_n_v_std_green_tot	    = $userDataResult['coin_n_v_std_green'];
    $coin_n_v_std_black_tot	    = $userDataResult['coin_n_v_std_black'];
    $coin_y_v_std_white_tot	    = $userDataResult['coin_y_v_std_white'];
    $coin_y_v_std_blue_tot	    = $userDataResult['coin_y_v_std_blue'];
    $coin_y_v_std_green_tot	    = $userDataResult['coin_y_v_std_green'];
    $coin_y_v_std_red_tot	    = $userDataResult['coin_y_v_std_red'];
    $coin_y_v_std_black_tot	    = $userDataResult['coin_y_v_std_black'];
    $coin_y_v_oth_red_tot	    = $userDataResult['coin_y_v_oth_red'];
    $coin_y_v_oth_green_tot	    = $userDataResult['coin_y_v_oth_green'];
    $coin_y_v_oth_lightblue_tot	    = $userDataResult['coin_y_v_oth_lightblue'];
    $coin_y_v_oth_whitepurple_tot   = $userDataResult['coin_y_v_oth_whitepurple'];
    $coin_y_v_ult_red_tot	    = $userDataResult['coin_y_v_ult_red'];
    $coin_y_v_ult_darkblue_tot	    = $userDataResult['coin_y_v_ult_darkblue'];
    $coin_y_v_ult_green_tot	    = $userDataResult['coin_y_v_ult_green'];
    $coin_y_v_ult_lightblue_tot	    = $userDataResult['coin_y_v_ult_lightblue'];
    $coin_y_v_ult_black_tot	    = $userDataResult['coin_y_v_ult_black'];
    $coin_y_v_ult_purple_tot	    = $userDataResult['coin_y_v_ult_purple'];
    $coin_y_v_ult_yellow_tot	    = $userDataResult['coin_y_v_ult_yellow'];
    
    // SUM OF ALL COINS USER HAVE
    $tempCoinTotalNumber = $coin_n_v_ch_white_tot + $coin_n_v_ch_red_tot + $coin_n_v_ch_blue_tot + $coin_n_v_ch_green_tot + $coin_n_v_ch_black_tot + $coin_n_v_std_white_tot + $coin_n_v_std_red_tot + $coin_n_v_std_blue_tot + $coin_n_v_std_green_tot + $coin_n_v_std_black_tot + $coin_y_v_std_white_tot + $coin_y_v_std_blue_tot + $coin_y_v_std_green_tot + $coin_y_v_std_red_tot + $coin_y_v_std_black_tot + $coin_y_v_oth_red_tot + $coin_y_v_oth_green_tot + $coin_y_v_oth_lightblue_tot + $coin_y_v_oth_whitepurple_tot + $coin_y_v_ult_red_tot + $coin_y_v_ult_darkblue_tot + $coin_y_v_ult_green_tot + $coin_y_v_ult_lightblue_tot + $coin_y_v_ult_black_tot + $coin_y_v_ult_purple_tot + $coin_y_v_ult_yellow_tot;
    
    // COUNTING VALUE OF COINS USER HAVE
    $tempCoinTotalValue = ($coin_n_v_ch_white_val * $coin_n_v_ch_white_tot) + ($coin_n_v_ch_red_val * $coin_n_v_ch_red_tot) + ($coin_n_v_ch_blue_val * $coin_n_v_ch_blue_tot) + ($coin_n_v_ch_green_val * $coin_n_v_ch_green_tot) + ($coin_n_v_ch_black_val * $coin_n_v_ch_black_tot) + ($coin_n_v_std_white_val * $coin_n_v_std_white_tot) + ($coin_n_v_std_red_val * $coin_n_v_std_red_tot) + ($coin_n_v_std_blue_val * $coin_n_v_std_blue_tot) + ($coin_n_v_std_green_val * $coin_n_v_std_green_tot) + ($coin_n_v_std_black_val * $coin_n_v_std_black_tot) + ($coin_y_v_std_white_val * $coin_y_v_std_white_tot) + ($coin_y_v_std_blue_val * $coin_y_v_std_blue_tot) + ($coin_y_v_std_green_val * $coin_y_v_std_green_tot) + ($coin_y_v_std_red_val * $coin_y_v_std_red_tot) + ($coin_y_v_std_black_val * $coin_y_v_std_black_tot) + ($coin_y_v_oth_red_val * $coin_y_v_oth_red_tot) + ($coin_y_v_oth_green_val * $coin_y_v_oth_green_tot) + ($coin_y_v_oth_lightblue_val * $coin_y_v_oth_lightblue_tot) + ($coin_y_v_oth_whitepurple_val * $coin_y_v_oth_whitepurple_tot) + ($coin_y_v_ult_red_val * $coin_y_v_ult_red_tot) + ($coin_y_v_ult_darkblue_val * $coin_y_v_ult_darkblue_tot) + ($coin_y_v_ult_green_val * $coin_y_v_ult_green_tot) + ($coin_y_v_ult_lightblue_val * $coin_y_v_ult_lightblue_tot) + ($coin_y_v_ult_black_val * $coin_y_v_ult_black_tot) + ($coin_y_v_ult_purple_val * $coin_y_v_ult_purple_tot) + ($coin_y_v_ult_yellow_val * $coin_y_v_ult_yellow_tot);
    
    // COUNTING A BALANCE OF BANK TRANSACTION
    $tempBankBalance = $userDataResult['data_bank_trans_val_received'] - $userDataResult['data_bank_trans_val_sent'];

    // COUNTING AND DATA_CLEANPOINTS
    $data_cleanpts_bal = $userDataResult['data_cleanpts_earned'] - $userDataResult['data_cleanpts_lost'];
    
    // DEFINE A RANK
    $wl = $userDataResult['data_weblogins'];
    $rank = "";
    
    $nwl = 0;
    $nwl += $wl;
    $nwl /=3;
    $nwl = round($nwl);
    
    switch ($nwl) {
	case 0 : $rank = "NOOB"; break;
	case 1 : $rank = "WEBOVÝ ODPAD"; break;
	case 2 : $rank = "NÁVŠTĚVNÍK"; break;
	case 3 : $rank = "TEN, KDO TO VZAL VÁŽNĚ"; break;
	case 4 : $rank = "CHVÁLYHODNÝ"; break;
	case 5 : $rank = "ZKUŠENÝ"; break;
	case 6 : $rank = "NOLIFER"; break;
	case 7 : $rank = "ZÁVISLÝ"; break;
	case 8 : $rank = "NEOČEKÁVANÝ"; break;
	case 9 : $rank = "SAHAJÍCÍ ZA HRANICE VESMÍRU"; break;
    }
    
    // COUNTING OF TOTAL MONEY OF QR
    
    $qr_mon_users = $userDataResult['qr_mon_users'];
    $qr_mon_teams = $userDataResult['qr_mon_teams'];
    $qr_mon_tot = $qr_mon_users + $qr_mon_teams;
    
    // COUNTING OF ALL DIVIDED MONEY ALREADY
    $mon_to_div_divided_tot = $userDataResult['mon_to_div_from_cg_divided_already'] + $userDataResult['mon_to_div_from_cpt_divided_already'];
    
    // COUNTING MONEY BALANCE AT INDIVIDUAL GAMES
    $mon_ig_all_bal = $userDataResult['mon_ig_all_won'] - $userDataResult['mon_ig_all_lost'];
    
    // COUNTING MONEY BALANCE FOR EACH WEB GAME
    $mon_wg_rnd_bal = $userDataResult['mon_wg_rnd_won'] - $userDataResult['mon_wg_rnd_lost'];
    $mon_wg_spin_bal = $userDataResult['mon_wg_spin_won'] - $userDataResult['mon_wg_spin_lost'];
    $mon_wg_ttt_bal = $userDataResult['mon_wg_ttt_won'] - $userDataResult['mon_wg_ttt_lost'];
    
    // COUNTING WEB GAMES STATS
    $mon_wg_all_bet = $userDataResult['mon_wg_ttt_bet'] + $userDataResult['mon_wg_spin_bet'] + $userDataResult['mon_wg_rnd_bet'];
    $mon_wg_all_lost = $userDataResult['mon_wg_ttt_lost'] + $userDataResult['mon_wg_spin_lost'] + $userDataResult['mon_wg_rnd_lost'];
    $mon_wg_all_won = $userDataResult['mon_wg_ttt_won'] + $userDataResult['mon_wg_spin_won'] + $userDataResult['mon_wg_rnd_won'];
    $mon_wg_all_bal = $mon_wg_all_won - $mon_wg_all_lost;
    
    // COUNTING OF TOTAL NUMBERS PLAYED WEB GAMES
    $wg_numb_played_lost = $userDataResult['wg_numb_played_ttt_lost'] + $userDataResult['wg_numb_played_spin_lost'] + $userDataResult['wg_numb_played_rnd_lost'];
    $wg_numb_played_won	= $userDataResult['wg_numb_played_ttt_won'] + $userDataResult['wg_numb_played_spin_won'] + $userDataResult['wg_numb_played_rnd_won'];
    $wg_numb_played_tot	= $wg_numb_played_won + $wg_numb_played_lost;
    
    // COUNTING ALL MONEY STATS
    $mon_all_bet = $mon_wg_all_bet + $userDataResult['mon_ig_all_bet'];
    $mon_all_lost = $mon_wg_all_lost + $userDataResult['mon_ig_all_lost'] + $userDataResult['data_cleanpts_lost'];
    $mon_all_won = $mon_wg_all_won + $userDataResult['mon_ig_all_won'] + $userDataResult['gifts_user_by_dom_val'] + $userDataResult['gifts_user_by_org_val'] + $userDataResult['gifts_user_by_cl_val'] + $userDataResult['gifts_user_by_sys_val'] + $userDataResult['gifts_team_by_cpt_val'] + $userDataResult['qr_mon_users'] + $userDataResult['data_cleanpts_earned'];
    $mon_all_bal = $mon_all_won - $mon_all_lost + $userDataResult['coin_total_value'];
    
    // UPDATE OF RECOUNTED VARIABLES
    $upd = "UPDATE userdata SET "
	    . "mon_all_bal = '".$mon_all_bal."', "
	    . "mon_all_won = '".$mon_all_won."', "
	    . "mon_all_lost = '".$mon_all_lost."',"
	    . "mon_all_bet = '".$mon_all_bet."', "
	    . "wg_numb_played_tot = '".$wg_numb_played_tot."', "
	    . "wg_numb_played_won = '".$wg_numb_played_won."', "
	    . "wg_numb_played_lost = '".$wg_numb_played_lost."', "
	    . "mon_wg_all_bal = '".$mon_wg_all_bal."', "
	    . "mon_wg_all_won = '".$mon_wg_all_won."', "
	    . "mon_wg_all_lost = '".$mon_wg_all_lost."', "
	    . "mon_wg_all_bet = '".$mon_wg_all_bet."', "
	    . "mon_wg_ttt_bal = '".$mon_wg_ttt_bal."',"
	    . "mon_wg_spin_bal = '".$mon_wg_spin_bal."',"
	    . "mon_wg_rnd_bal = '".$mon_wg_rnd_bal."', "
	    . "mon_ig_all_bal = '".$mon_ig_all_bal."', "
	    . "mon_to_div_divided_tot = '".$mon_to_div_divided_tot."', "
	    . "qr_mon_tot = '".$qr_mon_tot."', "
	    . "data_rank = '".$rank."', "
	    . "data_cleanpts_bal = '".$data_cleanpts_bal."', "
	    . "coin_total_value = '".$tempCoinTotalValue."', "
	    . "coin_total_number ='".$tempCoinTotalNumber."' "
	    . "WHERE id='".$userDataResult['id']."';";
    $query = mysqli_query($conn, $upd);
}

// COUNT NUMBER OF TEAMS
$sqlGetNumbTeams = "SELECT id FROM teams;";
$allNumbTeams = mysqli_query($conn, $sqlGetNumbTeams);
$numbTeams = mysqli_num_rows($allNumbTeams);

// FOR EACH ONE TEAM GET USER, WHO HAS IN USERDATA SAME TEAM_ID AS ACTUAL RECOUNTED TEAM (INDEX)
for($i = 1; $i<=$numbTeams; $i++){
    
    // FOR EACH TEAM RESET VALUES
    
    $mon_to_div_from_cg_divided_already = 0;
    $mon_to_div_from_cpt_divided_already = 0;
    $mon_to_div_divided_tot = 0;
    $qr_tot = 0;
    $qr_mon_tot = 0;
    $qr_mon_users = 0;
    $qr_mon_teams = 0;
    
    $memb_activ_first = 0;
    $memb_activ_second = 0;
    $memb_activ_third = 0;
    $memb_profit_first = 0;
    $memb_profit_second = 0;
    $memb_profit_third = 0;
    
    $res_memb_activ_first = "";
    $res_memb_activ_second = "";
    $res_memb_activ_third = "";
    $res_memb_profit_first = "";
    $res_memb_profit_second = "";
    $res_memb_profit_third = "";
    
    $team_data_weblogins = 0;
    $team_data_cleanpts_bal = 0;
    $team_data_cleanpts_earned = 0;
    $team_data_cleanpts_lost = 0;
    $team_data_bank_trans_tot = 0;
    $team_data_bank_trans_val_sent = 0;
    $team_data_bank_trans_val_received = 0;
    
    $team_coin_total_number = 0;
    $team_coin_total_value = 0;
    $team_coin_nv_ch_white = 0;
    $team_coin_nv_ch_red = 0;
    $team_coin_nv_ch_blue = 0;
    $team_coin_nv_ch_green = 0;
    $team_coin_nv_ch_black = 0;
    $team_coin_nv_std_white = 0;
    $team_coin_nv_std_red = 0;
    $team_coin_nv_std_blue = 0;
    $team_coin_nv_std_green = 0;
    $team_coin_nv_std_black = 0;
    $team_coin_yv_std_white = 0;
    $team_coin_yv_std_blue = 0;
    $team_coin_yv_std_green = 0;
    $team_coin_yv_std_red = 0;
    $team_coin_yv_std_black = 0;
    $team_coin_yv_oth_red = 0;
    $team_coin_yv_oth_green = 0;
    $team_coin_yv_oth_lightblue = 0;
    $team_coin_yv_oth_whitepurple = 0;
    $team_coin_yv_ult_red = 0;
    $team_coin_yv_ult_darkblue = 0;
    $team_coin_yv_ult_green = 0;
    $team_coin_yv_ult_lightblue = 0;
    $team_coin_yv_ult_black = 0;
    $team_coin_yv_ult_purple = 0;
    $team_coin_yv_ult_yellow = 0;
    
    $team_coin_n_v_ch_white = 0;
    $team_coin_n_v_ch_red = 0;
    $team_coin_n_v_ch_blue = 0;
    $team_coin_n_v_ch_green = 0;
    $team_coin_n_v_ch_black = 0;
    $team_coin_n_v_std_white = 0;
    $team_coin_n_v_std_red = 0;
    $team_coin_n_v_std_blue = 0;
    $team_coin_n_v_std_green = 0;
    $team_coin_n_v_std_black = 0;
    $team_coin_y_v_std_white = 0;
    $team_coin_y_v_std_blue = 0;
    $team_coin_y_v_std_green = 0;
    $team_coin_y_v_std_red = 0;
    $team_coin_y_v_std_black = 0;
    $team_coin_y_v_oth_red = 0;
    $team_coin_y_v_oth_green = 0;
    $team_coin_y_v_oth_lightblue = 0;
    $team_coin_y_v_oth_whitepurple = 0;
    $team_coin_y_v_ult_red = 0;
    $team_coin_y_v_ult_darkblue = 0;
    $team_coin_y_v_ult_green = 0;
    $team_coin_y_v_ult_lightblue = 0;
    $team_coin_y_v_ult_black = 0;
    $team_coin_y_v_ult_purple = 0;
    $team_coin_y_v_ult_yellow = 0;
    
    $sqlGetUserdataByTeam = "SELECT * FROM userdata WHERE team_id = '".$i."';";
    $teamUserdata = mysqli_query($conn, $sqlGetUserdataByTeam);
    while($userDataResult = mysqli_fetch_assoc($teamUserdata)){
	
	$mon_to_div_from_cg_divided_already += $userDataResult['mon_to_div_from_cg_divided_already'];
	$mon_to_div_from_cpt_divided_already += $userDataResult['mon_to_div_from_cpt_divided_already'];
	$qr_mon_users += $userDataResult['qr_mon_users'];
	$qr_mon_teams += $userDataResult['qr_mon_teams'];
	$qr_tot += $userDataResult['qr_tot'];
	$qr_mon_tot += $userDataResult['qr_mon_tot'];
	
	$tempActiveMember = $userDataResult['ig_numb_played_tot'] + $userDataResult['wg_numb_played_tot'];
	$findBetterA = TRUE;
	if($tempActiveMember > $memb_activ_first && $findBetterA){
	    $memb_activ_first = $tempActiveMember;
	    $res_memb_activ_first = $userDataResult['username'] ." = ".$memb_activ_first;
	    $findBetterA = FALSE;
	}else{
	    if($tempActiveMember > $memb_activ_second && $findBetterA){
		$memb_activ_second = $tempActiveMember;
		$res_memb_activ_second = $userDataResult['username'] ." = ".$memb_activ_second;
		$findBetterA = FALSE;
	    }else{
		if($tempActiveMember > $memb_activ_third && $findBetterA){
		    $memb_activ_third = $tempActiveMember;
		    $res_memb_activ_third = $userDataResult['username'] ." = ".$memb_activ_third;
		}
	    }
	}
	
	$tempProfitMember = $userDataResult['mon_wg_all_won'] + $userDataResult['mon_ig_all_won'];
	$findBetterP = TRUE;
	if($tempProfitMember > $memb_profit_first && $findBetterP){
	    $memb_profit_first = $tempProfitMember;
	    $res_memb_profit_first = $userDataResult['username'] ." = ".$memb_profit_first;
	    $findBetterP = FALSE;
	}else{
	    if($tempProfitMember > $memb_profit_second && $findBetterP){
		$memb_profit_second = $tempProfitMember;
		$res_memb_profit_second = $userDataResult['username'] ." = ".$memb_profit_second;
		$findBetterP = FALSE;
	    }else{
		if($tempProfitMember > $memb_profit_third && $findBetterP){
		    $memb_profit_third = $tempProfitMember;
		    $res_memb_profit_third = $userDataResult['username'] ." = ".$memb_profit_third;
		}
	    }
	}
	
	$team_data_weblogins		    += $userDataResult['data_weblogins'];
	$team_data_cleanpts_bal		    += $userDataResult['data_cleanpts_bal'];
	$team_data_cleanpts_earned	    += $userDataResult['data_cleanpts_earned'];
	$team_data_cleanpts_lost	    += $userDataResult['data_cleanpts_lost'];
	$team_data_bank_trans_tot	    += $userDataResult['data_bank_trans_tot'];
	$team_data_bank_trans_val_sent	    += $userDataResult['data_bank_trans_val_sent'];
	$team_data_bank_trans_val_received  += $userDataResult['data_bank_trans_val_received'];
	
	$team_coin_n_v_ch_white		+= $userDataResult['coin_n_v_ch_white'];
	$team_coin_n_v_ch_red		+= $userDataResult['coin_n_v_ch_red'];
	$team_coin_n_v_ch_blue		+= $userDataResult['coin_n_v_ch_blue'];
	$team_coin_n_v_ch_green		+= $userDataResult['coin_n_v_ch_green'];
	$team_coin_n_v_ch_black		+= $userDataResult['coin_n_v_ch_black'];
	$team_coin_n_v_std_white	+= $userDataResult['coin_n_v_std_white'];
	$team_coin_n_v_std_red		+= $userDataResult['coin_n_v_std_red'];
	$team_coin_n_v_std_blue		+= $userDataResult['coin_n_v_std_blue'];
	$team_coin_n_v_std_green	+= $userDataResult['coin_n_v_std_green'];
	$team_coin_n_v_std_black	+= $userDataResult['coin_n_v_std_black'];
	$team_coin_y_v_std_white	+= $userDataResult['coin_y_v_std_white'];
	$team_coin_y_v_std_blue		+= $userDataResult['coin_y_v_std_blue'];
	$team_coin_y_v_std_green	+= $userDataResult['coin_y_v_std_green'];
	$team_coin_y_v_std_red		+= $userDataResult['coin_y_v_std_red'];
	$team_coin_y_v_std_black	+= $userDataResult['coin_y_v_std_black'];
	$team_coin_y_v_oth_red		+= $userDataResult['coin_y_v_oth_red'];
	$team_coin_y_v_oth_green	+= $userDataResult['coin_y_v_oth_green'];
	$team_coin_y_v_oth_lightblue    += $userDataResult['coin_y_v_oth_lightblue'];
	$team_coin_y_v_oth_whitepurple  += $userDataResult['coin_y_v_oth_whitepurple'];
	$team_coin_y_v_ult_red		+= $userDataResult['coin_y_v_ult_red'];
	$team_coin_y_v_ult_darkblue	+= $userDataResult['coin_y_v_ult_darkblue'];
	$team_coin_y_v_ult_green	+= $userDataResult['coin_y_v_ult_green'];
	$team_coin_y_v_ult_lightblue    += $userDataResult['coin_y_v_ult_lightblue'];
	$team_coin_y_v_ult_black	+= $userDataResult['coin_y_v_ult_black'];
	$team_coin_y_v_ult_purple	+= $userDataResult['coin_y_v_ult_purple'];
	$team_coin_y_v_ult_yellow	+= $userDataResult['coin_y_v_ult_yellow'];
    }
    $mon_to_div_divided_tot += $mon_to_div_from_cg_divided_already + $mon_to_div_from_cpt_divided_already;
    
    // UPDATE A TEAM BY COUNTED VARIABLES FROM EACH USER WHO IS MEMBER OF THIS TEAM
    $upd = "UPDATE teamdata SET "
	    . "mon_to_div_from_cg_divided_already = '".$mon_to_div_from_cg_divided_already."', "
	    . "mon_to_div_from_cpt_divided_already = '".$mon_to_div_from_cpt_divided_already."', "
	    . "mon_to_div_divided_tot = '".$mon_to_div_divided_tot."', "
	    . "qr_tot = '".$qr_tot."', "
	    . "qr_mon_tot = '".$qr_mon_tot."', "
	    . "qr_mon_users = '".$qr_mon_users."', "
	    . "qr_mon_teams = '".$qr_mon_teams."', "
	    . "memb_activ_first = '".$res_memb_activ_first."', "
	    . "memb_activ_second = '".$res_memb_activ_second."', "
	    . "memb_activ_third = '".$res_memb_activ_third."', "
	    . "memb_profit_first = '".$res_memb_profit_first."', "
	    . "memb_profit_second = '".$res_memb_profit_second."', "
	    . "memb_profit_third = '".$res_memb_profit_third."', "
	    . "data_weblogins = '".$team_data_weblogins."', "
	    . "data_cleanpts_bal = '".$team_data_cleanpts_bal."', "
	    . "data_cleanpts_earned = '".$team_data_cleanpts_earned."', "
	    . "data_cleanpts_lost = '".$team_data_cleanpts_lost."', "
	    . "data_bank_trans_tot = '".$team_data_bank_trans_tot."', "
	    . "data_bank_trans_val_sent = '".$team_data_bank_trans_val_sent."', "
	    . "data_bank_trans_val_received = '".$team_data_bank_trans_val_received."', "
	    . "coin_nv_ch_white = '".$team_coin_n_v_ch_white."', "
	    . "coin_nv_ch_red = '".$team_coin_n_v_ch_red."', "
	    . "coin_nv_ch_blue = '".$team_coin_n_v_ch_blue."', "
	    . "coin_nv_ch_green = '".$team_coin_n_v_ch_green."', "
	    . "coin_nv_ch_black = '".$team_coin_n_v_ch_black."', "
	    . "coin_nv_std_white = '".$team_coin_n_v_std_white."', "
	    . "coin_nv_std_red = '".$team_coin_n_v_std_red."', "
	    . "coin_nv_std_blue = '".$team_coin_n_v_std_blue."', "
	    . "coin_nv_std_green = '".$team_coin_n_v_std_green."', "
	    . "coin_nv_std_black = '".$team_coin_n_v_std_black."', "
	    . "coin_yv_std_white = '".$team_coin_y_v_std_white."', "
	    . "coin_yv_std_blue = '".$team_coin_y_v_std_blue."', "
	    . "coin_yv_std_green = '".$team_coin_y_v_std_green."', "
	    . "coin_yv_std_red = '".$team_coin_y_v_std_red."', "
	    . "coin_yv_std_black = '".$team_coin_y_v_std_black."', "
	    . "coin_yv_oth_red = '".$team_coin_y_v_oth_red."', "
	    . "coin_yv_oth_green = '".$team_coin_y_v_oth_green."', "
	    . "coin_yv_oth_lightblue = '".$team_coin_y_v_oth_lightblue."', "
	    . "coin_yv_oth_whitepurple = '".$team_coin_y_v_oth_whitepurple."', "
	    . "coin_yv_ult_red = '".$team_coin_y_v_ult_red."', "
	    . "coin_yv_ult_darkblue = '".$team_coin_y_v_ult_darkblue."', "
	    . "coin_yv_ult_green = '".$team_coin_y_v_ult_green."', "
	    . "coin_yv_ult_lightblue = '".$team_coin_y_v_ult_lightblue."', "
	    . "coin_yv_ult_black = '".$team_coin_y_v_ult_black."', "
	    . "coin_yv_ult_purple = '".$team_coin_y_v_ult_purple."', "
	    . "coin_yv_ult_yellow = '".$team_coin_y_v_ult_yellow."' WHERE id='".$i."';";
    $query = mysqli_query($conn, $upd);
}