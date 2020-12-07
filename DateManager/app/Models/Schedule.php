<?php

namespace App\Models;

use App\Casts\Time;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{

    use HasFactory;

    protected $fillable = [
        'monday','tuesday','wednesday','thursday','friday','saturday','sunday',
        'start_time','end_time','start_date','end_date','duration_of_date','professional_id'
    ];

    protected $casts = [
        'start_time' => Time::class,
        'end_time' => Time::class,
        'duration_of_date' => Time::class
    ];

    public function professional() {
        return $this->belongsTo(User::class);
    }

    public function dates() {
        return $this->hasMany(Date::class);
    }

}
