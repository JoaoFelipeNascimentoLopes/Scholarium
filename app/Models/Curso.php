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
        'formatoCurso',
        'descricaoCurso',
        'ppcCurso',
        'statusCurso',
    ];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'instituicaoCurso', 'id');
    }
    public function disciplinas()
    {
        // 1º Parâmetro: O Model da disciplina. Assumi que se chama 'Tbdisciplina'.
        // 2º Parâmetro: O nome da coluna da chave estrangeira na tabela 'tbdisciplina'.
        // 3º Parâmetro: O nome da chave primária na tabela de cursos (geralmente 'id').
        return $this->hasMany(Disciplina::class, 'cursoDisciplina', 'id');
    }
}
