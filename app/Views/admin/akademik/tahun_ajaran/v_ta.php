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
                        <li class="breadcrumb-item"><a href="#">Akademik</a></li>
                        <li class="breadcrumb-item active">Tahun Ajaran</li>
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
                                <th>Tahun Ajaran</th>
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
                                    <td><?= $row['tahun_ajaran']; ?></td>
                                    <td> <?php
                                            if ($row['sts_tahun_ajaran'] == 1) {
                                                echo '<span class="badge badge-success">Aktif</span> ';
                                            } else {
                                                echo '<span class="badge badge-danger">Tidak Aktif</span>';
                                            }
                                            ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item" data-toggle="modal"
                                                    data-target="#modalEdit<?= $row['id_tahun_ajaran']; ?>">Edit</a>
                                                <?php if ($row['sts_tahun_ajaran'] == 0): ?>
                                                    <a href="<?= base_url('admin_tahun_ajaran/on/' . $row['id_tahun_ajaran']) ?>"
                                                        class="dropdown-item">Aktif</a>
                                                <?php else: ?>
                                                    <a href="<?= base_url('admin_tahun_ajaran/off/' . $row['id_tahun_ajaran']) ?>"
                                                        class="dropdown-item">Tidak Aktif</a>
                                                <?php endif; ?>

                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach ?>
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
        <form action="<?= base_url('admin_tahun_ajaran/store') ?>" enctype="multipart/form-data" autocomplete="off"
            method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tahun Ajaran</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tahun Awal</label>
                        <select id="tahun_ajaran" name="tahun_ajaran" class="form-control" required>
                            <option value="">Pilih Tahun Ajaran</option>
                            <?php
                            $tahun_sekarang = date('Y');
                            for ($i = 0; $i < 10; $i++) {
                                $awal = $tahun_sekarang - $i;
                                $akhir = $awal + 1;
                                $value = "$awal/$akhir";
                                echo "<option value=\"$value\">$value</option>";
                            }
                            ?>
                        </select>
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

<?php foreach ($v as $row) : ?>
    <div class="modal fade" id="modalEdit<?= $row['id_tahun_ajaran']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('admin_tahun_ajaran/edit/' . $row['id_tahun_ajaran']) ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Tahun Ajaran</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="form-group">
                        <label>Tahun Awal</label>
                        <select id="tahun_ajaran" name="tahun_ajaran" class="form-control" required>
                            <option value="">Pilih Tahun Ajaran</option>
                            <?php
                            $tahun_sekarang = date('Y');
                            for ($i = 0; $i < 10; $i++) {
                                $awal = $tahun_sekarang - $i;
                                $akhir = $awal + 1;
                                $value = "$awal/$akhir";
                                echo "<option value=\"$value\">$value</option>";
                            }
                            ?>
                        </select>
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