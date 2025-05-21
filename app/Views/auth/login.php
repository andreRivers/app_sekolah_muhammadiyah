<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title; ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Bantuan dan insentif publikasi dosen Universitas Muhammadiyah Sumatera Utara">
    <meta name="keywords" content="u">
    <meta name="author" content="Tri Andre Anu">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" type="image/icon" href="vendor/img/logo.png">

    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="static/css/animate.css" rel="stylesheet">
    <link href="static/css/style.css" rel="stylesheet">
    <link href="static/css/login.css" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="middle-box animated fadeInDown">
        <div class="abs-bg"></div>

        <div class="content loginscreen">
            <div class="text-center">
                <div>
                    <img src="images/kop.png" class="logo" />
                </div>
                <h3>SIM SEKOLAH MU &copy; <?= date('Y'); ?></h3>
                <p style="font-size: small;"><b>PANGAKALAN DATA SEKOLAH MUHAMMADIYAH </b></p>
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
            </div>

            <form method="post" action="/login" class="m-t" role="form">
                <div class="form-group ">
                    <label class="control-label">Email</label>
                    <input type="text" name="email" value="<?= old('email'); ?>" class="form-control" placeholder="Tulis email anda..." required>
                </div>
                <div class="form-group  ">
                    <label class="control-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Tulis password anda..." required>
                </div>

                <button type="submit" class="btn btn-success block full-width m-b noborder-radius"><b>LOGIN</b></button>

                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <div style="text-align: left;">
                                    <label class="control-label">
                                        <h5><a href="<?= base_url('forgotPassword'); ?>">Lupa password?</a></h5>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div style="text-align: right;">
                                    <label class="control-label">
                                        <h5>Belum memiliki akun?<a href="#"> Daftar di sini.</a></h5>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="text-align: left;">
                                    <h4><a href="<?= base_url('panduan_new_revisi1.pdf') ?>" target="_blank"><i class="fa fa-download"></i> Unduh Panduan</a></h4>
                            </td>
        </div>
        <td>
            <div style="text-align: right;">
                <h4>
                    <a href="<?= base_url('login'); ?>" rel="noopener noreferrer"> <i class="fa fa-phone"></i> Help me!</a>
                </h4>

            </div>
        </td>
        </tr>
        </tbody>
        </table>
        </form>

        <p class="m-t text-center">
            <small>
                <a href="https://umsu.ac.id" target="_blank"> <b>PDM MUHAMMADIYAH KOTA MEDAN</b></a>
            </small>
        </p>
    </div>

    <!-- Mainly scripts -->
    <script src="static/js/jquery-2.1.1.js"></script>
    <script src="static/js/bootstrap.min.js"></script>

</html>