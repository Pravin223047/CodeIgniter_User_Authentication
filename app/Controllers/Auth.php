<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Libraries\Hash;

class Auth extends Controller
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        $data = [];
        return view('auth/login', $data);
    }

    public function login()
    {
        $validation = $this->validate([
            'name' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required',
        ]);

        if (!$validation) {
            return redirect()->to('auth')->withInput()->with('validation', $this->validator);
        } else {

            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $usersModel = new UsersModel();

            $existingEmail = $usersModel->where('email', $email)->first();

            if ($existingEmail) {
                return redirect()->to('auth')->with('invalid', 'Email already exists')->withInput();
            }

            $values = [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ];

            $query = $usersModel->insert($values);

            if (!$query) {
                return redirect()->to('auth')->withInput()->with('fail', 'Something went wrong');
            } else {
                $last_id = $usersModel->insertID();
                session()->set('loggedUser', $last_id);
                return redirect()->to('/dashboard');
            }
        }
    }

    public function check()
    {
        $validation = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required',
        ]);

        if (!$validation) {
            return redirect()->to('auth')->withInput()->with('validation', $this->validator);
        } else {

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $usersModel = new UsersModel();
            $user = $usersModel->where('email', $email)->first();

            if (!$user) {
                session()->setFlashdata('fail', 'User not found');
                return redirect()->to('auth')->withInput();
            } else if (!Hash::check($password, $user['password'])) {
                session()->setFlashdata('fail', 'Incorrect Password');
                return redirect()->to('auth')->withInput();
            } else {
                $user_id = $user['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('/dashboard')->with('success', 'Login successful');
            }
        }
    }

    public function logout()
    {
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
        }
        return redirect()->to('/auth?access=out')->with('fail', 'You are logged out!');
    }

}