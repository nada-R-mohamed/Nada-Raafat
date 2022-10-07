<?php
define('NUMBER_OF_MONTHS',12);

/*
showing data:
-name
-interset rate
-loan after interset
-number of years
-rate of interset per year if >=3 10% per year else 15% pear year
-the monthly installement

*/
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $name = $_POST['name'];
    $loan = $_POST['loan'];
    $number_of_years = $_POST['year'];

    // echo $name . " " . $loan ." " . $year . "<br>"; 
    if($number_of_years <= 3){
        $interset_rate = 0.10;
    }else{
        $interset_rate = 0.15;
    }
    $loan_after_interset = ($loan * $interset_rate * $number_of_years) + $loan;
    $monthly_installement = $loan_after_interset / (NUMBER_OF_MONTHS * $number_of_years);

    echo "The name is :".$name . "<br> The loan is = " . $loan ."<br> The numbers of years " . $number_of_years . "<br> The interset rate = ". $interset_rate*100 . "% <br> The loan after interset = " . $loan_after_interset ." EGP <br> The monthly interset is = " . round($monthly_installement,2) ." EGP <br>"; 

}


?>

<!doctype html>
<html lang="en">

<head>
    <title>Bank App</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container w-50 mt-5">

        <form method="POST" action="test.php">

            <div class="form-group">
                <h1 class="text-primary">Bank Application</h1>
            </div>

            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">

                <label>Loan Number:</label>
                <input class="form-control" type="number" name="loan">
            </div>
            <div class="form-group">

                <label>Number of years to pay:</label>
                <input class="form-control" type="number" name="year">

            </div>
            <button class="btn btn-outline-primary" type="submit" name="submit">submit</button>

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