<?php

namespace App\Models;

use CodeIgniter\Model;

class TbtkKeuanganModel extends Model
{
    protected $table            = 'tbtk_keuangan';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'tbtk_id',
        'nama_lengkap',
        'alamat',
        'handphone',
        'tanggal_pembayaran',
        'tahap_pembayaran',
        'uang_tahap_1',
        'status_tahap_1',
        'uang_tahap_2',
        'status_tahap_2',
        'uang_tahap_3',
        'status_tahap_3',
        'uang_tahap_4',
        'status_tahap_4',
        'tanda_tangan',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getKeuangan($tbtk_id)
    {
        return $this->where([
            'tbtk_id' => $tbtk_id,
            'deleted_at' => null,
        ])->first();
    }
}