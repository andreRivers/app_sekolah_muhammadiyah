<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Superadmin extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('superadmin/index', $data);
    }
}
