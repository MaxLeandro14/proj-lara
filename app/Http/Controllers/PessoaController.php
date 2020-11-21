<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use App\Pessoa;

class PessoaController extends Controller
{	
		public function setPessoa(Request $req, Pessoa $pessoa) {
			$dados = $req->all();

		    $table->string('name');
            $table->string('sobrenome');
            $table->string('email')->unique();
            $table->bigInteger('telefone');
            $table->string('pessoa_juridica');
            $table->bigInteger('cpf');
            $table->bigInteger('cnpj');

    	$messages = [
    		'nome.required' => 'O campo Nome é de preenchimento obrigatório.',
    		'email.required' => 'O campo Email é de preenchimento obrigatório.',
    		'cpf.required' => 'O campo CPF é de preenchimento obrigatório.',
        'cnpj.required' => 'O campo CNPJ é de preenchimento obrigatório.',
        'telefone.required' => 'O campo Telefone é de preenchimento obrigatório.',
        'pessoa_juridica.required' => 'O campo Pessoa Juridica é de preenchimento obrigatório.'
    	];

    	$validator = Validator::make($dados, [
        	'cnpj' => 'required|unique:empresa',
	        'nome' => 'required|string',
	        'telefone' => 'required',
	        'email' => 'required|email',
	        'pessoa_juridica' => 'required|string',
    	], $messages);


    	if ($validator->fails()) {
   
            return $validator->errors();
        }

    	$result = $pessoa->create($dados);
        
      if($result){
        return $result;
      }

    	return 'Não foi possivel cadastrar, tente novamente mais tarde ou contate um administrador!';
		}

    public function getPessoa($id_pessoa) {

    	$busca = Pessoa::where('id', $id_pessoa)->first();
    	
    	if($busca){
    		return $busca;           
			}

			return 'Não encontrado';
    }

    public function getPessoas(Pessoa $pessoas) {
    	return $pessoas->all();
    }
}
