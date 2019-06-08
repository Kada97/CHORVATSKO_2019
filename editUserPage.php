<?php
    $_SESSION['error_msg'] = '';
    include '_connectDB.php';
    $allQuery = mysqli_query($conn, "SELECT * FROM users ORDER BY lastname;");
    $i = mysqli_num_rows($allQuery);
    
    while($allResult = mysqli_fetch_assoc($allQuery)){
        $userID = $allResult['id'];
        $help = $allResult['needhelp'];
        $lastnamePrint = $allResult['lastname'];
        echo'

        <div class="userEditDiv">
            <div class="questionHeader">
                <div class="questionHeaderRow"><label>Příjmení:</label>  '.htmlspecialchars($allResult['lastname'])   .'<br></div>
                <div class="questionHeaderRow"><label>Uživatelské jméno:</label> '.htmlspecialchars($allResult['username'])  .'<br></div>
            ';
        
            if($_SESSION['admin'] == 1){
            echo '  
                <div class="settingsHomeEditUser">
                    <form method="POST">
                        <input type="hidden" name="IDQuestion" value="'.$userID.'">
                        <label for = "butEdit'.$userID.'" hidden>Změnit</label>
                        <button id = "butEdit'.$userID.'" class="buttSettEditUser" name = "editUserPrep">'.($help!="OK" ? "!! Potřeba pomoci !!" : "Změnit").'</button>
                    </form>
                </div>
            ';}
        echo '</div></div>';
    }
?>

