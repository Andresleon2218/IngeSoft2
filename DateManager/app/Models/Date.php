<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{

    use HasFactory;

    protected $fillable = [
        'date',
        'start',
        'end',
        'professional_id',
        'client_id',
        'active',
        'description'
    ];

    protected $casts = [
        'start' => 'date_format:H:i',
        'end' => 'date_format:H:i'
    ];

    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }

    public function client() {
        return $this->belongsTo(User::class);
    }

}
