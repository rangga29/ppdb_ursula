<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SmpModel;
use App\Models\SmpDapodikModel;
use App\Models\SmpPernyataanModel;
use App\Models\SmpBeasiswaModel;
use App\Models\SmpKeuanganModel;
use App\Models\SmpPembayaranModel;

class Smp extends BaseController
{
    protected $smpModel;
    protected $smpDapodikModel;
    protected $smpPernyataanModel;
    protected $smpBeasiswaModel;
    protected $smpKeuanganModel;
    protected $smpPembayaranModel;

    public function __construct()
    {
        $this->smpModel = new SmpModel();
        $this->smpDapodikModel = new SmpDapodikModel();
        $this->smpPernyataanModel = new SmpPernyataanModel();
        $this->smpBeasiswaModel = new SmpBeasiswaModel();
        $this->smpKeuanganModel = new SmpKeuanganModel();
        $this->smpPembayaranModel = new SmpPembayaranModel();
    }

    public function index()
    {
        return redirect()->to('/smp_login');
    }

    public function data_calon_siswa($slug_nama_lengkap)
    {
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        $smp_id = $smp->id;
        $month = strtotime($smp->created_at);
        if(strftime("%m",$month) <= 8) {
            $bulan_tahap_1 = strftime("%B %Y",strtotime("+1 month", $month));
            $bulan_tahap_2 = strftime("%B %Y",strtotime("+2 month", $month));
            $bulan_tahap_3 = strftime("%B %Y",strtotime("+3 month", $month));
            $bulan_tahap_4 = strftime("%B %Y",strtotime("+4 month", $month));
        } else {
            $bulan_tahap_1 = strftime("%B %Y",$month);
            $bulan_tahap_2 = strftime("%B %Y",strtotime("+1 month", $month));
            $bulan_tahap_3 = strftime("%B %Y",strtotime("+2 month", $month));
            $bulan_tahap_4 = strftime("%B %Y",strtotime("+3 month", $month));
        }
        $data = [
			'title' => 'Data Calon Siswa | PPDB Kampus Santa Ursula 2022-2023',
            'slug_unit' => 'smp',
            'unit' => 'TBTK Santa Ursula',
            'bulan_tahap_1' => $bulan_tahap_1,
            'bulan_tahap_2' => $bulan_tahap_2,
            'bulan_tahap_3' => $bulan_tahap_3,
            'bulan_tahap_4' => $bulan_tahap_4,
            'smp' => $this->smpModel->getSmp($slug_nama_lengkap),
            'dapodik' => $this->smpDapodikModel->getSmp($smp_id),
            'pernyataan' => $this->smpPernyataanModel->getPernyataan($smp_id),
            'beasiswa' => $this->smpBeasiswaModel->getBeasiswa($smp_id),
            'keuangan' => $this->smpKeuanganModel->getKeuangan($smp_id),
            'pembayaran_tahap_1' => $this->smpPembayaranModel->getPembayaranTahap1($smp_id),
            'pembayaran_tahap_2' => $this->smpPembayaranModel->getPembayaranTahap2($smp_id),
            'pembayaran_tahap_3' => $this->smpPembayaranModel->getPembayaranTahap3($smp_id),
            'pembayaran_tahap_4' => $this->smpPembayaranModel->getPembayaranTahap4($smp_id),
		];
		return view('dashboard/smp/data_calon_siswa', $data);
    }

    // PENGGANTIAN PASSWORD

    public function penggantian_password($slug_nama_lengkap)
    {
        $data = [
			'title' => 'Penggantian Password',
            'slug_unit' => 'smp',
            'smp' => $this->smpModel->getSmp($slug_nama_lengkap),
            'validation' => \Config\Services::validation()
		];
		return view('dashboard/smp/ganti_password', $data);
    }

