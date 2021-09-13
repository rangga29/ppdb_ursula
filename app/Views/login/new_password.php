<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>/back/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/login/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/login/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/login/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/login/css/iofrm-theme8.css">
</head>

<body>
    <div class="form-body" class="container-fluid">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3><?= $judul1 ?></h3>
                    <p><?= $deskripsi ?></p>
                    <img src="<?= base_url() ?>/login/images/logo.svg" alt="" style="max-width: 500px;">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content <?= $bg_color ?>">
                    <div class="form-items">
                        <h3><?= $judul2 ?></h3>
                        <hr>
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                        <?php endif; ?>
                        <p><strong>PASSWORD BARU</strong></p>
                        <form method="post" action="/<?= $unit ?>/new_password/<?= $no_registrasi ?>">
                            <?= csrf_field(); ?>
                            <input class="form-control" type="password" name="new_password" placeholder="Password Baru"
                                required>
                            <input class="form-control" type="password" name="confirm_password"
                                placeholder="Ulang Password Baru" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Confirm Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?= base_url() ?>/login/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/login/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/login/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/login/js/main.js"></script>
</body>

</html>