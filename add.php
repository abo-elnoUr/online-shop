<?php require_once 'inc/header.php'; 
session_start();

    if(!isset($_SESSION['id']))
    {
        header('location:login.php');
    }

?>
<?php if(isset($_SESSION['errors'])) { ?>
    <div class="alert alert-danger pt-5  text-center w-50 mx-auto">
        <?php foreach($_SESSION['errors'] as $error) { ?>
            <p><?php echo $error ; ?></p>
        <?php } ?>
    </div>
<?php } ?>
<?php unset($_SESSION['errors']); ?>

<div class="pt-3">
<h2 class=" text-center pt-5">add product</h2>
<form action="handlers/handleAdd.php" method="post" enctype="multipart/form-data">
    <div class="form-group w-50 mx-auto ">
        <div class="form-group">
            <label>name</label>
            <input type="text" class="form-control" name="name"  placeholder="name">
        </div>
        
        <div class="form-group">
            <label>descripton</label>
            <textarea class="form-control"  name="desc" rows="3"></textarea>
        </div>

        <div class="form-group">
            <labe>price</labe>
            <input type="number" class="form-control"  name="price" placeholder="price">
        </div>

        <div class="form-group">
        <label>select image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="img" >
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
            </div>
        </div>

        <div class="form-group my-5">
            <button type="submit" class="btn btn-primary" name="submit">store</button>
        </div>
  </div>
  
</form>
</div>
<?php include 'inc/footer.php'; ?>
