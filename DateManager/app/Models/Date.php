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
        'date' => 'date',
        'start' => 'time',
        'end' => 'time'
    ];

    public function professional() {
        return $this->belongsTo(User::class);
    }

    public function client() {
        return $this->belongsTo(User::class);
    }

}
