<?php
 session_start();

    require_once '../classes/Products.php';

    require_once '../classes/validation/Validator.php';

    use validation\Validator;

    if(!isset($_SESSION['id']))
    {
        header('location:../login.php');
        die();
    }

    if(isset($_POST['submit']))
    {
        //get data
        $id = $_GET['id'];
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        // $img = $_POST['img'];

        //validation

        $v = new Validator();
        $v->rules('name',$name,['requird','string','Max:100']);
        $v->rules('desc',$desc,['requird','string']);
        $v->rules('price',$price,['requird','number']);
        $errors = $v->errors;


        //if data is valid

        if($errors == [])
        {

            //store in database
            $data = 
            [
                'name' => $name,
                'desc' => $desc,
                'price' => $price
            ];
            $prod = new Products();
            $result = $prod->update($id,$data);

            //if stored successfully

            if($result == true)
            {
                //upload image


                header('location:../show.php?id='. $id);
            }
            else
            {
                $_SESSION['errors'] = ['error updating in data base'];
                header('location:../edit.php?id=' . $id);
            }
        }
        else
        {
            $_SESSION['errors'] = $errors;
            header('location:../edit.php?id=' . $id);
        }

    }
    else
    {
        header('location:../login.php');
    }