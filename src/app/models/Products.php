<?php

namespace MyApp\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Phalcon\Validation;
use Phalcon\Validation\Validator\InclusionIn;


class Products extends Model
{
    public $name;
    public $price;
    public $quantity;
    public $category;
    public function validation()
    {
        $validator = new Validation();

        // Type must be: droid, mechanical or virtual
        $validator->add(
            "category",
            new InclusionIn(
                [
                    'message' => 'Category must be "Electronics", "Jewellry"',
                    'domain' => [
                        'Electronics',
                        'Jewellery',
                    ],
                ]
            )
        );

        // Year cannot be less than zero
        if ($this->price < 0) {
            $this->appendMessage(
                new Message('The price cannot be less than zero')
            );
        }

        // Year cannot be less than zero
        if ($this->quantity < 0) {
            $this->appendMessage(
                new Message('The quantity cannot be less than zero')
            );
        }

        if ($this->name == '') {
            $this->appendMessage(
                new Message("The name can't be empty")
            );
        }


        // Check if any messages have been produced
        if ($this->validationHasFailed() === true) {
            return false;
        }
    }
}
