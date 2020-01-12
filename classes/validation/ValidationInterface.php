<?php

    namespace validation;

    interface ValidationInterface
    {
        public function __construct($name, $value);
        public function validate();
    }

    ?>