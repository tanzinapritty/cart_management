<?php
session_start();

if(isset($_POST['additem'])){

    add($_POST['id'],$_POST['name'],$_POST['price'],$_POST['q'],$_POST['img']);
    //echo $_POST['name'];
}
if(isset($_POST['showalldata'])){
    showallDdata();
}
if(isset($_POST['updateQuantity'])){
    $id=$_POST['id'];
    $_SESSION['cart'][$id]['quantity']=$_POST['quantity'];
    echo "done";
}if(isset($_POST['removeItem'])){
    $id=$_POST['id'];
    removeItem($id);
}


function showallDdata(){
    init();
    
    $len= count($_SESSION['cart'])-1;
    $i=0;
    echo "[";
    foreach ($_SESSION['cart'] as $key => $value) {
        echo '{
           "id":'.$key.',
           "name":"'.$value['name'].'",
           "img":"'.$value['img'].'",
           "price":'.strval((int)$value['price']).',
           "quantity":'.strval((int)$value['quantity']).'';
           if($i==$len){
               echo ' }';
            }else{
                echo '},';
           }
           $i+=1;
    }
    echo ']';

}

function init(){
    if(array_key_exists('cart',$_SESSION)){

    }else{
        $_SESSION['cart']=array();

    }

}
function add($id,$name,$price,$quantity,$img){
    init();
    $existInarray=true;
    if(array_key_exists($id,$_SESSION['cart'])){
        $existInarray=true;
        }else{
            $_SESSION['cart'][$id]=array();
            $_SESSION['cart'][$id]['name']=$name;
            $_SESSION['cart'][$id]['price']=$price;
            $_SESSION['cart'][$id]['img']=$img;
            $_SESSION['cart'][$id]['quantity']=$quantity;
        
        }
    if($existInarray){
        $_SESSION['cart'][$id]['quantity']=+$quantity;
    }

    
}
function removeItem($id){
    unset($_SESSION['cart'][$id]);
}
function totoalPrice($id){
   return $_SESSION[$id]['price']*$_SESSION[$id]['quantity'];
}
?>