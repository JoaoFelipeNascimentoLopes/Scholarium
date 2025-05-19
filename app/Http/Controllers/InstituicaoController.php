<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmacaoCadastroInstituicao;
use Illuminate\Http\Request;
use App\Models\Instituicao;
use Illuminate\Support\Facades\Mail;

class InstituicaoController extends Controller
{
    // Exibe o formulário
    public function create()
    {
        return view('instituicao.cadastrar');
    }

    // Processa o formulário e salva no banco
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nomeInstituicao' => 'required|string|max:255',
            'cnpjInstituicao' => [
                'required',
                'string',
                'max:18',
                'unique:tbinstituicao,cnpjInstituicao',
                function ($attribute, $value, $fail) {
                    if (!validar_cnpj($value)) {
                        $fail('O CNPJ informado é inválido ou não existe.');
                    }
                },
            ],
            'emailInstituicao' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    if (Instituicao::where('emailInstituicao', $value)->exists()) {
                        $fail('O E-mail informado já está em uso. Por favor, escolha outro E-mail.');
                    }
                },
            ],
            'telefoneInstituicao' => 'required|string|max:20',
            'cepInstituicao' => 'required|string|max:10',
            'logradouroInstituicao' => 'required|string|max:255',
            'numeroInstituicao' => 'required|string|max:10',
            'cidadeInstituicao' => 'required|string|max:255',
            'ufInstituicao' => 'required|string|max:2',
            'senhaInstituicao' => 'required|string|min:8',
            'notasInstituicao' => 'required|in:numeral,conceito',
        ]);

        // Criptografa a senha
        $dados = $request->all();
        $dados['senhaInstituicao'] = bcrypt($request->senhaInstituicao);

        // O campo 'notasInstituicao' já foi validado e pode ser diretamente salvo

        // Salva no banco
        Instituicao::create([
            'nomeInstituicao' => $dados['nomeInstituicao'],
            'cnpjInstituicao' => $dados['cnpjInstituicao'],
            'emailInstituicao' => $dados['emailInstituicao'],
            'telefoneInstituicao' => $dados['telefoneInstituicao'],
            'cepInstituicao' => $dados['cepInstituicao'],
            'logradouroInstituicao' => $dados['logradouroInstituicao'],
            'numeroInstituicao' => $dados['numeroInstituicao'],
            'cidadeInstituicao' => $dados['cidadeInstituicao'],
            'ufInstituicao' => $dados['ufInstituicao'],
            'senhaInstituicao' => $dados['senhaInstituicao'],
            'notasInstituicao' => $dados['notasInstituicao'], // Aqui estamos salvando o valor de 'notasInstituicao'
        ]);

        // Envia o e-mail para a escola
        Mail::to($dados['emailInstituicao'])->send(new ConfirmacaoCadastroInstituicao($dados));

        return redirect()->route('instituicao.sucess')->with('success', 'Instituição cadastrada com sucesso!');
    }
}

// Função de validação de CNPJ
function validar_cnpj($cnpj)
{
    // Remove caracteres não numéricos
    $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

    // Verifica se o CNPJ tem 14 dígitos
    if (strlen($cnpj) != 14) {
        return false;
    }

    // Verifica se todos os dígitos são iguais (ex: 00.000.000/0000-00)
    if (preg_match('/(\d)\1{13}/', $cnpj)) {
        return false;
    }

    // Valida o primeiro dígito verificador
    for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }
    $resto = $soma % 11;
    $digito1 = ($resto < 2) ? 0 : 11 - $resto;

    // Valida o segundo dígito verificador
    for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }
    $resto = $soma % 11;
    $digito2 = ($resto < 2) ? 0 : 11 - $resto;

    // Verifica se os dígitos calculados são iguais aos informados
    return $cnpj[12] == $digito1 && $cnpj[13] == $digito2;
}
