<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testes extends Model
{
    public $timestamps = false;
    protected $fillable = ['email', 'nome', 'endereco', 'curriculo', 'telefone',
        'last_login_ip', 'last_login_at'];
    protected  $table = 'api';
}
