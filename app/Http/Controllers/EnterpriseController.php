<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Enterprise;
use App\Nacionalidad;
use DB;

class EnterpriseController extends Controller
{
    public function __construct()
    {
       //$this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $enterprises=Enterprise::with("nacionalidads")->paginate(10);
            $query=trim($request->get('searchText'));
            $nacionalidads=DB::table('nacionalidads')->get();
            return view('empresas.empresa.index',
            ["enterprises"=>$enterprises,"searchText"=>$query], 
            ["nacionalidads"=>$nacionalidads]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nacionalidads=DB::table('nacionalidads')->get();
        return view("empresas.empresa.create",["nacionalidads"=>$nacionalidads]);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "nombre"=>"required|max:90",
            "pais"=>"required|max:90",
            "nit"=>"required|max:140",
            "telefono"=>"required",
            
        ]);
        Enterprise::create($request->only("nombre","pais","nit","telefono"));
        return redirect('empresas/empresa')
        ->with('toast_success','Nuevo Empresa Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("empresas.empresa.show",["enterprise"=>Enterprise::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Enterprise $enterprises)
    {
        $nacionalidads=Nacionalidad::get();
        $route=route("enterprises.update",["enterprises"=>$enterprises]);
        return view("empresas.empresa.edit", compact("nacionalidads", "route"));
    }


    public function update(Request $request, Enterprise $enterprises)
    {
        $this->validate($request,[
            "nombre"=>"required",
            "nit"=>"required|max:90",
            "pais"=>"required|max:140",
            "telefono"=>"required",
            

        ]);
        $enterprises->fill($request->only("nombre","nit","pais","telefono"))->save();
        return back('empresas/empresa')
        ->with('toast_success','Nueva Empresa Modificada');

        
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
