<?php

session_start();


include "config.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="form.css">
    
</head>
<body>
<div class="formbold-main-wrapper">
  
  <div class="formbold-form-wrapper">


        <?php if(isset($_SESSION['status']) && $_SESSION['status'] === 'error') {
            $errors = $_SESSION['errors'];
        
            
        ?>
        <ul class="errors">
            <?php foreach($errors as $e) : ?>
                <li><?= $e ?></li>
            <?php endforeach; ?>
        </ul>
        <?php  } elseif((isset($_SESSION['status']) && $_SESSION['status'] === 'success')) {
            $data = $_SESSION['data'];
        }
            
        ?>


    <form action="traitement.php" method="POST">

        <div class="formbold-input-flex">
          <div>
              <input
              
              type="text"
              name="firstname"
              id="firstname"
              placeholder="Jane"
              class="formbold-form-input"
              />
              <label for="firstname" class="formbold-form-label"> First name </label>
          </div>
          <div>
              <input
              type="text"
              name="lastname"
              id="lastname"
              placeholder="Cooper"
              class="formbold-form-input"
              />
              <label for="lastname" class="formbold-form-label"> Last name </label>
          </div>
        </div>

        <div class="formbold-input-flex">
          <div>
              <input
              
              type="text"
              name="email"
              id="email"
              placeholder="jhon@mail.com"
              class="formbold-form-input"
              />
              <label for="email" class="formbold-form-label"> Mail </label>
          </div>
          <div>
              <input
              
              type="text"
              name="phone"
              id="phone"
              placeholder="(319) 555-0115"
              class="formbold-form-input"
              />
              <label for="phone" class="formbold-form-label"> Phone </label>
          </div>
        </div>


        <div class="formbold-input-flex">
          <div>
              <input
              
              
              type="password"
              name="password"
              id="password"
              placeholder="**********"
              class="formbold-form-input"
              />
              <label for="password" class="formbold-form-label"> Password </label>
          </div>
          <div>
              <input
              
              
              type="password"
              name="confirm_password"
              id="confirm_password"
              placeholder="**********"
              class="formbold-form-input"
              />
              <label for="confirm_password" class="formbold-form-label"> Confirm password</label>
          </div>
        </div>


        <button type="submit" class="formbold-btn">
            Send 
        </button>
    </form>
  </div>
</div>
</body>
</html>

<?php
unset($_SESSION['status']);
unset($_SESSION['errors']);
unset($_SESSION['data']);

?>