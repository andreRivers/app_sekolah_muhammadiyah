<?= $this->include('layouts/header') ?>

<link rel="stylesheet" href="vendor/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
                        <li class="breadcrumb-item"><a href="#">Manajemen</a></li>
                        <li class="breadcrumb-item active">Data Sekolah</li>
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
                    <a href="<?= base_url('datapengguna/createpengguna'); ?>" class="btn btn-block bg-gradient-primary"><i class="fa fa-plus"></i> Tambah Sekolah</a>
                </h3>

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
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Person</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Sekolah</th>
                                <th>No. Hp</th>
                                <th>Role</th>
                                <th>Keaktifan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($v as $row) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['kode_person']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['jurusan_kode']; ?></td>
                                    <td><?= $row['sekolah']; ?></td>
                                    <td><?= $row['no_hp']; ?></td>
                                     <td> <?php
                                            if ($row['role_id'] == 1) {
                                                echo '<span class="badge badge-success">Superadmin</span> ';
                                            } elseif ($row['role_id'] == 2) {
                                                echo '<span class="badge badge-info">Admin</span>';
                                            } elseif ($row['role_id'] == 3) {
                                                echo '<span class="badge badge-warning">Operator</span>';
                                             } elseif ($row['role_id'] == 4) {
                                                echo '<span class="badge badge-default">Siswa</span>';
                                            } elseif ($row['role_id'] == 6) {
                                                echo '<span class="badge badge-danger">Guru</span>';   
                                            }
                                            ?></td>


                            
                                    <td> <?php
                                            if ($row['is_active'] == 1) {
                                                echo '<span class="badge badge-success">Aktif</span> ';
                                            } else {
                                                echo '<span class="badge badge-danger">Tidak Aktif</span>';
                                            }
                                            ?></td>
                                    <td>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="<?= base_url('datapengguna/detail/' . $row['id_akun']) ?>" class="dropdown-item">Detail</a>
                                                <a href="<?= base_url('datapengguna/edit/' . $row['id_akun']) ?>" class="dropdown-item">Edit</a>

                                                <?php if ($row['is_active'] == 0): ?>
                                                    <a href="<?= base_url('datapengguna/on/' . $row['id_akun']) ?>" class="dropdown-item">Aktif</a>
                                                <?php else: ?>
                                                    <a href="<?= base_url('datapengguna/off/' . $row['id_akun']) ?>" class="dropdown-item">Tidak Aktif</a>
                                                <?php endif; ?>
                                                 <a href="<?= base_url('datapengguna/resetpassword/' . $row['id_akun']) ?>" class="dropdown-item">Reset Password</a>
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
<script src="vendor/backend/plugins/datatables/jquery.dataTables.js"></script>
<script src="vendor/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "language": {
                "sSearch": "Cari"
            }
        });
    });
</script>

<?= $this->include('layouts/footer') ?>