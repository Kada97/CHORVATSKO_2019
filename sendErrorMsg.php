<?php
    include '_connectDB.php';
    $e = $_SESSION['error_msg'];
    $l = '';
    $u = isset($_SESSION['username'])? $_SESSION['username'] : 'None' ;
    
    foreach ($_POST as $key => $value){
        $l .= '['.$key.']';
        $l .= ' => ';
        $l .= $value;
        $l .= ' | ';
    }
    
    $createLog = mysqli_query($conn, "INSERT INTO errors(message,location,user)
                                      VALUES('$e' , '$l', '$u');") 
                                      or die(mysqli_error($conn));
    
    if ($createLog) {
        $e = '';
        $l = '';
        $u = '';
    }
?>
