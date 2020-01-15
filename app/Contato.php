<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use Notifiable;
    
    public $timestamps = false;

    protected $fillable = [
        'nome', 'email', 'telefone', 'mensagem', 'local_arquivo', 'ip'
    ];
}