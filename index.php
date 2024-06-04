<?php

session_start();

include "config.php";




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homePage</title>
    <link rel="stylesheet" href="style.css">

    
</head>
<body>
    <header>
        <!-- NavBar -->
        <nav>
            <div>
                <h1>Foodie</h1>
            </div>
           
                <div >
                    <ul class="list">
                        <a href="index.php"><li>Home</li></a>
                        <a target="_blank" href="#story"><li>About Us</li></a>
                        <a target="_blank" href="menudy.php"><li>Menu</li></a>
                        <a target="_blank" href="reserve.php"><li>Reserve</li></a>
                        <a href="#contact"><li>Contact Us</li></a>
                    </ul>
                </div>
            <div class="button-nav">
                <a class="button" href="reserve.php">Reserve</a>
                <a class="button" href="#contact">Contact</a>
                <a class="button" href="signIn.php">SignIn</a>
            </div>
        </nav>
        


       

        <div class="home">
             <!-- Title -->
             <div>
                <div class="title">
                    <img src="images/designbg-removebg-preview.png" alt="">
                </div>
                <div class="pg">
                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid eveniet <br> tempore quas, minus excepturi est voluptatem?</p> -->
                </div>
                <div class="Menu-button">
                    <a target="_blank" id="button" class="button" href="menudy.php">Menu Book</a>
                </div>
             </div>
            

            <!-- image -->
            <div class="img-nav">
                <img src="images/design-removebg-preview.png" alt="" >
    
            </div>
        </div>
        


    </header>

    <section id="story" class="story">
        <div class="story-title">
            <h1>our story</h1>
        </div>
       
        <div class="story-content">
            <img src="images/restau interieur.jpg" alt="">
            
            <div>
                <p>Foodie, a culinary gem, has been delighting palates for five years. Since our inception, we've proudly curated exceptional dining experiences, combining passion for flavors with a commitment to culinary excellence. Our journey continues as we invite you to celebrate half a decade of delightful moments, where every meal at Foodie is an expression of our dedication to the art of gastronomy. Thank you for five years of savoring, sharing, and creating lasting memories with us.</p>
                <a target="_blank" class="details" href="aboutUS.php">More Details <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                  </svg></a>
            </div>

        </div>
        
    </section>

    <section class="popular-menu">
        <h1>Most Popular <span class="popular-title">Food</span></h1>

        <div class="popular-content">


            <div class="popular-box">
                <img src="images/breakfast.jpg" alt="">
                <div class="popular-line1">
                    <h2>Breakfast </h2>
                    <a href="reserve.php">Reserve</a>
                </div>
    
                <div class="popular-line2">
                  <div>
                    <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                      </svg>
                      
                      <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                      </svg>
                      <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                      </svg>
                      <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                      </svg>
                      <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                      </svg>
                  </div>
                  <div>
                    <p>130$</p>
                  </div>
                     
                </div>
              
            </div>
    
    
            <div class="popular-box" >
                <img src="images/lunch.jpg" alt="">
                <div class="popular-line1">
                    <h2>Lunch </h2>
                    <a href="reserve.php">Reserve</a>
                </div>
    
                <div class="popular-line2">
                    <div>
                        <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                          
                          <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                          <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                          <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                          <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                    </div>

                    <div>
                        <p>130$</p>
                    </div>
                     
                </div>
              
            </div>
    
    
            <div class="popular-box">
                <img src="images/dinner.jpg" alt="">
                <div class="popular-line1">
                    <h2>Dinner </h2>
                    <a href="reserve.php">Reserve</a>
                </div>
    
                <div class="popular-line2">
                    <div>
                        <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                          
                          <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                          <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                          <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                          <svg style="color:  rgba(250, 71, 0, 0.877);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                    </div>
                   <div>
                    <p>130$</p>
                   </div>
                     
                </div>
              
            </div>
    


        </div>

    </section>

   <section class="popular_dishes">
        <h1>polpular <span class="popular-title">dishes</span></h1>
        <p>Try the delicious new dishes from our chef</p>

        <div class="dishes_boxs">

            <div class="dish_box">
                <img src="images/plats/plat1.png" alt="">
                <h3>Pasta Spaghetti</h3>
                <p>25.00$</p>
                <a href="reserve.php">Reserve</a>
            </div>

            <div class="dish_box">
                <img src="images/plats/burger_plat.png" alt="">
                <h3>Hamburger</h3>
                <p>19.00$</p>
                <a href="reserve.php">Reserve</a>
            </div>

            <div class="dish_box">
                <img src="images/plats/pizaa-removebg-preview.png" alt="">
                <h3>Pizza</h3>
                <p>21.00$</p>
                <a href="reserve.php">Reserve</a>
            </div>

        </div>

   </section>


   <section  class="book_table">
   
        <div class="book_table_content">
            
            <h1>Book a Table</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio officiis cumque assumenda perspiciatis modi architecto illo dolorem culpa, commodi quidem consectetur eos illum officia dolores alias possimus minima praesentium ad.</p>
            <a href="reserve.php">Reservation</a>
        
    </div>

   </section>

   <section class="choose">
        <h1>Why Choose Our <span class="popular-title">Food</span></h1>

        <div class="choose_content">
            <div class="choose_box">
                <img src="images/quality food.png" alt="">
                <h3>Quality Food</h3>
                <p>keep healthy food reality available , when you get hungry . you're more likely to eat</p>
            </div>

            <div class="choose_box">
                <img src="images/super taste.png" alt="">
                <h3>Super Taste</h3>
                <p>keep healthy food reality available , when you get hungry . you're more likely to eat</p>
            </div>

            <div class="choose_box">
                <img src="images/delivery food.png" alt="">
                <h3>
                Fast Delivery
                </h3>
                <p>keep healthy food reality available , when you get hungry . you're more likely to eat</p>
            </div>
        </div>
   </section>


