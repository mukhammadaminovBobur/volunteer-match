<?php

// app/Models/Application.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'volunteer_id', 'opportunity_id', 'status',
    ];

    public function volunteer()
    {
        return $this->belongsTo(User::class, 'volunteer_id');
    }

    public function opportunity()
    {
        return $this->belongsTo(VolunteerOpportunity::class);
    }
}
