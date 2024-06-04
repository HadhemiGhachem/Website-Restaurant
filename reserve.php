<?php

session_start();


include "config.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve page</title>
    <link rel="stylesheet" href="reserve.css">

    
</head>
<body>
    <header>
    <nav>
            <div>
                <h1>Foodie</h1>
            </div>
           
                <div >
                    <ul class="list">
                        <a href="index.php"><li>Home</li></a>
                        <a target="_blank" href="index.php#story"><li>About Us</li></a>
                        <a target="_blank" href="menudy.php"><li>Menu</li></a>
                        <a target="_blank" href="reserve.php"><li>Reserve</li></a>
                        <a href="index.php#contact"><li>Contact Us</li></a>
                    </ul>
                </div>
            <div class="button-nav">
                <a class="button" href="reserve.php">Reserve</a>
                <a class="button" href="#contact">Contact</a>
                <a class="button" href="signIn.php">SignIn</a>
            </div>
        </nav>
        
    </header>
    

    <section class="reserve_home">
        <h1>Reservation</h1>
    </section>

    <section class="resrve_content">


      
        <h1>Online Reservation</h1>
        <p>Booking request +44 20 3640 7310 or fill out the order form</p>


        


        
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

        <form id="formreserve" action="reservetraitement.php" method="POST">
            <div class="reserve_box">
                <div class="reserve_bloc">
                    <label for="">Your Name</label><br>
                    <input 
                    type="text"
                    name="name"
                    >

                </div>
                <div class="reserve_bloc">
                    <label for="">Phone Number</label><br>
                    <input 
                    type="text"
                    name="phone"
                    >
                </div>
            </div>

           <div class="reserve_box">
           <div class="reserve_bloc">
                <label for="">Date of reservation</label><br>
                <input 
                type="datetime-local"
                name="date"
                >
            </div>
            <div class="reserve_bloc">
                <label for="">email</label> <br>
                <input name="email" type="email">

            </div>

           

            
            
           </div>
           <!-- <div class="reserve_box">
            <div class="reserve_bloc">
                <label for="">Message</label><br>
                <input name="message" type="text">
            </div> -->
<div class="reserve_box">
<div class="reserve_bloc">
                <label for="">number of person</label><br>
                
                <select name="choix" id="numbers">
                    <!-- <option value=""></option> -->
                    <option value="option1">1</option>
                    <option value="option2">2</option>
                    <option value="option3">3</option>
                    <option value="option4">4</option>
                    <option value="option5">5</option>
                    <option value="option6">6</option>
                    <option value="option7">7</option>
                    <option value="option8">8</option>
                </select>
            </div>
</div>
          
           </div>
           
            <button>Book a Table</button>
        </form>

    </section>


   
<footer>
    <div class="footer_content">
        <div>
            <h1>Foodie</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit </p>
            <div class="icons">
                <a target="_blank" href="https://www.facebook.com/duckandwaffle"> <svg class="icon" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                  </svg></a>
               <a target="_blank" href="https://www.instagram.com/duckandwaffle/"><svg class="icon" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
              </svg></a>

              <a target="_blank" href="https://www.twitter.com/duckandwaffle/"><svg class="icon" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"/>
              </svg></a>
                  
                 
                  
            </div>
        </div>

        <div>
            <div>
            <h3>Services</h3>
            <a target="_blank" href="reserve.php">Reservations</a><br><br>
            <a href="index.php#location">delivery</a><br><br>
            <a href="index.php#testimonials">Feddback</a>
           
            </div>
        </div>

        <div>
            
            <h3><a target="_blank" href="menu.php">Our Menu</a></h3>
            <a target="_blank" href="menu.php#breakfast_sect">Breakfast</a><br><br>
            
            <a target="_blank" href="menu.php#sandwiches_sect">Sandwiches</a><br><br>
            <a target="_blank" href="menu.php#pasta_sect">Pasta</a><br><br>
            <a target="_blank" href="menu.php#pizza_sect">Pizza</a>
          
            
        </div>

        <div>
            <h3>Useful Links</h3>
            
            <a target="_blank" href="https://www.facebook.com/duckandwaffle">Facebook</a><br><br>
            <a target="_blank" href="https://www.instagram.com/duckandwaffle">Instagram</a><br><br>
            <a target="_blank" href="https://www.twitter.com/duckandwaffle">Twitter</a>
          
           
           
        </div>

        <div>
            <h3>Get in touch</h3>
            <p>Foodie@gmail.com</p>
            <p>+44 20 3640 7310</p>
            
        </div>
    </div>
</footer>





</body>
</html>

<?php
unset($_SESSION['status']);
unset($_SESSION['errors']);
unset($_SESSION['data']);

?>