<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;

class Auth extends BaseController
{
    //Enabling features
    public function __construct() {
        helper(['url', 'form']);
    }

    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerUser()
    {
        // $validated = $this->validate([
        //     'name' => 'required',
        //     'email' => 'required|valid_email',
        //     'password' => 'required|min_length[5]|max_length[20]',
        //     'passwordConf' => 'required|min_length[5]|max_length[20]|matches[password]'
        // ]);

        $validated = $this->validate([
            'name' => [
                'label'  => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your fullname is required'
                ]
            ],
            'email' => [
                'label'  => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Your email is required',
                    'valid_email' => 'Email is already used'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules' => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'Your password is required',
                    'min_length' => 'Password must be 5 characters long',
                    'max_length' => 'Password cannot be longer than 20 characters'
                ]
            ],
            'passwordConf' =>  [
                'label'  => 'Confirm password',
                'rules' => 'required|min_length[5]|max_length[20]|matches[password]',
                'errors' => [
                    'required' => 'Your password is required',
                    'min_length' => 'Password must be 5 characters long',
                    'max_length' => 'Password cannot be longer than 20 characters',
                    'matches' => 'Confirm password must match the password'
                ]
            ]
        ]);

        if(!$validated) {
            return view('auth/register', ['validation' => $this->validator]);
        }

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $passwordConf = $this->request->getPost('passwordConf');

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => Hash::encrypt($password),
        ];
    }
}
