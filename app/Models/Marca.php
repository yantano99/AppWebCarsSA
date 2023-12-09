<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'tblmarcas';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'marca'
    ];

    protected $guarded = [
        
    ];
}
