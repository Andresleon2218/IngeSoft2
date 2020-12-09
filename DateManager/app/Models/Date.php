<?php

namespace App\Models;

use App\Casts\Time;
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
        'start' => Time::class,
        'end' => Time::class
    ];

    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }

    public function client() {
        return $this->belongsTo(User::class);
    }

}
