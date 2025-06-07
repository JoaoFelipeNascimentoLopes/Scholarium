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
        'descricaoCurso',
        'statusCurso',
    ];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'instituicaoCurso', 'id');
    }
}
