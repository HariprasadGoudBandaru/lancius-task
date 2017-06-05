<?php
function saveUser($connection,$fn,$ln,$email,$pwd){
    $query = "INSERT INTO users VALUES('','$fn','$ln','$email','$pwd')";
    if($connection->query($query) === true){
        return $connection->insert_id;
    }else{
        return 0;
    }
}

function checkUser($connection,$email,$pwd){
    $query = "SELECT id FROM users WHERE email='$email' AND password ='$pwd'";
    $result = $connection->query($query);
    if($result->num_rows > 0){ 
        $row = $result->fetch_assoc();
        return $row['id'];
    }else{
        return 0;
    }
}

function getAllProducts($connection){
    $query = "SELECT * FROM products";
    $result = $connection->query($query);
    if($result->num_rows > 0){ 
        return $result;
    }else{
        echo "Error: ".$connection->error;
    }
}

function saveProduct($connection,$user_id,$product_id){
    $query = "INSERT INTO cart VALUES('',$user_id,$product_id)";
    if($connection->query($query) === true){
        return $connection->insert_id;
    }else{
        echo "Error: ".$connection->error;
    }
}

function getCartCount($connection,$user_id){
    $query = "SELECT * from cart WHERE user_id=$user_id";
    $result = $connection->query($query); 
    return $result->num_rows;
}

function getUserCartProducts($connection,$user_id){
    //get unique products from cart
    $query = "SELECT distinct(product_id) FROM cart WHERE user_id =$user_id";
    $result = $connection->query($query);
    $product_ids = array();
    while($row = $result->fetch_assoc()) {
        $product_ids[] = $row['product_id'];
    } 
   return getProcutsByIds($connection,$product_ids);
}

function getProcutsByIds($connection,$product_ids){
    $pids = implode(',',$product_ids);
    $query = "SELECT * FROM products WHERE id IN ($pids)";
    $result = $connection->query($query);
    if($result->num_rows > 0){ 
        return $result;
    }else{
        echo "Error: ".$connection->error;
    }
}

function getCountOfSelectedProduct($connection,$user_id,$pid){
    $query = "SELECT * from cart WHERE user_id=$user_id AND product_id=$pid";
    $result = $connection->query($query); 
    return $result->num_rows;
}

?>