<h3>Fornecedor </h3>



@php
    /* if (!condição) { enquanto executa se for true
   if (isset($variavel)) { retorna true se a variavel estiver definida

   } */
@endphp

{{-- Valores que o EMPTY encherga como vazio 
   - ''
   - 0
   - 0.0
   - '0'
   - null
   - false
   - array()
   - $var --}}
@isset($fornecedores)
    {{-- FOR
     @for ($i = 0; isset($fornecedores[$i]); $i++)
    Fornecedor: {{ $fornecedores[$i]['nome'] }}
    <br>
    Status:{{ $fornecedores[$i]['status'] }}
    <br>
    CNPJ: {{$fornecedores[$i]['cnpj'] ?? 'Dado não foi preenchido'}}
   <br> --}}
    {{-- $variavel testa não estiver definida=(isset) ou não possuir o valor null --}}
    {{-- Telefone: ({{$fornecedores[$i]['ddd'] ?? 'Dado não foi preenchido'}} {{$fornecedores[$i]['telefone'] ?? 'Dado não foi preenchido'}})
   @switch($fornecedores[$i]['ddd'])
      @case("11")
         São Paulo - SP
         @break
      @case('85')
         Fortaleza - CE 
      @break
      @case('32')
         Juiz de Fora - MG
      @break
   
      @default
         Estado não indentificado
   @endswitch
   <hr> 
   @endfor --}}


    {{-- WHILE
    @php
      $i = 0
   @endphp
   @while (@isset($fornecedores[$i]))
       
    Fornecedor: {{ $fornecedores[$i]['nome'] }}
    <br>
    Status:{{ $fornecedores[$i]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não foi preenchido' }}
    <br>
    Telefone: ({{ $fornecedores[$i]['ddd'] ?? 'Dado não foi preenchido' }})
    {{ $fornecedores[$i]['telefone'] ?? 'Dado não foi preenchido' }}
    <hr>
   @php
      $i++
   @endphp 
    @endwhile --}}


{{--  FOREACH
   @foreach ($fornecedores as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status:{{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? 'Dado não foi preenchido' }})
        {{ $fornecedor['telefone'] ?? 'Dado não foi preenchido' }}
        <hr>
    @endforeach --}}

   @forelse ( $fornecedores as $indice => $fornecedor )
    
   Iteração atual {{$loop->iteration}}
   <br>
   Fornecedor: {{ $fornecedor['nome'] }}
   <br>
   Status:{{ $fornecedor['status'] }}
   <br>
   CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não foi preenchido' }}
   <br>
   Telefone: ({{ $fornecedor['ddd'] ?? 'Dado não foi preenchido' }})
   {{ $fornecedor['telefone'] ?? 'Dado não foi preenchido' }}
   <br>
   @if($loop->first)
      Primeira iteração do Loop
      
   @endif
   @if($loop->last)
      Ultima iteração do Loop
      <br>
      Total de registros {{@$loop->count}}
   @endif
   <hr>
    @empty
    Não existem fornecedores cadastrados
    @endforelse

    {{-- Validando dados vindo do FornecedorController.php
    @isset($fornecedores[0]['cnpj'])
        CNPJ: {{ $fornecedores[0]['cnpj'] }}
        @empty($fornecedores[0]['cnpj'])
            - Vazio
        @endempty
    @endisset --}}

@endisset








{{-- @unless ($fornecedores[0]['status'] == 'S') -- @unless executa enquanto for false --
   Fornecedor inativo
@endunless
<br> --}}

{{-- @dd($fornecedores) --}} {{-- Printar --}}

{{-- @if (count($fornecedores) > 0 && count($fornecedores) < 10)
<h3>Existem alguns fornecedores cadastrados</h3>
@elseif (count($fornecedores)>10)
<h3>Existem vários fornecedores cadastrados</h3>
@else
<h3>Ainda não existem fornecedores cadastrados</h3>

@endif --}}
