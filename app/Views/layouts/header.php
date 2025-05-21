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
    <link rel="stylesheet" href="<?= base_url() ?>vendor/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
                        <img src="images/profil/default.jpg" class="user-image img-circle elevation-2">
                        <span class="d-none d-md-inline">Hi,</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-info">
                            <img src="<?= base_url() ?>assets/images/profil/default.jpg" class="img-circle elevation-2">
                            <p>
                                NAMA AKUN
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="pengaturan') ?>" class="btn btn-info btn-flat">
                                <i class="nav-icon fa fa-cog"></i> Ubah Password
                            </a>
                            <a href="logout') ?>" class="btn btn-danger btn-flat float-right">
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
                            <a href="/"
                                class="nav-link <?= isset($act_mn_db) ? $act_mn_db : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="/datasekolah" class="nav-link <?= isset($act_mn_sekolah) ? $act_mn_sekolah : '' ?>">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Data Sekolah</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview <?= isset($act_mn_sdm) ? $act_mn_sdm : '' ?>">
                            <a href="#" class="nav-link <?= isset($act_mn_sdms) ? $act_mn_sdms : '' ?>">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Man. SDM <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/data_kelas" class="nav-link <?= isset($act_mn_dt_guru) ? $act_mn_dt_guru : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Data Guru</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/data_jurusan" class="nav-link <?= isset($act_mn_dt_tendik) ? $act_mn_dt_tendik : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Data Tendik</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item has-treeview <?= isset($act_mn_kelas) ? $act_mn_kelas : '' ?>">
                            <a href="#" class="nav-link <?= isset($act_mn_jurusan) ? $act_mn_jurusan : '' ?>">
                                <i class="nav-icon fa fa-id-badge "></i>
                                <p>Man. Kelas|Jurusan <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/data_kelas" class="nav-link <?= isset($act_mn_dt_kelas) ? $act_mn_dt_kelas : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Data Kelas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/data_jurusan" class="nav-link <?= isset($act_mn_dt_jurusan) ? $act_mn_dt_jurusan : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Data Jurusan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/map_siswa" class="nav-link <?= isset($act_mn_mapp_kelas) ? $act_mn_mapp_kelas : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Mapp Siswa Ke Kelas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/map_siswa" class="nav-link <?= isset($act_mn_mapp_wali) ? $act_mn_mapp_wali : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Mapp Wali_kelas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview <?= isset($act_mn_man_jadwal) ? $act_mn_man_jadwal : '' ?>">
                            <a href="#" class="nav-link <?= isset($act_mn_man_mapel) ? $act_mn_man_mapel : '' ?>">
                                <i class="nav-icon fa fa-id-card"></i>
                                <p>Man. Mapel | Guru <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/data_kelas" class="nav-link <?= isset($act_mn_jadwal1) ? $act_mn_jadwal1 : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Jadwal mengajar guru</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/data_jurusan" class="nav-link <?= isset($act_mn_dt_jadwal2) ? $act_mn_dt_jadwal2 : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Penjadwalan per kelas</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview <?= isset($act_mn_man_akademik) ? $act_mn_man_akademik : '' ?>">
                            <a href="#" class="nav-link <?= isset($act_mn_man_akd) ? $act_mn_man_akd : '' ?>">
                                <i class="nav-icon fa fa-university"></i>
                                <p>Man. Akademik <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/data_kelas" class="nav-link <?= isset($act_mn_akd1) ? $act_mn_akd1 : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Nilai siswa semester</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/data_jurusan" class="nav-link <?= isset($act_mn_akd2) ? $act_mn_akd2 : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Rapor|rekap nilai</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/data_jurusan" class="nav-link <?= isset($act_mn_akd3) ? $act_mn_akd3 : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Import/export data</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview <?= isset($act_mn_man_presensi) ? $act_mn_man_presensi : '' ?>">
                            <a href="#" class="nav-link <?= isset($act_mn_man_prs) ? $act_mn_man_prs : '' ?>">
                                <i class="nav-icon fa fa-thumbs-up"></i>
                                <p>Man. Presensi <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/data_kelas" class="nav-link <?= isset($act_mn_prs1) ? $act_mn_prs1 : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Rekap kehadiran siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/data_jurusan" class="nav-link <?= isset($act_mn_prs2) ? $act_mn_prs2 : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Rekap kehadiran guru</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/data_jurusan" class="nav-link <?= isset($act_mn_prs3) ? $act_mn_prs3 : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>export data</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview <?= isset($act_mn_man_keuangan) ? $act_mn_man_keuangan : '' ?>">
                            <a href="#" class="nav-link <?= isset($act_mn_man_keu) ? $act_mn_man_keu : '' ?>">
                                <i class="nav-icon fa fa-credit-card"></i>
                                <p>Man. Keuangan <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/data_kelas" class="nav-link <?= isset($act_mn_keu1) ? $act_mn_keu1 : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Data Jenis Tagihan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/data_jurusan" class="nav-link <?= isset($act_mn_keu2) ? $act_mn_keu2 : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Lihat tagihan siswa</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/data_jurusan" class="nav-link <?= isset($act_mn_keu3) ? $act_mn_keu3 : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Status pembayaran</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="/data_jurusan" class="nav-link <?= isset($act_mn_keu4) ? $act_mn_keu4 : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Riwayat Transaksi</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview <?= isset($act_mn_users) ? $act_mn_users : '' ?>">
                            <a href="#" class="nav-link <?= isset($act_mn_user) ? $act_mn_user : '' ?>">
                                <i class="nav-icon fa fa-cog"></i>
                                <p>Manajemen Pengguna <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/datapengguna" class="nav-link <?= isset($act_mn_dt_pengguna) ? $act_mn_dt_pengguna : '' ?>">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Data Pengguna</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" style="background-color:#DCDCDC ;">
                                <p>SETTING</p>
                            </a>
                        </li>
                        <li
                            class="nav-item has-treeview <?= isset($active_menu_pengaturan) ? $active_menu_pengaturan : '' ?>">
                            <a href="#" class="nav-link <?= isset($active_menu_pr) ? $active_menu_pr : '' ?>">
                                <i class="nav-icon fa fa-cog"></i>
                                <p>Pengaturan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link <?= isset($active_menu_ubahpass) ? $active_menu_ubahpass : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ganti Password</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link <?= isset($active_menu_ubahpass) ? $active_menu_ubahpass : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tahun Ajaran Aktif</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link <?= isset($active_menu_ubahpass) ? $active_menu_ubahpass : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Biodata Sekolah</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link <?= isset($active_menu_ubahpass) ? $active_menu_ubahpass : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Backup Database</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href=""
                                        class="nav-link <?= isset($act_mn_man_jenpendidikan) ? $act_mn_man_jenpendidikan : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Pendidikan</p>
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