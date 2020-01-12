<?php 
 session_start();

    require_once 'inc/header.php'; 
    require_once 'classes/Products.php';
    require_once 'classes/helpers/Str.php';

    use helpers\Str;

    $prod = new Products();
    $products = $prod->getAll();
?>



    <div class="container mt-5">
        <h2 class=" text-center pt-4">welcome to our online shop</h2>
        <div class="row ">
        <?php if($products !== []){ ?>
        <?php foreach($products as $prod) { ?>
            <div class="col-md-4 my-3">
                <div class="card">
                    <div class="m-2">
                        <img class="card-img-top img-fluid"  src="images/<?php echo $prod['img'] ;?>">
                    </div>
                    
                    <div class="card-body">

                        <h4 class="card-title"><?php echo $prod['name'] ;?></h4>
                        <p class="card-text"><?php echo Str::limit($prod['desc']);?></p>
                        <p class="card-text text-muted">$<?php echo $prod['price'] ;?></p>
                        <a href="show.php?id=<?php echo $prod['id'] ;?>" class="btn btn-info">Show</a>
                        <?php if(isset($_SESSION['id'])) { ?>
                            <a href="edit.php?id=<?php echo $prod['id'] ;?>" class="btn btn-primary">Edit</a>
                            <a href="handlers/handleDelete.php?id=<?php echo $prod['id'] ;?>" class="btn btn-danger">Delete</a>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>

            <?php } ?>
            <?php } 
            else { ?>
            <p class="alert alert-danger text-center w-100">no products</p>
            <?php } ?>
        </div>
    </div>

<?php include 'inc/footer.php'; ?>

    

