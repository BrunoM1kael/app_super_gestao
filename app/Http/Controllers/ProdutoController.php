<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Unidade;
use App\Produto;
use App\Item;
use App\ProdutoDetalhe;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(10);

        /* foreach($produtos as $key => $produto){
            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            if (isset($produtoDetalhe)) {
                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$key]['largura'] = $produtoDetalhe->largura;
                $produtos[$key]['altura'] = $produtoDetalhe->altura;
            }
        } */



    return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' =>$fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:45',
            'descricao' => 'required|min:4|max:40',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'

        ];

        $feedback = [
            'required' => 'O campo :attribute precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter pelo menos 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 45 caracteres',
            'descricao.min' => 'O campo descricao precisa ter pelo menos 4 caracteres',
            'descricao.max' => 'O campo descricao precisa ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'

        ];
        $request->validate($regras, $feedback);

        $msg = 'Cadastro realizado com sucesso';

        Item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        

        return view('app.produto.show', ['produto' => $produto]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' =>$fornecedores]);
        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome' => 'required|min:3|max:45',
            'descricao' => 'required|min:4|max:40',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter pelo menos 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 45 caracteres',
            'descricao.min' => 'O campo descricao precisa ter pelo menos 4 caracteres',
            'descricao.max' => 'O campo descricao precisa ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];
        $request->validate($regras, $feedback);

        $request->all();
        $produto->update($request->all());

        return redirect()->route('produto.show',['produto' => $produto->id ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');

    }
}
