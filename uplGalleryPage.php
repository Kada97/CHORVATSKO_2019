<?php
    include '_connectDB.php';
?>

    <div class="allUploadedGaleryPublic">
        <h1>UPLOADOVANÉ - VEŘEJNÉ</h1>
        <?php
            $photoQuery2 = mysqli_query($conn, "SELECT * FROM photo_forall WHERE username = '".$_SESSION['username']."' ORDER BY id DESC;");
            $i = 0;
            while($photoRes = mysqli_fetch_assoc($photoQuery2)){
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
        ?>
         
    </div>

<div class="dividerUploadedGalery"></div>
    
    <div class="allUploadedGaleryPrivate">
        <h1>UPLOADOVANÉ - SOUKROMÉ</h1>
        <?php

            $sql = "SELECT * FROM photo_forusers WHERE username = '".$_SESSION['username']."' ORDER BY id DESC;";
            $photoQuery = mysqli_query($conn, $sql);

            $i = 0;
            while($photoRes = mysqli_fetch_assoc($photoQuery)){
                $i++;
                $photoId	= $photoRes['id'];
                $photoAdd	= $photoRes['photo'];
                $photoFor	= $photoRes['forwho'];
                $photoCom	= $photoRes['comment'];
                $photoTime	= $photoRes['creationtime'];
                $colorClass = $i%2 == 0 ? 'galeryOdd' : 'galeryEven';
                echo'
                    <div class="galeryObject ' . $colorClass . '">
                        <h1>Příjemce: ' . $photoFor . '</h1>
                        <h2>Komentář: '.$photoCom.'</h2>   

                        <img 
                        src="upload/private/'.$photoAdd.'" 
                        alt="ID: '.$photoId.' Jméno souboru: '.$photoAdd.' Komentář: '.$photoCom.'" 
                        title="ID: '.$photoId.' Jméno souboru: '.$photoAdd.' Komentář: '.$photoCom.'" 
                        >

                        <hr>

                    </div> 
                '; 
            }
        ?>
        
    </div>