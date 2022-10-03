<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $number_1 = $_POST['number_1'];
    $number_2 = $_POST['number_2'];
    $operator = $_POST['operation'];

    if($operator == "*")
    {
        $result = $number_1 * $number_2;

    }elseif($operator == "/")
    {
        $result = $number_1 / $number_2;

    }elseif($operator == "-")
    {
        $result = $number_1 - $number_2;
    }elseif($operator == '+'){

        $result = $number_1 + $number_2;
    }else{

        $result = $number_1 % $number_2;
    }

}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Calculator</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

      <div class="container ">
        <div class="row justify-content-center m-5">
            <form method="POST" action="calc.php">
                    <h1 class="text-primary">Simple Calculator <hr></h1>
                    <br>
                    <div class="form-group">
                      <label>First Number : </label>
                      <input type="number" name="number_1" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Second Number : </label>
                      <input type="number" name="number_2" class="form-control" required>
                    </div>
                        <div class="form-group text-center">
                            <input class="btn btn-outline-dark" type="submit" name="operation" value="*">
                            <input class="btn btn-outline-dark" type="submit" name="operation" value="/">
                            <input class="btn btn-outline-dark" type="submit" name="operation" value="+">
                            <input class="btn btn-outline-dark" type="submit" name="operation" value="-">
                            <input class="btn btn-outline-dark" type="submit" name="operation" value="%">
                        </div>
                    <div class="alert alert-primary text-center mt-5">
                        <label> Result = </label>
                        <?php 
                            if($_POST)echo $result;
                        ?>
                    </div>
                   
                   
            </form>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
