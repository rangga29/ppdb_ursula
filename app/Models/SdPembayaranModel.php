<?php

namespace App\Models;

use CodeIgniter\Model;

class SdPembayaranModel extends Model
{
    protected $table            = 'sd_pembayaran';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'sd_id',
        'tahap',
        'tanggal_bayar',
        'jumlah_bayar',
        'bukti_bayar',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getPembayaran($sd_id)
    {
        return $this->where([
            'sd_id' => $sd_id,
            'deleted_at' => null,
        ])->first();
    }

    public function getPembayaranTahap1($sd_id)
    {
        return $this->where([
            'sd_id' => $sd_id,
            'tahap' => 1,
            'deleted_at' => null,
        ])->first();
    }

    public function getPembayaranTahap2($sd_id)
    {
        return $this->where([
            'sd_id' => $sd_id,
            'tahap' => 2,
            'deleted_at' => null,
        ])->first();
    }

    public function getPembayaranTahap3($sd_id)
    {
        return $this->where([
            'sd_id' => $sd_id,
            'tahap' => 3,
            'deleted_at' => null,
        ])->first();
    }

    public function getPembayaranTahap4($sd_id)
    {
        return $this->where([
            'sd_id' => $sd_id,
            'tahap' => 4,
            'deleted_at' => null,
        ])->first();
    }
}