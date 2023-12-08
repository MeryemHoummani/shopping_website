<?php
session_start();
include('server/connection.php');

if(isset($_POST['send'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    
    
    
        
            //insert into users table
            $stmt=$conn->prepare("INSERT INTO messages (name,email,subject,message) 
            VALUES (?, ?, ?,?)");
            $stmt->bind_param('ssss',$name,$email,$subject,$message);
            if($stmt->execute()){
                $_SESSION['name']=$name;
                $SESSION['email']=$email;
                $_SESSION['subject']=$subject;
                $_SESSION['message']=$message;
                header('location:contact.php?register=Your message has been sent successfully');
            }else{
                header('location:contact.php?register=Could not send this message for the moment' );
            }   
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatiible" content ="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <section id="header">
        <a href="#"><img src="img/logo.png" class="logo" alt="" height="60px" width="60px"></a>
        <div>
            <ul id="navbar">
                <li><a href="shop.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a  href="blog.php">Blog</a></li>
                <li><a  href="about.php">About</a></li>
                <li><a   class="active" href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a></li>
                <li id="lg-bag"><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i></a></li>
                <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a>
            <i id="bar" class="fa-solid fa-bars"></i>   
        </div>    
    </section>
    <section id="page-header" class="about-header">
        <h2>#Let's talk</h2>
        <p>Leave a message,we love to hear from you !</p>
    </section>
    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>Get in touch</span>
            <h2>Visit one of our locations or contact us</h2>
            <h3>Head office</h3>
            <div>
                <li>
                    <i class="fa-solid fa-map"></i>
                    <p>Centre Commercial Borj Fes
Boulevard Allal El Fassi, Fes 30050 </p>
                </li>
                <li>
                    <i class="fa-solid fa-envelope"></i>
                    <p>contact@gmail.com</p>
                </li>
                <li>
                    <i class="fa-solid fa-phone"></i>
                    <p>+212678543654 </p>
                </li>
                <li>
                    <i class="fa-regular fa-clock"></i>
                    <p>Monday to saturaday,9:00 am to 20:00 p,</p>
                </li>
            </div>
        </div>
        <div class="map"></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.9145461298076!2d-4.997280259737278!3d34.04606307327102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8b49829fbef9%3A0x1ed384adf68bbe4b!2sCentre%20Commercial%20Borj%20Fes!5e0!3m2!1sfr!2sma!4v1701091499531!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <section id="form-details">
        <form action="contact.php" method="POST">
            <span>Leave a message</span>
            <h2>We love to hear from you</h2>
            <input name="name" type="text" placeholder="Your name">
            <input name="email" type="text" placeholder="Your E-mail">
            <input name="subject" type="text" placeholder="Subject">
            <textarea name="message" id="" cols="30" rows="10" placeholder="Your message"></textarea>
            <button type="submit" name="send" class="normal">Submit</button>
        </form>
        <div class="people">
            <div>
                <img src="img/people/1.png" alt="">
                <p><span>Victor Hugo</span>Senior marketing manager<br>Phone:+216 76543287 <br>Email:VictorHugo123@gmail.com</p>
            </div>
            <div>
                <img src="img/people/2.png" alt="">
                <p><span>william Smith</span>Senior marketing manager<br>Phone:+216 09873287 <br>Email:williamSmith@gmail.com</p>
            </div>
            <div>
                <img src="img/people/3.png" alt="">
                <p><span>Ema Stone</span>Senior marketing manager<br>Phone:+216 76540987 <br>Email:EmaStone@gmail.com</p>
            </div>
        </div>
    </section>
    <section id="newsletter" class="section-p1">
        <div class="newtext">
            <h4>Sign for Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers</span></p>
        </div>    
    </section>

    <footer class="section-p1">
        <div class="col">
            <img src="img/logo.png" class="logo" width="90px" height="90px" alt="">
            <h4>Contact</h4>s
            <p><strong>Address: </strong>XXXXXXXXXXXXXXXX</p>
            <p><strong>Phone: </strong>+2126 56413751</p>
            <p><strong>Hours: </strong>8:30 - 20:30, Monday-Satuday</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery informations</a>
            <a href="#">Privacy policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact us</a>
        </div>
        <div class="col">
            <h4>My accountt</h4>
            <a href="#">SignIn</a>
            <a href="#">View cart</a>
            <a href="#">My wishlist</a>
            <a href="#">Track my order</a>
            <a href="#">Help</a>
        </div>
        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google play</p>
                <div class="row">
                    <img src="img/pay/app.jpg" alt="">
                    <img src="img/pay/play.jpg" alt="">
        
                </div>
                <p>Secured Payment Gateways</p>
                <img src="img/pay/pay.png" alt="">
        </div>
        <div class="copyright">
            <p>2023,All rights are reserved by Mery Em</p>
        </div>
        
    </footer>
    


   <script src="script.js"></script> 
</body>
</html>