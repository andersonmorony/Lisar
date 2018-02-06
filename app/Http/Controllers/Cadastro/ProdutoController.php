<?php

namespace Lisar\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use Lisar\Http\Controllers\Controller;
use Lisar\Model\Produto;
use Lisar\Model\Lance;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = Produto::all();
        return view('produto.index', compact('produto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::select('produtos.*', 'lances.valor')
        ->leftjoin('lances','lances.produto_id','produtos.id')
        ->where('produtos.id', $id)
        ->orderBy('lances.valor', 'desc')
        ->first();
        //dd($produto);
        $lances = Lance::select('users.name', 'lances.*')
        ->where('produto_id', $id)
        ->leftjoin('users','users.id','user_id')
        ->orderBy('valor', 'desc')
        ->get();
        //dd($lances);

        return view('produto.view', compact('produto', 'lances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
