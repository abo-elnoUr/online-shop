<?php 

    namespace validation;

    require_once 'ValidationInterface.php';

    class Str implements ValidationInterface
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
            if(!is_string($this->value))
            {
                return "$this->name must be string";
            }

            return '';
        }
    }


    ?>