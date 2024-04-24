<?php

namespace App\Controllers;

use App\Models\Collaborator;

class LoginController extends Controller
{
    public function login()
    {
        $collaboratorModel = new Collaborator();
        return $collaboratorModel->all();
        return $this->view('login', [
            'title' => 'Login Page',
            'css' => '../../public/css/login.css',
        ]);
    }
}
