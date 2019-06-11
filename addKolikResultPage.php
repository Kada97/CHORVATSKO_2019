<?php

    include '_connectDB.php';
    $sql = "SELECT id, firstname, lastname FROM users;";
    
    $allQuery = mysqli_query($conn, $sql);
?>    

    <?php
    while($allResult = mysqli_fetch_assoc($allQuery)){
        
        $name = $allResult['firstname'] . ' ' . $allResult['lastname'];
        $id = $allResult['id'];
	
	echo'
        <div class = "formRow" id="birthdateLikeRow">
            <label>Hráč: '.$name.'</label>
            
            Ukradeno:
            <input class = "txtFieldKolikPoint" 
                   type = "text" 
                   id = "addGameResultTeamId'.$id.'" 
                   name = "addKolikResultsUkradeno[]"
                   placeholder = "Ukradeno"
                   pattern= "[0-9]"
                   value=0
                   required
                   >
                   
            Uchráněno:       
            <input class = "txtFieldKolikPoint" 
                   type = "text" 
                   id = "addGameResultTeamId'.$id.'" 
                   name = "addKolikResultsUchraneno[]"
                   placeholder = "Uchráněno"
                   pattern= "[0-9]"
                   value=0
                   required
                   >
            Vlastník:       
            <input class = "txtFieldKolikPoint" 
                   type = "text" 
                   id = "addGameResultTeamId'.$id.'" 
                   name = "addKolikResultsKolikTeam[]"
                   placeholder = "Vlastník"
                   pattern= "[0-9]"
                   value=0
                   required
                   >
                   
            Trestné body:       
            <input class = "txtFieldKolikPoint" 
                   type = "text" 
                   id = "addGameResultTeamId'.$id.'" 
                   name = "addKolikResultsTresty[]"
                   placeholder = "Trestné body"
                   pattern= "[0-9]"
                   value=0
                   required
                   >
        </div>
        ';
    }
    
    echo '<input class="submit" type = "submit" id = "butKolikResult" name = "addKolikResult" value = "Přidat výsledky" >';
    echo '</form>';

