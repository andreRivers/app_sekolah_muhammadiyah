<?= $this->include('layouts/header_admin') ?>
<link rel="stylesheet" href="<?= base_url() ?>/vendor/backend/plugins/select2/css/select2.min.css">
<link rel="stylesheet"
    href="<?= base_url() ?>/vendor/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Kesiswaan</a></li>
                        <li class="breadcrumb-item active">Detail Siswa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert alert-danger">
                            <?= implode('<br>', session()->getFlashdata('errors')) ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Lengkap: </label><br>
                                <p for=""> <?= $d['name'] ?></p>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin:</label>
                                <p for=""> <?= $d['jk'] ?></p>
                            </div>
                            <div class="form-group">
                                <label>Tempat/Tanggal Lahir:</label>
                                <p for=""> <?= $d['tempat_lahir'] ?>,
                                    <?= $d['tgl_lahir'] ?>
                                </p>
                            </div>

                            <div class="form-group">
                                <label>Hobi:</label>
                                <p for=""> <?= $d['hobi'] ?></p>
                            </div>

                            <div class="form-group">
                                <label>No Handphone:</label>
                                <p for=""> <?= $d['no_hp_siswa'] ?></p>
                            </div>

                            <div class="form-group">
                                <label>Alamat:</label>
                                <p for=""> <?= $d['alamat'] ?></p>
                            </div>


                            <div class="form-group">
                                <label>NIS:</label>
                                <p for=""> <?= $d['nis'] ?></p>
                            </div>

                            <div class="form-group">
                                <label>NISN:</label>
                                <p for=""> <?= $d['nisn'] ?></p>
                            </div>



                            <div class="form-group">
                                <label>Nama Ibu:</label>
                                <p for=""> <?= $d['nm_ibu_kandung'] ?></p>
                            </div>


                            <div class="form-group">
                                <label>Nama Ayah:</label>
                                <p for=""> <?= $d['nm_ayah_kandung'] ?></p>
                            </div>

                            <div class="form-group">
                                <label>No Handphone/Wa:</label>
                                <p for=""> <?= $d['no_hp_ortu'] ?></p>
                            </div>

                            <div class="form-group">
                                <label>Email:</label>
                                <p for=""> <?= $d['email'] ?></p>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Status:</label>
                                <p><?php
                                    if ($d['sts_siswa'] == 0) {
                                        echo '<span class="badge badge-danger">Tidak Aktif</span> ';
                                    } elseif ($d['sts_siswa'] == 1) {
                                        echo '<span class="badge badge-success">Aktif</span>';
                                    } elseif ($d['sts_siswa'] == 2) {
                                        echo '<span class="badge badge-warning">Tamat</span>';
                                    } elseif ($d['sts_siswa'] == 3) {
                                        echo '<span class="badge badge-danger">Pindah Sekolah</span>';
                                    } elseif ($d['sts_siswa'] == 4) {
                                        echo '<span class="badge badge-info">Drop Out</span>';
                                    }
                                    ?></p>
                            </div>
                            <div class="form-group">
                                <label>Foto:</label>
                                <br>
                                <img src="<?= base_url('uploads/siswa/') ?><?= $d['image'] ?>" class="rounded"
                                    style="width:50%">

                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="" class="btn btn-primary"> <i class="fa fa-print"></i>
                                Cetak</a>
                            <a href="javascript:history.back()" class="btn btn-danger"> <i class="fa fa-backward"></i>
                                Kembali</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->





</div>
<!-- /.content-wrapper -->
<!-- Select2 -->
<script src="<?= base_url() ?>/vendor/backend/plugins/select2/js/select2.full.min.js"></script>

<?= $this->include('layouts/footer') ?>