<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    /**
     * The roles that belong to the user.
     */
    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }

}
