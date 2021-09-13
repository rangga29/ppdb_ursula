<?php

namespace App\Models;

use CodeIgniter\Model;

class SdPernyataanModel extends Model
{
    protected $table            = 'sd_pernyataan';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'sd_id',
        'nama_lengkap',
        'alamat',
        'handphone',
        'tanda_tangan',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getPernyataan($sd_id)
    {
        return $this->where([
            'sd_id' => $sd_id,
            'deleted_at' => null,
        ])->first();
    }
}