<?= $this->include('layouts/header_admin') ?>

<link rel="stylesheet" href="<?= base_url() ?>/vendor/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="<?= base_url() ?>/vendor/backend/plugins/select2/css/select2.min.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Kepegawaian</a></li>
                        <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
                        <li class="breadcrumb-item active">Edit Pegawai</li>
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

                <form class="form-horizontal" action="<?= base_url('datasekolah/storesekolah') ?>" enctype="multipart/form-data" autocomplete="off" method="post">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>

                                    <tr>
                                        <td>NIP <span style="color:red;">*</span> </td>
                                        <td><input class="form-control" type="text" id="nip" name="nip" value="<?= old('nip'); ?>" required> </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap <span style="color:red;">*</span> </td>
                                        <td><input class="form-control" type="text" id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap'); ?>" required> </td>
                                    </tr>

                                    <tr>
                                        <td>JENIS KELAMIN <span style="color:red;"></span> </td>
                                        <td><select id="jk" name="jk" class="form-control selectx">
                                                <option selected disabled value="">Pilih</option>
                                                <option value="LK">LAKI - LAKI</option>
                                                <option value="PR">PEREMPUAN</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>TEMPAT LAHIR <span style="color:red;"></span> </td>
                                        <td><input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir'); ?>"> </td>
                                    </tr>

                                    <tr>
                                        <td>TANGGAL LAHIR <span style="color:red;"></span> </td>
                                        <td><input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>"> </td>
                                    </tr>

                                    <tr>
                                        <td>PENDIDIKAN TERAKHIR <span style="color:red;"></span> </td>
                                        <td>
                                            <select id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-control selectx">
                                                <option selected disabled value="">Pilih</option>
                                                <option value="S1">STRATA 1 (S1)</option>
                                                <option value="S2">STRATA 2 (S2)</option>
                                                <option value="S3">STRATA 3 (S3)</option>

                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>UNIT SEKOLAH <span style="color:red;">*</span> </td>
                                        <td>
                                            <select id="unit_sekolah" name="unit_sekolah" class="form-control selectx" required>
                                                <option selected disabled value="">Pilih</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>STATUS KEPEGAWAIAN <span style="color:red;">*</span> </td>
                                        <td>
                                            <select id="status_kepegawaian" name="status_kepegawaian" class="form-control selectx" required>
                                                <option selected disabled value="">Pilih</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>ALAMAT <span style="color:red;"></span> </td>
                                        <td>
                                            <textarea name="alamat" id="alamat" class="form-control selectx" style="height: 150px"></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>PASSWORD DEFAULT: <span style="color:red;">123456</span> </td>
                                        <td><input class="form-control" type="text" id="password" name="password" value="<?= old('password'); ?>" required> </td>
                                    </tr>

                                    <tr>
                                        <td>NO TELEPON/HP: <span style="color:red;"></span> </td>
                                        <td><input class="form-control" type="text" id="no_hp" name="no_hp" value="<?= old('no_hp'); ?>"> </td>
                                    </tr>

                                    <tr>
                                        <td>EMAIL: <span style="color:red;"></span> </td>
                                        <td><input class="form-control" type="email" id="email" name="email" value="<?= old('email'); ?>"> </td>
                                    </tr>

                                    <tr>
                                        <td>TANGGAL MASUK: <span style="color:red;"></span> </td>
                                        <td><input class="form-control" type="date" id="tgl_masuk" name="tgl_masuk" value="<?= old('tgl_masuk'); ?>"> </td>
                                    </tr>

                                    <tr>
                                        <td>TANGGAL KELUAR: <span style="color:red;"></span> </td>
                                        <td><input class="form-control" type="date" id="tgl_keluar" name="tgl_keluar" value="<?= old('tgl_keluar'); ?>"> </td>
                                    </tr>

                                    <tr>
                                        <td>STATUS KEAKTIFAN <span style=" color:red;">*</span> </td>
                                        <td>
                                            <select id="active_sekolah" name="active_sekolah" class="form-control selectx" required>
                                                <option selected disabled value="">Pilih</option>
                                                <option value="1">Active</option>
                                                <option value="2">Nonactive</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>FOTO: <span style="color:red;"></span> </td>
                                        <td><input class="form-control selectx" type="file" id="foto" name="foto" value="<?= old('foto'); ?>"> </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p><span style="color:red;">* </span>)wajib diisi.</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="javascript:history.back()" class="btn btn-danger"> <i class="fa fa-backward"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Update</button>
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



</div>

<?= $this->include('layouts/footer'); ?>