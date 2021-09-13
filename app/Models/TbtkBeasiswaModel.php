<?php

namespace App\Models;

use CodeIgniter\Model;

class TbtkBeasiswaModel extends Model
{
    protected $table            = 'tbtk_beasiswa';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'tbtk_id',
        'uang_pangkal',
        'uang_sekolah'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getBeasiswa($tbtk_id)
    {
        return $this->where([
            'tbtk_id' => $tbtk_id,
            'deleted_at' => null,
        ])->first();
    }
}