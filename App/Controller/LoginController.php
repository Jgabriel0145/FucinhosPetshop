<?php

namespace App\Controller;

use App\Model\LoginModel;

class LoginController extends Controller
{
    static public function Login()
    {
        $model = new LoginModel();

        parent::render('Login/Login', $model);
    }

    static public function Auth()
    {

    }

    static public function Logout()
    {

    }
}