<?php 
    require_once 'MySql.php';

    class Products extends MySql
    {

        //get all products
        public function getAll()
        {
            $query = "SELECT * FROM Products";
            $result = $this->connect()->query($query);
            $products = [];

            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    array_push($products,$row);
                }
            }
            return $products;
        }

        // get one product
        public function getOne($id)
        {
            $query = "SELECT * FROM Products WHERE id = '$id'";
            $result = $this->connect()->query($query);
            $product = null;

            if($result->num_rows == 1)
            {
                $product = $result->fetch_assoc();
            }
            return $product;
        }

        // create new product

        public function store(array $data)
        {
            $data['name'] = mysqli_real_escape_string($this->connect(),$data['name']);
            $data['desc'] = mysqli_real_escape_string($this->connect(),$data['desc']);
            $query = "INSERT INTO Products (`name`,`desc`,price,img) VALUES ('{$data['name']}', '{$data['desc']}', '{$data['price']}', '{$data['img']}')";

            $result = $this->connect()->query($query);

            if($result == true)
            {
                return true;
            }
            else
            {
                return false;
            }

        }

        // update 

        public function update($id,array $data)
        {
            $data['name'] = mysqli_real_escape_string($this->connect(),$data['name']);
            $data['desc'] = mysqli_real_escape_string($this->connect(),$data['desc']);
            $query = "UPDATE Products SET 
            `name` = '{$data['name']}',
            `desc` = '{$data['desc']}',
            `price` = '{$data['price']}'
             WHERE id = '$id'";

                $result = $this->connect()->query($query);

                if($result == true)
                {
                    return true;
                }
                else
                {
                    return false;
                }
        }

        // delete 

        public function delete($id)
        {
            $query = "DELETE FROM Products WHERE id = '$id'";
            $result = $this->connect()->query($query);

                if($result == true)
                {
                    return true;
                }
                else
                {
                    return false;
                }
        }

    }