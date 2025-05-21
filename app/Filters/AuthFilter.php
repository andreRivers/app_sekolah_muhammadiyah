<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('is_logged')) {
            return redirect()->to('/login');
        }

        // Cek role hanya jika arguments diberikan
        if (is_array($arguments) && !empty($arguments)) {
            $role_id = session()->get('role_id');
            if (!in_array($role_id, $arguments)) {
                return redirect()->to('/unauthorized');
            }
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something after the request
    }
}
