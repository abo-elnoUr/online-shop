<?php 
 session_start();

    require_once 'inc/header.php'; 
    require_once 'classes/Products.php';

    $id = $_GET['id'];
    $prod = new Products();
    $product = $prod->getOne($id);
?>



    <div class="container my-5">
    <h2 class=" text-center pt-5">product details</h2>

        <div class="row">

            <?php if($product !== null){ ?>

            <div class="col-lg-6">
                <img class="card-img-top img-fluid"  src="images/<?php echo $product['img'] ;?>">
            </div>
            <div class="col-lg-6 mt-5">
                <h4 class="card-title"><?php echo $product['name'] ;?></h4>
                <p class="card-text"><?php echo $product['desc'];?></p>
                <p class="card-text text-muted">$<?php echo $product['price'] ;?></p>
                <a href="index.php" class="btn btn-info">Back</a>
                <?php if(isset($_SESSION['id'])) { ?>
                    <a href="edit.php?id=<?php echo $product['id'] ;?>" class="btn btn-primary">Edit</a>
                    <a href="handlers/handleDelete.php?id=<?php echo $product['id'] ;?>" class="btn btn-danger">Delete</a>
                <?php } ?>    
            </div>

            <?php } 
            else { ?>
            <p class="alert alert-danger text-center w-100">no products</p>
            <?php } ?>
            

            
        </div>
    </div>

<?php include 'inc/footer.php'; ?>

    

