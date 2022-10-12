<?php
session_start();

//

if($_SERVER['REQUEST_METHOD'] == 'POST'){



    // if( isset($_POST['games']) && is_array($_POST['games'])){
    //     foreach($_POST['games'] as $game){
    //         $_SESSION['member_1'] =[
    //             'games' => $game,
    //         ]; 
    //     }
    // }

  print_r($_POST);
    
}
