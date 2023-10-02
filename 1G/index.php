<?php
//Start of program
//FizzBuzz Function Creatiion

function fizzbuzz($num)
{
    if ($num % 2 == 0 && $num % 3 == 0){
        return ('Fizz Buzz');
        //Returns Fizz Buzz if value is a multiple of both 3 and 2
    }
        
    if ($num % 2 == 0){
        return ('Fizz');
        //returns fizz if the value is a multiple of 2
    }
    
        
    if ($num % 3 == 0){
        return ('Buzz');
        //returns buzz if the values a multiple of 3
    }
        
    else {
        return ($num);
        //If none  returns a blank space
    }
}





for ($num = 1; $num <= 100; $num++)
{
    $returnVal = fizzbuzz($num);
    echo $returnVal;
    echo "<br />";
    //prints out the value returned from each itteration
}

//end of program
?>