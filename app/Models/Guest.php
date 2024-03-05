<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';
    protected $primaryKey = 'id';

    protected $fillable = [
        'company_name', 'number', 'date', 'period', 'invitation_link', 'location', 'location_link'
    ];

    public function guestDetails()
    {
        return $this->hasMany(GuestDetail::class, 'guest_id', 'id');
    }
}
