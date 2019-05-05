<?php

include '_connectDB.php';
$photoQuery = mysqli_query($conn, "SELECT * FROM photo_forall ORDER BY id DESC;");
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
            <h1>Autor: ' . $photoUsr . '</h1>
            <h2>Komentář: '.$photoCom.'</h2>   
                
            <img 
            src="upload/public/'.$photoAdd.'" 
            alt="ID: '.$photoId.' Autor: '.$photoUsr.' Jméno souboru: '.$photoAdd.' Komentář: '.$photoCom.'" 
            title="ID: '.$photoId.' Autor: '.$photoUsr.' Jméno souboru: '.$photoAdd.' Komentář: '.$photoCom.'" 
            >
         
            <hr>
            
        </div> 
    '; 
            
}

