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
                        <li class="breadcrumb-item active">Ubah Siswa</li>
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

                        <form class="form-horizontal" action="<?= base_url('admin_siswa/updateGo') ?>"
                            enctype="multipart/form-data" autocomplete="off" method="post">
                            <div class="card-body">
                                <input hidden readonly type="text" id="id_siswa" name="id_siswa"
                                    value="<?= $d['id_siswa'] ?>" class="form-control" required>
                                <input hidden readonly type="text" id="id_akun" name="id_akun"
                                    value="<?= $d['id_akun'] ?>" class="form-control" required>
                                <div class="form-group">
                                    <label>Nama Lengkap:</label>
                                    <input type="text" id="name" name="name" value="<?= $d['name'] ?>"
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
                                        value="<?= $d['tempat_lahir'] ?>" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Lahir:</label>
                                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?= $d['tgl_lahir'] ?>"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Hobi:</label>
                                    <input type="text" id="hobi" name="hobi" value="<?= $d['hobi'] ?>"
                                        class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>No Handphone:</label>
                                    <input type="text" id="no_hp_siswa" name="no_hp_siswa"
                                        value="<?= $d['no_hp_siswa'] ?>" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Alamat:</label>
                                    <input type="text" id="alamat" name="alamat" value="<?= $d['alamat'] ?>"
                                        class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label>NIS:</label>
                                    <input type="number" id="nis" name="nis" value="<?= $d['nis'] ?>"
                                        class="form-control" readonly required>
                                </div>

                                <div class="form-group">
                                    <label>NISN:</label>
                                    <input type="number" id="nisn" name="nisn" value="<?= $d['nisn'] ?>"
                                        class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label>Kelas:</label>
                                    <select id="kelas_id" name="kelas_id" class="form-control selectx" required>
                                        <option selected disabled value="">Pilih</option>
                                        <?php foreach ($kelas as $bd) : ?>
                                            <option value="<?= $bd['id_kelas']; ?>"
                                                <?= $d['kelas_id'] == $bd['id_kelas'] ? 'selected' : '' ?>>
                                                <?= $bd['nama_kelas']; ?> - <?= $bd['bentuk_pendidikan']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Unit Sekolah:</label>
                                    <select name="bentuk_pendidikan_id" class="form-control" required>
                                        <option disabled>Pilih</option>
                                        <?php foreach ($bentuk_pendidikan as $bp) : ?>
                                            <option value="<?= $bp['id_bentuk_pendidikan']; ?>"
                                                <?= $d['bentuk_pendidikan_id'] == $bp['id_bentuk_pendidikan'] ? 'selected' : '' ?>>
                                                <?= $bp['bentuk_pendidikan']; ?> - <?= $bp['keterangan']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Nama Ibu:</label>
                                    <input type="text" id="nm_ibu_kandung" name="nm_ibu_kandung"
                                        value="<?= $d['nm_ibu_kandung'] ?>" class="form-control" required>
                                </div>


                                <div class="form-group">
                                    <label>Nama Ayah:</label>
                                    <input type="text" id="nm_ayah_kandung" name="nm_ayah_kandung"
                                        value="<?= $d['nm_ayah_kandung'] ?>" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>No Handphone/Wa:</label>
                                    <input type="text" id="no_hp_ortu" name="no_hp_ortu" value="<?= $d['no_hp_ortu'] ?>"
                                        class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" id="no_hp_ortu" name="email" value="<?= $d['email'] ?>"
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
                                    <option value="0" <?= ($d['sts_siswa'] == '0') ? 'selected' : '' ?>>Tidak Aktif
                                    </option>
                                    <option value="1" <?= ($d['sts_siswa'] == '1') ? 'selected' : '' ?>>Aktif</option>
                                    <option value="2" <?= ($d['sts_siswa'] == '2') ? 'selected' : '' ?>>Tamat</option>
                                    <option value="3" <?= ($d['sts_siswa'] == '3') ? 'selected' : '' ?>>Pindah Sekolah
                                    </option>
                                    <option value="4" <?= ($d['sts_siswa'] == '4') ? 'selected' : '' ?>>Drop Out
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto:</label>
                                <br>
                                <img src="<?= base_url('uploads/siswa/') ?><?= $d['image'] ?>" class="rounded"
                                    style="width:50%">
                                <br><br>
                                <input type="file" id="image" name="image" value="<?= $d['image'] ?>" accept="image/*"
                                    class="form-control" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="javascript:history.back()" class="btn btn-danger"> <i class="fa fa-backward"></i>
                                Kembali</a>
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i>
                                Update</button>
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