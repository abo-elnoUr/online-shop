<?php session_start(); ?>
<?php require_once 'inc/header.php'; 
if(isset($_SESSION['id']))
    {
        header('location:index.php');
    }

    ?>
<?php if(isset($_SESSION['errors'])) { ?>
    <div class="alert alert-danger mt-5  text-center w-50 mx-auto">
        <?php foreach($_SESSION['errors'] as $error) { ?>
            <p class="mb-0"><?php echo $error ; ?></p>
        <?php } ?>
    </div>
<?php } ?>
<?php unset($_SESSION['errors']); ?>
<h2 class=" text-center pt-5 mt-3">login</h2>

<div class="w-50 mx-auto pt-5 ">
  <form action="handlers/handleLogin.php" method="POST">
    <div class="form-group text-left">
      <label class="">Email address</label>
      <input type="email" class="form-control" name="email" placeholder="enter your email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group text-left">
      <label class="">Password</label>
      <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group form-check text-left">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>

</div>
<?php include 'inc/footer.php'; ?>
