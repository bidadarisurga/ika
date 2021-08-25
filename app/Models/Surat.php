<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table='surat';
    protected $fillable=['no_surat','tgl_surat','perihal','no_adm','tgl_adm','distribusi','tindak_lanjut','status','sifat'];
    
}
