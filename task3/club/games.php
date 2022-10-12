<?php 
session_start();

// print_r($_SESSION);die;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

   

    $_SESSION['main_member'] = [
        'name'=> $_POST['name'],
        'count_family'=> $_POST['count'],
        'subscribe_price' => 10000 + ($_POST['count'] * 2500),   

    ];

    $count_family = $_POST['count'];

}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Games</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container w-70 mt-5">
        <form method="POST" action="result.php">

            <!-- First member -->
            <?php if(isset($count_family)) : ?>
            <?php for ($i=1; $i <= $count_family ; $i++) : ?>
            <div class="form-group row">
                <label class="col-form-label text-success"><h1>Member Name:</h1></label>
                <input type="text" name='user[<?=$i?>]["name"]' class="form-control"  >
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="user[<?=$i?>]['games'][]" value="football">
                        <label class="form-check-label" for="gridCheck1">Football</label>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="user[<?=$i?>]['games'][]" value="swimming">
                        <label class="form-check-label" for="gridCheck1">Swimming</label>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="user[<?=$i?>]['games'][]" value="vollyball">
                        <label class="form-check-label" for="gridCheck1">Vollyball</label>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="user[<?=$i?>]['games'][]" value="others">
                        <label class="form-check-label" for="gridCheck1">others</label>
                    </div>
                </div>
            </div>

           <?php endfor; ?>
           <?php endif; ?>

            <div class="form-group row">
                <div class="col ">
                    <button type="submit" name="submit" class="btn btn-success">Subscribe</button>
                </div>
            </div>
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