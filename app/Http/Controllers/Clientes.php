<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Clientes extends Controller
{

    private $clientes = [
        ['id' =>1, 'nome'=> 'Ademir'],
        ['id' =>2, 'nome'=> 'João'],
        ['id' =>3, 'nome'=> 'Maria'],
        ['id' =>4, 'nome'=> 'Aline']
    ];

    public function __construct()  {

        $clientes = session('clientes');

        if(!isset($clientes))
        {
            session(['clientes'=>$this->clientes]);
        }
    }

    public function getIndex($id, $clientes)
    {
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        return $index;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //Usado como rota base para por exemplo, listar todos os itens de uma tabela do banco de dados
    {
        //$clientes = $this->clientes;
        $clientes = session('clientes');
        return view('clientes.index', compact(['clientes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//Usado para criar um formulario para criar um novo registro do banco
    {
        return view('clientes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//Usado para receber um POST do forumlario para salvar o novo registro no banco
    {
        $clientes = session('clientes');
        $id = end($clientes)['id'] + 1;
        $nome = $request->nome;
        $dados = ["id"=>$id, "nome"=>$nome ];
        $clientes[] = $dados;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//Usado para retornar um dado especifico do banco
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $clientes = $clientes[$index];
        return view('clientes.info', compact(['clientes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//Usado para carregar um formulario para editar um registro do banco
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $clientes = $clientes[$index];
        return view('clientes.edit', compact(['clientes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//Usado para efetivamente atualizar um resgistro
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $clientes[$index]['nome'] = $request->nome;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//Usado para apagar um registro do banco de dados
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        array_splice($clientes, $index, 1);
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }



}
