<?php

namespace HexGad\Domains\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'zone_id', 'zone_name', 'status'
    ];
}
