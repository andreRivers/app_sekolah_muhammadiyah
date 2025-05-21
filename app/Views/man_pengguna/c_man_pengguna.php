<?= $this->include('layouts/header') ?>
<link rel="stylesheet" href="<?= base_url() ?>/vendor/backend/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/vendor/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                        <li class="breadcrumb-item"><a href="#">Data Sekolah</a></li>
                        <li class="breadcrumb-item active">Tambah Sekolah</li>
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

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
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

                <form class="form-horizontal" action="<?= base_url('datapengguna/storepengguna')?>" enctype="multipart/form-data" autocomplete="off" method="post">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>

                                    <tr>
                                        <td>AKSES SEKOLAH <span style="color:red;">*</span> </td>
                                        <td><select id="sekolah_kode" name="sekolah_kode" class="form-control selectx" required>
                                                <option selected disabled value="">Pilih</option>
                                                 <?php foreach ($v as $row5) : ?> 
                                                <option value="<?= $row5['kode_sekolah']; ?>"> <?= $row5['sekolah']; ?></option>
                                                <?php endforeach ?>
                                            </select> </td>
                                    </tr>

                                     <tr>
                                        <td>ROLE AKSES <span style="color:red;">*</span> </td>
                                        <td>
                                            <select id="role_id" name="role_id" class="form-control selectx" required>
                                                <option selected disabled value="">Pilih</option>
                                                <option value="1">Superadmin</option>
                                                <option value="2">Admin</option>
                                                <option value="3">Operator</option>
                                                <option value="4">Siswa</option>
                                                <option value="6">Guru</option>
                                            </select>
                                        </td>
                                    </tr>

                                     <tr>
                                        <td>KODE UNIK (NISN/NUPTK)<span style="color:red;">*</span> </td>
                                        <td><input class="form-control" type="text" id="kode_person" name="kode_person" value="<?= old('kode_person'); ?>" required> </td>
                                    </tr>

                                    <tr>
                                        <td>NAMA<span style="color:red;">*</span> </td>
                                        <td><input class="form-control" type="text" id="name" name="name" value="<?= old('name'); ?>" required> </td>
                                    </tr>

                                      <tr>
                                        <td>EMAIL<span style="color:red;">*</span> </td>
                                        <td><input class="form-control" type="email" id="email" name="email" value="<?= old('email'); ?>" required> </td>
                                    </tr>

                                    <tr>
                                        <td>NO. HANDPHONE <span style="color:red;">*</span> </td>
                                        <td><input class="form-control" type="number" id="no_hp" name="no_hp" value="<?= old('no_hp'); ?>" required> </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="javascript:history.back()" class="btn btn-danger"> <i class="fa fa-backward"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Simpan</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->





</div>
<!-- /.content-wrapper -->
<!-- Select2 -->
<script src="<?= base_url() ?>/vendor/backend/plugins/select2/js/select2.full.min.js"></script>

<?= $this->include('layouts/footer') ?>