<!--  -->

<section class="testimonials" id="testimonials">
    <div class="testimonials_title">
        <h1>TESTIMONIALS</h1>
        <p>Once you try it, you can't go back</p>
    </div>

   <div class="testimonials_content">


   <div class="testimonial">

   
    
    <div >
        <div class="testimonial_item">
            <img class="testimonial_img" src="images/customers/ben.jpg" alt="">
            <p>The AI algorithm is crazy good, it chooses the right meals for me every time. It's amazing not to worry about food anymore!
               </p>
            <h4> — Ben Hadley</h4>
        </div>
        <div  class="testimonial_item">
            <img class="testimonial_img" src="images/customers/dave.jpg" alt="">
            <p>Inexpensive, healthy and great-tasting meals, without even having to order manually! It feels truly magical.</p>
            <h4>— Dave Bryson</h4>
        </div>
    </div>

    


    <div>
        <div  class="testimonial_item">
            <img class="testimonial_img" src="images/customers/hannah.jpg" alt="">
            <p>I got Omnifood for the whole family, and it frees up so much time! Plus, everything is organic and vegan and without plastic.</p>
            <h4>— Hannah Smith</h4>
        </div>
        <div  class="testimonial_item">
            <img class="testimonial_img" src="images/customers/steve.jpg" alt="">
            <p>Omnifood is a life saver! I just started a company, so there's no time for cooking. I couldn't live without my daily meals now!</p>
            <h4>— Steve Miller</h4>
        </div>


    </div>
   </div>


   <div class="gallery">

    <div class="gallery_item">
        <img src="images/gallery/gallery-1.jpg" alt="">
        <img src="images/gallery/gallery-2.jpg" alt="">
        <img src="images/gallery/gallery-3.jpg" alt="">
    </div>

    <div class="gallery_item">
        <img src="images/gallery/gallery-4.jpg" alt="">
        <img src="images/gallery/gallery-5.jpg" alt="">
        <img src="images/gallery/gallery-6.jpg" alt="">
    </div>

    <div class="gallery_item">
        <img src="images/gallery/gallery-7.jpg" alt="">
        <img src="images/gallery/gallery-8.jpg" alt="">
        <img src="images/gallery/gallery-9.jpg" alt="">
    </div>

    <div class="gallery_item">
        <img src="images/gallery/gallery-10.jpg" alt="">
        <img src="images/gallery/gallery-11.jpg" alt="">
        <img src="images/gallery/gallery-12.jpg" alt="">
    </div>

   </div>

    
   </div>




