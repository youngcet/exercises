<?php
    
    echo commentsCorrect("//////")."\n";
    echo commentsCorrect("/**//**////**/")."\n";
    echo commentsCorrect("///*/**/")."\n";
    echo commentsCorrect("/////");
    
    function commentsCorrect($string)
    {
        $singleLineComment = '//';
        $multiLineComment = '/**/';
        
        $multiLineCommentOpening = $errors = array();
        $count = 0;
        
        // split the string into an array of elements with 2 characters length
        // and create a new array
        foreach (str_split($string, 2) as $char)
        {
            $multiLineCommentOpening[] = $char;
        }
        
        // look through the new array
        foreach ($multiLineCommentOpening as $comment)
        {
            // if current element is single line comment 
            // add true to errors
            if ($comment == $singleLineComment)
            {
                $errors[] = 'true';
            }
            // if current element is multi-line opening or closing string, (ie. /* or */)
            elseif ($comment == substr($multiLineComment, 0, 2) || $comment == substr($multiLineComment, -2))
            {
                // if current element is multi-line closing string and previous element opening string, add true (ie. /**/)
                // else if current & previous element match multi-line opening string, add false (ie. /*/*)
                if ($comment == substr($multiLineComment, -2) && isset($multiLineCommentOpening[$count-1]) && $multiLineCommentOpening[$count-1] != $singleLineComment && $multiLineCommentOpening[$count-1] == substr($multiLineComment, 0, 2))
                {
                    $errors[] = 'true';
                }
                elseif ($comment == substr($multiLineComment, 0, 2) && isset($multiLineCommentOpening[$count-1]) && $multiLineCommentOpening[$count-1] != $singleLineComment && $multiLineCommentOpening[$count-1] == substr($multiLineComment, 0, 2))
                {
                    
                    $errors[] = 'false';
                }
            }
            else
            {
                $errors[] = 'false';
            }
            
            $count++;
        }
        
        // if false exist in array return false, otherwise return true
        if (in_array('false', $errors))
        {
            return 'false';
        }
        
        return 'true';
    }
?>
