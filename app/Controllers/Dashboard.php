<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $userModel = new \App\Models\UsersModel();
        $userInfo = $userModel->findAll();
        $data = [
            'title' => 'Dashboard',
            'userInfo' => $userInfo
        ];
        return view('dashboard/index', $data);
    }

    function profile()
    {
        $userModel = new \App\Models\UsersModel();
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserId);
        $data = [
            'title' => 'Profile',
            'userInfo' => $userInfo
        ];
        return view('dashboard/profile', $data);
    }
}