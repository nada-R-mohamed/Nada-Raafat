<?php

define('MAX_MARK',500);
$persentageResult =0;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
    $physics   = $_POST['physics'];
    $chemistry = $_POST['chemistry'];
    $biology = $_POST['biology'];
    $mathematics = $_POST['mathematics'];
    $computer = $_POST['computer'];
    

    $persentageResult = ($physics + $chemistry + $biology + $mathematics + $computer) / MAX_MARK * 100;
    
  switch($persentageResult){
  case $persentageResult < 0 :
  case $persentageResult > 100 :
      $message = "<div class='alert alert-danger'>
          <h6> Invalid Grade </h6>
          </div>";
      break;
  case $persentageResult >= 90 : 
      $message = "<div class='alert alert-succes'>
      <h6> Grade A </h6>
      </div>";
      break;
  case $persentageResult >= 80 : 
      $message = "<div class='alert alert-succes'>
      <h6> Grade B </h6>
      </div>";
      break;
  case $persentageResult >= 70 : 
      $message = "<div class='alert alert-succes'>
      <h6> Grade C </h6>
      </div>";
      break;
  case $persentageResult >= 60 : 
      $message = "<div class='alert alert-succes'>
      <h6> Grade D </h6>
      </div>";
      break;
  case $persentageResult >= 60 : 
      $message = "<div class='alert alert-succes'>
      <h6> Grade E </h6>
      </div>";
      break;
  case $persentageResult >= 50 : 
      $message = "<div class='alert alert-succes'>
      <h6> Grade F </h6>
      </div>";
      break;                                        
  default:
      $message = "<div class='alert alert-danger'>
      <h6> Failed </h6>
      </div>";
}


}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Grade</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="">
    <div class="container">
      <div class="row justify-content-center">
          <form method="POST" action="grade.php" class="">

              <div class="col-12 text-center text-success mt-5">
                <h1>Calculate Your Grades<hr></h1>
              </div>
              
              <div class="form-group">
                <label class="badge badge-success">Physics : </label>
                <input type="number" name="physics" class="form-control" placeholder="Enter your grade" required>
              </div>

              <div class="form-group">
                  <label class="badge badge-success">Chemistry : </label>
                  <input type="number" name="chemistry" class="form-control" placeholder="Enter your grade" required>
              </div> 
              <div class="form-group">
                  <label class="badge badge-success">Biology : </label>
                  <input type="number" name="biology" class="form-control" placeholder="Enter your grade" required>
              </div>   
              <div class="form-group">
                  <label class="badge badge-success">Mathematics : </label>
                  <input type="number" name="mathematics" class="form-control" placeholder="Enter your grade" required>
              </div>   
              <div class="form-group">
                  <label class="badge badge-success">Computer : </label>
                  <input type="number" name="computer" class="form-control" placeholder="Enter your grade" required>
              </div>      
            <button type="submit" name="submit" class="btn btn-outline-success btn-lg"> Find Grade </button>

          </form>
            
      </div>  
      
              <div class="col-12 text-center text-success mt-5">  
                <?php  if($_POST)
                echo "<h3>".$message ."</h3>";
                ?>  
              </div>

 
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>