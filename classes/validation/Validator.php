<?php 
    namespace validation;

    require_once 'ValidationInterface.php';
    require_once 'Requird.php';
    require_once 'Email.php';
    require_once 'Str.php';
    require_once 'Numeric.php';
    require_once 'Max.php';
    require_once 'RequirdImage.php';
    require_once 'Image.php';

    class Validator
    {
        public $errors = [];

        private function makeValidation(ValidationInterface $v)
        {
            return $v->validate();
        }

        public function rules($name, $value, array $rules)
        {
            foreach($rules as $rule)
            {
                if ($rule == 'requird') 
                {
                    $error = $this->makeValidation(new Requird($name, $value));
                }
                elseif($rule == 'string')
                {
                    $error = $this->makeValidation(new Str($name, $value));
                }
                elseif($rule == 'Max:100')
                {
                    $error = $this->makeValidation(new Max($name, $value));
                }
                elseif($rule == 'number')
                {
                    $error = $this->makeValidation(new Numeric($name, $value));
                }
                elseif($rule == 'email')
                {
                    $error = $this->makeValidation(new Email($name, $value));
                }
                elseif($rule == 'requird-image')
                {
                    $error = $this->makeValidation(new RequirdImage($name, $value));
                }elseif($rule == 'image')
                {
                    $error = $this->makeValidation(new Image($name, $value));
                }
                else
                {
                    $error = '';
                }
                if($error !== '')
                {
                    array_push($this->errors, $error);
                }
            }
        }

    }