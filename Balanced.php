<?php

    echo balanced('zips')."\n";
    echo balanced('brake');
    
    function balanced($str)
    {
        // get an array of alphabetic letters, flip the array in that the letters become keys, i.e, a => 0, b => 1 etc;
        // this way it will be easier to get a number representation of the letter
        $alphabet = array_flip(range('a', 'z')); 
        
        $sumOfLeftSide = $sumOfRightSide = 0;
        $side = 1; // 1 = left side | 2 = right side
        
        // for any string that is not even in length, we need to remove the middle character. 
        // charToRemove = (length / 2 + 0.5) ie. 2.5, 3.5, 4.5 etc + 0.5 = whole number and that becomes the index to remove
        $removeCharAt = (strlen($str) % 2) ? strlen($str)/2 + 0.5 : 0; 
        $str = str_split($str); // convert to string so we can remove the char at index $removeCharAt
        
        if ($removeCharAt != 0)
            unset($str[$removeCharAt+1]);
        
        $str = implode('', $str);
        // split string into 2 to create left and right side chars and add the values
        foreach (str_split($str, strlen($str)/2) as $letters)
        {
            foreach (str_split($letters) as $char)
            {
                ($side == 1) ? $sumOfLeftSide += $alphabet[$char] + 1 : $sumOfRightSide += $alphabet[$char] + 1;
            }
            
            $side++;
        }
        
        return ($sumOfLeftSide == $sumOfRightSide) ? 'true' : 'false';
    }
?>
