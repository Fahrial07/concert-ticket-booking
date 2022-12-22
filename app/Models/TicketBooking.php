<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketBooking extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'ticket_booking';

    protected $fillable = [
        'concer_id',
        'ticketId',
        'name',
        'email',
        'phone',
        'gender',
        'pob',
        'dob',
        'address',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function Concer()
    {
        return $this->belongsTo(Concer::class, 'concer_id', 'id');
    }
}
