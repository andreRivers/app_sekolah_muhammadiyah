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

                <form class="form-horizontal" action="<?= base_url('datasekolah/editGo')?>" enctype="multipart/form-data" autocomplete="off" method="post">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                <input hidden readonly class="form-control" type="text" id="id_sekolah" name="id_sekolah" value="<?= $sekolah['id_sekolah']; ?>" required>
                                    <tr>
                                        <td>KODE SEKOLAH <span style="color:red;">*</span> </td>
                                        <td><input class="form-control" type="text" id="kode_sekolah" name="kode_sekolah" value="<?= $sekolah['kode_sekolah']; ?>" required> </td>
                                    </tr>
                                    <tr>
                                        <td>NAMA SEKOLAH <span style="color:red;">*</span> </td>
                                        <td><input class="form-control" type="text" id="sekolah" name="sekolah" value="<?= $sekolah['sekolah']; ?>" required> </td>
                                    </tr>

                                    <tr>
                                        <td>NO. HANDPHONE <span style="color:red;">*</span> </td>
                                        <td><input class="form-control" type="number" id="telp_sekolah" name="telp_sekolah" value="<?= $sekolah['telp_sekolah']; ?>" required> </td>
                                    </tr>

                                    <tr>
                                        <td>BENTUK SEKOLAH <span style="color:red;">*</span> </td>
                                        <td>
                                            <select id="bentuk_pendidikan" name="bentuk_pendidikan" class="form-control selectx" required>
                                                 <option disabled value="">Pilih</option>
                                                 <option value="KB" <?= ($sekolah['bentuk_pendidikan'] == 'KB') ? 'selected' : '' ?>>Kelompok Bermain (KB)</option>
                                                 <option value="TK" <?= ($sekolah['bentuk_pendidikan'] == 'TK') ? 'selected' : '' ?>>TAMAN KANAK-KANAK (TK)</option>
                                                 <option value="TPA" <?= ($sekolah['bentuk_pendidikan'] == 'TPA') ? 'selected' : '' ?>>TPA (TEMPAT PENITIPAN ANAK)</option>
                                                 <option value="SD" <?= ($sekolah['bentuk_pendidikan'] == 'SD') ? 'selected' : '' ?>>SEKOLAH DASAR (SD)</option>
                                                 <option value="SMP" <?= ($sekolah['bentuk_pendidikan'] == 'SMP') ? 'selected' : '' ?>>SEKOLAH MENENGAH PERTAMA</option>
                                                 <option value="SMA" <?= ($sekolah['bentuk_pendidikan'] == 'SMA') ? 'selected' : '' ?>>SEKOLAH MENENGAH ATAS</option>
                                                 <option value="SMK" <?= ($sekolah['bentuk_pendidikan'] == 'SMK') ? 'selected' : '' ?>>SEKOLAH MENENGAH KEJURUAN</option>
                                           </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>KEAKTIFAN <span style="color:red;">*</span> </td>
                                        <td>
                                           <select id="active_sekolah" name="active_sekolah" class="form-control selectx" required>
                                            <option disabled value="">Pilih</option>
                                            <option value="1" <?= ($sekolah['active_sekolah'] == '1') ? 'selected' : '' ?>>Active</option>
                                            <option value="2" <?= ($sekolah['active_sekolah'] == '2') ? 'selected' : '' ?>>Nonactive</option>
                                        </select>
                                        </td>
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
<script src="<?= base_url() ?>/vendor/js/rupiah.js"></script>
<script src="<?= base_url() ?>/vendor/js/duit.js"></script>
<script>
    $(document).ready(function() {
        $('.selectx').select2({
            placeholder: "Pilih..",
            allowClear: true,
            theme: 'bootstrap4'
        });
    });

    $(document).ready(function() {
        $('.selecty').select2({
            placeholder: "Pilih..",
            allowClear: true,
            theme: 'bootstrap4'
        });
    });

    $(document).ready(function() {
        $('.selectz').select2({
            placeholder: "Pilih..",
            allowClear: true,
            theme: 'bootstrap4'
        });
    });

    $('#id_user').change(function() {
        var id_user = $(this).val();
        $.ajax({
            url: "<?= site_url('get-user'); ?>",
            method: "POST",
            data: {
                id_user: id_user
            },
            async: true,
            dataType: 'json',
            success: function(data) {

                var jbt = '';

                var i;
                for (i = 0; i < data.length; i++) {
                    jbt = data[i].jabatan;
                }
                document.getElementById("jabatan").value = jbt;
            }
        });
        return false;
    });


    $(document).ready(function() {

        $('#id_kampus').change(function() {
            var id_kampus = $(this).val();
            $.ajax({
                url: "<?php echo site_url('get-sub-tempat'); ?>",
                method: "POST",
                data: {
                    id_kampus: id_kampus
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_gedung + '>' + data[i].gedung + '</option>';
                    }
                    $('#id_gedung').html(html);

                }
            });
            return false;
        });

        $('.selectw').select2({
            placeholder: "Pilih..",
            allowClear: true,
            theme: 'bootstrap4'
        });

    });



    $(document).ready(function() {

        $('#id_gedung').change(function() {
            var id_gedung = $(this).val();
            $.ajax({
                url: "<?php echo site_url('get-sub-gedung'); ?>",
                method: "POST",
                data: {
                    id_gedung: id_gedung
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_lantai + '>' + data[i].lantai + '</option>';
                    }
                    $('#id_lantai').html(html);

                }
            });
            return false;
        });

        $('.selectw').select2({
            placeholder: "Pilih..",
            allowClear: true,
            theme: 'bootstrap4'
        });

    });

    $(document).ready(function() {

        $('#id_lantai').change(function() {
            var id_lantai = $(this).val();
            $.ajax({
                url: "<?php echo site_url('get-sub-ruangan'); ?>",
                method: "POST",
                data: {
                    id_lantai: id_lantai
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_ruangan + '>' + data[i].ruangan + '</option>';
                    }
                    $('#id_ruangan').html(html);

                }
            });
            return false;
        });

        $('.selecta').select2({
            placeholder: "Pilih..",
            allowClear: true,
            theme: 'bootstrap4'
        });

    });
</script>

<?= $this->include('layouts/footer') ?>