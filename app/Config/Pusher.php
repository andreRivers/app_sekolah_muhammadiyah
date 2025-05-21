<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pusher extends BaseConfig
{
    public $app_id = 'your-app-id';
    public $key = 'your-app-key';
    public $secret = 'your-app-secret';
    public $cluster = 'ap1';
    public $useTLS = true;
}