<?php

// app/Models/VolunteerOpportunity.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerOpportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'nonprofit_id', 'title', 'description', 'date', 'location',
    ];

    public function nonprofit()
    {
        return $this->belongsTo(Nonprofit::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}

