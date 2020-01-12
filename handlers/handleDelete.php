<?php
    session_start();

    require_once '../classes/Products.php';
    require_once '../classes/helpers/Image.php';

    if(!isset($_SESSION['id']))
    {
        header('location:../login.php');
        die();
    }

    $id = $_GET['id'];
    $prod = new Products();
    $product = $prod->getOne($id);
    $img = $product['img'];
    unlink('../images/'. $img);

    $result = $prod->delete($id);

    if($result == true)
    {

    }
    else
    {

    }
    header('location:../login.php');

?>