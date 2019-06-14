<?php

//ini_set('display_errors', 'on');

require '_connectDB.php';

$username = $_SESSION['username'];

$sql = "SELECT mon_wg_spin_bal,mon_all_bal,mon_wg_spin_won, mon_wg_spin_lost, mon_wg_spin_bet, coin_total_value, wg_numb_played_spin_tot, wg_numb_played_spin_won, wg_numb_played_spin_lost FROM userdata WHERE username = '".$username."'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$bal = $row['mon_wg_spin_bal'];
$gameTot = $row['wg_numb_played_spin_tot']+1;
$gameWon = $row['wg_numb_played_spin_won'];
$gameLost = $row['wg_numb_played_spin_lost'];

$monW = $row['mon_wg_spin_won'];
$monL = $row['mon_wg_spin_lost'];
$monB = $row['mon_wg_spin_bet'];
	
$userpoints = 0;
$userpoints += $bal;
$Err;

$accMon = 0.0;
$accMon += $row['mon_all_bal'];
$accMon -= $row['coin_total_value'];
$win;
if($accMon>0){
    if($_POST) {
	
        if(!empty($_POST['betpoints'])) {

        $numbers = array(1, 2, 3, 4);
        $inputs = array();
        $state = '';

        for ($i = 1; $i <= 3; $i++) {
            $number = array_rand($numbers, 1);
            $inputs[$i] = $number;
        }

        $result = count(array_unique($inputs));
$bet = $_POST['betpoints'];
            switch ($result) {

                case 1:
                    $state = 'MEGA JACKPOT !!!';
                    $win = $_POST['betpoints'] * 3.38;
                    $userpoints = $win + $_POST['userpoints'];
		    $monW += $win-$bet;
		    $gameWon+=1;
                break;

                case 2:
                    $state = 'Výhra';
                    $win = $_POST['betpoints'] * 1.165;
                    $userpoints = $win + $_POST['userpoints'];
		    $monW += $win-$bet;
		    $gameWon+=1;
                    break;

                case 3:
                    $state = 'Prohra';
                    $win = $_POST['betpoints'] * 15;
                    $userpoints = $_POST['userpoints'] - $win;
		    $monL += $win-$bet;
		    $gameLost +=1;
                    break;
            }
 $monB += $bet;
 $monwon = 0;
 $monlost = 0;
 if($result ==3){$win*=-1;} 
 if($win > 0){
     $monwon = $win-$bet;
 }else{
     $monlost = $win*-1-$bet;
 }
 $montransf = $win - $bet;
 $combo = '';
 $combo .= $inputs[1].$inputs[2].$inputs[3];
 $gamelog = mysqli_query($conn, "INSERT INTO game_spinner(username,result,money_bet,money_start,money_won,money_lost,money_transferred,combination)
                                                 VALUES('$username' , '$state' , '$bet' , '$accMon' , '$monwon' , '$monlost' , '$montransf' , '$combo');") or die(mysqli_error($conn));
 
 
$upd = "UPDATE userdata SET wg_numb_played_spin_tot = '".$gameTot."', wg_numb_played_spin_won ='".$gameWon."', wg_numb_played_spin_lost ='".$gameLost."', mon_wg_spin_bet ='".$monB."', mon_wg_spin_won ='".$monW."', mon_wg_spin_lost ='".$monL."'  WHERE username='".$username."';";
$query = mysqli_query($conn, $upd);

 
dbRecount();
        } else {
            $Err = 'Nejprve si musíš vsadit!';
	}
	
	}
    }else {
            $Err = 'Nelze hrát, když nemáš peníze!';
	    
    }


?>
<br>
<br>
<div class="headerSpin">
    <h1 id="result"><?php if(isset($state)){ echo $state; } ?></h1>
</div>
<div class="slot-machineSpin">
    <div class="containerSpin">
        <form method="POST">
            <input id="firstSpin" type="text" class="countSpin" name="first" value="<?php if(isset($inputs[1])) { echo $inputs[1]; } ?>" readonly>
            <input id="secondSpin" type="text" class="countSpin" name="second" value="<?php if(isset($inputs[2])) { echo $inputs[2]; } ?>" readonly>
            <input id="thirdSpin" type="text" class="countSpin" name="third" value="<?php if(isset($inputs[3])) { echo $inputs[3]; } ?>" readonly>
            <br>
            <div>
		<label>Počet her:</label>
                <input class="infoSpin" type="text" name="nG" value="<?php  echo $row['wg_numb_played_spin_tot']; ?>" readonly>
                <br>
		<label>Počet Vyhraných:</label>
                <input class="infoSpin" type="text" name="nW" value="<?php  echo $row['wg_numb_played_spin_won']; ?>" readonly>
                <br>
		<label>Počet prohraných:</label>
                <input class="infoSpin" type="text" name="nG" value="<?php  echo $row['wg_numb_played_spin_lost']; ?>" readonly>
                <br>
		<br>
		<br>
		<label>Stav účtu:</label>
                <input class="infoSpin" type="text" name="account" value="<?php  echo $accMon; ?>" readonly>
                <br>
		<label>Dosavadní bilance této hry:</label>
                <input class="infoSpin" type="text" name="userpoints" value="<?php if(isset($bal)) { echo $bal; } else { echo $userpoint; } ?>" readonly>
                <br>
                <label>Výhra z poslední hry:</label>
                <input class="infoSpin" type="text" name="winpoints" value="<?php if(isset($win) && isset($bet)) { echo $win-$bet; } else { echo '0';} ?>" readonly>
                <br>
                <label>Vsadit:</label>
		<input class="infoSpin" type="number" name="betpoints" min="3" max="15" id="betSpin" value="<?php if(isset($_POST['betpoints'])){echo $_POST['betpoints'];}else{echo "5";} ?>">
                <br>
            </div>
            <button onclick="spinnerFunction()" type="button" id="spinSpin">Roztočit</button>
            <input type="submit" value="STOP" id="stopSpin" name ="gameSpiner" disabled>
        </form>
            <h3><?php if(isset($Err)) { echo $Err; } ?> </h3>
    </div>
</div>

    <script src="js/scriptSpiner.js"></script>

