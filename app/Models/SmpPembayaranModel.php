<?php

namespace App\Models;

use CodeIgniter\Model;

class SmpPembayaranModel extends Model
{
    protected $table            = 'smp_pembayaran';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'smp_id',
        'tahap',
        'tanggal_bayar',
        'jumlah_bayar',
        'bukti_bayar',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getPembayaran($smp_id)
    {
        return $this->where([
            'smp_id' => $smp_id,
            'deleted_at' => null,
        ])->first();
    }

    public function getPembayaranTahap1($smp_id)
    {
        return $this->where([
            'smp_id' => $smp_id,
            'tahap' => 1,
            'deleted_at' => null,
        ])->first();
    }

    public function getPembayaranTahap2($smp_id)
    {
        return $this->where([
            'smp_id' => $smp_id,
            'tahap' => 2,
            'deleted_at' => null,
        ])->first();
    }

    public function getPembayaranTahap3($smp_id)
    {
        return $this->where([
            'smp_id' => $smp_id,
            'tahap' => 3,
            'deleted_at' => null,
        ])->first();
    }

    public function getPembayaranTahap4($smp_id)
    {
        return $this->where([
            'smp_id' => $smp_id,
            'tahap' => 4,
            'deleted_at' => null,
        ])->first();
    }
}