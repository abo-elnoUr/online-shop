<?php 
require_once 'inc/header.php';
require_once 'classes/Products.php';

session_start();

if(!isset($_SESSION['id']))
    {
        header('location:login.php');
    }


    $id = $_GET['id'];
    $prod = new Products();
    $product = $prod->getOne($id);

?>

<?php if(isset($_SESSION['errors'])) { ?>
    <div class="alert alert-danger mt-5 pt-5 text-center w-50 mx-auto">
        <?php foreach($_SESSION['errors'] as $error) { ?>
            <p><?php echo $error ; ?></p>
        <?php } ?>
    </div>
<?php } ?>
<?php unset($_SESSION['errors']); ?>

<h2 class=" text-center pt-5 mt-5">edit product</h2>

<form action="handlers/handleEdit.php?id=<?php echo $product['id'];?>" method="post">
    <div class="form-group w-50 mx-auto ">
        <div class="form-group">
            <label>name</label>
            <input type="text" class="form-control" value="<?php echo $product['name'] ;?>" name="name"  placeholder="name">
        </div>
        
        <div class="form-group">
            <label>descripton</label>
            <textarea class="form-control"  name="desc" rows="5">
                <?php echo $product['desc'] ;?>
            </textarea>
        </div>

        <div class="form-group">
            <labe>price</labe>
            <input type="number" class="form-control" value="<?php echo $product['price'] ;?>"  name="price" placeholder="price">
        </div>

        

        <div class="form-group my-5">
            <button type="submit" class="btn btn-primary" name="submit">update</button>
        </div>
  </div>
  
</form>
<?php include 'inc/footer.php'; ?>
