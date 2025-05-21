<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?> </title>
    <link rel="shortcut icon" type="image/icon" href="<?= base_url() ?>vendor/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/backend/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>vendor/backend/dist/css/adminlte.min.css">
    <link rel="stylesheet"
        href="<?= base_url() ?>vendor/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="<?= base_url() ?>vendor/backend/plugins/jquery/jquery.min.js"></script>
</head>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <a class="nav-link" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge"></span>
                </a>

                <a class="nav-link" href="#">
                    <i class="far fa-user"></i>
                    <span class="badge badge-warning navbar-badge"></span>
                </a>
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url('images/profil/') ?><?= session('image'); ?>"
                            class="user-image img-circle elevation-2">
                        <span class="d-none d-md-inline">Hi, <?= session('name'); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-info">
                            <img src="<?= base_url('images/profil/') ?><?= session('image'); ?>"
                                class="img-circle elevation-2">
                            <p>
                                <?= session('name'); ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="/pengaturan" class="btn btn-info btn-flat">
                                <i class="nav-icon fa fa-cog"></i> Ubah Password
                            </a>
                            <a href="/logout" class="btn btn-danger btn-flat float-right">
                                <i class="fas fa-sign-out-alt"></i> Log out
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?= base_url() ?>vendor/img/logo.png" class="brand-image">
                <span class="brand-text"><b>PANGKALAN DATA</b></span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item has-treeview">
                            <a href="/" class="nav-link <?= isset($act_mn_db) ? $act_mn_db : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview <?= isset($act_mn_kesiswaan) ? $act_mn_kesiswaan : '' ?>">
                            <a href="#" class="nav-link <?= isset($act_mn_kesis) ? $act_mn_kesis : '' ?>">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Kesiswaan <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin_kelas"
                                        class="nav-link <?= isset($act_mn_kelas) ? $act_mn_kelas : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Kelas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin_siswa"
                                        class="nav-link <?= isset($act_mn_siswa) ? $act_mn_siswa : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Siswa</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item has-treeview <?= isset($act_mn_kepegawaian) ? $act_mn_kepegawaian : '' ?>">
                            <a href="#" class="nav-link <?= isset($act_mn_kepeg) ? $act_mn_kepeg : '' ?>">
                                <i class="nav-icon fa fa-id-badge "></i>
                                <p>Kepegawaian <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin_jabatan"
                                        class="nav-link <?= isset($act_mn_kepeg2) ? $act_mn_kepeg2 : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Jabatan Pegawai</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin_pegawai"
                                        class="nav-link <?= isset($act_mn_pegawai) ? $act_mn_pegawai : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Pegawai</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview <?= isset($act_mn_akademik) ? $act_mn_akademik : '' ?>">
                            <a href="#" class="nav-link <?= isset($act_mn_akd) ? $act_mn_akd : '' ?>">
                                <i class="nav-icon fa fa-id-card"></i>
                                <p>Akademik<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin_ajaran"
                                        class="nav-link <?= isset($act_mn_ajaran) ? $act_mn_ajaran : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Tahun Ajaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin_kenaikan"
                                        class="nav-link <?= isset($act_mn_pindah) ? $act_mn_pindah : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Kenaikan/Pindah Kelas</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/admin_kelulusan"
                                        class="nav-link <?= isset($act_mn_lulus) ? $act_mn_lulus : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Kelulusan</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview <?= isset($act_mn_keuangan) ? $act_mn_keuangan : '' ?>">
                            <a href="#" class="nav-link <?= isset($act_mn_keu) ? $act_mn_keu : '' ?>">
                                <i class="nav-icon fa fa-university"></i>
                                <p>Keuangan <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin_pembayaran"
                                        class="nav-link <?= isset($act_mn_bayar) ? $act_mn_bayar : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pembayaran Siswa</p>
                                    </a>
                                </li>

                                <li class="nav-item has-treeview <?= isset($act_mn_set_pem) ? $act_mn_set_pem : '' ?>">
                                    <a href="#" class="nav-link <?= isset($act_mn_setpem) ? $act_mn_setpem : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setting Pembayaran<i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/admin_akun_biaya"
                                                class="nav-link <?= isset($act_mn_akun_biaya) ? $act_mn_akun_biaya : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Akun Biaya</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin_pos_bayar"
                                                class="nav-link <?= isset($act_mn_pos_bayar) ? $act_mn_pos_bayar : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Pos Bayar</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/admin_jenis_bayar"
                                                class="nav-link <?= isset($act_mn_jenis_bayar) ? $act_mn_jenis_bayar : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Jenis Bayar</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin_pajak"
                                                class="nav-link <?= isset($act_mn_pajak) ? $act_mn_pajak : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Pajak</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin_unit_pos"
                                                class="nav-link <?= isset($act_mn_unit_pos) ? $act_mn_unit_pos : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Unit Pos</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="/admin_tabungan"
                                        class="nav-link <?= isset($act_mn_tabungan) ? $act_mn_tabungan : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Tabungan</p>
                                    </a>
                                </li>

                                <li class="nav-item has-treeview <?= isset($act_mn_kas) ? $act_mn_kas : '' ?>">
                                    <a href="#" class="nav-link <?= isset($act_mn_bank) ? $act_mn_bank : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kas & Bank<i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/admin_saldo_awal"
                                                class="nav-link <?= isset($act_mn_saldo_awal) ? $act_mn_saldo_awal : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Saldo Awal</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin_kas_keluar"
                                                class="nav-link <?= isset($act_mn_kas_keluar) ? $act_mn_kas_keluar : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Kas Keluar</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/admin_kas_masuk"
                                                class="nav-link <?= isset($act_mn_kas_masuk) ? $act_mn_kas_masuk : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Kas Masuk</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/admin_transfer_kas"
                                                class="nav-link <?= isset($act_mn_transfer_kas) ? $act_mn_transfer_kas : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Transkef Kas</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/admin_rekosiliasi_bank"
                                                class="nav-link <?= isset($act_mn_rekosiliasi_bank) ? $act_mn_rekosiliasi_bank : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Rekonsiliasi Bank</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li
                                    class="nav-item has-treeview <?= isset($act_mn_penggajian) ? $act_mn_penggajian : '' ?>">
                                    <a href="#" class="nav-link <?= isset($act_mn_gaji) ? $act_mn_gaji : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Penggajian<i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/admin_set_gaji"
                                                class="nav-link <?= isset($act_mn_set_gaji) ? $act_mn_set_gaji : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Seting Gaji</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin_slip_gaji"
                                                class="nav-link <?= isset($act_mn_slip_gaji) ? $act_mn_slip_gaji : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Slip Gaji</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/admin_notif_gaji"
                                                class="nav-link <?= isset($act_mn_notif_gaji) ? $act_mn_notif_gaji : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Notif Gaji</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item has-treeview <?= isset($act_mn_hutang) ? $act_mn_hutang : '' ?>">
                                    <a href="#" class="nav-link <?= isset($act_mn_htg) ? $act_mn_htg : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Hutang<i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/admin_pos_hutang"
                                                class="nav-link <?= isset($act_mn_pos_hutang) ? $act_mn_pos_hutang : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Pos Hutang</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin_set_hutang"
                                                class="nav-link <?= isset($act_mn_set_hutang) ? $act_mn_set_hutang : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Setting Hutang</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/admin_bayar_hutang"
                                                class="nav-link <?= isset($act_mn_bayar_hutang) ? $act_mn_bayar_hutang : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Bayar Hutang</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="/admin_kirim_tagihan"
                                        class="nav-link <?= isset($act_mn_kirim_tagihan) ? $act_mn_kirim_tagihan : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Kirim Tagihan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item has-treeview <?= isset($act_mn_laporan) ? $act_mn_laporan : '' ?>">
                            <a href="#" class="nav-link <?= isset($act_mn_lpr) ? $act_mn_lpr : '' ?>">
                                <i class="nav-icon fa fa-print"></i>
                                <p>Laporan <i class="fas fa-angle-left right"></i></p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li
                                    class="nav-item has-treeview <?= isset($act_mn_lap_pembayaran) ? $act_mn_lap_pembayaran : '' ?>">
                                    <a href="#" class="nav-link <?= isset($act_mn_lapp) ? $act_mn_lapp : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lap. Pembayaran<i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/admin_per_kelas"
                                                class="nav-link <?= isset($act_mn_per_kelas) ? $act_mn_per_kelas : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Per Kelas</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin_per_tanggal"
                                                class="nav-link <?= isset($act_mn_per_tanggal) ? $act_mn_per_tanggal : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Per Tanggal</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/admin_tagihan_siswa"
                                                class="nav-link <?= isset($act_mn_tagihan_siswa) ? $act_mn_tagihan_siswa : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Tagihan Siswa</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/admin_rekap_pembayaran"
                                                class="nav-link <?= isset($act_mn_rekap_pembayaran) ? $act_mn_rekap_pembayaran : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Rekap Pembayaran</p>
                                            </a>
                                        </li>
                                    </ul>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li
                                    class="nav-item has-treeview <?= isset($act_mn_lap_keuangan) ? $act_mn_lap_keuangan : '' ?>">
                                    <a href="#" class="nav-link <?= isset($act_mn_keu) ? $act_mn_keu : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lap. Keuangan<i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/admin_lap_keuangan"
                                                class="nav-link <?= isset($act_mn_lap_keuangan) ? $act_mn_lap_keuangan : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Lap. Jurnal (Kas)</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin_lap_kas_bank"
                                                class="nav-link <?= isset($act_mn_lap_kas_bank) ? $act_mn_lap_kas_bank : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Lap. Kas Bank</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/admin_neraca"
                                                class="nav-link <?= isset($act_mn_neraca) ? $act_mn_neraca : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Neraca</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/admin_lap_gaji"
                                                class="nav-link <?= isset($act_mn_lap_gaji) ? $act_mn_lap_gaji : '' ?>">
                                                <i class=" far fa-circle nav-icon"></i>
                                                <p>Lap. Gaji</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin_lap_tabungan"
                                        class="nav-link <?= isset($act_mn_lap_tabungan) ? $act_mn_lap_tabungan : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Lap. Tabungan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview <?= isset($act_mn_pengaturan) ? $act_mn_pengaturan : '' ?>">
                            <a href="#" class="nav-link <?= isset($act_mn_pgr) ? $act_mn_pgr : '' ?>">
                                <i class="nav-icon fa fa-cog"></i>
                                <p>Pengaturan <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin_pgr_sekolah"
                                        class="nav-link <?= isset($act_mn_pgr_sekolah) ? $act_mn_pgr_sekolah : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Sekolah</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin_pgr_informasi"
                                        class="nav-link <?= isset($act_pgr_informasi) ? $act_pgr_informasi : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Informasi</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/admin_pgr_man_pengguna"
                                        class="nav-link <?= isset($act_pgr_man_pengguna) ? $act_pgr_man_pengguna : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Man. Pengguna</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/admin_pgr_pemeliharaan"
                                        class="nav-link <?= isset($act_pgr_pemeliharaan) ? $act_pgr_pemeliharaan : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Pemeliharaan</p>
                                    </a>
                                </li>



                                <li class="nav-item">
                                    <a href="/admin_pgr_transaksi"
                                        class="nav-link <?= isset($act_pgr_transaksi) ? $act_pgr_transaksi : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Log Transaksi</p>
                                    </a>
                                </li>

                            </ul>
                        </li>



                        <li class="nav-item has-treeview">
                            <a href="/logout" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('sukses'); ?>"></div>
        <div class="flash-data-gagal" data-flashdatagagal="<?= session()->getFlashdata('gagal'); ?>"></div>