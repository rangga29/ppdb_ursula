<?php

namespace App\Controllers;

use App\Models\SmpModel;

class Smp_registrasi extends BaseController
{
    protected $smpModel;

    public function __construct()
    {
        $this->smpModel = new SmpModel();
    }

    public function index()
    {
        return redirect()->to('/home');
    }

    // INTERNAL

    public function internal()
    {
        $data = [
			'title' => 'Pendaftaran Calon Peserta Didik SMP | PPDB Kampus Santa Ursula 2022-2023',
			'modal' => 'modal_true',
            'unit' =>'smp_internal'
		];
		return view('registrasi/smp/internal/term_condition', $data);
    }

    public function internal_form()
    {
        $data = [
            'title' => 'Pendaftaran Calon Peserta Didik SMP | PPDB Kampus Santa Ursula 2022-2023',
            'modal' => 'modal_false',
            'validation' => \Config\Services::validation()
        ];
        return view('registrasi/smp/internal/form', $data);
    }

    public function internal_save()
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
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Email Harus Diisi.',
                ]
            ],
            'no_whatsapp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor Whatsapp Harus Diisi.',
                    'numeric' => 'Nomor Whatsapp Hanya Dapat Berisi Angka'
                ]
            ],
            'bukti_pembayaran' => [
                'rules' => 'uploaded[bukti_pembayaran]|max_size[bukti_pembayaran,5120]|is_image[bukti_pembayaran]|mime_in[bukti_pembayaran,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Bukti Pembayaran Harus Diupload',
                    'max_size' => 'Foto Bukti Pembayaran Lebih Dari 5MB.',
                    'is_image' => 'File Yang Diupload Bukan Gambar.',
                    'mime_in' => 'File Yang Diupload Bukan Berjenis jpg/jpeg/png.'
                ]
            ],
            'surat_pengantar' => [
                'rules' => 'uploaded[surat_pengantar]|max_size[surat_pengantar,5120]|mime_in[surat_pengantar,application/pdf]',
                'errors' => [
                    'uploaded' => 'File Surat Pengantar Harus Diupload',
                    'max_size' => 'File Surat Pengantar Lebih Dari 5MB.',
                    'mime_in' => 'File Yang Diupload Bukan Berjenis pdf.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Harus Diisi.',
                    'min_length' => 'Password Minimal 8 Karakter'
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
            return redirect()->to('/smp_registrasi/internal_form')->withInput();
        };

        $fileBuktiPembayaran = $this->request->getFile('bukti_pembayaran');
        $namaBuktiPembayaran = $fileBuktiPembayaran->getRandomName();
        $fileBuktiPembayaran->move('upload/bukti_pembayaran/smp', $namaBuktiPembayaran);

        $fileSuratPengantar = $this->request->getFile('surat_pengantar');
        $namaSuratPengantar = $fileSuratPengantar->getRandomName();
        $fileSuratPengantar->move('upload/surat_pengantar/smp', $namaSuratPengantar);

        $pilihan_tingkat = $this->request->getVar('pilihan_tingkat');
        $count = $this->smpModel->getTingkat($pilihan_tingkat);
        $x = $count + 1;
        if($x < 10) {
            $urutan = '00' . $x;
        } else if ($x < 100) {
            $urutan = '0' . $x;
        } else {
            $urutan = $x;
        }
        $no_registrasi = '222330' . $pilihan_tingkat . $urutan;
        $no_virtual = '894780' . $no_registrasi;

        $asal_sekolah = 'SD Santa Ursula Bandung';

        $slug_nama_lengkap = url_title($this->request->getVar('nama_lengkap'), '-', true);
        $this->smpModel->save([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'slug_nama_lengkap' => $slug_nama_lengkap,
            'kota_lahir' => $this->request->getVar('kota_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'asal_sekolah' => $asal_sekolah,
            'pilihan_tingkat' => $this->request->getVar('pilihan_tingkat'),
            'nama_orangtua' => $this->request->getVar('nama_orangtua'),
            'email' => $this->request->getVar('email'),
            'no_whatsapp' => $this->request->getVar('no_whatsapp'),
            'bukti_pembayaran' => $namaBuktiPembayaran,
            'surat_pengantar' => $namaSuratPengantar,
            'no_registrasi' => $no_registrasi,
            'no_virtual' => $no_virtual,
            'kelas4_sem1_indo' => $this->request->getVar('kelas4_sem1_indo'),
            'kelas4_sem1_mat' => $this->request->getVar('kelas4_sem1_mat'),
            'kelas4_sem2_indo' => $this->request->getVar('kelas4_sem2_indo'),
            'kelas4_sem2_mat' => $this->request->getVar('kelas4_sem2_mat'),
            'kelas5_sem1_indo' => $this->request->getVar('kelas5_sem1_indo'),
            'kelas5_sem1_mat' => $this->request->getVar('kelas5_sem1_mat'),
            'kelas5_sem2_indo' => $this->request->getVar('kelas5_sem2_indo'),
            'kelas5_sem2_mat' => $this->request->getVar('kelas5_sem2_mat'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'status_pendaftaran' => 2
        ]);
        return redirect()->to('/smp_registrasi/internal_finish/' . $slug_nama_lengkap);
    }

    public function internal_finish($slug_nama_lengkap)
    {
        $data = [
			'title' => 'Pendaftaran Calon Peserta Didik SMP | PPDB Kampus Santa Ursula 2022-2023',
            'unit' => 'SMP Santa Ursula',
            'modal' => 'modal_false',
            'siswa_smp' => $this->smpModel->getSmp($slug_nama_lengkap)
		];

        if(empty($data['siswa_smp'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Calon Peserta Didik Tidak Ditemukan');
        }

		return view('registrasi/smp/internal/finish', $data);
    }

    // EXTERNAL

    public function external()
    {
        $data = [
			'title' => 'Pendaftaran Calon Peserta Didik SMP | PPDB Kampus Santa Ursula 2022-2023',
			'modal' => 'modal_true',
            'unit' => 'smp_external'
		];
		return view('registrasi/smp/external/term_condition', $data);
    }

    public function external_form()
    {
        $data = [
            'title' => 'Pendaftaran Calon Peserta Didik SMP | PPDB Kampus Santa Ursula 2022-2023',
            'modal' => 'modal_false',
            'validation' => \Config\Services::validation()
        ];
        return view('registrasi/smp/external/form', $data);
    }

    public function external_save()
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
            'asal_sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Asal Sekolah Harus Diisi.'
                ]
            ],
            'nama_orangtua' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap Orangtua Harus Diisi.'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Email Harus Diisi.',
                ]
            ],
            'no_whatsapp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nomor Whatsapp Harus Diisi.',
                    'numeric' => 'Nomor Whatsapp Hanya Dapat Berisi Angka'
                ]
            ],
            'bukti_pembayaran' => [
                'rules' => 'uploaded[bukti_pembayaran]|max_size[bukti_pembayaran,5120]|is_image[bukti_pembayaran]|mime_in[bukti_pembayaran,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Bukti Pembayaran Harus Diupload',
                    'max_size' => 'Foto Bukti Pembayaran Lebih Dari 5MB.',
                    'is_image' => 'File Yang Diupload Bukan Gambar.',
                    'mime_in' => 'File Yang Diupload Bukan Berjenis jpg/jpeg/png.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Harus Diisi.',
                    'min_length' => 'Password Minimal 8 Karakter'
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
            return redirect()->to('/smp_registrasi/external_form')->withInput();
        };

        $fileBuktiPembayaran = $this->request->getFile('bukti_pembayaran');
        $namaBuktiPembayaran = $fileBuktiPembayaran->getRandomName();
        $fileBuktiPembayaran->move('upload/bukti_pembayaran/smp', $namaBuktiPembayaran);

        $pilihan_tingkat = $this->request->getVar('pilihan_tingkat');
        $count = $this->smpModel->getTingkat($pilihan_tingkat);
        $x = $count + 1;
        if($x < 10) {
            $urutan = '00' . $x;
        } else if ($x < 100) {
            $urutan = '0' . $x;
        } else {
            $urutan = $x;
        }
        $no_registrasi = '222330' . $pilihan_tingkat . $urutan;
        $no_virtual = '894780' . $no_registrasi;

        $slug_nama_lengkap = url_title($this->request->getVar('nama_lengkap'), '-', true);
        $this->smpModel->save([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'slug_nama_lengkap' => $slug_nama_lengkap,
            'kota_lahir' => $this->request->getVar('kota_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'asal_sekolah' => $this->request->getVar('asal_sekolah'),
            'pilihan_tingkat' => $this->request->getVar('pilihan_tingkat'),
            'nama_orangtua' => $this->request->getVar('nama_orangtua'),
            'email' => $this->request->getVar('email'),
            'no_whatsapp' => $this->request->getVar('no_whatsapp'),
            'bukti_pembayaran' => $namaBuktiPembayaran,
            'no_registrasi' => $no_registrasi,
            'no_virtual' => $no_virtual,
            'kelas4_sem1_indo' => $this->request->getVar('kelas4_sem1_indo'),
            'kelas4_sem1_mat' => $this->request->getVar('kelas4_sem1_mat'),
            'kelas4_sem2_indo' => $this->request->getVar('kelas4_sem2_indo'),
            'kelas4_sem2_mat' => $this->request->getVar('kelas4_sem2_mat'),
            'kelas5_sem1_indo' => $this->request->getVar('kelas5_sem1_indo'),
            'kelas5_sem1_mat' => $this->request->getVar('kelas5_sem1_mat'),
            'kelas5_sem2_indo' => $this->request->getVar('kelas5_sem2_indo'),
            'kelas5_sem2_mat' => $this->request->getVar('kelas5_sem2_mat'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'status_pendaftaran' => 2
        ]);
        return redirect()->to('/smp_registrasi/external_finish/' . $slug_nama_lengkap);
    }

    public function external_finish($slug_nama_lengkap)
    {
        $data = [
			'title' => 'Pendaftaran Calon Peserta Didik SMP | PPDB Kampus Santa Ursula 2022-2023',
            'unit' => 'SMP Santa Ursula',
            'modal' => 'modal_false',
            'siswa_smp' => $this->smpModel->getSmp($slug_nama_lengkap)
		];

        if(empty($data['siswa_smp'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Calon Peserta Didik Tidak Ditemukan');
        }

		return view('registrasi/smp/external/finish', $data);
    }
}