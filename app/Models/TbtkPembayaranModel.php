<?php

namespace App\Models;

use CodeIgniter\Model;

class TbtkPembayaranModel extends Model
{
    protected $table            = 'tbtk_pembayaran';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'tbtk_id',
        'tahap',
        'tanggal_bayar',
        'jumlah_bayar',
        'bukti_bayar',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getPembayaran($tbtk_id)
    {
        return $this->where([
            'tbtk_id' => $tbtk_id,
            'deleted_at' => null,
        ])->first();
    }

    public function getPembayaranTahap1($tbtk_id)
    {
        return $this->where([
            'tbtk_id' => $tbtk_id,
            'tahap' => 1,
            'deleted_at' => null,
        ])->first();
    }

    public function getPembayaranTahap2($tbtk_id)
    {
        return $this->where([
            'tbtk_id' => $tbtk_id,
            'tahap' => 2,
            'deleted_at' => null,
        ])->first();
    }

    public function getPembayaranTahap3($tbtk_id)
    {
        return $this->where([
            'tbtk_id' => $tbtk_id,
            'tahap' => 3,
            'deleted_at' => null,
        ])->first();
    }

    public function getPembayaranTahap4($tbtk_id)
    {
        return $this->where([
            'tbtk_id' => $tbtk_id,
            'tahap' => 4,
            'deleted_at' => null,
        ])->first();
    }
}