<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'id_option';
    public $incrementing = false;

    protected  $fillable = [
        'id_option',
        'name_option'

    ];

    public function options()
    {
        // return $this->hasMany(Typequestion::class);
    }
}
