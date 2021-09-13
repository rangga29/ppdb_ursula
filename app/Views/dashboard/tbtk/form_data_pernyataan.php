<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3>FORM PERNYATAAN ORANG TUA / WALI</h3>
                <?php if(session()->getFlashdata('error')) : ?>
                <div class="alert alert-primary" role="alert">
                    <h4><?= session()->getFlashdata('error') ?></h4>
                </div>
                <?php endif ?>
                <form action="/tbtk/tambah_data_pernyataan/<?= $tbtk->slug_nama_lengkap ?>" method="post"
                    enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="text-center">SURAT PERNYATAAN ORANG TUA / WALI</h3><br>
                                    <h5>Saya yang bertanda tangan dibawah ini,</h5><br>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="nama_lengkap" name="nama_lengkap"
                                                class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('nama_lengkap') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_lengkap') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alamat Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="alamat" name="alamat"
                                                class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('alamat') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('alamat') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">No.Telp/Handphone</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="handphone" name="handphone"
                                                class="form-control <?= ($validation->hasError('handphone')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('handphone') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('handphone') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h5>adalah orangtua/wali dari calon peserta didik </h5><br>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Peserta Didik</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama_lengkap" value="<?= $tbtk->nama_lengkap ?>"
                                                disabled class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tempat Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ttl"
                                                value="<?= $tbtk->kota_lahir ?>, <?= $tanggal_lahir ?>" disabled
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">No. Registrasi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="no_registrasi" value="<?= $tbtk->no_registrasi ?>"
                                                disabled class="form-control">
                                        </div>
                                    </div><br>
                                    <?php 
                                    if($tbtk->pilihan_tingkat === '1')
                                    {
                                        $sub_unit = 'TB';
                                    } else {
                                        $sub_unit = 'TK';
                                    }
                                    ?>
                                    <h5>Dengan ini menyatakan bahwa jika anak kami diterima di <?= $sub_unit ?> KATOLIK
                                        SANTA URSULA BANDUNG, maka kami sebagai orang tua/wali TIDAK BERKEBERATAN untuk
                                        MENERIMA segala peraturan yang berlaku, selama anak kami menjalankan masa
                                        pendidikannya di <?= $sub_unit ?> KATOLIK SANTA URSULA BANDUNG.
                                    </h5>
                                    <br>
                                    <h5>Pernyataan tersebut adalah :</h5>
                                    <h5>1. MENYETUJUI SEPENUHNYA ketentuan-ketentuan yang berlaku dan berkaitan dengan
                                        sistem pembelajaran dan penilaian di <?= $sub_unit ?> KATOLIK SANTA URSULA
                                        BANDUNG;</h5>
                                    <h5>2. HADIR SETIAP MENDAPAT UNDANGAN dari pihak sekolah;</h5>
                                    <h5>3. Jika terjadi hal yang tidak menyenangkan atau tidak berkenan, masalah
                                        diselesaikan secara KEKELUARGAAN;</h5>
                                    <h5>4. Apabila di kemudian hari anak kami ditemukan MELAKUKAN TINDAKAN yang tidak
                                        sesuai dengan visi misi sekolah, kami bersedia MENERIMA pembatalan penerimaan
                                        calon peserta didik/dikeluarkan dari <?= $sub_unit ?> KATOLIK SANTA URSULA
                                        BANDUNG.
                                    </h5>
                                    <br>
                                    <h5>Demikian pernyataan ini kami terima dan kami buat atas kesadaran sendiri demi
                                        kelancaran pendidikan putra/putri kami di lembaga pendidikan <?= $sub_unit ?>
                                        KATOLIK SANTA URSULA BANDUNG dan tanpa paksaan orang lain.
                                    </h5>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tanda Tangan</label>
                                        <div class="col-sm-9">
                                            <div id="sig"></div>
                                            <br />
                                            <button id="clear">Clear Signature</button>
                                            <textarea id="signature64" name="tanda_tangan"
                                                style="display: none"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>