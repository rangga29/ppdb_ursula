<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3>FORM PERNYATAAN PELUNASAN KEUANGAN</h3>
                <?php if(session()->getFlashdata('error')) : ?>
                <div class="alert alert-primary" role="alert">
                    <h4><?= session()->getFlashdata('error') ?></h4>
                </div>
                <?php endif ?>
                <form action="/smp/tambah_data_keuangan/<?= $smp->slug_nama_lengkap ?>" method="post"
                    enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="text-center">SURAT PERNYATAAN</h3><br>
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
                                    <h5>adalah orangtua dari <b>calon peserta didik</b></h5><br>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Peserta Didik</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama_lengkap" value="<?= $smp->nama_lengkap ?>"
                                                disabled class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">No. Registrasi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="no_registrasi" value="<?= $smp->no_registrasi ?>"
                                                disabled class="form-control">
                                        </div>
                                    </div>
                                    <?php
                                    if ($beasiswa) {
                                        $pengurangan_uang_pangkal = $beasiswa->uang_pangkal;
                                        $pengurangan_uang_sekolah = $beasiswa->uang_sekolah;
                                        $uang_pangkal = 10000000 - $pengurangan_uang_pangkal;
                                        $uang_sekolah = 800000 - $pengurangan_uang_sekolah;
                                    } else {
                                        $uang_pangkal = 10000000;
                                        $uang_sekolah = 800000;
                                    }
                                    ?>
                                    <br>
                                    <h5>yang akan menempuh pendidikan di <b>SMP Santa Ursula</b> Tahun
                                        Pelajaran 2022/2023, maka saya bersedia mendukung dan menyetujui pembayaran :
                                    </h5>
                                    <h5>
                                        <b>1. Dana Pendidikan sebesar Rp.
                                            <?= number_format($uang_pangkal, 0, '', '.') ?>,-
                                        </b>
                                    </h5>
                                    <h5><b>2. Uang Sekolah (SPP)</b> selama 12 bulan mulai dibayar dari bulan
                                        <b>Juli 2022</b> tiap bulan sebesar
                                        <b>Rp <?= number_format($uang_sekolah, 0, '', '.') ?>,-</b></h5>
                                    <br>
                                    <h5><u><b>KETERANGAN : </b></u></h5>
                                    <h5><b>Jumlah Dana tersebut di atas belum termasuk :</b></h5>
                                    <h5>1. Biaya Seragam</h5>
                                    <h5>2. Biaya Paket</h5>
                                    <h5>3. Biaya Kegiatan 1 Tahun Pelajaran</h5>
                                    <br>
                                    <h5>Dana tersebut akan saya bayarkan setiap tanggal :</h5><br>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tanggal Pembayaran</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="tanggal_pembayaran" name="tanggal_pembayaran"
                                                class="form-control <?= ($validation->hasError('tanggal_pembayaran')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('tanggal_pembayaran') ?>"
                                                placeholder="[Pilih Antara Tanggal 1 Sampai 30]">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tanggal_pembayaran') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>yang dibagi menjadi : </h5><br>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tahap Pembayaran</label>
                                        <div class="col-sm-6">
                                            <select name="tahap_pembayaran" id="tahap_pembayaran" class="custom-select"
                                                onclick="tahapPembayaran()" required="">]
                                                <option value=""
                                                    <?= (old('tahap_pembayaran') === '' ? 'selected' : '') ?>>
                                                </option>
                                                <option value="1"
                                                    <?= (old('tahap_pembayaran') === '1' ? 'selected' : '') ?>>
                                                    1
                                                </option>
                                                <option value="2"
                                                    <?= (old('tahap_pembayaran') === '2' ? 'selected' : '') ?>>
                                                    2
                                                </option>
                                                <option value="3"
                                                    <?= (old('tahap_pembayaran') === '3' ? 'selected' : '') ?>>
                                                    3
                                                </option>
                                                <option value="4"
                                                    <?= (old('tahap_pembayaran') === '4' ? 'selected' : '') ?>>
                                                    4
                                                </option>
                                            </select>
                                        </div>
                                        <label class="col-sm-3 col-form-label">Tahap</label>
                                    </div>
                                    <div class="form-group row" id="tahap_1" style="display: none;">
                                        <label class="col-sm-3 col-form-label">Tahap 1</label>
                                        <div class="col-sm-5">
                                            <div class="row">
                                                <small class="col-sm-2 col-form-label">Rp.</small>
                                                <div class="col-sm-10">
                                                    <input type="text" id="uang_tahap_1" name="uang_tahap_1"
                                                        class="form-control <?= ($validation->hasError('uang_tahap_1')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('uang_tahap_1')) ? old('uang_tahap_1') : 0 ?>"
                                                        placeholder="">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('uang_tahap_1') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="col-sm-4 col-form-label">
                                            [Pembayaran Bulan <?= $bulan_tahap_1 ?>]
                                        </small>
                                    </div>
                                    <div class="form-group row" id="tahap_2" style="display: none;">
                                        <label class="col-sm-3 col-form-label">Tahap 2</label>
                                        <div class="col-sm-5">
                                            <div class="row">
                                                <small class="col-sm-2 col-form-label">Rp.</small>
                                                <div class="col-sm-10">
                                                    <input type="text" id="uang_tahap_2" name="uang_tahap_2"
                                                        class="form-control <?= ($validation->hasError('uang_tahap_2')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('uang_tahap_2')) ? old('uang_tahap_2') : 0 ?>"
                                                        placeholder="">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('uang_tahap_2') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="col-sm-4 col-form-label">
                                            [Pembayaran Bulan <?= $bulan_tahap_2 ?>]
                                        </small>
                                    </div>
                                    <div class="form-group row" id="tahap_3" style="display: none;">
                                        <label class="col-sm-3 col-form-label">Tahap 3</label>
                                        <div class="col-sm-5">
                                            <div class="row">
                                                <small class="col-sm-2 col-form-label">Rp.</small>
                                                <div class="col-sm-10">
                                                    <input type="text" id="uang_tahap_3" name="uang_tahap_3"
                                                        class="form-control <?= ($validation->hasError('uang_tahap_3')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('uang_tahap_3')) ? old('uang_tahap_3') : 0 ?>"
                                                        placeholder="">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('uang_tahap_3') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="col-sm-4 col-form-label">
                                            [Pembayaran Bulan <?= $bulan_tahap_3 ?>]
                                        </small>
                                    </div>
                                    <div class="form-group row" id="tahap_4" style="display: none;">
                                        <label class="col-sm-3 col-form-label">Tahap 4</label>
                                        <div class="col-sm-5">
                                            <div class="row">
                                                <small class="col-sm-2 col-form-label">Rp.</small>
                                                <div class="col-sm-10">
                                                    <input type="text" id="uang_tahap_4" name="uang_tahap_4"
                                                        class="form-control <?= ($validation->hasError('uang_tahap_4')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('uang_tahap_4')) ? old('uang_tahap_4') : 0 ?>"
                                                        placeholder="">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('uang_tahap_4') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="col-sm-4 col-form-label">
                                            [Pembayaran Bulan <?= $bulan_tahap_4 ?>]
                                        </small>
                                    </div>
                                    <h5><u><b>CATATAN : </b></u></h5>
                                    <h5>
                                        <b>
                                            Sebisa mungkin pembayaran dilakukan pada tanggal yang sama di tiap tahapnya.
                                        </b>
                                    </h5><br>
                                    <h5>Saya akan melakukan pembayaran pada tanggal sesuai dengan yang telah saya
                                        sepakati di atas. Demikian pernyataan ini saya buat dengan sesungguhnya.</h5>
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
                                    <br>
                                    <h5><u><b>PERHATIAN : </b></u></h5>
                                    <h5>1. Bila Anda mengundurkan diri, semua pembayaran yang telah dilakukan tidak
                                        dapat ditarik kembali dengan alasan apa pun.</h5>
                                    <h5>2. Segala bentuk pertanyaan dapat menghubungi kontak Panitia PPDB SMP Santa
                                        Ursula yang disediakan di halaman website.</h5>
                                    <h5>3. Pembayaran dilakukan dengan mentransfer ke Virtual Account yang didapatkan
                                        saat pendaftaran yaitu : <b><?= $smp->no_virtual ?></b>.</h5>
                                    <h5>4. Dilarang melakukan pembayaran dengan mentransfer ke Rekening Yayasan Prasama
                                        Bhakti.</h5>
                                    <h5>5. Setelah melakukan pembayaran, bukti transfer diupload pada Halaman Dashboard
                                        Calon Peserta Didik -> Data Calon Peserta Didik -> Data Pembayaran.</h5>
                                    <br>
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