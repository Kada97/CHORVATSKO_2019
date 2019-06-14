<?php

    include '_connectDB.php';
    
    $teamId = $_SESSION['userTeamID'];
    $sql = "SELECT code FROM data_code_kolik WHERE teamId = '$teamId'";
    $query = mysqli_query($conn, $sql);
    $codes = array();
    
    $temp = array();
    while($result = mysqli_fetch_array($query)){
        $temp[] = $result;
    }

    foreach($temp as $row) {
        $codes[] = $row[0];
    }
    
    echo '<div class="calendarDayDetail">
            <h1>
                Veškeré indície a nápovědy, které byly získány pro dešifrování písmen a slov na kolíku
            </h1>
            <div class="calendarDayDetailRow">
            <h2>';
    
    foreach($codes as $item) {
        echo $item;
        echo '<br>';
    }
    echo '</h2></div></div>';
    
    

