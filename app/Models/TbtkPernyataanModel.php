<?php

namespace App\Models;

use CodeIgniter\Model;

class TbtkPernyataanModel extends Model
{
    protected $table            = 'tbtk_pernyataan';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'tbtk_id',
        'nama_lengkap',
        'alamat',
        'handphone',
        'tanda_tangan',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getPernyataan($tbtk_id)
    {
        return $this->where([
            'tbtk_id' => $tbtk_id,
            'deleted_at' => null,
        ])->first();
    }
}