<?php

namespace App\Http\Controllers;

use App\Http\Requests\TelaFormRequest;

use Illuminate\Support\Facades\Redirect;
use App\Tela;
use Illuminate\Http\Request;
use DB;
class TelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $telas=DB::table('telas')->where('nombre_tela','LIKE','%'.$query.'%')
            
            ->orderBy('id','desc')
            ->paginate(7);
            return view('almacen.tela.index',["telas"=>$telas,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("almacen.tela.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TelaFormRequest $request)
    {
        $tela=new Tela;
        $tela->nombre_tela=$request->get('nombre_tela');
        $tela->color_tela=$request->get('color_tela');
    
        $tela->save();
        //return Redirect::to('almacen/categoria');
        return redirect('pedidos/tela')->with('toast_success','Tela Creada ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tela  $tela
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tela  $tela
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("almacen.tela.edit",["telas"=>Tela::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tela  $tela
     * @return \Illuminate\Http\Response
     */
    public function update(TelaFormRequest $request, $id)
    {
        $tela=Tela::findOrFail($id);
        $tela->nombre_tela=$request->get('nombre_tela');
        $tela->color_tela=$request->get('color_tela');
        $tela->update();
        return redirect('pedidos/tela');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tela  $tela
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tela=Tela::findOrFail($id);
        
        $tela->delete();
        return Redirect::to('pedidos/tela');
    }
}
