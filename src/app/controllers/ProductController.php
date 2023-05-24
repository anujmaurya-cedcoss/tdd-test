<?php

namespace MyApp\Controllers;

use MyApp\Models\Products;
use Phalcon\Mvc\Controller;

class ProductController extends Controller
{
    public function indexAction()
    {
        // redirected to view
    }

    public function addAction()
    {
        $product = new Products();
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->quantity = $_POST['quantity'];
        $product->category = $_POST['category'];

        $success = $product->save();

        if ($success) {
            echo "Product is added successfully";
            die;
        } else {
            echo "There was some error";
            die;
        }
    }
}
