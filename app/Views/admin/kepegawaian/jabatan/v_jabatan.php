<?= $this->include('layouts/header_admin') ?>

<link rel="stylesheet" href="<?= base_url() ?>/vendor/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="<?= base_url() ?>/vendor/backend/plugins/select2/css/select2.min.css">

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
                        <li class="breadcrumb-item"><a href="<?= base_url('dosen') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Kepegawaian</a></li>
                        <li class="breadcrumb-item active">Jabatan Pegawai</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <h3 class="card-title">
                    <button class="btn btn-block bg-gradient-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </h3>

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
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-sm">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Jabatan</th>
                                <th>Nama Jabatan</th>
                                <th>ID Jabatan</th>
                                <th>Unit Sekolah</th>
                                <th>ID Unit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($v as $v) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $v['kode_jabatan']; ?></td>
                                    <td><?= $v['jabatan']; ?></td>
                                    <td><?= $v['id_jabatan']; ?></td>
                                    <td><?= $v['bentuk_pendidikan']; ?></td>
                                    <td><?= $v['kode_sekolah']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item" data-toggle="modal"
                                                    data-target="#modalEdit<?= $v['id_jabatan']; ?> ">Edit</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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
<div id="alert-message"></div>
<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('admin_jabatan/store') ?>" enctype="multipart/form-data" autocomplete="off"
            method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jabatan Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Bentuk Pendidikan</label>
                        <select id="bentuk_pendidikan" name="bentuk_pendidikan" class="form-control selectx"
                            required>
                            <option selected disabled value="">Pilih</option>
                            <?php foreach ($bentuk_pendidikan as $row5) : ?>
                                <option value="<?= $row5['bentuk_pendidikan']; ?>"><?= $row5['bentuk_pendidikan']; ?> -
                                    <?= $row5['keterangan']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kode Jabatan</label>
                        <input type="text" id="kode_jabatan" name="kode_jabatan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" id="nama_jabatan" name="nama_jabatan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input hidden type="text" id="sekolah_kode" name="sekolah_kode"
                            value=" <?= session('sekolah_kode'); ?>" readonly class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- MODAL EDIT -->
<?php foreach ($v as $v) : ?>
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <iv class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Jabatan Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Bentuk Pendidikan</label>
                            <select id="bentuk_pendidikan" name="bentuk_pendidikan" class="form-control selectx"
                                required>
                                <option selected disabled value="">Pilih</option>
                                <?php foreach ($bentuk_pendidikan as $row5) : ?>
                                    <option value="<?= $row5['bentuk_pendidikan']; ?>"><?= $row5['bentuk_pendidikan']; ?> -
                                        <?= $row5['keterangan']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kode Jabatan</label>
                            <input type="text" id="kode_jabatan" name="kode_jabatan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Jabatan</label>
                            <input type="text" id="nama_jabatan" name="nama_jabatan" class="form-control" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
        </div>
        </form>
    </div>
    </div>
<?php endforeach; ?>


<script>
    $(function() {
        $("#example1").DataTable({
            "language": {
                "sSearch": "Cari"
            }
        });
    });
</script>
<script src="<?= base_url() ?>/vendor/backend/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>/vendor/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>


<?= $this->include('layouts/footer') ?>