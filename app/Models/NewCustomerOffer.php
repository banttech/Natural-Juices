<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class NewCustomerOffer extends Model
{
    use HasFactory;
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'valid_from',
        'end_date',
    ];
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }
}
