<?php

namespace App\Models;

use CodeIgniter\Model;

class SdModel extends Model
{
    protected $table            = 'sd';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'nama_lengkap',
        'slug_nama_lengkap', 
        'kota_lahir', 
        'tanggal_lahir',
        'asal_sekolah', 
        'pilihan_tingkat', 
        'nama_orangtua',
        'email',
        'no_whatsapp',
        'bukti_pembayaran',
        'no_registrasi',
        'no_virtual',
        'password',
        'status_pendaftaran',
        'status_penerimaan',
        'status_dapodik',
        'status_pernyataan',
        'status_keuangan',
        'status_seragam',
        'status_buku'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getTingkat($pilihan_tingkat)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('sd');
        $builder->where('pilihan_tingkat', $pilihan_tingkat);
        return $builder->countAllResults();
    }

    public function getSd($slug_nama_lengkap)
    {
        return $this->where([
            'slug_nama_lengkap' => $slug_nama_lengkap,
            'deleted_at' => null,
        ])->first();
    }

    public function getSiswaById($id)
    {
        return $this->where([
            'id' => $id,
            'deleted_at' => null,
        ])->first();
    }

    public function getSiswaByNoRegistrasi($no_registrasi)
    {
        return $this->where([
            'no_registrasi' => $no_registrasi,
            'deleted_at' => null,
        ])->first();
    }

    public function getDataChangePassword($no_registrasi, $email)
    {
        return $this->where([
            'no_registrasi' => $no_registrasi,
            'email' => $email,
            'deleted_at' => null,
        ])->first();
    }
}