</section>


<!--  -->



   <section class="location" id="location">
        <div class="location_content">
            <div class="location_box">
                <img class="location_del" src="images/deliveryPhoto-removebg-preview.png" alt="">
            </div>

            <div class="location_box">
                <h3>Angleterre</h3>
                <p>110 Bishopsgate 40th Floor, Heron Tower, Londres EC2N 4AY Angleterre</p>
                
                <h3>Hours of Operations</h3>
                <p>Mon-Thur 10:00AM - 9:00 PM</p>
                <p>Fri-Sun 10:00AM - 11:00PM</p>

                <p> <svg  xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                  </svg>  +216 20 640 310</p>
            </div>

            <div class="location_box">
                <img class="location_img" src="images/location.png" alt="">
            </div>
        </div>
   </section>

 

   <section id="contact" class="contact_us">
        <div class="contact_content">


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



            <h1 class="title">Contact Us</h1>
            <p class="pg">Feel free to contact us any time. We will get back to you as soon as we can!</p>
            <form action="contact.php" method="POST" >
                <div class="contact_box">
                    <div class="contant_form">
                        <label for="">Name</label><br>
                        <input name="name" type="text">
                    </div>
                    <div class="contant_form">
                        <label for="">Phone</label><br>
                        <input 
                        name="phone" 
                        type="number">
                    </div>
                    <div class="contant_form">
                        <label for="">Meessage </label><br>
                        <input 
                        name="message" 
                        type="text">
                    </div>
                    
                </div>
                <button class="contact_button">Send</button>
            </form>
        </div>

        <div id="contact_content" class="contact_content">
            <h1>Info</h1>
            <p> <svg class="icon_contact" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
              </svg>  foodie@gmail.com</p>
            <p>  <svg class="icon_contact" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
              </svg> +216 20 640 310</p>
            <p><svg class="icon_contact" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
              </svg>  110 Bishopsgate 40th Floor, Heron Tower, Londres EC2N 4AY Angleterre</p>
            <p> <svg class="icon_contact" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
              </svg> Mon-Thur 10:00AM - 9:00 PM</p>
            <p><svg class="icon_contact" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
              </svg>  Fri-Sun 10:00AM - 11:00PM</p>
        </div>

   </section>

 
   <footer>
    <div class="footer_content">
        <div>
            <h1>Foodie</h1>
            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit </p> -->
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
            <!-- <p>Reservations</p> -->
            <!-- <p>delivery</p> -->
            <!-- <p>Feddback</p> -->
            </div>
        </div>

        <div>
            
            <h3><a target="_blank" href="menu.php">Our Menu</a></h3>
            <a target="_blank" href="menu.php#breakfast_sect">Breakfast</a><br><br>
            
            <a target="_blank" href="menu.php#sandwiches_sect">Sandwiches</a><br><br>
            <a target="_blank" href="menu.php#pasta_sect">Pasta</a><br><br>
            <a target="_blank" href="menu.php#pizza_sect">Pizza</a>
            <!-- <p>Breakfast</p> -->
            <!-- <p>Sandwiches</p> -->
            <!-- <p>Pasta</p> -->
            <!-- <p>Pizza</p> -->
            
        </div>

        <div>
            <h3>Useful Links</h3>
            
            <a target="_blank" href="https://www.facebook.com/duckandwaffle">Facebook</a><br><br>
            <a target="_blank" href="https://www.instagram.com/duckandwaffle">Instagram</a><br><br>
            <a target="_blank" href="https://www.twitter.com/duckandwaffle">Twitter</a>
          
           
             <!-- <p>Facebook</p> -->
            <!-- <p>Instagram</p> -->
            <!-- <p>Twitter</p> -->
        </div>

        <!-- <div>
            <h3>Get in touch</h3>
            <p>Foodie@gmail.com</p>
            <p>+44 20 3640 7310</p>
            
        </div> -->
    </div>
</footer>





  </body>
</html>



<?php
unset($_SESSION['status']);
unset($_SESSION['errors']);
unset($_SESSION['data']);

?>