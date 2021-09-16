<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demande extends Model
{
    use HasFactory;
    protected $table = 'demandes';
    protected $primaryKey = 'Id';
    public $timestamps = false;
}
