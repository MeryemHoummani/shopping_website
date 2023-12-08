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
                <li><a  href="index.php">Home</a></li>
                <li><a class="active" href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a></li>
                <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a>
            <i id="bar" class="fa-solid fa-bars"></i>
            
        </div>
    </section>
    <section id="product1" class="section-p1">
        <h2>Products</h2>
        
        <div class="pro-container">
            <?php include('server/get_blouses_products.php');?>
            <?php while($row= $featured_products->fetch_assoc()){ ?>
            <div class="pro">
                <img src="img/products/<?php echo $row['product_image1'];?>"  width="250px" height="250px" alt="">
                <div class="des">
                    <span><?php echo $row['product_name'];?></span>
                    <h5><?php echo $row['product_description'];?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$<?php echo $row['product_price'];?></h4>
                    <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><i class="fa-solid fa-bag-shopping cart" ></i></a>
                </div>
            </div>

            <?php } ?>
        </div>
    </section>
    
    
    <section id="newsletter" class="section-p1 section-m1">
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