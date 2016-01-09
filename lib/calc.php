 <?php

    /* 
     *
     * Name: evaluate
     * Author: Chris Ellerbeck
     * Date: January 9 2016
     *
     * This function converts the passed expression to an array, then iterates through the array looking for the following
     * characters: - + (
     *
     * If + or - are found it notes what the operation is, then continues looping through the array, if the next character
     * is a number it uses the previous operation on the current number and tallies up the result.
     *
     * If a ( is encountered it will seperately iterate through the bracketed section looking for a ). If this is found
     * it recursively calls itself with the equation from within the brackets, returns the result, and depending on the 
     * operator before the ( with either add or subtract the result.
     *
     * This is based off of a Hacker Rank challenge that was asked of me, one which I completely mangled. I was a little
     * disappointed in myself, so I had to try to solve it, and since Google and WolframAlpha is returning the same answer
     * as the below code, I would say it's working! Until someone does something that the function doesn't expect and it loses
     * it's mind :)
     *
     * Thanks,
     * Chris
     *
     */
 
    function evaluate( $expression ) {
        $result = $workingNum = $bracketNum = 0;
        $prevOp = "";

        $expArr = str_split( $expression );
        $result = $expArr[ 0 ];

        for( $cnt = 0; $cnt < count( $expArr ); $cnt++ ) {
            if( $expArr[ $cnt ] == "+" ) {
                $prevOp = "+";
            } elseif( $expArr[ $cnt ] == "-" ) {
                $prevOp = "-";
            } elseif( $expArr[ $cnt ] == "(" ) {

                for( $brCnt = $cnt; $brCnt < count( $expArr ); $brCnt++ ) {
                    if( $expArr[ $brCnt ] == ")" ) {
                        $inExp = "";

                        for( $inCnt = ($cnt + 1); $inCnt < $brCnt; $inCnt++ ) $inExp = $inExp . $expArr[ $inCnt ];

                        $bracketNum = evaluate( $inExp );

                        if( $prevOp == "+" ) {
                            $result = $result + $bracketNum;
                        } elseif( $prevOp == "-" ) {
                            $result = $result - $bracketNum;
                        }

                        $cnt = ($brCnt + 1);
                        break;                        
                    }
                    
                }

                if( $expArr[ $cnt ] == "+" ) {
                    $prevOp = "+";
                } elseif( $expArr[ $cnt ] == "-" ) {
                    $prevOp = "-";
                }
            } else {
                $workingNum = $expArr[ $cnt ];

                if( $prevOp == "+" ) {
                    $result = $result + $workingNum;
                } elseif( $prevOp == "-" ) {
                    $result = $result - $workingNum;
                }
            }
        }

        return( $result );
    }

?>