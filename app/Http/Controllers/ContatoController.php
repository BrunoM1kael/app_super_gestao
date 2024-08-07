<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;
class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();
        
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar (Request $request) {
        //realizar a validação dos dados
        $regras = [
            'nome' => 'required|min:3|max:45', 
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000' 
        ];
        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome pode ter no máximo 45 caracteres.',
            'email.email' => 'O email informado não é valido.',
            'motivo_contatos_id.required' => 'Selecione alguma opção.',
            'mensagem.max' => 'Você ultrapassou o límite máximo de caracteres.',

            'required' => 'O campo :attribute deve ser preenchido.'
        ];
        $request->validate($regras, $feedback);
        SiteContato::create($request->all());

        return redirect()->route('site.index');
         /* $contato = new SiteContato();

        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input ('telefone');
        $contato->email = $request->input ('email');
        $contato->motivo_contato = $request->input ('motivo_contato');
        $contato->mensagem = $request->input ('mensagem');

      //  print_r($contato->getAttributes());
        $contato->save(); 
       /*  $contato = new SiteContato();
        $contato->create($request->all()); */
    }
}
