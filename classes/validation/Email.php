<?php 

    namespace validation;

    require_once 'ValidationInterface.php';

    class Email implements ValidationInterface
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
            if(strlen($this->value) > 0 && !filter_var($this->value, FILTER_VALIDATE_EMAIL))
            {
                return "$this->name not valid email";
            }

            return '';
        }
    }


    ?>