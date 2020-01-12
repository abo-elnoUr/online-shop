<?php 

    namespace validation;

    require_once 'ValidationInterface.php';

    class Max implements ValidationInterface
    {
        private $name;
        private $value;

        public function __construct($name, $value)
        {
            $this->name = $name;
            $this->value = $value;
            
        }

        public function validate()
        {
            if(strlen($this->value) > 100)
            {
                return "$this->name must be less than 100 characters";
            }

            return '';
        }
    }


    ?>