<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'id_category';
    public $incrementing = false;

    protected  $fillable = [
        'id_category',
        'name_category'

    ];
}
