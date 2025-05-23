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
                        <li class="breadcrumb-item active">Pegawai</li>
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
                <div class="d-grid gap-2 d-md-block">
                    <a href="/admin_pegawai/create"><button class="btn btn-primary" type="button"><i class="fa fa-plus"></i> Tambah</button></a>
                    <button class="btn btn-info" type="button"><i class="fa fa-upload"></i> Upload Pegawai</button>
                    <button class="btn btn-success" type="button"><i class="fa fa-print"></i> Cetak</button>
                </div>

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
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Unit Sekolah</th>
                                <th>Jabatan</th>
                                <th>Status Kepegawaian</th>
                                <th>No.Telepon/HP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <a href="#"><button class="btn btn-warning" type="button"><i class="fa fa-edit"></i></button></a>
                                        <button class="btn btn-success" type="button"><i class="fa fa-print"></i></button>
                                        <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <!-- <button class="btn btn-block bg-gradient-warning">
                                        <i class="fa fa-edit"></i> </button>
                                    <button class="btn btn-block bg-gradient-success">
                                        <i class="fa fa-print"></i> </button> -->
                                </td>
                            </tr>


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