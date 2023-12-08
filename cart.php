<?php 
session_start();
if(isset($_POST['add_to_cart'])){
    //if user has already added a product to the cart
    if(isset($_SESSION['cart'])){
        $products_array_ids = array_column($_SESSION['cart'],"product_id");
        //if  product has been already added to the cart or not
        if(!in_array($_POST['product_id'],$products_array_ids)){
            $product_id=$_POST['product_id'];
            $product_array=array(
                'product_id'=>$_POST['product_id'],
                'product_price'=>$_POST['product_price'],
                'product_name'=>$_POST['product_name'],
                'product_image1'=>$_POST['product_image1'],
                'product_quantity'=>$_POST['product_quantity'],
                'product_size'=>$_POST['product_size']    
            );
            $_SESSION['cart'][$product_id]=$product_array;
        }
        
        //product has already been added
        else{
            echo '<script>alert ("Product has already been added")</script>';
            //echo '<script>window.location="index.php";</script>';
        }
        
      //if this is the first product  
    }else{
        $product_id=$_POST['product_id'];
        $product_name=$_POST['product_name'];
        $product_price=$_POST['product_price'];
        $product_image1=$_POST['product_image1'];
        $product_quantity=$_POST['product_quantity'];
        $product_size=$_POST['product_size'];
        $product_array=array(
            'product_id'=>$product_id,
            'product_name'=>$product_name,
            'product_price'=>$product_price,
            'product_image1'=>$product_image1,
            'product_quantity'=>$product_quantity,
            'product_size'=>$product_size    
        );
        $_SESSION['cart'][$product_id]=$product_array;
    }
    calculateTotalCart();
    

}    // remove a product
else if(isset($_POST['remove_product'])){
    $product_id=$_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
    calculateTotalCart();

        

}
else  if(isset($_POST['edit_product'])){
    $product_id=$_POST['product_id'];
    $product_quantity=$_POST['product_quantity'];
    $product_size=$_POST['product_size'];
    //get the product array from the session
    $product_array=$_SESSION['cart'][$product_id];
    //update product quantity
    $product_array['product_quantity']=$product_quantity;
    $_SESSION['cart'][$product_id]=$product_array;
    calculateTotalCart();
}else{
header('location:index.php');
}
function calculateTotalCart(){
    $total=0;
    foreach($_SESSION['cart'] as $key =>$value){
        $product=$_SESSION['cart'][$key];
        $price=$product['product_price'];
        $quantity=$product['product_quantity'];
        $total=$total + $price * $quantity;
    }
    $_SESSION['total']=$total;
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
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a   class="active" href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a></li>
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
    <section id="cart" class="section-p1">
       <table width="100%">
            <thead>
                <tr>
                    <td>Remove/Edit</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Size</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($_SESSION['cart'] as $key => $value){?>
                <tr>
                    <form method="POST" action="cart.php">
                    <td><i class="fa-regular fa-circle-xmark"></i><input name="remove_product" type="submit" value="Remove"><i class="fa-solid fa-pen-to-square"></i><input name="edit_product" type="submit" value="Edit"></td>
                    <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
                    <input type="number" value="<?php echo $value['product_quantity'];?>">
                    </form>
                    <td><img src="img/products/<?php echo $value['product_image1'];?>" alt=""></td>
                    <td><?php echo $value['product_name'];?></td>
                    <td>$<?php echo $value['product_price'];?></td>
                    <td><input type="text" value="<?php echo $value['product_size'];?>"></td>
                    <td><input type="number" value="<?php echo $value['product_quantity'];?>"></td>
                    <td>$<?php echo $value['product_quantity'] * $value['product_price'];?></td>
                    <?php } ?>
                </tr>


            </tbody>
       </table> 
    </section>
    <section id="cart-add" class="section-p1">
        <div id="subtotal">
            <table>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$<?php echo $_SESSION['total'];?></strong></td>
                </tr>
            </table>
            <form method="POST" action="checkout.php">
                <button class="normal" name="checkout">Proceed to checkout</button>
            </form>
            
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