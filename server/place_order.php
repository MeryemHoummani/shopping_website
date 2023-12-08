<?php
session_start();
include('connection.php');
if(isset($_POST['place_order'])){
    //get user info and store it in database
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $order_cost=$_SESSION['total'];
    $order_status="on_hold";
    $user_id=$_SESSION['user_id'];
    $order_date=date('Y-m-d H:i:s');
    //store order info in database
    $stmt=$conn->prepare("INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_email,user_city,user_address,order_date)
    VALUES (?,?,?,?,?,?,?,?);");
    $stmt->bind_param('isisssss',$order_cost,$order_status,$user_id,$email,$phone,$city,$address,$order_date);
    $stmt->execute();
    //issue new order and store oorder info in database
    $order_id=$stmt->insert_id;

    //get products from cart fromcart() session
    foreach($_SESSION['cart'] as $key=>$value){
        $product=$_SESSION['cart'][$key];
        $product_id=$product['product_id'];
        $product_name=$product['product_name'];
        $product_image1=$product['product_image1'];
        $product_price=$product['product_price'];
        $product_size=$product['product_size'];
        $product_quantity=$product['product_quantity'];
        //store each single item in order_items
        $stmt1=$conn->prepare("INSERT INTO order_items(order_id,product_id,product_name,product_image1,product_price,product_size,product_quantity,user_id,order_date) 
        VALUES (?,?,?,?,?,?,?,?,?);");
        $stmt1->bind_param('iissdsiis',$order_id,$product_id,$product_name,$product_image1,$product_price,$product_size,$product_quantity,$user_id,$order_date);
        $stmt1->execute();
    }

    
    //remove everyting from cart
    unset($_SESSION['cart']);
    //inforù user whether everything is fine or there is a problem
    header('location:../payment.php?order_status="order placed successfully"');

}
?>