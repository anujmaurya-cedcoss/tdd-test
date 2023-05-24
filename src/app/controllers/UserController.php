<?php

namespace MyApp\Controllers;

use MyApp\Models\Users;
use Phalcon\Mvc\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        // redirected to view
    }

    public function signupAction()
    {
        $user = new Users();
        $user->name = $_POST['name'];
        $user->mail = $_POST['mail'];
        $user->password = $_POST['password'];

        $success = $user->save();
        if ($success) {
            $this->response->redirect('/user/login');
        } else {
            echo "There was some error";
        }
    }

    public function loginAction()
    {
        // redirect to view
    }

    public function dologinAction() {
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        $user = new Users();
        $curr = $user::findFirst(['mail' => $mail, $password => $password]);
        if($curr->mail != '') {
            $this->response->redirect('/product/index');
        }
    }
}
