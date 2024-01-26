<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    use HasFactory;

    protected $connection = 'DB_CONNECTION_LABORATORIOS_COFASA';

    protected $table = 'publicidades';
}
