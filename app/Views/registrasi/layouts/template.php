<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?= base_url() ?>/back/images/favicon.ico">

    <link href="<?= base_url() ?>/back/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/back/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/back/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/back/css/style.css" rel="stylesheet" type="text/css" />

</head>

<body class="account-body accountbg">
    <?= $this->renderSection('content') ?>



    <!-- jQuery  -->
    <script src="<?= base_url() ?>/back/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/back/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/back/js/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>/back/js/waves.min.js"></script>
    <script src="<?= base_url() ?>/back/js/jquery.slimscroll.min.js"></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="<?= base_url() ?>/back/js/pdfViewer.js"></script>

    <script>
        var foto_bukti_pembayaran = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script>
        $('#customSwitchSuccess').change(function () {
            $('#sendNewSms').prop("disabled", !this.checked);
        }).change()
    </script>

    <script type="text/javascript">
        $(window).on('load', function () {
            $('#myModal').modal('show');
        });
    </script>

    <!-- App js -->
    <script src="<?= base_url() ?>/back/js/app.js"></script>

</body>

<?php if($modal === 'modal_true') : ?>
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php if($unit === 'tbtk') : ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/front/img/tbtk.jpg" alt="" style="max-width: 100%;">
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php if($unit === 'sd_internal') : ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/front/img/sd_internal.jpg" alt="" style="max-width: 100%;">
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php if($unit === 'sd_external') : ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/front/img/sd_external.jpg" alt="" style="max-width: 100%;">
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php if($unit === 'smp_internal') : ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/front/img/smp_internal.jpg" alt="" style="max-width: 100%;">
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php if($unit === 'smp_external') : ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/front/img/smp_external.jpg" alt="" style="max-width: 100%;">
                    </div>
                </div>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>
<?php endif ?>

</html>