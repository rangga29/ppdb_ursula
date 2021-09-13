<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Website PPDB Online Kampus Santa Ursula Bandung">
    <meta name="author" content="IT YPB">
    <title><?= $title ?></title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="<?= base_url() ?>/front/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
        href="<?= base_url() ?>/front/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="<?= base_url() ?>/front/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="<?= base_url() ?>/front/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="<?= base_url() ?>/front/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?= base_url() ?>/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/front/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>/front/css/vendors.css" rel="stylesheet">
    <link href="<?= base_url() ?>/front/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="<?= base_url() ?>/front/css/custom.css" rel="stylesheet">

</head>

<body>
    <div id="page">
        <?= $this->include('home/layouts/header') ?>

        <?= $this->renderSection('content') ?>

        <?= $this->include('home/layouts/footer') ?>
    </div>

    <!-- COMMON SCRIPTS -->
    <script src="<?= base_url() ?>/front/js/jquery-2.2.4.min.js"></script>
    <script src="<?= base_url() ?>/front/js/common_scripts.js"></script>
    <script src="<?= base_url() ?>/front/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/front/js/main.js"></script>
</body>

<!-- Modal SD -->
<div class="modal fade" id="modal_sd" tabindex="-1" aria-labelledby="modal_sd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_sd">Pilihan Jalur Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="/sd_registrasi/internal"
                            class="btn btn-block btn-outline-success waves-effect waves-light">Internal (Dari TK Santa
                            Ursula)</a>
                        <a href="/sd_registrasi/external"
                            class="btn btn-block btn-outline-primary waves-effect waves-light">Eksternal</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal SMP -->
<div class="modal fade" id="modal_smp" tabindex="-1" aria-labelledby="modal_smp" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_smp">Pilihan Jalur Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="/smp_registrasi/internal"
                            class="btn btn-block btn-outline-success waves-effect waves-light">Internal (Dari SD Santa
                            Ursula)</a>
                        <a href="/smp_registrasi/external"
                            class="btn btn-block btn-outline-primary waves-effect waves-light">Eksternal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>