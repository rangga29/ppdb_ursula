<?php

namespace App\Controllers;

use App\Models\SdModel;

class Sd_registrasi extends BaseController
{
    protected $sdModel;

    public function __construct()
    {
        $this->sdModel = new SdModel();
    }

    public function index()
    {
        return redirect()->to('/home');
    }

    // INTERNAL

    public function internal()
    {
        $data = [
			'title' => 'Pendaftaran Calon Peserta Didik SD | PPDB Kampus Santa Ursula 2022-2023',
			'modal' => 'modal_true',
            'unit' => 'sd_internal'
		];
		return view('registrasi/sd/internal/term_condition', $data);
    }

    public function internal_form()
    {
        $data = [
            'title' => 'Pendaftaran Calon Peserta Didik SD | PPDB Kampus Santa Ursula 2022-2023',
            'modal' => 'modal_false',
            'validation' => \Config\Services::validation()
        ];
        return view('registrasi/sd/internal/form', $data);
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
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Harus Diisi.',
                    'min_length' => 'Password Minimal 8 Karakter'
                ]
            ],
        ])) {
            return redirect()->to('/sd_registrasi/internal_form')->withInput();
        };

        $fileBuktiPembayaran = $this->request->getFile('bukti_pembayaran');
        $namaBuktiPembayaran = $fileBuktiPembayaran->getRandomName();
        $fileBuktiPembayaran->move('upload/bukti_pembayaran/sd', $namaBuktiPembayaran);

        $pilihan_tingkat = $this->request->getVar('pilihan_tingkat');
        $count = $this->sdModel->getTingkat($pilihan_tingkat);
        $x = $count + 1;
        if($x < 10) {
            $urutan = '00' . $x;
        } else if ($x < 100) {
            $urutan = '0' . $x;
        } else {
            $urutan = $x;
        }
        $no_registrasi = '222320' . $pilihan_tingkat . $urutan;
        $no_virtual = '894780' . $no_registrasi;

        $asal_sekolah = 'TK Santa Ursula Bandung';

        $slug_nama_lengkap = url_title($this->request->getVar('nama_lengkap'), '-', true);
        $this->sdModel->save([
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
            'no_registrasi' => $no_registrasi,
            'no_virtual' => $no_virtual,
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'status_pendaftaran' => 2
        ]);
        return redirect()->to('/sd_registrasi/internal_finish/' . $slug_nama_lengkap);
    }

    public function internal_finish($slug_nama_lengkap)
    {
        $data = [
			'title' => 'Pendaftaran Calon Peserta Didik SD | PPDB Kampus Santa Ursula 2022-2023',
            'unit' => 'SD Santa Ursula',
            'modal' => 'modal_false',
            'siswa_sd' => $this->sdModel->getSd($slug_nama_lengkap)
		];

        if(empty($data['siswa_sd'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Calon Peserta Didik Tidak Ditemukan');
        }

		return view('registrasi/sd/internal/finish', $data);
    }

    // EXTERNAL

    public function external()
    {
        $data = [
			'title' => 'Pendaftaran Calon Peserta Didik SD | PPDB Kampus Santa Ursula 2022-2023',
			'modal' => 'modal_true',
            'unit' => 'sd_external'
		];
		return view('registrasi/sd/external/term_condition', $data);
    }

    public function external_form()
    {
        $data = [
            'title' => 'Pendaftaran Calon Peserta Didik SD | PPDB Kampus Santa Ursula 2022-2023',
            'modal' => 'modal_false',
            'validation' => \Config\Services::validation()
        ];
        return view('registrasi/sd/external/form', $data);
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
                    'required' => 'Asal Sekolah Harus Diisi.'
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
        ])) {
            return redirect()->to('/sd_registrasi/external_form')->withInput();
        };

        $fileBuktiPembayaran = $this->request->getFile('bukti_pembayaran');
        $namaBuktiPembayaran = $fileBuktiPembayaran->getRandomName();
        $fileBuktiPembayaran->move('upload/bukti_pembayaran/sd', $namaBuktiPembayaran);

        $pilihan_tingkat = $this->request->getVar('pilihan_tingkat');
        $count = $this->sdModel->getTingkat($pilihan_tingkat);
        $x = $count + 1;
        if($x < 10) {
            $urutan = '00' . $x;
        } else if ($x < 100) {
            $urutan = '0' . $x;
        } else {
            $urutan = $x;
        }
        $no_registrasi = '222320' . $pilihan_tingkat . $urutan;
        $no_virtual = '894780' . $no_registrasi;

        $slug_nama_lengkap = url_title($this->request->getVar('nama_lengkap'), '-', true);
        $this->sdModel->save([
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
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'status_pendaftaran' => 2
        ]);
        return redirect()->to('/sd_registrasi/external_finish/' . $slug_nama_lengkap);
    }

    public function external_finish($slug_nama_lengkap)
    {
        $data = [
			'title' => 'Pendaftaran Calon Peserta Didik SD | PPDB Kampus Santa Ursula 2022-2023',
            'unit' => 'SD Santa Ursula',
            'modal' => 'modal_false',
            'siswa_sd' => $this->sdModel->getSd($slug_nama_lengkap)
		];

        if(empty($data['siswa_sd'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Calon Peserta Didik Tidak Ditemukan');
        }

		return view('registrasi/sd/external/finish', $data);
    }
}