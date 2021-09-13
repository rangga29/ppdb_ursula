<?php

namespace App\Models;

use CodeIgniter\Model;

class SmpPernyataanModel extends Model
{
    protected $table            = 'smp_pernyataan';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'smp_id',
        'nama_lengkap',
        'alamat',
        'handphone',
        'tanda_tangan',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getPernyataan($smp_id)
    {
        return $this->where([
            'smp_id' => $smp_id,
            'deleted_at' => null,
        ])->first();
    }
}