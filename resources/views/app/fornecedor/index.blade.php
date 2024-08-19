@extends('app.layouts.basico')

@section('titulo', 'Fornecedor') {{-- Puxa o nome do controller. --}}

@section('conteudo')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto; text-align: left;">
                <form method="post" action="{{ route ('app.fornecedor.listar')}}">
                    @csrf
                    <label for="nome" style="font-weight: bold">Nome:</label>
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta">

                    <label for="site" style="font-weight: bold">Site:</label>
                    <input type="text" name="site" placeholder="Site" class="borda-preta">

                    <label for="uf" style="font-weight: bold">UF:</label>
                    <input type="text" name="uf" placeholder="UF" class="borda-preta">

                    <label for="email" style="font-weight: bold">E-mail:</label>
                    <input type="text" name="email" placeholder="Email" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>
@endsection