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
                        <li class="breadcrumb-item"><a href="#">Kesiswaan</a></li>
                        <li class="breadcrumb-item active">Siswa</li>
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

                <h3 class="card-title d-flex flex-wrap align-items-center">
                    <a href="<?= base_url('admin_siswa/createsiswa'); ?>" class="btn bg-gradient-success mr-2 mb-2">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>

                    <a href="<?= base_url('admin_siswa/importData'); ?>"
                        class="btn bg-gradient-primary text-white mr-2 mb-2">
                        <i class="fa fa-file-excel"></i> Import Data
                    </a>


                    <a class="btn bg-gradient-danger text-white mr-2 mb-2">
                        <i class="fa fa-print"></i> Cetak
                    </a>

                    <a class="btn bg-gradient-info text-white mr-2 mb-2">
                        <i class="fa fa-file-excel"></i> Export Excel
                    </a>
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
                    <form action="<?= base_url('admin_kelas/store') ?>" enctype="multipart/form-data" autocomplete="off"
                        method="post">

                        <div class="form-row">

                            <div class="form-group col-md-2">
                                <select id="kelas" name="kelas" class="form-control selectx" required>
                                    <option selected disabled value="">Pilih Unit</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                    <option value="VII">VII</option>
                                    <option value="VIII">VIII</option>
                                    <option value="IX">IX</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <select id="kelas" name="kelas" class="form-control selectx" required>
                                    <option selected disabled value="">Pilih Kelas</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                    <option value="VII">VII</option>
                                    <option value="VIII">VIII</option>
                                    <option value="IX">IX</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <select id="sts_active" name="sts_active" class="form-control selectx" required>
                                    <option selected disabled value="">Pilih Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <input type="hidden" name="sekolah_kode" value="<?= session('sekolah_kode'); ?>">
                            <div class="form-group col-md-2">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i> Cari</button>
                            </div>
                        </div>
                    </form>
                    <table id="example1" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Unit</th>
                                <th>kelas</th>
                                <th>WA Ortu</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($v as $row) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['nis']; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['bentuk_pendidikan']; ?></td>
                                    <td><?= $row['nama_kelas']; ?></td>
                                    <td><?= $row['no_hp_ortu']; ?></td>
                                    <td> <?php
                                            if ($row['sts_siswa'] == 0) {
                                                echo '<span class="badge badge-danger">Tidak Aktif</span> ';
                                            } elseif ($row['sts_siswa'] == 1) {
                                                echo '<span class="badge badge-success">Aktif</span>';
                                            } elseif ($row['sts_siswa'] == 2) {
                                                echo '<span class="badge badge-warning">Tamat</span>';
                                            } elseif ($row['sts_siswa'] == 3) {
                                                echo '<span class="badge badge-danger">Pindah Sekolah</span>';
                                            } elseif ($row['sts_siswa'] == 4) {
                                                echo '<span class="badge badge-info">Drop Out</span>';
                                            }
                                            ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="<?= base_url('admin_siswa/detail/' . $row['id_siswa']) ?>"
                                                    class="dropdown-item">Detail</a>
                                                <a href="<?= base_url('admin_siswa/edit/' . $row['id_siswa']) ?>"
                                                    class="dropdown-item">Edit</a>

                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

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