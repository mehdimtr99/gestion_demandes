<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'employes';
    protected $primaryKey = 'Id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FullNameEmp','Login','Password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
    ];


    public function getAuthPassword()
    {
      return $this->Password;
    }
    public function getAuthname()
    {
      return $this->FullNameEmp;
    }
}
