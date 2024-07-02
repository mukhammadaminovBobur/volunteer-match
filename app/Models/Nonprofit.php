<?php

// app/Models/Nonprofit.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nonprofit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'description', 'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function opportunities()
    {
        return $this->hasMany(VolunteerOpportunity::class);
    }
}
