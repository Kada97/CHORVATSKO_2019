<?php

    include "_connectDB.php";
            
        $queryLog   = "SELECT id,username FROM userdata;";
        $query      = mysqli_query($conn, $queryLog);


        if(mysqli_num_rows($query) == 0){
            $_SESSION['error_msg'] = "Vytvoř uživatele nejdříve!";
        }

        if($_SESSION['error_msg'] == ""){
            $_SESSION["availableUsernames"] = array();
            $_SESSION["availableUsers"] = array();

            while($row = mysqli_fetch_assoc($query)) {
                array_push($_SESSION["availableUsernames"],$row["username"]);
                array_push($_SESSION["availableUsers"],$row["id"]);
            }
        }

    echo'
        <div class="formAuthorised">
            <form method = "POST">
                <fieldset>
                    <legend>Žeton manager</legend>
                    
			<div class = "formRow">
                            <select id = "chooseUser" name = "chooseUser">
                                <option value="msg" disabled '.(isset($_SESSION['coinChooseUser']) ? " " : "selected").' hidden>
                                    Vyber uživatele
                                </option>';
                                if(count($_SESSION["availableUsers"]) != 0){
                                    for ($i = 0; $i < count($_SESSION["availableUsers"]); $i++) {
                                        $temp = $_SESSION["availableUsers"];
                                        $temp2 = $_SESSION["availableUsernames"];
                                        echo '<option value = '.$temp[$i].' '.(isset($_SESSION['coinChooseUser']) && $_SESSION['coinChooseUser'] == $temp[$i] ? "selected" : " ").'>';
                                        echo htmlspecialchars($temp2[$i]);
                                        echo '</option>';
                                    }
                                }else{
                                    echo '<option value="msg" disabled>';
                                    echo 'Potřeba nejdříve vytvořit uživatele';
                                    echo '</option>';
                                }
                                echo '</select>
				    <br>
				    <br>
				    <br>
			</div>
			<div class = "formRow">
		    <br><br>
                        <label for = "picrights">Zadavatel</label>
                    </div>
                    <div class = "formRow">
		    
                        <label for = "zadavatel" hidden>Zadavatel</label>
                            <select id = "zadavatel" name = "zadavatel" >
                                <option value="msg" disabled selected hidden>
                                    Zvol 
                                </option>
                                <option value = "dom">
                                    Dominik
                                </option>
                                <option value = "org">
                                    Organizátor
                                </option>
                                <option value = "lea">
                                    Vedoucí
                                </option>
				<option value = "sys">
                                    Systém
                                </option>
				<option value = "cpt">
                                    Kapitán týmu
                                </option>
                            </select>
		    </div>';