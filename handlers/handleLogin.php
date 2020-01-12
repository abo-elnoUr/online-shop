<?php
 session_start();

    require_once '../classes/validation/Validator.php';
    require_once '../classes/Admin.php';

    use validation\Validator;

    if(isset($_POST['submit']))
    {
        //get data
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        


        //validation

        $v = new Validator();
        $v->rules('email',$email,['requird','email','Max:100']);
        $v->rules('password',$password,['requird','string']);
       
        $errors = $v->errors;

    

        


        //if data is valid

        if($errors == [])
        {
            $admin = new Admin();
            $result = $admin->attempt($email,sha1($password));
           
            //if stored successfully

            if($result !== null)
            {
                $_SESSION['id'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                header('location:../index.php');
            }
            else
            {
                $_SESSION['errors'] = ['your data is not correct'];
                header('location:../login.php');
            }
        }
        else
        {
            $_SESSION['errors'] = $errors;
            header('location:../login.php');
        }

    }
    else
    {
        header('location:../login.php');
    }