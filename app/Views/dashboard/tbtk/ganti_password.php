<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4>Ganti Password</h4>
                <?php if(session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
                <?php endif ?>
                <?php if(session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
                <?php endif ?>
                <form action="/tbtk/change_password/<?= $tbtk->id ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="slug_nama_lengkap" value="<?= $tbtk->slug_nama_lengkap ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-4 col-4">
                                            <label class="col-form-label">Password Lama</label>
                                        </div>
                                        <div class="col-lg-8 col-8">
                                            <input type="password" id="old_password" name="old_password"
                                                class="form-control <?= ($validation->hasError('old_password')) ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('old_password') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-4 col-4">
                                            <label class="col-form-label">Password Baru</label>
                                        </div>
                                        <div class="col-lg-8 col-8">
                                            <input type="password" id="new_password" name="new_password"
                                                class="form-control <?= ($validation->hasError('new_password')) ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('new_password') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-4 col-4">
                                            <label class="col-form-label">Ulangi Password Baru</label>
                                        </div>
                                        <div class="col-lg-8 col-8">
                                            <input type="password" id="confirm_password" name="confirm_password"
                                                class="form-control <?= ($validation->hasError('confirm_password')) ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('confirm_password') ?>
                                            </div>
                                        </div>
                                    </div><br>
                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>