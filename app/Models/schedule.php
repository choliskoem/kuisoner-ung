<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $primaryKey = 'id_schedule';
    public $incrementing = false;

    protected  $fillable = [
        'id_Schedule',
        'schedule',
        'title_question',
        'tujuan_question',
        'cara_pakai_question'

    ];
}
