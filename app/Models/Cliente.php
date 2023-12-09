<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'tblclientes';

    protected $primaryKey = 'cedula';

    public $timestamps = false;

    protected $fillable = [
        'cedula',
        'nombres',
        'apellidos',
        'direccion',
        'telefono',
    ];

    protected $guarded = [
        
    ];
}
