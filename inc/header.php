

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php">Online Shop</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>

            <?php if(isset($_SESSION['id'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="add.php">Add Products</a>
            </li>
            <?php } ?>

            
            
        </ul>

        <div class="navbar-nav form-inline">
                <?php if(isset($_SESSION['id'])) { ?>
                    
                    <a class="nav-link nav-item disabled" ><?php echo $_SESSION['username'] ; ?></a>
                    <a class="nav-link nav-item btn btn-danger" href="handlers/handleLogout.php" >log out</a>
                
                <?php } ?>

                <?php if(!isset($_SESSION['id'])) { ?>
                    <a class="nav-link nav-item btn btn-warning" href="login.php" >log in</a>
                <?php } ?>
        </div>
        
    </div>
</nav>









