<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?= base_url() ?>/back/images/favicon.ico">

    <link href="<?= base_url() ?>/back/plugins/dropify/css/dropify.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/back/plugins/filter/magnific-popup.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>/back/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/back/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/back/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/back/css/jquery.signature.css" rel="stylesheet" type="text/css" />

    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
        rel="stylesheet">

    <link href="<?= base_url() ?>/back/css/style.css" rel="stylesheet" type="text/css" />

    <style>
        .kbw-signature {
            width: 400px;
            height: 200px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }
    </style>

</head>

<body>
    <?= $this->include('dashboard/layouts/topbar') ?>

    <div class="page-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">SELAMAT DATANG <b><?= session()->get('nama_lengkap') ?></b></h4>
                        </div>
                        <?= $this->renderSection('content') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>/back/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/back/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/back/js/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>/back/js/waves.min.js"></script>
    <script src="<?= base_url() ?>/back/js/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url() ?>/back/plugins/dropify/js/dropify.min.js"></script>
    <script src="<?= base_url() ?>/back/pages/jquery.profile.init.js"></script>
    <script src="<?= base_url() ?>/back/plugins/filter/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>/back/plugins/filter/masonry.pkgd.min.js"></script>
    <script src="<?= base_url() ?>/back/plugins/filter/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>/back/pages/jquery.gallery.inity.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>/back/js/jquery.signature.min.js"></script>
    <script src="<?= base_url() ?>/back/js/jquery.ui.touch-punch.min.js"></script>

    <script src="<?= base_url() ?>/back/js/app.js"></script>

    <script type='text/javascript'>
        function foto_pas_foto(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output1');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function foto_scan_kk(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output2');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function foto_scan_ak(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output3');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function foto_bukti_bayar(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output4');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function tahapPembayaran() {
            if (document.getElementById('tahap_pembayaran').value == '1') {
                document.getElementById('tahap_1').style.display = '';
                document.getElementById('tahap_2').style.display = 'none';
                document.getElementById('tahap_3').style.display = 'none';
                document.getElementById('tahap_4').style.display = 'none';
            } else if (document.getElementById('tahap_pembayaran').value == '2') {
                document.getElementById('tahap_1').style.display = '';
                document.getElementById('tahap_2').style.display = '';
                document.getElementById('tahap_3').style.display = 'none';
                document.getElementById('tahap_4').style.display = 'none';
            } else if (document.getElementById('tahap_pembayaran').value == '3') {
                document.getElementById('tahap_1').style.display = '';
                document.getElementById('tahap_2').style.display = '';
                document.getElementById('tahap_3').style.display = '';
                document.getElementById('tahap_4').style.display = 'none';
            } else if (document.getElementById('tahap_pembayaran').value == '4') {
                document.getElementById('tahap_1').style.display = '';
                document.getElementById('tahap_2').style.display = '';
                document.getElementById('tahap_3').style.display = '';
                document.getElementById('tahap_4').style.display = '';
            } else {
                document.getElementById('tahap_1').style.display = 'none';
                document.getElementById('tahap_2').style.display = 'none';
                document.getElementById('tahap_3').style.display = 'none';
                document.getElementById('tahap_4').style.display = 'none';
            }
        }

        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function (e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>
</body>

</html>