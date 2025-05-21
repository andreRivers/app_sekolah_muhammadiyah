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
                        <li class="breadcrumb-item active">Tambah Siswa</li>
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

                        <form class="form-horizontal" action="<?= base_url('admin_siswa/store') ?>"
                            enctype="multipart/form-data" autocomplete="off" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Lengkap:</label>
                                    <input type="text" id="name" name="name" value="<?= old('name') ?>"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin:</label>
                                    <select id="jk" name="jk" class="form-control" required>
                                        <option selected disabled value="">Pilih</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir:</label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir"
                                        value="<?= old('tempat_lahir') ?>" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Lahir:</label>
                                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir') ?>"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Hobi:</label>
                                    <input type="text" id="hobi" name="hobi" value="<?= old('hobi') ?>"
                                        class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>No Handphone:</label>
                                    <input type="text" id="no_hp_siswa" name="no_hp_siswa"
                                        value="<?= old('no_hp_siswa') ?>" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Alamat:</label>
                                    <input type="text" id="alamat" name="alamat" value="<?= old('alamat') ?>"
                                        class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label>NIS:</label>
                                    <input type="number" id="nis" name="nis" value="<?= old('nis') ?>"
                                        class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>NISN:</label>
                                    <input type="number" id="nisn" name="nisn" value="<?= old('nisn') ?>"
                                        class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label>Kelas:</label>
                                    <select id="kelas_id" name="kelas_id" class="form-control selectx" required>
                                        <option selected disabled value="">Pilih</option>
                                        <?php foreach ($kelas as $row6) : ?>
                                            <option value="<?= $row6['id_kelas']; ?>">
                                                <?= $row6['nama_kelas']; ?> -
                                                <?= $row6['bentuk_pendidikan']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Unit Sekolah:</label>
                                    <select id="bentuk_pendidikan_id" name="bentuk_pendidikan_id"
                                        class="form-control selectx" required>
                                        <option selected disabled value="">Pilih</option>
                                        <?php foreach ($bentuk_pendidikan as $row5) : ?>
                                            <option value="<?= $row5['id_bentuk_pendidikan']; ?>">
                                                <?= $row5['bentuk_pendidikan']; ?> -
                                                <?= $row5['keterangan']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Nama Ibu:</label>
                                    <input type="text" id="nm_ibu_kandung" name="nm_ibu_kandung"
                                        value="<?= old('nm_ibu_kandung') ?>" class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label>Nama Ayah:</label>
                                    <input type="text" id="nm_ayah_kandung" name="nm_ayah_kandung"
                                        value="<?= old('nm_ayah_kandung') ?>" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>No Handphone/Wa:</label>
                                    <input type="text" id="no_hp_ortu" name="no_hp_ortu"
                                        value="<?= old('no_hp_ortu') ?>" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" id="no_hp_ortu" name="email" value="<?= old('email') ?>"
                                        class="form-control" required>
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
                                <select id="sts_siswa" name="sts_siswa" class="form-control selectx" required>
                                    <option selected disabled value="">Pilih</option>
                                    <option value="0">Tidak Aktif</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Tamat</option>
                                    <option value="3">Pindah Sekolah</option>
                                    <option value="4">Drop Out</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto:</label>
                                <br>
                                <img src="<?= base_url('images/profil/default.jpg') ?>" class="rounded"
                                    style="width:50%">
                                <br><br>
                                <input type="file" id="image" name="image" value="<?= old('image') ?>" accept="image/*"
                                    class="form-control" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="javascript:history.back()" class="btn btn-danger"> <i class="fa fa-backward"></i>
                                Kembali</a>
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i>
                                Simpan</button>
                        </div>
                        <!-- /.card-footer -->
                        </form>
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