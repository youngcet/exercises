<?php
    
    echo pascalsTriangle(1)."\n";
    echo pascalsTriangle(4)."\n";
    echo pascalsTriangle(6)."\n";
    echo pascalsTriangle(8);
    function pascalsTriangle($row)
    {
        $maxRows = 29;
        /* 
        Step 1: We need 2 arrays, an outer array to hold the rows and an inner array to holds the row values, $pascals = array(array(1))           =   [rows][values]
        */
        $pascals = array(array(1));
        
        /* Step 2: To better explain the logic below I need to illustrate it (attached).
        But basically, we set the current array values by adding the values from the previous array and the sum of that = current value
        */
        for ($i = 1; $i <= $maxRows; $i++) {
            $prevRowSize = sizeof($pascals[$i-1]);
            
            for ($x = 0; $x <= $prevRowSize; $x++) {
                $previousNum = $currentNum = 0;
                
                if (isset($pascals[$i-1][$x-1])){
                    $previousNum = $pascals[$i-1][$x-1];
                }
                if (isset($pascals[$i-1][$x])){
                    $currentNum = $pascals[$i-1][$x];
                }
                
                $pascals[$i][$x] = ($previousNum + $currentNum);
            }
        }
        
        // Step 3: Convert to string with space and return it
        return implode(' ', $pascals[$row]);
    }
?>
