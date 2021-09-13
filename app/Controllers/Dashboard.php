<?php

namespace App\Controllers;

use App\Models\TbtkModel;
use App\Models\TbtkBeasiswaModel;
use App\Models\SdModel;
use App\Models\SdBeasiswaModel;
use App\Models\SmpModel;
use App\Models\SmpBeasiswaModel;

class Dashboard extends BaseController
{
	protected $tbtkModel;
	protected $tbtkBeasiswaModel;
	protected $sdModel;
	protected $sdBeasiswaModel;
	protected $smpModel;
	protected $smpBeasiswaModel;

	public function __construct()
    {
        $this->tbtkModel = new TbtkModel();
        $this->tbtkBeasiswaModel = new TbtkBeasiswaModel();
        $this->sdModel = new SdModel();
		$this->sdBeasiswaModel = new SdBeasiswaModel();
        $this->smpModel = new SmpModel();
		$this->smpBeasiswaModel = new SmpBeasiswaModel();
    }

	public function tbtk($slug_nama_lengkap)
	{
		$tbtk = $this->tbtkModel->getTbtk($slug_nama_lengkap);
		$data = [
			'title' => 'Dashboard Calon Peserta Didik | PPDB Kampus Santa Ursula 2022-2023',
			'slug_unit' => 'tbtk',
			'proses' => 'Observasi',
			'tbtk' => $tbtk,
			'beasiswa' => $this->tbtkBeasiswaModel->getBeasiswa($tbtk->id)
		];
		return view('dashboard/tbtk/index', $data);
	}

	public function sd($slug_nama_lengkap)
	{
		$sd = $this->sdModel->getSd($slug_nama_lengkap);
		$data = [
			'title' => 'Dashboard Calon Peserta Didik | PPDB Kampus Santa Ursula 2022-2023',
			'slug_unit' => 'sd',
			'proses' => 'Observasi',
			'sd' => $sd,
			'beasiswa' => $this->sdBeasiswaModel->getBeasiswa($sd->id)
		];
		return view('dashboard/sd/index', $data);
	}

	public function smp($slug_nama_lengkap)
	{
		$smp = $this->smpModel->getSmp($slug_nama_lengkap);
		$data = [
			'title' => 'Dashboard Calon Peserta Didik | PPDB Kampus Santa Ursula 2022-2023',
			'slug_unit' => 'smp',
			'proses' => 'Observasi',
			'smp' => $smp,
			'beasiswa' => $this->smpBeasiswaModel->getBeasiswa($smp->id)
		];
		return view('dashboard/smp/index', $data);
	}
}