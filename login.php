<?php
session_start(); 
include('server/connection.php');
if(isset($_SESSION['logged in'])){
    header('location:account.php');
    exit;
}
if(isset($_POST['login_btn'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $stmt=$conn->prepare("SELECT user_id,user_name,user_email,user_password FROM users where user_email = ? and user_password=? LIMIT 1");
    $stmt->bind_param('ss',$email,$password);
    if($stmt->execute()){
       $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
       $stmt->store_result();
       if($stmt->num_rows()==1) {
        $stmt->fetch();
        $_SESSION['user_id']=$user_id;
        $_SESSION['user_name']=$user_name;
        $_SESSION['logged_in']=true;
        header('location:account.php?message=Logged in successully');
       
    }else{
        header('location:login.php?error=Could not verify your account');
       }

    }else{
        //error
        header('location:login?php?error=Something went wrong');
        
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
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a  href="blog.php">Blog</a></li>
                <li><a  href="about.php">About</a></li>
                <li><a  href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a></li>
                <li id="lg-bag"><a class="active" href="login.php"><i class="fa-solid fa-right-to-bracket"></i></a></li>
                
                <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a>
            <i id="bar" class="fa-solid fa-bars"></i>   
        </div>


        
    </section>
    
   
    <section id="form-details">
        <form method="POST" action="login.php">
            <p style="color:red;" ><?php if(isset($_GET['error'])) {echo $_GET['error'];}?></p>
            <p style="color:#088178;" ><?php if(isset($_GET['message'])) {echo $_GET['message'];}?></p>
            <h2>Login</h2>
            <label for="email">Email</label>
            <input type="text" name="email" required>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <button type="submit" name="login_btn" class="normal">Login</button>
            <a href="register.php" >Don't have an account? Register </a>
        </form>
        
    </section>


    <footer class="section-p1">
        <div class="col">
            <img src="img/logo.png" class="logo" width="90px" height="90px" alt="">
            <h4>Contact</h4>
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
            <a href="about.php">About us</a>
            <a href="#">Delivery informations</a>
            <a href="#">Privacy policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="contact.php">Contact us</a>
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