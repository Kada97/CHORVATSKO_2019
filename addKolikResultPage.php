<?php

    include '_connectDB.php';
    $sql = "SELECT users.id as id, users.firstname as firstname, users.lastname as lastname, userdata.username as username, userdata.teamId as teamId FROM users INNER JOIN userdata ON users.id = userdata.id ORDER BY id ASC;";
    $sql2 = "SELECT id, name FROM teams;";
    
    $allQuery = mysqli_query($conn, $sql);
    $teamsQuery = mysqli_query($conn, $sql2);
    
    
    $rows = array();
    $teamId = array();
    $teamName = array();
    while($resultTeams = mysqli_fetch_array($teamsQuery)){
        $rows[] = $resultTeams;
    }

    foreach($rows as $row) {
        $teamId[] = $row[0];
        $teamName[] = $row[1];
    }
    
    
    for ($i=0;$i<count($teamId);$i++){
        echo 'ID: ' . $teamId[$i] . ', Název: ' . $teamName[$i] . '<br>';
    }
    
    
?>    

<div class="formAuthorisedDiv">
    <form id="kolikResultsMajorForm" method = "POST">
        <fieldset>


    <?php
    while($allResult = mysqli_fetch_assoc($allQuery)){
        $name = $allResult['firstname'] . ' ' . $allResult['lastname'];
        $username = $allResult['username'];
        $userteam = $allResult['teamId'];
        $id = $allResult['id'];
	
	echo'
        <div class = "formRow" id="birthdateLikeRow">
            <label>Hráč: '.$name.'</label>
                <div class = "formRow">
                    <label for = "user'.$id.'" hidden>user'.$id.'</label>
                    <input class = "txtField" 
                           type = "text" 
                           id = "user'.$id.'" 
                           name = "userId[]"
                           value = "'.$id.'"
                           required
                           hidden
                           >
                </div>
                <div class = "formRow">
                    <label for = "username'.$id.'" hidden>username'.$id.'</label>
                    <input class = "txtField" 
                           type = "text" 
                           id = "username'.$id.'" 
                           name = "username[]"
                           value = "'.$username.'"
                           required
                           hidden
                           >
                </div>
                <div class = "formRow">
                    <label for = "userteam'.$id.'" hidden>userteam'.$id.'</label>
                    <input class = "txtField" 
                           type = "text" 
                           id = "userteam'.$id.'" 
                           name = "userteam[]"
                           value = "'.$userteam.'"
                           required
                           hidden
                           >
                </div>
            <br>
            <br>
            Ukradeno:
            <input class = "txtFieldKolikPoint" 
                   type = "text" 
                   id = "addKolikResultUkradenoUserId'.$id.'" 
                   name = "addKolikResultsUkradeno[]"
                   pattern= "[0-9]"
                   value=0
                   required
                   >
                   <br>
                   
            Ukradeno organizátorům:
            <input class = "txtFieldKolikPoint" 
                   type = "text" 
                   id = "addKolikResultUkradenoUserId'.$id.'" 
                   name = "addKolikResultsUkradenoOrg[]"
                   pattern= "[0-9]"
                   value=0
                   required
                   >
                   <br>   
                   
            Uchráněno:       
            <input class = "txtFieldKolikPoint" 
                   type = "text" 
                   id = "addKolikResultUchranenoUserId'.$id.'" 
                   name = "addKolikResultsUchraneno[]"
                   pattern= "[0-9]"
                   value=0
                   required
                   >
                   <br>
                   
            Vlastník:
            <select id = "addKolikResultVlastnikTeamId'.$id.'" name = "addKolikResultsKolikTeam[]"" >
                <option value="null" selected hidden>
                    Vyber tým, komu hráč ukradl
                </option>';
                
                for ($i = 0; $i < count($teamId); $i++) {
                    echo '<option value = "'.$teamId[$i].'">
                        #'.$teamId[$i].' '.$teamName[$i].'
                        </option>';
                }
                
            echo '</select>
                <br>
                   
            Trestné body:       
            <input class = "txtFieldKolikPoint" 
                   type = "text" 
                   id = "addGameResultTeamId'.$id.'" 
                   name = "addKolikResultsTresty[]"
                   pattern= "[0-9]"
                   value=0
                   required
                   >
        </div>
        ';
    }
    
    echo '<input class="submit" type = "submit" id = "butKolikResult" name = "addKolikResult" value = "Přidat výsledky" >';
    echo '</fieldset>
                </form>
            </div>';

