<?php

namespace App\Controllers;

use App\Models\SmpModel;

class Smp_login extends BaseController
{
	protected $smpModel;

    public function __construct()
    {
        $this->smpModel = new SmpModel();
    }

    public function index()
	{
		$data = [
			'title' => 'Login Calon Peserta Didik | PPDB Kampus Santa Ursula 2022-2023',
            'unit' => 'smp',
			'slug' => 'smp_login',
			'judul1' => 'PPDB ONLINE 2022-2023 <br><br> LOGIN CALON PESERTA DIDIK SMP SANTA URSULA',
			'judul2' => 'PPDB ONLINE 2022-2023 <br> SMP SANTA URSULA',
			'deskripsi' => 'Silahkan login menggunakan username dan password yang didapatkan saat melakukan pendaftaran',
			'bg_color' => 'color3'
		];
		return view('login/index', $data);
	}

    public function login()
	{
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $dataUser = $this->smpModel->where([
            'email' => $email,
            'deleted_at' => null,
        ])->first();

        if ($dataUser) {
			$pass = $dataUser->password;
            if (password_verify($password, $pass)) {
                session()->set([
                    'email' => $dataUser->email,
                    'nama_lengkap' => $dataUser->nama_lengkap,
                    'slug_nama_lengkap' => $dataUser->slug_nama_lengkap,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('/dashboard/smp/'.$dataUser->slug_nama_lengkap));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
	}

    public function logout()
	{
        session()->destroy();
        return redirect()->to('/home');
	}
}