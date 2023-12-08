<?php
include('connection.php');
$stmt=$conn->prepare("SELECT * FROM products  LIMIT 8 OFFSET 9");
$stmt->execute();
$featured_products=$stmt->get_result();
?>