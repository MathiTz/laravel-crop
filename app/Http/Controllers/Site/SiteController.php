<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{


    public function __construct()
    {
        // Usa método de autenticação em todos os métodos
        //$this->middleware('auth');
        // Usa só em alguns
        /*$this->middleware('auth')->only([
            'contato',
            'categoria'
        ]);*/
        // Não usa nesses
        /*
        $this->middleware('auth')->except([
            'index',
            'contato'
        ]);*/
    }

    public function index()
    {
        $teste = 123;
        $teste2 = 321;
        $teste3 = 132;
        return view('site.teste', compact('teste', 'teste2', 'teste3'));
    }

    public function contato()
    {
        return "Page Contato";
    }

    public function categoria($id)
    {
        return "Listagem de posts da categoria: {$id}";
    }

    public function categoriaOp($id)
    {
        return "Listagem de posts da categoria: {$id}";
    }

}
