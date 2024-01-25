<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typequestion extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $primaryKey = 'id_type_option';
    public $incrementing = false;


    protected  $fillable = [
        'id_type_question',
        'question',


    ];

    // public function question()
    // {
    //     return $this->belongsTo(question::class);
    //     // return $this->belongsTo(Option::class);
    // }
}
