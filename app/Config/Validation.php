<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $sekolah = [
        'kode_sekolah' => 'required|min_length[3]',
        'sekolah' => 'required|min_length[3]',
        'telp_sekolah' => 'required',
        'bentuk_pendidikan' => 'required',
        'active_sekolah' => 'required',
    ];

    public $pengguna = [
        'kode_person' => 'required|min_length[3]',
        'email' => 'required|valid_email|is_unique[sm_users.email]',
        'name' => 'required',
        'sekolah_kode' => 'required',
        'role_id' => 'required',
    ];

    public $pegawai = [
        'kode_person' => 'required|min_length[3]',
        'email' => 'required|valid_email|is_unique[sm_users.email]',
        'name' => 'required',
        'sekolah_kode' => 'required',
        'role_id' => 'required',
    ];
}
