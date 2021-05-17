<?php

    echo 'Who is currently winning: '.json_encode(currentlyWinning([10, 10, 22, 30, 5, 40]))."\n";
    echo 'Who is currently winning: '.json_encode(currentlyWinning([5, 1, 2, 10]))."\n";
    echo 'Who is currently winning: '.json_encode(currentlyWinning([10, 10, 5, 5, 2, 2, 1, 3, 100, 5]));
    
    function currentlyWinning($scores)
    {
        $results = $y = $o = $yTotalScore = $oTotalScore = array();
        $index = $maxElement = 0;
        $count = 1;
        
        // split the scores into Y & O scores
        foreach ($scores as $score)
        {
            if ($count % 2)
            {
                $y[] = $score;
            }
            else
            {
                $o[] = $score;
            }
            
            $count++;
        }
        
        // get size of the array with the most elements
        $maxElement = sizeof($y);
        if (sizeof($o) > $y)
        {
            $maxElement = sizeof($o);
        }
        
        // accumulate the scores
        for ($i = 0; $i < $maxElement; $i++)
        {
            if ($i == 0)
            {
                $yTotalScore[] = $y[$i];
                $oTotalScore[] = $o[$i];
            }
            else
            {
                $yTotalScore[] = $yTotalScore[$i-1] + $y[$i];
                $oTotalScore[] = $oTotalScore[$i-1] + $o[$i];
            }
        }
        
        // winning array
        foreach ($yTotalScore as $winningScore)
        {
            if ($yTotalScore[$index] == $oTotalScore[$index])
            {
                $results[] = 'T';
            }
            elseif ($yTotalScore[$index] > $oTotalScore[$index])
            {
                $results[] = 'Y';
            }
            else
            {
                $results[] = 'O';
            }
            
            $index++;
        }
    
        return $results;
    }
?>
