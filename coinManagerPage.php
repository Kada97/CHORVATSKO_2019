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
            <br>
            <br>
            
            <div class = "formRow" id="bankManagerRow">
                <label for="chooseUser" class="bankManagerCoinLabel">Výběr uživatele</label>
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
            <br><hr><br>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin0" class="bankManagerCoinLabel">Bankovky - HODNOTA: </label>
                <input type="number"
                       id="coin0"
                       name="coin0" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin0']) ? htmlspecialchars($_SESSION['coin0']) : '0')?>"
                       >
            </div>
            
            <br><hr><br>
            <br><hr><br>
            
            <div class = "formRow" id="bankManagerRow">
                <label for = "coin1" class="bankManagerCoinLabel">Bez hodnoty, levný, bílý (10): </label>
                <input type="number"
                       id="coin1"
                       name="coin1" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin1']) ? htmlspecialchars($_SESSION['coin1']) : '0')?>"
                       >
            </div>
            
            <div class = "formRow" id="bankManagerRow">
                <label for = "coin2" class="bankManagerCoinLabel">Bez hodnoty, levný, červený (50): </label>
                <input type="number" 
                       id="coin2"
                       name="coin2" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin2']) ? htmlspecialchars($_SESSION['coin2']) : '0')?>"
                       >
            </div>
            
            <div class = "formRow" id="bankManagerRow">
                <label for = "coin5" class="bankManagerCoinLabel">Bez hodnoty, levný, černý (100): </label>
                <input type="number" 
                       id="coin5"
                       name="coin5" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin5']) ? htmlspecialchars($_SESSION['coin5']) : '0')?>"
                       >
            </div>
            
            <div class = "formRow" id="bankManagerRow">
                <label for = "coin4" class="bankManagerCoinLabel">Bez hodnoty, levný, zelený (250): </label>
                <input type="number" 
                       id="coin4"
                       name="coin4" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin4']) ? htmlspecialchars($_SESSION['coin4']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin3" class="bankManagerCoinLabel">Bez hodnoty, levný, modrý (500): </label>
                <input type="number" 
                       id="coin3"
                       name="coin3" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin3']) ? htmlspecialchars($_SESSION['coin3']) : '0')?>"
                       >
            </div>

            <br><hr><br>
            
            <div class = "formRow" id="bankManagerRow">
                <label for = "coin6" class="bankManagerCoinLabel">Bez hodnoty, standardní, bílý (10): </label>
                <input type="number" 
                       id="coin6"
                       name="coin6" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin6']) ? htmlspecialchars($_SESSION['coin6']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin7" class="bankManagerCoinLabel">Bez hodnoty, standardní, červený (50): </label>
                <input type="number" 
                       id="coin7"
                       name="coin7" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin7']) ? htmlspecialchars($_SESSION['coin7']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin10" class="bankManagerCoinLabel">Bez hodnoty, standardní, černý (100): </label>
                <input type="number" 
                       id="coin10"
                       name="coin10" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin10']) ? htmlspecialchars($_SESSION['coin10']) : '0')?>"
                       >
            </div>
            
            <div class = "formRow" id="bankManagerRow">
                <label for = "coin9" class="bankManagerCoinLabel">Bez hodnoty, standardní, zelený (250): </label>
                <input type="number" 
                       id="coin9"
                       name="coin9" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin9']) ? htmlspecialchars($_SESSION['coin9']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin8" class="bankManagerCoinLabel">Bez hodnoty, standardní, modrý (500): </label>
                <input type="number" 
                       id="coin8"
                       name="coin8" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin8']) ? htmlspecialchars($_SESSION['coin8']) : '0')?>"
                       >
            </div>

            <br><hr><br>
            <br><hr><br>
            <br><hr><br>
            
            <div class = "formRow" id="bankManagerRow">
                <label for = "coin11" class="bankManagerCoinLabel">S hodnotou, standardní, bílý (5): </label>
                <input type="number" 
                       id="coin11"
                       name="coin11" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin11']) ? htmlspecialchars($_SESSION['coin11']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin12" class="bankManagerCoinLabel">S hodnotou, standardní, modrý (10): </label>
                <input type="number" 
                       id="coin12"
                       name="coin12" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin12']) ? htmlspecialchars($_SESSION['coin12']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin13" class="bankManagerCoinLabel">S hodnotou, standardní, zelený (25): </label>
                <input type="number" 
                       id="coin13"
                       name="coin13" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin13']) ? htmlspecialchars($_SESSION['coin13']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin14" class="bankManagerCoinLabel">S hodnotou, standardní, červený (50): </label>
                <input type="number" 
                       id="coin14"
                       name="coin14" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin14']) ? htmlspecialchars($_SESSION['coin14']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin15" class="bankManagerCoinLabel">S hodnotou, standardní, černý (100): </label>
                <input type="number" 
                       id="coin15"
                       name="coin15" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin15']) ? htmlspecialchars($_SESSION['coin15']) : '0')?>"
                       >
            </div>
            
            <br><hr><br>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin16" class="bankManagerCoinLabel">S hodnotou, ostatní, červený (5): </label>
                <input type="number" 
                       id="coin16"
                       name="coin16" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin16']) ? htmlspecialchars($_SESSION['coin16']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin17" class="bankManagerCoinLabel">S hodnotou, ostatní, zelený (25): </label>
                <input type="number" 
                       id="coin17"
                       name="coin17" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin17']) ? htmlspecialchars($_SESSION['coin17']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin18" class="bankManagerCoinLabel">S hodnotou, ostatní, světlemodrý (50): </label>
                <input type="number" 
                       id="coin18"
                       name="coin18" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin18']) ? htmlspecialchars($_SESSION['coin18']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin19" class="bankManagerCoinLabel">S hodnotou, ostatní, bílofialový (500): </label>
                <input type="number" 
                       id="coin19"
                       name="coin19" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin19']) ? htmlspecialchars($_SESSION['coin19']) : '0')?>"
                       >
            </div>
            
            <br><hr><br>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin2" class="bankManagerCoinLabel">S hodnotou, ultimate, červený (5): </label>
                <input type="number" 
                       id="coin20"
                       name="coin20" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin20']) ? htmlspecialchars($_SESSION['coin20']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin21" class="bankManagerCoinLabel">S hodnotou, ultimate, tmavěmodrý (10): </label>
                <input type="number" 
                       id="coin21"
                       name="coin21" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin21']) ? htmlspecialchars($_SESSION['coin21']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin22" class="bankManagerCoinLabel">S hodnotou, ultimate, zelený (25): </label>
                <input type="number" 
                       id="coin22"
                       name="coin22" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin22']) ? htmlspecialchars($_SESSION['coin22']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin23" class="bankManagerCoinLabel">S hodnotou, ultimate, světlemodrý (50): </label>
                <input type="number" 
                       id="coin23"
                       name="coin23" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin23']) ? htmlspecialchars($_SESSION['coin23']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin24" class="bankManagerCoinLabel">S hodnotou, ultimate, černý (100): </label>
                <input type="number" 
                       id="coin24"
                       name="coin24" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin24']) ? htmlspecialchars($_SESSION['coin24']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin25" class="bankManagerCoinLabel">S hodnotou, ultimate, fialový (500): </label>
                <input type="number" 
                       id="coin25"
                       name="coin25" 
                       class="bankManagerValueField"
                       value = "<?php echo (isset($_SESSION['coin25']) ? htmlspecialchars($_SESSION['coin25']) : '0')?>"
                       >
            </div>

            <div class = "formRow" id="bankManagerRow">
                <label for = "coin26" class="bankManagerCoinLabel">S hodnotou, ultimate, žlutý (1000): </label>
                <input type="number" 
                       id="coin26"
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
