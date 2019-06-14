<?php

    include '_connectDB.php';
    $idTeamsToDivide = array();
    

    if ($_SESSION['admin'] == 1){

        $sql = "SELECT id FROM teams;";
        $query = mysqli_query($conn, $sql);

        $rows = array();
        while($result = mysqli_fetch_array($query)){
            $rows[] = $result;
        }

        foreach($rows as $row) {
            $idTeamsToDivide[] = $row[0];
        }

    }else{

        $idTeamsToDivide[] = $_SESSION['userTeamID'];

    }
    
    
    
    $oneTeamHead = 
            '<div class="formAuthorisedDiv">
                <form id="divideResultsMajorForm" method = "POST">
                    <fieldset>';
    $oneTeamFoot =
            '</fieldset>
                </form>
            </div>';
    
    
    for ($i = 0; $i < count($idTeamsToDivide); $i++){
        $id = $i +1;
        $idUsers = array();
        
        
        
        
        
        
        $sql = "SELECT id FROM userdata WHERE teamId = '" . $idTeamsToDivide[$i]. "';";
        $query = mysqli_query($conn, $sql);
        
        $rows = array();
        while($result = mysqli_fetch_array($query)){
            $rows[] = $result;
        }

        foreach($rows as $row) {
            $idUsers[] = $row[0];
        }
        
        $sql = "SELECT mon_to_div_from_cg_remains FROM teamdata WHERE id = '" . $idTeamsToDivide[$i]. "';";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($query);
        $countedValue = $result['mon_to_div_from_cg_remains'];
        
        
        $selectTeamSize = "SELECT numb_members FROM teams WHERE id='" . $id . "';";
        $querySelectTeamSize = mysqli_query($conn, $selectTeamSize);
        $resultSelectTeamSize = mysqli_fetch_assoc($querySelectTeamSize);

        $teamSize = $resultSelectTeamSize['numb_members'];
        $countedValue/= $teamSize;
        
        
        $teamIdHead = 
                '<div class = "formRow">
                    <label for = "team'.$id.'" hidden>team'.$id.'</label>
                    <input class = "txtField" 
                           type = "text" 
                           id = "team'.$id.'" 
                           name = "teamId"
                           value = "'.$id.'"
                           required
                           hidden
                           >
                </div>
                <div class = "formRow">
                    <label for = "budget'.$id.'" hidden>Rozpočet k rozdělení</label>
                    <input class = "txtField" 
                           type = "text" 
                           id = "budget'.$id.'" 
                           name = "budget"
                           value = "'.$result['mon_to_div_from_cg_remains'].'"
                           hidden
                           >
                </div>
                <div class = "formRow">
                    <label for = "budget'.$id.'" disabled>Rozpočet k rozdělení</label>
                    <input class = "txtField" 
                           type = "text" 
                           id = "budget'.$id.'" 
                           name = "budget"
                           value = "'.$result['mon_to_div_from_cg_remains'].'"
                           disabled
                           >
                </div>
                ';
        
        
        echo $oneTeamHead;
        include '_divErrorMsg.php';
        echo $teamIdHead;
        for ($j = 0; $j <count($idUsers); $j++) {
            
            $userId = $idUsers[$j];
            
            $sql = "SELECT firstname, lastname FROM users WHERE id = '" . $idUsers[$j]. "';";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
            $username = $result['firstname'] .' '. $result['lastname'];
            
            $oneUser = 
            '<div class = "formRow">
                            <label for = "'.$userId.'">'.$username.':</label>
                            <input class = "txtField" 
                                   type = "text" 
                                   id = "'.$userId.'" 
                                   name = "bonus[]"
                                   value = "'.$countedValue.'"
                                   required
                                   >
                        </div>
            <div class = "formRow">
                    <input class = "txtField" 
                           type = "text" 
                           name = "userId[]"
                           value = "'.$idUsers[$j].'"
                           hidden
                           >
                </div>
            ';
            
            echo $oneUser;
            
        }
        
        echo '<input class="submit" type = "submit" id = "divideResultsResult" name = "divideResults" value = "Rozdělit body" >';
        echo $oneTeamFoot;
        
        
        
    }
    
    
    
    
    
    
    
    ?>

    
        
