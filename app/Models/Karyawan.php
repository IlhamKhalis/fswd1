<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = [
        'nomor_induk', 
        'nama',
        'alamat',
        'tanggal_lahir',
        'tanggal_bergabung'
    ];    

    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'karyawan_id', 'nomor_induk');
    }

}
