<?php

namespace App\Controllers;

class LoginController extends Controller
{
    public function login()
    {
        return $this->view('login');
    }
}
