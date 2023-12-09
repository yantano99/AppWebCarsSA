<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;

    protected $table = 'tblcarros';

    protected $primaryKey = 'placa';

    public $timestamps = false;

    protected $fillable = [
        'placa',
        'descripcion',
        'modelo',
        'num_chasis',
        'num_motor',
        'marca',
        'cliente'
    ];

    protected $guarded = [
        
    ];
}
