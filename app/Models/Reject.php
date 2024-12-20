<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reject extends Model
{
    /** @use HasFactory<\Database\Factories\RejectFactory> */
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'NO_REJECT';
}
