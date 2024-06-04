<?php

session_start();


include "config.php";



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <link rel="stylesheet" href="form.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>



<?php if(isset($_SESSION['status']) && $_SESSION['status'] === 'error') {
            $errors = $_SESSION['errors'];
        
            
        ?>
        <ul class="errors">


        <?php foreach($errors as $e) : ?>
            <?php if (is_string($e)) : ?>
                <li><?= $e ?></li>
            <?php endif; ?>
        <?php endforeach; ?>



        </ul>
        <?php  } elseif((isset($_SESSION['status']) && $_SESSION['status'] === 'success')) {
            $data = $_SESSION['data'];
        }
            
        ?>

<form action="traitementsignin.php" method="POST">
  <div class="form-group" >
    <label for="exampleInputEmail1">Email address</label>
    <input name="email_login" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="pass_login" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>



<?php

unset($_SESSION['status']);
unset($_SESSION['errors']);
unset($_SESSION['data']);

?>