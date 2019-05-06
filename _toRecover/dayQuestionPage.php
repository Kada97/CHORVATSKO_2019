<?php

$countDay = numbDay();
$name = "day".$countDay;

$dirname = "src/questions/$name/";
$images = glob($dirname."*.*");

echo count($images);

for ($i = 0; $i < count($images); $i++) {
    $image = $images[$i];
    echo '<img src="'.$image.'" width="100%"><br><hr>';
}
?>