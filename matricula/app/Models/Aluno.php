<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = ['nome', 'cpf','email', 'data','turma_id','telefone'];

    public function turma(){
        return $this->belongsTo(Turma::class);
    }
}
