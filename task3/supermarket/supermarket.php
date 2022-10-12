<?php 

$cities =['cairo'=>0,'giza'=>30,'alex'=>50,'other'=>100];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // $userInfo['name'] = $_POST['name'];
    $name = $_POST['name'];
    $products_number = $_POST['products_number'];
    $city = $_POST['city'];


    // print_r($_POST);die;
}else{

    $error = "please enter values";
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Supermarket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-image: url('supermarket.jpg'); background-size:110%;">

    <div class="container w-50 mt-5">
        <form method="POST" action="supermarket.php">

            <div class="form-group text-success col-sm-9">
                <h1>Supermarket</h1>
            </div>

            <div class="form-group text-success col-sm-9">
                <label>
                    <h5>Name:</h5>
                </label>
                <input class="form-control" type="text" name="name" value="<?= $_POST['name'] ?? "" ?>">
            </div>
            <div class="form-group text-success col-sm-9">

                <label>
                    <h5>Products Number:</h5>
                </label>
                <input class="form-control" type="number" name="products_number"
                    value="<?= $_POST['products_number'] ?? "" ?>">
            </div>
            <div class="form-group text-success col-sm-9">
                <label>
                    <h5>City:</h5>
                </label>
                <select class="form-select" name="city">
                    <option selected>select your city</option>
                    <?php foreach($cities AS $city=> $value): ?>
                    <option value="<?=$city ?>"><?=$city ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <button class="btn btn-outline-success text-light m-2 ml-3 " type="submit" name="submit">submit</button>
            <!-- <?php if(isset($error)): ?>
            <div class='alert alert-primary' role='alert'> <?= $error; ?> </div>
            <?php endif ;?> -->

            <?php if(isset($_POST['product'])):?>
                <?php if(!empty($_POST['product'])): ?>
                <table class="table table-striped mt-5">
                <thead>
                    <tr>   
                            <th> Product Name </th>
                            <th> Product Price </th>
                            <th> Product Quantity </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($_POST['product'] as $value): ?>
                    <tr>
                        <?php foreach($value as $valueOfProd): ?>
                            
                        <td scope="row"><?= $valueOfProd ?></td>

                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php endif; ?>
            <?php die; endif;?>   

            <?php if(! empty($_POST['products_number'])):?>

            <div class="form-group row col-sm-9">
                <table class="table table-striped mt-5">
                    <thead>
                        <tr class="bg-success">
                            <th scope="col">Product Name: </th>
                            <th scope="col">Product Price: </th>
                            <th scope="col">Product quantity: </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=1; $i <= $_POST['products_number']; $i++): ?>
                        <tr>

                            <td scope="row"> <input type="text" name='product[<?=$i?>]["name"]' class="form-control"
                                    value=""></td>
                            <td scope="row"> <input type="text" name='product[<?=$i?>]["price"]' class="form-control"
                                    value=""></td>

                            <td scope="row"> <input type="text" name='product[<?=$i?>]["quantity"]' class="form-control"
                                    value=""></td>

                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
                <button class="btn btn-outline-success text-light m-2 ml-3 " type="submit" name="submit">submit</button>
            </div>

            <?php endif;?>


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