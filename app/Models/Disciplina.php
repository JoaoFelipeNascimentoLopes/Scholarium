<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Disciplina extends Model
{
    //
    use HasFactory;
    protected $table = 'tbdisciplina';

    protected $fillable = [
        'nomeDisciplina',
        'cursoDisciplina',
        'cargaDisciplina',
        'tipoDisciplina',
        'ementaDisciplina',
        'descricaoDisciplina',
        'statusDisciplina',
    ];

    public function curso(): BelongsTo {
        return $this->belongsTo(Curso::class, 'cursoDisciplina');
    }
}
