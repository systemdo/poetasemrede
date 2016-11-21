<?php function StairCase($n) {
    
    if($n >= 1 && $n <= 100){
        $espaco = $n;
        for($i = 1; $i <= $n ; $i++){
            //echo $espaco;
            for($y = 0 ; $y <= $espaco;  $y++){
                    echo ' &nbsp;';
                    //echo 'r';
            }
            $espaco --;  
            for($x = 1; $x <= $i ; $x ++){
                echo '#';
            } 
            echo "\n";
            echo "<br>";

        }
    }
 
}

 
