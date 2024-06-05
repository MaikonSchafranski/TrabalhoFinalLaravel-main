<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Funcionario extends Model
{
    use HasFactory;



    protected $table = 'funcionarios';
    protected $fillable  = ['nome', 'email', 'registro', 'telefone'];

}
