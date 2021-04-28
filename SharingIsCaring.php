<?php

    print_r(showTheLove([16, 10, 8]));
    
    function showTheLove($numbers)
    {
        $newNumbers = array();        
        $totalRemoved = $smallestNumberPos = 0; 
        $smallestNumber = $numbers[0]; 
        
        // we get the smallest number
        foreach ($numbers as $number)
        {
            if ($number < $smallestNumber)
            {
                $smallestNumber = $number;
            }
        }
        
        // remove 25% off except for the smallest number
        for ($i = 0; $i < count ($numbers); $i++)
        {
            // if current number == smallest number, set the position of the number
            // and add to array
            if ($numbers[$i] == $smallestNumber)
            {
                $smallestNumberPos = $i;
                $newNumbers[] = $smallestNumber;
            }
            else
            {
                $num_25Off = (25 / 100) * $numbers[$i];
                $totalRemoved = $totalRemoved + $num_25Off;
                $newNumbers[] = $numbers[$i] - $num_25Off;   
            }
        }
        
        // add the total removed to the smallest number at the position of the smallest number
        $newNumbers[$smallestNumberPos] = $newNumbers[$smallestNumberPos] + $totalRemoved;
        
        return $newNumbers;
    }
?>
