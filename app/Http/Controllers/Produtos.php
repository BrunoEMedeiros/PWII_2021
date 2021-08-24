<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Produtos extends Controller
{

    public $produtos = [
        ['id'=>1,'nome'=>'coca-cola'],
        ['id'=>2,'nome'=>'açucar'],
        ['id'=>3,'nome'=>'pão'],
        ['id'=>4,'nome'=>'arroz'],
        ['id'=>5, 'nome'=>'feijão']

    ];//Array de objetos

    public function __construct()
    {
        $produtos = session('produtos');

        if(!isset($produtos))
        {
            session(['produtos'=>$this->produtos]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//Listar todos os itens
    {
        $produtos = session('produtos');
        return view('produtos.index', compact(['produtos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//Criar um formulario para novo item
    {
        return view('produtos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//Salvar um novo item
    {
        $produtos = session('produtos');
        $id = count($produtos) + 1;
        $nome = $request->nome;
        $dados = ['id'=>$id, 'nome'=>$nome];
        $produtos[] = $dados;
        session(['produtos'=> $produtos]);
        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//Mostar um item especifico
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//Criar um formulario de edição
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
