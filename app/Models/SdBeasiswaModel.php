<?php

namespace App\Models;

use CodeIgniter\Model;

class SdBeasiswaModel extends Model
{
    protected $table            = 'sd_beasiswa';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'sd_id',
        'uang_pangkal',
        'uang_sekolah'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getBeasiswa($sd_id)
    {
        return $this->where([
            'sd_id' => $sd_id,
            'deleted_at' => null,
        ])->first();
    }
}