    public function change_password($id)
    {
        if(!$this->validate([
            'old_password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Harus Diisi.',
                    'min_length' => 'Password Minimal 8 Karakter'
                ]
            ],
            'new_password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Harus Diisi.',
                    'min_length' => 'Password Minimal 8 Karakter'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[new_password]',
                'errors' => [
                    'required' => 'Confirm Password Harus Diisi.',
                    'matches' => 'Confirm Password Tidak Sama'
                ]
            ],
        ])) {
            return redirect()->to('/smp/penggantian_password/' . $this->request->getVar('slug_nama_lengkap'))->withInput();
        };

        $old_password = $this->request->getVar('old_password');
        $new_password = $this->request->getVar('new_password');

        $dataUser = $this->smpModel->getSiswaById($id);

        $pass = $dataUser->password;
        if (password_verify($old_password, $pass)) {
            $this->smpModel->save([
                'id' => $id,
                'password' => password_hash($new_password, PASSWORD_BCRYPT),
            ]);
            session()->setFlashdata('pesan', 'Password berhasil diubah.');
            return redirect()->to('/smp/penggantian_password/' . $this->request->getVar('slug_nama_lengkap'))->withInput();
        } else {
            session()->setFlashdata('error', 'Password Lama Salah');
            return redirect()->to('/smp/penggantian_password/' . $this->request->getVar('slug_nama_lengkap'))->withInput();
        }
    }

    // LUPA PASSWORD

    public function forget_password()
    {
        $data = [
			'title' => 'Lupa Password | PPDB Kampus Santa Ursula 2022-2023',
            'unit' => 'smp',
			'slug' => 'smp_login',
			'judul1' => 'PPDB ONLINE 2022-2023 <br><br> LUPA PASSWORD AKUN <br> SMP SANTA URSULA',
			'judul2' => 'PPDB ONLINE 2022-2023 <br> SMP SANTA URSULA',
			'deskripsi' => 'Silahkan masukan nomor registrasi dan alamat email yang digunakan.',
			'bg_color' => 'color3',
            'validation' => \Config\Services::validation()
		];
		return view('login/confirm_data', $data);
    }

    public function confirm_data()
    {
        $no_registrasi = $this->request->getVar('no_registrasi');
        $email = $this->request->getVar('email');

        $dataUser = $this->smpModel->getDataChangePassword($no_registrasi, $email);

        if($dataUser) {
            $data = [
                'title' => 'Lupa Password | PPDB Kampus Santa Ursula 2022-2023',
                'unit' => 'smp',
                'slug' => 'smp_login',
                'judul1' => 'PPDB ONLINE 2022-2023 <br><br> LUPA PASSWORD AKUN <br> SMP SANTA URSULA',
                'judul2' => 'PPDB ONLINE 2022-2023 <br> SMP SANTA URSULA',
                'deskripsi' => 'Silahkan masukan nomor registrasi dan alamat email yang digunakan.',
                'bg_color' => 'color1',
                'no_registrasi' => $no_registrasi
            ];
            return view('/login/new_password', $data);
        } else {
            session()->setFlashdata('error', 'Data Salah atau Tidak Ada');
            return redirect()->to('/smp/forget_password')->withInput();
        }
    }

    public function new_password($no_registrasi)
    {
        if(!$this->validate([
            'new_password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Harus Diisi.',
                    'min_length' => 'Password Minimal 8 Karakter'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[new_password]',
                'errors' => [
                    'required' => 'Confirm Password Harus Diisi.',
                    'matches' => 'Confirm Password Tidak Sama'
                ]
            ],
        ])) {
            return redirect()->to('/smp/confirm_data')->withInput();
        };

        $new_password = $this->request->getVar('new_password');

        $dataUser = $this->smpModel->getSiswaByNoRegistrasi($no_registrasi);
        if ($dataUser) {
            $this->smpModel->save([
                'id' => $dataUser->id,
                'password' => password_hash($new_password, PASSWORD_BCRYPT),
            ]);
            session()->setFlashdata('pesan', 'Password berhasil diubah.');
            return redirect()->to('/smp_login')->withInput();
        } else {
            session()->setFlashdata('error', 'Password tidak berhasil diubah.');
            return redirect()->to('/smp/forget_password')->withInput();
        }
    }

    // DATA PENDAFTARAN

    public function ubah_data_pendaftaran($slug_nama_lengkap)
    {
        $data = [
			'title' => 'Ubah Data Pendaftaran | PPDB Kampus Santa Ursula 2022-2023',
            'slug_unit' => 'smp',
            'smp' => $this->smpModel->getSmp($slug_nama_lengkap),
            'validation' => \Config\Services::validation()
		];
		return view('dashboard/smp/update_pendaftaran', $data);
    }

    public function update_data_pendaftaran($id)
    {
        if(!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Peserta Didik Harus Diisi.',
                ]
            ],
            'kota_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota Kelahiran Harus Diisi.'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Harus Diisi.'
                ]
            ],
            'nama_orangtua' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Orangtua Harus Diisi.'
                ]
            ],
            'no_whatsapp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor Whatsapp Harus Diisi.',
                    'numeric' => 'Nomor Whatsapp Hanya Dapat Berisi Angka'
                ]
            ],
            'kelas4_sem1_indo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai Harus Diisi.'
                ]
            ],
            'kelas4_sem1_mat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai Harus Diisi.'
                ]
            ],
            'kelas4_sem2_indo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai Harus Diisi.'
                ]
            ],
            'kelas4_sem2_mat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai Harus Diisi.'
                ]
            ],
            'kelas5_sem1_indo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai Harus Diisi.'
                ]
            ],
            'kelas5_sem1_mat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai Harus Diisi.'
                ]
            ],
            'kelas5_sem2_indo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai Harus Diisi.'
                ]
            ],
            'kelas5_sem2_mat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai Harus Diisi.'
                ]
            ],
        ])) {
            return redirect()->to('/smp/ubah_data_pendaftaran/'.$this->request->getVar('slug_nama_lengkap'))->withInput();
        };

        $asalSekolah = $this->smpModel->getSiswaById($id)->asal_sekolah;
        if($asalSekolah === 'SD Santa Ursula Bandung')
        {
            $asal_sekolah = 'SD Santa Ursula Bandung';
        } else {
            $asal_sekolah = $this->request->getVar('asal_sekolah');
        }

        $slug_nama_lengkap = url_title($this->request->getVar('slug_nama_lengkap'), '-', true);
        $this->smpModel->save([
            'id' => $id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'slug_nama_lengkap' => $slug_nama_lengkap,
            'kota_lahir' => $this->request->getVar('kota_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'asal_sekolah' => $asal_sekolah,
            'nama_orangtua' => $this->request->getVar('nama_orangtua'),
            'no_whatsapp' => $this->request->getVar('no_whatsapp'),
            'kelas4_sem1_indo' => $this->request->getVar('kelas4_sem1_indo'),
            'kelas4_sem1_mat' => $this->request->getVar('kelas4_sem1_mat'),
            'kelas4_sem2_indo' => $this->request->getVar('kelas4_sem2_indo'),
            'kelas4_sem2_mat' => $this->request->getVar('kelas4_sem2_mat'),
            'kelas5_sem1_indo' => $this->request->getVar('kelas5_sem1_indo'),
            'kelas5_sem1_mat' => $this->request->getVar('kelas5_sem1_mat'),
            'kelas5_sem2_indo' => $this->request->getVar('kelas5_sem2_indo'),
            'kelas5_sem2_mat' => $this->request->getVar('kelas5_sem2_mat'),
        ]);
        session()->setFlashdata('pesan', 'Data Pendaftaran berhasil diubah. Silahkan login ulang untuk melihat perubahan data.');
        return redirect()->to('/smp/data_calon_siswa/'.$slug_nama_lengkap);
    }

    // DATA DAPODIK

    public function data_dapodik($slug_nama_lengkap)
    {
        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        if($smp->status_dapodik != 1) {
            return redirect()->to('dashboard/smp/'.$slug_nama_lengkap);
        }
        $data = [
            'title' => 'Data Peserta Didik | PPDB Kampus Santa Ursula 2022-2023',
            'slug_unit' => 'smp',
            'smp' => $smp,
            'validation' => \Config\Services::validation()
        ];
        return view('dashboard/smp/form_data_dapodik', $data);
    }

    public function tambah_data_dapodik($slug_nama_lengkap)
    {
        if(!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'nama_panggilan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'kota_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'anak_keberapa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'saudara_kandung' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'tinggi' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'berat' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'kepala' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'pas_foto' => [
                'rules' => 'uploaded[pas_foto]|max_size[pas_foto,5120]|is_image[pas_foto]|mime_in[pas_foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Harus Diupload',
                    'max_size' => 'Foto Lebih Dari 5MB.',
                    'is_image' => 'File Yang Diupload Bukan Gambar.',
                    'mime_in' => 'File Yang Diupload Bukan Berjenis jpg/jpeg/png.'
                ]
            ],
            'nik' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'nkk' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'nak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'scan_kk' => [
                'rules' => 'uploaded[scan_kk]|max_size[scan_kk,5120]|is_image[scan_kk]|mime_in[scan_kk,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Harus Diupload',
                    'max_size' => 'Foto Lebih Dari 5MB.',
                    'is_image' => 'File Yang Diupload Bukan Gambar.',
                    'mime_in' => 'File Yang Diupload Bukan Berjenis jpg/jpeg/png.'
                ]
            ],
            'scan_ak' => [
                'rules' => 'uploaded[scan_ak]|max_size[scan_ak,5120]|is_image[scan_ak]|mime_in[scan_ak,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Harus Diupload',
                    'max_size' => 'Foto Lebih Dari 5MB.',
                    'is_image' => 'File Yang Diupload Bukan Gambar.',
                    'mime_in' => 'File Yang Diupload Bukan Berjenis jpg/jpeg/png.'
                ]
            ],
            'kk_alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'kk_rt' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'kk_rw' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'kk_kelurahan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'kk_kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'kk_kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'kk_kodepos' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'jarak_tempuh' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'waktu_tempuh' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'ayah_nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_nik' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'ayah_kota_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_kewarganegaraan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_pendapatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_kebutuhan_khusus' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_telepon' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'ayah_email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_nik' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'ibu_kota_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_kewarganegaraan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_pendapatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_kebutuhan_khusus' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_telepon' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'ibu_email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
        ])) {
            return redirect()->to('/smp/data_dapodik/'.$slug_nama_lengkap)->withInput();
        };

        $smp = $this->smpModel->getSmp($slug_nama_lengkap);

        $filePasFoto = $this->request->getFile('pas_foto');
        $namaPasFoto = $filePasFoto->getRandomName();
        $filePasFoto->move('upload/pas_foto/smp', $namaPasFoto);

        $fileScanKartuKeluarga = $this->request->getFile('scan_kk');
        $namaScanKartuKeluarga = $fileScanKartuKeluarga->getRandomName();
        $fileScanKartuKeluarga->move('upload/scan_kk/smp', $namaScanKartuKeluarga);

        $fileScanAktaKelahiran = $this->request->getFile('scan_ak');
        $namaScanAktaKelahiran = $fileScanAktaKelahiran->getRandomName();
        $fileScanAktaKelahiran->move('upload/scan_ak/smp', $namaScanAktaKelahiran);

        $this->smpDapodikModel->save([
            'smp_id' => $smp->id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'nama_panggilan' => $this->request->getVar('nama_panggilan'),
            'kota_lahir' => $this->request->getVar('kota_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
            'agama' => $this->request->getVar('agama'),
            'paroki' => $this->request->getVar('paroki'),
            'kebutuhan_khusus' => $this->request->getVar('kebutuhan_khusus'),
            'jenis_kebutuhan_khusus' => $this->request->getVar('jenis_kebutuhan_khusus'),
            'anak_keberapa' => $this->request->getVar('anak_keberapa'),
            'saudara_kandung' => $this->request->getVar('saudara_kandung'),
            'gol_darah' => $this->request->getVar('gol_darah'),
            'tinggi' => $this->request->getVar('tinggi'),
            'berat' => $this->request->getVar('berat'),
            'kepala' => $this->request->getVar('kepala'),
            'nisn' =>$this->request->getVar('nisn'),
            'pas_foto' => $namaPasFoto,
            'nik' =>$this->request->getVar('nik'),
            'nkk' =>$this->request->getVar('nkk'),
            'nak' =>$this->request->getVar('nak'),
            'scan_kk' => $namaScanKartuKeluarga,
            'scan_ak' => $namaScanAktaKelahiran,
            'kk_alamat' =>$this->request->getVar('kk_alamat'),
            'kk_rt' =>$this->request->getVar('kk_rt'),
            'kk_rw' =>$this->request->getVar('kk_rw'),
            'kk_kelurahan' =>$this->request->getVar('kk_kelurahan'),
            'kk_kecamatan' =>$this->request->getVar('kk_kecamatan'),
            'kk_kota' =>$this->request->getVar('kk_kota'),
            'kk_kodepos' =>$this->request->getVar('kk_kodepos'),
            'tt_alamat' =>$this->request->getVar('tt_alamat'),
            'tt_rt' =>$this->request->getVar('tt_rt'),
            'tt_rw' =>$this->request->getVar('tt_rw'),
            'tt_kelurahan' =>$this->request->getVar('tt_kelurahan'),
            'tt_kecamatan' =>$this->request->getVar('tt_kecamatan'),
            'tt_kota' =>$this->request->getVar('tt_kota'),
            'tt_kodepos' =>$this->request->getVar('tt_kodepos'),
            'tinggal_bersama' =>$this->request->getVar('tinggal_bersama'),
            'transportasi' =>$this->request->getVar('transportasi'),
            'jarak_tempuh' =>$this->request->getVar('jarak_tempuh'),
            'waktu_tempuh' =>$this->request->getVar('waktu_tempuh'),
            'asal_sekolah' =>$this->request->getVar('asal_sekolah'),
            'asal_sekolah_alamat' =>$this->request->getVar('asal_sekolah_alamat'),
            'asal_sekolah_kota' =>$this->request->getVar('asal_sekolah_kota'),
            'ayah_nama_lengkap' =>$this->request->getVar('ayah_nama_lengkap'),
            'ayah_nik' =>$this->request->getVar('ayah_nik'),
            'ayah_kota_lahir' =>$this->request->getVar('ayah_kota_lahir'),
            'ayah_tanggal_lahir' =>$this->request->getVar('ayah_tanggal_lahir'),
            'ayah_agama' =>$this->request->getVar('ayah_agama'),
            'ayah_kewarganegaraan' =>$this->request->getVar('ayah_kewarganegaraan'),
            'ayah_pendidikan' =>$this->request->getVar('ayah_pendidikan'),
            'ayah_pekerjaan' =>$this->request->getVar('ayah_pekerjaan'),
            'ayah_jabatan' =>$this->request->getVar('ayah_jabatan'),
            'ayah_pendapatan' =>$this->request->getVar('ayah_pendapatan'),
            'ayah_nama_perusahaan' =>$this->request->getVar('ayah_nama_perusahaan'),
            'ayah_alamat_perusahaan' =>$this->request->getVar('ayah_alamat_perusahaan'),
            'ayah_kebutuhan_khusus' =>$this->request->getVar('ayah_kebutuhan_khusus'),
            'ayah_jenis_kebutuhan_khusus' =>$this->request->getVar('ayah_jenis_kebutuhan_khusus'),
            'ayah_telepon' =>$this->request->getVar('ayah_telepon'),
            'ayah_email' =>$this->request->getVar('ayah_email'),
            'ibu_nama_lengkap' =>$this->request->getVar('ibu_nama_lengkap'),
            'ibu_nik' =>$this->request->getVar('ibu_nik'),
            'ibu_kota_lahir' =>$this->request->getVar('ibu_kota_lahir'),
            'ibu_tanggal_lahir' =>$this->request->getVar('ibu_tanggal_lahir'),
            'ibu_agama' =>$this->request->getVar('ibu_agama'),
            'ibu_kewarganegaraan' =>$this->request->getVar('ibu_kewarganegaraan'),
            'ibu_pendidikan' =>$this->request->getVar('ibu_pendidikan'),
            'ibu_pekerjaan' =>$this->request->getVar('ibu_pekerjaan'),
            'ibu_jabatan' =>$this->request->getVar('ibu_jabatan'),
            'ibu_pendapatan' =>$this->request->getVar('ibu_pendapatan'),
            'ibu_nama_perusahaan' =>$this->request->getVar('ibu_nama_perusahaan'),
            'ibu_alamat_perusahaan' =>$this->request->getVar('ibu_alamat_perusahaan'),
            'ibu_kebutuhan_khusus' =>$this->request->getVar('ibu_kebutuhan_khusus'),
            'ibu_jenis_kebutuhan_khusus' =>$this->request->getVar('ibu_jenis_kebutuhan_khusus'),
            'ibu_telepon' =>$this->request->getVar('ibu_telepon'),
            'ibu_email' =>$this->request->getVar('ibu_email'),
            'wali_nama_lengkap' =>$this->request->getVar('wali_nama_lengkap'),
            'wali_nik' =>$this->request->getVar('wali_nik'),
            'wali_kota_lahir' =>$this->request->getVar('wali_kota_lahir'),
            'wali_tanggal_lahir' =>$this->request->getVar('wali_tanggal_lahir'),
            'wali_agama' =>$this->request->getVar('wali_agama'),
            'wali_kewarganegaraan' =>$this->request->getVar('wali_kewarganegaraan'),
            'wali_pendidikan' =>$this->request->getVar('wali_pendidikan'),
            'wali_pekerjaan' =>$this->request->getVar('wali_pekerjaan'),
            'wali_jabatan' =>$this->request->getVar('wali_jabatan'),
            'wali_pendapatan' =>$this->request->getVar('wali_pendapatan'),
            'wali_nama_perusahaan' =>$this->request->getVar('wali_nama_perusahaan'),
            'wali_alamat_perusahaan' =>$this->request->getVar('wali_alamat_perusahaan'),
            'wali_telepon' =>$this->request->getVar('wali_telepon'),
            'wali_email' =>$this->request->getVar('wali_email'),
            'wali_hubungan_anak' =>$this->request->getVar('wali_hubungan_anak'),
        ]);
        $this->smpModel->save([
            'id' => $smp->id,
            'status_dapodik' => 2
        ]);
        session()->setFlashdata('pesan', 'Data Peserta Didik Berhasil Ditambahkan.');
        return redirect()->to('/dashboard/smp/'.$slug_nama_lengkap);
    }

    public function ubah_data_dapodik($slug_nama_lengkap)
    {
        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        $data = [
            'title' => 'Ubah Data Peserta Didik | PPDB Kampus Santa Ursula 2022-2023',
            'slug_unit' => 'smp',
            'smp' => $smp,
            'dapodik' => $this->smpDapodikModel->getSmp($smp->id),
            'validation' => \Config\Services::validation()
        ];
        return view('dashboard/smp/update_data_dapodik', $data);
    }

    public function update_data_dapodik($id)
    {
        $slug_nama_lengkap = $this->request->getVar('slug_nama_lengkap');
        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        if(!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'nama_panggilan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'kota_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'anak_keberapa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'saudara_kandung' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'tinggi' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'berat' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'kepala' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'pas_foto' => [
                'rules' => 'max_size[pas_foto,5120]|is_image[pas_foto]|mime_in[pas_foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Foto Lebih Dari 5MB.',
                    'is_image' => 'File Yang Diupload Bukan Gambar.',
                    'mime_in' => 'File Yang Diupload Bukan Berjenis jpg/jpeg/png.'
                ]
            ],
            'nik' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'nkk' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'nak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'scan_kk' => [
                'rules' => 'max_size[scan_kk,5120]|is_image[scan_kk]|mime_in[scan_kk,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Foto Lebih Dari 5MB.',
                    'is_image' => 'File Yang Diupload Bukan Gambar.',
                    'mime_in' => 'File Yang Diupload Bukan Berjenis jpg/jpeg/png.'
                ]
            ],
            'scan_ak' => [
                'rules' => 'max_size[scan_ak,5120]|is_image[scan_ak]|mime_in[scan_ak,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Foto Lebih Dari 5MB.',
                    'is_image' => 'File Yang Diupload Bukan Gambar.',
                    'mime_in' => 'File Yang Diupload Bukan Berjenis jpg/jpeg/png.'
                ]
            ],
            'kk_alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'kk_rt' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'kk_rw' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'kk_kelurahan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'kk_kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'kk_kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'kk_kodepos' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'jarak_tempuh' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'waktu_tempuh' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'ayah_nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_nik' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'ayah_kota_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_kewarganegaraan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_pendapatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_kebutuhan_khusus' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ayah_telepon' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'ayah_email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_nik' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'ibu_kota_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_kewarganegaraan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_pendapatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_kebutuhan_khusus' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
            'ibu_telepon' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                    'numeric' => 'Isian Data Harus Berupa Angka.',
                ]
            ],
            'ibu_email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isian Data Harus Diisi.',
                ]
            ],
        ])) {
            return redirect()->to('/smp/ubah_data_dapodik/'.$slug_nama_lengkap)->withInput();
        };
        
        $filePasFoto = $this->request->getFile('pas_foto');
        if($filePasFoto->getError() == 4) {
            $namaPasFoto = $this->request->getVar('old_pas_foto');
        } else {
            $namaPasFoto = $filePasFoto->getRandomName();
            $filePasFoto->move('upload/pas_foto/smp', $namaPasFoto);
            unlink('upload/pas_foto/smp/' . $this->request->getVar('old_pas_foto'));
        }

        $fileScanKartuKeluarga = $this->request->getFile('scan_kk');
        if($fileScanKartuKeluarga->getError() == 4) {
            $namaScanKartuKeluarga = $this->request->getVar('old_scan_kk');
        } else {
            $namaScanKartuKeluarga = $fileScanKartuKeluarga->getRandomName();
            $fileScanKartuKeluarga->move('upload/scan_kk/smp', $namaScanKartuKeluarga);
            unlink('upload/scan_kk/smp/' . $this->request->getVar('old_scan_kk'));
        }
        
        $fileScanAktaKelahiran = $this->request->getFile('scan_ak');
        if($fileScanAktaKelahiran->getError() == 4) {
            $namaScanAktaKelahiran = $this->request->getVar('old_scan_ak');
        } else {
            $namaScanAktaKelahiran = $fileScanAktaKelahiran->getRandomName();
            $fileScanAktaKelahiran->move('upload/scan_ak/smp', $namaScanAktaKelahiran);
            unlink('upload/scan_ak/smp/' . $this->request->getVar('old_scan_ak'));
        }

        $this->smpDapodikModel->save([
            'id' => $id,
            'smp_id' => $smp->id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'nama_panggilan' => $this->request->getVar('nama_panggilan'),
            'kota_lahir' => $this->request->getVar('kota_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
            'agama' => $this->request->getVar('agama'),
            'paroki' => $this->request->getVar('paroki'),
            'kebutuhan_khusus' => $this->request->getVar('kebutuhan_khusus'),
            'jenis_kebutuhan_khusus' => $this->request->getVar('jenis_kebutuhan_khusus'),
            'anak_keberapa' => $this->request->getVar('anak_keberapa'),
            'saudara_kandung' => $this->request->getVar('saudara_kandung'),
            'gol_darah' => $this->request->getVar('gol_darah'),
            'tinggi' => $this->request->getVar('tinggi'),
            'berat' => $this->request->getVar('berat'),
            'kepala' => $this->request->getVar('kepala'),
            'nisn' =>$this->request->getVar('nisn'),
            'pas_foto' => $namaPasFoto,
            'nik' =>$this->request->getVar('nik'),
            'nkk' =>$this->request->getVar('nkk'),
            'nak' =>$this->request->getVar('nak'),
            'scan_kk' => $namaScanKartuKeluarga,
            'scan_ak' => $namaScanAktaKelahiran,
            'kk_alamat' =>$this->request->getVar('kk_alamat'),
            'kk_rt' =>$this->request->getVar('kk_rt'),
            'kk_rw' =>$this->request->getVar('kk_rw'),
            'kk_kelurahan' =>$this->request->getVar('kk_kelurahan'),
            'kk_kecamatan' =>$this->request->getVar('kk_kecamatan'),
            'kk_kota' =>$this->request->getVar('kk_kota'),
            'kk_kodepos' =>$this->request->getVar('kk_kodepos'),
            'tt_alamat' =>$this->request->getVar('tt_alamat'),
            'tt_rt' =>$this->request->getVar('tt_rt'),
            'tt_rw' =>$this->request->getVar('tt_rw'),
            'tt_kelurahan' =>$this->request->getVar('tt_kelurahan'),
            'tt_kecamatan' =>$this->request->getVar('tt_kecamatan'),
            'tt_kota' =>$this->request->getVar('tt_kota'),
            'tt_kodepos' =>$this->request->getVar('tt_kodepos'),
            'tinggal_bersama' =>$this->request->getVar('tinggal_bersama'),
            'transportasi' =>$this->request->getVar('transportasi'),
            'jarak_tempuh' =>$this->request->getVar('jarak_tempuh'),
            'waktu_tempuh' =>$this->request->getVar('waktu_tempuh'),
            'asal_sekolah' =>$this->request->getVar('asal_sekolah'),
            'asal_sekolah_alamat' =>$this->request->getVar('asal_sekolah_alamat'),
            'asal_sekolah_kota' =>$this->request->getVar('asal_sekolah_kota'),
            'ayah_nama_lengkap' =>$this->request->getVar('ayah_nama_lengkap'),
            'ayah_nik' =>$this->request->getVar('ayah_nik'),
            'ayah_kota_lahir' =>$this->request->getVar('ayah_kota_lahir'),
            'ayah_tanggal_lahir' =>$this->request->getVar('ayah_tanggal_lahir'),
            'ayah_agama' =>$this->request->getVar('ayah_agama'),
            'ayah_kewarganegaraan' =>$this->request->getVar('ayah_kewarganegaraan'),
            'ayah_pendidikan' =>$this->request->getVar('ayah_pendidikan'),
            'ayah_pekerjaan' =>$this->request->getVar('ayah_pekerjaan'),
            'ayah_jabatan' =>$this->request->getVar('ayah_jabatan'),
            'ayah_pendapatan' =>$this->request->getVar('ayah_pendapatan'),
            'ayah_nama_perusahaan' =>$this->request->getVar('ayah_nama_perusahaan'),
            'ayah_alamat_perusahaan' =>$this->request->getVar('ayah_alamat_perusahaan'),
            'ayah_kebutuhan_khusus' =>$this->request->getVar('ayah_kebutuhan_khusus'),
            'ayah_jenis_kebutuhan_khusus' =>$this->request->getVar('ayah_jenis_kebutuhan_khusus'),
            'ayah_telepon' =>$this->request->getVar('ayah_telepon'),
            'ayah_email' =>$this->request->getVar('ayah_email'),
            'ibu_nama_lengkap' =>$this->request->getVar('ibu_nama_lengkap'),
            'ibu_nik' =>$this->request->getVar('ibu_nik'),
            'ibu_kota_lahir' =>$this->request->getVar('ibu_kota_lahir'),
            'ibu_tanggal_lahir' =>$this->request->getVar('ibu_tanggal_lahir'),
            'ibu_agama' =>$this->request->getVar('ibu_agama'),
            'ibu_kewarganegaraan' =>$this->request->getVar('ibu_kewarganegaraan'),
            'ibu_pendidikan' =>$this->request->getVar('ibu_pendidikan'),
            'ibu_pekerjaan' =>$this->request->getVar('ibu_pekerjaan'),
            'ibu_jabatan' =>$this->request->getVar('ibu_jabatan'),
            'ibu_pendapatan' =>$this->request->getVar('ibu_pendapatan'),
            'ibu_nama_perusahaan' =>$this->request->getVar('ibu_nama_perusahaan'),
            'ibu_alamat_perusahaan' =>$this->request->getVar('ibu_alamat_perusahaan'),
            'ibu_kebutuhan_khusus' =>$this->request->getVar('ibu_kebutuhan_khusus'),
            'ibu_jenis_kebutuhan_khusus' =>$this->request->getVar('ibu_jenis_kebutuhan_khusus'),
            'ibu_telepon' =>$this->request->getVar('ibu_telepon'),
            'ibu_email' =>$this->request->getVar('ibu_email'),
            'wali_nama_lengkap' =>$this->request->getVar('wali_nama_lengkap'),
            'wali_nik' =>$this->request->getVar('wali_nik'),
            'wali_kota_lahir' =>$this->request->getVar('wali_kota_lahir'),
            'wali_tanggal_lahir' =>$this->request->getVar('wali_tanggal_lahir'),
            'wali_agama' =>$this->request->getVar('wali_agama'),
            'wali_kewarganegaraan' =>$this->request->getVar('wali_kewarganegaraan'),
            'wali_pendidikan' =>$this->request->getVar('wali_pendidikan'),
            'wali_pekerjaan' =>$this->request->getVar('wali_pekerjaan'),
            'wali_jabatan' =>$this->request->getVar('wali_jabatan'),
            'wali_pendapatan' =>$this->request->getVar('wali_pendapatan'),
            'wali_nama_perusahaan' =>$this->request->getVar('wali_nama_perusahaan'),
            'wali_alamat_perusahaan' =>$this->request->getVar('wali_alamat_perusahaan'),
            'wali_telepon' =>$this->request->getVar('wali_telepon'),
            'wali_email' =>$this->request->getVar('wali_email'),
            'wali_hubungan_anak' =>$this->request->getVar('wali_hubungan_anak'),
        ]);
        $this->smpModel->save([
            'id' => $smp->id,
            'status_dapodik' => 2
        ]);
        session()->setFlashdata('pesan', 'Data Peserta Didik Berhasil Diubah.');
        return redirect()->to('/smp/data_calon_siswa/'.$slug_nama_lengkap);
    }

    // DATA PERNYATAAN

    public function data_pernyataan($slug_nama_lengkap)
    {
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        if($smp->status_pernyataan != 1) {
            return redirect()->to('dashboard/smp/'.$slug_nama_lengkap);
        }
        $smp_tanggal_lahir = strtotime($smp->tanggal_lahir);
        $tanggal_lahir = strftime("%d %B %Y",$smp_tanggal_lahir);
        $data = [
            'title' => 'Data Pernyataan | PPDB Kampus Santa Ursula 2022-2023',
            'slug_unit' => 'smp',
            'smp' => $smp,
            'tanggal_lahir' => $tanggal_lahir,
            'validation' => \Config\Services::validation()
        ];
        return view('dashboard/smp/form_data_pernyataan', $data);
    }

    public function tambah_data_pernyataan($slug_nama_lengkap)
    {
        if(!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Orang Tua Harus Diisi.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Rumah Orang Tua Harus Diisi.',
                ]
            ],
            'handphone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No.Telp/Handphone Harus Diisi.',
                ]
            ],
        ])) {
            return redirect()->to('/smp/data_pernyataan/'.$slug_nama_lengkap)->withInput();
        };

        if($_POST['tanda_tangan'] == null)
        {
            session()->setFlashdata('error', 'Tanda Tangan Harus Diisi.');
            return redirect()->to('/smp/data_pernyataan/'.$slug_nama_lengkap)->withInput();
        }

        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        $folderPath = "upload/tanda_tangan2/smp/";
        $image_parts = explode(";base64,", $_POST['tanda_tangan']); 
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.'.$image_type;
        $name = uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);

        $this->smpPernyataanModel->save([
            'smp_id' => $smp->id,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'alamat' => $this->request->getVar('alamat'),
            'handphone' => $this->request->getVar('handphone'),
            'tanda_tangan' => $name
        ]);
        $this->smpModel->save([
            'id' => $smp->id,
            'status_pernyataan' => 2
        ]);
        session()->setFlashdata('pesan', 'Data Pernyataan Berhasil Dibuat.');
        return redirect()->to('/dashboard/smp/'.$slug_nama_lengkap);
    }

    // DATA KEUANGAN

    public function data_keuangan($slug_nama_lengkap)
    {
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        if($smp->status_keuangan != 1) {
            return redirect()->to('dashboard/smp/'.$slug_nama_lengkap);
        }
        $month = strtotime($smp->created_at);
        if(strftime("%m",$month) <= 8) {
            $bulan_tahap_1 = strftime("%B %Y",strtotime("+1 month", $month));
            $bulan_tahap_2 = strftime("%B %Y",strtotime("+2 month", $month));
            $bulan_tahap_3 = strftime("%B %Y",strtotime("+3 month", $month));
            $bulan_tahap_4 = strftime("%B %Y",strtotime("+4 month", $month));
        } else {
            $bulan_tahap_1 = strftime("%B %Y",$month);
            $bulan_tahap_2 = strftime("%B %Y",strtotime("+1 month", $month));
            $bulan_tahap_3 = strftime("%B %Y",strtotime("+2 month", $month));
            $bulan_tahap_4 = strftime("%B %Y",strtotime("+3 month", $month));
        }
        $data = [
            'title' => 'Data Keuangan | PPDB Kampus Santa Ursula 2022-2023',
            'slug_unit' => 'smp',
            'smp' => $smp,
            'bulan_tahap_1' => $bulan_tahap_1,
            'bulan_tahap_2' => $bulan_tahap_2,
            'bulan_tahap_3' => $bulan_tahap_3,
            'bulan_tahap_4' => $bulan_tahap_4,
            'beasiswa' => $this->smpBeasiswaModel->getBeasiswa($smp->id),
            'validation' => \Config\Services::validation()
        ];
        return view('dashboard/smp/form_data_keuangan', $data);
    }

    public function tambah_data_keuangan($slug_nama_lengkap)
    {
        if(!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Orang Tua Harus Diisi.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Rumah Orang Tua Harus Diisi.',
                ]
            ],
            'handphone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No.Telp/Handphone Harus Diisi.',
                ]
            ],
            'tanggal_pembayaran' => [
                'rules' => 'required|numeric|greater_than_equal_to[1]|less_than_equal_to[31]',
                'errors' => [
                    'required' => 'Tanggal Pembayaran Harus Diisi.',
                    'numeric' => 'Tanggal Pembayaran Harus Berupa Angka.',
                    'less_than_equal_to' => 'Tanggal Pembayaran Harus Diantara 1 Sampai 31',
                    'greater_than_equal_to' => 'Tanggal Pembayaran Harus Diantara 1 Sampai 31',
                ]
            ],
            'tahap_pembayaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Tahap Pembayaran Harus Diisi.',
                ]
            ],
            'uang_tahap_1' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Masukan Hanya Jumlah Saja Tanpa Rp Atau Titik.',
                ]
            ],
            'uang_tahap_2' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Masukan Hanya Jumlah Saja Tanpa Rp Atau Titik.',
                ]
            ],
            'uang_tahap_3' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Masukan Hanya Jumlah Saja Tanpa Rp Atau Titik.',
                ]
            ],
            'uang_tahap_4' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Masukan Hanya Jumlah Saja Tanpa Rp Atau Titik.',
                ]
            ]
        ])) {
            return redirect()->to('/smp/data_keuangan/'.$slug_nama_lengkap)->withInput();
        };

        if($_POST['tanda_tangan'] == null)
        {
            session()->setFlashdata('error', 'Tanda Tangan Harus Diisi.');
            return redirect()->to('/smp/data_keuangan/'.$slug_nama_lengkap)->withInput();
        }

        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        $beasiswa = $this->smpBeasiswaModel->getBeasiswa($smp->id);
        if ($beasiswa) {
            $pengurangan_uang_pangkal = $beasiswa->uang_pangkal;
            $uang_pangkal = 10000000 - $pengurangan_uang_pangkal;
        } else {
            $uang_pangkal = 10000000;
        }

        $uang_tahap_1 = $this->request->getVar('uang_tahap_1');
        $uang_tahap_2 = $this->request->getVar('uang_tahap_2');
        $uang_tahap_3 = $this->request->getVar('uang_tahap_3');
        $uang_tahap_4 = $this->request->getVar('uang_tahap_4');
        $total_uang = $uang_tahap_1 + $uang_tahap_2 + $uang_tahap_3 + $uang_tahap_4;
        if($uang_pangkal != $total_uang)
        {
            session()->setFlashdata('error', 'Jumlah Pembagian Uang Pangkal Di Tiap Tahap Tidak Sama Dengan Total Uang Pangkal.');
            return redirect()->to('/smp/data_keuangan/'.$slug_nama_lengkap)->withInput();
        } else {
            $folderPath = "upload/tanda_tangan/smp/";
            $image_parts = explode(";base64,", $_POST['tanda_tangan']); 
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . uniqid() . '.'.$image_type;
            file_put_contents($file, $image_base64);

            $this->smpKeuanganModel->save([
                'smp_id' => $smp->id,
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'alamat' => $this->request->getVar('alamat'),
                'handphone' => $this->request->getVar('handphone'),
                'tanggal_pembayaran' => $this->request->getVar('tanggal_pembayaran'),
                'tahap_pembayaran' => $this->request->getVar('tahap_pembayaran'),
                'uang_tahap_1' => $uang_tahap_1,
                'uang_tahap_2' => $uang_tahap_2,
                'uang_tahap_3' => $uang_tahap_3,
                'uang_tahap_4' => $uang_tahap_4,
                'tanda_tangan' => uniqid().'.'.$image_type
            ]);
            $this->smpModel->save([
                'id' => $smp->id,
                'status_keuangan' => 2
            ]);
            session()->setFlashdata('pesan', 'Data Keuangan Berhasil Dibuat.');
            return redirect()->to('/dashboard/smp/'.$slug_nama_lengkap);
        }
    }

    // DATA PEMBAYARAN
    
    public function pembayaran_tahap_1($slug_nama_lengkap)
    {
        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        $keuangan = $this->smpKeuanganModel->getKeuangan($smp->id);
        
        $data = [
            'title' => 'Upload Pembayaran Tahap 1 | PPDB Kampus Santa Ursula 2022-2023',
            'slug_unit' => 'smp',
            'smp' => $smp,
            'tahap' => '1',
            'beasiswa' => $this->smpBeasiswaModel->getBeasiswa($smp->id),
            'keuangan' => $keuangan,
            'validation' => \Config\Services::validation()
        ];
        return view('dashboard/smp/form_upload_pembayaran', $data);
    }

    public function bukti_pembayaran_tahap_1($slug_nama_lengkap)
    {
        if(!$this->validate([
            'tanggal_bayar_1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Pembayaran Harus Diisi.',
                ]
            ],
            'jumlah_bayar_1' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Pembayaran Harus Diisi.',
                    'numeric' => 'Jumlah Pembayaran Harus Berupa Angka.',
                ]
            ],
            'bukti_bayar_1' => [
                'rules' => 'uploaded[bukti_bayar_1]|max_size[bukti_bayar_1,5120]|is_image[bukti_bayar_1]|mime_in[bukti_bayar_1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Bukti Pembayaran Harus Diisi',
                    'max_size' => 'Foto Lebih Dari 5MB.',
                    'is_image' => 'File Yang Diupload Bukan Gambar.',
                    'mime_in' => 'File Yang Diupload Bukan Berjenis jpg/jpeg/png.'
                ]
            ],
        ])) {
            return redirect()->to('/smp/pembayaran_tahap_1/'.$slug_nama_lengkap)->withInput();
        };

        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        $keuangan = $this->smpKeuanganModel->getKeuangan($smp->id);

        $fileBuktiBayar = $this->request->getFile('bukti_bayar_1');
        $namaBuktiBayar = $fileBuktiBayar->getRandomName();
        $fileBuktiBayar->move('upload/bukti_tahap_1/smp', $namaBuktiBayar);

        $this->smpPembayaranModel->save([
            'smp_id' => $smp->id,
            'tahap' => '1',
            'tanggal_bayar' => $this->request->getVar('tanggal_bayar_1'),
            'jumlah_bayar' => $this->request->getVar('jumlah_bayar_1'),
            'bukti_bayar' => $namaBuktiBayar
        ]);

        $this->smpKeuanganModel->save([
            'id' => $keuangan->id,
            'status_tahap_1' => 1
        ]);
        session()->setFlashdata('pesan', 'Bukti Pembayaran Tahap 1 Berhasil Ditambahkan.');
        return redirect()->to('/smp/data_calon_siswa/'.$slug_nama_lengkap);
    }

    public function pembayaran_tahap_2($slug_nama_lengkap)
    {
        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        $keuangan = $this->smpKeuanganModel->getKeuangan($smp->id);
        
        $data = [
            'title' => 'Upload Pembayaran Tahap 2 | PPDB Kampus Santa Ursula 2022-2023',
            'slug_unit' => 'smp',
            'smp' => $smp,
            'tahap' => '2',
            'beasiswa' => $this->smpBeasiswaModel->getBeasiswa($smp->id),
            'keuangan' => $keuangan,
            'validation' => \Config\Services::validation()
        ];
        return view('dashboard/smp/form_upload_pembayaran', $data);
    }

    public function bukti_pembayaran_tahap_2($slug_nama_lengkap)
    {
        if(!$this->validate([
            'tanggal_bayar_2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Pembayaran Harus Diisi.',
                ]
            ],
            'jumlah_bayar_2' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Pembayaran Harus Diisi.',
                    'numeric' => 'Jumlah Pembayaran Harus Berupa Angka.',
                ]
            ],
            'bukti_bayar_2' => [
                'rules' => 'uploaded[bukti_bayar_2]|max_size[bukti_bayar_2,5120]|is_image[bukti_bayar_2]|mime_in[bukti_bayar_2,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Bukti Pembayaran Harus Diisi',
                    'max_size' => 'Foto Lebih Dari 5MB.',
                    'is_image' => 'File Yang Diupload Bukan Gambar.',
                    'mime_in' => 'File Yang Diupload Bukan Berjenis jpg/jpeg/png.'
                ]
            ],
        ])) {
            return redirect()->to('/smp/pembayaran_tahap_2/'.$slug_nama_lengkap)->withInput();
        };

        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        $keuangan = $this->smpKeuanganModel->getKeuangan($smp->id);

        $fileBuktiBayar = $this->request->getFile('bukti_bayar_2');
        $namaBuktiBayar = $fileBuktiBayar->getRandomName();
        $fileBuktiBayar->move('upload/bukti_tahap_2/smp', $namaBuktiBayar);

        $this->smpPembayaranModel->save([
            'smp_id' => $smp->id,
            'tahap' => '2',
            'tanggal_bayar' => $this->request->getVar('tanggal_bayar_2'),
            'jumlah_bayar' => $this->request->getVar('jumlah_bayar_2'),
            'bukti_bayar' => $namaBuktiBayar
        ]);

        $this->smpKeuanganModel->save([
            'id' => $keuangan->id,
            'status_tahap_2' => 1
        ]);
        session()->setFlashdata('pesan', 'Bukti Pembayaran Tahap 2 Berhasil Ditambahkan.');
        return redirect()->to('/smp/data_calon_siswa/'.$slug_nama_lengkap);
    }

    public function pembayaran_tahap_3($slug_nama_lengkap)
    {
        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        $keuangan = $this->smpKeuanganModel->getKeuangan($smp->id);
        
        $data = [
            'title' => 'Upload Pembayaran Tahap 3 | PPDB Kampus Santa Ursula 2022-2023',
            'slug_unit' => 'smp',
            'smp' => $smp,
            'tahap' => '3',
            'beasiswa' => $this->smpBeasiswaModel->getBeasiswa($smp->id),
            'keuangan' => $keuangan,
            'validation' => \Config\Services::validation()
        ];
        return view('dashboard/smp/form_upload_pembayaran', $data);
    }

    public function bukti_pembayaran_tahap_3($slug_nama_lengkap)
    {
        if(!$this->validate([
            'tanggal_bayar_3' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Pembayaran Harus Diisi.',
                ]
            ],
            'jumlah_bayar_3' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Pembayaran Harus Diisi.',
                    'numeric' => 'Jumlah Pembayaran Harus Berupa Angka.',
                ]
            ],
            'bukti_bayar_3' => [
                'rules' => 'uploaded[bukti_bayar_3]|max_size[bukti_bayar_3,5120]|is_image[bukti_bayar_3]|mime_in[bukti_bayar_3,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Bukti Pembayaran Harus Diisi',
                    'max_size' => 'Foto Lebih Dari 5MB.',
                    'is_image' => 'File Yang Diupload Bukan Gambar.',
                    'mime_in' => 'File Yang Diupload Bukan Berjenis jpg/jpeg/png.'
                ]
            ],
        ])) {
            return redirect()->to('/smp/pembayaran_tahap_3/'.$slug_nama_lengkap)->withInput();
        };

        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        $keuangan = $this->smpKeuanganModel->getKeuangan($smp->id);

        $fileBuktiBayar = $this->request->getFile('bukti_bayar_3');
        $namaBuktiBayar = $fileBuktiBayar->getRandomName();
        $fileBuktiBayar->move('upload/bukti_tahap_3/smp', $namaBuktiBayar);

        $this->smpPembayaranModel->save([
            'smp_id' => $smp->id,
            'tahap' => '3',
            'tanggal_bayar' => $this->request->getVar('tanggal_bayar_3'),
            'jumlah_bayar' => $this->request->getVar('jumlah_bayar_3'),
            'bukti_bayar' => $namaBuktiBayar
        ]);

        $this->smpKeuanganModel->save([
            'id' => $keuangan->id,
            'status_tahap_3' => 1
        ]);
        session()->setFlashdata('pesan', 'Bukti Pembayaran Tahap 3 Berhasil Ditambahkan.');
        return redirect()->to('/smp/data_calon_siswa/'.$slug_nama_lengkap);
    }

    public function pembayaran_tahap_4($slug_nama_lengkap)
    {
        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        $keuangan = $this->smpKeuanganModel->getKeuangan($smp->id);
        
        $data = [
            'title' => 'Upload Pembayaran Tahap 4 | PPDB Kampus Santa Ursula 2022-2023',
            'slug_unit' => 'smp',
            'smp' => $smp,
            'tahap' => '4',
            'beasiswa' => $this->smpBeasiswaModel->getBeasiswa($smp->id),
            'keuangan' => $keuangan,
            'validation' => \Config\Services::validation()
        ];
        return view('dashboard/smp/form_upload_pembayaran', $data);
    }

    public function bukti_pembayaran_tahap_4($slug_nama_lengkap)
    {
        if(!$this->validate([
            'tanggal_bayar_4' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Pembayaran Harus Diisi.',
                ]
            ],
            'jumlah_bayar_4' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Pembayaran Harus Diisi.',
                    'numeric' => 'Jumlah Pembayaran Harus Berupa Angka.',
                ]
            ],
            'bukti_bayar_4' => [
                'rules' => 'uploaded[bukti_bayar_4]|max_size[bukti_bayar_4,5120]|is_image[bukti_bayar_4]|mime_in[bukti_bayar_4,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Bukti Pembayaran Harus Diisi',
                    'max_size' => 'Foto Lebih Dari 5MB.',
                    'is_image' => 'File Yang Diupload Bukan Gambar.',
                    'mime_in' => 'File Yang Diupload Bukan Berjenis jpg/jpeg/png.'
                ]
            ],
        ])) {
            return redirect()->to('/smp/pembayaran_tahap_4/'.$slug_nama_lengkap)->withInput();
        };

        $smp = $this->smpModel->getSmp($slug_nama_lengkap);
        $keuangan = $this->smpKeuanganModel->getKeuangan($smp->id);

        $fileBuktiBayar = $this->request->getFile('bukti_bayar_4');
        $namaBuktiBayar = $fileBuktiBayar->getRandomName();
        $fileBuktiBayar->move('upload/bukti_tahap_4/smp', $namaBuktiBayar);

        $this->smpPembayaranModel->save([
            'smp_id' => $smp->id,
            'tahap' => '4',
            'tanggal_bayar' => $this->request->getVar('tanggal_bayar_4'),
            'jumlah_bayar' => $this->request->getVar('jumlah_bayar_4'),
            'bukti_bayar' => $namaBuktiBayar
        ]);

        $this->smpKeuanganModel->save([
            'id' => $keuangan->id,
            'status_tahap_4' => 1
        ]);
        session()->setFlashdata('pesan', 'Bukti Pembayaran Tahap 4 Berhasil Ditambahkan.');
        return redirect()->to('/smp/data_calon_siswa/'.$slug_nama_lengkap);
    }
}