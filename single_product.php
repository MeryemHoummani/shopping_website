<?php
include('server/connection.php');
if(isset($_GET['product_id'])){
    $stmt=$conn->prepare("SELECT * FROM products  WHERE product_id=?");
    $product_id=$_GET['product_id'];
    $stmt->bind_param("i",$product_id);
    $stmt->execute();
    $product=$stmt->get_result();

}else{
    header('location:index.php');
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
                <li><a  href="index.php">Home</a></li>
                <li><a  class="active" href="shop.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
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
    <section id="prodetails" class="section-p1">
        <?php while($row=$product->fetch_assoc()){?>
            <div class="single-pro-image">
                    <img src="img/products/<?php echo $row['product_image1'];?>" width="100%" id="MainImg" alt="">
                    <div class="small-img-group">
                        <div class="small-img-col">
                            <img src="img/products/<?php echo $row['product_image1'];?>" width="100%" height="150px" class="small-img" alt="">
                        </div>
                        <div class="small-img-col">
                            <img src="img/products/<?php echo $row['product_image2'];?>" width="100%" height="150px" class="small-img" alt="">
                        </div>
                        <div class="small-img-col">
                            <img src="img/products/<?php echo $row['product_image3'];?>" width="100%" height="150px" class="small-img" alt="">
                        </div>
                        <div class="small-img-col">
                            <img src="img/products/<?php echo $row['product_image4'];?>" width="100%" height="150px"  class="small-img" alt="">
                        </div>
                    </div> 
            </div>

            <div class="single-pro-details">
                <h3><?php echo $row['product_name'];?></h3>
                <h4><?php echo $row['product_description'];?></h4>
                <h2>$<?php echo $row['product_price'];?></h2>
                <form method="POST" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>"/>
                <select name="product_size" id="">
                    <option>Select size </option>
                    <option>S </option>
                    <option>M </option>
                    <option>L</option>
                    <option>XL</option>
                    <option>XXL</option>
                </select>
                    <input type="hidden" name="product_image1" value="<?php echo $row['product_image1'];?>">
                    <input type="hidden" name="product_name" value="<?php echo $row['product_name'];?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['product_price'];?>">
                    <input type="hidden" name="product_description" value="<?php echo $row['product_description'];?>">
                    <input type="number" name="product_quantity" value="1">
                    <button class="normal" type="submit" name="add_to_cart">Add to cart</button>
                
                </form>
            </div>   
        </div>
        <?php }?>
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
    <script>
        var MainImg=document.getElementById("MainImg");
        var smallimg=document.getElementsByClassName("small-img");
        smallimg[0].onclick=function(){
            MainImg.src=smallimg[0].src;
        }
        smallimg[1].onclick=function(){
            MainImg.src=smallimg[1].src;
        }
        smallimg[2].onclick=function(){
            MainImg.src=smallimg[2].src;
        }
        smallimg[3].onclick=function(){
            MainImg.src=smallimg[3].src;
        }
    </script>
    


   <script src="script.js"></script> 
</body>
</html>