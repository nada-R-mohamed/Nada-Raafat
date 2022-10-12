<?php 
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

   
    $total =0;
    foreach($_POST as $index=> $value){
        if($value == 'bad'){
            $total += 0;
        }elseif($value == 'good'){
            $total += 3;
        }elseif($value == 'very-good'){
            $total += 5;
        }else{
            $total += 10;
        }
    }
 
    foreach($_SESSION['quations'] as $index=> $value)
    {
        echo $value . "<hr>" ;
        echo $_POST["answer$index"] . "<hr>";

    }
   

    
    if($total < 25){
        echo "your review is Bad we will call you on this phone " . $_SESSION['number'] . "<br>";
    }else{
        echo " your review : <br> good thank you " ;
    }

}