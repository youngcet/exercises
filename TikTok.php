<?php
    
    echo whoWon([
              ["O", "X", "O"],
              ["X", "X", "O"],
              ["O", "X", "X"]
            ])."\n";
            
    echo whoWon([
              ["O", "O", "X"],
              ["X", "O", "X"],
              ["O", "X", "O"]
            ])."\n";
    
    echo whoWon([
              ["O", "O", "X"],
              ["X", "X", "O"],
              ["O", "X", "O"]
            ])."\n";
            
    function whoWon($arr)
    {
        $boards = $collectionOfConnectedPoints = array();
        $x = array('A', 'B', 'C');
        $y = array(1, 2, 3);
        $xPlayer = 'X';
        $oPlayer = 'O';
        $singleBoardSize = 3;
        $winner = '';
        
        $boardCount = $hasWin = 0;
        
        // Step 1: Convert the 3 input arrays into a single board (array) with keys. This way it becomes easier to visuliaze the board on a blank canvas and to get the connected points
        /*
            ["O", "X", "O"]         =       [1A],[1B],[1C]
            ["X", "X", "O"]                 [2A],[2B],[2C]
            ["O", "X", "X"]                 [3A],[3B],[3C]
        */
        foreach ($arr as $board => $values)
        {
            $boardname = $y[$boardCount];
            $count = 0;
            foreach ($values as $valuePlayed)
            {
                $boards[$boardname.$x[$count]] = $valuePlayed;
                
                $count++;
            }
            
            $boardCount++;
        }
        
        // Step 2: Using the visual illustration of the board above, we create a new array of arrays for each 3 connected points - i.e. collections of 3 searchable & connected points on the board. Each point is identifiable by the keys we created above.
        /*
            1) [1A],[1B],[1C], 2) [1A],[2A],[3A], 3) [1A], [2B], [3C], etc.
        */
        $collectionOfConnectedPoints[] = array($boards['1A'], $boards['1B'], $boards['1C']);
        $collectionOfConnectedPoints[] = array($boards['1A'], $boards['2A'], $boards['3A']);
        $collectionOfConnectedPoints[] = array($boards['1A'], $boards['2B'], $boards['3C']);
        $collectionOfConnectedPoints[] = array($boards['1C'], $boards['2C'], $boards['3C']);
        $collectionOfConnectedPoints[] = array($boards['3A'], $boards['3B'], $boards['3C']);
        $collectionOfConnectedPoints[] = array($boards['1B'], $boards['2B'], $boards['3B']);
        $collectionOfConnectedPoints[] = array($boards['2A'], $boards['2B'], $boards['2C']);
        
        // Step 3: loop through each collection of 3 connected points and check for 3 X's or O's
        foreach ($collectionOfConnectedPoints as $connectedPoints)
        {
            $xTotal = $oTotal = 0;
            
            foreach ($connectedPoints as $letterPlayed)
            {
                if ($letterPlayed == $xPlayer){
                    $xTotal++;
                }else{
                    $oTotal++;
                }
            }
            
            // check for a winner
            if ($xTotal == $singleBoardSize && $oTotal == $singleBoardSize){
                $winner = 'Tie';
                $hasWin = 1;
                break;
            }elseif ($xTotal == $singleBoardSize){
                $winner = 'X';
                $hasWin = 1;
                break;
            }elseif ($oTotal == $singleBoardSize){
                $winner = 'O';
                $hasWin = 1;
                break;
            }
        }
        
        // check if there's a winner, return Tie if no winner
        if (!$hasWin)
            $winner = 'Tie';
        
        return $winner;
    }
?>
