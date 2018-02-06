<?php

namespace Lisar\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use Lisar\Http\Controllers\Controller;
use Lisar\Model\Produto;
use Lisar\Model\Lance;
use Auth;

class LanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $produto = Produto::all();
      return view('lance.create', compact('produto'));
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
        $usuario = Auth::User();

        $produto = Produto::findOrFail($request->produto_id);

        $lance = Lance::find($request->produto_id);



        if($lance):

          $lanceMaior = Lance::where('produto_id', $request->produto_id)->max('valor');
          //dd($lanceMaior);

          if($request->valor <= $lanceMaior):
            return redirect('/produto/'.$request->produto_id.'?ValorMeno=1');
          else:
            Lance::Create([

              'produto_id' => $request->produto_id,
              'user_id' => $usuario->id,
              'valor' => $request->valor

            ]);
            return redirect('/produto/'.$request->produto_id.'?status=1');

          endif;

        else:


          if($request->valor <= $produto->valor_inicial):
            return redirect('/produto/'.$request->produto_id.'?ValorMeno=1');
          else:
            Lance::Create([

              'produto_id' => $request->produto_id,
              'user_id' => $usuario->id,
              'valor' => $request->valor

            ]);

            return redirect('/produto/'.$request->produto_id.'?statusv=1');

          endif;

        endif;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
