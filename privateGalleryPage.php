<?php

include '_connectDB.php';
$sql = "SELECT * FROM photo_forusers WHERE forwho = '".$_SESSION['username']."' ORDER BY id DESC;";
$photoQuery = mysqli_query($conn, $sql);
$i = 0;

while($photoRes = mysqli_fetch_assoc($photoQuery)){
    $i++;
    $photoId	= $photoRes['id'];
    $photoAdd	= $photoRes['photo'];
    $photoUsr	= $photoRes['username'];
    $photoCom	= $photoRes['comment'];
    $photoTime	= $photoRes['creationtime'];
    $colorClass = $i%2 == 0 ? 'galeryOdd' : 'galeryEven';
    echo'
        <div class="galeryObject ' . $colorClass . '">
            <h1>Poslal uživatel: ' . $photoUsr . ' (autor)</h1>
            <h2>Komentář: '.$photoCom.'</h2>   
                
            <img 
            src="upload/private/'.$photoAdd.'" 
            alt="ID: '.$photoId.' Autor: '.$photoUsr.' Jméno souboru: '.$photoAdd.' Komentář: '.$photoCom.'" 
            title="ID: '.$photoId.' Autor: '.$photoUsr.' Jméno souboru: '.$photoAdd.' Komentář: '.$photoCom.'" 
            >
         
            <hr>
            
        </div> 
    '; 
}

