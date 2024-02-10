<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logging extends Model
{
    use HasFactory;

    protected $fillable = [
        "log"
    ];

    protected $hidden = [
        "created_at",
        "updated_at"
    ];
}
