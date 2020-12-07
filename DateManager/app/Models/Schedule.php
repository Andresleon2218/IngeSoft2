<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    use HasFactory;

    protected $fillable = [
        'monday','tuesday','wednesday','thursday','friday','saturday','sunday',
        'start_time','end_time','start_date','end_date','duration_of_date','professional_id'
    ];

    /*protected $casts = [
        'start_time' => 'time',
        'end_time' => 'time',
        'duration_of_date' => 'time',
        'start_date' => 'date',
        'end_date' => 'date',
    ];*/

    public function professional() {
        return $this->belongsTo(User::class);
    }

    public function dates() {
        return $this->hasMany(Date::class);
    }

}
