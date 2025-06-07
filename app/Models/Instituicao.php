<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    use HasFactory;

    protected $table = 'tbinstituicao'; // Nome da tabela

    protected $fillable = [
        'nomeInstituicao',
        'cnpjInstituicao',
        'emailInstituicao',
        'telefoneInstituicao',
        'cepInstituicao',
        'logradouroInstituicao',
        'numeroInstituicao',
        'cidadeInstituicao',
        'ufInstituicao',
        'senhaInstituicao',
        'notasInstituicao',
    ];
}
