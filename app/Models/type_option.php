<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_option extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $primaryKey = 'id_type_option';
    public $incrementing = false;

    protected  $fillable = [
        'id_type_option',
        'id_type',
        'id_option'

    ];
}
