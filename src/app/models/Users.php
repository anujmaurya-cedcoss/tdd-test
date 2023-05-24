<?php

namespace MyApp\Models;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;

class Users extends Model
{
    public $name;
    public $mail;
    public $password;
    public function validation()
    {
        $validator = new Validation();

        // Robot name must be unique
        $validator->add(
            'mail',
            new Uniqueness(
                [
                    'field'   => 'mail',
                    'message' => 'The e-mail must be unique',
                ]
            )
        );

        if ($this->name == '') {
            $this->appendMessage(
                new Message("The name can't be empty")
            );
        }
        if ($this->password == '') {
            $this->appendMessage(
                new Message("The password can't be empty")
            );
        }
        // Check if any messages have been produced
        if ($this->validationHasFailed() === true) {
            return false;
        }
    }
}
