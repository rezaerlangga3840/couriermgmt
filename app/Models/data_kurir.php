<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class data_kurir extends Model
{
    use HasFactory, Sortable;
    protected $table='data_kurir';
    protected $guarded=['id'];
    public $sortable=['id','nik_kurir','nama_kurir','alamat_kurir','notel_kurir','tingkat_kurir','created_at','updated_at'];
}
