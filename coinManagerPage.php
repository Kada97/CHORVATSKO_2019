<?php
    include '_connectDB.php';
            
    $queryLog   = "SELECT id,username FROM userdata;";
    $query      = mysqli_query($conn, $queryLog);

    if(mysqli_num_rows($query) == 0){
        $_SESSION['error_msg'] = 'Nejdříve vytvoř uživatele!';
    }

    if($_SESSION['error_msg'] == ''){
        $_SESSION['availableUsernames'] = array();
        $_SESSION['availableUsers'] = array();

        while($row = mysqli_fetch_assoc($query)) {
            array_push($_SESSION['availableUsernames'],$row['username']);
            array_push($_SESSION['availableUsers'],$row['id']);
        }
    }
?>
    
<div class="formAuthorisedDiv">
    <form id="bankManagerMajorForm" method = "POST">
        <fieldset>
            <legend id="legendGeneralDescription" align="center">Bankovní manažer</legend>

            <?php
                include '_divErrorMsg.php';
            ?>
            
            <div class = "formRow" id="bankManagerRow">
                <label for="chooseUser" class="bankManagerUserLabel">Výběr uživatele</label>
                <select id = "chooseUser" 
                        name = "chooseUser"
                        class="bankManagerValueField"
                        >
                    <option value="msg" disabled <?php echo (isset($_SESSION['coinChooseUser']) ? ' ' : 'selected')?> hidden>
                        Vyber uživatele
                    </option>
                    <option value="sys">
                        NON-USER
                    </option>
                    
                    <?php
                    if(count($_SESSION['availableUsers']) != 0){
                        for ($i = 0; $i < count($_SESSION['availableUsers']); $i++) {
                            $temp = $_SESSION['availableUsers'];
                            $temp2 = $_SESSION['availableUsernames'];
                            echo '<option value = '.$temp[$i].' '.(isset($_SESSION['coinChooseUser']) && $_SESSION['coinChooseUser'] == $temp[$i] ? 'selected' : ' ').'>';
                            echo htmlspecialchars($temp2[$i]);
                            echo '</option>';
                        }
                    }else{
                        echo '<option value="msg" disabled>';
                        echo 'Je potřeba nejdříve vytvořit uživatele.';
                        echo '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId1" class="bankManagerCoinLabel">Coin 1 :</label>
                <input type="number"
                       name="coin1" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin1']) ? htmlspecialchars($_SESSION['coin1']) : '0')?>"
                       >
            </div>
            
            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId2" class="bankManagerCoinLabel">Coin 2 :</label>
                <input type="number" 
                       name="coin2" 
                       class="bankManagerValueField"
                       va1ue = "<?php echo (isset($_SESSION['coin2']) ? htmlspecialchars($_SESSION['coin2']) : '0')?>"
                       >
            </div>
            
            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId3" class="bankManagerCoinLabel">Coin 3 :</label>
                <input type="number" 
                       name="coin3" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin3']) ? htmlspecialchars($_SESSION['coin3']) : '0')?>"
                       >
            </div>
            
            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId4" class="bankManagerCoinLabel">Coin 4 :</label>
                <input type="number" 
                       name="coin4" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin4']) ? htmlspecialchars($_SESSION['coin4']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId5" class="bankManagerCoinLabel">Coin 5 :</label>
                <input type="number" 
                       name="coin5" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin5']) ? htmlspecialchars($_SESSION['coin5']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId6" class="bankManagerCoinLabel">Coin 6 :</label>
                <input type="number" 
                       name="coin6" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin6']) ? htmlspecialchars($_SESSION['coin6']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId7" class="bankManagerCoinLabel">Coin 7 :</label>
                <input type="number" 
                       name="coin7" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin7']) ? htmlspecialchars($_SESSION['coin7']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId8" class="bankManagerCoinLabel">Coin 8 :</label>
                <input type="number" 
                       name="coin8" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin8']) ? htmlspecialchars($_SESSION['coin8']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId9" class="bankManagerCoinLabel">Coin 9 :</label>
                <input type="number" 
                       name="coin9" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin9']) ? htmlspecialchars($_SESSION['coin9']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId10" class="bankManagerCoinLabel">Coin 10 :</label>
                <input type="number" 
                       name="coin10" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin10']) ? htmlspecialchars($_SESSION['coin10']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId11" class="bankManagerCoinLabel">Coin 11 :</label>
                <input type="number" 
                       name="coin11" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin11']) ? htmlspecialchars($_SESSION['coin11']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId12" class="bankManagerCoinLabel">Coin 12 :</label>
                <input type="number" 
                       name="coin12" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin12']) ? htmlspecialchars($_SESSION['coin12']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId13" class="bankManagerCoinLabel">Coin 13 :</label>
                <input type="number" 
                       name="coin13" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin13']) ? htmlspecialchars($_SESSION['coin13']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId14" class="bankManagerCoinLabel">Coin 14 :</label>
                <input type="number" 
                       name="coin14" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin14']) ? htmlspecialchars($_SESSION['coin14']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId15" class="bankManagerCoinLabel">Coin 15 :</label>
                <input type="number" 
                       name="coin15" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin15']) ? htmlspecialchars($_SESSION['coin15']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId16" class="bankManagerCoinLabel">Coin 16 :</label>
                <input type="number" 
                       name="coin16" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin16']) ? htmlspecialchars($_SESSION['coin16']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId17" class="bankManagerCoinLabel">Coin 17 :</label>
                <input type="number" 
                       name="coin17" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin17']) ? htmlspecialchars($_SESSION['coin17']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId18" class="bankManagerCoinLabel">Coin 18 :</label>
                <input type="number" 
                       name="coin18" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin18']) ? htmlspecialchars($_SESSION['coin18']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId19" class="bankManagerCoinLabel">Coin 19 :</label>
                <input type="number" 
                       name="coin19" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin19']) ? htmlspecialchars($_SESSION['coin19']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId2" class="bankManagerCoinLabel">Coin 20 :</label>
                <input type="number" 
                       name="coin20" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin20']) ? htmlspecialchars($_SESSION['coin20']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId21" class="bankManagerCoinLabel">Coin 21 :</label>
                <input type="number" 
                       name="coin21" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin21']) ? htmlspecialchars($_SESSION['coin21']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId22" class="bankManagerCoinLabel">Coin 22 :</label>
                <input type="number" 
                       name="coin22" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin22']) ? htmlspecialchars($_SESSION['coin22']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId23" class="bankManagerCoinLabel">Coin 23 :</label>
                <input type="number" 
                       name="coin23" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin23']) ? htmlspecialchars($_SESSION['coin23']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId24" class="bankManagerCoinLabel">Coin 24 :</label>
                <input type="number" 
                       name="coin24" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin24']) ? htmlspecialchars($_SESSION['coin24']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId25" class="bankManagerCoinLabel">Coin 25 :</label>
                <input type="number" 
                       name="coin25" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin25']) ? htmlspecialchars($_SESSION['coin25']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coinId26" class="bankManagerCoinLabel">Coin 26 :</label>
                <input type="number" 
                       name="coin26" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin26']) ? htmlspecialchars($_SESSION['coin26']) : '0')?>"
                       >
            </div>

            <div class = "formRow">
                <label for = "confirm" hidden>Potvrdit</label>
                <input class="submit" 
                       type = "submit" 
                       id = "confirm" 
                       name = "confirmCoins" 
                       value = "Potvrdit">
            </div>
            
            <h1>Použití:</h1>
            <ul>
                <li>Kladné hodnoty</li>
                <ul>
                    <li>Dávám z pokladnice</li>
                    <li>Využití - když rozdávám do soutěží apod.</li>
                </ul>
                <li>Záporné hodnoty</li>
                <ul>
                    <li>Získávám zpět do pokladnice</li>
                    <li>Využití - když rozměňuji či mi děti nosí zpět</li>
                </ul>
            </ul>
            <h1>Seznam coinů:</h1>
            <ul>
                <li>Coin 1</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 2</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 3</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 4</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 5</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 6</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 7</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 8</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 9</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 10</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 11</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 12</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 13</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 14</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 15</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 16</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 17</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 18</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 19</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 20</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 21</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 22</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 23</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 24</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 25</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                <li>Coin 26</li>
                <ul>
                    <li>ID: </li>
                    <li>Hodnota: </li>
                    <li>Popis: </li>
                </ul>
                
            </ul>
            
        </fieldset>
    </form>
</div>
