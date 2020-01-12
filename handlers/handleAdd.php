<?php
 session_start();

    require_once '../classes/Products.php';
    require_once '../classes//helpers/Image.php';
    require_once '../classes/validation/Validator.php';

    use helpers\Image;
    use validation\Validator;

    if(!isset($_SESSION['id']))
    {
        header('location:../login.php');
        die();
    }

    if(isset($_POST['submit']))
    {
        //get data
        
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $img = $_FILES['img'];


        //validation

        $v = new Validator();
        $v->rules('name',$name,['requird','string','Max:100']);
        $v->rules('desc',$desc,['requird','string']);
        $v->rules('price',$price,['requird','number']);
        $v->rules('img',$img,['requird-image','image']);
        $errors = $v->errors;

    

        


        //if data is valid

        if($errors == [])
        {
            $image = new Image($img);

            //store in database
            $data = 
            [
                'name' => $name,
                'desc' => $desc,
                'price' => $price,
                'img' => $image->new_name
            ];
            $prod = new Products();
            $result = $prod->store($data);

            //if stored successfully

            if($result == true)
            {
                //upload image

                $image->upload();
                header('location:../index.php');
            }
            else
            {
                $_SESSION['errors'] = ['error storing in data base'];
                header('location:../add.php');
            }
        }
        else
        {
            $_SESSION['errors'] = $errors;
            header('location:../add.php');
        }

    }
    else
    {
        header('location:../login.php');
    }