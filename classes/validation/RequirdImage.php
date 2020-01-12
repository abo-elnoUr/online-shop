<?php 

    namespace validation;

    require_once 'ValidationInterface.php';

    class RequirdImage implements ValidationInterface
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
            if(strlen($this->value['name']) == 0)
            {
                return "$this->name is requird";
            }

            return '';
        }
    }


    ?>