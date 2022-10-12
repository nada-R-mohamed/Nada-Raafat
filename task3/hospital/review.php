<?php 
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(!empty($_POST['number'])){
    $_SESSION['number']= $_POST['number'];
    }
    $_SESSION['quations']=[
        0=>"Are you satisfied with the level of hygiene?",
        1=>"Are you satisfied with the prices of services?",
        2=>"Are you satisfied with the nursing service?",
        3=>"Are you satisfied with the level of doctors?",
        4=>"Are you satisfied with the hospital's quiet?",
    
    ];
}




?>
<!doctype html>
<html lang="en">

<head>
    <title>hospital</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">

        <form method="POST" action="result.php">
            <?php foreach($_SESSION['quations'] as $index=> $value):?>
            <div class="row m-5"> <?= $value ?>

                <div class="col m-2">
                    <input type="radio" name="answer<?=$index?>" value="bad">Bad
                    <input type="radio" name="answer<?=$index?>" value="good">Good
                    <input type="radio" name="answer<?=$index?>" value="very-good">Very Good
                    <input type="radio" name="answer<?=$index?>" value="excellent">Excellent<br>
                </div>

            </div>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-dark mt-2">Send</button>

        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>