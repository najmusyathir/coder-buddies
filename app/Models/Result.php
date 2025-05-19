<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;
    use Timestamp;

    protected $fillable = [
        'user_id',
        'type',
        'answers',
        'duration',
        'score'
    ];
    protected $casts = [
        'answers' => 'array',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
