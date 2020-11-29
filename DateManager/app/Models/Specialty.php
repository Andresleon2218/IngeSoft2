<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{

    use HasFactory;

    protected $fillable = [
        'name', 'description', 'active'
    ];

    public function professionals() {
        return $this->belongsToMany(User::class,'specialty_user','specialty_id','professional_id');
    }

}
