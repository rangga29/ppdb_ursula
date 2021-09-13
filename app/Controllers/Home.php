<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'PPDB Online Kampus Santa Ursula 2022-2023'
		];
		return view('home/index', $data);
	}
}