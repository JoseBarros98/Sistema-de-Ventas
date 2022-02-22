<?php

namespace App\Http\Controllers;
use DB;
use App\Pedido;
use App\Persona;
use App\Tela;
use App\Servicio;
use App\Talla;
use App\DetallePedido;
use App\Http\Requests\PedidoFormRequest;
use Illuminate\Http\Request;

class PedidoController extends Controller
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
        if ($request)
        {
            $pedidos=Pedido::with("persona")->paginate(7);
            $query=trim($request->get('searchText'));
            
            return view('pedidos.index',
            ["pedidos"=>$pedidos,"searchText"=>$query], 
            ["persona"=>Persona::get()]);
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persona=DB::table('persona')->where('tipo_persona','=','Cliente')->get();
        $servicios=DB::table('servicios')->get();
        $telas=DB::table('telas')->get();
        $tallas=DB::table('tallas')->get();
        $pedidos=DB::table('pedidos as ped')
                ->join('detalle_pedidos as dp','ped.id','=','dp.pedido')
                ->join('persona as p', 'p.idpersona','=','ped.idcliente')
                
                ->select(DB::raw('CONCAT(ped.cod_pedido, " ",ped.nombre_pedido) AS pedido'),'ped.id','p.nombre','ped.fecha_pedido','ped.fecha_entrega','ped.tipo_comprobante','ped.num_comprobante','ped.muestra','ped.detalle_muestra')
                ->groupBy('pedido','ped.fecha_entrega')->get();
        
        

        return view("pedidos.create",[
            "persona"               =>      $persona,
            "pedidos"               =>      $pedidos,
            "telas"                 =>      $telas,
            "servicios"             =>      $servicios,
            "tallas"                =>      $tallas,      
        ]);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoFormRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $pedido=new Pedido;
            $pedido->nombre_pedido      =       $request->get('nombre_pedido');
            $pedido->nombre             =       $request->get('idcliente');
            $pedido->fecha_pedido       =       $request->get('fecha_pedido');
            $pedido->fecha_entrega      =       $request->get('fecha_entrega');
            $pedido->tipo_comprobante   =       $request->get('tipo_comprobante');
            $pedido->num_comprobante    =       $request->get('num_comprobante');
            $pedido->muestra            =       $request->get('muestra');
            $pedido->detalle_muestra    =       $request->get('detalle_muestra');
            
            $pedido->save();

            $idpedido                   =       $request->get('id');
            $descripcion                =       $request->get('descripcion');
            $tipo_tela                  =       $request->get('tipo_tela');
            $precio_total               =       $request->get('precio_total');
            $saldo                      =       $request->get('saldo');
            $firmacliente               =       $request->get('Firma_Cliente');
            $firmagerente               =       $request->get('Firma_Gerente');

            $n_talla                    =       $request->get('n_talla');
            $cantidad_talla             =       $request->get('cantidad_talla');

            $detalle_serv               =       $request->get('detalle_serv');
            $descripcion_serv           =       $request->get('descripcion_serv');
            
            
            $cont=0;

            while($cont< count($idpedido))
            {
                $detalle                        =       new DetallePedido;
                $detalle->descripcion           =       $descripcion[$cont];
                $detalle->tipo_tela             =       $tipo_tela[$cont];
                $detalle->Firma_Cliente         =       $firmacliente[$cont];
                $detalle->Firma_Gerente         =       $firmagerente[$cont];
                $detalle->precio_total          =       $precio_total[$cont];
                $detalle->saldo                 =       $saldo[$cont];
                $detalle->talla                 =       $n_talla[$cont];
                $detalle->talla                 =       $cantidad_talla[$cont];
                $detalle->servicios             =       $detalle_serv[$cont];
                $detalle->servicios             =       $descripcion_serv[$cont];
                $detalle->save();
                                        
                $cont=$cont+1;

            }



        }catch(\Exception $e)
            {
                DB::rollback();
            }
            return redirect('pedidos/pedido')->with('toas_succes', 'Pedido Realizado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido=Pedido::with("persona")
        ->join('persona as p','pedidos.idcliente','=','p.idpersona')
        ->select('pedidos.id','p.nombre','pedidos.nombre_pedido','p.telefono','pedidos.fecha_pedido','pedidos.fecha_entrega','pedidos.tipo_comprobante','pedidos.num_comprobante','pedidos.muestra','pedidos.detalle_muestra')
        ->where('pedidos.id','=',$id)->get();


        
        $detalles=DB::table('detalle_pedidos as dp')
            ->join('telas as t', 'dp.tipo_tela','=','t.id')
            ->join('servicios as s','dp.servicios','=','s.id')
            ->join('tallas as ta', 'dp.talla','=','ta.id')
            ->select('dp.descripcion','dp.precio_total','dp.saldo','dp.debe', 't.nombre_tela','t.color_tela','s.detalle_serv','s.descripcion_serv','ta.n_talla','ta.cantidad_talla')
            ->where('dp.id','=',$id)
            
            ->get();

            return view("pedidos.show",["pedidos"=>$pedido,"detalles"=>$detalles], [
                "persona"=>Persona::get(),
                "telas"=>Tela::get(),
                "pedido"=>Pedido::get(),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
