<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestDetail extends Model
{
    protected $table = 'guestdetails';
    protected $primaryKey = 'id';

    protected $fillable = [
        'guest_id', 'guest_name', 'job', 'phone', 'email', 'invitation_status', 'invitation_link', 'invitation_accepted', 'access_card', 'access_card_status', 'qr_code', 'qr_code_scanned'
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id', 'id');
    }
}