<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3>UPLOAD BUKTI PEMBAYARAN TAHAP <?= $tahap ?></h3><br>
                <?php if(session()->getFlashdata('error')) : ?>
                <div class="alert alert-primary" role="alert">
                    <h4><?= session()->getFlashdata('error') ?></h4>
                </div>
                <?php endif ?>
                <?php if($tahap === '1') : ?>
                <form action="/sd/bukti_pembayaran_tahap_1/<?= $sd->slug_nama_lengkap ?>" method="post"
                    enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label required">Tanggal Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_bayar_1" placeholder=""
                                class="form-control <?= ($validation->hasError('tanggal_bayar_1')) ? 'is-invalid' : '' ?>"
                                value="<?= old('tanggal_bayar_1') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_bayar_1') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label required">Jumlah Pembayaran</label>
                        <small class="col-sm-1 col-form-label">Rp.</small>
                        <div class="col-sm-8">
                            <input type="text" name="jumlah_bayar_1" placeholder=""
                                class="form-control <?= ($validation->hasError('jumlah_bayar_1')) ? 'is-invalid' : '' ?>"
                                value="<?= old('jumlah_bayar_1') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah_bayar_1') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label required">Bukti Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="file" name="bukti_bayar_1" id="pas_foto"
                                class="form-control <?= ($validation->hasError('bukti_bayar_1')) ? 'is-invalid' : '' ?>"
                                value="<?= old('bukti_bayar_1') ?>" aria-describedby="bukti_bayar_1" accept="image/*"
                                onchange="foto_bukti_bayar(event)">
                            <div class="invalid-feedback">
                                <?= $validation->getError('bukti_bayar_1') ?>
                            </div>
                            <hr>
                            <img src="<?= base_url() ?>/back/images/1.png" id="output4" alt="Bukti Pembayaran"
                                class="img-preview" style="max-width: 250px;" />
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-lg btn-block btn-primary">
                                            Simpan Data
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endif ?>
                <?php if($tahap === '2') : ?>
                <form action="/sd/bukti_pembayaran_tahap_2/<?= $sd->slug_nama_lengkap ?>" method="post"
                    enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label required">Tanggal Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_bayar_2" placeholder=""
                                class="form-control <?= ($validation->hasError('tanggal_bayar_2')) ? 'is-invalid' : '' ?>"
                                value="<?= old('tanggal_bayar_2') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_bayar_2') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label required">Jumlah Pembayaran</label>
                        <small class="col-sm-1 col-form-label">Rp.</small>
                        <div class="col-sm-8">
                            <input type="text" name="jumlah_bayar_2" placeholder=""
                                class="form-control <?= ($validation->hasError('jumlah_bayar_2')) ? 'is-invalid' : '' ?>"
                                value="<?= old('jumlah_bayar_2') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah_bayar_2') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label required">Bukti Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="file" name="bukti_bayar_2" id="pas_foto"
                                class="form-control <?= ($validation->hasError('bukti_bayar_2')) ? 'is-invalid' : '' ?>"
                                value="<?= old('bukti_bayar_2') ?>" aria-describedby="bukti_bayar_2" accept="image/*"
                                onchange="foto_bukti_bayar(event)">
                            <div class="invalid-feedback">
                                <?= $validation->getError('bukti_bayar_2') ?>
                            </div>
                            <hr>
                            <img src="<?= base_url() ?>/back/images/1.png" id="output4" alt="Bukti Pembayaran"
                                class="img-preview" style="max-width: 250px;" />
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-lg btn-block btn-primary">
                                            Simpan Data
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endif ?>
                <?php if($tahap === '3') : ?>
                <form action="/sd/bukti_pembayaran_tahap_3/<?= $sd->slug_nama_lengkap ?>" method="post"
                    enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label required">Tanggal Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_bayar_3" placeholder=""
                                class="form-control <?= ($validation->hasError('tanggal_bayar_3')) ? 'is-invalid' : '' ?>"
                                value="<?= old('tanggal_bayar_3') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_bayar_3') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label required">Jumlah Pembayaran</label>
                        <small class="col-sm-1 col-form-label">Rp.</small>
                        <div class="col-sm-8">
                            <input type="text" name="jumlah_bayar_3" placeholder=""
                                class="form-control <?= ($validation->hasError('jumlah_bayar_3')) ? 'is-invalid' : '' ?>"
                                value="<?= old('jumlah_bayar_3') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah_bayar_3') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label required">Bukti Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="file" name="bukti_bayar_3" id="pas_foto"
                                class="form-control <?= ($validation->hasError('bukti_bayar_3')) ? 'is-invalid' : '' ?>"
                                value="<?= old('bukti_bayar_3') ?>" aria-describedby="bukti_bayar_3" accept="image/*"
                                onchange="foto_bukti_bayar(event)">
                            <div class="invalid-feedback">
                                <?= $validation->getError('bukti_bayar_3') ?>
                            </div>
                            <hr>
                            <img src="<?= base_url() ?>/back/images/1.png" id="output4" alt="Bukti Pembayaran"
                                class="img-preview" style="max-width: 250px;" />
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-lg btn-block btn-primary">
                                            Simpan Data
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endif ?>
                <?php if($tahap === '4') : ?>
                <form action="/sd/bukti_pembayaran_tahap_4/<?= $sd->slug_nama_lengkap ?>" method="post"
                    enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label required">Tanggal Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_bayar_4" placeholder=""
                                class="form-control <?= ($validation->hasError('tanggal_bayar_4')) ? 'is-invalid' : '' ?>"
                                value="<?= old('tanggal_bayar_4') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_bayar_4') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label required">Jumlah Pembayaran</label>
                        <small class="col-sm-1 col-form-label">Rp.</small>
                        <div class="col-sm-8">
                            <input type="text" name="jumlah_bayar_4" placeholder=""
                                class="form-control <?= ($validation->hasError('jumlah_bayar_4')) ? 'is-invalid' : '' ?>"
                                value="<?= old('jumlah_bayar_4') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah_bayar_4') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label required">Bukti Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="file" name="bukti_bayar_4" id="pas_foto"
                                class="form-control <?= ($validation->hasError('bukti_bayar_4')) ? 'is-invalid' : '' ?>"
                                value="<?= old('bukti_bayar_4') ?>" aria-describedby="bukti_bayar_4" accept="image/*"
                                onchange="foto_bukti_bayar(event)">
                            <div class="invalid-feedback">
                                <?= $validation->getError('bukti_bayar_4') ?>
                            </div>
                            <hr>
                            <img src="<?= base_url() ?>/back/images/1.png" id="output4" alt="Bukti Pembayaran"
                                class="img-preview" style="max-width: 250px;" />
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-lg btn-block btn-primary">
                                            Simpan Data
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>