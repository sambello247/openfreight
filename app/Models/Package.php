<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function shipper()
    {
        return $this->hasOne(Shipper::class);
    }

    public function receiver()
    {
        return $this->hasOne(Receiver::class);
    }

    public function serviceoption()
    {
        return $this->hasOne(ServiceOption::class);
    }

      /**
     * Get the user that owns the package.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
