<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = ['nome', 'periodo','ch'];

    public function alunos(){
        return $this->hasMany(Aluno::class);
    }

    public function professors(){
        return $this->belongsToMany(Professor::class);
    }
}
