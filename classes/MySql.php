<?php
    class MySql
    {
        private $server_name;
        private $db_username;
        private $db_password;
        private $db_name;

        protected function connect()
        {
            $this->server_name = 'localhost';
            $this->db_username = 'root';
            $this->db_password = '';
            $this->db_name = 'online_shop';

            $conn = new mysqli($this->server_name, $this->db_username, $this->db_password, $this->db_name);
            return $conn;   
        }

    }

    ?>