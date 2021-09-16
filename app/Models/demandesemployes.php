<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demandesemployes extends Model
{
    use HasFactory;
    protected $table = 'demandesemployes';
    protected $primaryKey = ['employe_id', 'demande_id'];
}
