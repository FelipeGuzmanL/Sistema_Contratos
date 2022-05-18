<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMoneda extends Model
{
    use HasFactory;

    protected $table = 'tipo_moneda';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_tipo',
        'Nombre_tipo',
    ];

    public function monto()
    {
        return $this->hasMany(Monto::class,'id_tipo_moneda','id_tipo');
    }
}