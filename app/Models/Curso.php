<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'tbcurso'; // Nome da tabela

    protected $fillable = [
        'nomeCurso',
        'instituicaoCurso',
        'nivelCurso',
        'periodosCurso',
        'descricaoCurso',
        'statusCurso',
    ];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'instituicaoCurso', 'id');
    }
    public function disciplinas(): HasMany
    {
        // A CORREÇÃO É AQUI:
        // Informamos ao Laravel que a chave estrangeira na tabela 'tbdisciplina' se chama 'cursoDisciplina'.
        return $this->hasMany(Disciplina::class, 'cursoDisciplina');
    }
}
