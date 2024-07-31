<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2) {
        echo "A soma de $p1 + $p2 é: ". ($p1 + $p2);
        
        //return view('site.teste', ['p1' /* este p1 é transformado em uma view no arquivo que está sendo indicado */ => $p1, 'p2' => $p2]);Array associativo
        return view('site.teste', compact('p1', 'p2')); //compact cria um array associativo da mesma forma que o exemplo a cima
        //return view('site.teste')->with('p1',$p1)->with('p2', $p2);  //with()

    }


}
 