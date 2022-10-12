<?php
define('NUMBER_OF_MONTHS',12);

if($_SERVER["REQUEST_METHOD"] == 'POST'){

    if(!empty($_POST['name'] && $_POST['loan'] && $_POST['year'] ) )
    {
        
        $userInfo =[];
        $userInfo ['your name'] = $_POST['name'];
        $loan = $_POST['loan'];
        $number_of_years = $_POST['year'];
    

        if($number_of_years <= 3){
            $interset_rate = 0.10;
        }else{
            $interset_rate = 0.15;
        }
        $loan_after_interset = ($loan * $interset_rate * $number_of_years) + $loan;
        $monthly_installement = round($loan_after_interset / (NUMBER_OF_MONTHS * $number_of_years),2);
        $userInfo ['loan']= $loan ;
        $userInfo ['number of year']= $number_of_years ;
        $userInfo ['interset rate per year']= $interset_rate*100 . " %";
        $userInfo ['loan after interset']= $loan_after_interset . " EGP";
        $userInfo ['monthly installement']= round($monthly_installement,2) . " EGP"; 
    }else{
        $error = "please enter values";
    }

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

<body style="background-image: url('background.jpg'); background-size:100%;">

    <div class="container w-50 mt-5">
        <form method="POST" action="bank.php">

            <div class="form-group text-light">
                <h1>Bank Application</h1>
            </div>

            <div class="form-group text-light">
                <label>Name:</label>
                <input class="form-control" type="text" name="name" value="<?= $_POST['name'] ?? "" ?>">
            </div>
            <div class="form-group text-light">

                <label>Loan Number:</label>
                <input class="form-control" type="number" name="loan" value="<?= $_POST['loan'] ?? "" ?>">
            </div>
            <div class="form-group text-light">

                <label>Number of years to pay:</label>
                <input class="form-control" type="number" name="year" value="<?= $_POST['year'] ?? "" ?>">

            </div>
            <button class="btn btn-outline-light text-dark" type="submit" name="submit">submit</button>
            <?php if(isset($error)): ?>
            <div class='alert alert-primary' role='alert'> <?= $error; ?> </div>
            <?php endif ;?>

        </form>
    </div>

    <?php if (! empty($userInfo)) :  ?>
    <div class="container">
        <div class="row m-5 ">
            <div class="row justify-content-center">
                <div class="col align-self-center">
                    <div class="text-light">
                        <h1>Your Data:</h1>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead class="black white-text bg-light">

                    <tr>
                        <?php foreach($userInfo as $name=> $value): ?>
                        <th><?= ucfirst($name); ?></th>
                        <?php endforeach; ?>
                    </tr>

                </thead>
                <tbody>

                    <tr>
                        <?php foreach($userInfo as $index=> $value): ?>
                        <td scope="row"><b><?= $value ;?></b> </td>
                        <?php endforeach; ?>
                    </tr>

                </tbody>
            </table>
            <?php else : echo ""; ?>
            <?php endif; ?>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous">
            </script>
</body>

</html>