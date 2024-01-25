<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $primaryKey = 'id_type';
    public $incrementing = false;

    protected  $fillable = [
        'id_type',
        'name_type'

    ];
}
