<?php
    echo bugger(39)."\n";
    echo bugger(999)."\n";
    echo bugger(4);
    function bugger($num){
        
        $numbers = str_split($num);
        $multiplications = array();
        $total = 0;
        if (count ($numbers) === 1)
            return $total;
        
        for ($i = 0; $i < count ($numbers); $i++){
            // total = previous total * current number
            $total = ((isset ($multiplications[$i-1]) ? $multiplications[$i-1] * $numbers[$i] : $numbers[$i]));
            $multiplications[$i] = $total;
        }
        
        // if total has more than one digit
        // call the function again and pass the $total as the argument.
        // else return the single digit
        return (count (str_split($total)) > 1) ? bugger($total) : $total;
    }
?>
