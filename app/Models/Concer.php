<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Concer extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'concer';

    protected $fillable = [
        'concer_name',
        'slug',
        'poster',
        'price',
        'concer_place',
        'quota',
        'concer_time',
        'open_date',
        'close_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function concerBooking()
    {
        return $this->hasMany(TicketBooking::class, 'concer_id', 'id');
    }
}
