<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $primaryKey = 'id_question';
    public $incrementing = false;

    protected  $fillable = [
        'id_question',
        'question'

    ];

    public function question()
    {
        return $this->hasMany(Typequestion::class);
    }
}
