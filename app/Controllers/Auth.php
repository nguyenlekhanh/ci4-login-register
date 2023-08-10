<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Models\UserModel;

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

        $userModel = new \App\Models\UsermOdel();
        $query = $userModel->insert($data);

        if(!$query) {
            return redirect()->back()->with('fail', 'Saving user failed');
        } else {
            return redirect()->back()->with('success', 'Registered successfully');
        }
    }

    public function loginUser() {
        $validated = $this->validate([
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
            ]
        ]);

        if(!$validated) {
            return view('auth/login', ['validation' => $this->validator]);
        } else {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $userInfo = $userModel->where('email', $email)->first();

            $checkPassword = Hash::check($password, $userInfo['password']);

            if(!$checkPassword) {
                session()->setFlashData('fail', 'Incorrect password provided');

                return redirect()->to('auth');
            } else {
                //process user info.
                $userId = $userInfo['id'];

                session()->set('loggedInUser', $userId);
                return redirect()->to('/dashboard');
            }
        }

    }
}
