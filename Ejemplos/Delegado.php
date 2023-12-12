<?php
    srand(time());
    $aleatorio1 = rand(1,28);
    do {
        $aleatorio2 = rand(1,28);
    } while ($aleatorio1 == $aleatorio2);   

    echo "$aleatorio1 - $aleatorio2";
    
?>