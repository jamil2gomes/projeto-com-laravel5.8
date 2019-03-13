<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = ['nome', 'email', 'certificados','valor_hora'];

    public function turmas(){
        return $this->belongsToMany(Turma::class);
    }
}
