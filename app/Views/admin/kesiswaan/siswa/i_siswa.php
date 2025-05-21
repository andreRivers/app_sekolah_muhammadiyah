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
                        <li class="breadcrumb-item active">Import Data Siswa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">

        <!-- Default box -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
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
                    <h4>Petunjuk Singkat</h4>
                    <p align="justify">Penginputan data Siswa bisa dilakukan dengan meng-copy data dari file Ms. Excel.
                        format file
                        harus sesuai kebutuhan aplikasi. silahkan download formatnya <a href="" target="_blank"
                            class="btn btn-success btn-xs"> Download Draft</a> <br><br>
                        <b>Catatan:</b> <br>
                    <ol>
                        <li>Pengisian Jenis data <b>Tanggal</b> diisi dengan format <b>YYYY-MM-DD</b> Contoh
                            <b>2025-05-20</b><br>
                            Cara Merubah : blok semua tanggal pilih format cell di excel ganti dengan formate date yang
                            tahunnya di depanm
                        </li>
                    </ol>
                    </p>
                    <hr>
                    <div class="form-group">
                        <label>Masukan File (.xls/.xlsx/.csv):</label>
                        <input type="file" id="importfile" name="importfile"
                            accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                            class="form-control" required>
                    </div>
                    <a href="javascript:history.back()" class="btn btn-danger"> <i class="fa fa-backward"></i>
                        Kembali</a>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i>
                        Import Data</button>
                </div>

            </div>

        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->





</div>
<!-- /.content-wrapper -->
<!-- Select2 -->


<?= $this->include('layouts/footer') ?>