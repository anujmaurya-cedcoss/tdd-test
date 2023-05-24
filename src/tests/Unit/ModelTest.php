<?php

declare(strict_types=1);

namespace Tests\Unit;

use MyApp\Models\Users;
use MyApp\Models\Products;

class ModelTest extends AbstractUnitTest
{
    public function testUsersModel()
    {
        // all the crud will be tested here

        // adding true user
        $user = new Users();
        $user->name = "Anuj";
        $user->mail = "anuj@mail.com";
        $user->password = "pass";
        $success = $user->save();

        $this->assertEquals($success, true);

        // adding false user
        $user = new Users();
        $user->name = "Anuj";
        $user->mail = "anuj@mail.com";
        $user->password = "";
        $success = $user->save();

        $this->assertEquals($success, false);

        // deleting first user
        $user = new Users();
        $curr = $user::findFirst();
        $success = $curr->delete();
        $this->assertEquals($success, true);

        $user = new Users();
        $curr = $user::findFirst(['id' => (int)26]);
        $curr->name = "anuj";
        $curr->mail = "mail@m.com";
        $curr->password = "password";
        $success = $curr->save();
        $this->assertEquals($success, true);
    }

    public function testProductsModel()
    {
        // all the crud operations will be tested here

        // adding a true product
        $product = new Products();
        $product->name = "Mobile";
        $product->price = 100;
        $product->quantity = 100;
        $product->category = "Electronics";
        $success = $product->save();

        $this->assertEquals($success, true);

        // adding a false product
        $product = new Products();
        $product->name = "";
        $product->price = 100;
        $product->quantity = 100;
        $product->category = "Electronics";
        $success = $product->save();

        $this->assertEquals($success, false);

        // delete product
        $product = new Products();
        $curr = $product::findFirst();
        $success = $curr->delete();
        $this->assertEquals($success, true);

        // update product
        $product = new Products();
        $curr = $product::findFirst(['id' => 4]);
        $product->name = "anuj";
        $product->price = 150;
        $success = $curr->save();
        $this->assertEquals($success, true);
    }
}
