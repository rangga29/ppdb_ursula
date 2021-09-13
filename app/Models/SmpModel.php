<?php

namespace App\Models;

use CodeIgniter\Model;

class SmpModel extends Model
{
    protected $table            = 'smp';
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
        'surat_pengantar',
        'no_registrasi',
        'no_virtual',
        'kelas4_sem1_indo',
        'kelas4_sem1_mat',
        'kelas4_sem2_indo',
        'kelas4_sem2_mat',
        'kelas5_sem1_indo',
        'kelas5_sem1_mat',
        'kelas5_sem2_indo',
        'kelas5_sem2_mat',
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
        $builder = $db->table('smp');
        $builder->where('pilihan_tingkat', $pilihan_tingkat);
        return $builder->countAllResults();
    }

    public function getSmp($slug_nama_lengkap)
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