<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('is_logged')) {
            return redirect()->to('/login');
        }

        $roleId = session()->get('role_id');

        switch ($roleId) {
            case 1:
                return redirect()->to('/superadmin');
            case 2:
                return redirect()->to('/admin');
            case 3:
                return redirect()->to('/operstor');
            case 4:
                return redirect()->to('/siswa');
            case 5:
                return redirect()->to('/orangtua');
            case 6:
                return redirect()->to('/guru');
            case 7:
                return redirect()->to('/walikelas');
            default:
                return redirect()->to('/unauthorized');
        }
    }
}
