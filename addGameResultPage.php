<?php

    include '_connectDB.php';
    $sql = "SELECT id, name FROM teams;";
    
    $allQuery = mysqli_query($conn, $sql);
?>    

<form method="POST">

    <div class = "formRow" id="birthdateLikeRow">
        <label for = "addGameName">Název hry:</label>
        <input class = "txtField" 
               type="text" 
               id="addGameName"
               name="addGameName" 
               placeholder="Název hry">
    </div>

    <div class = "formRow" id="birthdateLikeRow">
        <label for = "addGameDatePlayed">Datum odehrání:</label>
        <input class = "txtField" 
               type = "date" 
               id = "addGameDatePlayed" 
               name = "addGameDatePlayed" 
               required>
    </div>
    
    <div class = "formRow" id="birthdateLikeRow">
        <label for = "addGameTimePlayed">Čas odehrání:</label>
        <input class = "txtField" 
               type = "time" 
               id = "addGameTimePlayed" 
               name = "addGameTimePlayed" 
               required>
    </div>
    
    <div class = "formRow" id="birthdateLikeRow">
        <label for = "addGamePopularity">Oblíbenost:</label>
        <input class = "txtField" 
               type = "text" 
               id = "addGamePopularity" 
               name = "addGamePopularity" 
               required>
    </div>
    
    <div class = "formRow" id="birthdateLikeRow">
        <label for = "addGamePreparation">Čas přípravy v minutách:</label>
        <input class = "txtField" 
               type = "text" 
               id = "addGamePreparation" 
               name = "addGamePreparation" 
               required>
    </div>
    
    <div class = "formRow" id="birthdateLikeRow">
        <label for = "addGameBudget">Rozpočet hry:</label>
        <input class = "txtField" 
               type = "text" 
               id = "addGameBudget" 
               name = "addGameBudget" 
               required>
    </div>
    <hr><hr>
    <br><br><br>
            



    
    <?php
    while($allResult = mysqli_fetch_assoc($allQuery)){
        
        $name = $allResult['name'];
        $id = $allResult['id'];
	
	echo'
        <div class = "formRow" id="birthdateLikeRow">
            <label>Název týmu: '.$name.'</label>
            <label for = "addGameResultTeamId'.$id.'">Skóre v %:</label>
            
            <input class = "txtField" 
                   type = "text" 
                   id = "addGameResultTeamId'.$id.'" 
                   name = "addGameResultTeamId'.$id.'" 
                   required>
        </div>
        ';
    }
    
    echo '<input class="submit" type = "submit" id = "butGameResult" name = "addGameResult" value = "Přidat výsledky" >';
    echo '</form>';

