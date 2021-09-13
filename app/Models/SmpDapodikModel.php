<?php

namespace App\Models;

use CodeIgniter\Model;

class SmpDapodikModel extends Model
{
    protected $table            = 'smp_dapodik';
    protected $returnType       = "object";
    protected $allowedFields    = [
        'smp_id',
        'nama_lengkap',
        'nama_panggilan',
        'kota_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kewarganegaraan',
        'agama',
        'paroki',
        'kebutuhan_khusus',
        'jenis_kebutuhan_khusus',
        'anak_keberapa',
        'saudara_kandung',
        'gol_darah',
        'tinggi',
        'berat',
        'kepala',
        'pas_foto',
        'nisn',
        'nik',
        'nkk',
        'nak',
        'scan_kk',
        'scan_ak',
        'kk_alamat',
        'kk_rt',
        'kk_rw',
        'kk_kelurahan',
        'kk_kecamatan',
        'kk_kota',
        'kk_kodepos',
        'tt_alamat',
        'tt_rt',
        'tt_rw',
        'tt_kelurahan',
        'tt_kecamatan',
        'tt_kota',
        'tt_kodepos',
        'tinggal_bersama',
        'transportasi',
        'jarak_tempuh',
        'waktu_tempuh',
        'asal_sekolah',
        'asal_sekolah_alamat',
        'asal_sekolah_kota',
        'ayah_nama_lengkap',
        'ayah_nik',
        'ayah_kota_lahir',
        'ayah_tanggal_lahir',
        'ayah_agama',
        'ayah_kewarganegaraan',
        'ayah_pendidikan',
        'ayah_pekerjaan',
        'ayah_jabatan',
        'ayah_pendapatan',
        'ayah_nama_perusahaan',
        'ayah_alamat_perusahaan',
        'ayah_kebutuhan_khusus',
        'ayah_jenis_kebutuhan_khusus',
        'ayah_telepon',
        'ayah_email',
        'ibu_nama_lengkap',
        'ibu_nik',
        'ibu_kota_lahir',
        'ibu_tanggal_lahir',
        'ibu_agama',
        'ibu_kewarganegaraan',
        'ibu_pendidikan',
        'ibu_pekerjaan',
        'ibu_jabatan',
        'ibu_pendapatan',
        'ibu_nama_perusahaan',
        'ibu_alamat_perusahaan',
        'ibu_kebutuhan_khusus',
        'ibu_jenis_kebutuhan_khusus',
        'ibu_telepon',
        'ibu_email',
        'wali_nama_lengkap',
        'wali_nik',
        'wali_kota_lahir',
        'wali_tanggal_lahir',
        'wali_agama',
        'wali_kewarganegaraan',
        'wali_pendidikan',
        'wali_pekerjaan',
        'wali_jabatan',
        'wali_pendapatan',
        'wali_nama_perusahaan',
        'wali_alamat_perusahaan',
        'wali_telepon',
        'wali_email',
        'wali_hubungan_anak',
        
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getSmp($smp_id)
    {
        return $this->where([
            'smp_id' => $smp_id,
            'deleted_at' => null,
        ])->first();
    }
}